<?php //  NFL Team List - Settings Page



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}


/* 
display the plugin settings page with the form for sumbmit changes
*/
function nflteamlist_display_settings_page() {

    // check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) return;
	
	?>
	
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="options.php" method="post">
			
			<?php
			
			// output security fields
			settings_fields( 'nfllist_options' );
			
			// output setting sections
			do_settings_sections( 'nflteamlist' );
			
			// submit button
			submit_button();
			
			?>
			
		</form>
	</div>
	<?php


}