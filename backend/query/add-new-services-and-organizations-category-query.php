<?php

$errors = array();
$success = null;

$Title			= '';
$Description	= '';

if(isset($_POST['submit'])){

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
							"Status" 		=> "1",
							"UseFor" 		=> "4"
							
		);
	$query = "select * from `categories` where `Title`= '".$Title."' AND `UseFor`='4'";
	$result = $db->query($query);
	if(@$result->num_rows > 0){		
			$errors[] ='The Category is Already Exists.';
	}	
	else {
			
			   $sql  = "INSERT INTO `categories`";
			   $sql .= " (`".implode("`, `", array_keys($array))."`)";
			   $sql .= " VALUES ('".implode("', '", $array)."') ";
			   $res = mysqli_query($db, $sql);
			   $success.='Added Successfully.';
			     @header( "refresh:0;url=manage-torah-and-resources-categories");
				}
	}
}

?>