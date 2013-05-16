<?php
class Marketing_Model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function test_test(){
		return 'testssss';
	}
    
	function GetMarketingData($id=null){
		$this->db->select('mc.*');
		$this->db->from('marketing_programs as mc');
		
		//$this->db->join('users as u', 'mc.user_id = u.id', 'left');
		
		//$this->db->leftjoin('users as u');
		//$this->db->where('u.role','user');
		
		if($id){
			$this->db->where('mc.id',$id);
		}
		$query = $this->db->get();
		return $query;
	
	}
	
	function add($info){//Add video
            //$video = $this->input->post('video');
            $link = $this->input->post('link');
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $this->load->library('session');
            $user = $this->session->userdata('logged_in');
            $data = array(
                'video' =>$info['video']['full_path'],
                'link' =>$link,
                'logo' =>$info['logo']['full_path'],
                'title' =>$title,
                'description'=>$description
            );
            $this->db->insert('marketing_programs', $data); 
            return TRUE;
	}
        function editVideoData($id){
            $config['upload_path'] = './uploads/temp/';
            $config['allowed_types'] = 'avi|flv|wmv|mp4|mp3|gif|jpg|png';
            $config['max_size'] = '10000';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            $this->load->library('upload', $config);
            $link = $this->input->post('link');
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $videdata= array(
                'link'=>$link,
                'title'=>$title,
                'description'=>$description
            );
           if($this->input->post('source') === 'upload'){
                if ($this->upload->do_upload('video')) {
                    $info=$this->upload->data();
                    $video = $info['full_path'];
                    $videdata['video']=$video;
                }
                else{
                    $video='';
                }
            }
            elseif($this->input->post('source') === 'youtube'){
                $video=$this->input->post('video_youtube');
                $videdata['video']=$video;
            }
            if($this->upload->do_upload('logo')){
                $logo = $this->upload->data();
                $videdata['logo']=$logo['full_path'];
            }
            else{
                $logo = '';
            }
            $this->db->where('id',$id);
            $this->db->update('marketing_programs',$videdata);
        }
   

	
	function remove_marketing($id=null)
	{
		$this->db->delete('marketing_programs', array('id' => $id)); 
		// echo $this->db->last_query(); 
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;	
	}

}

?>