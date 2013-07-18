<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Landing extends CI_Controller {

	
	 function __construct()
	 {
		parent::__construct();
	    $this->load->library('session');
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
		//$this->load->view('landing_view',$this->data);
		//$i=mt_rand(1,4);
		$this->load->view("landing_view1",$this->data);
	 }
	 function l2()
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
		//$this->load->view('landing_view',$this->data);
		//$i=mt_rand(1,4);
		$this->load->view("landing_view2",$this->data);
	 }
	 function l3()
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
		//$this->load->view('landing_view',$this->data);
		//$i=mt_rand(1,4);
		$this->load->view("landing_view3",$this->data);
	 }
	 function l4()
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
		//$this->load->view('landing_view',$this->data);
		//$i=mt_rand(1,4);
		$this->load->view("landing_view4",$this->data);
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
			//$this->data['stylelist'][]='css/landing.css';
			// $this->data['stylelist'][]='css/jsplayer_custom.css';
			$this->data['scriptlist'][]='scripts/jquery-1.7.2.min.js';
			$this->load->view('termsofservice',$this->data);
		}
		public function privacypolicy(){
			$this->data['title']=' Privacy Policy';
			$this->data['stylelist'][]='css/style.css';
			// $this->data['stylelist'][]='css/jsplayer_custom.css';
			$this->data['scriptlist'][]='scripts/jquery-1.7.2.min.js';
			$this->load->view('privacypolicy',$this->data);             
		}
		public function earningdisclaimer(){
			$this->data['title']=' Earnings Disclaimer';
			$this->data['stylelist'][]='css/style.css';
			//$this->data['stylelist'][]='css/landing.css';
			//$this->data['stylelist'][]='css/jsplayer_custom.css';
			$this->data['scriptlist'][]='scripts/jquery-1.7.2.min.js';

			$this->load->view('earningdisclaimer',$this->data);             
		}
         public function plsubscribe($param = FALSE) {
        if ($param === FALSE) {
            $h = curl_init();
            curl_setopt($h, CURLOPT_URL, "http://www.gogvo.com/subscribe.php");
            curl_setopt($h, CURLOPT_POST, true);
            curl_setopt($h, CURLOPT_POSTFIELDS, "CampaignCode="
                    .$this->input->post('CampaignCode')."FormId="
                    .$this->input->post('FormId')."AffiliateName="
                    .$this->input->post('AffiliateName')."Email=".$this->input->post('Email')
            );
            //curl_setopt($h, CURLOPT_HEADER, false);
            curl_setopt($h, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($h);
            curl_close($h);
            $h1 = curl_init();
            curl_setopt($h1, CURLOPT_URL, "https://app.getresponse.com/add_contact_webform.html");
            curl_setopt($h1, CURLOPT_POST, true);
            curl_setopt($h1, CURLOPT_POSTFIELDS, "webform_id=".$this->input->post('webform_id').
                "email=".$this->input->post('Email')
            );
            //curl_setopt($h1, CURLOPT_HEADER, false);
            curl_setopt($h1, CURLOPT_RETURNTRANSFER, 1);
            $result1 = curl_exec($h1);
            curl_close($h1);
            //if (!empty($result) && !empty($result1)) {
            
                $this->session->set_userdata('pl_subscribe_page', $result);
                $this->session->set_userdata('gr_subscribe_page', $result1);
                /*echo 1;
            } else {
                echo 0;
            }//*///var_dump($_POST);
                echo $this->input->post('CampaignCode');//$result1;//$this->session->userdata('pl_subscribe_page');
        } elseif ($param === "pl_view") {
            $this->data['plresponse'] = $this->session->userdata('pl_subscribe_page');

            $this->load->view("pl_subscribe", $this->data);
        } elseif ($param === "gr_view") {
            $this->data['plresponse'] = $this->session->userdata('pl_subscribe_page');

            $this->load->view("pl_subscribe", $this->data);
        } else {
            redirect('/error_page');
        }
        //echo $result;
    }
    public function setplemail(){
        $this->session->set_userdata('pl_email', $this->input->post('email'));
        echo $this->session->userdata('pl_email');//$this->input->post('pl_email');//
    }
    function pl_display(){
        if($this->session->userdata('pl_res')){
            $this->data["plresponse"]=$this->session->userdata('pl_res');//"This part working";//
            echo "new test";
            var_dump($_SESSION);
            $this->session->unset_userdata('pl_res');
            $this->load->view('pl_subscribe',$this->data);
        }
        var_dump($_SESSION);
    }

}

