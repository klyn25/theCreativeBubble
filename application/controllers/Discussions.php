<?php
	if(!defined ('BASEPATH')) exit('No direct script access allowed');
	
	class Discussions extends MY_Controller {
		
		
		function __construct(){
			parent::__construct();
			$this->load->helper('string');
			$this->load->library('encrypt');
			$this->load->model('Discussion');
			$this->load->model('Comment');
			$this->load->model('User');
			$this->load->model('Gallery');
			$this->load->model('Subject');
			$this->load->model('Observer');
			$this->load->model('Image');
			$this->load->model('Notification');
			$this->load->library('form_validation');
			
			
		}
		
		 
		//the index function was me working through the concepts of CodeIgniter. It doesn't attach to a page that is
		//viewed by "users" but for me to test
		public function index(){
			if($this->uri->segment(3)){
				$filter = $this->uri->segment(4);
				$direction = $this->uri->segment(5);
				$page_data['dir'] = $this->uri->segment(5);	
			}else{
				$filter = null;
				$direction = null;
				$page_data['dir'] = 'ASC';	
			}
			
			$page_data['comments'] = $this->Discussion->get_all_discussions($filter, $direction);
			$user_data = array('userID' => 1,
							'imgTitle' => 'Warhol Wookiee');
			$page_data['image'] = $this->Image->get_image_id($user_data);
			$uID = $this->session->userID;
			$imgID = $this->session->imgID;
			$data = array('userID' => $uID,
					'imgID' => $imgID);
			
			//testing out observer pattern
			$observer = new Observer();
			$page_data['comment'] = $this->Comment->attach($observer);
			$page_data['comment'] = $this->Comment->notify($data);
			//this was my solution to create db observer table 
			$page_data['comment'] = $this->Comment->updateObserver($data);
			$page_data['comment'] = $this->Notification->addNotification($data);
			//$page_data['user'] = $this->User->get_user_details($userID);
			
			$this->load->view('common/header');
			$this->load->view('discussions/view', $page_data);
			$this->load->view('common/footer');
		}
		
		
		
		public function create() {
			//setting variables based on whos logged in
			$uID = $this->session->userID;
			$imgID = $this->session->imgID;
			$data = array('userID' => $uID,
					'imgID' => $imgID);
			
			//testing out observer pattern
			$observer = new Observer();
			$page_data['comment'] = $this->Comment->attach($observer);
			$page_data['comment'] = $this->Comment->notify($data);
			//this was my solution to create db observer table 
			$page_data['comment'] = $this->Comment->updateObserver($data);
			$page_data['comment'] = $this->Notification->addNotification($data);
        //$this->form_validation->set_rules('userName', $this->lang->line('discussion_usr_name'), 'required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('discTitle', $this->lang->line('discussion_ds_title'), 'required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('discBody', $this->lang->line('discussion_ds_body'), 'required|min_length[1]|max_length[5000]');
		
		//if validation does not go through loads the view image page
        if ($this->form_validation->run() == FALSE) { 
            $this->load->view('common/header');
            $this->load->view('galleries/view_image');
            $this->load->view('common/footer');         
        } else {
			//if validation does go through, variables are set based on session and form values
            $data = array('userID' => $this->session->userdata('userID'),
						  'userName' => $this->session->userdata('userName'),
						  'imgID' => $imgID,
                          'discTitle' => $this->input->post('discTitle'),
                          'discBody' =>  $this->input->post('discBody')
                          );
			
			//if comment is created redirects user to image
            if ($discID = $this->Discussion->create_discussion($data)) {
                redirect('galleries/view_image/'.$uID.'/'.$imgID);
				
            } else {
                // error
                // load view and flash sess error
            }
        }      
    }
	
	public function edit() {
		//setting values based on browser & session info
		$discID = $this->uri->segment(3);
		$uID = $this->session->userdata('uID');
		$imgID = $this->session->userdata('imgID');
		
		$data['query'] = $this->Discussion->get_discussions_by_id($discID);
        //$this->form_validation->set_rules('userName', $this->lang->line('discussion_usr_name'), 'required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('discTitle', $this->lang->line('discussion_ds_title'), 'required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('discBody', $this->lang->line('discussion_ds_body'), 'required|min_length[1]|max_length[5000]');
		//reloads edit page if validation didnt pass
        if ($this->form_validation->run() == FALSE) { 
            $this->load->view('common/header');
            $this->load->view('discussions/edit', $data);
            $this->load->view('common/footer');         
        } else {
			//gets user info from session and form
            $data = array('userID' => $this->session->userdata('userID'),
						  'userName' => $this->session->userdata('userName'),
                          'discTitle' => $this->input->post('discTitle'),
                          'discBody' =>  $this->input->post('discBody'),
						  'discID' => $discID
                          );
			
			//if info is updated redirects user to image
            if ($discID = $this->Discussion->edit_discussion($data)) {
                redirect('galleries/view_image/'.$uID.'/'.$imgID);
            } else {
                // error
                // load view and flash sess error
            }
        }      
    }
	public function save(){
		//gets information from user session and form submit
		$uID = $this->session->userdata('uID');
		$imgID = $this->session->userdata('imgID');
		if($this->input->post()){
			$discID = $this->input->post('discID');
		}else{
			$discID = $this->uri->segment(3);	
		}
		
		 $data['disc'] = array('userID' => $this->session->userdata('userID'),
						  'userName' => $this->session->userdata('userName'),
                          'discTitle' => $this->input->post('discTitle'),
                          'discBody' =>  $this->input->post('discBody'),
                          );
		
		if($this->Discussion->edit_discussion($discID, $data['disc'])){
			redirect('galleries/view_image/'.$uID.'/'.$imgID);	
		}else{
			// error
                // load view and flash sess error	
		}
	}
	
	
	public function delete(){
		$uID = $this->session->userdata('uID');
		$imgID = $this->session->userdata('imgID');
		if($this->input->post()){
			$discID = $this->input->post('discID');
		}else{
			$discID = $this->uri->segment(3);	
		}
		
		$data['page_heading'] = 'Confirm Delete?';
		
		$data['query'] = $this->Discussion->get_discussions_by_id($discID);
		
		$this->load->view('common/header');
        $this->load->view('discussions/delete', $data);
        $this->load->view('common/footer');
		
		if($this->Discussion->delete($discID)){
			redirect('galleries/view_image/'.$uID.'/'.$imgID);	
		}else{
			// error
                // load view and flash sess error	
		}
	}

    public function flag() {
        $discID = $this->uri->segment(3);
        if ($this->Discussion->flag($discID)) {
            redirect('discussions/');
        } else {
            // error
            // load view and flash sess error
        }        
    }    

	
	
}
	
?>