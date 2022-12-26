<?php
/**
 * Main template.
 */

?>
<?php
$post_id = $post->ID;
$related_posts = get_posts(
    [
        "post_type" => ['page'],
        "numberposts" => 5,
    ]
);
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
                    <ul>
                        <?php
                            foreach ($related_posts as $rel_post) :
                                $rel_post_id = $rel_post->ID;
                            ?>
                            <?php 
                                $permalink = get_permalink ( $rel_post_id );
                                if($permalink !== get_permalink( $post_id ) || count($related_posts) == 1):
                                    ?>
                                    <a  href="<?php echo $permalink; ?>">
                                        <li><?php  echo get_the_title( $rel_post_id ); ?></li>
                                    </a>
                            <?php
                                endif;
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