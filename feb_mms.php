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
        $_SESSION['wp_get_current_user'] = $current_user; // get user Id

        $_SESSION['home'] =  esc_url( home_url( '/' ) );
    }
}
add_action( 'init', 'wpdocs_check_logged_in' );


 ?>