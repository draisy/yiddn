<?php
require_once('include/config.php'); 
require_once('include/user-check.php'); 
?>
<!DOCTYPE html>
<html><?php require_once('query/settings-query.php'); ?>
<head>
<title>Application Settings -  <?php echo $row_home->Title;?></title>
<?php require_once('inc.header.files.php'); ?>
<meta content="width=device-width, initial-scale=1.0" charset="utf-8" name="viewport"/>
</head>
<body>
<?php require_once('inc.header.php'); ?>
<div class="container-fluid">
  <div class="page-title">
    <h1>Application Settings</h1>
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
<?php 
$qs = "SELECT * FROM `settings` WHERE `id` = '1'";
$result = $db->query($qs);
$result = mysqli_query($db, $qs);
$row = $result->fetch_object(); 
?>
            <form method="post" class="form-horizontal" enctype="multipart/form-data">
              
              <div class="form-group">
                <label class="control-label col-lg-3">Title</label>
                <div class="col-lg-9">
                  <input class="form-control" placeholder="Title" name="Title" type="text" value="<?php echo $row->Title; ?>"/>
                </div>
              </div>
              
               <div class="form-group">
                <label class="control-label col-lg-3">Description</label>
                <div class="col-lg-9">
                  <input class="form-control" placeholder="Description" name="Description" type="text" value="<?php echo $row->Description; ?>"/>
                </div>
              </div>
              
              
               <div class="form-group">
                <label class="control-label col-lg-3">Address</label>
                <div class="col-lg-9">
                  <input class="form-control" placeholder="Address" name="Address" type="text" value="<?php echo $row->Address; ?>"/>
                </div>
              </div>
              
              
               <div class="form-group">
                <label class="control-label col-lg-3">Header Text</label>
                <div class="col-lg-9">
                  <input class="form-control" placeholder="HeaderText" name="HeaderText" type="text" value="<?php echo $row->HeaderText; ?>"/>
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-lg-3">Footer Text</label>
                <div class="col-lg-9">
                  <input class="form-control" placeholder="FooterText" name="FooterText" type="text" value="<?php echo $row->FooterText; ?>"/>
                </div>
              </div>
              
              
                
                 <div class="form-group">
                  <label class="control-label col-lg-3">Login Page Logo</label>
                  <div class="col-lg-9">
                    <input id="exampleInputFile" type="file" name="LoginPageLogo"/>
                  </div>
                  <?php if($row->LoginPageLogo!=""){?>
                  <img src="data:image/png;base64,<?php echo $row->LoginPageLogo;?>">
                 <?php } ?>
                </div>
              
                <div class="form-group">
                  <label class="control-label col-lg-3">Header Logo</label>
                  <div class="col-lg-9">
                    <input id="exampleInputFile" type="file" name="HeaderLogo"/>
                  </div>
                  <?php if($row->HeaderLogo!=""){?>
                  <img src="data:image/png;base64,<?php echo $row->HeaderLogo;?>">
                 <?php } ?>
                </div>
              
            <div class="form-group">
                <label class="control-label col-lg-3">Email To</label>
                <div class="col-lg-9">
                  <input class="form-control" placeholder="Email To" name="EmailTo" type="text" value="<?php echo $row->EmailTo; ?>"/>
                </div>
              </div>
              
               <div class="form-group">
                <label class="control-label col-lg-3">Email From</label>
                <div class="col-lg-9">
                  <input class="form-control" placeholder="Email From" name="EmailFrom" type="text" value="<?php echo $row->EmailFrom; ?>"/>
                </div>
              </div>
              
              
                 <input  type="hidden" name="AddedBy" value="Admin" />
              
              <div class="form-actions col-lg-offset-3 col-lg-9">
                <input type="submit" class="btn btn-primary"  name="update" value="Update">
               </div>
            </form>
         
          </div>
        </div>
      </div>
    </div>
    
  </div>
  <?php require_once('inc.footer.php'); ?>
</div>
</body>
</html>