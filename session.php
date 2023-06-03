<?php

	session_start();

	include('database/db_config.php');
	
	// $user_check = $_SESSION['login_stud'];

	//Check If user exists in the Database
	// $ses_sql = mysqli_query($db_con, "SELECT username FROM stud_auth WHERE username='$user_check'");

	// if ( !$ses_sql )
	// 	$ses_sql = mysqli_query($db_con, "SELECT username FROM staff_auth WHERE username LIKE %'$user_check'%");

	// $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

	// $login_session = $row['username'];

	$ses_set = isset($_SESSION['login_stud']) or 'Anonymous';
	error_log(print_r('[error.log]'.$ses_set.' '.$_SESSION['login_stud'], TRUE));

	# Check if the user has'nt logged out
	if (!isset($_SESSION['login_stud']) && !isset($_SESSION['login_staff'])) {
		header("location: login.html");
	} 

	// if ( !isset($_SESSION['login_staff']) ) {
	// 	header("location: staff_index.php");
	// 	// echo "Welcome Staff";
	// }
?>