<?php
	if(!defined ('BASEPATH')) exit('No direct script access allowed');
	include_once('Observable.php');
	class Comment extends CI_Model implements Observable {
		private $observers = array();
		
		function __construct() {
			parent::__construct();
			
			
			
		} // end __construct
		
		public function attach(Observer $obs){
			
			//$key = get_class($obs);
			//$this->observers[$key] = $obs;
			
			
			if(!in_array($obs, $this->observers)) { // Make sure we don't add an observer twice
				$this->observers[] = $obs; // Add the observer
				foreach($this->observers as $observer){
					echo "Printing test";
				}
				return true;
			} else {
				return false; // Observer was not added
			}
			
			//add to the db imgID and userID -> as obs
			
		}//end attach
		
		public function detach(Observer $obs){
				$key = get_class($obs);
				unset($this->observers[$key]);
		}//end detach
		
		public function notify(){
			foreach($this->observers as $obs){
				$obs->update($this);
				
			}//end foreach
			
		}//end notify
		
		public function updateObserver($data){
			$imgID = $data['imgID'];
			$userID = $data['userID'];
			$qu = "INSERT IGNORE INTO tcb_observe (imgID, userID) VALUES (?,?)";
			$que = $this->db->query($qu,array($imgID, $userID));
			var_dump($imgID, $userID);
			$q = "SELECT userID FROM tcb_observe WHERE imgID = ?";
				
			$query = $this->db->query($q, array($imgID));
			foreach ($query->result() as $row)
				{
					 $uID = $row->userID;
					 echo $uID;
					   
				}
		}//end update observer
		
	}//end Comment model
	
//$q = "SELECT userID FROM tcb_observe WHERE imgID = '1'";
//			
//			$query = $this->db->query($q);
//			foreach ($query->result() as $row)
//				{
//				   echo $row->userID;
//				   
//				}	
?>