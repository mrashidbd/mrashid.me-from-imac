<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function mRashid_section_metabox_service() {                                                  

	Container::make( 'post_meta', __( 'Services Section' ) )
	         ->where( 'post_type', '=', 'page_section' )
	         ->where( 'post_id', 'CUSTOM', function($id){
                 if( carbon_get_post_meta($id,'selected_page_section') != 'services' ){
                     return false;
                 }else{
                     return true;
                 }
             } )
             ->add_fields(
	         	array(
                    Field::make( 'text', 'service_title', __( 'Service title' ) ),
                    Field::make( 'text', 'service_subtitle', __( 'Service subtitle' ) ),
		            Field::make( 'complex', 'service_box', __( 'Add service box' ) )
                    ->set_max( 6 )
                    ->add_fields(
		                 	array(
			                    Field::make( 'text', 'expertise_title', __( 'Expertise Title' ) ),
                                Field::make( 'text', 'expertise_icon', __( 'Expertise Icon' ) ),
                                Field::make( 'textarea', 'expertise_texts', __( 'Expertise texts' ) )
                            )
                         )
                )
            );
    
}

add_action( 'carbon_fields_register_fields', 'mRashid_section_metabox_service' );
