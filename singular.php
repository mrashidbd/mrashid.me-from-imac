<?php
/**
 * The template for displaying single posts and pages.
 */

get_header();
?>

<section id="colorlib-page" data-section="page">
    <?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();
            setPostViews(get_the_ID());

			get_template_part( 'template-parts/content', get_post_type() );
		}
	}

	?>
</section>
<a href="<?php echo get_post_type_archive_link('project'); ?>">All Projects</a>




<?php get_footer(); ?>
