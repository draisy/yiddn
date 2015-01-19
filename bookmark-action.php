<?php 
require_once('inc.files.php');
require_once('user-check.php'); 

	if(isset($_GET['bookmark'])){
	$_SESSION['UserId']=$_SESSION['Yiddn_login_Id'];
	$_SESSION['Url'];
	$_SESSION['CompanyUrl'];
	$_SESSION['Modal'];
	$_SESSION['CompanyName'];
	$_SESSION['OrderType'];
	$DateAdded 				 = date("Y-m-d H:i:s");
	}else{
	$_SESSION['UserId']   	 = $_POST['UserId'];
	$_SESSION['Url']	  	 = $_POST['Url'];
	$_SESSION['CompanyUrl']	 = $_POST['CompanyUrl'];
	$_SESSION['Modal']	  	 = $_POST['Modal'];
	$_SESSION['CompanyName'] = $_POST['CompanyName'];
	$_SESSION['OrderType']   = $_POST['OrderType'];
	$DateAdded 				 = date("Y-m-d H:i:s");	
	}
	if(isset($_SESSION["Yiddn_login_Id"]))
	{
	$array = array(
							"UserId"				=> $_SESSION['UserId'],
							"Url"				    => $_SESSION['Url'],
							"CompanyUrl"			=> $_SESSION['CompanyUrl'],
							"Modal"					=> $_SESSION['Modal'],
							"CompanyName"			=> $_SESSION['CompanyName'],
							"OrderType"				=> $_SESSION['OrderType'],
							"DateAdded"				=> $DateAdded
	);
    $query = "select * from `bookmark` where `UserId`= '".$_SESSION['UserId']."' AND `Modal`= '".$_SESSION['Modal']."'  AND `OrderType`= '".$_SESSION['OrderType']."'";
	$result = $db->query($query);
	if($result->num_rows == 0){
			   $sql  = "INSERT INTO `bookmark`";
			   $sql .= " (`".implode("`, `", array_keys($array))."`)";
			   $sql .= " VALUES ('".implode("', '", $array)."') ";
			   $res = mysqli_query($db, $sql);
	}
	echo "<script>window.open('bookmark','_self')</script>";
	}else{
	echo "<script>window.open('user-login','_self')</script>";
	}
	
			   
?>