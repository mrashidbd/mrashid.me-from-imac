<?php 


function custom_api_to_get_projects_callback($request){
    $posts_data = array();
    $paged = $request->get_param('page');
    $paged = (isset($paged) || !(empty($paged))) ? $paged : 1;
    $posts = get_posts( array(
      'post_type'       => 'project',
      'post_status'     => 'publish',
      'posts_per_page'  => 6,
      'orderby'         => 'date',
      'order'           => 'ASC',
      'paged'           => $paged
    ));
    foreach($posts as $post){
      $id = $post->ID;
      $posts_data[] = (object)array(
        'id' => $id,
        'title' => $post->post_title,
        'slug' => $post->post_name,
        'project_name' => carbon_get_post_meta( $id, 'project_name' ),
        'project_url' => carbon_get_post_meta( $id, 'project_url' ),
        'project_views' => carbon_get_post_meta( $id, 'project_views' ),
        'project_appriciations' => carbon_get_post_meta( $id, 'project_apr' ),
        'project_type' => carbon_get_post_meta( $id, 'project_type_group' ),
        'project_cover_image' => carbon_get_post_meta( $id, 'project_cover_image' )
        
        
      );
    }
    return $posts_data;
}
