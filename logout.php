<?php
	
	include('logs.php');
	session_start();

	if ( $username=$_SESSION['login_stud'] or $username=$_SESSION['login_staff'])
		Logs::event($username, $msg="Log out");

	if ( session_destroy() )
		header("location: index.php");
?>