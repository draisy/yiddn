<?php

$errors = array();
$success = null;

$Title			= '';
$Description	= '';

if(isset($_POST['submit'])){
$Id	    		= $_POST['Id'];  

$DateAdded 		= date("Y-m-d H:i:s");

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
$Seo = cleanURL($Title);	
			if(empty($errors)) {
			
				$array = array(
							"Title"			=> $Title,
							"Description"	=> $Description,
							"DateCreated" 	=> $DateAdded,
							"Seo"			=> $Seo,
							"Status" 		=> "1"
						);
			 foreach ($array as $key => $val) {
				 $sql = "UPDATE `categories` SET `$key` = '$val' WHERE `Id` = '$Id'";
				  $res = mysqli_query($db, $sql);
				}
			   $success.='Record has been successfully edited.';
			     @header( "refresh:0;url=manage-local-directory-categories");
			}
}
?>