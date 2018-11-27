<?php 
/*
Plugin Name: FEBRUARY MEMBER MANAGEMENT SYSTEM
Plugin URI: https://facebook.com/asifulmamun
Description: This use for Mange Member
Version: 1.0
Author: Al Mamun - (asifulmamun)
Author URI: https://facebook.com/asifulmamun
*/


function wpdocs_check_logged_in() {
    $current_user = wp_get_current_user();
    if ( 0 == $current_user->ID ) {
        // Not logged user code
        session_start();
        session_destroy();
    } else {
        session_start(); // Start Session

        /*
			Here is variable with session declare and and value get from wp and passing data with session to feb-mms global plugin.
        */
        $_SESSION['feb_wp_get_current_user'] = $current_user; // user Id
        $_SESSION['feb_home'] =  esc_url( home_url( '/' ) ); // Home URL
        $_SESSION['power'] =$user_meta->roles; // User Role
		




    }
}
add_action( 'init', 'wpdocs_check_logged_in' );


 ?>