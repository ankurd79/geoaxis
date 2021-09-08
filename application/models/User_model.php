<?php
class User_model extends CI_model{
 
  public function __construct() {
           parent::__construct(); 
           $this->load->database();
           $this->load->model('Common_model');
  }
 
 
 public function getHash($data,$type){
     if($type==1){
           $table='tbl_users';
      }elseif($type==2){
            $table='tbl_customers';
      }     
        
     $query = $this->db->query("select password from ".$table." where email='".$data."'");
     $row = $query->row();
     if (isset($row)){
         
         return $row->password;
     }
 }
 
public function login_user($email,$pass){
      $this->db->select('*');
      $this->db->from('tbl_users');
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

 






}