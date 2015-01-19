<?php
require_once('include/config.php'); 
require_once('include/user-check.php'); 
?>
<!DOCTYPE html>
<html><?php require_once('query/edit-services-category-query.php'); ?>
<head>
<title>Edit Services Category - <?php echo $row_home->Title;?></title>
<?php require_once('inc.header.files.php'); ?>

<meta content="width=device-width, initial-scale=1.0" charset="utf-8" name="viewport"/>
</head>
<body>
<?php require_once('inc.header.php'); ?>
<div class="container-fluid">
  <div class="page-title">
    <h1> Edit Services Category </h1>
  </div>
  <div class="row">
   
    <div class="col-lg-6">
      <div class="row">
        <div class="col-lg-12">
          <div class="widget-container fluid-height clearfix">
            <div class="heading"><i class="icon-edit-sign"></i>Edit Category</div>
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

<?php 
$query = "select * from `categories` where `UseFor`='6' AND  `Id`= ".base64_decode($_GET['y']);
$result = $db->query($query);
if(@$result->num_rows > 0){
$row = $result->fetch_object();
?>
            <div class="widget-content padded">
              <form method="post">
                <div class="form-group">
                  <label for="Title">Title</label>
                  <input class="form-control" id="Title" name="Title" placeholder="Title" type="text" value="<?php echo $row->Title;?>" />
              	  <input class="form-control" id="Id" name="Id" type="hidden" value="<?php echo $row->Id;?>" />
                </div>
               
                <div class="form-group">
                  <label for="Description">Meta Description</label>
                  <textarea class="form-control" name="Description" rows="3"><?php echo $row->Description;?></textarea>
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Update">
                <input type="reset" class="btn btn-default-outline" value="Cancel">
              </form>
            </div>
           <?php }?> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>