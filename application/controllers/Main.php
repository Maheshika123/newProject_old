<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{	
		

		$page['pageid']=11;
		$page['pagename']="home";

        //generating views
        $this->load->view('includes/header');
        $this->load->view('includes/navigation',$page);
		$this->load->view('main');
		$this->load->view('includes/footer');

	}

}
