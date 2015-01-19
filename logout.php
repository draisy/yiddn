<?php
	session_start();
	if(isset($_SESSION["Yiddn_login_Id"])){
	  unset($_SESSION["Yiddn_login_Id"]);
	  unset($_SESSION["Yiddn_login_EmailAddress"]);
	  header("Location: home");
	}
	header("Location: home");
?>