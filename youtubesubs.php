
 <?php
/*
 * Plugin Name:       OuzayYTS
 * Plugin URI:        https://ouzay.com/OuzayYTS
 * Description:       Display Youtube button and count.
 * Version:           1.0
 * Author:            YASIN OUZAY
 */
 
 if(!defined('ABSPATH')){
	 
	exit;
 }
 // Load Scripts
 require_once(plugin_dir_path(__FILE__).'/includes/youtubesubs-scripts.php');
  // Load Class
 require_once(plugin_dir_path(__FILE__).'/includes/youtubesubs-class.php');
 
 // Register Widget

   function yts_register_youtube_subs(){
	   
     register_widget('yts_Youtube_subs_Widget');	 
	 
   }  
 //  Hook in function

  add_action('widgets_init','yts_register_youtube_subs');