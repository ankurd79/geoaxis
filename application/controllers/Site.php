<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

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
    	//$this->load->library('Excel');
    	//$this->load->library('email');
    }
	
	public function index()
	{
		$data['roles']=$this->Common_model->getAdminRoles();
		$this->load->view('site/register',$data);
		
	}

	public function processRegistration()
	{
		$data = $this->input->post();
        $user_id=$this->session->userdata('uid');
        $response =  $this->Common_model->processRegistration($data);
        print_r($response);
	}

	public function blogsinjson(){
		header('Content-Type: application/json');
		//echo json_encode($this->Admin_model->bloglist());
		if ($this->input->server('REQUEST_METHOD') == 'GET'){	
			$json = array();
			$blogs=$this->Admin_model->bloglist();	
			//print_r($blogs);
			if ($blogs){
				$i = 0;
				foreach($blogs as $blog){
				  
				   $json[$i]['blog'] = $blog['blog_title'];    
		           $json[$i]['description'] = $blog['blog_text'];

		           $images=$this->Admin_model->blogimages($blog['id']); 

		           $j = 0;	
		           foreach($images as $image){
		           		$k=$j+1;	
		           	    $json[$i]['images'][$j] =array('image_'.$k.'' => $image['image']);
		           		$j++;
		           }  

				   $i++;	

				}
			}else{
				$json=array('message' => 'No records found');

			}

			
	        
			echo json_encode($json);
		}else{
			$arr=array('message' => 'Unsupported request method');
			echo json_encode($arr);
		}
	}






















}
