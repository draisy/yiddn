<?php  
require_once('include/config.php');
require_once("../include/data.php");
require_once("../include/authnetfunction.php");
$errors = array();
$success = null;
//define variables 

$CompanyName 		    = '';
$Category1 				= '';
$Category2 				= '';
$AdTitle   	   			= '';
$AdURL    				= '';
$Telephone  			= '';
$Address    			= '';
$Description   			= '';
$Agent 					= '';
$Keywords 				= '';
$large 					= '';
$stantard 				= '';
$small 					= '';
$Banner 				= '';
$Banner2 				= '';
$Banner3 				= '';
$City2 					= '';
$PaymentPlan			= '';
$Coupon					= '';

$NameasonCard			= '';
$CreditCard				= '';
$NameonCard				= '';
//$Expiry				= '';
$ExpYear				= '';
$Expiry					= '';
$CVV					= '';
if(isset($_POST['submit'])){
$body	       		= '';  
$headers 	    	= '';  
$header 	    	= '';  
$Id 		    	= $_POST['Id']; 
$DateAdded 			= date("Y-m-d H:i:s");	
		//define variables to send

		/*---Enter Ad details---*/	
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
	   if(!empty($_POST['Telephone'])) {
			$Telephone = $_POST['Telephone'];
		}else{
	   		$Telephone = "";
		}
		
	    if(!empty($_POST['Address'])) {
			$Address = $_POST['Address'];
		}else{
		    $errors[] ="* Address is required field.";
		}
	    if(!empty($_POST['Description'])) {
			$Description = $_POST['Description'];
		}else{
		   $errors[] ="* Description is required field.";
		}
		if(!empty($_POST['Agent'])) {
			$Agent = $_POST['Agent'];
		}else{
		   $Agent="";
		}
	    if(!empty($_POST['Keywords'])) {
			$CompanyKeywords = $_POST['Keywords'];
		}else{
		     $errors[] ="* Keywords is required field.";
		}
		/*---End Enter Ad details---*/	
		
		/*---Category 1----*/
		if(!empty($_POST['large'])) {
			$large = $_POST['large'];
		}else{
		   $large="";
		}
		if(!empty($_POST['City'])) {
			$City = $_POST['City'];
		}else{
		    $errors[] ="* City is required field.";
		}
		
		$Banner = $_FILES['Banner1']['name'];
		$tmp_name = $_FILES['Banner1']['tmp_name'];
		
		if($Banner != "")
		{
			if ((
			$_FILES["Banner1"]["type"] == "image/gif")
			|| ($_FILES["Banner1"]["type"] == "image/jpeg")
			|| ($_FILES["Banner1"]["type"] == "image/png")
			|| ($_FILES["Banner1"]["type"] == "image/pjpeg")
			&& ($_FILES["Banner1"]["size"] < 2097152)){
			$date = date("Y_S_y_js_m_F_M");
			$UploadBanner = "Banner1-".$_SESSION["Yiddn_login_Id"]."-". $date.".png";
			move_uploaded_file($tmp_name,"../images/Banner/".$UploadBanner);
			$sql  = "UPDATE `tb_ad_circular` SET `Banner` = '$UploadBanner' WHERE `Id_Ad_circular` = '$Id'";	
			$res = mysqli_query($db, $sql);
			}else{
				$errors[] ="* Invalid file type. Only JPG, GIF and PNG types are accepted.";
				}
		}
		/*---End Category 1----*/

		
		/*---Category 2----*/
		if(!empty($_POST['stantard'])) {
			$stantard = $_POST['stantard'];
		}else{
		   $stantard="";
		}
		$Banner2 = $_FILES['Banner2']['name'];
		$tmp_name2 = $_FILES['Banner2']['tmp_name'];
		
		if($Banner2 != "")
		{
			if ((
			$_FILES["Banner2"]["type"] == "image/gif")
			|| ($_FILES["Banner2"]["type"] == "image/jpeg")
			|| ($_FILES["Banner2"]["type"] == "image/png")
			|| ($_FILES["Banner2"]["type"] == "image/pjpeg")
			&& ($_FILES["Banner2"]["size"] < 2097152)){
			$date = date("Y_S_y_js_m_F_M");
			$UploadBanner2 = "Banner2-".$_SESSION["Yiddn_login_Id"]."-". $date.".png";
			move_uploaded_file($tmp_name2,"../images/Banner/".$UploadBanner2);
			$sql  = "UPDATE `tb_ad_circular` SET `Banner2` = '$UploadBanner2' WHERE `Id_Ad_circular` = '$Id'";	
			$res = mysqli_query($db, $sql);
			}else{
				$errors[] ="* Invalid file type. Only JPG, GIF and PNG types are accepted.";
				}
		}
		/*---End Category 2----*/
	
	/*---Category 3----*/
		if(!empty($_POST['small'])) {
			$small = $_POST['small'];
		}else{
		    $small="";
		}
		$Banner3 = $_FILES['Banner3']['name'];
		$tmp_name3 = $_FILES['Banner3']['tmp_name'];
		
		if($Banner3 != "")
		{
			if ((
			$_FILES["Banner3"]["type"] == "image/gif")
			|| ($_FILES["Banner3"]["type"] == "image/jpeg")
			|| ($_FILES["Banner3"]["type"] == "image/png")
			|| ($_FILES["Banner3"]["type"] == "image/pjpeg")
			&& ($_FILES["Banner3"]["size"] < 2097152)){
			$date = date("Y_S_y_js_m_F_M");
			$UploadBanner3 = "Banner3-".$_SESSION["Yiddn_login_Id"]."-". $date.".png";
			move_uploaded_file($tmp_name3,"../images/Banner/".$UploadBanner3);
		    $sql  = "UPDATE `tb_ad_circular` SET `Banner3` = '$UploadBanner3' WHERE `Id_Ad_circular` = '$Id'";	
			$res = mysqli_query($db, $sql);
			}else{
				$errors[] ="* Invalid file type. Only JPG, GIF and PNG types are accepted.";
				}
		}
		/*---End Category 3----*/
	
		/*---Payment Plan----*/
			/*if(!empty($_POST['PaymentPlan'])) {
				$PaymentPlan = $_POST['PaymentPlan'];
			}else{
				 $PaymentPlan ="Free";
			}*/
		/*---End Payment Plan----*/
		
		/*---Discount Coupons----*/
		/*if(!empty($_POST['Coupon'])) {
			$Coupon = $_POST['Coupon'];
		}else{
		     $Coupon ="NA";
		}*/
	   /*---End Discount Coupons----*/
		
		
	    /*---Payment Detail----*/
		/*
			if(!empty($_POST['NameasonCard'])) {
				$NameasonCard = $_POST['NameasonCard'];
			}else{
				 $errors[] ="* Name as on Card is required field.";
				$NameasonCard="";
			}
			if(!empty($_POST['CreditCard'])) {
				$CreditCard = $_POST['CreditCard'];
			}else{
				 $errors[] ="* Card Number is required field.";
				$CreditCard="";
			}
			if(!empty($_POST['NameonCard'])) {
				$NameonCard = $_POST['NameonCard'];
			}else{
				 $errors[] ="* Name on Card is required field.";
				$NameonCard="";
			}
			if(!empty($_POST['ExpYear']) && !empty($_POST['ExpMon'])) {
				$ExpiryDate = $_POST['ExpYear']."-".$_POST['ExpMon'];
			}else{
				 $errors[] ="* Expiry Date is required field.";
				 $ExpiryDate="";
			}
			if(!empty($_POST['CVV'])) {
				$CVV = $_POST['CVV'];
			}else{
				 $errors[] ="* CVV is required field.";
				$CVV="";
			}*/
			
/*---End Payment Detail----*/
		
			if(empty($errors)) {
				//build xml to post
$Seo 	= cleanURL($CompanyName);
		$array = array(
		//	"OrderId"					=> $OrderId,
			"CompanyName"				=> mysqli_real_escape_string($db,$CompanyName),
			"Category1"					=> mysqli_real_escape_string($db,$Category1),
			"Category2"					=> mysqli_real_escape_string($db,$Category2),
			"AdTitle"					=> mysqli_real_escape_string($db,$AdTitle),
			"AdURL"						=> mysqli_real_escape_string($db,$AdURL),
			"Address"					=> mysqli_real_escape_string($db,$Address),
			"Description"				=> mysqli_real_escape_string($db,$Description),
			"Agent"						=> mysqli_real_escape_string($db,$Agent),
			"CompanyKeywords"			=> mysqli_real_escape_string($db,$CompanyKeywords),
			"City"						=> mysqli_real_escape_string($db,$City),
			"Telephone"					=> mysqli_real_escape_string($db,$Telephone),
			"large"						=> $large,
	//		"Banner"					=> $UploadBanner,
			"stantard"					=> $stantard,
	//		"Banner2"					=> $UploadBanner2,
			"small"						=> $small,
	//		"Banner3" 					=> $UploadBanner3,
	//		"PaymentPlan" 				=> $PaymentPlan,
	//		"Coupon" 					=> $Coupon,
			"Seo" 						=> mysqli_real_escape_string($db,$Seo),
			"DateAdded" 				=> $DateAdded
	//		"OrderType"					=> $OrderType,
	);
				
		foreach ($array as $key => $val) {
		 $sql = "UPDATE `tb_ad_circular` SET `$key` = '$val' WHERE `Id_Ad_circular` = '$Id'";
		$res = mysqli_query($db, $sql);
		}
		$success = "Update Successfully.";	
	      echo '<meta http-equiv="refresh" content="2; url=adcircular" />';
		}
 }
?>
