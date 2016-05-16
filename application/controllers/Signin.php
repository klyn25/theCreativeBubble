<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Signin extends MY_Controller {
  function __construct() {
    parent::__construct();
    $this->load->library('session');
    $this->load->helper('form');
    $this->load->helper('url');
    $this->load->helper('security'); 
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>'); 
  }

  public function index() {
    //if ($this->session->userdata('logged_in') == TRUE) {
     // if ($this->session->userdata('usr_access_level') == 1) {
       //redirect('galleries/gallery');
//      } else {
//        redirect('me');
//      }  
   // } else {
      // Set validation rules for view filters
      //$this->form_validation->set_rules('userEmail', 'required|valid_email|min_length[5]|max_length[125]');
      //$this->form_validation->set_rules('password', 'required|min_length[5]|max_length[30]');

      //if ($this->form_validation->run() == FALSE) {
//        $this->load->view('common/header');
//        $this->load->view('users/login');
//        $this->load->view('common/footer');   
//      } else {
        $userEmail = $this->input->post('userEmail');
        $password = $this->input->post('password');

        $this->load->model('Signin_model');
        $query = $this->Signin_model->does_user_exist($userEmail);

        if ($query->num_rows() == 1) { // One matching row found
          foreach ($query->result() as $row) {
            // Call Encrypt library
            $this->load->library('encrypt');
			
            // encrypt password
            $hash = do_hash($password);
			
			//checks if user is active
            if ($row->userActive != 0) {
              // compare encrypted email to see if they match
              if ($hash != $row->userHash) {
                // login fail
                $data['login_fail'] = true;
                $this->load->view('common/header');
                $this->load->view('welcome_message', $data);
                $this->load->view('common/footer'); 
              } else {
                $data = array(
                    'userID' => $row->userID,
					'userName' => $row->userName,
                    'userLevel' => $row->userLevel,
                    'logged_in' => TRUE
                );
				$user = $this->session->has_userdata('userID');
                // Save data to session
                $this->session->set_userdata($data);
				
                
                  redirect('myportal');
                
              }
            } else {
              // User currently inactive
              redirect('');
            }
          }
        } 
      //}
    //}
  }
	//logs user out
	  public function logout() {
		$this->session->sess_destroy();
		redirect ('login');
	  }  
}
