<?php 
/*********************************
*** New Section Construction
**********************************/
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
<div class="row isotope-grid"><?php 

  
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    
    $args = array(
    'post_type' => 'project',
    'post_status' => 'publish',
    'orderby'   => 'date',
    'order'     => 'ASC',
    'paged'     => $paged,
    'posts_per_page' => 4
    );

$the_query = new WP_Query( $args );
 

if ( $the_query->have_posts() ) {
    
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        
$projectName = carbon_get_the_post_meta( 'project_name' );
$projectUrl = carbon_get_the_post_meta( 'project_url' );
$projectViews = carbon_get_the_post_meta( 'project_views' );
$projectAprriciations = carbon_get_the_post_meta( 'project_apr' );
$projectTypes = carbon_get_the_post_meta( 'project_type_group' );
$projectCoverImage = carbon_get_the_post_meta( 'project_cover_image' );
        ?>
    <div class="col-md-6<?php foreach($projectTypes as $projectType){
                        echo ' ' . esc_html(slugify($projectType['project_type']));
                    } ?>">
        <div class="project" style="background-image: url(<?php echo esc_url($projectCoverImage); ?>);">
            <div class="desc">
                <div class="con">
                    <h3><a href="<?php the_permalink(); ?>"><?php echo esc_html( $projectName ); ?></a></h3>
                    <span><?php foreach($projectTypes as $projectType){
                        echo esc_html($projectType['project_type']) . ' | ';
                    } ?></span>
                    <p class="icon">
                        <span><a href="<?php echo esc_url( $projectUrl ); ?>" target="_blank"><i class="fa fa-share-alt"></i></a></span>
                        <span><i class="fa fa-eye"></i> <?php echo esc_html( $projectViews ); ?></span>
                        <span><i class="fa fa-thumbs-up"></i> <?php echo esc_html( $projectAprriciations ); ?></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php 

}

    if($the_query->post_count < 6){  ?>

</div>
<div class="row">
    <div class="col-md-12 animate-box">
        <p><a id="no-more-projects" class="btn btn-primary btn-lg btn-load-more"><?php echo __('No more projects') ?></a></p>
    </div>
</div>


<?php 
        
    }else{
        ?>

</div>
<div class="row">
    <div class="col-md-12 animate-box">
        <p><a id="load-more-projects" class="btn btn-primary btn-lg btn-load-more">Load more <i class="fa fa-refresh"></i></a></p>
    </div>
</div>

<?php
    }
    
    
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
