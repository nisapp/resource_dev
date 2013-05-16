<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Home extends CI_Controller {
	 
	 function __construct()
	 {
	   parent::__construct();
	   $this->load->model('video','',TRUE);
           $this->load->library('session');
           $session_login_client=$this->session->userdata('client_login');
           if (!($session_login_client['login_state'] == 'active' && $session_login_client['role'] == 'user')) {
               redirect('login/clientlogin', 'refresh');
           }
	 }
	 
	 function index()
	 {
           /*
	   if($this->session->userdata('logged_in'))
	   {//*/
			$query = $this->video->GetWelVideoData();
			$result	= $query->result();
			$data['query'] = $result[0];
			$session_data = $this->session->userdata('client_login');
			$data['username'] = $session_data['username'];
			$this->load->view('welcome_view',$data);
           /*             
	   }
           else{
			//If no session, redirect to login page
			redirect('/login', 'refresh');
	   }//*/
	 }
	 function programs($id=0){
             $data['step']=1;
             $this->load->helper('form');
             $this->load->model('home_model');
             $data['query']=$this->home_model->getProgram($id);
             $data['title']='Store programs';
             $session_data = $this->session->userdata('client_login');
             $data['username'] = $session_data['username'];
             $this->load->view('home/programs',$data);
         }
         function logout()
	 {
	   $this->session->unset_userdata('client_login');
	   redirect('/', 'refresh');//I changed redirecting path directory
	 }
	 
	}
	 
	?>