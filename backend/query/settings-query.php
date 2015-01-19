<?php
$errors = array();
$success = null;
$Title 		 = '';
$Description = '';
$Address 	 = '';
$HeaderText  = '';
$FooterText  = '';
$Logo 		 = '';
$EmailTo 	 = '';
$EmailFrom	 = '';
if(isset($_POST['update'])){
$AddedBy 		= $_POST['AddedBy'];  
 if(!empty($_POST['Title'])) {
		$Title = $_POST['Title'];
	} else {
     	$errors[] ="*Title is required field.";
	}
 if(!empty($_POST['Description'])) {
		$Description = $_POST['Description'];
	} else {
     	$Description = "";
	}
 if(!empty($_POST['Address'])) {
		$Address = $_POST['Address'];
	} else {
     	$Address = "";
	}
 if(!empty($_POST['HeaderText'])) {
		$HeaderText = $_POST['HeaderText'];
	} else {
     	$HeaderText = "";
	}
 if(!empty($_POST['FooterText'])) {
		$FooterText = $_POST['FooterText'];
	} else {
     	$FooterText = "";
	}
 if(!empty($_POST['EmailTo'])) {
		$EmailTo = $_POST['EmailTo'];
	} else {
     	$EmailTo = "";
	}	
 if(!empty($_POST['EmailFrom'])) {
		$EmailFrom = $_POST['EmailFrom'];
	} else {
     	$EmailFrom = "";
	}	
	
			if(empty($errors)){
				
				if(!empty($_FILES["LoginPageLogo"]['tmp_name'])) {
				$LoginPageLogo = chunk_split(base64_encode(file_get_contents($_FILES["LoginPageLogo"]['tmp_name'])));
				$sql = "UPDATE `settings` SET `LoginPageLogo` = '$LoginPageLogo' WHERE `Id` = '1'";
				$res = mysqli_query($db, $sql);
				}
				
				if(!empty($_FILES["HeaderLogo"]['tmp_name'])) {
				$HeaderLogo = chunk_split(base64_encode(file_get_contents($_FILES["HeaderLogo"]['tmp_name'])));
				$sql = "UPDATE `settings` SET `HeaderLogo` = '$HeaderLogo' WHERE `Id` = '1'";
				$res = mysqli_query($db, $sql);
				}
				
				 $array = array(
							"Title"  		=> $Title,
							"Description"  	=> $Description,
							"Address" 		=> $Address,
							"HeaderText"  	=> $HeaderText,
							"FooterText"  	=> $FooterText,
							"EmailTo"  		=> $EmailTo,
							"EmailFrom"  	=> $EmailFrom
					);
				foreach ($array as $key => $val) {
				 $sql = "UPDATE `settings` SET `$key` = '$val' WHERE `Id` = '1'";
				  $res = mysqli_query($db, $sql);
				}
				$success.="Record has been successfully edited.";
				@header( "refresh:1;url=site-settings");
	}
}


?>