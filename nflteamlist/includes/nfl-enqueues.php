<?php

//  NFL Team List - Enqueues

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

//enqueues external bootstrap css and local js file

add_action( 'wp_enqueue_scripts', 'nfl_enqueue_boostrap_css' );
function nfl_enqueue_boostrap_css() {
  
  $src = '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css';
  wp_enqueue_style('nfl_bootstrap', $src, array(), null, 'all',true);

}


add_action( 'wp_enqueue_scripts', 'nfl_teams_scripts' );

function nfl_teams_scripts() {
    
    $src = plugin_dir_url( __FILE__ ) .'/../../public/js/nfl-js.js';
   
	wp_enqueue_script( 'nfl-js', $src, array(), null, false );
}


