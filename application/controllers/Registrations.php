<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

	class Registrations extends CI_Controller {
	  function __construct() {
		  parent::__construct();
		  $this->load->helper('form');
		  $this->load->helper('file');
		  $this->load->helper('url');
		  $this->load->helper('security');
		  $this->load->model('Register');
		  $this->load->library('encrypt');   
		  $this->load->library('form_validation');
		  $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');         
	  }
	  public function index() {
		  $this->load->view('common/header');
	  	  $this->load->view('users/signup'); 
		  $this->load->view('common/footer'); 
	  }
	
	  public function signup() {
		  
		  
		 //Set validation rules
		//$this->form_validation->set_rules('userFirst', 'required|min_length[1]|max_length[125]');
//		$this->form_validation->set_rules('userLast', 'required|min_length[1]|max_length[125]');
//		$this->form_validation->set_rules('userEmail', 'required|min_length[1]|max_length[255]|valid_email|is_unique[tcb_user.userEmail]');
	
		// Begin validation 
		//if ($this->form_validation->run() == FALSE) { // First load, or problem with form
		  $this->load->view('common/header');
		  $this->load->view('users/signup'); 
		  $this->load->view('common/footer');             
		//} else { 
		  
		  ;
		  // Create hash from user password 
		  $password = $this->input->post('password');
		  $hash = do_hash($password); 
		   
		  $data = array( 
			'userFirst' => $this->input->post('userFirst'), 
			'userLast' => $this->input->post('userLast'), 
			'userEmail' => $this->input->post('userEmail'), 
			'userName' => $this->input->post('userName'), 
			'userActive' => 1,
			'userLevel' => 1,
			'userHash' => $hash
		  ); 
	
		  if ($this->Register->register_user($data)) {
			$file = read_file('../views/email_scripts/welcome.txt');
			$file = str_replace('%usr_fname%', $data['userFirst'], $file);
			$file = str_replace('%usr_lname%', $data['userLast'], $file);
			redirect('login');
		  } else {
			redirect('signup');
		  }
		} 
	 // }
} 
