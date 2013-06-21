<?php
class Recovery_Model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('email');
    }
    public function getIDbyUsername($username){
        $this->db->select('id, user_email');
        $this->db->from('users');
        $this->db->where('user_name',$username);
        $query = $this->db->get();
        if($query->num_rows===0){
            return 0;
        }
        else{
            $row = $query->first_row();
            return $row;
        }
    }
    public function getIDbyEmail($email){
        $this->db->select('id, user_email');
        $this->db->from('users');
        $this->db->where('user_email',$email);
        $query = $this->db->get();
        if($query->num_rows===0){
            return 0;
        }
        else{
            $row = $query->first_row();
            return $row;
        }
    }
    public function setRequest($id){
        $uniqid=0;
        do{
            $uniqid= uniqid();
        }while($this->uniqIDused($uniqid));
        $this->db->select('id');
        $this->db->from('recovery');
        $this->db->where('userid',$id);
        $query = $this->db->get();
        if($query->num_rows===0){
        $data = array(
            'userid'=>$id,
            'uniqid'=>$uniqid
        );
        $this->db->insert('recovery',$data);
        }
        else{
        /*$data = array(
            'uniqid'=>$uniqid,
            'request'=>current_timestamp,
            'used'=>0
        );//*/
        $row=$query->first_row();
        $this->db->where('id',$row->id);
        //$this->db->update('recovery',$data);
        $this->db->query("Update recovery SET uniqid='$uniqid',used=0,request=NOW() Where id=$row->id");
        }
        if ($this->db->affected_rows() > 0){
            return $uniqid;
        }
        else{
            return FALSE;
        }
    }
    public function uniqIDused($uid){
        $this->db->select('id');
        $this->db->from('recovery');
        $this->db->where('uniqid',$uid);
        $query = $this->db->get();
        return ($query->num_rows>0);
    }
    public function sendLink($email, $id) {
        $this->email->from(ADMIN_EMAIL, ADMIN_NAME);
        $this->email->to($email);
        $this->email->subject('Recovery Link');
        $link = base_url().'recovery/reset/';
        $message="Hello. We recieve password recovery reques for you login. And send you $link"."$id go there and reset your password.";
        $this->email->message($message);
        $this->email->send();
    }
    public function validRecoveryID($id){
        $this->db->select('userid,id');
        $this->db->from('recovery');
        $this->db->where('uniqid',$id);
        $where="hour(timediff(Now(),request))*60+minute(timediff(Now(),request))<60";
        $this->db->where($where);
        $query=$this->db->get();
        //echo $this->db->last_query();
        if($query->num_rows===0){
            return FALSE;
        }
        $row=$query->first_row();
        return $row;
    }
    public function resetPassword($new,$recoveryid){
        $user=$this->validRecoveryID($recoveryid);
        if($user===FALSE){
            return FALSE;
        }
        $data=array(
            'real_password'=>$new,
            'password'=>md5($new)
        );
        $this->db->where('id',$user->userid);
        $this->db->update('users',$data);
        $this->db->where('id',$user->id);
        $this->db->delete('recovery');
    }
    public function usrnameByID($id){
        $this->db->select('user_name');
        $this->db->from('users');
        $this->db->where('id',$id);
        $query=$this->db->get();
        $row= $query->first_row();
        return $row->user_name;
    }

}

