<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class Home_model extends CI_Model{
    function __construct() {
        parent::__construct();
        
    }
    function getProgram($id){
        $session_data = $this->session->userdata('client_login');
        $query = $this->getStoredProgram($id, $session_data['id']);
        if($query->num_rows==1){
            return $query;
        }
        $query->free_result();
        $affiliate_user = $this->getAffiliateUser();
        if(empty($affiliate_user)){
            $this->db->select('*');
            $this->db->from('marketing_programs');
            $this->db->where('id',$id);
            $query1 = $this->db->get();
        }
        else{
            $uid = $this->getUserByTrackId($affiliate_user);
            $query1 = $this->getStoredProgram($id, $uid,1);
        }
        //echo $this->db->last_query();
        return $query1;
    }
    function getStoredProgram($programid, $userid, $sponsor = 0){
        $this->db->select("mp.id as id, mp.video as video, mp.link as link, mp.title as title,
            mp.description as description, mp.logo as logo, sp.userid as uid, 
            sp.affilateid as affiliateid, COALESCE( sp.affiliate_link, mp.affiliate_link ) as affiliate_link");
        $this->db->from('marketing_programs as mp');
        $this->db->join("`stored_programs` as sp",'mp.id = sp.programid','LEFT');
        if($sponsor===0){
        $where="sp.userid IS not NULL ";
        $this->db->where($where);
        }
        $this->db->where('mp.id',$programid);
        $this->db->where('sp.userid',$userid);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query;
    }
	
    function getPrograms(){
        $this->db->select('id, title');
        $this->db->from('marketing_programs');
        $query=  $this->db->get();
        return $query;
    }
	
    function getAffiliateUser(){
        $session_data = $this->session->userdata('client_login');
        $this->db->select('affiliate_user_id');
        $this->db->from('users');
        $this->db->where('id',$session_data['id']);
        $query=$this->db->get();
        $row=$query->first_row();
        return $row->affiliate_user_id;
    }
    function getUserByTrackId($track_id){
        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('user_track_id',$track_id);
        $query=$this->db->get();
        $row=$query->first_row();
        return $row->id;
    }
    /*
    function getNonStroedPrograms($id=0){
        $session_data = $this->session->userdata('client_login');
        $affiliateuser=$this->getAffiliateUser();
        if(!empty($affiliateuser)){
        $this->db->select("nsp.id as id, nsp.video as video, nsp.logo as logo, nsp.link as link, nsp.title as title, 
            nsp.description as description, COALESCE(reff.affiliate_link, nsp.affiliate_link) as affiliate_link");
        $this->db->from("(select mp.* from marketing_programs as mp left join 
(select * from `stored_programs` where userid=$session_data[id]) as sp ON `mp`.`id` = `sp`.`programid` 
where sp.userid is null) as nsp");
        $this->join("(select sp.* from stored_programs as sp 
join users as uf on sp.userid=uf.id 
where uf.user_track_id='$affiliateuser')as reff","nsp.id = reff.programid",'LEFT');
        }
        else{
            $this->db->select("mp.*");
            $this->db->from("marketing_programs as mp");
            $this->db->join("(select * from `stored_programs` where userid=$session_data[id]) as sp","`mp`.`id` = `sp`.`programid`","LEFT");
            $where = "sp.userid is null";
            $this->db->where($where);
        }
        if($id!=0){
            $this->db->where("id >=",$id);
        }
        $query = $this->db->get();
        echo $this->db->last_query();
        return $query;
    }
    //*/
    function storeProgram($id){
        $session_data = $this->session->userdata('client_login');
        $data=array(
            'userid'=>$session_data['id'],
            'programid'=>$id,
            'affilateid'=>$this->input->post('affiliateid')
        );
        $this->db->insert('stored_programs',$data);
        return ($this->db->affected_rows()>0)?TRUE:FALSE;
    }
    function addAffiliateLink($id){
        $session_data = $this->session->userdata('client_login');
        $data = array('affiliate_link'=>$this->input->post('affiliatelink'));
        $this->db->where('userid',$session_data['id']);
        $this->db->where('programid',$id);
        $this->db->update('stored_programs',$data);
        return ($this->db->affected_rows()>0)?TRUE:FALSE;
    }
    function isProgramStored($id){
        $session_data = $this->session->userdata('client_login');
        $this->db->select("*");
        $this->db->from("stored_programs");
        $this->db->where('programid',$id);
        $this->db->where('userid',$session_data['id']);
        $query=$this->db->get();
        return $query->num_rows>0?TRUE:FALSE;
    }
}

?>
