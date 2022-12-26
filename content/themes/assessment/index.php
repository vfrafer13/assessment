<?php
/**
 * Main template.
 */

?>
<?php
get_header();
$posts = get_posts(
    [
        "post_type" => ['movie'],
        "numberposts" => 5,
    ]
); ?>
    <div>
        <div id="app"></div>
        <h1 class="text-center">Most Recent Movies</h1>
        <div class="post-list align-items-center">
            <?php 
                foreach ($posts as $post) {
                    $post_id = $post->ID;
                    echo '<a class="align-items-center" href="'.get_permalink( $post_id ).'">';
                    echo '<div class="card align-items-center">';
                    echo '<h2>'.get_the_title( $post_id ).'</h2>';
                    echo '<h5>'.get_the_excerpt( $post_id ).'</h5>';
                    echo '<img class="img-responsive" src="'.get_the_post_thumbnail_url( $post_id ).'"></img>';
                    echo '</div>';
                    echo '</a>';
                    
                }
            ?>
        </div>
        <div class="related-posts">
            <h4>Read other types of posts on our site</h4>
            <?php
                $posts = get_posts(
                    [
                        "post_type" => ['post'],
                        "numberposts" => 3,
                    ]
                );
                $posts = array_merge($posts, get_posts(
                    [
                        "post_type" => ['page'],
                        "numberposts" => 3,
                    ]));
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
    </div>
<?php
get_footer();