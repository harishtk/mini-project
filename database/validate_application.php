<?php

	include('db_config.php');
	
	$return = array();
	
	if ( is_ajax() ) {
		
		$return['msg'] = "Request Success";
		$return['application_id'] = $_POST['application_id'];
		$return['level'] = $_POST['staff_level'];
		$return['staff'] = $_POST['staff'];
		$return['valid_code'] = $_POST['valid_code'];
		
		validate_application($return);
		
		if ( $return['valid_code'] == 2 ) {
			if ( isset($_POST['rejection_msg']) && !empty($_POST['rejection_msg']) ) {
				add_rejection_msg($_POST['application_id'], $_POST['rejection_msg']);
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
	
	function validate_application($data) {
		
		global $return;
		
		$db = new Database();
		if ( $db->perform_validation($data['application_id'], $data['level'], $data['valid_code']) ) {
			$return['msg'] = "Validation Successful";
		}		
		
	}
	
	function add_rejection_msg($application_id, $msg = "") {
		
		global $return;
		
		$db = new Database();
		if ( $db->add_rejection_msg_for($application_id, $msg) ) {
			$return['msg'] = "Rejection Successful";
		}
	}
	
	echo json_encode($return);
	
?>