<?php
/**
 * Theme functions.
 */

/**
 * Enqueue scripts/styles.
 *
 * @return void
 */
function headless_scripts() {
    wp_enqueue_style( 'headless-style', get_template_directory_uri() . '/style.css', array(), rand() );

    $asset_uri   = trailingslashit(get_template_directory_uri()) . 'assets/build/';
    $asset_root  = trailingslashit(get_template_directory()) . 'assets/build/';
    $asset_files = glob($asset_root . '*.asset.php');

    // Enqueue webpack loader.js, if it exists.
    if (true === is_readable($asset_root . 'loader.js')) {
        wp_enqueue_script(
            'assessment/runtime',
            $asset_uri . 'loader.js',
            array(),
            filemtime($asset_root . 'loader.js')
        );
    }

    foreach ($asset_files as $asset_file) {
        $asset_script = require($asset_file);

        $asset_filename = basename($asset_file);

        $asset_slug_parts = explode('.asset.php', $asset_filename);
        $asset_slug       = array_shift($asset_slug_parts);

        $asset_handle = sprintf('assessment/%s', $asset_slug);

        $stylesheet_path = $asset_root . $asset_slug . '.css';
        $stylesheet_uri  = $asset_uri . $asset_slug . '.css';

        $javascript_path = $asset_root . $asset_slug . '.js';
        $javascript_uri  = $asset_uri . $asset_slug . '.js';

        if (true === is_readable($stylesheet_path)) {
            $style_dependencies = [];

            wp_enqueue_style(
                $asset_handle,
                $stylesheet_uri,
                array(),
                $asset_script['version']
            );
        }

        if (true === is_readable($javascript_path)) {
            wp_enqueue_script(
                $asset_handle,
                $javascript_uri,
                $asset_script['dependencies'],
                $asset_script['version']
            );
        }
    }
}

function create_movies_post_type() {
    register_post_type('movie',
        array(
            'labels' => array(
                'name' => 'Movies',
                'singular_name' => 'Movie',
                'all_items' => "All Movies",
                'add_new_item' => 'Add new Movie',
            ), 
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'supports' => array( 'title', 'editor', 'author', 'thumbnail'),
        )  
    );
}

function create_genre_taxonomy () { 
    register_taxonomy("genre", 'movie',
        array(
            'labels' => array(
                'name' => 'Genres',
                'singular_name' => 'Genre',
                'all_items' => "All Genres",
                'add_new_item' => 'Add new Genre',
                'edit_item' => "Edit Genre",
            ), 
            'public' => true,
            'show_admin_column' => true,
            'hierarchical' => true,
            'public'                => false,
            'show_ui'               => true,
        ),
    );
}

// Incluir Bootstrap CSS
function bootstrap_css() {
	wp_enqueue_style( 'bootstrap_css', 
  					'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', 
  					array(), 
  					'4.1.3'
  					); 
}
add_action( 'wp_enqueue_scripts', 'bootstrap_css');

add_theme_support('post-thumbnails');
add_action( 'wp_enqueue_scripts', 'headless_scripts' );
add_action( 'init', 'create_movies_post_type');
add_action( 'init', 'create_genre_taxonomy');