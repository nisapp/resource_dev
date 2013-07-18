<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Go extends CI_Controller {
	 function __construct()
	 {
		parent::__construct();
	   // $this->load->library('session');
	   // $this->load->library('email');
	    $this->load->model('logo','',TRUE);
	    $this->load->model('user','',TRUE);
            $this->load->library('session');
	    /*/$this->load->model('video','',TRUE);
		$session_login_client=$this->session->userdata('client_login');
		if (!empty($session_login_client)) {
			redirect('members/programs', 'refresh');
		}//*/
            
	}
	 	 
	public function index($id){
		$affuser_id = $this->uri->segment(2);
		/*if($this->user->check_username_exists($affuser_id)===0){
			redirect('/');
			return;
		}//*/
		// $this->data['affuserid'] = $this->uri->segment(3);
		$this->data['isgo']=true;
		$this->session->set_userdata('affuserid', $affuser_id);
		$this->data['title']='Invite User';
		//$this->data['stylelist'][]='css/style.css';
		//$this->data['stylelist'][]='css/landing.css';
		$this->data['stylelist'][]='scripts/mask/jquery.loadmask.css';
		$this->data['scriptlist'][]='scripts/jquery-1.7.2.min.js';
		$this->data['scriptlist'][]='scripts/mask/jquery.loadmask.js';
		//$this->data['scriptlist'][]='scripts/go_view.js';
		$this->data['plinfo'] = $this->user->get_pure_leverage_data($affuser_id);
		// $this->load->view('landing_view',$this->data);
		//$i=mt_rand(1,4);
		//$this->load->view("landing_view1",$this->data);
		$this->load->view("go_view",$this->data);
	 }
}

