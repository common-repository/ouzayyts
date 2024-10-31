<?php
//functions

function yts_youtube_subs_add_script(){

	// Add google Script
	wp_register_script('google','https://apis.google.com/js/platform.js');
	wp_enqueue_script('google');
}
add_action('wp_enqueue_scripts','yts_youtube_subs_add_script');
