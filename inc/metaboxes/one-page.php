<?php

function select_page_sections(){
	$page_sections = get_posts(array(
		'post_type' => 'page_section',
		'showposts' => -1
	));
	$options = array();
	if ( ! empty( $page_sections ) && ! is_wp_error( $page_sections ) ){
		foreach ( $page_sections as $post ) {
			$options[ $post->ID ] = $post->post_title;
		}
		return $options;
	}
}


use Carbon_Fields\Container;
use Carbon_Fields\Field;


function mRashid_op_metaboxes() {

	Container::make( 'post_meta', __( 'Homepage Settings' ) )
	         ->where( 'post_type', '=', 'page' )
	         ->where( 'post_template', '=', 'page-templates/landing.php' )
	         ->add_fields(
	         	array(
		            Field::make( 'complex', 'page_sections', __( 'One Page Sections' ) )
		                 ->add_fields(
		                 	array(
			                    Field::make( 'select', 'page_section', __( 'Select Sections' ) )
				                    ->add_options( 'select_page_sections' )
			                         )
		                 )
		            )
	            );
}

add_action( 'carbon_fields_register_fields', 'mRashid_op_metaboxes' );
