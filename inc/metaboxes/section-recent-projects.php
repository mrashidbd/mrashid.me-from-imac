<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function mRashid_section_metabox_recent_work(){
    Container::make( 'post_meta', __('Recent Project Section'))
        ->where('post_type', '=', 'page_section')
        ->where('post_id', 'CUSTOM', function($id){
            if(carbon_get_post_meta($id, 'selected_page_section') != 'projects'){
                return false;
            }else{
                return true;
            }
        })
        ->add_fields(
        array(
            Field::make( 'text', 'recent_work_title', __('Recent Work Section Title') ),
            Field::make( 'text', 'recent_work_subtitle', __('Recent Work Section Subtitle') ),
            Field::make( 'complex', 'recent_work_filter', __('Add filter') )
                ->set_max(10)
                ->add_fields(
                    array(
                        Field::make('text', 'filter_item', __('Add filter item'))
                    )
                )
        )
    );
    
}

add_action( 'carbon_fields_register_fields', 'mRashid_section_metabox_recent_work' );
