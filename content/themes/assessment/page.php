<?php
/**
 * Main template.
 */

?>
<?php
$post_id = $post->ID;
get_header();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="text-center">
                    <h2 class="text-uppercase"><?php echo get_the_title() ?></h2>
                    <p class="pt-4"><b>By <?php echo get_the_author_meta('display_name', $post->post_author);?></b></p>        
                    <?php echo the_content();?>
                </div>
            </div>
            <div class="col-md-2">
                <div class="related-posts">
                    <h4>Related pages</h4>
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
<?php
get_footer();
?>