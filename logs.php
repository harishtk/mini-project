<?php
	
	class Logs {
		
		function __construct() {
		
		}
		
		public static function event($username, $msg) {
			
			$filepath = "log-dump/logs.csv";
			$file = null;
			
			try {
				$file = fopen($filepath, "a+");
				$record =date("l, j M y g:i A")."\t".$username."\t".$msg."\n";
				fwrite($file, $record, strlen($record));
			} catch (Exception $e) {
				die("Message: ".$e->getMessage());
			}
			
		}	
		
		function __destruct() {
			if ( $this->file )
				fclose($this->file);
		}
		
	}

?>