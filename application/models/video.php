<?php if (!defined('BASEPATH'))exit('No direct script access allowed');
	Class Video extends CI_Model
	{
	  function __construct()
		{
        // Call the Model constructor
        parent::__construct();
		}
		
		function GetVideoData($videoid = false)
		{		
				$this->db->select('v.*');
				$this->db->from('tblfiles as v');
				
				$this->db->where('type','login_video');
				if($videoid){
					$this->db->where('Id',$videoid);
				}
				$this->db->limit('1');
				$query = $this->db->get();
				return $query;
		}
		/** Welcome Video Block***/
		
		function UpdateWelcomeVideoData($updatevideoid)
		{
				$video_name = $this->input->post('txt_vname');
				$description = $this->input->post('txtarea_vdescription');
				$strdate=date("Y-m-d");
				$video_in_folder = $this->input->post('hidd_video');
				$datatoupdate = array(
									'file_name'=>$video_name,
									'description'=>$description,
									'is_show'=>'Y',
									'type'=>'welcome_video',
									'added_date'=>$strdate,
									'file_name_in_folder'=>$video_in_folder
								);
			
			$this->db->where('Id', $updatevideoid);
			$this->db->trans_start();
			$status = $this->db->update('tblfiles', $datatoupdate); 
			$this->db->trans_complete();
			return $status;
		
		}
		
		function GetWelVideoData($videoid = false){
			$this->db->select('v.*');
				$this->db->from('tblfiles as v');
				
				$this->db->where('type','welcome_video');
				if($videoid){
					$this->db->where('Id',$videoid);
				}
				$this->db->limit('1');
				$query = $this->db->get();
				return $query;
		}
		/** End of Welcome Video Block***/
		function InsertVideoData()
		{
					$video_name = $this->input->post('txt_vname');
					$description = $this->input->post('txtarea_vdescription');
					$video_in_folder = $this->input->post('hidd_video');
					
                    $data = array(
                        'file_name'=>$video_name,
                        'description'=>$description,
                        'is_show'=>'Y',
                        'type'=>'login_video',
                    );
					$this->db->trans_start();
                    $status = $this->db->insert('tblfiles',$data); 
					$lastvideoid=$this->db->insert_id();
					$this->db->trans_complete();
					return $status;
		}
		
		function UpdateVideoData($updatevideoid)
		{
				$video_name = $this->input->post('txt_vname');
				$description = $this->input->post('txtarea_vdescription');
				$video_in_folder = $this->input->post('hidd_video');
				$strdate=date("Y-m-d");
				 
				
				$datatoupdate = array(
						'file_name'=>$video_name,
                        'description'=>$description,
						'is_show'=>'Y',
                        'type'=>'login_video',
						'added_date'=>$strdate,
						'file_name_in_folder'=>$video_in_folder
            );
			
			$this->db->where('Id', $updatevideoid);
			$this->db->trans_start();
			$status = $this->db->update('tblfiles', $datatoupdate); 
			$this->db->trans_complete();
			return $status;
		
		}
		
	}
	?>