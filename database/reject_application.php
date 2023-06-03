<?php

	include('db_config.php');
	session_start();
	
	if ( is_ajax() ) {
		if ( isset($_POST['application_id']) ) {
			if ( isset($_POST['reject-reason-msg']) ) {
				add_rejection_msg($_POST['application_id'], $_POST['reject-reason-msg']);
			} else {
				add_rejection_msg($_POST['application_id']);
			}
		}
	}
	
	/**
	* Checks if the request was made by ajax
	* 
	* @return bool 
	*/
	function is_ajax() {
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == "xmlhttprequest";
	}

	function add_rejection_msg($application_id, $msg = "") {
		
	}
?>