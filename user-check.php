<?php
 if (!isset($_SESSION)) {

  session_start();

}
if(!isset($_SESSION["Yiddn_login_Id"]))

{
	//header("Location: home");
	echo "<script>window.open('user-login','_self')</script>";
}
// set timeout period in seconds
if (isset($_SESSION['Yiddn_login_Id']))
{
$inactive = 1000;
// check to see if $_SESSION['timeout'] is set
if(isset($_SESSION['timeout']) ) {
	$session_life = time() - $_SESSION['timeout'];
	if($session_life > $inactive)
        { 
		session_destroy(); 
		//header("Location: home");
		echo "<script>window.open('user-login','_self')</script>";
		}
}
$_SESSION['timeout'] = time();
}
?>