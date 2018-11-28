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

        /**
		*	@Start Here Variable with Session
		*
		*	Here is variable with session declare and and value get from wp and passing data with session to feb-mms global plugin.
		*
        **/
        $_SESSION['feb_wp_get_current_user_id'] = $current_user; // user Id
        $_SESSION['feb_main_web_home'] =  esc_url( home_url( '/' ) ); // Home URL Main Web Site
        // User Roles
	    $user_roles = $current_user->roles;
	    $user_role = array_shift($user_roles);
		$_SESSION['power'] = $user_role; // set user role in session

    }
}
add_action( 'init', 'wpdocs_check_logged_in' );

 ?>