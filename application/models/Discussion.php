<?php
	if(!defined ('BASEPATH')) exit('No direct script access allowed');
	include_once('Comment.php');
	
	class Discussion extends Comment {
		
		
		
		function __construct() {
			parent::__construct();
			
		} // end __construct
		
		
		//for getting used to CodeIgniter, not used for anything but testing
		function get_all_discussions($filter = null, $dir = null) {
					
			$query = "SELECT * FROM tcb_disc, tcb_user 
						WHERE tcb_disc.userID = tcb_user.userID 
						AND tcb_disc.discActive != '0' ";	
						
			if($filter != null){
				if($filter == 'age') {
					$filter = 'discCreated';
					switch ($dir) {
						case 'ASC':
							$dir = 'ASC';
							break;
						case 'DESC':
							$dir = 'DESC';
							break;
						default:
							$dir = 'ASC';
					}//end switch
				}//end nested if
			}else{
				$dir = 'ASC';	
			} // end if
			
			$query .= "ORDER BY tcb_disc.discCreated " . $dir;

			
			
			$result = $this->db->query($query, array($dir));
			
			
						
			if($result){
				return $result;	
			}else{
				return false;
			}
			
			
		}// end get_all_discussions
		
		function get_discussions_by_img($imgID){
			$query = "SELECT tcb_disc.*, tcb_user.userID, tcb_user.userName, tcb_user.userAvatar, tcb_img.* FROM tcb_disc, tcb_img, tcb_user
						WHERE tcb_img.imgID = ?
						AND tcb_disc.userID = tcb_user.userID
						AND tcb_disc.imgID = tcb_img.imgID
						ORDER BY discCreated";
						
			return $result = $this->db->query($query, array($imgID));
			
		}// end get_discussions_by_img
		
		
		
		
		function get_discussions_by_id($discID){
			$query = "SELECT * FROM tcb_disc, tcb_user
						WHERE discID = ?
						AND tcb_disc.userID = tcb_user.userID";
						
			return $result = $this->db->query($query, array($discID));
		}// end get_discussions_by_id
		
		function create_discussion($data){
			$discussion_data = array('discTitle' => $data['discTitle'],
                             'discBody' => $data['discBody'],
                             'userID' => $data['userID'],
							 'imgID' => $data['imgID'],
                             'discActive' => '1');
			
			if ($this->db->insert('tcb_disc',$discussion_data) ) {
			 
			  return $this->db->insert_id();
			} else {
			  return false;
			} 
			
			     
		}//end create discussion
		
		function edit_discussion($discID, $data){
			$discussion_data = array('discTitle' => $data['discTitle'],
                             'discBody' => $data['discBody']);
			

			$where = array('discID' => $discID);
			
			//var_dump($where);
//			die();
			
			if ($this->db->update('tcb_disc', $discussion_data, $where) ) {
			  return true;
			} else {
			  return false;
			}          
		}//end create discussion
		
		public function delete($discID){
		
		
			$this->db->where('discID', $discID);
			$result = $this->db->delete('tcb_disc');
			if($result){
				return true;	
			}else{
				return false;
			}
		
		}//end delete
		
		function flag($discID) {
			$this->db->where('discID', $discID);
			if ($this->db->update('tcb_disc', array('discActive' => '0'))) {
			  return true;
			} else {
			  return false;
			}
  		}// end flag
		
	} // end discussion model




?>