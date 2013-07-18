<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//session_start(); //we need to call PHP's session object to access it through CI
class API extends CI_Controller {
	 
	function __construct()
	{
		parent::__construct();
		$this->load->model('apimodel','',TRUE);
                $this->load->model('user','',TRUE);
                $this->load->library('session');
	}
	 
	function index()
	{	
		$this->apimodel->test();
	}
        function add_contact(){
            if($this->input->post('email')){
                $gr_result = $this->apimodel->add_client($this->input->post('email'));
                echo $gr_result;
            }
            else{
                redirect("/");
            }
        }
        function plform(){
            $affuser_id = $this->session->userdata('affuserid');
            $this->data['pl_data']=$this->user->get_pure_leverage_data($affuser_id);
            $this->load->view('test',  $this->data);
        }
		
}
	 
	?>