<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Landing extends CI_Controller {

	
	 function __construct()
	 {
		parent::__construct();
	   // $this->load->library('session');
	   // $this->load->library('email');
	    $this->load->model('logo','',TRUE);
	    $this->load->model('user','',TRUE);
	    //$this->load->model('video','',TRUE);
		$session_login_client=$this->session->userdata('client_login');
		if (!empty($session_login_client)) {
			redirect('clientadmin/clientdashboard', 'refresh');
		}//*/
            
	 }
	 	 
	 function index()
	 {
		$this->load->helper(array('form'));
		// unset previous affuserid from session
		$this->session->unset_userdata('affuserid');
		
		$this->data['title']='Easy Access Profits';
		$this->data['stylelist'][]='css/style.css';
		$this->data['stylelist'][]='css/landing.css';
		$this->data['stylelist'][]='css/jsplayer_custom.css';
		$this->data['scriptlist'][]='scripts/jquery-1.7.2.min.js';
		
		$this->load->view('landing_view',$this->data);
	 }
	public function affuser($id=false){
		$affuser_id = $this->uri->segment(3);
		// $this->data['affuserid'] = $this->uri->segment(3);
		$this->session->set_userdata('affuserid', $affuser_id);
		$this->data['title']='Invite User';
		$this->data['stylelist'][]='css/style.css';
		$this->data['stylelist'][]='css/landing.css';
		$this->data['stylelist'][]='css/jsplayer_custom.css';
		$this->data['scriptlist'][]='scripts/jquery-1.7.2.min.js';
		$this->load->view('landing_view',$this->data);
	 }
}

