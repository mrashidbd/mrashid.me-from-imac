<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function mRashid_section_metabox_education() {                                                  

	Container::make( 'post_meta', __( 'Education Section' ) )
	         ->where( 'post_type', '=', 'page_section' )
	         ->where( 'post_id', 'CUSTOM', function($id){
                 if( carbon_get_post_meta($id,'selected_page_section') != 'education' ){
                     return false;
                 }else{
                     return true;
                 }
             } )
             ->add_fields(
	         	array(
                    Field::make( 'text', 'education_title', __( 'Education section title' ) ),
                    Field::make( 'text', 'education_subtitle', __( 'Education section subtitle' ) ),
		            Field::make( 'complex', 'education_accordion', __( 'Add education accordion' ) )
                    ->set_max( 8 )
                    ->add_fields(
		                 	array(
			                    Field::make( 'text', 'accordion_title', __( 'Education Title' ) ),
                                Field::make( 'textarea', 'accordion_content', __( 'Education Details' ) )
                            )
                         )
                )
            );
}

add_action( 'carbon_fields_register_fields', 'mRashid_section_metabox_education' );
