<?php
	if(!defined ('BASEPATH')) exit('No direct script access allowed');
	
	class Passwords extends MY_Controller {
		
		function __construct(){
			parent::__construct();
			
			$this->load->model('User');
		}
		
		public function index(){
			//redirect('password/forgot_password');	
			$this->load->view('common/header');
			$this->load->view('users/login');
			$this->load->view('common/footer'); 
		}//end index
		
		
	//realization: I never checked to see if this works, not usre if there is a link anywhere for it but will add it at a later date	
		public function forgot_password() {
			
    		$this->form_validation->set_rules('userEmail', 'required|min_length[5]|max_length[125]|valid_email');

			if($this->form_validation->run() == FALSE){
				  $this->load->view('common/header');
				  $this->load->view('users/forgot_password');
				  $this->load->view('common/footer');      
			}else{
				  $email = $this->input->post('userEmail');
				  $num_res = $this->User->count_results($email);
			
				  if($num_res == 1){
						$code = $this->User->make_code();
						$data = array(
									  'pwdChangeCode' => $code,
									  'userEmail' => $email
									);  
		
						if ($this->User->update_user_code($data)) {
						  	$result = $this->User->get_user_details_by_email($email);
				
						  	foreach ($result->result() as $row) {
								$userFirst = $row->userFirst;
								$userLast = $row->userLast;
						  	}
		
						  	$link = 'bitlamp.wctc.edu/~kflick/php2/Fall2015/midterm/newPassword/'.$code;
						  
						  	$path = '/path/to/codeigniter/application/controllers/../views/email_scripts/reset_password.txt';
						  	$file = read_file($path);
						  	$file = str_replace('%usr_fname%', $userFirst, $file);
						  	$file = str_replace('%usr_lname%', $userLast, $file);
						  	echo $file = str_replace('%link%', $link, $file);
		
					  		if(mail ($email, $this->lang->line('email_subject_reset_password'),$file, 'From: me@domain.com')){
								redirect('signin');
					  		}
						}else{
						  //redirects user on error
						  redirect('password/forgot_password');
						}
				  }else{ //redirects user on error
						redirect('password/forgot_password');
				  } 
			}   
		}
  //realization: I never checked to see if this works, not usre if there is a link anywhere for it but will add it at a later date
  		public function new_password() {
			$this->form_validation->set_rules('code', 'required|min_length[4]|max_length[8]');
			$this->form_validation->set_rules('userEmail', 'required|min_length[5]|max_length[125]');
			$this->form_validation->set_rules('user_password1', 'required|min_length[5]|max_length[125]');
			$this->form_validation->set_rules('user_password2', 'required|min_length[5]|max_length[125]|matches[user_password1]');

			if ($this->input->post()) {
			  	$data['code'] = xss_clean($this->input->post('code'));
			} else { 
			  	$data['code'] = xss_clean($this->uri->segment(3));
			}

			if ($this->form_validation->run() == FALSE) {
				  $data['userEmail'] = array('name' => 'userEmail','class' => 'form-control', 'id' => 'userEmail',     'type' => 'text', 'value' => set_value('userEmail', ''), 'maxlength' => '100', 'size' => '35', 'placeholder' => 'New Email');
				  $data['user_password1'] = array('name' => 'user_password1', 'class' => 'form-control', 'id' => 'user_password1', 'type' => 'password', 'value' => set_value('user_password1', ''), 'maxlength'   => '100', 'size' => '35', 'placeholder' => 'Password');
				  $data['user_password2'] = array('name' => 'user_password2', 'class' => 'form-control', 'id' => 'user_password2', 'type' => 'password', 'value' => set_value('user_password2', ''), 'maxlength'   => '100', 'size' => '35', 'placeholder' => 'Retype Password');
		  
				  $this->load->view('common/header', $data);
				  $this->load->view('users/new_password', $data);      
				  $this->load->view('common/footer', $data);
    		}else{
				  // Does code from input match the code against the email
				  $email = xss_clean($this->input->post('usr_email'));
				  if (!$this->User->does_code_match($data, $email)) { // Code doesn't match
						redirect ('users/forgot_password');
				  }else{  // Code does match
						$hash = $this->encrypt->sha1($this->input->post('usr_password1')); 

						$data = array(
								  'usr_hash' => $hash,
								  'usr_email' => $email
								);

						if ($this->User->update_user_password($data)) {
						  	$link = 'bitlamp.wctc.edu/~kflick/php2/Fall2015/midterm/newPassword/'.$code;
						  	$result = $this->User->get_user_details_by_email($email);
				
						  	foreach ($result->result() as $row) {
								$userFirst = $row->userFirst;
								$userLast = $row->userLast;
						  	}

							$path = '/path/to/codeigniter/application/controllers/../views/email_scripts/new_password.txt';
							$file = read_file($path);
							$file = str_replace('%usr_fname%', $userFirst, $file);
							$file = str_replace('%usr_lname%', $userLast, $file);
							$file = str_replace('%password%', $password, $file);
							$file = str_replace('%link%', $link, $file);     
						  	if(mail ($email, $this->lang->line('email_subject_new_password'),$file, 'From: admin@thecreativebubble.com') ){
								redirect ('myportal');
          				}
        			}
     			 }
    		}    
  		}// end new password
		
		
			
	}//end passwords class
		
?>