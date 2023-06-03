<?php

	include('db_config.php');
	
	$return['msg'] = "Failed!";
	
	if ( is_ajax() ) {
		if ( isset($_POST['cand-behav-impr']) and isset($_POST['cand-prev-yr-attend']) ) {
			updateConductDetails($_POST);
		}
		/*$return['msg'] = "Request Success!";
		echo json_encode($return);
		die();*/
	}
	
	/**
	* Checks if the request was made by ajax
	* 
	* @return bool 
	*/
	function is_ajax() {
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == "xmlhttprequest";
	}
	
	function updateConductDetails($data) {
		
		$data['cand-behav-impr'] = ucfirst($data['cand-behav-impr']);
		$data['cand-prev-yr-attend'] = intval($data['cand-prev-yr-attend']);
		
		$db = new Database();
	
		if ( $db->update_conduct_cert($data['application_id'], $data['cand-behav-impr'], $data['cand-prev-yr-attend']) ) {
			$return['msg'] = "Update Success!";
		} else {
			$return['msg'] = "Update Failed!";
		}	
		
		$return['application_id'] = $data['application_id'];
		$return['cand_behav_impr'] = $data['cand-behav-impr'];
		$return['cand_prev_yr_ttend'] = $data['cand-prev-yr-attend'];
		
		echo json_encode($return);	
	}
	
	

?>