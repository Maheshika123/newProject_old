<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

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
		$this->load->model('MyOrder'); 
		$orderid = $this->placeorder();
		if($orderid){

			//Paypal configurations
			$data['paypal_url'] = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
			$data['paypal_id'] = 'savourymerchant@gmail.com'; //Business Email

			$data['orderid'] = $orderid;
			$order = $this->MyOrder->getorder($orderid);
			$data['orderprice'] = $order[2];

	        //generating views
	        $page['pageid']=14;
			$page['pagename']="payment";
	        $this->load->view('includes/header');
	        $this->load->view('includes/navigation',$page);
			$this->load->view('payment/method',$data);
			$this->load->view('includes/footer');
		}else{
			echo "Error Occured! <br/>You'll redirect in 3 seconds!<br/>";
			header( "refresh:3;url=".base_url()."order" );
		}

		
	}
	private function placeorder(){
		$this->islogged = true;
		
		if($this->islogged){
			$user_id = 1; //This should be taken from session once user logged in
			 $data = array( 
	            'or_user' => $user_id, 
	            'or_date' => date('Y-m-d'),
	            'or_duedate' => $this->input->post('datetime'),
	            'or_contact' => $this->input->post('phone'),
	            'or_address' => $this->input->post('address')
	         ); 
        	$rs = $this->MyOrder->insert($data); 
			if($rs === false) {
				//echo "SQL Error: ".$conn->error."<br/>You'll redirect in 3 seconds!";
				return false;
			} else {
				$inserted_orderid = $this->db->insert_id();
				$sql = "";
				foreach ($_POST as $key => $value) {
					$temp_arr = explode("_", $key);
					if($temp_arr[0]=="it"){
						$itemid = $value;
						$data = array( 
				            'oi_orderid' => $inserted_orderid, 
				            'oi_itemid' => $itemid,
				            'oi_quantity' => $this->input->post('quant_'.$temp_arr[1])
				        ); 
						$rs = $this->MyOrder->insertItem($data);
					}
				}
				if($rs === false) {
					return false;
					//echo "SQL Error:<br/>You'll redirect in 3 seconds!<br/>";
					//header( "refresh:3;url=".base_url()."order" );
				}else{
					return $inserted_orderid;
					//echo "Order items are added!<br/>";
					//echo "Order Successfull<br/>You'll redirect in 3 seconds!";
					//header( "refresh:3;url=".base_url()."payment" );
				}
			}
		}
	}
	//PAYPAL BUTTON
	//when user cancels the payment
	public function cancel(){
		echo "Cancelled<br/>You'll redirect in 3 seconds!<br/>";
		header( "refresh:3;url=".base_url()."order" );
	}
	//after paying
	public function success(){
		//print_r($_GET);


		//Store transaction information from PayPal
		$item_number = $_GET['item_number']; 
		$txn_id = $_GET['tx'];
		$payment_gross = $_GET['amt'];
		$currency_code = $_GET['cc'];
		$payment_status = $_GET['st'];

		//Get product price
		$this->load->model('MyOrder');
		$order = $this->MyOrder->getorder($item_number);

		$productPrice = $order[2];
		//adding a payment to payment table
		if(!empty($txn_id) && $payment_gross == $productPrice){
			$updatevalues = array(
			   'or_method' => "PAYPAL",
               'or_ispaid' => 1
            );
			$this->MyOrder->update($updatevalues,$item_number);

		    //Check if payment data exists with the same TXN ID.
		    $prevPaymentResult = $this->db->query("SELECT payment_id FROM payment WHERE txn_id = '".$txn_id."'");

		    if($prevPaymentResult->num_rows() > 0){
		        $paymentRow = $prevPaymentResult->result();
		        
		        $last_insert_id = $paymentRow[0]->payment_id;
		    }else{
		        //Insert tansaction data into the database
		        $insert = $this->db->query("INSERT INTO payment(item_number,txn_id,payment_gross,currency_code,payment_status) VALUES('".$item_number."','".$txn_id."','".$payment_gross."','".$currency_code."','".$payment_status."')");
		        $last_insert_id = $this->db->insert_id();
		    }
		    echo "Success<br/>";
			header( "refresh:3;url=".base_url()."main" );
		}else{
			echo "Order failed!";
			header( "refresh:3;url=".base_url()."order" );
		}
	}

	//PAYONDELIVERY
	public function payondelivery(){
		$this->load->model('MyOrder');
		$order_id=$this->input->post('orderid');
		$updatevalues = array(
               'or_method' => "ON DELIVERY"
            );
		$this->MyOrder->update($updatevalues,$order_id);
		echo "You'll get a confirmation call shortly!";
		header( "refresh:3;url=".base_url()."order" );
	}
}
