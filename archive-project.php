<?php 
get_header();
?>


<div class="row">

    <?php 

if(have_posts()) : while(have_posts()) : the_post();


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

endwhile;
    echo '</div>';
echo paginate_links();
endif;
get_footer();


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
