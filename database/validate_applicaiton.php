<?php

	include('db_config.php');
	session_start();
	
	if ( is_ajax() ) {
		
		$return['msg'] = "Request Success";
		$return['application_id'] = $_POST['application_id'];
		$return['level'] = $_SESSION['staff_level'];
		$result['staff'] = $_SESSION['login_staff'];
		$result['valid_code'] = $_SESSION['valid_code'];
		
		/*echo json_encode($return);*/
		echo "noting";
	}
	
	/**
	* Checks if the request was made by ajax
	* 
	* @return bool 
	*/
	function is_ajax() {
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == "xmlhttprequest";
	}
	
?>