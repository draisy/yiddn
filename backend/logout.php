<?php
session_start();
if(isset($_SESSION["admin_logged"]))
{
  unset($_SESSION["yiddnLoginId"]);
  unset($_SESSION["LoginUserName"]);
  unset($_SESSION["AccountType"]);
  unset($_SESSION["admin_logged"]);	  
  @header("Location: admin-login");
}
?>