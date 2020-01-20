<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

function mRashid_section_metabox_skill() {                                                  

	Container::make( 'post_meta', __( 'Skill Animation Section' ) )
	         ->where( 'post_type', '=', 'page_section' )
	         ->where( 'post_id', 'CUSTOM', function($id){
                 if( carbon_get_post_meta($id,'selected_page_section') != 'skills' ){
                     return false;
                 }else{
                     return true;
                 }
             } )
             ->add_fields(
	         	array(
                    Field::make( 'text', 'skill_title', __( 'Skill section title' ) ),
                    Field::make( 'text', 'skill_subtitle', __( 'Skill section subtitle' ) ),
                    Field::make( 'rich_text', 'skill_desc', __( 'Skill section description' ) ),
		            Field::make( 'complex', 'skill_single_anime', __( 'Add skill line' ) )
                    ->set_max( 8 )
                    ->add_fields(
		                 	array(
			                    Field::make( 'text', 'skill_label', __( 'Skill Title' ) ),
                                Field::make( 'text', 'skill_achieved', __( 'Skill achieved (in %)' ) )
                                ->set_attribute( 'type', 'number' )
                            )
                         )
                )
            );
}

add_action( 'carbon_fields_register_fields', 'mRashid_section_metabox_skill' );
