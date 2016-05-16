<?php
	if(!defined ('BASEPATH')) exit('No direct script access allowed');
	
	class Password extends CI_Model {
		function __construct() {
			parent::__construct();
		} // end __construct
	
	function does_code_match($code, $email){
		$query = "SELECT COUNT(*) AS count FROM tcb_users
					WHERE userCode = ?
					AND userEmail = ?";
					
		$res = $this->db->query($query, array($code, $email));
		
		foreach($res->result() as $row){
			$count = $row->count;	
		}
		
		if($count = 1){
			return true;	
		}else{
			return false;
		}
	}//end code match
		
		
	}// end password class
	
?>