<?php

	include('db_config.php');

	$return['msg'] = "Placing Request";
	$appid = null;

	if ( is_ajax() ) {
		$return['msg'] = "Processing Request";
		if ( isset($_POST['appid']) && !empty($_POST['appid']) ) {
			$appid = $_POST['appid'];
			send_uploads_for($appid);	
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
	
	function send_uploads_for($appid) {
		global $return;
		
		$db = new Database();
		$result = json_decode($db->get_uploads_for($appid), true);
		
		$link = "../".$result['link'];
		$dir = opendir($link);
		
		while( ($file = readdir($dir)) ) {
			if ( $file == "." or $file == ".." ) continue;
			$file_name = ucwords(
				strtolower(
					str_replace(
						"_", " ", 
						substr(
							$file, 0, strlen($file) - 4
						)
					)
				)
			);
			
			$file_array[$file_name] = "uploads/".$result['reg_no']."/".$file;
		}
		
		$return['files'] = $file_array;
		
		$return['msg'] = "Read Success";	
		
	}
	
	echo json_encode($return);
?>