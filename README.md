# nfl-list

THIS IS NOT A PROD PLUGIN.

This is instead a plugin for testing porpouses.

I've created a simple plugin to access external data from a json url.
It's a very straight fowrad plugin relying on WP core functions.
Since there is no interaction with the data, I've decide not messing with the data base. So, there is no custom endpoint or post saved.
The plugin is actually injecting html to the page to build de table info and a very simple form to sort the data according to the name, in this case, of the team divison grouped all teams that are in the same criteria.

In order to watch the receiving information, I've set a transient to cach the data and refreshing it every 12 hours. In a real application the solution would be a more dynamic. I've also created a fictional api key input to change the default ?api_key=string if it's the case.


INSTRUCTIONS

Download the plugin file and install it
Create a template for example:
/**
 * Template Name: NFL Teams
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

copy this function to the main section of the page
      
   ` nfl_display_team_list();`
  
then on dashboard create a page with whatever the name you want and use this template.

Don't forget to remove this function when deactivating the plugin, otherwise you'll get an error.
   
   
 
   




