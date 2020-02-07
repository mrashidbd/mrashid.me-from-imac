<?php
/*
 * Template Name: OnePage Landing
 */

get_header(); ?>
<section id="colorlib-hero" class="js-fullheight" data-section="home" style="background: #fff url(<?php echo get_template_directory_uri(); ?>/assets/images/loader.gif) no-repeat center center;">
    <div class="flexslider js-fullheight">
        <ul class="slides">
            <?php $section_id = 56; get_template_part("section-templates/slider");?>
        </ul>
    </div>
</section>

<section class="colorlib-about" data-section="about">
    <div class="colorlib-narrow-content">
        <div class="row">
            <div class="col-md-12">
                <?php $section_id = 64; get_template_part("section-templates/about"); ?>
            </div>
        </div>
    </div>
</section>

<section class="colorlib-services" data-section="services">
    <div class="colorlib-narrow-content">
        <?php $section_id = 67; get_template_part("section-templates/services"); ?>
    </div>
</section>

<?php $section_id = 72; get_template_part("section-templates/counter"); ?>

<section class="colorlib-skills" data-section="skills">
    <?php $section_id = 77; get_template_part("section-templates/skills"); ?>
</section>

<section class="colorlib-education" data-section="education">
    <div class="colorlib-narrow-content">
        <?php $section_id = 80; get_template_part("section-templates/education"); ?>
    </div>
</section>

<section class="colorlib-experience" data-section="experience">
    <div class="colorlib-narrow-content">
        <?php $section_id = 83; get_template_part("section-templates/experience"); ?>
    </div>
</section>

<section class="colorlib-work" data-section="work">
    <div class="colorlib-narrow-content">

        <!--<a href="<?php //echo get_post_type_archive_link('project'); ?>">Project</a>-->

        <?php $section_id = 91; get_template_part("section-templates/work"); ?>

        <?php 
//pulling the data from behance api and storing them into our database
 if ( ! wp_next_scheduled( 'update_project_list' ) ) {
 wp_schedule_event( time(), 'weekly', 'update_project_list' );
 }
 add_action( 'update_project_list', 'get_projects_from_behance_api' );
 function get_projects_from_behance_api(){

 get_template_part("/inc/metaboxes/behance-data-input");

 }
?>
    </div>
</section>

<section class="colorlib-blog" data-section="blog">
    <div class="colorlib-narrow-content">

        <?php $section_id = 96; get_template_part("section-templates/blog"); ?>

    </div>
</section>

<section class="colorlib-contact" data-section="contact">
    <div class="colorlib-narrow-content">
        <?php $section_id = 99; get_template_part("section-templates/contact"); ?>
    </div>
</section>

<?php get_footer(); ?>
