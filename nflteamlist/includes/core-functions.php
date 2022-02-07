<?php

////  NFL Team List - Core Functions

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}
//validate api key input 
function nfllist_api_key( $key ) {
	
if ( isset( $options['api_key'] ) && ! empty( $options['api_key'] ) ) {
		
		$key = esc_attr( $options['api_key'] );
		
	}
	
	return $key;
}
//add_filter( 'admin_init', 'nfllist_api_key' );

add_action( 'admin_post_nopriv_process_form', 'nfllist_api_key' );
add_action( 'admin_post_process_form', 'nfllist_api_key' );
