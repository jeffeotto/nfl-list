<?php
// // NFL Team List - Resgister Settings


// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}
// register plugin settings and Api Key options for the api input
function nfllist_register_settings() {
	
	
	register_setting( 
		'nfllist_options', 
		'nfllist_options', 
		'nfllist_callback_validate_options' 
	);
    
 
    add_settings_section( 
		'nfllist_section_api', 
		'Insert Api Key', 
		'nfllist_callback_section_api', 
		'nflteamlist'
	);	



	add_settings_field(
		'api_key',
		'Api Key',
		'nfllist_callback_api_field',
		'nflteamlist',
		'nfllist_section_api',
		[ 'id' => 'api_key', 'label' => 'Api Key Activation' ]
	);

}
add_action( 'admin_init', 'nfllist_register_settings' );


