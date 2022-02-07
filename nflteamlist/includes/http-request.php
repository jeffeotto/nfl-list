<?php
// NFL Team List - HTTP Request

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

 //  wp_safe_remote_get function placeholder
function http_get_request( $url ) {

	$url = esc_url_raw( $url );

	$args = array( 'user-agent' => 'NFL Team List: HTTP API; '. home_url() );

   $post_request = wp_safe_remote_get( $url);

   set_transient( 'nfl_check',$post_request , 60 * 60 );
   
   $nfl_list_data = get_transient( 'nfl_check' );
 
         if ( false === $nfl_list_data ) {
            // Transient expired, refresh the data
            $response = wp_remote_get( $url );
            set_transient( 'nfl_check', $response, HOUR_IN_SECONDS );
         }
         

   if(is_wp_error($post_request)){
      return;
   }

	return $post_request;

}

// GET external url response and output html 

function http_get_response() {
   $data_option =  get_option('nfllist_options');
   $data_key = '';
   foreach($data_option as $option){
     $data_key = $option;
   }
	
	$url = "https://delivery.oddsandstats.co/team_list/NFL.JSON?api_key={$data_key}";
  
	$response = http_get_request( $url );
   $response;
	$body  = wp_remote_retrieve_body( $response );

  
   
 
  

	$data = json_decode( $body );
  
      if( ! empty( $data ) ) {

         $html = '<div class="container">
                 <div id="sort_team" class="teams"></div>
                     <table class="table table-striped">
                        <thead>
                           <tr id="header">
                              <th scope="col">Team Name</th>
                              <th scope="col">Team Nickname</th>
                              <th scope="col">Team Conference</th>
                              <th scope="col">Team Division</th>
                           </tr>
                       </thead>
                       <tbody>';
         
       foreach( $data->results->data->team as $team ) {
           
            $html .= '<tr id='. lcfirst($team->division).'>
                      <td>'. $team->name . '</th>
                      <td>'. $team->nickname .'</td>
                      <td>'. $team->conference .'</td>
                      <td id="" class='. lcfirst($team->division) .'>'. $team->division .'</td>
                      </tr>';         
       }

             $html.= '
                     </tbody>
                     </table>
                     </div>';
   }
  
   return $html;
  
}

  
/**
 * Display the html markup on the template.
 */
function nfl_display_team_list() {
   
   echo http_get_response();

}
