<?php
/**
 * Main template.
 */

?>
<?php
$post_id = $post->ID;
get_header();
?>
    <div id="app"></div>
    <div class="card align-items-center">
        <h2 class="text-lg-center text-uppercase"><?php echo get_the_title() ?></h1>
        <?php 
        echo the_content();
        echo "<b>By: ".get_the_author_meta('display_name', $post->post_author)."</b>";
        ?>
    </div>
    <div class="related-posts">
        <h4>Related links</h4>
        <?php
            $posts = get_posts(
                [
                    "post_type" => ['page'],
                    "numberposts" => 5,
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