<?php
	if(!defined ('BASEPATH')) exit('No direct script access allowed');
	
	class Comments extends MY_Controller {
		function __construct(){
			parent::__construct();
			$this->load->helper('string');
			$this->load->library('form_validation');
			$this->load->model('Discussion');
			$this->load->model('Comment');
		}//end construct
		
		public function index(){
			if($this->input->post()){
				$discID = $this->input->post('discID');	
			}else{
				$discID = $this->uri->segment(3);
			}// end if
			
			$page_data['discussion_query'] = $this->Discussion->get_discussions_by_id($discID);
			$page_data['comment_query'] = $this->Comment->get_comments($discID);
			$page_data['discID'] = $discID;
			
			$this->form_validation->set_rules('discID', $this->lang->line('comments_comment_hidden_id'), 'required|min_length[1]|max_length[11]');
        	$this->form_validation->set_rules('userID', $this->lang->line('comments_comment_name'), 'required|min_length[1]|max_length[255]');
        	$this->form_validation->set_rules('comBody', $this->lang->line('comments_comment_body'), 'required|min_length[1]|max_length[5000]');

			if ($this->form_validation->run() == FALSE) { 
				$this->load->view('common/header');
				$this->load->view('discussions/view');
				$this->load->view('common/footer');
			}else{
				$data = array('discID' => $this->input->post('discID'),
							  'comBody' => $this->input->post('comBody'),
							  'userID' => $this->input->post('userID'),
						  	  'comActive' => '1'
							  );
				if($this->Comment->new_comment($data)){
					redirect('comments/index/' .$discID);	
				}else{
					//error
					//load view and flash sess error	
				}
			}//end if
				
		}// end index
		
		public function flag(){
			$comID = $this->uri->segment(4);
			if($this->Comment->flag($comID)){
				redirect('comments/index/' . $this->uri->segment(3));	
			}else{
				//error
				//load view and flash sess error	
			}
		}
		
	}// end Comments class
	
?>