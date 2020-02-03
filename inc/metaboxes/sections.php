<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;


function mRashid_section_metaboxes() {

	Container::make( 'post_meta', __( 'Section to use' ) )
	         ->where( 'post_type', '=', 'page_section' )
	         ->add_fields(
	         	array(
		            Field::make( 'select', 'selected_page_section', __( 'Page Section' ) 
		                 ->add_options( 
                             array(
                                'slider'=>__('Slider', 'mRashid'),
                                'about'=>__('About', 'mRashid'),
                                'services'=>__('Services', 'mRashid'),
                                'numeric-data'=>__('Numeric Data', 'mRashid'),
                                'skills'=>__('My Skills', 'mRashid'),
                                'education'=>__('My Education', 'mRashid'),
                                'experience'=>__('Work Experience', 'mRashid'),
                                'projects'=>__('Recent Projects', 'mRashid'),
                                'blog'=>__('Recent Blog', 'mRashid'),
                                'contact'=>__('Contact', 'mRashid')
                            )
                        )
		            )
	            );
}

add_action( 'carbon_fields_register_fields', 'mRashid_section_metaboxes' );
