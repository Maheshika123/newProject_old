<?php
	require_once "../config.php";
	if(isset($_POST['modify'])){
		//params: or_id
		$orderid = "'" . $conn->real_escape_string($_POST['or_id']) . "'";
		$date = "'" . $conn->real_escape_string($_POST['date']) . "'";
		$duedate = "'" . $conn->real_escape_string($_POST['duedate']) . "'";
		$contact = "'" . $conn->real_escape_string($_POST['contact']) . "'";
		$address = "'" . $conn->real_escape_string($_POST['address']) . "'";
		$ispaid = "'" . $conn->real_escape_string($_POST['ispaid']) . "'";
		$iscomplete = "'" . $conn->real_escape_string($_POST['iscomplete']) . "'";
		//or_user, or_date,or_duedate,or_contact,or_address
		$sql = "UPDATE myorder SET 
		or_date=$date, 
		or_duedate=$duedate, 
		or_contact=$contact,
		or_address=$address,
		or_ispaid=$ispaid,
		or_iscomplete=$iscomplete
		WHERE or_id=$orderid";
		//"SELECT * FROM myorder WHERE or_id = $orderid";
		$rs=$conn->query($sql);
		if($rs === false) {
			echo "Error Occured: ".$conn->error."<br/>";
		}else{
			echo "Updated Successfully<br/>";
		}
		echo "You'll redirect in 3 seconds!";
		header( "refresh:3;url=../manageorders.php" );
	}
?>
