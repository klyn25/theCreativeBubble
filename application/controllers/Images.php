<?php
	if(!defined ('BASEPATH')) exit('No direct script access allowed');
	
	class Images extends MY_Controller {
		
		function __construct(){
			parent::__construct();
			$this->load->helper(array('string'));
			$this->load->library('image_lib');
			$this->load->model('Discussion');
			$this->load->model('Image');
			$this->load->model('Observer');
			$this->load->model('Comment');
			$this->load->library('form_validation');
			$this->load->library('upload');
		}
		public function index() {
			$page_data = array('fail' => false,
							   'success' => false); 
			$this->load->view('common/header');
			$this->load->view('users/upload', $page_data);
			$this->load->view('common/footer');
  }

 		 public function do_upload() {
			 
			$user = $_SESSION['userID'];
			$title = $this->input->post('imgTitle');
    		$upload_dir = '/var/chroot/home/kflick/public_html/php2/Fall2015/final/assets/img/user_uploads/';  
			 
			 
			 $imgDir = '/var/chroot/home/kflick/public_html/php2/Fall2015/final/assets/img/user_uploads/'.$user;
   			
     		
      
     		// if directory does not exist with usename, make it
      		if(!is_dir($imgDir)){
				mkdir($imgDir);
			}
			
			
			//sets the upload info in the config file
    		$config['upload_path'] = $imgDir;
    		$config['allowed_types'] = 'gif|jpg|jpeg|png';
    		$config['max_size'] = '1000';
    		$config['max_width']  = '1024';
    		$config['max_height']  = '768';  

    		$this->upload->initialize($config);    
			
			//if upload doesn't work reloads upload page
    		if ( ! $this->upload->do_upload()) {
     			 $page_data = array('fail' => $this->upload->display_errors(),
                         'success' => false);
      			 $this->load->view('common/header');
      			 $this->load->view('users/upload', $page_data);
      			 $this->load->view('common/footer');
				 
    		} else {//if upload works save to directory & sends info for db update
			
      			$image_data = $this->upload->data();
      			$page_data['result'] = $this->Image->save_image(array('imgName' => $image_data['file_name'], 'userID' => $user, 'imgTitle' => $title));
      			$page_data['file_name'] = $image_data['file_name'];
      			
				
      
				if ($page_data['result'] == false) {
					$page_data = array('fail' => $this->lang->line('encode_upload_general_error'));
					$this->load->view('common/header');
					$this->load->view('users/upload', $page_data);
					$this->load->view('common/footer');        
      		 	} else {
					//upload success
					$user_data = array('userID' => $user,
							'imgTitle' => $title);
							
					$d = $this->Image->get_image_id($user_data);
					$data = array('userID' => $user, 'imgID' => $d);
					var_dump($d);
					$observer = new Observer();
					$page_data['comment'] = $this->Comment->attach($observer);
					$page_data['comment'] = $this->Comment->notify($data);
					//this was my solution to create db observer table 
					$page_data['comment'] = $this->Comment->updateObserver($data);
					
					
					$this->load->view('common/header');
					$this->load->view('users/upload_success');
					$this->load->view('common/footer');
      			}
    		}
  		} 
		
	} // end controller
?>