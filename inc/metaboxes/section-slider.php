<?php


$section_id = 0;
if (isset( $_REQUEST['post']) || isset( $_REQUEST['post_ID'] ) ) {
    $section_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function mRashid_section_metabox_slider() {                                                  

    Container::make( 'post_meta', __( 'All Slides' ) )
	         ->where( 'post_type', '=', 'page_section' )
	         ->where( 'post_id', 'CUSTOM', function($id){
                 if( carbon_get_post_meta($id,'selected_page_section') != 'slider' ){
                     return false;
                 }else{
                     return true;
                 }
             } )
             ->add_fields(
	         	array(
		            Field::make( 'complex', 'slider_array', __( 'Add Slides' ) )
		                 ->add_fields(
		                 	array(
			                    Field::make( 'image', 'slider_image', __( 'Add Slide Image' ) ),
                                Field::make( 'text', 'slider_title', __( 'Slider Title' ) ),
                                Field::make( 'text', 'slider_subtitle', __( 'Slider Subtitle' ) ),
                                Field::make( 'text', 'slider_button', __( 'Slider Button Text' ) ),
                                Field::make( 'text', 'slider_button_link', __( 'Slider Button Link' ) ),
                                Field::make( 'text', 'slider_button_icon', __( 'Slider Button Icon' ) )
                            )
                         )
                    
                )
             
    );
}

add_action( 'carbon_fields_register_fields', 'mRashid_section_metabox_slider' );
