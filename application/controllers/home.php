<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Home extends CI_Controller {
	 
	 function __construct()
	 {
	   parent::__construct();
	   $this->load->model('video','',TRUE);
           $this->load->model('home_model');
           $this->load->model('user');
           $this->load->model('client');
           $this->load->library('session');
           $this->load->helper('form');
           $session_login_client=$this->session->userdata('client_login');
           if (!($session_login_client['login_state'] == 'active' && $session_login_client['role'] == 'user')) {
               redirect('login/clientlogin', 'refresh');
           }
           
	 }
	 function index()
	 {
             $session_login_client=$this->session->userdata('client_login');
           if (!($session_login_client['login_state'] == 'active' && $session_login_client['role'] == 'user')) {
               redirect('home/register', 'refresh');
           }
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
             $session_login_client=$this->session->userdata('client_login');
           if (!($session_login_client['login_state'] == 'active' && $session_login_client['role'] == 'user')) {
               redirect('home/register', 'refresh');
           }
             $data['stylelist'][]='css/store_programs.css';
             $data['stylelist'][]='css/video.css';
             $data['stylelist'][]='css/video-js.css';
             $data['scriptlist'][]='scripts/jquery-1.7.2.min.js';
             $data['scriptlist'][]='scripts/store_program.js';
             $data['scriptlist'][]='jwplayer/jwplayer.js';
             $data['scriptlist'][]='scripts/video.js';
             $data['step']=1;
             $data['query']=$this->home_model->getProgram($id);
             $stored_program = $data['query']->first_row();
             if($stored_program->uid!==NULL){
                 $data['step']=2;
             }
             $session_data = $this->session->userdata('client_login');
             if($this->input->post('step1submit')){
                 $this->home_model->storeProgram($id);
                 $data['step']=2;
             }
             if($this->input->post('step2submit')){
                 $this->home_model->addAffiliateID($id);
                 $data['step']=3;
             }
             $data['title']='Store programs';
             $session_data = $this->session->userdata('client_login');
             $data['username'] = $session_data['username'];
             $this->load->view('home/programs',$data);
         }
         function logout()
	 {
             $session_login_client=$this->session->userdata('client_login');
           if (!($session_login_client['login_state'] == 'active' && $session_login_client['role'] == 'user')) {
               redirect('home/register', 'refresh');
           }
	   $this->session->unset_userdata('client_login');
	   redirect('/', 'refresh');//I changed redirecting path directory
	 }
	 
	}
	 
	?>