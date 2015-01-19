<?php 
require_once('inc.files.php');

if(isset($_POST['step3'])){
	
		/*---large----*/
		if(!empty($_POST['large'])) {
			$large = $_POST['large'];
		}else{
		   $large="";
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
			move_uploaded_file($tmp_name,"images/Banner/".$UploadBanner);

	$array = array(
	"Banner"	=> mysqli_real_escape_string($db,$UploadBanner)
	);
	foreach ($array as $key => $val) {
	$sql = "UPDATE `tb_ad_circular` SET `$key` = '$val' WHERE `OrderId` = '".$_SESSION['OrderId']."'";
	$res = mysqli_query($db, $sql);
	}

			}else{
				$errors[] ="* Invalid file type. Only JPG, GIF and PNG types are accepted.";
				}
		}
		/*---End large----*/


		/*---stantard----*/
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
			move_uploaded_file($tmp_name2,"images/Banner/".$UploadBanner2);

	$array = array(
	"Banner2"					=> mysqli_real_escape_string($db,$UploadBanner2)
	);
	foreach ($array as $key => $val) {
	$sql = "UPDATE `tb_ad_circular` SET `$key` = '$val' WHERE `OrderId` = '".$_SESSION['OrderId']."'";
	$res = mysqli_query($db, $sql);
	}			

			}else{
				$errors[] ="* Invalid file type. Only JPG, GIF and PNG types are accepted.";
				}
		}
		/*---End stantard----*/

	/*---small----*/
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
			move_uploaded_file($tmp_name3,"images/Banner/".$UploadBanner3);
	$array = array(
	"Banner3" 					=> mysqli_real_escape_string($db,$UploadBanner3)
	);
	foreach ($array as $key => $val) {
	$sql = "UPDATE `tb_ad_circular` SET `$key` = '$val' WHERE `OrderId` = '".$_SESSION['OrderId']."'";
	$res = mysqli_query($db, $sql);
	}
			}else{
				$errors[] ="* Invalid file type. Only JPG, GIF and PNG types are accepted.";
				}
		}
		/*---End small----*/
			
		if(!empty($_POST['City'])) {
			$City = $_POST['City'];
		}else{
		    $errors[] ="* City is required field.";
		}
		$OrderId            = $_SESSION['OrderId'] = $_POST['OrderId'];
		
	if(empty($errors)) {
	
			$array = array(
			"large"						=> mysqli_real_escape_string($db,$large),
			"stantard"					=> mysqli_real_escape_string($db,$stantard),
			"small"						=> mysqli_real_escape_string($db,$small),
			"City"						=> mysqli_real_escape_string($db,$City),
			"step" 						=> '3'
			);
	foreach ($array as $key => $val) {
	$sql = "UPDATE `tb_ad_circular` SET `$key` = '$val' WHERE `OrderId` = '".$OrderId."'";
	$res = mysqli_query($db, $sql);
	}
		   header("Location:update-general-directory-step4?i=".base64_encode($OrderId));
	}else{
		   header("Location:update-general-directory-step3");
	}
}
?>
