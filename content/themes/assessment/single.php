<?php
/**
 * Main template.
 */

?>
<?php
$genres = get_the_terms($post->ID, 'genre');
$post_id = $post->ID;
$post_type = get_post_type();
$related_posts = get_posts(
    [
        "post_type" => [$post_type],
        "numberposts" => 10,
        "order" => 'ASC'
    ]
);
get_header();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="text-center">
                    <h2 class="text-uppercase"><?php echo get_the_title() ?></h2>
                    <?php 
                        if($post_type != 'movie') :
                    ?>
                        <p><b>By <?php echo get_the_author_meta('display_name', $post->post_author);?></b></p>
                    <?php endif;
                    ?>
                    <?php
                        if (has_post_thumbnail($post_id)) :
                    ?> 
                        <img class="img-responsive" src="<?php echo get_the_post_thumbnail_url( $post_id );?>"></img>
                    <?php endif;
                    ?>
                </div>
                <?php echo the_content(); ?>
                <?php 
                    if ($post_type == 'movie') :
                        if ($genres != null ) :
                        ?>
                            <h6>Genre(s):</h6>
                            <p class="p-0">
                            <?php 
                                foreach ( $genres as $genre ) :
                            ?>
                                <i><?php echo $genre->name;?></i></br>
                            <?php 
                                endforeach;
                            ?>
                            </p>
                    <?php 
                        endif;
                    endif;
                    ?>
            </div>
            <div class="col-md-2">
                <div class="related-posts">
                    <h4>Related <? echo ($post_type == 'movie' ? "movies" : "posts") ?></h4>
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