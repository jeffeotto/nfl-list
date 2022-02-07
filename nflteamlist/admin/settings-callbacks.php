<?php //  NFL Team List - Settings Callbacks



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}
    // callback: outputs orientative text for api key settings
	function nfllist_callback_section_api() {

		
		echo '<p>Place, if needed, your Api Key.</p>';
		
	}
	

/*
callback: aoutput api key input with default value from nfllist_options_default() function
on the main file

*/
function nfllist_callback_api_field( $args ) {
	 
	$options = get_option( 'nfllist_options', nfllist_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
	
	echo '<input id="nfllist_options_'. $id .'" name="nfllist_options['. $id .']" type="text" size="40" value="'. $value .'"><br />';
	echo '<label for="nfllist_options_'. $id .'">'. $label .'</label>';
}


