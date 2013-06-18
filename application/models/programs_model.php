<?php
class Programs_Model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getVideos(){
        $this->db->select('*');
        $this->db->from("tblfiles");
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query;
    }

   /*  public function getProgram($id = 0){
        $this->db->select('p.id as id, p.title as title, t.file_name as video, general_link as link, 
            affiliate_id, logo, t.id as vid, t.file_name_in_folder as video_file');
        $this->db->from('programs as p');
        $this->db->join('tblfiles as t','p.video_id = t.id');
        if($id!=0){
            $this->db->where('p.id',$id);
        }
        $query = $this->db->get();
        return $query;
    } */
    
    
    public function deleteProgram($pid){
		
		$query=$this->getProgram($pid);
		$row=$query->row();
		if(empty($row))continue;
		$logo_file=$row->logo;
		$video_file=$row->video_name_in_folder;
				
        $this->db->where('id',$pid);
        $delres=$this->db->delete('programs');
		if($delres){
			if(isset($logo_file) && ($logo_file!='')){
				if(file_exists('./uploads/logo/'.$logo_file)){
					unlink('./uploads/logo/'.$logo_file);
				}
			}
			if(isset($video_file) && ($video_file!='')){
				if(file_exists('./uploads/videos/'.$video_file)){
					unlink('./uploads/videos/'.$video_file);
				}
			}
		}
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

	/*******************************Code added By Nisappian ****************************/
	public function delete_selected_program($id=array()){
		// echo implode(',',$id); 
		if(isset($id) && ($id!='')){
			foreach($id as $val){
				$query=$this->getProgram($val);
				$row=$query->row();
				if(empty($row))continue;
				$logo_file=$row->logo;
				$video_file=$row->video_name_in_folder;
				// echo '<pre>';
				// print_r($row);
				// echo '</pre>';

				$this->db->where('id',$val);
				$delres=$this->db->delete('programs');
				if($delres){
					if(isset($logo_file) && ($logo_file!='')){
						if(file_exists('./uploads/logo/'.$logo_file)){
							unlink('./uploads/logo/'.$logo_file);
						}
					}
					if(isset($video_file) && ($video_file!='')){
						if(file_exists('./uploads/videos/'.$video_file)){
							unlink('./uploads/videos/'.$video_file);
						}
					}
				}
				$prg_data=''; 
			} 
			return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
		}else{
			return FALSE;
		}
	}
	
	public function getProgram_for_clentdashboard($id = 0){
		/* $this->db->select('p.*');
        $this->db->from('programs as p');
        if($id!=0){
            $this->db->where('p.id',$id);
        }
		$this->db->order_by("nav_position", "asc");
		$this->db->limit('3');
        $query = $this->db->get(); */
		
		$session_login_client=$this->session->userdata('client_login');
		
		// echo '<pre>';
		// print_r($session_login_client);
		// echo '</pre>';

		$this->db->select('p.*,m.user_name');
		$this->db->from('programs as p');
		$this->db->join('programs_meta as m', "p.id = m.programid and m.userid={$session_login_client['id']}", 'left');
		$this->db->order_by("p.nav_position", "asc");
		$this->db->limit('3');
		$query = $this->db->get();
		// echo $this->db->last_query();
		return $query;
	}
	
	public function getProgram($id = 0){
        $this->db->select('p.*');
        $this->db->from('programs as p');
        if($id!=0){
            $this->db->where('p.id',$id);
        }
		$this->db->order_by("nav_position", "asc");
        $query = $this->db->get();
        return $query;
    }
	
	public function updProgram($pid=0){
		// $data11=$_POST;
		// echo '<pre>';
		// print_r($data11);
		// echo '</pre>';
		$upload_source=$this->input->post('source');
		if ((isset($_FILES['file_upload_video']['name']) && $_FILES['file_upload_video']['name'] != '')  &&(isset($upload_source) && $upload_source=='upload')) {
			
			unset($config);
			$configVideo['upload_path'] = './uploads/videos/';
			$configVideo['max_size'] = '102400';
			$configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
			$configVideo['overwrite'] = FALSE;
			$configVideo['remove_spaces'] = TRUE;
			$video_name = 'prgm_'.$_FILES['file_upload_video']['name'];
			$configVideo['file_name'] = $video_name;
			$this->load->library('upload', $configVideo);
			$this->upload->initialize($configVideo);
			
			if (!$this->upload->do_upload('file_upload_video')) {
				echo '<h1 align="center">'.$this->upload->display_errors().'</h1>';die(" Invalid File");
			} else {
				$videoDetails = $this->upload->data();
				$video_name=$videoDetails['file_name'];
			}
		}elseif(isset($upload_source) && $upload_source=='youtube'){
			$video_name=$this->input->post('video_youtube');
		}else{
			$video_name=$this->input->post('txtOldVideo'); 
		}
		
		
		if (isset($_FILES['file_upload_logo']['name']) && $_FILES['file_upload_logo']['name'] != '') {
			unset($config);
			$configVideo['upload_path'] = './uploads/logo/';
			$configVideo['max_size'] = '10000';
			$configVideo['allowed_types'] = 'gif|jpg|png';
			$configVideo['overwrite'] = FALSE;
			$configVideo['remove_spaces'] = TRUE;
			$logo_name = 'prgm_'.$_FILES['file_upload_logo']['name'];
			$configVideo['file_name'] = $logo_name;
			$this->load->library('upload', $configVideo);
			$this->upload->initialize($configVideo);
			
			if (!$this->upload->do_upload('file_upload_logo')) {
				echo '<h1 align="center">'.$this->upload->display_errors().'</h1>';die(" Invalid File");
			} else {
				$videoDetails = $this->upload->data();
				$logo_name=$videoDetails['file_name'];
			}
		}else{
			$logo_name=$this->input->post('txtOldLogo');
		}
        
        $nav_title = $this->input->post('txtNavigation');
        $nav_position = $this->input->post('txtposition');
        $link = $this->input->post('txtSignup_Link');
        $video_title = $this->input->post('txtVideo_Title');
        $program_title = $this->input->post('txtProgram_Title');
		$datatoupdate = array(
            'program_title'=>$program_title,
            'video_title'=>$video_title,
            'video_name_in_folder'=>$video_name,
            'signup_link'=>$link,
            'nav_position'=>$nav_position,
            'leftnav_title'=>$nav_title,
            'logo'=>$logo_name
        );
		$this->db->where('id', $pid);
		$this->db->trans_start();
		$status = $this->db->update('programs', $datatoupdate); 
		$this->db->trans_complete();
		return $status;
	}

	
	public function addProgram($pid=0){
		$data11=$_POST;
		// echo '<pre>';
		// print_r($data11);
		// echo '</pre>';
		$upload_source=$this->input->post('source');
		if ((isset($_FILES['file_upload_video']['name']) && $_FILES['file_upload_video']['name'] != '') &&( isset($upload_source) && $upload_source=='upload')) {
			// echo '<pre>';
			// print_r($_FILES);
			// echo '</pre>';die();
			unset($config);
			$configVideo['upload_path'] = './uploads/videos/';
			$configVideo['max_size'] = '102400';
			$configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
			$configVideo['overwrite'] = FALSE;
			$configVideo['remove_spaces'] = TRUE;
			$video_name = 'prgm_'.$_FILES['file_upload_video']['name'];
			$configVideo['file_name'] = $video_name;
			$this->load->library('upload', $configVideo);
			$this->upload->initialize($configVideo);
			
			if (!$this->upload->do_upload('file_upload_video')) {
				echo '<h1 align="center">'.$this->upload->display_errors().'</h1>';die(" Invalid File");
			} else {
				$videoDetails = $this->upload->data();
				$video_name=$videoDetails['file_name'];
			}
		}else{
			$video_name=$this->input->post('video_youtube');
		}
		
		if (isset($_FILES['file_upload_logo']['name']) && $_FILES['file_upload_logo']['name'] != '') {
			unset($config);
			$configVideo['upload_path'] = './uploads/logo/';
			$configVideo['max_size'] = '10000';
			$configVideo['allowed_types'] = 'gif|jpg|png';
			$configVideo['overwrite'] = FALSE;
			$configVideo['remove_spaces'] = TRUE;
			$logo_name = 'prgm_'.$_FILES['file_upload_logo']['name'];
			$configVideo['file_name'] = $logo_name;
			$this->load->library('upload', $configVideo);
			$this->upload->initialize($configVideo);
			
			if (!$this->upload->do_upload('file_upload_logo')) {
				echo '<h1 align="center">'.$this->upload->display_errors().'</h1>';die(" Invalid File");
			} else {
				$videoDetails = $this->upload->data();
				$logo_name=$videoDetails['file_name'];
			}
		}else{
			$logo_name='';
		}
		// die("dsddddddddd");
        
        $nav_title = $this->input->post('txtNavigation');
        $nav_position = $this->input->post('txtposition');
        $link = $this->input->post('txtSignup_Link');
        $video_title = $this->input->post('txtVideo_Title');
        $program_title = $this->input->post('txtProgram_Title');
        $errors=FALSE;
        $data = array(
            'program_title'=>$program_title,
            'video_title'=>$video_title,
            'video_name_in_folder'=>$video_name,
            'signup_link'=>$link,
            'nav_position'=>$nav_position,
            'leftnav_title'=>$nav_title,
            'logo'=>$logo_name
        );
		
		$this->db->insert('programs',$data);
		// echo $this->db->last_query(); 
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
	
	/**************************** End of Code added By Nisappian **********************************/
}

