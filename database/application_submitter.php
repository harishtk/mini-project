<?php

 	include('db_config.php');
 	session_start();
 	$application = array();

 	// echo "<h1>Variables Passed</h1>";

 	foreach ($_POST as $key => $value) {

 		// echo "<p>Key: ".$key."<br>Value: ".$value."</p>";
 		$application[$key] = $value;
 	}
 	
 	

 	submit_data($application);

 	// echo date('d-m-Y', strtotime($_POST['date']));

 	function submit_data($application) {
	
		$application['application_id'] = generate_application_id($application['dept']);
		
		$_SESSION['application_id'] = $application['application_id'];
		
		$application['elig_for_scholar'] = ($application['elig_for_scholar'] == "on") ? 1 : 0;
		$application['elig_for_next_exam'] = ($application['elig_for_next_exam'] == "on") ? 1 : 0;
		
		foreach($application as $key => $value) {
			echo "<p>Key: ".$key."<br>Value: ".$value."</p>";
		}
		
 		$db = new Database();
 		
 	}
 	
 	function generate_application_id($dept) {
		
		$application_id = "D";
		
		$splitted = explode(" ", $dept);
		
		foreach($splitted as $word) {
			$application_id .= substr($word, 0, 1);
		}
		
		$application_id .= $_SESSION['login_stud'];
		
		return $application_id;
	}
	
	session_commit();

 	echo "<center>Please wait while we do stuffs</center>";
 	/*sleep(3);
 	header("location: ../upload_docs.php");*/
 ?>