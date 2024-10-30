<?php
/**
* Plugin Name: check-eid-login
* Description: Check if the current user is editor, author, or contributor and if true, force login via eID-Login plugin.
* Version: 1.0.0
* Author: OLF
* Author URI: https://www.obcsystems.de/
**/

if ( in_array( 'eidlogin/eidlogin.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	error_log('eID-Login plugin is active.');
} else {
	error_log('eID-Login plugin is not active.');
	return;
}

function check_eID_login( $user_login, $user ) {

	error_log('Entered check_eID_login. user_login: '.$user_login);

	if(!isset($_COOKIE['wp_eidlogin'])) {

		error_log('eID Cookie is not set.');
		$logout = false;

		if($user->exists()){

			foreach($user->roles as $role) {
				error_log('User: '.$user_login.' - Role: '.$role);

				if($role==="administrator") {
					error_log('Admin can use any login method.');
					$logout = false;
					break;
				}

				//These roles have to use eID as login method.
				if($role==="editor" || $role==="author" || $role==="contributor") {
					error_log('With your role(s) only eID login is allowed!');
					$logout=true;
					break;
				}
			}

			if($logout==true) {
				echo ('<div align center>You have been logged out. Use eID to login!</div>');
				wp_destroy_current_session();
				wp_clear_auth_cookie();
				wp_set_current_user( 0 );
			}
		}
  } else {
		error_log('Fine, the eID Cookie is set.');
	}
}


function check_eID_login_custom_footer( $message ) {

	error_log('Current locale: '.determine_locale());

	if(determine_locale()==="de_DE") {
		echo '<div align="center" style="color: #ff0000">Für Benutzer mit einer der Rollen Autor, Editor, oder Mitarbeiter, ist der Login via eID erforderlich!</div>';
	} else {
		echo '<div align="center" style="color: #ff0000">For users with a role like author, editor, or contributor, login with eID method is required!</div>';
	}
}


add_action('login_footer', 'check_eID_login_custom_footer');
add_action('wp_login', 'check_eID_login', 10, 2);
