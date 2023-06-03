<?php
	// Contains the functions to fetch application list from db

	require('db_config.php');

	if ( is_ajax() ) {

		if ( isset($_POST['level']) ) {
			send_applications($_POST['level']);
		} else {
			$return['err'] = "Failed";
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

	/**
	* Returns all available applications for given
	* @param int $level
	*
	* @return json $result {
		* 'reg_no': string,
		* 'application_id': string,
		* 'submitted_on': datetime
	*}
	*/
	function send_applications($level) {

		$result = array();

		$db = new Database();
		$result = $db->get_pending_applications_for_level($level);

		echo $result;
	}
?>
