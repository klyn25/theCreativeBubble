<?php
	if(!defined ('BASEPATH')) exit('No direct script access allowed');
	
	class Galleries extends MY_Controller {
		
		function __construct(){
			parent::__construct();
			$this->load->helper('string');
			$this->load->library('encrypt');
			$this->load->model('Discussion');
			$this->load->model('Gallery');
			$this->load->library('form_validation');
		}
		
		public function index(){
			
			
			$page_data['query'] = $this->Gallery->get_all_galleries();
			
			$this->load->view('common/header');
			$this->load->view('galleries/gallery', $page_data);
			$this->load->view('common/footer');
		}
		
		public function user_gallery(){
			
			$userID = $this->uri->segment(3);
			$page_data['artist'] = $this->Gallery->get_artist($userID);
			$page_data['user'] = $this->Gallery->get_gallery_by_user($userID);
			
			$this->load->view('common/header');
			$this->load->view('galleries/view', $page_data);
			$this->load->view('common/footer');	
		}
		
		public function rand_gallery(){
			//insert code from gallery model to get random
			
			$userID = $this->Gallery->get_rand_gallery();
			$page_data['artist'] = $this->Gallery->get_artist($userID);
			$page_data['user'] = $this->Gallery->get_gallery_by_user($userID);
			
			$this->load->view('common/header');
			//redirect('galleries/view', $page_data);
			$this->load->view('galleries/view', $page_data);
			$this->load->view('common/footer');	
			
			//if comment is created redirects user to image
            
		}
		
		public function view_image(){
			
			if(isset($_SESSION['uID'])){
				$data = array(
                    'uID',
					'imgID'
           		 );
			
            	// Save data to session
            	$this->session->unset_tempdata($data);	
			}
			
			$uID = $this->uri->segment(3);
			$imgID = $this->uri->segment(4);
			
			$page_data['user'] = $this->Gallery->get_gallery_by_img($imgID);
			$page_data['comments'] = $this->Discussion->get_discussions_by_img($imgID);
			
			$data = array(
                    'uID' => $uID,
					'imgID' => $imgID
            );
			
            // Save data to session
            $this->session->set_tempdata($data);
			
			$this->load->view('common/header');
			$this->load->view('galleries/view_image', $page_data);
			$this->load->view('common/footer');	
		}
		
		public function sketchbook_gallery(){
			
			$page_data['query'] = $this->Gallery->get_all_sketchbooks();
			
			$this->load->view('common/header');
			$this->load->view('sketchbook/sbgallery', $page_data);
			$this->load->view('common/footer');
			
		}//end sb gallery
		
		public function sketchbook(){
			
			//$page_data['query'] = $this->Gallery->get_sketchbook();
			
			//$this->load->view('common/header');
			$this->load->view('galleries/sbgallery');
			
		}//end sketchbook 
		
		public function book(){
			$page_data['query'] = $this->Gallery->get_sketchbook();
			
			$this->load->view('common/header');
			$this->load->view('sketchbook/book', $page_data);
			//$this->load->view('common/footer');
			
		}//end book 
	}
		
		
?>
