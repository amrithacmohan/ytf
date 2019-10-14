<?php 

	// Authenticate user login
	function auth_login() {
		if( ! isset( $_SESSION['userid'] ) ) {
        	header('Location: ' . PATH . '/index.php');
	        exit();
	    } 
	    // var_dump($_SESSION);
	    $flag = true;
	    if( $_SESSION['type'] == 'admin' && dirname($_SERVER['SCRIPT_NAME']) != DIRECTORY . '/admin' ) {
	        $flag = false;

	    }
	    if( $_SESSION['type'] == 'school' && dirname($_SERVER['SCRIPT_NAME']) != DIRECTORY . '/school' ) {
	        $flag = false;

	    }
	    if( $flag == false ) {

	        echo 'You have no permission to view this page';
	        exit();
	    }
	}

	// get logged user type
	function user_type() {
		return $_SESSION['type'];
	}


?>