<?php
	if(!defined ('BASEPATH')) exit('No direct script access allowed');
	
	class Gallery extends CI_Model {
		function __construct() {
			parent::__construct();
		} // end __construct
		
		function get_all_galleries() {
			$query = "SELECT tcb_img.*, tcb_user.userName FROM tcb_img, tcb_user
						WHERE tcb_img.userID = tcb_user.userID";
			
			$result = $this->db->query($query);
			
			if($result){
				return $result;
			}else{
				return false;
			}
		}// end get_all_galleries
		
		function get_gallery_by_user($userID){
			
			
			$query = "SELECT i.*, u.userName, u.userID FROM tcb_img i JOIN tcb_user u ON u.userID = i.userID 
						WHERE i.userID = ?
						AND i.userID = u.userID";
			
			//$result = $this->db->get('tcb_img', array('userID', $userID));			
			
			$result = $this->db->query($query, array($userID));
						
			if($result){
				return $result;
			}else{
				return false;
			}
		}// end get_discussions_by_user
		
		function get_gallery_by_img($imgID){
			
			
			$query = "SELECT * FROM tcb_img, tcb_user
						WHERE tcb_img.imgID = ?
						AND tcb_img.userID = tcb_user.userID
						LIMIT 1";
			
			//$result = $this->db->get('tcb_img', array('userID', $userID));			
			
			$result = $this->db->query($query, array($imgID));
						
			if($result){
				return $result;
			}else{
				return false;
			}
		}// end get_discussions_by_user
		
		function get_rand_gallery() {
			//$temp = rand( 1 , 7 );
			
			$query = "SELECT * FROM tcb_user ORDER BY rand() LIMIT 1";
			
			$results = $this->db->query($query);
			
			foreach($results->result() as $row){
				$userID = $row->userID;	
			}
			
			
			return $userID;
			
			//if($result){
//				return $result;
//			}else{
//				return false;
//			}
		}// end get_rand_gallery
		
		function get_artist($userID){
				$query = "SELECT userAvatar, userName FROM tcb_user
						WHERE userID = ?
						LIMIT 1";
			
			//$result = $this->db->get('tcb_img', array('userID', $userID));			
			
			$result = $this->db->query($query, array($userID));
						
			if($result){
				return $result;
			}else{
				return false;
			}
		}
		
		function get_all_sketchbooks(){
			$query = "SELECT * FROM tcb_img i JOIN tcb_user u ON i.userID = u.userID";
			
			//$result = $this->db->get('tcb_img', array('userID', $userID));			
			
			$result = $this->db->query($query);
						
			if($result){
				return $result;
			}else{
				return false;
			}
		}
		
		function get_sketchbook(){
			$query = "SELECT * FROM tcb_sb s JOIN tcb_sbpage p ON s.sbID = p.sbID";
			
			//$result = $this->db->get('tcb_img', array('userID', $userID));			
			
			$result = $this->db->query($query);
						
			if($result){
				return $result;
			}else{
				return false;
			}
		}
	}
	
	
?>