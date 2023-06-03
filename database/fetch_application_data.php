<?php
	// Contains the functions to send application data per id
	require('db_config.php');
	
	if ( is_ajax() ) {
		if ( isset($_POST['application_id']) ) {
			send_application_data_for($_POST['application_id']);
		} else {
			$return['err'] = "Failed!";
			echo json_encode($return);
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
	
	function send_application_data_for($application_id) {
		$return = null;
		
		$db = new Database();
		$return = $db->get_application_data_for_id($application_id);
		
		echo $return;
	}
?>