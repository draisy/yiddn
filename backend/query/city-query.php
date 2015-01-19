<?php
$errors = array();
$success = null;

$City  = '';
$Code  = '';
if(isset($_POST['submit'])){
$DateCreated 		= date("Y-m-d H:i:s");


if(!empty($_POST['CountryId'])) {
		$CountryId = $_POST['CountryId'];
	} else {
     	$errors[] ="* Country is required field.";
	}


 if(!empty($_POST['ProvinceId'])) {
		$ProvinceId = $_POST['ProvinceId'];
	} else {
     	$errors[] ="* Province is required field.";
	}


 if(!empty($_POST['City'])) {
		$City = $_POST['City'];
	} else {
     	$errors[] ="* City is required field.";
	}

 	
	$CitySeo = cleanURL($City);
			if(empty($errors)) {
			
				$array = array(
							"CountryId"  		=> $CountryId,
							"ProvinceId"  		=> $ProvinceId,
							"City"  	    	=> $City,
							"CitySeo"  	    	=> $CitySeo,
							"DateCreated" 		=> $DateCreated,
							"Status" 			=> '1'
				);
			
			   $sql  = "INSERT INTO `city`";
			   $sql .= " (`".implode("`, `", array_keys($array))."`)";
			   $sql .= " VALUES ('".implode("', '", $array)."') ";
			   $res = mysqli_query($db, $sql);
			   $success.="Added Successfully.";
			   @header( "refresh:1;url=city");
				}
}
		
	
	
	
if(isset($_POST['update'])){

$Id 	= $_POST['Id'];
if(!empty($_POST['CountryId'])) {
		$CountryId = $_POST['CountryId'];
	} else {
     	$errors[] ="* Country is required field.";
	}


 if(!empty($_POST['ProvinceId'])) {
		$ProvinceId = $_POST['ProvinceId'];
	} else {
     	$errors[] ="* Province is required field.";
	}


 if(!empty($_POST['City'])) {
		$City = $_POST['City'];
	} else {
     	$errors[] ="* City is required field.";
	}

	
	$CitySeo = cleanURL($City);
			   $array = array(
							"CountryId"  		=> $CountryId,
							"ProvinceId"  		=> $ProvinceId,
							"City"  	    	=> $City,
							"CitySeo"  	    	=> $CitySeo,
							"Status" 			=> '1'
					);
   
		foreach ($array as $key => $val) {
		 $sql = "UPDATE `city` SET `$key` = '$val' WHERE `Id` = '$Id'";
		  $res = mysqli_query($db, $sql);
		}
		$success.="Update Successfully.";
	 @header( "refresh:1;url=city");
	}
?>