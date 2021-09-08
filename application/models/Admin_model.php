<?php
class Admin_model extends CI_model{
 
  public function __construct() {
           parent::__construct(); 
           $this->load->database();
           $this->load->model('Common_model');
  }
 
 public function encrypt($data){
     //$data=md5($data);
     $data=password_hash($data, PASSWORD_DEFAULT);
     return $data;
 }
 
 public function getHash($data,$type){
     if($type==1){
           $table='admin_users';
      }elseif($type==2){
            $table='tbl_customers';
      }     
        
     $query = $this->db->query("select password from ".$table." where email='".$data."'");
     $row = $query->row();
     if (isset($row)){
         
         return $row->password;
     }
 }
 
public function login_admin($email,$pass){
      $this->db->select('*');
      $this->db->from('admin_users');
      $this->db->where('email',$email);
      $this->db->where('password',$pass);
      $this->db->where('is_active',1);
     
      if($query=$this->db->get())
      {
          return $query->row_array();
      }
      else{
        return false;
      }
    
}

 //$this->db->where('user_id',$user);
  //$var = $this->db->update('profiles',$data);

public function change_password($data,$user) {
  $encryptedData=$this->encrypt($data);
  $upass=array('password'=>($encryptedData)); 
  $this->db->where('id',$user);
  $this->db->update('tbl_admin',$upass);
}


public function getzoomlinks(){
    $this->db->select('*');    
    $this->db->from('zoom_meetings');
    $this->db->order_by('id','DESC');
    $query = $this->db->get();
    $this->db->last_query(); 
    return $result = $query->result_array();

}






}