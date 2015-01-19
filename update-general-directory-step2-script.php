<?php 
require_once('inc.files.php');

if(isset($_POST['step2'])){
	
		$Telephone   			= '';
		$Address 		        = '';
		$Description 		    = '';
		$Agent 				    = '';
		$Keywords 				= '';

		if(!empty($_POST['Telephone'])) {
			$Telephone = $_POST['Telephone'];
		}else{
	   		$Telephone ="";
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
	   		$Agent ="";
		}
	    if(!empty($_POST['Keywords'])) {
			$Keywords = $_POST['Keywords'];
		}else{
	   		$errors[] ="* Keywords is required field.";
		}
		$OrderId            = $_SESSION['OrderId'] = $_POST['OrderId'];
	    
	if(empty($errors)) {
	
			$array = array(
			"Telephone"				    => $Telephone,
			"Address"				    => $Address,
			"Description"				=> $Description,
			"Agent"				        => mysqli_real_escape_string($db,$Agent),
			"CompanyKeywords"			=> mysqli_real_escape_string($db,$Keywords),
			"step" 						=> '2'
			);
	foreach ($array as $key => $val) {
$sql = "UPDATE `tb_ad_circular` SET `$key` = '$val' WHERE `OrderId` = '".$OrderId."'";
$res = mysqli_query($db, $sql);
	}
		   header("Location:update-general-directory-step3?i=".base64_encode($OrderId));
	}else{
		   header("Location:update-general-directory-step2");
	}
}
?>
