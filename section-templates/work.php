<?php 
/*********************************
*** New Section Construction
**********************************/
global $wp_query;
global $section_id;
?><div class="row">
    <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
        <span class="heading-meta"><?php echo esc_html(carbon_get_post_meta($section_id, 'recent_work_subtitle')); ?></span>
        <h2 class="colorlib-heading animate-box"><?php echo esc_html(carbon_get_post_meta($section_id, 'recent_work_title')); ?></h2>
    </div>
</div>
<div class="row"><?php

    $args = array(
    'post_type' => 'project',
    'post_status' => 'publish',
    'orderby'   => 'date',
    'order'     => 'ASC',
    'posts_per_page' => 16
    );

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) {
$i = 1;
    while ( $the_query->have_posts() ) :
        $the_query->the_post();

        get_template_part('template-parts/single-project-blocks');

    endwhile; ?>

</div>
<div class=" row">
    <div class="col-md-12 animate-box">
        <p><a href="http://mrashid.test/all-projects/" class="btn btn-primary btn-lg btn-load-more"><?php echo __('See All Projects', 'mRashid'); ?> <i class="fa fa-long-arrow-right"></i></a></p>
    </div>
</div>

<?php

    
    
    } else {
    echo '<p>Something went wrong! can\'t find any recent project in the database!!</p>';
    }

    wp_reset_postdata();
    

function slugify($text)
{
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}
