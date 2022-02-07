<?php
/*
Plugin Name:  NFL Teams List
Description:  Listing teams from US National Football Leage
Plugin URI:   https://github.com/jeffeotto/nfl-listteams
Author:       Jeffe Otto
Version:      1.0
Text Domain:  nflteamlist
Domain Path:  /languages
License:      GPL v2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
*/

// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}

//  redirection to page settings on plugin activation
function nfl_activation_redirect( $plugin ) {
    if( $plugin == plugin_basename( __FILE__ ) ) {
        exit( wp_redirect( admin_url( 'options-general.php?page=nflteamlist' ) ) );
    }
}
add_action( 'activated_plugin', 'nfl_activation_redirect' );


//require admin files
if ( is_admin() ) {
    require_once plugin_dir_path( __FILE__ ) . 'admin/admin-menu.php';
    require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';
    require_once plugin_dir_path( __FILE__ ) . 'admin/settings-callbacks.php';
    require_once plugin_dir_path( __FILE__ ) . 'admin/settings-register.php';
    require_once plugin_dir_path( __FILE__ ) . 'admin/settings-validate.php';    
}

//require includes files
require_once plugin_dir_path( __FILE__ ) . 'includes/http-request.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/nfl-enqueues.php';

// default plugin options
function nfllist_options_default() {

	return array(
		'api_key'     => '74db8efa2a6db279393b433d97c2bc843f8e32b0',
	);

}


//delete transient
register_deactivation_hook( __FILE__, 'nfl_delete_transiemt' );
function nfl_delete_transiemt() {
    delete_transient('nfl_check' );
}