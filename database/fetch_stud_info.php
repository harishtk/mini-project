<?php
	
	require('db_config.php');
	
	if ( is_ajax() ) {
		if ( isset($_POST['username']) && !empty($_POST['username']) ) {
			send_stud_data($_POST['username']);
		} else {
			$result['err'] = "failed";
			echo json_encode($result);
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
	
	/**
	* Fetches and sends the student data for given
	* @param string $username
	* 
	* @return json $result{
		* 'reg_no': string,
		* 'name': string,
		* 'dob': string,
		* 'dept': string,
		* 'course_dur': string,
		* 'blood_grp': string
	} 
	*/
	
	function send_stud_data($username) {
		$result = null;
		
		$db = new  Database();
		$result = $db->get_stud_info($username);
		
		echo $result;
	}

?>