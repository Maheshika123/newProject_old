<?php
	require_once "../config.php";
	//GET AN ORDER FROM DB
	if(isset($_POST['task']) && $_POST['task']=='getorder'){
		//params: or_id
		$orderid = "'" . $conn->real_escape_string($_POST['or_id']) . "'";
		$sql = "SELECT * FROM myorder WHERE or_id = $orderid";
		$rs=$conn->query($sql);
		if($rs === false) {
			echo "error";
		}else{
			$result = array();

			if(($rs->num_rows)>0){
				$rs->data_seek(0);
				$result = $rs->fetch_assoc();
			}
			echo json_encode($result);
		  	
		}
	}
	//
	//
	if(isset($_POST['task']) && $_POST['task']=='getorderitems'){
		//params: or_id
		$orderid = "'" . $conn->real_escape_string($_POST['or_id']) . "'";
		$sql = "SELECT orderitem.*,item.it_name,item.it_price 
		FROM orderitem INNER JOIN item ON orderitem.oi_itemid = item.it_id 
		WHERE orderitem.oi_orderid=$orderid";
		$rs=$conn->query($sql);
		if($rs === false) {
			echo "error";
		}else{
			$result = $rs->fetch_all(MYSQLI_ASSOC);
			echo json_encode($result);
		  	
		}
	}
	//DELETE AN ORDER FROM DB
	if(isset($_POST['task']) && $_POST['task']=='deleteorder'){
		$orderid = "'" . $conn->real_escape_string($_POST['or_id']) . "'";
		$sql = "DELETE FROM myorder WHERE or_id= $orderid";
		$rs=$conn->query($sql);
		if($rs === false) {
			echo "error";
		}else{
			echo "success";
		}
	}


?>
