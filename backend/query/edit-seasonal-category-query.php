<?php
$errors = array();
$success = null;

$Title			= '';
$Description	= '';

if(isset($_POST['submit'])){
$Id	    		= $_POST['Id'];  

$DateAdded 		= date("Y-m-d H:i:s");

$CategoryImage = $_FILES['CategoryImage']['name'];
$tmp_name    = $_FILES['CategoryImage']['tmp_name'];
if($CategoryImage != "")
{
	if ((
	$_FILES["CategoryImage"]["type"] == "image/gif")
	|| ($_FILES["CategoryImage"]["type"] == "image/jpeg")
	|| ($_FILES["CategoryImage"]["type"] == "image/png")
	|| ($_FILES["CategoryImage"]["type"] == "image/pjpeg")
	&& ($_FILES["CategoryImage"]["size"] < 2097152)){			
	$date = date("Y_S_y_js_m_F_M");
	$UploadCategoryImage = cleanURL($CategoryImage)."-".$_SESSION["Yiddn_login_Id"]."-". $date.".png";
	move_uploaded_file($tmp_name,"../images/CategoryImage/".$UploadCategoryImage);
	$sql  = "UPDATE `categories` SET `Image` = '$UploadCategoryImage' WHERE `Id` = '$Id'";	
	$res = mysqli_query($db, $sql);
	}else{
		$errors[] ="* Invalid file type or size. Only JPG, GIF and PNG types < 2MB are accepted.";
		}
}

  if(!empty($_POST['Title'])) {
		$Title = $_POST['Title'];
	}else{
	   $errors[] ="* Title is required field.";
	}

  if(!empty($_POST['Description'])) {
		$Description = $_POST['Description'];
	}else{
	   $Description="";
	}
	
  if(!empty($_POST['OrderBy'])) {
		$OrderBy = $_POST['OrderBy'];
	}else{
	   $errors[] ="* OrderBy is required field.";
	}
$Seo = cleanURL($Title);	
			if(empty($errors)) {
			
				$array = array(
							"Title"			=> $Title,
							"Description"	=> $Description,
							"DateCreated" 	=> $DateAdded,
							"Seo"			=> $Seo,
							"Status" 		=> "1",
							"OrderBy"		=> $OrderBy
						);
			 foreach ($array as $key => $val) {
				 $sql = "UPDATE `categories` SET `$key` = '$val' WHERE `Id` = '$Id'";
				  $res = mysqli_query($db, $sql);
				}
			   $success.='Record has been successfully edited.';
			     @header( "refresh:0;url=manage-seasonal-categories");
			}
}
?>