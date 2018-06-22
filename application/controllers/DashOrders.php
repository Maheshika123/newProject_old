<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashOrders extends CI_Controller {

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
		//data to view
		$data['pageid'] = 2;
		$data['pagename'] = "Orders";

		//loading categories
		$query = $this->db->query("SELECT myorder.*,user.user_name FROM myorder INNER JOIN user ON myorder.or_user = user.user_id ORDER BY myorder.or_id DESC"); 
        $data['orders'] = $query->result(); 

		//rendering view
		$this->load->view('dashboard/includes/header.php',$data);
		$this->load->view('dashboard/orders.php');
		$this->load->view('dashboard/includes/footer.php');
	}
	public function modify(){
		if(isset($_POST['modify'])){
			//params: or_id
			$orderid = $this->input->post('or_id');
			$date = $this->input->post('date');//"'" . $conn->real_escape_string($_POST['date']) . "'";
			$duedate = $this->input->post('duedate');//"'" . $conn->real_escape_string($_POST['duedate']) . "'";
			$contact = $this->input->post('contact');//"'" . $conn->real_escape_string($_POST['contact']) . "'";
			$address = $this->input->post('address');//"'" . $conn->real_escape_string($_POST['address']) . "'";
			$ispaid = $this->input->post('ispaid');//"'" . $conn->real_escape_string($_POST['ispaid']) . "'";
			$iscomplete = $this->input->post('iscomplete');//"'" . $conn->real_escape_string($_POST['iscomplete']) . "'";

			$sql = "UPDATE myorder SET 
			or_date='$date', 
			or_duedate='$duedate', 
			or_contact='$contact',
			or_address='$address',
			or_ispaid='$ispaid',
			or_iscomplete='$iscomplete'
			WHERE or_id='$orderid'";

	        $query = $this->db->query($sql); 
	        if($query==false){
	        	echo "Error Occured: ".$conn->error."<br/>";
	        }else{
	        	echo "Updated Successfully<br/>";
	        }
			echo "You'll redirect in 3 seconds!";
			header( "refresh:3;url=".base_url()."dashboard/orders" );
		}
	}
}
