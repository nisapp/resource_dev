<?php if (!defined('BASEPATH'))exit('No direct script access allowed');
	Class Plspagesetup_Model extends CI_Model
	{
		function __construct()
		{
			// Call the Model constructor
			parent::__construct();
			
		}
		function save_data()
		{
			$client_data=$this->session->userdata('client_login');
			
			/* echo $client_data['id'];
			
			echo '<pre>';
			print_r($_POST);
			// $v=$this->session->all_userdata();
			// print_r($v);
			echo '</pre>';
			 */ 
			$strCamp = $this->input->post('txtCampaign');
			$strForm_id = $this->input->post('txtForm');
			$strAff_name = $this->input->post('txtAffliate');
			$inserted=date('Y-m-d');
		
			$data = array(
                        'user_id'=>$client_data['id'],
                        'campaign_code'=>$strCamp,
                        'form_id'=>$strForm_id,
                        'plev_affliate_name'=>$strAff_name,
                        'inserted_date'=>$inserted 
                    );
			$this->db->select('*');
			$this->db->from('purelev_setup' );
			$this->db->where('user_id',$client_data['id']);
			$sel_query = $this->db->get();
			$is_record_exist=$sel_query->num_rows;
			$this->db->trans_start();
			if($is_record_exist>0){
				$this->db->where('user_id',$client_data['id']);
				$status = $this->db->update('purelev_setup',$data); 
			}else{
				$status = $this->db->insert('purelev_setup',$data); 
			}
			$this->db->trans_complete();
			// $this->db->last_query(); 
			if($status){
				return 'success';
			}else{
				return 'failure';
			}
			
		}
		
		 public function getCampaignCode(){
			return "2b533a401b27";
		}
		
		public function getFormID(){
			return "2716777";
		}
		
		public function getAffiliateName(){
			return "elishahong2";
		} 
	}
?>