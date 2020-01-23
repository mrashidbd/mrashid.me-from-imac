<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function mRashid_section_metabox_blog(){
    Container::make( 'post_meta', __('Blog Section'))
        ->where('post_type', '=', 'page_section')
        ->where('post_id', 'CUSTOM', function($id){
            if(carbon_get_post_meta($id, 'selected_page_section') != 'blog'){
                return false;
            }else{
                return true;
            }
        })
        ->add_fields(
        array(
            Field::make( 'text', 'blog_section_title', __('Blog Section Title') ),
            Field::make( 'text', 'blog_section_subtitle', __('Blog Section Subtitle') ),
            Field::make( 'text', 'blog_archive_link', __('Blog Archive Link') )            
        )
    );
    
}

add_action( 'carbon_fields_register_fields', 'mRashid_section_metabox_blog' );
