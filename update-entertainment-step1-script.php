<?php 
require_once('inc.files.php');

if(isset($_POST['step1'])){
	
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
		$CompanyLogo = basename($_FILES['CompanyLogo']['name']);
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
			move_uploaded_file($tmp_name,"images/CompanyLogo/".$UploadCompanyLogo);
			
	$array = array(
	"CompanyLogo"				=> mysqli_real_escape_string($db,$UploadCompanyLogo)
	);
	
	foreach ($array as $key => $val) {
	$sql = "UPDATE `tb_entertainment` SET `$key` = '$val' WHERE `OrderId` = '".$OrderId."'";
	$res = mysqli_query($db, $sql);
	}
		
			}else{
				$errors[] ="* Invalid file type. Only JPG, GIF and PNG types are accepted.";
				}
		}else{
			$UploadCompanyLogo='';
		}

			$Seo 				= cleanURL($CompanyName);
			$step				= $_POST['step'];
			$OrderType   		= $_POST['OrderType'];
			$DateAdded 			= date("Y-m-d H:i:s");	
			$OrderId            = $_SESSION['OrderId'] = $_POST['OrderId'];
	
	if(empty($errors)) {
	
			$array = array(
			"OrderId"					=> mysqli_real_escape_string($db,$OrderId),
			"CompanyName"				=> mysqli_real_escape_string($db,$CompanyName),
			"CompanyAddress"			=> mysqli_real_escape_string($db,$CompanyAddress),
			"Telephone"				    => $Telephone,
			"CompanyEmail"				=> mysqli_real_escape_string($db,$CompanyEmail),
			"CompanyWebsite"			=> mysqli_real_escape_string($db,$CompanyWebsite),
			"Seo" 						=> mysqli_real_escape_string($db,$Seo),
			"DateAdded" 				=> $DateAdded,
			"step" 						=> '1',
			"Status" 					=> '0',
			"OrderType"					=> $OrderType,
			"UserId" 					=> $_SESSION['Yiddn_login_Id']
			);
		   
	foreach ($array as $key => $val) {
	$sql = "UPDATE `tb_entertainment` SET `$key` = '$val' WHERE `OrderId` = '".$OrderId."'";
	$res = mysqli_query($db, $sql);
	}
		   
		 header("Location:update-entertainment-step2?i=".base64_encode($OrderId));
	}else{
		  header("Location:update-entertainment-step1?i=".base64_encode($OrderId));
	}
}
?>
