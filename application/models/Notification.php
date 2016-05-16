<?php
// Notification model

class Notification extends CI_Model {
	var $type, $to_user, $from_user, $reference, $timestamp, $newcount;
	
	public function getAllNotifications(){
		//$this->newcount = $this->newCount($this->to_user);
		$to_user = $_SESSION['userID'];
		
		$query = "SELECT n.*, m.messBody, u.userAvatar, u.userName, i.imgTitle FROM tcb_notification n INNER JOIN tcb_user u ON u.userID = n.from_user JOIN tcb_message m ON m.messID = n.type JOIN tcb_img i ON i.imgID = n.imgID WHERE to_user = ? ORDER BY timestamp";
		 
		return $result = $this->db->query($query, array($to_user));
	}// end get all notifications
	
	public function addNotification($data){
		
		$from_user = $data['userID'];
		$imgID = $data['imgID'];
		
		echo $imgID;
		echo $from_user;
		
		$q = "SELECT userID FROM tcb_observe WHERE imgID = ? AND userID != ?";
		$data = array('imgID' => $imgID, 'from_user' => $from_user);
		$query = $this->db->query($q, $data);
		foreach ($query->result() as $row)
			{
				  $to_user = $row->userID;
				  echo $to_user;
				  $query2 = "INSERT INTO tcb_notification (to_user, from_user, imgID, type) VALUES (?,?,?,?)";
				  $data2 = array('to_user' => $to_user, 'from_user' => $from_user, 'imgID' => $imgID, 'type' => 1); 
				  $result = $this->db->query($query2, $data2);
			}
	
		
	}//end add notification
	
	function Seen($id){
		if(!isset($_SESSION['id'])) exit;
		
		$query = "UPDATE tcb_notification SET seen = '1' WHERE id = ?";
		
		$result = $this->db->query($query, array($id));	
	}
	
	function newCount($user){
		$query = "SELECT count(*) FROM tcb_notification WHERE to_user = ? AND seen = '0'";
		
		$result = $this->db->query($query, array($user));
		
	}// end new count
	
	function deleteNotification($id){
		if(!isset($_SESSION['id'])) exit;
		
		$query = "DELETE FROM tcb_notification WHERE id = {$id} AND to_user = {$_SESSION['id']}";
		
		$result = $this->db->query($query); 
	}//end delete notification
	
}//end notification class


?>
