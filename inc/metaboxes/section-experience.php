<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function mRashid_section_metabox_experience(){
    Container::make( 'post_meta', __('Expereince Section'))
        ->where('post_type', '=', 'page_section')
        ->where('post_id', 'CUSTOM', function($id){
            if(carbon_get_post_meta($id, 'selected_page_section') != 'experience'){
                return false;
            }else{
                return true;
            }
        })
        ->add_fields(
        array(
            Field::make( 'text', 'experience_title', __('Experience Section Title') ),
            Field::make( 'text', 'experience_subtitle', __('Experience Section Subtitle') ),
            Field::make( 'complex', 'experience_item', __('Add Experience') )
                ->set_max(10)
                ->add_fields(
                    array(
                        Field::make('text', 'title', __('Experience Title')),
                        Field::make('textarea', 'content', __('Experience Content')),
                        Field::make('text', 'from', __('Experience start date'))
                            ->set_attribute( 'type', 'number' ),
                        Field::make('text', 'to', __('Experience end date'))
                            ->set_attribute( 'type', 'number' ),
                        Field::make( 'text', 'icon_class', __('Experience Icon class') )
                    )
                )
        )
    );
    
}

add_action( 'carbon_fields_register_fields', 'mRashid_section_metabox_experience' );
