<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//session_start(); //we need to call PHP's session object to access it through CI
	class Clients extends CI_Controller {
	 
	 function __construct()
	 {
		parent::__construct();
		$this->load->model('user','',TRUE);
		$this->load->model('client','',TRUE);
                $this->load->model('training_model','',TRUE);
		$this->load->helper(array('url', 'form'));
		// check for validate user login
		$session_login_user=$this->session->userdata('logged_in');
		if (!($session_login_user['login_state'] == 'active' && $session_login_user['role'] == 'admin')) {
			redirect('/', 'refresh');
		}
	 }
	 
	function index()
	{
		$this->data['styles'][]='datatable/css/jquery.dataTables.css';
		$this->data['scripts'][]='datatable/js/jquery.dataTables.min.js';
		$this->data['query'] = $this->client->GetClientData();
		$this->data['subview']=  'admin/clients/clients_listing';
		$this->load->view('admin/_layout_main.php', $this->data);
	}

	function deleteclient($id){
		// echo $id;
		if(isset($id)){
			$statusdelete = $this->client->remove_client($id);	

			if($statusdelete==true)
				$this->data['status']="deletesuccess";
			else if($statusdelete==false)
				$this->data['status']="deletefailure";
		}
		$this->index();
		
	}
	function download(){
            $this->load->model('training_model',TRUE);
            $query=$this->client->GetClientData();
            if($query->num_rows===0){
                redirect("admin/clients");
                return;
            }
            $datalist=array();
            $i=0;
            foreach ($query->result_array()as $row){
                $temp_row = array(
                    'N'=>++$i,
                    'First Name'=>$row['first_name'],
                    'Last Name'=>$row['last_name'],
                    'Email'=>$row['user_email'],
                    'Phone'=>$row['phone_number'],
                );
                $datalist[]=$temp_row;
            }
            $this->training_model->download_send_headers("client_data_export_" . date("Y-m-d") . ".csv");
            echo $this->training_model->array2csv($datalist);
        }
	 
}
	 
	
	 
	?>