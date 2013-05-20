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
		// unset previous affuserid from session
		$this->session->unset_userdata('affuserid');
		
		$this->data['title']='allMoney';
		$this->data['stylelist'][]='css/style.css';
		$this->data['stylelist'][]='css/jsplayer_custom.css';
		$this->data['scriptlist'][]='scripts/jquery-1.7.2.min.js';
		$this->data['scriptlist'][]='scripts/html5.js';
		$this->data['scriptlist'][]='jwplayer/jwplayer.js';
		$this->data['scriptlist'][]='scripts/previewplayer.js';
		
		$this->load->view('landing_view',$this->data);
	 }
	public function affuser($id=false){
		$affuser_id = $this->uri->segment(3);
		// $this->data['affuserid'] = $this->uri->segment(3);
		$this->session->set_userdata('affuserid', $affuser_id);
		
		$this->data['title']='allMoney';
		$this->data['stylelist'][]='css/style.css';
		$this->data['stylelist'][]='css/jsplayer_custom.css';
		$this->data['scriptlist'][]='scripts/jquery-1.7.2.min.js';
		$this->data['scriptlist'][]='scripts/html5.js';
		$this->data['scriptlist'][]='jwplayer/jwplayer.js';
		$this->data['scriptlist'][]='scripts/previewplayer.js';
		
		$this->load->view('landing_view',$this->data);
	 }
}

