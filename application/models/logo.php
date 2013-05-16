<?php if (!defined('BASEPATH'))exit('No direct script access allowed');
	Class Logo extends CI_Model
	{
	  function __construct()
		{
        // Call the Model constructor
        parent::__construct();
		}
		
		function GetLogoData($logoid = false)
		{		
				$this->db->select('v.*');
				$this->db->from('tblfiles as v');
				
				$this->db->where('type','logo');
				if($logoid){
					$this->db->where('Id',$logoid);
				}
				$this->db->limit('1');
				$query = $this->db->get();
				return $query;
		}
		
		function GetInitData($logoid = false)
		{		
				$this->db->select('v.*');
				$this->db->from('tblfiles as v');
				$query = $this->db->get();
				return $query;
		}
		
		
		// function InsertVideoData()
		// {
					// $video_name = $this->input->post('txt_vname');
					// $description = $this->input->post('txtarea_vdescription');
					// $video_in_folder = $this->input->post('hidd_video');
					
                    // $data = array(
                        // 'file_name'=>$video_name,
                        // 'description'=>$description,
                        // 'is_show'=>'Y',
                        // 'type'=>'login_video',
                    // );
					// $this->db->trans_start();
                    // $status = $this->db->insert('tblfiles',$data); 
					// $lastvideoid=$this->db->insert_id();
					// $this->db->trans_complete();
					// return $status;
		// }
		
		function UpdateLogoData($updatelogoid)
		{
				$video_name = $this->input->post('txt_vname');
				$description = $this->input->post('txtarea_vdescription');
				$video_in_folder = $this->input->post('hidd_video');
				$strdate=date("Y-m-d");
				$datatoupdate = array(
						'file_name'=>$video_name,
                        'description'=>$description,
						'is_show'=>'Y',
                        'type'=>'logo',
                        'added_date'=>$strdate,
						'file_name_in_folder'=>$video_in_folder
				);
				
			$this->db->where('Id', $updatelogoid);
			$this->db->trans_start();
			$status = $this->db->update('tblfiles', $datatoupdate); 
			$this->db->trans_complete();
			return $status;
		
		}
		
	}
	?>