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

			get_template_part( 'template-parts/content', get_post_type() );
		}
	}

	?>
</section>





<?php get_footer(); ?>
