<?php
	if(!defined ('BASEPATH')) exit('No direct script access allowed');
	
	class Image extends CI_Model {
		
		public function __construct(){
			parent::__construct();	
		}
		
	function save_image($data){
		/*do{
			$imgUrlCode = random_string('alnum', 8);
			
			var_dump($data);
			
			$this->db->where('imgUrlCode = ', $imgUrlCode);
			$this->db->from('tcb_img');
			$num = $this->db->count_all_results();
			
		}while($num >= 1);*/
		
		$img_data = array('userID' => $data['userID'],
                             'imgName' => $data['imgName'],
							 'imgTitle' => $data['imgTitle']);
		
		if ($this->db->insert('tcb_img',$img_data) ) {
			 return $this->db->insert_id();
			 
		} else {
			 return false;
		}
	}
	
	function get_image_id($data){
		$img_data = array('userID' => $data['userID'],
							 'imgTitle' => $data['imgTitle']);
							 
		$query = "SELECT imgID FROM tcb_img
						WHERE userID = ?
						AND imgTitle = ?
						LIMIT 1";
		$results = $this->db->query($query, $img_data);
			foreach($results->result() as $row){
				$imgID = $row->imgID;	
			}
		return $imgID;
	}
		
	}
?>
