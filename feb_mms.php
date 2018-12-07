<?php 
/*
Plugin Name: FEBRUARY MEMBER MANAGEMENT SYSTEM
Plugin URI: https://facebook.com/asifulmamun
Description: This use for Mange Member
Version: 1.0
Author: Al Mamun - (asifulmamun)
Author URI: https://facebook.com/asifulmamun
*/

function wp_check_logged_in() {
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

        /*
		*
		*	@Server and Database Configuration and Connection information declare
		*
		*/
		$_SESSION['feb_host'] = DB_HOST; // Host Name
		$_SESSION['feb_db_user_name'] = DB_USER; // DB User Name
		$_SESSION['feb_db_user_password'] = DB_PASSWORD; // DB Password
		$_SESSION['feb_db_name'] = DB_NAME; // DB Name
		global $wpdb; // table Prefix Helper
		$_SESSION['feb_db_table_prefix'] = $wpdb->prefix; // Tabel Prefix
		
        $_SESSION['feb_wp_get_current_user_id'] = $current_user->ID; // user Id
        
        $_SESSION['feb_main_web_home'] =  esc_url( home_url( '/' ) ); // Home URL Main Web Site
        
        // User Roles
	    $user_roles = $current_user->roles;
	    $user_role = array_shift($user_roles);
		$_SESSION['feb_power'] = $user_role; // set user role in session
		
    } // else
} //function
add_action( 'init', 'wp_check_logged_in' );

 ?>