<?php
$errors = array();
$success = null;

$Province  = '';
if(isset($_POST['submit'])){
$DateCreated 		= date("Y-m-d H:i:s");

if(!empty($_POST['CountryId'])) {
		$CountryId = $_POST['CountryId'];
	} else {
     	$errors[] ="* Country is required field.";
	}


 if(!empty($_POST['Province'])) {
		$Province = $_POST['Province'];
	} else {
     	$errors[] ="* Province is required field.";
	}

	$ProvinceSeo = cleanURL($Province);
			if(empty($errors)) {
			
				$array = array(
							"CountryId"  		=> $CountryId,
							"Province"  		=> $Province,
							"ProvinceSeo"  	    => $ProvinceSeo,
							"DateCreated" 		=> $DateCreated,
							"Status" 			=> '1'
				);
			
			   $sql  = "INSERT INTO `province`";
			   $sql .= " (`".implode("`, `", array_keys($array))."`)";
			   $sql .= " VALUES ('".implode("', '", $array)."') ";
			   $res = mysqli_query($db, $sql);
			   $success.="Added Successfully.";
			 @header( "refresh:1;url=province");
				}
}
		
	
	
	
if(isset($_POST['update'])){

$Id 	= $_POST['Id'];
 
if(!empty($_POST['CountryId'])) {
		$CountryId = $_POST['CountryId'];
	} else {
     	$errors[] ="* Country is required field.";
	}


 if(!empty($_POST['Province'])) {
		$Province = $_POST['Province'];
	} else {
     	$errors[] ="* Province is required field.";
	}

	
	$ProvinceSeo = cleanURL($Province);			 $array = array(
							"CountryId"  		=> $CountryId,
							"Province"  		=> $Province,
							"ProvinceSeo"  	    => $ProvinceSeo,
							"Status" 			=> '1'
					);
   
		foreach ($array as $key => $val) {
		 $sql = "UPDATE `province` SET `$key` = '$val' WHERE `Id` = '$Id'";
		  $res = mysqli_query($db, $sql);
		}
		$success.="Update Successfully.";
	 @header( "refresh:1;url=province");
	}
?>