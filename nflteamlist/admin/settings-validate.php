<?php //  NFL Team List - Validate Settings


// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}

// sanitize api key input
function nfllist_callback_validate_options( $input ) {
	// api key
	if ( isset( $input['api_key'] ) ) {
			
		$input['api_key'] = sanitize_text_field( $input['api_key'] );
		
	}
   
	return $input;

}