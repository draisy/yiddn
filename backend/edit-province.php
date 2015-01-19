<?php
require_once('include/config.php'); 
require_once('include/user-check.php'); 
?>
<!DOCTYPE html>
<html><?php require_once('query/province-query.php'); ?>
<head>
<title>Edit Province -  <?php echo $row_home->Title;?></title>
<?php require_once('inc.header.files.php'); ?>
<meta content="width=device-width, initial-scale=1.0" charset="utf-8" name="viewport"/>
</head>
<body>
<?php require_once('inc.header.php'); ?>
<div class="container-fluid">
  <div class="page-title">
    <h1> Edit Province</h1>
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
if(isset($_GET['y'])) {
$id = base64_decode($_GET['y']);
$qs = "SELECT * FROM `province` WHERE id = '$id'";
$result = $db->query($qs);
$result = mysqli_query($db, $qs);
$row = $result->fetch_object(); 
?>
            <form method="post" class="form-horizontal">
              
              <div class="form-group">
                  <label class="control-label col-lg-3">Country</label>
                  <div class="col-lg-9">
                    <select class="select2able" name="CountryId">
                    <?php
                    $query_country = 'SELECT * FROM `country` where `Status`="1"';
                    $result_country = $db->query($query_country);
                    while ($row_country = $result_country->fetch_object()) 
                    {?>
                    <option value="<?php echo $row_country->Id;?>" <?php if($row->CountryId==$row_country->Id){echo ' selected="selected"';}?>><?php echo $row_country->Country;?></option>
                    <?php 
                    }?>
                    </select>
                  </div>
                </div>
              
              
              <div class="form-group">
                <label class="control-label col-lg-3">Province</label>
                <div class="col-lg-9">
                  <input class="form-control" placeholder="Province" name="Province" type="text" value="<?php echo $row->Province; ?>"/>
                </div>
              </div>
              
              
              <input  type="hidden" name="Id" value="<?php echo $id; ?>" />
              
              <div class="form-actions col-lg-offset-3 col-lg-9">
                <input type="submit" class="btn btn-primary"  name="update" value="Update">
               </div>
            </form>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>
</body>
</html>