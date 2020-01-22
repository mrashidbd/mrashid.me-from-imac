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
<div class="row row-bottom-padded-sm animate-box" data-animate-effect="fadeInLeft">
    <div class="col-md-12">
        <ul>
            <li class="filterbtn active" data-filter="*"><?php echo esc_html( __('All') ); ?></li>

            <?php 
                
                $dataFilter = carbon_get_post_meta( $section_id, 'recent_work_filter' );
                
                foreach ($dataFilter as $item): ?>

            <li class="filterbtn" data-filter=".<?php echo esc_html( slugify( $item['filter_item'] ) ); ?>"><?php echo esc_html( $item['filter_item'] ); ?></li>

            <?php endforeach; ?>

        </ul>
    </div>
</div>
<div id="project-container" class="row isotope-grid" data-page="<?= get_query_var('paged') ? get_query_var('paged') : 1; ?>" data-max="<?= $wp_query->max_num_pages; ?>"><?php

    
    $args = array(
    'post_type' => 'project',
    'post_status' => 'publish',
    'orderby'   => 'date',
    'order'     => 'ASC'
    );

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) {

    while ( $the_query->have_posts() ) :
        $the_query->the_post();

        get_template_part('template-parts/single-project-blocks');

    endwhile; ?>





</div>
<div class="row">
    <div class="col-md-12 animate-box">
        <p><a href="<?php next_posts(get_max_pages()); ?>" id="load-more-projects" class="btn btn-primary btn-lg btn-load-more">Load more <i class="fa fa-refresh"></i></a></p>
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
