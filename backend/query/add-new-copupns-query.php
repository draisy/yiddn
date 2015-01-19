<?php

$errors = array();
$success = null;

if(isset($_POST['submit'])){

$DateAdded 		= date("Y-m-d H:i:s");

  if(!empty($_POST['Code'])) {
		$Code = $_POST['Code'];
	}else{
	   $errors[] ="* Code is required field.";
	}
	
	 if(!empty($_POST['StartDate'])) {
		$StartDate = $_POST['StartDate'];
	}else{
	   $errors[] ="* Start Date is required field.";
	}
	 if(!empty($_POST['EndDate'])) {
		$EndDate = $_POST['EndDate'];
	}else{
	   $errors[] ="* End Date is required field.";
	}
	 if(!empty($_POST['Discount'])) {
		$Discount = $_POST['Discount'];
	}else{
	   $errors[] ="* Discount is required field.";
	}
	
	 if(!empty($_POST['DiscountType'])) {
		$DiscountType = $_POST['DiscountType'];
	}else{
	   $errors[] ="* Discount Type is required field.";
	}


			if(empty($errors)) {
			
				$array = array(
				
							"Code"			=> $Code,
							"StartDate"		=> $StartDate,
							"EndDate"		=> $EndDate,
							"Discount"		=> $Discount,
							"DiscountType"	=> $DiscountType,
							"DateCreated" 	=> $DateAdded,
							"Status" 		=> "1"
														
		);
	$query = "select * from `copupns` where `Code`= '".$Code."'";
	$result = $db->query($query);
	if(@$result->num_rows > 0){		
			$errors[] ='The Copupn Code is Already Exists.';
	}	
	else {
			
			   $sql  = "INSERT INTO `copupns`";
			   $sql .= " (`".implode("`, `", array_keys($array))."`)";
			   $sql .= " VALUES ('".implode("', '", $array)."') ";
			   $res = mysqli_query($db, $sql);
			   $success.='Added Successfully.';
			     @header( "refresh:0;url=coupon");
				}
	}
}

?>