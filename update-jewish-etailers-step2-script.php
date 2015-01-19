<?php 
require_once('inc.files.php');

if(isset($_POST['step2'])){
	
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
	    if(!empty($_POST['Keywords'])) {
			$CompanyKeywords = $_POST['Keywords'];
		}else{
		     $errors[] ="* Keywords is required field.";
		}
	    $OrderId            = $_SESSION['OrderId'] = $_POST['OrderId'];

	if(empty($errors)) {
	
			$array = array(
			"ShortDescription"			=> mysqli_real_escape_string($db,$ShortDescription),
			"Description"				=> mysqli_real_escape_string($db,$Description),
			"Agent"						=> mysqli_real_escape_string($db,$Agent),
			"CompanyKeywords"			=> mysqli_real_escape_string($db,$CompanyKeywords),
			"step" 						=> '2'
			);
			
			$sql = "SELECT * FROM `tb_etailer` WHERE `OrderId` = '".$_SESSION['OrderId']."'";
			$res = mysqli_query($db, $sql);
			if ($res->num_rows == 0){
				foreach ($array as $key => $val) {
					$sql = "UPDATE `tb_services` SET `$key` = '$val' WHERE `OrderId` = '".$_SESSION['OrderId']."'";
					$res = mysqli_query($db, $sql);
				}
			}
			else {
			foreach ($array as $key => $val) {
				$sql = "UPDATE `tb_etailer` SET `$key` = '$val' WHERE `OrderId` = '".$_SESSION['OrderId']."'";
				$res = mysqli_query($db, $sql);
			}
		}	
		 header("Location:update-jewish-etailers-step3?i=".base64_encode($OrderId));
	}else{
		 header("Location:update-jewish-etailers-step2?i=".base64_encode($OrderId));
	}	
}
?>
