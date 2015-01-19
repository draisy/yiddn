<?php 
require_once('inc.files.php');

$errors = array();
$success = null;
$FirstName 		    = '';
$LastName 		    = '';
$City 		    	= '';
$StateProvince 		= '';
$Zipcode 		    = '';
$Country 		    = '';
$PhoneNumber 		= '';
$OurSite 		    = '';
$EmailList 		    = '';
$Email				= '';
$Password			= '';
$ConfrimPassword	= '';
$key				= '';

if(isset($_POST['submit'])){
$FirstName 		    = $_POST['FirstName']; 
$LastName 		    = $_POST['LastName']; 
$City 		    	= $_POST['City']; 
$StateProvince 		= $_POST['StateProvince']; 
$Zipcode 		    = $_POST['Zipcode']; 
$Country 		    = $_POST['Country']; 
$PhoneNumber 		= $_POST['PhoneNumber']; 
$OurSite 		    = $_POST['OurSite']; 
$EmailList 		    = $_POST['EmailList']; 
$Password	    	= $_POST['Password'];   
$DateAdded 			= date("Y-m-d H:i:s");
$body	       		= '';  
$headers 	    	= '';  
$header 	    	= '';


	    if(!empty($_POST['FirstName'])) {
			$FirstName = $_POST['FirstName'];
		}else{
		    $FirstName="";
		}

	    if(!empty($_POST['LastName'])) {
			$LastName = $_POST['LastName'];
		}else{
		    $LastName="";
		}

	    if(!empty($_POST['City'])) {
			$City = $_POST['City'];
		}else{
		    $City="";
		}

	    if(!empty($_POST['StateProvince'])) {
			$StateProvince = $_POST['StateProvince'];
		}else{
		    $StateProvince="";
		}

	    if(!empty($_POST['Zipcode'])) {
			$Zipcode = $_POST['Zipcode'];
		}else{
		    $Zipcode="";
		}

	    if(!empty($_POST['Country'])) {
			$Country = $_POST['Country'];
		}else{
		    $Country="";
		}

	    if(!empty($_POST['PhoneNumber'])) {
			$PhoneNumber = $_POST['PhoneNumber'];
		}else{
		    $PhoneNumber="";
		}

	    if(!empty($_POST['OurSite'])) {
			$OurSite = $_POST['OurSite'];
		}else{
		    $OurSite="";
		}

  if(!empty($_POST['Password'])) {
		$Password = $_POST['Password'];
	}else{
	   echo "<div class='required'>* Password is required field.</div>";
	}

	 if(!empty($_POST['ConfrimPassword'])) {
		$ConfrimPassword = $_POST['ConfrimPassword'];
	}else{
	  echo "<div class='required'>* Confirm  Password is required field</div>.";
	}

	if($_POST['Password'] != $_POST['ConfrimPassword']){
		echo '<div class="required">* Password & Confirm password does not match!</div>';
	}

$pass_encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $_POST['Password'], MCRYPT_MODE_CBC, md5(md5($key))));

	
			if(empty($errors)) {
			
				$array = array(
				
							"FirstName"			=> $FirstName,
							"LastName"			=> $LastName,
							"City"				=> $City,
							"StateProvince"		=> $StateProvince,
							"Zipcode"			=> $Zipcode,
							"Country"			=> $Country,
							"PhoneNumber"		=> $PhoneNumber,
							"OurSite"			=> $OurSite,
							"EmailList"			=> $EmailList,
							"Password"			=> $pass_encrypted,
							"DateCreated" 		=> $DateAdded,
							"AccountType" 		=> '3'
							
		);
			   foreach ($array as $key => $val) {
$sql = "UPDATE `account` SET `$key` = '$val' WHERE `Id` = '".$_SESSION['Yiddn_login_Id']."'";
				 $res = mysqli_query($db, $sql);
				}
		echo "<div class='success'>Updated Successfully.</div>";
		echo "<script>window.open('my-profile','_self')</script>";
			}
}
?>