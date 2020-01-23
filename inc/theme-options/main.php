<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;


function mRashid_theme_options(){

// Default options page
$main_container =Container::make( 'theme_options', __( 'Theme Options' ) )
    ->add_fields( array(
        
    ) );
    
Container::make( 'theme_options', __( 'Social Links', 'mrashid' ) )
    ->set_page_parent( $main_container ) // reference to a top level container
    ->add_fields( array(
        Field::make( 'text', 'social_link_title', __('Social link title') ),
        Field::make( 'complex', 'social_links', __( 'Add social link item' ) )
        ->set_max( 6 )
        ->add_fields(
                array(
                    Field::make( 'text', 'social_link', __( 'Place the link' ) ),
                    Field::make( 'text', 'icon_class', __( 'Icon Class' ) )
                )
             )
    ) );
    
}

add_action( 'carbon_fields_register_fields', 'mRashid_theme_options' );
