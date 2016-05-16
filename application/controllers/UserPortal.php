<?php
	if(!defined ('BASEPATH')) exit('No direct script access allowed');
	
	class UserPortal extends MY_Controller {
		
		function __construct(){
			parent::__construct();
			$this->load->helper('string');
			$this->load->library('encrypt');
			$this->load->model('Gallery');
			$this->load->model('User');
			$this->load->model('Notification');
			$this->load->library('form_validation');
		}
		
		public function index(){
			//at this point users can only see their portal, and non users cant see a portal at all
			if(!isset($_SESSION['userID'])){
			redirect('');	
			}
			
			$userID = $_SESSION['userID'];
			
			$page_data['images'] = $this->Gallery->get_gallery_by_user($userID);
			$page_data['user'] = $this->User->get_user_details($userID);
			$page_data['query'] = $this->Notification->getAllNotifications($userID);
			
			
			$this->load->view('common/header');
			$this->load->view('users/dashboard', $page_data);
			$this->load->view('common/footer');
		}
		
		
		
		
	
	
	public function save(){
		
		if(!isset($_SESSION['userID'])){
			redirect('');	
		}
		
		$uID = $this->session->userdata('userID');
		//updates user portal images & avatar
		 $data['disc'] = array('userAvatar' => $this->input->post('user_avatar'),
                          'userBkrnd' =>  $this->input->post('user_background'),
                          );
		
		
		if($this->User->update_user($uID, $data['disc'])){
			redirect('userPortal/index');	
		}else{
			redirect('');	
		}
		
		
	}
	
	
	

	
}
	
?>