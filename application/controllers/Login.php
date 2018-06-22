<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$page['pageid']=16;
		$page['pagename']="login";

		$this->load->view('includes/header');
		$this->load->view('includes/navigation',$page);
		$this->load->view('login');
		$this->load->view('includes/footer');
	}


	function LoginUser()
	{
		
		// $this->form_validation->set_rules('user_name', 'User Name', 'required');
		// $this->form_validation->set_rules('password', 'Password', 'required');


		if ($this->form_validation->run() == FALSE){
			
			$this->load->view('login');
       	}

        else{

          	$this->load->model('Model_login');
          	$result = $this->Model_login->LoginUser();

          	if ($result != FALSE) {

          		$user_data = array(
          			'user_id' => $result->id,
          			'user_name' => $result->user_name );

          		#Starting a session with user data
          		$this->session->set_userdata($user_data);
              	$this->load->view('admin');
          		
          	}

          	else{

          		$this->session->set_flashdata('errmsg','Wrong Email & Password!!!');
              	redirect('Home/Login');

          	}

        }



	}

}