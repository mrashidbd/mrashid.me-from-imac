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
?>
            <div class="col-md-6">
                <div class="blog" style="background-image: url();"></div>
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
