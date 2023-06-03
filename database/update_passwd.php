<?php

	include('db_config.php');
	
	if ( is_ajax() ) {
		if ( isset($_POST['username']) and isset($_POST['passwd']) ) {
			update_passwd($_POST['username'], $_POST['passwd']);
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
	
	function update_passwd($username, $passwd) {
		
		$db = new Database();
		$return['done'] = $db->update_passwd($username, $passwd);
		
		echo json_encode($return);
	}
?>