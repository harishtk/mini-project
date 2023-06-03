<?php 

	include('database/db_config.php');
	session_start();

	$return['msg'] = "File Upload Failed!";
	$return['files'] = array();
	if ( is_ajax() or "" == "") {
		$return['msg'] = "Ajax request success";
		chdir("uploads");
		mkdir($_SESSION['login_stud']);
		foreach ($_FILES as $key => $value) {
			// echo "Uploading File: ".$key."<br";
			upload_file($_FILES[$key]['tmp_name'], $_FILES[$key]['name'], $key);
		}
		// echo "Extension: ".pathinfo($_FILES['prof_img']['name'], PATHINFO_EXTENSION);
		
	}

	/**
	 * Checks if it's an ajax request
	 * @return boolean
	 */
	function is_ajax() {
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == "xmlhttprequest";
	}


	function upload_file($tmp_file, $filename, $target_file_name) {
		global $return;
		# $filename = $_FILES['prof_img']['name'];
		# $file = $_FILES['prof_img']['tmp_name'];
		$target_dir = $_SESSION['login_stud']."/";

		$target_file = $target_dir.basename(strtoupper($target_file_name).'.'.strtolower(pathinfo($filename, PATHINFO_EXTENSION)));

		if ( move_uploaded_file($tmp_file, $target_file) ) {
			$return['msg'] = "Files Upload Successful";
			array_push($return['files'], array($target_file_name => array("success", basename($target_file))));
			// echo "File Upload Successful!<br>";
			// echo "File Path: ".basename($target_file)."<br>";
		}

		$db = new Database();
		$res = $db->update_uploads($_SESSION['login_stud'], $_SESSION['application_id'], $target_dir);
		
	}

 ?>