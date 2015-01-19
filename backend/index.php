<?php
require_once('include/config.php'); 
?>
<!DOCTYPE html>
<html>
<head>
<title>Login - <?php echo $row_home->Title;?></title>
<?php require_once('inc.header.files.php'); ?>
<meta content="width=device-width, initial-scale=1.0" charset="utf-8" name="viewport"/>

</head>
<body>
 <div class="container-fluid">
  <div class="login">
    <div class="login-container"> 
				  <?php if($row_home->LoginPageLogo!=""){?>
                  <img src="data:image/png;base64,<?php echo $row_home->LoginPageLogo;?>" title="<?php echo $row_home->Title;?>" alt="<?php echo $row_home->Title;?>">
                 <?php } ?>
      <form action="login.php" method="post">
      
<?php
if(isset($_SESSION["login_error"]))
{
?>
<div class="alert alert-danger">
<button class="close" data-dismiss="alert">&times;</button><strong><?php echo $_SESSION["login_error"]; ?></strong>
</div>
<?php							
unset($_SESSION["login_error"]);
}
?>


        <div class="form-group">
          <div class="input-group"><span class="input-group-addon"><i class="icon-user"></i></span>
            <input class="form-control" placeholder="Username" type="text" name="username" id="username"/>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group"><span class="input-group-addon"><i class="icon-lock"></i></span>
            <input class="form-control" placeholder="Password" type="password" name="password" id="password"/>
          </div>
        </div>
        <button class="btn btn-lg btn-primary" style="float:left; width:100%;" type="submit">Log in</button>
      </form>
      
  </div>
</div>

</body>
</html>