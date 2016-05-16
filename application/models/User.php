<?php
	if(!defined ('BASEPATH')) exit('No direct script access allowed');
	
	class User extends CI_Model {
		function __construct() {
			parent::__construct();
		} // end __construct
	
		public function get_all_users(){
			return $this->db->get('tcb_user');
		}//end get all users
		
		function create_user($data){
			if($this->db->insert('tcb_user', $data)){
				return $this->db->insert_id();	
			}else{
				return false;	
			}
		}// end create user
		
		function update_user($userID, $data){
			
			$this->db->set($data);
			$this->db->where('userID', $userID);
			if($this->db->update('tcb_user')){
				return true;	
			}else{
				return false;	
			}
		}//end update user 
		
		function get_user_details($userID){
			$this->db->where('userID', $userID);
			$result = $this->db->get('tcb_user');
			if($result){
				return $result;	
			}else{
				return false;
			}
		}//end get user details
		
		function delete_user($userID){
			if($this->db->delete('tcb_user', array('userID' => $userID))){
				return true;	
			}else{
				return false;
			}
		}
		
		function make_code(){
			do{
				$url_code = random_string('alnum', 8);
				$this->db->where('pwdChangeCode = ', $url_code);
				$this->db->from('tcb_user');
				$num = $this->db->count_all_results();	
			}while($num >= 1);
			
			return $url_code;
		}//end make code
		
		function count_results($email){
			$this->db->where('userEmail', $email);
			$this->db->from('tcb_user');
			return $this->db->count_all_results();
		}//end count results
		
		function update_password($data){
			$this->db->where('userID', $data['userID']);
			if($this->db->update('tcb_user', $data)){
				return true;	
			}else{
				return false;	
			}
		}//end update password
		
		function does_code_match($data, $email){
			$query = "SELECT COUNT(*) AS count
						FROM tcb_user
						WHERE pwdChangeCode = ?
						AND userEmail = ?";
						
			$res = $this->db->query($query, array($data['code'], $email));
			foreach($res->result() as $row){
				$count = $row->count();	
			}
			
			if($count == 1){
				return true;	
			}else{
				return false;	
			}
		}//end does code match
		
		function update_code($data){
			$this->db->where('userEmail', $data['userEmail']);
			if($this->db->update('tcb_user', $data)){
				return true;	
			}else{
				return false;	
			}
		}//end update code
	
	}//end register class

?>