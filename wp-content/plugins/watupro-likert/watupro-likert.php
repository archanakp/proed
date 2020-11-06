<?php
/*
Plugin Name: WatuPRO Likert Scale Survey Maker
Plugin URI: 
Description: A plugin for easy making Likert Scale surveys in WatuPRO 
Author: Kiboko Labs
Version: 0.7
Author URI: http://calendarscripts.info/
License: GPLv2 or later
*/

define( 'WATUPROLIKERT_PATH', dirname( __FILE__ ) );
define( 'WATUPROLIKERT_RELATIVE_PATH', dirname( plugin_basename( __FILE__ )));
define( 'WATUPROLIKERT_URL', plugin_dir_url( __FILE__ ));

include(WATUPROLIKERT_PATH.'/controllers/shortcodes.php');
include(WATUPROLIKERT_PATH.'/controllers/actions.php');
include(WATUPROLIKERT_PATH.'/controllers/main.php');

register_activation_hook( __FILE__, 'watuprolikert_activate' );
add_action('init', 'watuprolikert_init');

function watuprolikert_activate() {		
	global $user_ID, $wpdb;
	watuprolikert_init();
		
	// create database tables or add DB fields
}

function watuprolikert_init() {
	global $wpdb;
	
	// define constants for table names, if any	
   // define('WATUPROCUSTOM_MYTABLE', $wpdb->prefix.'watuprocustom_mytable');
	
   // add custom admin menu entries if any
	add_action('watupro_admin_menu', 'watuprolikert_menu');
	
	// add custom shortcodes here. This will call the shortcode handler in controller/shortcodes.php
	add_shortcode('watuprolikert-barchart', array('WatuPROLikertShortcodes', 'barchart'));
	
	// add custom action handlers if any
	// add_action('watupro_completed_exam', array('WatuPROCustomActions', 'completed_exam'));
}

function watuprolikert_menu() {
	add_submenu_page('watupro_exams', __('Likert Scale Survey', 'watuprolik'), __('Likert Scale Survey', 'watuprolik'), WATUPRO_MANAGE_CAPS, 
		'watuprolikert_create', array('WatuPROLikert', 'create'));
}