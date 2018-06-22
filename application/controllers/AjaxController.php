<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxController extends CI_Controller {
	public function index()
	{
		$this->load->view('welcome_message');
	}
	/*
		Manage Order AJAX Requests
		source:: dashboard/orders
	*/
	public function getorder()
	{
		if(isset($_POST['task']) && $_POST['task']=='getorder'){
			//params: or_id
			$orderid = $this->input->post('or_id');
        	$this->db->select("*");
		    $this->db->from('myorder');
		    $this->db->where('or_id',$orderid);
		    $query = $this->db->get();
		    if($query==false){
		    	echo "error";
		    }else{
		    	$rs=$query->result(); 
				echo json_encode($rs);
		    }
			
		}
	}
	public function getorderitems()
	{
		if(isset($_POST['task']) && $_POST['task']=='getorderitems'){
			//params: or_id
			$orderid = $this->input->post('or_id');
			$sql = "SELECT orderitem.*,item.it_name,item.it_price 
			FROM orderitem INNER JOIN item ON orderitem.oi_itemid = item.it_id 
			WHERE orderitem.oi_orderid=$orderid";
	        $query = $this->db->query($sql); 
	        if($query==false){
	        	echo "error";
	        }else{
	        	$rs=$query->result(); 
	        	echo json_encode($rs);
	        }
	        
		}
	}
	public function deleteorder(){
		if(isset($_POST['task']) && $_POST['task']=='deleteorder'){
			//params: or_id
			$orderid = $this->input->post('or_id');
			$sql = "DELETE FROM myorder WHERE or_id= $orderid";
			$query = $this->db->query($sql); 
			/*
			$rs=$conn->query($sql);
			*/
			if($query === false) {
				echo "error";
			}else{
				echo "success";
			}
			
		}
	}
}
