<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function mRashid_section_metabox_counter() {                                                  

	Container::make( 'post_meta', __( 'Counter Animation' ) )
	         ->where( 'post_type', '=', 'page_section' )
	         ->where( 'post_id', 'CUSTOM', function($id){
                 if( carbon_get_post_meta($id,'selected_page_section') != 'numeric-data' ){
                     return false;
                 }else{
                     return true;
                 }
             } )
             ->add_fields(
	         	array(
                    Field::make( 'image', 'counter_background', __( 'Add Counter Background' ) ),
                    Field::make( 'text', 'data_speed', __( 'Animation Speed' ) )
                        ->set_default_value( 5000 ),
                    Field::make( 'text', 'refresh_interval', __( 'Animation refresh interval' ) )
                        ->set_default_value( 50 ),
		            Field::make( 'complex', 'single_counter', __( 'Add Counter' ) )
                        ->set_max( 4 )
                        ->add_fields(
		                 	array(
			                    Field::make( 'text', 'counter_label', __( 'Counter Label' ) ),
                                Field::make( 'text', 'count_from', __( 'Count From' ) )
                                    ->set_attribute( 'type', 'number' ),
                                Field::make( 'text', 'count_to', __( 'Count To' ) )
                                    ->set_attribute( 'type', 'number' )
                            )
                         )
                )
            );
    
}

add_action( 'carbon_fields_register_fields', 'mRashid_section_metabox_counter' );
