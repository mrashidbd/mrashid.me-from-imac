<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function mRashid_section_metabox_about() {                                                  

	Container::make( 'post_meta', __( 'About Section Details' ) )
	         ->where( 'post_type', '=', 'page_section' )
	         ->where( 'post_id', 'CUSTOM', function($id){
                 if( carbon_get_post_meta($id,'selected_page_section') != 'about' ){
                     return false;
                 }else{
                     return true;
                 }
             } )
             ->add_tab(
                __( 'Section About' ),
	         	array(
                    Field::make( 'text', 'about_title', __( 'About title' ) ),
                    Field::make( 'text', 'about_subtitle', __( 'About subtitle' ) ),
                    Field::make( 'rich_text', 'about_desc', __( 'About description' ) ),
		            Field::make( 'complex', 'about_services', __( 'Add service icon' ) )
                    ->set_max( 4 )
                    ->add_fields(
		                 	array(
			                    Field::make( 'text', 'about_service_title', __( 'Service Name' ) ),
                                Field::make( 'text', 'about_service_icon', __( 'Service Icon' ) )
                            )
                         )
                )
            )
            ->add_tab(
                __( 'Section Call to Action' ),
	         	array(
                    Field::make( 'textarea', 'cta_text', __( 'Call to action text' ) ),
                    Field::make( 'text', 'cta_btn', __( 'CTA Button' ) ),
                    Field::make( 'text', 'cta_link', __( 'Button Link' ) )
                )
            );
    
}

add_action( 'carbon_fields_register_fields', 'mRashid_section_metabox_about' );
