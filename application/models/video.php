<?php if (!defined('BASEPATH'))exit('No direct script access allowed');
	Class Video extends CI_Model
	{
	  function __construct()
		{
			// Call the Model constructor
			parent::__construct();
		}
		/********************Start of 28 may Work************************************************/
		
		function GetPureLevVideoData($videoid = false){
			$this->db->select('v.*');
			$this->db->from('tblfiles as v');
			
			$this->db->where('type','pure_leverage_video');
			if($videoid){
				$this->db->where('Id',$videoid);
			}
			$this->db->limit('1');
			$query = $this->db->get();
			return $query;
		}
		
		function GetNextVideoData($videoid = false){
			$this->db->select('v.*');
			$this->db->from('tblfiles as v');
			
			$this->db->where('type','next_video');
			if($videoid){
				$this->db->where('Id',$videoid);
			}
			$this->db->limit('1');
			$query = $this->db->get();
			return $query;
		}
		
		function UpdateNextVideo($updatevideoid){
			if (isset($_FILES['file_upload']['name']) && $_FILES['file_upload']['name'] != '') {
				// echo '<pre>';
				// print_r($_FILES);
				// echo '</pre>';die();
				unset($config);
				// $date = date("ymd");
				$configVideo['upload_path'] = './uploads/videos/';
				$configVideo['max_size'] = '102400';
				$configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
				$configVideo['overwrite'] = FALSE;
				$configVideo['remove_spaces'] = TRUE;
				$video_name = 'next_'.$_FILES['file_upload']['name'];
				$configVideo['file_name'] = $video_name;
	 
				$this->load->library('upload', $configVideo);
				$this->upload->initialize($configVideo);
				
				if (!$this->upload->do_upload('file_upload')) {
					echo '<h1 align="center">'.$this->upload->display_errors().'</h1>';die(" Invalid File");
					// return 'invalid_video';
				} else {
					$videoDetails = $this->upload->data();
					$video_name=$videoDetails['file_name'];
					// echo '<pre>';
					// print_r($videoDetails);
					// echo '</pre>';die();
					// die();
					// echo "Successfully Uploaded"; die();
				}
			}else{
				$video_name=$this->input->post('hidd_video');
				// echo 'nnnnnnnnnnnn';
			}
		
			$video_title = $this->input->post('txt_vname');
			$description = $this->input->post('txtarea_vdescription');
			$strdate=date("Y-m-d");
			$video_in_folder = $this->input->post('hidd_video');
			$video_in_folder = $this->input->post('hidd_video');$tab_title = $this->input->post('txtNavigation');
			$position = $this->input->post('txtposition');
			
			$datatoupdate = array(
								'file_name'=>$video_title,
								'description'=>$description,
								'is_show'=>'Y',
								'type'=>'next_video',
								'added_date'=>$strdate,
								'position'=>$position,
								'tab_title'=>$tab_title,
								'file_name_in_folder'=>$video_name
							);
			
			$this->db->where('Id', $updatevideoid);
			$this->db->where('type', 'next_video');
			$this->db->trans_start();
			$status = $this->db->update('tblfiles', $datatoupdate); 
			// echo $this->db->last_query(); 
			$this->db->trans_complete();
			return $status;
		
		}
		
		
		function UpdatePureLeverageVideo($updatevideoid){
			if (isset($_FILES['file_upload']['name']) && $_FILES['file_upload']['name'] != '') {
				// echo '<pre>';
				// print_r($_FILES);
				// echo '</pre>';die();
				unset($config);
				// $date = date("ymd");
				$configVideo['upload_path'] = './uploads/videos/';
				$configVideo['max_size'] = '102400';
				$configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
				$configVideo['overwrite'] = FALSE;
				$configVideo['remove_spaces'] = TRUE;
				$video_name = 'pure_'.$_FILES['file_upload']['name'];
				$configVideo['file_name'] = $video_name;
	 
				$this->load->library('upload', $configVideo);
				$this->upload->initialize($configVideo);
				
				if (!$this->upload->do_upload('file_upload')) {
					echo '<h1 align="center">'.$this->upload->display_errors().'</h1>';die(" Invalid File");
					// return 'invalid_video';
				} else {
					$videoDetails = $this->upload->data();
					$video_name=$videoDetails['file_name'];
					// echo '<pre>';
					// print_r($videoDetails);
					// echo '</pre>';die();
					// die();
					// echo "Successfully Uploaded"; die();
				}
			}else{
				$video_name=$this->input->post('hidd_video');
				// echo 'nnnnnnnnnnnn';
			}
		
			$video_title = $this->input->post('txt_vname');
			$description = $this->input->post('txtarea_vdescription');
			$strdate=date("Y-m-d");
			$video_in_folder = $this->input->post('hidd_video');$tab_title = $this->input->post('txtNavigation');
			$position = $this->input->post('txtposition');
					
			$datatoupdate = array(
								'file_name'=>$video_title,
								'description'=>$description,
								'is_show'=>'Y',
								'type'=>'pure_leverage_video',
								'added_date'=>$strdate,
								'position'=>$position,
								'tab_title'=>$tab_title,
								'file_name_in_folder'=>$video_name
							);
			
			$this->db->where('Id', $updatevideoid);
			$this->db->where('type', 'pure_leverage_video');
			$this->db->trans_start();
			$status = $this->db->update('tblfiles', $datatoupdate); 
			// echo $this->db->last_query(); 
			$this->db->trans_complete();
			return $status;
		}
		
		
		function GetEmpVideoData($videoid = false){
			$this->db->select('v.*');
			$this->db->from('tblfiles as v');
			
			$this->db->where('type','emp_video');
			if($videoid){
				$this->db->where('Id',$videoid);
			}
			$this->db->limit('1');
			$query = $this->db->get();
			return $query;
		}
		
		function UpdateEmpowerVideo($updatevideoid){
			if (isset($_FILES['file_upload']['name']) && $_FILES['file_upload']['name'] != '') {
				// echo '<pre>';
				// print_r($_FILES);
				// echo '</pre>';die();
				unset($config);
				// $date = date("ymd");
				$configVideo['upload_path'] = './uploads/videos/';
				$configVideo['max_size'] = '102400';
				$configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
				$configVideo['overwrite'] = FALSE;
				$configVideo['remove_spaces'] = TRUE;
				$video_name = 'emp_'.$_FILES['file_upload']['name'];
				$configVideo['file_name'] = $video_name;
	 
				$this->load->library('upload', $configVideo);
				$this->upload->initialize($configVideo);
				
				if (!$this->upload->do_upload('file_upload')) {
					echo '<h1 align="center">'.$this->upload->display_errors().'</h1>';die(" Invalid File");
					// return 'invalid_video';
				} else {
					$videoDetails = $this->upload->data();
					$video_name=$videoDetails['file_name'];
					// echo '<pre>';
					// print_r($videoDetails);
					// echo '</pre>';die();
					// die();
					// echo "Successfully Uploaded"; die();
				}
			}else{
				$video_name=$this->input->post('hidd_video');
				// echo 'nnnnnnnnnnnn';
			}
		
			$video_title = $this->input->post('txt_vname');
			$description = $this->input->post('txtarea_vdescription');
			$strdate=date("Y-m-d");
			$video_in_folder = $this->input->post('hidd_video');
			$tab_title = $this->input->post('txtNavigation');
			$position = $this->input->post('txtposition');
			$datatoupdate = array(
								'file_name'=>$video_title,
								'description'=>$description,
								'is_show'=>'Y',
								'type'=>'emp_video',
								'added_date'=>$strdate,
								'position'=>$position,
								'tab_title'=>$tab_title,
								'file_name_in_folder'=>$video_name
							);
			
			$this->db->where('Id', $updatevideoid);
			$this->db->where('type', 'emp_video');
			$this->db->trans_start();
			$status = $this->db->update('tblfiles', $datatoupdate); 
			// echo $this->db->last_query(); 
			$this->db->trans_complete();
			return $status;
		}
		
		function GetGvoVideoData($videoid = false){
				$this->db->select('v.*');
				$this->db->from('tblfiles as v');
				
				$this->db->where('type','gvo_video');
				if($videoid){
					$this->db->where('Id',$videoid);
				}
				$this->db->limit('1');
				$query = $this->db->get();
				return $query;
		}
		
		function UpdateGvoVideoData($updatevideoid)
		{
			if (isset($_FILES['file_upload']['name']) && $_FILES['file_upload']['name'] != '') {
				// echo '<pre>';
				// print_r($_FILES);
				// echo '</pre>';die();
				unset($config);
				// $date = date("ymd");
				$configVideo['upload_path'] = './uploads/videos/';
				$configVideo['max_size'] = '102400';
				$configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
				$configVideo['overwrite'] = FALSE;
				$configVideo['remove_spaces'] = TRUE;
				$video_name = 'gvo_'.$_FILES['file_upload']['name'];
				$configVideo['file_name'] = $video_name;
	 
				$this->load->library('upload', $configVideo);
				$this->upload->initialize($configVideo);
				
				if (!$this->upload->do_upload('file_upload')) {
					echo '<h1 align="center">'.$this->upload->display_errors().'</h1>';die(" Invalid File");
					// return 'invalid_video';
				} else {
					$videoDetails = $this->upload->data();
					$video_name=$videoDetails['file_name'];
					// echo '<pre>';
					// print_r($videoDetails);
					// echo '</pre>';die();
					// die();
					// echo "Successfully Uploaded"; die();
				}
			}else{
				$video_name=$this->input->post('hidd_video');
				// echo 'nnnnnnnnnnnn';
			}
		
			$video_title = $this->input->post('txt_vname');
			$description = $this->input->post('txtarea_vdescription');
			$strdate=date("Y-m-d");
			$video_in_folder = $this->input->post('hidd_video');
			$tab_title = $this->input->post('txtNavigation');
			$position = $this->input->post('txtposition');
			$datatoupdate = array(
								'file_name'=>$video_title,
								'description'=>$description,
								'is_show'=>'Y',
								'type'=>'gvo_video',
								'added_date'=>$strdate,
								'position'=>$position,
								'tab_title'=>$tab_title,
								'file_name_in_folder'=>$video_name
							);
			
			$this->db->where('Id', $updatevideoid);
			$this->db->where('type', 'gvo_video');
			$this->db->trans_start();
			$status = $this->db->update('tblfiles', $datatoupdate); 
			// echo $this->db->last_query(); 
			$this->db->trans_complete();
			return $status;
		
		}
		
		function UpdateVideoData($updatevideoid){
			if (isset($_FILES['file_upload']['name']) && $_FILES['file_upload']['name'] != '') {
				unset($config);
				$configVideo['upload_path'] = './uploads/videos/';
				$configVideo['max_size'] = '102400';
				$configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
				$configVideo['overwrite'] = FALSE;
				$configVideo['remove_spaces'] = TRUE;
				$video_name = 'login_'.$_FILES['file_upload']['name'];
				$configVideo['file_name'] = $video_name;
	 
				$this->load->library('upload', $configVideo);
				$this->upload->initialize($configVideo);
				
				if (!$this->upload->do_upload('file_upload')) {
					echo '<h1 align="center">'.$this->upload->display_errors().'</h1>';die(" Invalid File");
					// return 'invalid_video';
				} else {
					$videoDetails = $this->upload->data();
					$video_name=$videoDetails['file_name'];
					// echo "Successfully Uploaded"; die();
				}
			}else{
				$video_name=$this->input->post('hidd_video');
			}
		
			$video_title = $this->input->post('txt_vname');
			$description = $this->input->post('txtarea_vdescription');
			$nav_title = $this->input->post('txtNavigation');
			$strdate=date("Y-m-d");
			$video_in_folder = $this->input->post('hidd_video');
			$datatoupdate = array(
								'file_name'=>$video_title,
								'description'=>$description,
								'is_show'=>'Y',
								'type'=>'login_video',
								'added_date'=>$strdate,
								'tab_title'=>$nav_title,
								'file_name_in_folder'=>$video_name
							);
			
			$this->db->where('Id', $updatevideoid);
			$this->db->where('type', 'login_video');
			$this->db->trans_start();
			$status = $this->db->update('tblfiles', $datatoupdate); 
			// echo $this->db->last_query(); 
			$this->db->trans_complete();
			return $status;
		}
		
		function UpdateWelcomeVideoData($updatevideoid){
			if (isset($_FILES['file_upload']['name']) && $_FILES['file_upload']['name'] != '') {
				unset($config);
				$configVideo['upload_path'] = './uploads/videos/';
				$configVideo['max_size'] = '102400';
				$configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
				$configVideo['overwrite'] = FALSE;
				$configVideo['remove_spaces'] = TRUE;
				$video_name = 'wel_'.$_FILES['file_upload']['name'];
				$configVideo['file_name'] = $video_name;
	 
				$this->load->library('upload', $configVideo);
				$this->upload->initialize($configVideo);
				
				if (!$this->upload->do_upload('file_upload')) {
					echo '<h1 align="center">'.$this->upload->display_errors().'</h1>';die(" Invalid File");
					// return 'invalid_video';
				} else {
					$videoDetails = $this->upload->data();
					$video_name=$videoDetails['file_name'];
					// echo "Successfully Uploaded"; die();
				}
			}else{
				$video_name=$this->input->post('hidd_video');
			}
		
			$video_title = $this->input->post('txt_vname');
			$description = $this->input->post('txtarea_vdescription');
			$strdate=date("Y-m-d");
			$video_in_folder = $this->input->post('hidd_video');
			$datatoupdate = array(
								'file_name'=>$video_title,
								'description'=>$description,
								'is_show'=>'Y',
								'type'=>'welcome_video',
								'added_date'=>$strdate,
								'file_name_in_folder'=>$video_name
							);
			
			$this->db->where('Id', $updatevideoid);
			$this->db->where('type', 'welcome_video');
			$this->db->trans_start();
			$status = $this->db->update('tblfiles', $datatoupdate); 
			// echo $this->db->last_query(); 
			$this->db->trans_complete();
			return $status;
		}


		
		/********************End of 28 may Work************************************************/
		function GetAllVideoData($videoid=false)
		{		
				$this->db->select('v.*');
				$this->db->from('tblfiles as v');
				$array = array('type !=' => 'logo');
				$this->db->order_by("position", "asc");
				$this->db->where($array);
				if($videoid){
					$this->db->where('Id',$videoid);
				}
				$query = $this->db->get();
				// echo $this->db->last_query(); 
				return $query;
		}
	
		/*************************************************************/
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
		
		/* 
		
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
		
		} */
		
	}
	?>