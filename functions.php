<?php
//###################### Paths and Globals ##################################
global $gs;

$pf_inc = dirname(__FILE__) . '/includes/functions/';
$pf_inc_cus = dirname(__FILE__) . '/includes/functions/customfields/';
$pf_inc_typ = dirname(__FILE__) . '/includes/functions/customtypes/';
$pf_inc_tax = dirname(__FILE__) . '/includes/functions/customtax/';

//simple globals
function gbls($var){
	$globals = array(
		'cssframework' => 'Pure' //see headframework.php for options
	);
	
	return($globals[$var]);
}

//###################### Core Includes #################################
require_once($pf_inc . 'wp-core-update.php'); //updates WordPress Automatically
require_once($pf_inc . 'breadcrumbs.php'); //Provides breadcrumb functions
require_once($pf_inc . 'useful.php'); //Range of useful functions
require_once($pf_inc . 'page-numbering.php'); //Provides page numbering function
require_once($pf_inc . 'wp-admin-modifications.php'); //Core mods to admin (posts = news etc)
require_once($pf_inc . 'metabuilder.php'); //Provides settings and post meta to every template, very important

require_once($pf_inc . 'headframework.php'); //builds the includes <head></head>
require_once($pf_inc . 'includebuilder.php'); //builds the includes <head></head>

//###################### Core/Site Specific Includes (Modifiable) ######################
/*Ensure site specific includes are in the /customcode folder*/
require_once($pf_inc . 'wp-pre-get-posts.php'); //Pre get post hook
require_once($pf_inc . 'sidebars.php'); //Register sidebars here

//###################### General Setup Processes #######################
require_once($pf_inc . 'force-homepage.php');  //creates a Homepage, gives it the home template, custom fields and forces it as front page.

//###################### Admin Custom Field Inclusion ##################
//require_once($pf_inc_cus . 'general.php'); //example for developers
require_once($pf_inc_cus . 'settings-lookandfeel.php'); 
require_once($pf_inc_cus . 'settings-companydetails.php');
require_once($pf_inc_cus . 'settings-analytics.php');



//###################### Taxonomy Inclusion ############################
add_action( 'init', 'create_taxonomies', 0 );
function create_taxonomies(){
	global $pf_inc_tax;
	/* include taxonomies here */
	//require_once($pf_inc_tax . 'general.php'); //example for developers
	/*-------------------------*/	
}

//###################### Custom Post Type Inclusion ####################
add_action( 'init', 'create_post_types' );
function create_post_types() {	
	global $pf_inc_typ;
	/* include post types here */
	//require_once($pf_inc_typ . 'general.php'); //example for developers
	require_once($pf_inc_typ . 'settings.php');
	require_once($pf_inc_typ . 'testimonials.php');
	require_once($pf_inc_typ . 'resources.php');
	/*-------------------------*/
}

add_theme_support( 'post-thumbnails' ); 

add_filter( 'allow_dev_auto_core_updates', '__return_false' );
add_filter( 'allow_minor_auto_core_updates', '__return_true' );
add_filter( 'allow_major_auto_core_updates', '__return_true' );
add_filter( 'auto_update_plugin', '__return_true' );

function register_my_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );


/*function pf_remove_menu_items() {
    if( get_field('pf_resources_on_site', 9) == 'Off' ):
        remove_menu_page( 'edit.php?post_type=pf_resources' );
    endif;
    if( get_field('pf_testimonials_on_site', 9) == 'Off' ):
        remove_menu_page( 'edit.php?post_type=pf_testimonials' );
    endif;
}
add_action( 'admin_menu', 'pf_remove_menu_items' ); */

function wpb_first_and_last_menu_class($items) {

   foreach($items as $k => $v){
$parent[$v->menu_item_parent][] = $v;
}

foreach($parent as $k => $v){
$v[0]->classes[] = 'first-menu-item';
$v[count($v)-1]->classes[] = 'last-menu-item';
}

return $items;


}
add_filter('wp_nav_menu_objects', 'wpb_first_and_last_menu_class');



?>

