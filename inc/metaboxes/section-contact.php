<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function mRashid_section_metabox_contact(){
    Container::make( 'post_meta', __('Contact Section'))
        ->where('post_type', '=', 'page_section')
        ->where('post_id', 'CUSTOM', function($id){
            if(carbon_get_post_meta($id, 'selected_page_section') != 'contact'){
                return false;
            }else{
                return true;
            }
        })
        ->add_fields(
        array(
            Field::make( 'text', 'contact_section_title', __('Contact Section Title') ),
            Field::make( 'text', 'contact_section_subtitle', __('Contact Section Subtitle') ),
            Field::make( 'text', 'contact_email', __('Contact Email') ),
            Field::make( 'text', 'contact_address', __('Contact Address') ),
            Field::make( 'text', 'contact_phone', __('Contact Phone No.') )
            ->set_attribute( 'type', 'number' ),
            Field::make( 'text', 'contact_form_7_shortcode', __('Contact Form 7 Shortcode') )
        )
    );
    
}

add_action( 'carbon_fields_register_fields', 'mRashid_section_metabox_contact' );
