<?php
$errors = array();
$success = null;

$Country = '';
if(isset($_POST['submit'])){
$DateAdded 		= date("Y-m-d H:i:s");


 if(!empty($_POST['Country'])) {
		$Country = $_POST['Country'];
	} else {
     	$errors[] ="* Country is required field.";
	}
	$CountrySeo = cleanURL($Country);
			if(empty($errors)) {
			
				$array = array(
							"Country"  			=> $Country,
							"CountrySeo"  	    => $CountrySeo,
							"Status" 			=> 1,
							"DateCreated" 		=> $DateAdded
						
				);
			
			   $sql  = "INSERT INTO `country`";
			   $sql .= " (`".implode("`, `", array_keys($array))."`)";
			   $sql .= " VALUES ('".implode("', '", $array)."') ";
			   $res = mysqli_query($db, $sql);
			   $success.="Added Successfully.";
			@header( "refresh:0;url=country");
				}
}
		
	
	
	
if(isset($_POST['update'])){

$Id 	= $_POST['Id'];
 
 if(!empty($_POST['Country'])) {
		$Country = $_POST['Country'];
	} else {
     	$errors[] ="* Country is required field.";
	}


 if(!empty($_POST['Status'])) {
		$Status = $_POST['Status'];
	} else {
     	$Status = "Disable";
	}	
	
	$CountrySeo = cleanURL($Country);

				 $array = array(
							"Country"  			=> $Country,
							"CountrySeo"  	    => $CountrySeo,
							"Status" 			=> 1,
							"DateCreated" 		=> $DateAdded
					);
   
		foreach ($array as $key => $val) {
		 $sql = "UPDATE `country` SET `$key` = '$val' WHERE `Id` = '$Id'";
		  $res = mysqli_query($db, $sql);
		}
		$success.="Update Successfully.";
	@header( "refresh:0;url=country");
	}
?>