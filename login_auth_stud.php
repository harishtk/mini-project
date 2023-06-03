<?php

	include('database/db_config.php');
	include('logs.php');

	session_start();

	$error = "";

	$username = "";
	$passwd = "";
	
	$db = new Database();
	
	if ( isset($_POST['username']) && isset($_POST['passwd']) && 
			$_POST['username'] != "" && $_POST['passwd'] != "") {
		
		$username = mysqli_real_escape_string($db->get_connection(), $_POST['username']);
		$passwd = mysqli_real_escape_string($db->get_connection(), $_POST['passwd']);

	} else {
		echo err."Username or Password cannot be empty :( \n";
	}

	$res = $db->stud_exists($username, $passwd);

	if ( !$res && $db->errno )
		die($db->get_error_msg());

	if ( $res ) {

		$_SESSION['login_stud'] = $username;
		Logs::event($username=$username, $msg="Successfully Logged in");
		header("location: index.php");

	} else {
		$error = err."Username or Password Invalid :(";
		Logs::event($username=$username, $msg="Login Attempt");
	}

	if ( $error != "" )
		echo "\n".$error;

	session_commit();
?>