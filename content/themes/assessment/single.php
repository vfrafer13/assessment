<?php
/**
 * Main template.
 */

?>
<?php
$genres = get_the_terms($post->ID, 'genre');
$post_id = $post->ID;
$post_type = get_post_type();
get_header();
?>
    <div id="app"></div>
    <a href="<?php echo esc_url( home_url() )?>" class="text-left backhome">Home</a>
    <div class="card align-items-center">
        <h2 class="text-lg-center text-uppercase"><?php echo get_the_title() ?></h1>
        <?php 
        if($post_type != 'movie') {
            echo "<b>By: ".get_the_author_meta('display_name', $post->post_author)."</b>";
        }
        if (has_post_thumbnail($post_id)) { 
            echo '<img class="img-responsive" src="'.get_the_post_thumbnail_url( $post_id ).'"></img>';
        }
        echo the_content();
        if ($post_type == 'movie') {
            if ($genres != null ) {
                echo '<h6>Genre(s):</h6><ul>';
                foreach ( $genres as $genre ) {
                    echo '<li><i>'.$genre->name.'</i></li>';
                } 
                echo '</ul>';
            }
        }
        ?>
    </div>
    <div class="related-posts">
        <h4>Related <? echo ($post_type == 'movie' ? "movies" : "links") ?></h4>
        <?php
            $posts = get_posts(
                [
                    "post_type" => [$post_type],
                    "numberposts" => 5,
                    "order" => 'ASC'
                ]
            );
        ?>
        <ul>
            <?php
                foreach ($posts as $post) {
                    $post_id = $post->ID;
                    echo '<a class="align-items-center" href="'.get_permalink( $post_id ).'">';
                    echo '<li>'.get_the_title( $post_id ).'</li>';
                    echo '</a>';
                }
            ?>
        <ul>
    </div>
<?php
get_footer();
?>