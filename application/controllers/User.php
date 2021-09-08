<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

    	function __construct() {
    	parent::__construct();
    	$this->load->helper('form');
    	//$this->load->library('encryption');
    	$this->load->library('session');
    	$this->load->library('calendar');
    	$this->load->helper('url');
    	$this->load->model('Admin_model');
    	$this->load->model('User_model');
    	$this->load->model('Common_model');
    	$this->load->library('pagination');
    	include APPPATH . 'third_party/config.php';
        include APPPATH . 'third_party/api.php';
    }
    
    public function index(){
		if(!$this->session->userdata('logged_in_user')){
			header("Location: ./userLogin");
		}
		$currDate=date('Y-m-d');
        $data['role_id']=$this->session->userdata('role');
        
		$data['uid']=$this->session->userdata('uid');
		$data['title'] ="Dashboard Area";
		$data['site_config']=$this->Common_model->siteConfig();
        
        
		$this->load->view('user/header',$data);
		$this->load->view('user/sidebar',$data);
		$this->load->view('user/index',$data);
		$this->load->view('user/footer');
	}
	
	
	
	public function userLogin()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data = array('title' => 'Login');
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		
		$this->load->view('user/login', $data);

		if($_POST)
		{
			$getHash=$this->User_model->getHash($this->input->post('uname'),$type=1);
			if(password_verify($this->input->post('upass'), $getHash)) {
    			$user_login=array('uname'=>$this->input->post('uname'),'upass'=>$this->input->post('upass'));
    			$pdata=$this->User_model->login_user($user_login['uname'],$getHash);
                print_r($pdata);
                //exit;
    		
    			if($data){
    				$this->session->set_userdata('uid',$pdata['id']);
    				$this->session->set_userdata('uname',$pdata['email']);
    				//$this->session->set_userdata('logged_in_admin',$data['id']);
                    $this->session->set_userdata('fname',$pdata['first_name']);
                    $this->session->set_userdata('lname',$pdata['last_name']);
                    $this->session->set_userdata('logged_in_user','1');
    				header("Location: ../user/index");
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
    	//$this->session->sess_destroy('logged_in_user');
    	//session_destroy();
    	$this->session->unset_userdata('logged_in_user');
    	header("Location: ./userLogin");
    }
    
    

    

 
    public function getzoomlinks(){
        $data['results']=$this->Admin_model->getzoomlinks();
        $this->load->view('user/zl_data_table',$data);
    }


}