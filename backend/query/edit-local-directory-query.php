<?php  
require_once('include/config.php');
require_once("../include/data.php");
require_once("../include/authnetfunction.php");
$errors = array();
$success = null;
//define variables 

$CompanyName 		    = '';
$CompanyAddress 		= '';
$Telephone				= '';
$CompanyEmail   	    = '';
$CompanyWebsite    		= '';
$CompanyLogo    		= '';
$ShortDescription    	= '';
$Description 			= '';
$Agent 		    		= '';
$CompanyKeywords 		= '';

$City 					= '';
$upgrade1 			    = '';
$Premium 				= '';
$Banner1 				= '';

$City2 					= '';
$upgrade2 			    = '';
$Premium2 				= '';
$Banner2 				= '';

$City3 					= '';
$upgrade3 			    = '';
$Premium3 				= '';
$Banner3 				= '';

$Category1 				= '';

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
	    if(!empty($_POST['CompanyAddress'])) {
			$CompanyAddress = $_POST['CompanyAddress'];
		}else{
	   		$errors[] ="* Company Address is required field.";
		}

	    if(!empty($_POST['Telephone'])) {
			$Telephone = $_POST['Telephone'];
		}else{
	   		$Telephone ="";
		}

		
	    if(!empty($_POST['CompanyEmail'])) {
			$CompanyEmail = $_POST['CompanyEmail'];
		}else{
	   		$errors[] ="* Company Email is required field.";
		}
	   if(!empty($_POST['CompanyWebsite'])) {
			$CompanyWebsite = $_POST['CompanyWebsite'];
		}else{
	   		$errors[] ="* Company Website is required field.";
		}
		$CompanyLogo = $_FILES['CompanyLogo']['name'];
		$tmp_name    = $_FILES['CompanyLogo']['tmp_name'];
			if($CompanyLogo != "")
		{
			if ((
			$_FILES["CompanyLogo"]["type"] == "image/gif")
			|| ($_FILES["CompanyLogo"]["type"] == "image/jpeg")
			|| ($_FILES["CompanyLogo"]["type"] == "image/png")
			|| ($_FILES["CompanyLogo"]["type"] == "image/pjpeg")
			&& ($_FILES["CompanyLogo"]["size"] < 2097152)){			
			$date = date("Y_S_y_js_m_F_M");
			$UploadCompanyLogo = cleanURL($CompanyName)."-".$_SESSION["Yiddn_login_Id"]."-". $date.".png";
			move_uploaded_file($tmp_name,"../images/CompanyLogo/".$UploadCompanyLogo);
			$sql  = "UPDATE `tb_local` SET `CompanyLogo` = '$UploadCompanyLogo',`Status`='0' WHERE `Id_Local` = '$Id'";	
			$res = mysqli_query($db, $sql);
			}else{
				$errors[] ="* Invalid file type. Only JPG, GIF and PNG types are accepted.";
				}
		}
		
	    if(!empty($_POST['ShortDescription'])) {
			$ShortDescription = $_POST['ShortDescription'];
		}else{
		    $errors[] ="* Short Description is required field.";
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
	    if(!empty($_POST['CompanyKeywords'])) {
			$CompanyKeywords = $_POST['CompanyKeywords'];
		}else{
		     $errors[] ="* Keywords is required field.";
		}
		
		/*---End Enter Ad details---*/	
		
		/*---Category 1----*/
		if(!empty($_POST['City'])) {
			$City = $_POST['City'];
		}else{
		    $errors[] ="* City 1 is required field.";
		}
		/*if(!empty($_POST['upgrade1'])) {
			$upgrade = $_POST['upgrade1'];
		}else{
		    $upgrade="N/A.";
		}
		if(!empty($_POST['Premium'])) {
			$Premium = $_POST['Premium'];
		}else{
		   $Premium  = "";
		}*/
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
			$sql  = "UPDATE `tb_local` SET `Banner` = '$UploadBanner',`Status`='0' WHERE `Id_Local` = '$Id'";	
			$res = mysqli_query($db, $sql);
			}else{
				$errors[] ="* Invalid file type. Only JPG, GIF and PNG types are accepted.";
				}
		}
		/*---End Category 1----*/

		
		/*---Category 2----*/
		if(!empty($_POST['City2'])) {
			$City2 = $_POST['City2'];
		}else{
		    $City2 ="";
		}
		/*if(!empty($_POST['upgrade2'])) {
			$upgrade2 = $_POST['upgrade2'];
		}else{
		    $upgrade2="N/A.";
		}
		if(!empty($_POST['Premium2'])) {
			$Premium2 = $_POST['Premium2'];
		}else{
		    $Premium2="";
		}*/
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
			$sql  = "UPDATE `tb_local` SET `Banner2` = '$UploadBanner2',`Status`='0' WHERE `Id_Local` = '$Id'";	
			$res = mysqli_query($db, $sql);
			}else{
				$errors[] ="* Invalid file type. Only JPG, GIF and PNG types are accepted.";
				}
		}
		/*---End Category 2----*/
	
	/*---Category 3----*/
		if(!empty($_POST['City3'])) {
			$City3 = $_POST['City3'];
		}else{
		    $City3 ="";
		}
		/*if(!empty($_POST['upgrade3'])) {
			$upgrade3 = $_POST['upgrade3'];
		}else{
		    $upgrade3="N/A.";
		}
		if(!empty($_POST['Premium3'])) {
			$Premium3 = $_POST['Premium3'];
		}else{
		    $Premium3="";
		}*/
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
			$sql  = "UPDATE `tb_local` SET `Banner3` = '$UploadBanner3',`Status`='0' WHERE `Id_Local` = '$Id'";	
			$res = mysqli_query($db, $sql);
			}else{
				$errors[] ="* Invalid file type. Only JPG, GIF and PNG types are accepted.";
				}
		}
		
		if(!empty($_POST['Category1'])) {
				$Category1 = $_POST['Category1'];
			}else{
				 $Category1 ="";
			}
			
			
			
		/*---End Category ----*/
	
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
$Seo 				= cleanURL($CompanyName);
		$array = array(
//			"OrderId"					=> $OrderId,
			"CompanyName"				=> $CompanyName,
			"CompanyAddress"			=> $CompanyAddress,
			"CompanyEmail"				=> $CompanyEmail,
			"CompanyWebsite"			=> $CompanyWebsite,
		//	"CompanyLogo"				=> $UploadCompanyLogo,
			"ShortDescription"			=> $ShortDescription,
			"Description"				=> $Description,
			"Agent"						=> $Agent,
			"CompanyKeywords"			=> $CompanyKeywords,
			"City"						=> $City,
			"Telephone"					=> $Telephone,
		//	"upgrade"					=> $upgrade,
		//	"Premium"					=> $Premium,
		//	"Banner"					=> $UploadBanner,
			"City2"						=> $City2,
		//	"upgrade2" 					=> $upgrade2,
		//	"Premium2" 					=> $Premium2,
		//	"Banner2" 					=> $UploadBanner2,
			"City3" 					=> $City3,
			"Category1" 				=> $Category1,
		//	"upgrade3" 					=> $upgrade3,
		//	"Premium3" 					=> $Premium3,
		//	"Banner3" 					=> $UploadBanner3,
		//	"PaymentPlan" 				=> $PaymentPlan,
		//	"Coupon" 					=> $Coupon,
			"Seo" 						=> $Seo,
			"DateAdded" 				=> $DateAdded
			//"OrderType"					=> $OrderType,
	);
				
		foreach ($array as $key => $val) {
		$sql = "UPDATE `tb_local` SET `$key` = '$val' WHERE `Id_Local` = '$Id'";
		$res = mysqli_query($db, $sql);
		}
		$success = "Update Successfully.";	
	      echo '<meta http-equiv="refresh" content="2; url=local-directory" />';
		}
 }
?>
