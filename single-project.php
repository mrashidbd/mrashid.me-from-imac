<?php 
get_header();
?>

<div class="colorlib-narrow-content">
    <div class="row">
        <div class="mrashid-blog-posts">
            <?php 

if(have_posts()) : while(have_posts()) : the_post();
            $postImage = get_the_post_thumbnail_url(get_the_ID(), 'medium');
            $projectName = carbon_get_the_post_meta( 'project_name' );
            $projectUrl = carbon_get_the_post_meta( 'project_url' );
            $projectViews = carbon_get_the_post_meta( 'project_views' );
            $projectAprriciations = carbon_get_the_post_meta( 'project_apr' );
            $projectTypes = carbon_get_the_post_meta( 'project_type_group' );
            $projectCoverImage = carbon_get_the_post_meta( 'project_cover_image' );
            $imageGallery = carbon_get_the_post_meta( 'project_image_gallery' );

?>
            <div class="col-md-12">
                <div class="project-details">
                    <h3><?php the_title(); ?></h3>
                    <!-- <h3><a href="<?php //the_permalink(); ?>"><?php //echo esc_html( $projectName ); ?></a></h3>-->
                    <?php the_content(); ?>
                </div>

                <div class="project-owl-carousel">
                    <?php foreach ($imageGallery as $image): ?>
                    <img src="<?php echo $image['project_image_cropped']; ?>" alt="">
                    <?php endforeach; ?>
                </div>


            </div>
            <?php 


?>
            <div class="col-md-12">
                <div class="project" style="background-image: url(<?php echo esc_url($projectCoverImage); ?>);">
                    <div class="desc">
                        <div class="con">

                            <span><?php foreach($projectTypes as $projectType){
                        echo esc_html($projectType['project_type']) . ' | ';
                    } ?></span>

                        </div>
                    </div>
                    <p class="icon">
                        <span><a href="<?php echo esc_url( $projectUrl ); ?>" target="_blank"><i class="fa fa-share-alt"></i></a></span>
                        <span><i class="fa fa-eye"></i> <?php echo esc_html( $projectViews ); ?></span>
                        <span><i class="fa fa-thumbs-up"></i> <?php echo esc_html( $projectAprriciations ); ?></span>
                    </p>
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
