<?php 
global $section_id;
global $wp_query;
?>

<div class="row">
    <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInTop">
        <span class="heading-meta"><?php echo esc_html(carbon_get_post_meta($section_id, 'blog_section_subtitle')); ?></span>
        <h2 class="colorlib-heading"><?php echo esc_html(carbon_get_post_meta($section_id, 'blog_section_title')); ?></h2>
    </div>
</div>
<div class="row">

    <?php 
  
    $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'orderby'   => 'date',
    'order'     => 'ASC',
    'posts_per_page' => 3
    );

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) {

    while ( $the_query->have_posts() ) :
        $the_query->the_post();

        get_template_part('template-parts/single-post-blocks');

    endwhile; ?>

</div>
<div class="row">
    <div class="col-md-12 animate-box">
        <p><a href="<?php echo esc_url(carbon_get_post_meta($section_id, 'blog_archive_link')); ?>" class="btn btn-primary btn-lg btn-load-more"><?php echo __('Visit Blog', 'mRashid'); ?> <i class="fa fa-long-arrow-right"></i></a></p>
    </div>
</div>

<?php
    
    } else {
    echo '<p>Something went wrong! can\'t find any recent blog post in the database!!</p>';
    }

    wp_reset_postdata();
    
