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
               redirect('login', 'refresh');
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
             $data['stylelist'][]='css/style.css';
             $data['scriptlist'][]='scripts/jquery-1.7.2.min.js';
             $data['scriptlist'][]='scripts/store_program.js';
             $data['scriptlist'][]='jwplayer/jwplayer.js';
             $data['scriptlist'][]='scripts/program_video.js';
             $this->data['scriptlist'][]='scripts/previewplayer.js';
             $this->data['scriptlist'][]='scripts/user_registration.js';
           
             
             //$data['step']=1;
             $data['programs']=$this->home_model->getPrograms();
             if($id === 0){
                 $first_program = $data['programs']->first_row();
                 $program_id = $first_program->id;
             }
             else{
                 $program_id = $id;
             }
             $data['programstored']=$this->home_model->isProgramStored($program_id);
             $data['programdata']=$this->home_model->getProgram($program_id);
             $session_data = $this->session->userdata('client_login');

             if($this->input->post('store_submit')!==false){
                 $this->home_model->storeProgram($id);
             }
             if($this->input->post('save_link')!==false){
                 $this->home_model->addAffiliateLink($id);
             }
             $data['title']='Marketing programs';
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