<?php

$errors = array();
$success = null;

$Category		= '';
$Title			= '';
$Description	= '';

if(isset($_POST['submit'])){

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
							"UseFor" 		=> "3"
							
		);
	$query = "select * from `sub-categories` where `Title`= '".$Title."' AND `Cid`= '".$Category."'  AND `UseFor`='3'";
	$result = $db->query($query);
	if($result->num_rows > 0){		
			$errors[] ='The Sub Category is Already Exists.';
	}	
	else {
			
			   $sql  = "INSERT INTO `sub-categories`";
			   $sql .= " (`".implode("`, `", array_keys($array))."`)";
			   $sql .= " VALUES ('".implode("', '", $array)."') ";
			   $res = mysqli_query($db, $sql);
			   $success.='Added Successfully.';
			     @header( "refresh:0;url=manage-local-directory-sub-categories");
				}
	}
}

?>