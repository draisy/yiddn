<?php
require_once('include/config.php'); 
require_once('include/user-check.php'); 
?>
<!DOCTYPE html>
<html><?php require_once('query/country-query.php'); ?>
<head>
<title>Add New Country -  <?php echo $row_home->Title;?></title>
<?php require_once('inc.header.files.php'); ?>
<meta content="width=device-width, initial-scale=1.0" charset="utf-8" name="viewport"/>
</head>
<body>
<?php require_once('inc.header.php'); ?>
<div class="container-fluid">
  <div class="page-title">
    <h1> Add New Country</h1>
  </div>
  <div class="row">
    <div class="col-lg-6">

<?php if(isset($success)) {?>
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
    
      <div class="widget-container fluid-height clearfix">  
        <div class="widget-content padded">
          <div class="col-lg-12">
            <form method="post" class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-lg-3">Country</label>
                <div class="col-lg-9">
                  <input class="form-control" placeholder="Country" name="Country" type="text" value="<?php echo htmlentities($Country); ?>"/>
                </div>
              </div>
            
             <div class="form-actions col-lg-offset-3 col-lg-9">
                <input type="submit" class="btn btn-primary"  name="submit" value="Submit">
                <input type="reset" class="btn btn-default-outline" value="Cancel">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>
</body>
</html>