<?php
session_start();
require_once('include/config.php'); 
$key='';
if( $_POST["username"]=="" || $_POST["password"]=="")

{
	$_SESSION["login_error"] = "Enter Correct Username & Password.";
	@header("Location: admin-login");
	exit;
}

else if((!isset($_POST["username"]) || $_POST["username"]==""))

{

	$_SESSION["login_error"] = "Please enter Username";	

	@header("Location: admin-login");
	exit;

}

else if((!isset($_POST["password"]) || $_POST["password"]==""))

{

	$_SESSION["login_error"] = "Please enter Password";	

	@header("Location: admin-login");
	exit;

}

else

{

	//echo "Both are set";

$arr=array('=','%','$','/','\\','+','\'','"','(',')','^','~','`','&',',',':',';','?','<','>','!','{','}','[',']');	

	

	$username = $_POST["username"];	

	$username = str_replace($arr,'',$username);

	$username = strip_tags($username);	



	$arr2=array('=','/','\\','+','-','\'','"','(',')','`',',',':',';','?','<','>','!','{','}','[',']');



	$password = $_POST["password"];	

	$password = str_replace($arr2,'',$password);

	$password = strip_tags($password);

//$username_encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key),$username, MCRYPT_MODE_CBC, md5(md5($key))));
$password_encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key),$password, MCRYPT_MODE_CBC, md5(md5($key))));


   $query = "SELECT * FROM `account` WHERE `EmailAddress` = '$username' AND `Password` ='$password_encrypted' AND `AccountType` IN (1,2)";
	$result = $db->query($query);
	$result = mysqli_query($db, $query);
//echo "<br/>";

//exit;	
	if($row = $result->fetch_assoc())

	{	

		if($row["EmailAddress"]==$username && $row["Password"]==$password_encrypted)

		{

			//$invalid_admin = false;
			$username = false;

$_SESSION["admin"] = $row["EmailAddress"];

		}

	}else{$_SESSION["login_error"] = "Username and Password do not match!";
		header("Location: admin-login");
		exit;

	}

	

	if($username)

	{

		$_SESSION["login_error"] = "Username and Password do not match!";
		@header("Location: admin-login");
		exit;

	}

	else

	{

	  	$_SESSION['yiddnLoginId'] 	= $row['Id'];
  		$_SESSION['LoginUserName']  = $row["UserName"];
		$_SESSION['AccountType']    = $row["UserType"];
		$_SESSION["admin_logged"]   = "yes:logged";
		if(isset($_SESSION['return_url'])){
		@header("Location:".$_SESSION['return_url']);
			}else{
		@header("Location: manage-site-users");
	    }
	}// end else
}// end outer else
?> 