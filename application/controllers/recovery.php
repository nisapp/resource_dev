<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recovery extends CI_Controller {

	
	 function __construct()
	 {
		parent::__construct();
	   // $this->load->library('session');
	   // $this->load->library('email');
	    $this->load->model('logo','',TRUE);
            $this->load->model('recovery_model','',TRUE);
	    $this->load->model('user','',TRUE);
            $this->load->helper('form');
	    /*/$this->load->model('video','',TRUE);
		$session_login_client=$this->session->userdata('client_login');
		if (!empty($session_login_client)) {
			redirect('members/programs', 'refresh');
		}//*/
            
	 }
	 	 
	public function index(){
		// $this->data['affuserid'] = $this->uri->segment(3);
                //$this->data['isgo']=true;
		$this->data['title']='Password recovery';
		$this->data['stylelist'][]='css/style.css';
		$this->data['stylelist'][]='css/landing.css';
		$this->data['stylelist'][]='css/jsplayer_custom.css';
		$this->data['scriptlist'][]='scripts/jquery-1.7.2.min.js';
                $error="";
                $msg="";
                if($this->input->post('recovery')){
                    $info=$this->input->post('loginoremail');
                    $infotype=intval($this->input->post('data_type'));
                    if($infotype==1){
                        $userid = $this->recovery_model->getIDbyUsername($info);
                        if($userid->id==0){
                            $error="Username '$info' does not exists.";
                        }
                        else{
                            $uniqid = $this->recovery_model->setRequest($userid->id);
                            $this->recovery_model->sendLink($userid->user_email,$uniqid);
                            $msg="Password recovery letter has been sent to your email";
                        }
                    }
                    elseif($infotype==2){
                        $userid = $this->recovery_model->getIDbyEmail($info);
                        if($userid->id==0){
                            $error="Email '$info' does not exists.";
                        }
                        else{
                            $uniqid = $this->recovery_model->setRequest($userid->id);
                            $this->recovery_model->sendLink($userid->user_email,$uniqid);
                             $msg="Password recovery letter has been sent to your email";
                        }
                    }
                    else{
                        $error="Incorrect data please check it.";
                    }
                }
                if(!empty($error)){
                    $this->data['error']=$error;
                }
                if(!empty($msg)){
                    $this->data['msg']=$msg;
                }//*/
		$this->load->view('recovery/recovery_view',$this->data);
	 }
         public function reset($recoveryid) {
        $this->data['title'] = 'Password recovery';
        $this->data['stylelist'][] = 'css/style.css';
        $this->data['stylelist'][] = 'css/landing.css';
        $this->data['stylelist'][] = 'css/jsplayer_custom.css';
        $this->data['scriptlist'][] = 'scripts/jquery-1.7.2.min.js';
        $this->data['recoveryid']=$recoveryid;
        $error = "";
        $msg = "";
        $userdata= $this->recovery_model->validRecoveryID($recoveryid);
        if($userdata===FALSE){
            $msg="Sorry, this recovery ID can't be used";
        }
        else{
        $this->data['username']=$this->recovery_model->usrnameByID($userdata->userid);
        
        if($this->input->post("reset")){
            $password=$this->input->post('password');
            $confirm=$this->input->post('confirm');
            if($password===$confirm && strlen($password)>5){
                $this->recovery_model->resetPassword($password,$recoveryid);
                $msg="Password changed.";
            }
            else{
                $error="Wrong data.";
            }
        }
        }
        if (!empty($error)) {
            $this->data['error'] = $error;
        }
        if (!empty($msg)) {
            $this->data['msg'] = $msg;
        }//*/
        $this->load->view('recovery/reset', $this->data);
    }

}

