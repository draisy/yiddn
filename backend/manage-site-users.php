<?php
require_once('include/config.php'); 
require_once('include/user-check.php'); 
?>
<!DOCTYPE html>
<html><?php require_once('query/view-all-site-user-query.php');?>
<head>
<title>Manage Site Users - <?php echo $row_home->Title;?></title>
<?php 
require_once('inc.header.files.php');
?>
<meta content="width=device-width, initial-scale=1.0" charset="utf-8" name="viewport"/>
</head>
<body>
<?php require_once('inc.header.php'); ?>
<div class="container-fluid">
  <div class="page-title">
    <h1>Manage Site Users </h1>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="widget-container fluid-height clearfix">
        <div class="heading"><a href="add-new-site-user"><i class="icon-plus-sign"></i>Add New</a></div>
<?php 
if(isset($success)) {?>
<div class="alert alert-success">
<button class="close" data-dismiss="alert">&times;</button>
<strong><?php echo $success;?></strong>
</div>
<?php }?> 
<?php
if(isset($errors)) {
foreach($errors as $err) {
?>
 <div class="alert alert-danger">
<button class="close" data-dismiss="alert">&times;</button>
<strong><?php echo $err;?></strong>
</div>
<?php
     }
   }
?>
        <div class="widget-content padded clearfix">
            <?php ShowSiteUser();?>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>