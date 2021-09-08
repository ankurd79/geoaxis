<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Common_model extends CI_model{
 
  public function __construct() {
           parent::__construct(); 
           $this->load->database();
           $this->load->library('image_lib');
           $this->load->library("phpmailer_library");
           $this->load->helper("url");
  }
 
  function SendMail ($mailArr){
            $mail = $this->phpmailer_library->load();
            $mail = new PHPMailer;

            //try {
                
                $mail->IsSMTP(); // Using SMTP.
                    $mail->SMTPDebug = 1;
                    $mail->SMTPAuth = false; // Enables SMTP authentication.
                    $mail->Host = "localhost"; // GoDaddy support said to use localhost
                    $mail->Port = 25;
                    $mail->SMTPSecure = 'none';
                    
                    //havent read yet, but this made it work just fine
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );
                    
                    $mail->AddReplyTo('admin@moumitavaats.com', 'Site Admin');
                    $mail->AddAddress($mailArr['to']); 
                    $mail->SetFrom('admin@moumitavaats.com', 'Site Admin');
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = $mailArr['subject'];
                    $mail->Body    = $mailArr['body'];
                    if(!$mail->Send()) {
                        echo "Mailer Error: " . $mail->ErrorInfo;
                    } else {
                        echo "Message has been sent";
                    }
                
                
                
                
            //}
    }
 
 public function img_upload($path,$filetype){
        
        
        $new_name = time().$_FILES["photo"]['name'];
        $new_name = str_replace(" ","_",$new_name);
        $config = array(
        'upload_path' => "./images/".$path."",
        'allowed_types' => "".$filetype."",
        'overwrite' => TRUE,
        'max_size' => "7048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
        'max_height' => "1300",
        'max_width' => "1300",  
        'file_name' => $new_name,
        
        );
        //print_r($config);
        $this->load->library('upload', $config);
        $this->upload->do_upload('image');
        //return $new_name;
        
        $config['image_library'] = 'gd2';
        $config['source_image'] = './images/'.$path.'/'.$new_name.'';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width']         = 198;
        $config['height']       = 144;
        
        //print_r($config);
        
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        return $new_name;
        
        
}

public function date_stamp(){
    $t=date('Y-m-d H:i:s');
    return $t;
}

public function current_time(){
    $t=date('H:i:s');
    return $t;
}


public function currentDay(){
    $t=date('m/d/Y');
    return $t;
}

public function days(){
    $i;
    for($i=1;$i<=31;$i++){
        $values[] = $i;
    }
    
    return $values;
}

public function months(){
    $m;
    for($m=1;$m<=12;$m++){
        $month[] = $m;
    }
    
    return $month;
}

public function years(){
    $y;
    for($y=1950;$y<=2024;$y++){
        $years[] = $y;
    }
    
    return $years;
}


public function userGreetings(){
    $Hour = date('G');
    if ( $Hour >= 5 && $Hour <= 11 ) {
        $msg="Good Morning";
    } else if ( $Hour >= 12 && $Hour <= 16 ) {
        $msg="Good Afternoon";
    } else if ( $Hour >= 17 || $Hour <= 4 ) {
        $msg="Good Evening";
    }
    
    return $msg;
}

public function formatDateTime($date,$od=''){
    if($od==1)
        $formattedDate=date("d-F,Y", strtotime($date));
     else
        $formattedDate=date("d-M,Y h:i:s A", strtotime($date));
       
    return $formattedDate;
}

public function findTimeDiff($date1,$currDateTime){
    $seconds = strtotime($currDateTime) - strtotime($date1);
    $days    = floor($seconds / 86400);
    return $hours   = floor(($seconds - ($days * 86400)) / 3600);
}

public function formatText($data){
    $data=strtolower($data);
    $data=str_replace(" ","-",$data);
    return $data;
}


public function section_img_path($path_id){
    if($path_id==1){
        $path="img/quiz_section_image/";
    }elseif($path_id==2){
        $path="img/class_groups/";
    }
    elseif($path_id==3){
        $path="img/news/";
    }
    elseif($path_id==4){
        $path="img/testimonials/";
    }elseif($path_id==5){
        $path="img/pictorial_quiz/";
    }
    return $path;
}

public function msgToUser($type){
        if($type==1){
            $msg=" Successfully";
        }elseif($type==2){
            $msg="Updated Successfully";
        }elseif($type==3){
            $msg="Deleted Successfully";
        }
        
        return $msg;
    }
    
public function generateRandomString(){
     $string = "";
     $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
     $len=8;
     for($i=0;$i<$len;$i++)
      $string.=substr($chars,rand(0,strlen($chars)),1);
    return $string;
 }

public function generateOtp(){
    return rand (1000 , 9999);
}


public function encrypt($data){
     //$data=md5($data);
     $data=password_hash($data, PASSWORD_DEFAULT);
     return $data;
 }
 
 public function siteConfig(){
     $siteArr=array("site_name"=>'QR',"phone"=>'1234567890',"email"=>'admin@qr.com');
     return $siteArr; 
 }


public function uploadcustomImg($uploadedfile,$folder){
    $srvAddr=$_SERVER['SERVER_ADDR'];
    //$uploadedfile=explode(",",$uploadedfile);
    for($j=0; $j < count($uploadedfile); $j++){
        //print_r($uploadedfile);      
        $file=str_replace(" ","-",$uploadedfile["$j"]);
        $file=str_replace("'","-",$file);
        $file=str_replace(",","-",$file);
        $file=str_replace("(","-",$file);
        $file=str_replace(")","-",$file);
        $file=str_replace("[","-",$file);
        $file=str_replace("]","-",$file);
        $file=time()."_".$file;
        $path=$_SERVER['DOCUMENT_ROOT'] . '/qr/images/'.$folder.'/'.$file;
        move_uploaded_file($_FILES["image"]['tmp_name']["$j"],$path);
        $elements[] = $file;
    }

    $files=implode(',', $elements);
    return $files;
}


 
 
 
    public function chkDuplicateDataOccurence($table,$chkData,$field){
        $this->db->where($field, $chkData);
        $query = $this->db->get($table);
        $num = $query->num_rows();
        
        if($num >0){
            $rtVal=0;
        }else{
            $rtVal=1;
        }
        
        return $rtVal;
    }
 
 
    public function getAdminRoles(){
        $this->db->select('*');
        $this->db->where('is_active', 1);
        $this->db->order_by('id','ASC'); 
        $this->db->from('roles');
         if($query=$this->db->get()){
              //return $query->row_array();
              return $query->result_array();
          }else{
            return false;
          } 
    }

  public function processRegistration($data){

    if($data['roles']==1)
        $table="admin_users";
    else
        $table="tbl_users";
    $chkdaata=$this->chkDuplicateDataOccurence($table,$data['uname'],"email");
    if($chkdaata==1){
          $ins_arr_1=array('first_name'=>$data['first_name'],'last_name'=>$data['last_name'],
          'email'=>$data['uname'],
          'password'=>$this->encrypt($data['upass']),
          'is_active'=>'1',
          'role_id'=>$data['roles'],
          'added_on'=> $this->Common_model->date_stamp());
          if($data['role_id']==1)
                $this->db->insert('admin_users',$ins_arr_1);
          else
               $this->db->insert('tbl_users',$ins_arr_1);
          $insert_id = $this->db->insert_id();
          $msg="1";
    }else{
          $msg="0";
    }

    return $msg;
}

public function removeimagesFromFolder($folder,$image){
    $path= $_SERVER['DOCUMENT_ROOT']."/qr/images/".$folder."/".$image."";
    unlink($path);

}


}











