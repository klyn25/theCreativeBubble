<?php
	if(!defined ('BASEPATH')) exit('No direct script access allowed');
	
	class Register extends CI_Model {
		function __construct() {
			parent::__construct();
		} // end __construct
	
		public function register_user($data){
			
			if($this->db->insert('tcb_user', $data)){
				return true;	
			}else{
				return false;	
			}
		}//end register user
	
	}//end register class

?>