<?php
require_once('include/config.php'); 
require_once('include/user-check.php'); 
?>
<!DOCTYPE html>
<html><?php require_once('query/add-new-entertainment-sub-category-query.php'); ?>
<head>
<title>Add New Jewish Entertainment Sub Category - <?php echo $row_home->Title;?></title>
<?php require_once('inc.header.files.php'); ?>

<meta content="width=device-width, initial-scale=1.0" charset="utf-8" name="viewport"/>
</head>
<body>
<?php require_once('inc.header.php'); ?>
<div class="container-fluid">
  <div class="page-title">
    <h1> Add New Jewish Entertainment Sub Category </h1>
  </div>
  <div class="row">
   
    <div class="col-lg-6">
      <div class="row">
        <div class="col-lg-12">
          <div class="widget-container fluid-height clearfix">
            <div class="heading"><i class="icon-edit-sign"></i>Add New</div>
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
            <div class="widget-content padded">
              <form method="post">
               
                <div class="form-group">
                <label for="Title">Select Category</label>
                 <select class="select2able" name="Category" required>
                    <option value="">---Select---</option>
					<?php
                    $Category = 'SELECT * FROM `categories` WHERE `UseFor`="5" AND `Status`="1"';
                    $result_Category = $db->query($Category);
                    while ($row_Category = $result_Category->fetch_assoc()) 
                    {?>
                    <option value="<?php echo $row_Category['Id'];?>" <?php if(isset($_POST['Category'])&& $_POST['Category']==$row_Category['Id']){echo ' selected="selected"';}?>><?php echo $row_Category['Title'];?></option>
                    <?php 
                    }?>
                 </select>
                </div>
                
                
                <div class="form-group">
                  <label for="Title">Title</label>
                  <input class="form-control" id="Title" name="Title" placeholder="Title" type="text" required />
                </div>
               
                <div class="form-group">
                  <label for="Description">Meta Description</label>
                  <textarea class="form-control" name="Description" rows="3"></textarea>
                </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default-outline" value="Cancel">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>