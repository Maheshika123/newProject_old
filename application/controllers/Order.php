<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		//loading categories
		$query = $this->db->get("category"); 
        $data['categories'] = $query->result(); 

        //loading items
        $query = $this->db->get("item"); 
        $data['items'] = $query->result(); 

         //view information
        $page['pageid']=14;
		$page['pagename']="order";

		$this->load->view('includes/header');
		$this->load->view('includes/navigation',$page);
		$this->load->view('order',$data);
		$this->load->view('includes/footer');
	}

}
