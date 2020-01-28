<?php

/**
*
* Preparing first API Call to grab project list data from behance;
*
**/

$apiUserID = 'mamunurbd';
$apiURI = 'https://www.behance.net/v2/users/';
$apiLinker = '/projects?api_key=';
$apiSkey = 'wxz4mUjYYscNDaiVXOsNLna6JjCsjw0i';

//http://www.behance.net/v2/users/mamunurbd/projects?api_key=wxz4mUjYYscNDaiVXOsNLna6JjCsjw0i
//http://www.behance.net/v2/projects/{project_id}?api_key={the_api_key}

$queryUrl = $apiURI . $apiUserID . $apiLinker . $apiSkey;

$results = wp_remote_retrieve_body(wp_remote_get($queryUrl));

$results = json_decode($results, true);

if( ! is_array( $results ) || empty( $results ) ){
	echo "ERROR Retrieving Mass Project Data from BEHANCE";
	return false;
}

$project_array[] = $results;

$projects = $project_array[0]["projects"];


/**
*
* First loop to insert data into database;
*
**/


  foreach( $projects as $project ){
    
$pid = $project['id'];
$pname = $project['name'];
      
$pslug = slugify($pid . '-' . $pname);
      
$ptags = $project['fields'];
      
$pthumb = $project['covers'];
      
$pviews = $project['stats']['views'];
$pappre = $project['stats']['appreciations'];

$pdate = $project['published_on'];
$pupdate = $project['modified_on'];
$purl = $project['url'];

      
    $existing_project = get_page_by_path( $pslug, 'OBJECT', 'project' );
    if( $existing_project === null  ){
      
      $inserted_project = wp_insert_post( [
        'post_name' => $pslug,
        'post_title' => $pname,
        'post_type' => 'project',
        'post_status' => 'publish'
      ] );
        //die(var_dump($inserted_project));
      if( is_wp_error( $inserted_project ) || $inserted_project === 0 ) {
        // die('Could not insert project: ' . $pslug);
        error_log( 'Could not insert project: ' . $pslug );
        continue;
      }

carbon_set_post_meta( $inserted_project, 'project_id', $pid );
carbon_set_post_meta( $inserted_project, 'project_name', $pname );
carbon_set_post_meta( $inserted_project, 'project_url', $purl );
carbon_set_post_meta( $inserted_project, 'project_views', $pviews );
carbon_set_post_meta( $inserted_project, 'project_apr', $pappre );
carbon_set_post_meta( $inserted_project, 'project_date', $pdate );
carbon_set_post_meta( $inserted_project, 'project_update', $pupdate );

carbon_set_post_meta( $inserted_project, 'project_type_group[0]/project_type', __('Behance') );
          
foreach($ptags as $key => $ptag){
    $key++;
    carbon_set_post_meta( $inserted_project, 'project_type_group[' . $key . ']/project_type', $ptag );
}

carbon_set_post_meta( $inserted_project, 'project_cover_image', $pthumb[404] );
        
/**
*
* Second loop to insert single project images;
*
**/
        
//http://www.behance.net/v2/projects/{project_id}?api_key={the_api_key}

$projectQueryUrl = 'https://www.behance.net/v2/projects/' . $pid . '?api_key=' . $apiSkey;

$singleProject = wp_remote_retrieve_body(wp_remote_get($projectQueryUrl));

$projectData = json_decode($singleProject, true);

if( ! is_array( $projectData ) || empty( $projectData ) ){
	echo "ERROR Retrieving Single Project Data from BEHANCE";
	return false;
}

//die(var_dump($projectData));

$projectImages = $projectData['project']['modules'];
    
$p = 0;    
    
foreach( $projectImages as $projectImage ) {
    
  carbon_set_post_meta( $inserted_project, 'project_image_gallery[' . $p . ']/project_image_cropped', $projectImage['sizes']['max_1200'] );
  carbon_set_post_meta( $inserted_project, 'project_image_gallery[' . $p . ']/project_image_original', $projectImage['sizes']['original'] );

    $p++;
}
    
    } else {
      
    $existing_project_id = $existing_project->ID;
    $exisiting_project_timestamp = carbon_get_post_meta($existing_project_id, 'project_update');
    if( $project->modified_on > $exisiting_project_timestamp ){

    carbon_set_post_meta( $existing_project_id, 'project_id', $pid );
    carbon_set_post_meta( $existing_project_id, 'project_name', $pname );
    carbon_set_post_meta( $existing_project_id, 'project_url', $purl );
    carbon_set_post_meta( $existing_project_id, 'project_views', $pviews );
    carbon_set_post_meta( $existing_project_id, 'project_apr', $pappre );
    carbon_set_post_meta( $existing_project_id, 'project_date', $pdate );
    carbon_set_post_meta( $existing_project_id, 'project_update', $pupdate );
    carbon_set_post_meta( $existing_project_id, 'project_type_group[0]/project_type', __('Behance') );

foreach($ptags as $key => $ptag){
    $key++;
    carbon_set_post_meta( $existing_project_id, 'project_type_group[' . $key . ']/project_type', $ptag );
}

    carbon_set_post_meta( $existing_project_id, 'project_cover_image_group[' . $p . ']/project_cover_image', $pthumb[404] );

/**
*
* Second loop to insert single project images;
*
**/

        $projectQueryUrl = 'https://www.behance.net/v2/projects/' . $pid . '?api_key=' . $apiSkey;

        $singleProject = wp_remote_retrieve_body(wp_remote_get($projectQueryUrl));

        $projectData = json_decode($singleProject, true);

        if( ! is_array( $projectData ) || empty( $projectData ) ){
            echo "ERROR Retrieving Single Project Data from BEHANCE";
            return false;
        }

        $projectImages = $projectData['project']['modules'];

        $p = 0;    

        foreach( $projectImages as $projectImage ) {

            carbon_set_post_meta( $inserted_project, 'project_image_gallery[' . $p . ']/project_image_cropped', $projectImage['sizes']['max_1200'] );
            carbon_set_post_meta( $inserted_project, 'project_image_gallery[' . $p . ']/project_image_original', $projectImage['sizes']['original'] );

            $p++;
        }          
          
          
      }
    }
  }

//function slugify($text)
//{
// // replace non letter or digits by -
// $text = preg_replace('~[^\pL\d]+~u', '-', $text);
//
// // transliterate
// $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
//
// // remove unwanted characters
// $text = preg_replace('~[^-\w]+~', '', $text);
//
// // trim
// $text = trim($text, '-');
//
// // remove duplicate -
// $text = preg_replace('~-+~', '-', $text);
//
// // lowercase
// $text = strtolower($text);
//
// if (empty($text)) {
// return 'n-a';
// }
//
// return $text;
//}
