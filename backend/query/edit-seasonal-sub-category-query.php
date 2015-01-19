<?php

$errors = array();
$success = null;
$Category		= '';
$Title			= '';
$Description	= '';

if(isset($_POST['submit'])){
$Id	    		= $_POST['Id'];  

$DateAdded 		= date("Y-m-d H:i:s");
 if(!empty($_POST['Category'])) {
		$Category = $_POST['Category'];
	}else{
	   $errors[] ="* Category is required field.";
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
$Seo = cleanURL($Title);	
			if(empty($errors)) {
			
				$array = array(
							"Cid"			=> $Category,
							"Title"			=> $Title,
							"Description"	=> $Description,
							"DateCreated" 	=> $DateAdded,
							"Seo"			=> $Seo,
							"Status" 		=> "1",
							"UseFor" 		=> "7"
						);
			 foreach ($array as $key => $val) {
				 $sql = "UPDATE `sub-categories` SET `$key` = '$val' WHERE `Id` = '$Id'";
				  $res = mysqli_query($db, $sql);
				}
			   $success.='Record has been successfully edited.';
			     @header( "refresh:0;url=manage-seasonal-sub-categories");
			}
}
?>