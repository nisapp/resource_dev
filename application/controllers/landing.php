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
		/*$session_login_client=$this->session->userdata('client_login');
		if (!empty($session_login_client)) {
			redirect('members/programs', 'refresh');
		}//*/
            
	 }
	 	 
	 function index()
	 {
		$session_login_client=$this->session->userdata('client_login');
		if (!empty($session_login_client)) {
			redirect('members/programs', 'refresh');
		}//*/
                $this->data['islanding']=true;
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
		$session_login_client=$this->session->userdata('client_login');
		if (!empty($session_login_client)) {
			redirect('members/programs', 'refresh');
                        return;
		}//*/
                if($this->user->check_for_valid_affliate_id($id)===0){
                    redirect("landing",'refresh');
                    return;
                }
		redirect("go/$id",'refresh');
	 }
         public function termsofservice(){
		$this->data['title']='Terms Of Service';
		$this->data['stylelist'][]='css/style.css';
		$this->data['stylelist'][]='css/landing.css';
		$this->data['stylelist'][]='css/jsplayer_custom.css';
		$this->data['scriptlist'][]='scripts/jquery-1.7.2.min.js';
             
             $this->load->view('termsofservice',$this->data);
         }
         public function privacypolicy(){
		$this->data['title']='Terms Of Service';
		$this->data['stylelist'][]='css/style.css';
		$this->data['stylelist'][]='css/landing.css';
		$this->data['stylelist'][]='css/jsplayer_custom.css';
		$this->data['scriptlist'][]='scripts/jquery-1.7.2.min.js';
             
             $this->load->view('privacypolicy',$this->data);             
         }
         public function earningdisclaimer(){
		$this->data['title']='Terms Of Service';
		$this->data['stylelist'][]='css/style.css';
		$this->data['stylelist'][]='css/landing.css';
		$this->data['stylelist'][]='css/jsplayer_custom.css';
		$this->data['scriptlist'][]='scripts/jquery-1.7.2.min.js';
             
             $this->load->view('earningdisclaimer',$this->data);             
         }
}

