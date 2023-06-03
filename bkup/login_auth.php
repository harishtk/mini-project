<?php

	include('db_config.php');
	session_start();

	$error = "";

	$form_name = $_POST['form_name'];

	if ( $form_name ) {
		switch ($form_name) {
			case 'stud_login':
				stud_login($db_con, $_POST);
				break;
			case 'staff_login':
				staff_login();
				break;
			default:
				# code...
				break;
		}
	}

	function stud_login($db_con, $_DATA) {

		$username = $_DATA['username'];
		$passwd = "null";	
		
		if ( isset($_DATA['username']) && isset($_DATA['passwd']) && 
			$_DATA['username'] != "" && $_DATA['passwd'] != "") {
		
		$username = mysqli_real_escape_string($db_con, $_DATA['username']);
		$passwd = mysqli_real_escape_string($db_con, $_DATA['passwd']);

		//$pass_hash = password_hash($passwd, PASSWORD_DEFAULT);
		//There is no such way.

		} else {
			
		}

		$res = mysqli_query($db_con, "SELECT * FROM auth WHERE username='$	username' AND passwd='$passwd'");

		$row = "";
		if ( !$res )
			echo err.mysqli_error($db_con);
		
		$row = mysqli_fetch_array($res);

		echo "Username: ".$username;
		echo "Password: ".$passwd;	
		echo "Fetched: ".mysqli_num_rows($res);

		if ( mysqli_num_rows($res) == 1 ) {

			$_SESSION['login_user'] = $username;

			header("location: index.php");

		} else {
			$error = err."Invalid Username or Password :(";
		}

		if ( $error != "" )
			echo "\n".$error;

	}

	function staff_login() {
		
	}

	if ( $db_con ) 
		mysqli_close($db_con);

	session_commit();
?>