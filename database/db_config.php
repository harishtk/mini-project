<?php

	include('constants.php');

	define('DB_SERVER', 'localhost:3306');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'scholarship');

	// $db_con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	// $db_con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	// if ( $db_con->connect_errno )
	//  	echo err."Connection Failed: ".$db_con->connect_error."<br>";

	/**
	 * Database helper class to access DB for scholarship application.
	 */
	class Database {

	    private $db_con;

	    //Holds error msg
	    private $err = "";

	    //Holds no of errors
	    public $errno = 0;

	    /**
	     * Creates and holds connection object.
	     */
	    public function __construct() {
	        $this->db_con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	        if ( $this->db_con->connect_error ) {
	        	$this->err = err.$this->db_con->connect_error;
	        	$this->errno++;
	        }

	    }

	    /**
		* returns the db_con object
		*
		* @return mysqli $db_con
		*/
	    public function get_connection() {
	    	return $this->db_con;
	    }

		/**
		 * @return mysqli_result $result - Which contains the result
		 */
	    public function get_error_msg() {
	    	return $this->err;
	    }

	    public function get_users() {
	    	$result = "";

	    	if ( $stmt = $this->db_con->prepare("SELECT username FROM stud_auth") ) {

	    		$stmt->execute();

	    		$result = $stmt->get_result();

	    		// $stmt->fetch();

	    		$stmt->free_result();

	    		$stmt->close();
	    	}

	    	if ( !$result ) {
	    		$this->errno++;
	    		$this->err = err.$this->db_con->error;
	    		return false;
	    	} else {
	    		return $result;
	    	}
	    }

	    // functions to access 'stud_auth' table

	     /**
		* Checks if it is a valid student for given
		* @param string $username
		* @param string $passwd
		*
		* @return bool $exists
		*/
	    public function stud_exists($username, $passwd) {
			$exists = false;

			if ( $stmt = $this->db_con->prepare("SELECT * FROM stud_auth WHERE username=? AND passwd=?") ) {

				$stmt->bind_param("ss", $username, $passwd);

				$stmt->execute();

				$res = $stmt->get_result();

				if ( $res->num_rows == 0 )
					$exists = false;
				else
					$exists = true;

				$stmt->free_result();

				$stmt->close();
			} else {
				$this->errno++;
				$this->err = err.$this->db_con->error;
			}

			return $exists;
		}

		// functions to access 'staff_auth' table

		/**
		* Checks if staff exists for given
		* @param string $username
		* @param string $passwd
		*
		* @return assoc_array $data[ bool 'exists', int 'level']
		*/
		public function staff_exists($username, $passwd) {
			$data = array();

			if ( $stmt = $this->db_con->prepare("SELECT * FROM staff_auth WHERE username=? AND passwd=?") ) {

				$stmt->bind_param("ss", $username, $passwd);

				$stmt->execute();

				$res = $stmt->get_result();

				if ( $res->num_rows == 0 ) {
					$data['exists'] = false;
				} else {
					$row = $res->fetch_assoc();
					$data['level'] = $row['level'];
					$data['exists'] = true;
				}


				$stmt->free_result();

				$stmt->close();
			} else {
				$this->errno++;
				$this->err = err.$this->db_con->error;
			}

			return $data;
		}

		// functions to access 'stud_info' table

		/**
		* Returns the student data of given
		* @param string $username
		*
		* @return json $data{
			* 'reg_no': string,
			* 'name': string,
			* 'dob': string,
			* 'dept': string,
			* 'course_dur': string,
			* 'blood_grp': string
		*}
		*/
		public function get_stud_info($username) {

			$data = array();

			if ( $stmt = $this->db_con->prepare("SELECT * FROM stud_info WHERE reg_no=?") ) {

				$stmt->bind_param("s", $username);

				$stmt->execute();

				$res = $stmt->get_result();

				if ( $res->num_rows == 1 ) {
					$data = $res->fetch_assoc();
				} else {
					$data['err'] = "Not found";
				}

				$stmt->free_result();

				$stmt->close();
			} else {

				$this->errno++;
				$this->err = $this->db_con->error;
			}
			
			$data['application_id'] = $this->get_application_id_for_username($username);
			
			if ( !empty($data['application_id']) ) {
				$data['application_available'] = true;
				$data['is_rejected'] = $this->is_application_rejected($data['application_id']);
			} else {
				$data['application_available'] = false;
			}
			
			$data['password_changed'] = $this->is_password_changed($username, $data['dob']);

			return json_encode($data);
		}
		
		public function is_password_changed($username, $passwd) {
			
			$return = 0;
			
			if ( $stmt = $this->db_con->prepare("SELECT * FROM stud_auth WHERE username=?") ) {
				
				$stmt->bind_param("s", $username);
				
				$stmt->execute();
				
				$res = $stmt->get_result();
				
				while($row = $res->fetch_assoc()) 
					(strcmp($row['passwd'], $passwd) == 0 ) ? $return = 0 : $return = 1;
				
				$stmt->free_result();
				
				$stmt->close();
			}
			
			return $return;
		}
		
		/**
		* Gets the rejection message for given
		* @param string $application_id
		* 
		* @return json $data {
			* 'application_id': string,
			* 'rejection_msg' : string,
			* 'rejected_on' : string
		}
		*/
		public function get_reject_msg_for($application_id) {
			$data = null;
			
			if ( $stmt = $this->db_con->prepare("SELECT * FROM rejection_list WHERE application_id = ?") ) {
				
				$stmt->bind_param("s", $application_id);
				
				$stmt->execute();
				
				$res = $stmt->get_result();
				
				if ( $res->num_rows == 1 ) {
					$data = $res->fetch_assoc();
				}
				
				$stmt->free_result();
				
				$stmt->close();
			
			}
			
			return json_encode($data);
		}
		
		public function get_application_id_for_username($username) {
			$application_id = "";
			
			if ( $stmt = $this->db_con->prepare("SELECT * FROM application_avail WHERE reg_no = ?") ) {
				
				$stmt->bind_param("s", $username);
				
				$stmt->execute();
				
				$res = $stmt->get_result();
				
				if ( $res->num_rows == 1 ) {
					$data = $res->fetch_assoc();
					$application_id = $data['application_id'];
				}
				
				$stmt->free_result();
				
				$stmt->close();
			}
			
			return $application_id;
		}
		

		public function get_pending_applications_for_level($level) {

			$data = null;

			if ( $level == 0 ) {
				$query = "SELECT a.reg_no, a.application_id, a.submitted_on FROM application_avail AS a NATURAL JOIN validation AS v WHERE a.application_id=v.application_id AND lvl_0 = 0";
			} else if($level == 1){
			  	$query = "SELECT a.reg_no, a.application_id, a.submitted_on FROM application_avail AS a NATURAL JOIN validation AS v WHERE a.application_id=v.application_id AND lvl_1 = 0";
			} else if($level == 2){
			  	$query = "SELECT a.reg_no, a.application_id, a.submitted_on FROM application_avail AS a NATURAL JOIN validation AS v WHERE a.application_id=v.application_id AND lvl_2 = 0 AND lvl_0 = 1 AND lvl_1 = 1";
			  }

			if ( $stmt = $this->db_con->prepare($query) ){

				// $stmt->bind_param("i", $level);

				$stmt->execute();

				$res = $stmt->get_result();

				if ( $stmt->num_rows <= 0 ) {
					$this->errno++;
					$this->err = "No Data Found :(";

//					$data['err'] = "No Data Found :(";
				}

				while ( $row = $res->fetch_assoc() ) {
					$data[$row['reg_no']] = $row;
				}

				$stmt->free_result();

				$stmt->close();

			}

			return json_encode($data);

		}

		/**
		* Fetches the application data for given
		* @param string $application_id
		* 
		* @return json $data 
		*/
		public function get_application_data_for_id($application_id) {

			$data  = array();

			if( $stmt = $this->db_con->prepare("SELECT * FROM application WHERE application_id=?") ) {

				$stmt->bind_param("s", $application_id);

				$stmt->execute();

				if ( $this->db_con->errno ) {
					$this->errno++;
					$this->err = $this->db_con->error;
				}

				$res = $stmt->get_result();

				if ( $res->num_rows == 1 ) {
					$data = $res->fetch_assoc();
				} else {
					$data['err'] = "Not Found!";
				}

				$stmt->free_result();

				$stmt->close();
			}

			return json_encode($data);
		}

		/**
		* Check whether the application is rejected for given
		* @param string $application_id
		*
		* @return json $data {
			* 'is_rejected': bool
		}
		*/
		function is_application_rejected($application_id) {

			$data['is_rejected'] = 1;

			if ( $stmt = $this->db_con->prepare("SELECT * FROM validation WHERE application_id = ? AND lvl_0 = 2 OR lvl_1 = 2 OR lvl_2 = 2") ) {

				$stmt->bind_param("s", $application_id);

				$stmt->execute();

				if ( $this->db_con->errno ) {
					$this->errno++;
					$this->err = $this->db_con->error;
				}

				$res = $stmt->get_result();

				if ( $res->num_rows <= 0 )
					$data['is_rejected'] = 0;

				$stmt->free_result();

				$stmt->close();

			}

			return json_encode($data);
		}

		function update_conduct_cert($application_id, $cand_behav_impr, $cand_prev_yr_attend) {
			
			$return = false;
			
			if ( $stmt = $this->db_con->prepare("UPDATE application set cand_behav_impr = ?, cand_prev_yr_attend = ? WHERE application_id = ?") ) {
				
				$stmt->bind_param("sis", $cand_behav_impr, $cand_prev_yr_attend, $application_id);
				
				$stmt->execute();
				
				if ( $this->db_con->affected_rows == 1 ) {
					$return = true;
				}
				
				$stmt->close();	
				
			}
			
			return $return;
		}
		
		function add_rejection_msg_for($application_id, $msg) {
			
			$return = false;
			
			if ( !empty($msg) ) {
				$query = "INSERT INTO rejection_list(application_id, rejection_msg) VALUES(?, ?)";
			} else {
				$query = "INSERT INTO rejection_list(application_id) VALUES(?)";
			}
			
			if ( $stmt = $this->db_con->prepare($query) ) {
				
				if ( empty($msg) ) {
					$stmt->bind_param("s", $application_id);
				} else {
					$stmt->bind_param("ss", $application_id, $msg);
				}
				
				$stmt->execute();
				
				if ( $this->db_con->affected_rows == 1 ) {
					$return = true;
				}
				
				$stmt->close();
			}
			
			return $return;
		}
		
		/**
		* Validates the application for given
		* @param string $application_id
		* @param int $level
		* @param int $valid_code
		* 
		* @return boolean $return
		*/
		function perform_validation($application_id, $level, $valid_code) {
			
			$return = false;
			
			if ( $level == 0 ) {
				$query = "UPDATE validation set lvl_0 = ? WHERE application_id = ?";	
			} elseif ( $level == 1 ) {
				$query = "UPDATE validation set lvl_1 = ? WHERE application_id = ?";
			} else {
				$query = "UPDATE validation set lvl_2 = ? WHERE application_id = ?";
			}
			if ( $stmt = $this->db_con->prepare($query) )  {
				
				$stmt->bind_param("is", $valid_code, $application_id);
				
				$stmt->execute();
				
				if ( $this->db_con->affected_rows == 1 ) {
					$return = true;
				}
				
				$stmt->close();
				
			}
			
			return $return;
			
		}

		
		function get_uploads_for($application_id) {
			
			$return = null;
			
			if ( $stmt = $this->db_con->prepare("SELECT * FROM uploads_map NATURAL JOIN application_avail WHERE application_avail.reg_no = uploads_map.reg_no AND application_avail.application_id = ?") ) {
				
				$stmt->bind_param("s", $application_id);
				
				$stmt->execute();
				
				$res = $stmt->get_result();
				
				if ( $res->num_rows == 1 ) {
					$data = $res->fetch_assoc();
					$return['reg_no'] = $data['reg_no'];
					$return['application_id'] = $data['application_id'];
					$return['link'] = $data['upload_dir'];
				}
				
				$stmt->free_result();
				
				$stmt->close();
				
			}
			
			return json_encode($return);
		}
	
		function update_passwd($username, $passwd) {
			
			$return = 0;
			
			if ( $stmt = $this->db_con->prepare("UPDATE stud_auth set passwd=? WHERE username=?") ) {
				
				$stmt->bind_param("ss", $passwd, $username);
				
				$stmt->execute();
				
				$res = $stmt->get_result();
				
				if ( $res ) 
					$return = 1;
					
				$stmt->free_result();
				
				$stmt->close(); 
								
			}
			
			return $return;
		}

		function add_new_application($application) {
			
			$q = "INSERT INTO application(application_id, stud_name, father_name, clg_address, la_yr_course, cu_yr_course, no_of_arrear, elig_for_scholar, elig_for_next_exam, dept, cast, class, temp_address, perm_address, prev_yr_scholar_amt, hostel_chk_in_la_yr, hostel_chk_out_la_yr, hostel_chk_in_cu_yr, hostel_chk_out_cu_yr, email) VALUES(?, ?,?,?  ,?,?,?,?   ,?,?,?,?   ,?,?,?,?,   ?,?,?,? ) ";
			
			if ( $stmt = $this->prepare($q) ) {
				
				$stmt->bind_param("ssssssiiisssssisssss", $application['application_id']
					, $application['stud_name'], $application['father_name'], $application['clg_address'], $application['la_yr_course'], $application['cu_yr_course'], $application['no_of_arrear'], $application['elig_for_scholar'], $application['elig_for_next_exam'], $application['dept'], $application['caste'], $application['temp_address'], $application['perm_address'], $application['prev_yr_scholar_amt'], $application['hostel_chk_in_la_yr'], $application['hostel_chk_out_la_yr'], $application['hostel_chk_in_cu_yr'], $application['hostel_chk_out_cu_yr'], $application['email'] );
					
					$stmt->execute();
					
					$res = $stmt->get_result();
					
					if ( $res->affected_rows >= 1 )
						return true;
					
					$stmt->free_result();
					
					$stmt->close();
					
			} 
			
			return false;
		}
		
		public function update_uploads($reg_no, $application_id, $upload_dir) {
			
			if ($stmt = $this->db_con->prepare("INSERT INTO uploads_map(reg_no, application_id, upload_dir) VALUES(?, ?, ?)")) {
				
				$stmt->bind_param("sss", $reg_no, $application_id, $upload_dir);
				
				$stmt->execute();
				
				$res = $stmt->get_result();
				
				if ( $res->affected_rows >= 1)
					return true;
					
				$stmt->free_result();
				
				$stmt->close();
			}
			
			return false;
		}
		
	    /**
	     * Destroys the connection object as soon as there is no reference.
	     */
	    public function __destruct() {
	    	$this->db_con->close();
	    }
	}
?>
