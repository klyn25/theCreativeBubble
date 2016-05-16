<?php
	if(!defined ('BASEPATH')) exit('No direct script access allowed');
	
	class Signin_model extends CI_Model {
		function __construct() {
			parent::__construct();
		} // end __construct
	
		public function does_user_exist($userEmail){
			$this->db->where('userEmail', $userEmail);
			$query = $this->db->get('tcb_user');
			return $query;
				
		}//end register user
	
	}//end register class

?>