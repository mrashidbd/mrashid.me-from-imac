<?php

//Includes TGM required plugins
require_once get_theme_file_path('/lib/mrashid-required-plugins.php');

//Includes metaboxes for one-page template
require_once get_theme_file_path('/inc/metaboxes/one-page.php');

//Includes metaboxes for 'page_section' post type
require_once get_theme_file_path('/inc/metaboxes/sections.php');

//Inlcudes metaboxes for each individual 'page_section' post
require_once get_theme_file_path('/inc/metaboxes/section-slider.php');
require_once get_theme_file_path('/inc/metaboxes/section-about.php');
require_once get_theme_file_path('/inc/metaboxes/section-services.php');
require_once get_theme_file_path('/inc/metaboxes/section-counter.php');
require_once get_theme_file_path('/inc/metaboxes/section-skills.php');
require_once get_theme_file_path('/inc/metaboxes/section-education.php');
require_once get_theme_file_path('/inc/metaboxes/section-experience.php');
require_once get_theme_file_path('/inc/metaboxes/section-recent-projects.php');
require_once get_theme_file_path('/inc/metaboxes/section-blog.php');
require_once get_theme_file_path('/inc/metaboxes/section-contact.php');

//Includes metaboxes for 'project' post type
require_once get_theme_file_path('/inc/metaboxes/projects.php');


//Carbon Fields Theme Options
require_once get_theme_file_path('/inc/theme-options/main.php');



if ( site_url() == "http://mrashid.test/dev" ) {
	define( "VERSION", time() );
} else {
	define( "VERSION", wp_get_theme()->get("Version") );
}

function mRashid_theme_setup(){
    load_theme_textdomain( 'mRashid' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'html5', array(
    	'search-form',
	    'comment-form',
	    'comment-list',
	    'gallery',
	    'caption'
    ) );
    add_theme_support( 'post-formats', array( 'image', 'gallery', 'quote', 'audio', 'video', 'link' ) );
    add_theme_support( 'title-tag' );
    add_editor_style('assets/css/editor-style.css');
    
    require_once( get_theme_file_path('vendor/autoload.php' ));
	\Carbon_Fields\Carbon_Fields::boot();
}

add_action( "after_setup_theme", "mRashid_theme_setup" );

 
function add_cron_interval( $schedules ) {
    $schedules['weekly'] = array(
        'interval' => 604800,
        'display'  => esc_html__( 'Every Weeek' )
    );
 
    return $schedules;
}

add_filter( 'cron_schedules', 'add_cron_interval' );





function mRashid_assets(){

	// Including the stylesheets

	wp_enqueue_style( "animate", get_theme_file_uri("/assets/css/animate.css"), NULL, VERSION );
	wp_enqueue_style( "font-awesome", get_theme_file_uri("/assets/css/font-awesome.min.css"), NULL, VERSION  );
	wp_enqueue_style( "bootstrap", get_theme_file_uri("/assets/css/bootstrap.css"), NULL, VERSION  );
	wp_enqueue_style( "flexslider", get_theme_file_uri("/assets/css/flexslider.css"), NULL, VERSION  );
	//wp_enqueue_style( "owl-carousel", get_theme_file_uri("/assets/css/owl.carousel.min.css"), NULL, VERSION  );
	//wp_enqueue_style( "owl-theme", get_theme_file_uri("/assets/css/owl.theme.default.min.css"), NULL, VERSION  );
	wp_enqueue_style( "main-style", get_theme_file_uri("/assets/css/style.css"), NULL, VERSION  );
	wp_enqueue_style( "mRashid-main-stylesheet", get_stylesheet_uri());

	// Discarding the core WP jquery
	wp_dequeue_script('jquery');
	wp_dequeue_script('jquery-core');
	wp_dequeue_script('jquery-migrate');

	// including all JavaScripts
	wp_enqueue_script( "modernizer", get_theme_file_uri( "/assets/js/modernizr-2.6.2.min.js" ), NULL, VERSION );


	wp_enqueue_script( "jQuery", '//code.jquery.com/jquery-2.2.4.min.js', NULL, VERSION, true );
	wp_enqueue_script( "jquery-easing", get_theme_file_uri( "/assets/js/jquery.easing.1.3.js" ), array("jQuery"), VERSION, true );
	wp_enqueue_script( "bootstrap-js", get_theme_file_uri( "/assets/js/bootstrap.min.js" ), array("jQuery"), VERSION, true );
	wp_enqueue_script( "jquery-waypoints", get_theme_file_uri( "/assets/js/jquery.waypoints.min.js" ), array("jQuery"), VERSION, true );
	wp_enqueue_script( "jquery-flexslider", get_theme_file_uri( "/assets/js/jquery.flexslider-min.js" ), array("jQuery"), VERSION, true );
	//wp_enqueue_script( "isotope", get_theme_file_uri( "/assets/js/isotope.pkgd.min.js" ), array("jQuery"), VERSION, true );
	//wp_enqueue_script( "owl-carousel", get_theme_file_uri( "/assets/js/owl.carousel.min.js" ), array("jQuery"), VERSION, true );
	wp_enqueue_script( "jquery-countTo", get_theme_file_uri( "/assets/js/jquery.countTo.js" ), array("jQuery"), VERSION, true );
	wp_enqueue_script( "main", get_theme_file_uri( "/assets/js/main.js" ), NULL, VERSION, true );
}
add_action( "wp_enqueue_scripts", "mRashid_assets" );


function get_max_pages() {
    global $wp_query;
    return $wp_query->max_num_pages;
}

function slice_word($text, $length)
{
    if(strlen($text) > $length) {
        $text = substr($text, 0, strpos($text, ' ', $length));
    }

    return $text;
}

function slice_excerpt($str,$number)
    {
       $array_str = explode(" ", $str);
       if(isset($array_str[$number]))
       {
         return implode(" ",array_slice($array_str, 0, $number));
       }
     return $str;
    }




function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
//    if($count==''){
//        delete_post_meta($postID, $count_key);
//        add_post_meta($postID, $count_key, '0');
//        return "0 View";
//    }
    return $count;
}

function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
