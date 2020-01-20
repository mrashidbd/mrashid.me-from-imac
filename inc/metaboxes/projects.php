<?php 
use Carbon_Fields\Container;
use Carbon_Fields\Field;

function mRashid_project_metabox() {                                                  

	Container::make( 'post_meta', __( 'Project Details' ) )
	         ->where( 'post_type', '=', 'project' )
	         ->add_fields(
	         	array(
                    Field::make( 'text', 'project_id', __( 'Project ID' ) )
                        ->set_attribute('type', 'number'),
                    Field::make( 'text', 'project_name', __( 'Project Name' ) ),
                    Field::make( 'text', 'project_url', __( 'Project URL' ) ),
                    Field::make( 'text', 'project_views', __( 'Project Views' ) )
                        ->set_attribute('type', 'number'),
                    Field::make( 'text', 'project_apr', __( 'Project Appriciations' ) )
                        ->set_attribute('type', 'number'),
                    Field::make( 'text', 'project_date', __( 'Project Published Date' ) )
                        ->set_attribute('type', 'number'),
                    Field::make( 'text', 'project_update', __( 'Project Updated at' ) )
                        ->set_attribute('type', 'number'),
		            Field::make( 'text', 'project_cover_image', __( 'Add a project cover image' ) ),
		            Field::make( 'complex', 'project_type_group', __( 'Add a project type' ) )
                    ->set_max( 5 )
                    ->add_fields(
		                 	array(
			                    Field::make( 'text', 'project_type', __( 'Project Type' ) )
                            )
                         ),
                    Field::make( 'complex', 'project_image_gallery', __( 'Add a project image gallery' ) )
                    ->set_max( 10 )
                    ->add_fields(
		                 	array(
			                    Field::make( 'text', 'project_image_cropped', __( 'Add a cropped project image' ) ),
			                    Field::make( 'text', 'project_image_original', __( 'Add an original project image' ) )
                            )
                         )
                    
                )
            );
    
}

add_action( 'carbon_fields_register_fields', 'mRashid_project_metabox' );
