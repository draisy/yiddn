<?php
require_once('include/config.php'); 
require_once('include/user-check.php'); 
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard - <?php echo $row_home->Title;?></title>
<?php require_once('inc.header.files.php'); ?>
<meta content="width=device-width, initial-scale=1.0" charset="utf-8" name="viewport"/>
</head>
<body>
<?php require_once('inc.header.php'); ?>

<div class="container-fluid">
<div class="clearfix">&nbsp;</div>
  <div class="row">
    <div class="col-lg-12">
      <div class="widget-container stats-container">
       
       
        
      </div>
    </div>
  </div>
  <?php require_once('inc.footer.php'); ?>
</div>
</body>
</html>