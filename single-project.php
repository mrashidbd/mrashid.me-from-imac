<?php 
get_header();
?>

<div class="colorlib-narrow-content">
    <div class="row">
        <div class="mrashid-blog-posts">
            <?php 

if(have_posts()) : while(have_posts()) : the_post();
            $postImage = get_the_post_thumbnail_url(get_the_ID(), 'medium');
?>
            <div class="col-md-12">
                <div class="post-details">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php the_content(); ?>
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




$projectName = carbon_get_the_post_meta( 'project_name' );
$projectUrl = carbon_get_the_post_meta( 'project_url' );
$projectViews = carbon_get_the_post_meta( 'project_views' );
$projectAprriciations = carbon_get_the_post_meta( 'project_apr' );
$projectTypes = carbon_get_the_post_meta( 'project_type_group' );
$projectCoverImage = carbon_get_the_post_meta( 'project_cover_image' );


global $i;

if ($i > 6){
    $i = 1;
}

$j = $i+2;
$j = $j%2;
$k = '';

if($j===1){
    $k = 'fadeInRight';
}elseif($j===0){
    $k = 'fadeInLeft';
}


        ?>
<div class="col-md-6 animate-box" data-animate-effect="<?php echo $k; ?>">
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
<?php $i++;
