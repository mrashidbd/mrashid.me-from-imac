<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;


function mRashid_theme_options(){

// Default options page
$main_container =Container::make( 'theme_options', __( 'Theme Options' ) )
    ->add_fields( array(
        Field::make( 'image', 'site_logo', __( 'Upload Site Logo' ) ),
        Field::make( 'text', 'site_name', __('Site Name') ),
        Field::make( 'complex', 'job_entries', __( 'Add job entries' ) )
        ->set_max( 6 )
        ->add_fields(
                array(
                    Field::make( 'text', 'job_provider', __( 'Job Provider' ) ),
                    Field::make( 'text', 'job_position', __( 'Job Position' ) ),
                    Field::make( 'text', 'job_link', __( 'Place the link' ) )
                )
             ),
        
        Field::make( 'text', 'social_link_title', __('Social Widget title') ),
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
