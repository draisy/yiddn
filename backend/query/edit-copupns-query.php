<?php

$errors = array();
$success = null;


if(isset($_POST['submit'])){
$Id	    		= $_POST['Id'];  

$DateUpdated 		= date("Y-m-d H:i:s");

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
							"DateUpdated" 	=> $DateUpdated,
							"Status" 		=> "1"
						);
			 foreach ($array as $key => $val) {
				 $sql = "UPDATE `copupns` SET `$key` = '$val' WHERE `Id` = '$Id'";
				  $res = mysqli_query($db, $sql);
				}
			   $success.='Record has been successfully editeds.';
			     @header( "refresh:0;url=copupns");
			}
}
?>