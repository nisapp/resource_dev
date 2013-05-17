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
	 }
	 	 
	 function index()
	 {
		$this->load->helper(array('form'));
		$this->session->unset_userdata('affuserid');
		// $this->data['query'] = $this->logo->GetInitData();
		// $this->load->view('landing_view',$this->data);
		$this->load->view('landing_view');
	 }
	public function affuser($id=false){
		$affuser_id = $this->uri->segment(3);
		// $this->data['affuserid'] = $this->uri->segment(3);
		$this->session->set_userdata('affuserid', $affuser_id);
		$this->load->view('landing_view');
	 }
}

