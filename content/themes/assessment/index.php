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
        <div class="post-list container">
            <div class="row">
                <div class="col-md-10">
                    <div class="text-center">
                        <h1>Movies Blog</h1>
                        <?php 
                            foreach ($posts as $post) :
                                $post_id = $post->ID;
                            ?>
                                <a href="<?php echo get_permalink( $post_id );?>">
                                    <div class="card align-items-center">
                                        <h2><?php echo get_the_title( $post_id );?></h2>                                    
                                        <h5><?php echo get_the_excerpt( $post_id );?></h5>
                                        <img class="img-responsive" src="<?php echo get_the_post_thumbnail_url( $post_id );?>"></img>
                                    </div>
                                </a>
                        <?php
                            endforeach;            
                        ?>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="related-posts p-4 mt-5">
                        <h4>Other posts</h4>
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
                                foreach ($posts as $post) :
                                    $post_id = $post->ID;
                                ?>
                                    <a  href="<?php echo get_permalink( $post_id ); ?>">
                                        <li><?php  echo get_the_title( $post_id ); ?></li>
                                    </a>
                            <?php
                                endforeach;
                            ?>
                        <ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();