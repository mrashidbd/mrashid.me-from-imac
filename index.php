<?php 
get_header();
?>

<div class="colorlib-narrow-content">
    <div class="row">
        <div class="mrashid-blog-posts">
            <div class="col-md-12">
                <center>
                    <h2><?php echo __('Blog', 'mRashid'); ?></h2>
                    <p><?php echo __('Discover my writing skills!', 'mRashid'); ?></p>
                </center>
            </div>

            <?php 

if(have_posts()) : while(have_posts()) : the_post();
            $postImage = get_the_post_thumbnail_url(get_the_ID(), 'medium');
?>
            <div class="col-md-6">
                <div class="blog-thumb-container" style="background-image: url(<?php echo esc_url( $postImage ); ?>);"></div>
                <div class="post-details">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php the_excerpt(); ?>
                </div>
            </div>
            <?php 

endwhile;
echo paginate_links();
endif;
?>
        </div>
    </div>
</div>
<?php
get_footer();
