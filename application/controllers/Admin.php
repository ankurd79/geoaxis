<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {

    	function __construct() {
    	parent::__construct();
    	$this->load->helper('form');
    	//$this->load->library('encryption');
    	$this->load->library('session');
    	$this->load->library('calendar');
    	$this->load->helper('url');
    	$this->load->model('Admin_model');
    	$this->load->model('Common_model');
    	$this->load->library('pagination');
    	include APPPATH . 'third_party/config.php';
        include APPPATH . 'third_party/api.php';
    }
    
    public function index(){
		if(!$this->session->userdata('logged_in_admin')){
			header("Location: ./adminLogin");
		}
		$currDate=date('Y-m-d');
        $data['role_id']=$this->session->userdata('role');
        
		$data['uid']=$this->session->userdata('uid');
		$data['title'] ="Dashboard Area";
		$data['site_config']=$this->Common_model->siteConfig();
        
        
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/index',$data);
		$this->load->view('admin/footer');
	}
	
	
	
	public function adminLogin()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data = array('title' => 'Login');
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		
		$this->load->view('admin/login', $data);

		if($_POST)
		{
			$getHash=$this->Admin_model->getHash($this->input->post('uname'),$type=1);
			if(password_verify($this->input->post('upass'), $getHash)) {
    			$user_login=array('uname'=>$this->input->post('uname'),'upass'=>$this->input->post('upass'));
    			$data=$this->Admin_model->login_admin($user_login['uname'],$getHash);
                print_r($data);
                //exit;
    		
    			if($data){
    				$this->session->set_userdata('uid',$data['id']);
    				$this->session->set_userdata('pmail',$data['email']);
    				//$this->session->set_userdata('logged_in_admin',$data['id']);
                    $this->session->set_userdata('ufname',$data['first_name']);
                    $this->session->set_userdata('ulname',$data['last_name']);
                    $this->session->set_userdata('logged_in_admin','1');
    				header("Location: ../admin/index");
    			}else{
    				echo '<script>alert("Invalid login attempt!")</script>';
    	 
    			}	
			}else{
			    
			    echo '<script>alert("Invalid login attempt!")</script>';
			}
			
			$this->session->set_flashdata('msg', 'Error occured,Try again.');
		}

		
	
	}
	
	
    public function logout(){
    	//$this->session->sess_destroy('logged_in_admin');
    	$this->session->unset_userdata('logged_in_admin');
    	//session_destroy();
    	header("Location: ./adminLogin");
    }
    
    public function changePassword(){
    	if($this->session->userdata('uid')) {
    		$data = $_POST;
    		$user=$this->session->userdata('uid');
    		$data=$this->Admin_model->change_password(trim($data['upass']),$user);
    		//$data=$this->Admin_model->change_password($data,$user);
    		echo $data;
    	}		
    }
    
    
    public function insertzoomdata($zoomurl,$uid,$meetingpassword){
        $ins_arr_1=array('meeting_url'=>$zoomurl,'password'=>$meetingpassword,
          'added_by'=>$uid,
          'added_on'=> $this->Common_model->date_stamp());
          $this->db->insert('zoom_meetings',$ins_arr_1);
    }

    public function generateZoomlink(){

        if($this->session->userdata('uid')) {
            $meetingpassword=$this->Common_model->generateRandomString();
            $data = $this->input->post();
            $user_id=$this->session->userdata('uid');
            $arr['topic']='Geoxis Productivity Meet';
            $arr['start_date']=date('Y-m-d H:i:s');
            $arr['duration']=30;
            $arr['password']=$meetingpassword;
            $arr['type']='2';
            $result=createMeeting($arr);
            if(isset($result->id)){
                $this->insertzoomdata($result->join_url,$user_id,$meetingpassword);
                echo 'Meeting Link Generated';
                /*
                echo "Join URL: <a href='".$result->join_url."'>".$result->join_url."</a><br/>";
                echo "Password: ".$result->password."<br/>";
                echo "Start Time: ".$result->start_time."<br/>";
                echo "Duration: ".$result->duration."<br/>";
                */
            }else{
                echo '<pre>';
                print_r($result);
            }
        }

    }

 
    public function getzoomlinks(){
        $data['results']=$this->Admin_model->getzoomlinks();
        $this->load->view('admin/zl_data_table',$data);
    }


}