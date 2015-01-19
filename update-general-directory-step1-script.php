<?php 
require_once('inc.files.php');

if(isset($_POST['step1'])){
	
		$CompanyName 		    = '';
		$Category1 				= '';
		$Category2 				= '';
		$AdTitle   	   			= '';
		$AdURL    				= '';

		if(!empty($_POST['CompanyName'])) {
			$CompanyName = $_POST['CompanyName'];
		}else{
	   		$errors[] ="* Company Name is required field.";
		}
	    if(!empty($_POST['Category1'])) {
			$Category1 = $_POST['Category1'];
		}else{
	   		$errors[] ="* Category is required field.";
		}
	    if(!empty($_POST['Category2'])) {
			$Category2 = $_POST['Category2'];
		}else{
	   		$Category2 ="";
		}
	    if(!empty($_POST['AdTitle'])) {
			$AdTitle = $_POST['AdTitle'];
		}else{
	   		$errors[] ="* Ad Title is required field.";
		}
	    if(!empty($_POST['AdURL'])) {
			$AdURL = $_POST['AdURL'];
		}else{
	   		$errors[] ="* Ad URL is required field.";
		}
			$Seo 				= cleanURL($CompanyName);
			$step				= $_POST['step'];
			$OrderType   		= $_POST['OrderType'];
			$DateAdded 			= date("Y-m-d H:i:s");	
			$OrderId            = $_SESSION['OrderId'] = $_POST['OrderId'];
	
	if(empty($errors)) {
	
			$array = array(
			"CompanyName"				=> mysqli_real_escape_string($db,$CompanyName),
			"Category1"					=> mysqli_real_escape_string($db,$Category1),
			"Category2"					=> mysqli_real_escape_string($db,$Category2),
			"AdTitle"					=> mysqli_real_escape_string($db,$AdTitle),
			"AdURL"						=> mysqli_real_escape_string($db,$AdURL),
			"Seo" 						=> mysqli_real_escape_string($db,$Seo),
			"DateAdded" 				=> $DateAdded,
			"step" 						=> '1',
			"Status" 					=> '0',
			"OrderType"					=> $OrderType
			);
	foreach ($array as $key => $val) {
	$sql = "UPDATE `tb_ad_circular` SET `$key` = '$val' WHERE `OrderId` = '".$OrderId."'";
	$res = mysqli_query($db, $sql);
	}
		   header("Location:update-general-directory-step2?i=".base64_encode($OrderId));
	}else{
		   header("Location:update-general-directory-step1");
	}
}
?>
