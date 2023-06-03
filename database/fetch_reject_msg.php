<?php

	include('db_config');

	if ( is_ajax() ) {
		if ( isset($_POST['application_id']) ) {
			send_reject_msg($_POST['application_id']);
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
	
	function send_reject_msg($application_id) {
		$return = null;
		
		$db = new Database();
		$return = $db->get_reject_msg_for($application_id);
		
		echo $return;
	}

?>