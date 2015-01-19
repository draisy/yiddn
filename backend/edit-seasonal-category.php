<?php
require_once('include/config.php'); 
require_once('include/user-check.php');

if(isset($_GET['n']) && isset($_GET['c'])) {

		if (@file_exists('../images/CategoryImage/'.$_GET['n']))  
		{  
			@unlink('../images/CategoryImage/'.$_GET['n']);  
		}	 			
 	$sql  = "UPDATE `categories` SET `Image`='' Where `Id` = '".base64_decode($_GET['y'])."'";
	$res = mysqli_query($db, $sql);
	echo "<script>window.open('edit-seasonal-category?y=".$_GET['y']."','_self')</script>";
}
 
?>
<!DOCTYPE html>
<html><?php require_once('query/edit-seasonal-category-query.php'); ?>
<head>
<title>Edit Seasonal Category - <?php echo $row_home->Title;?></title>
<?php require_once('inc.header.files.php'); ?>

<meta content="width=device-width, initial-scale=1.0" charset="utf-8" name="viewport"/>
</head>
<body>
<?php require_once('inc.header.php'); ?>
<div class="container-fluid">
  <div class="page-title">
    <h1> Edit Seasonal Category </h1>
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
$query = "select * from `categories` where `UseFor`='7' AND  `Id`= ".base64_decode($_GET['y']);
$result = $db->query($query);
if(@$result->num_rows > 0){
$row = $result->fetch_object();
?>
            <div class="widget-content padded">
              <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="Title">Title</label>
                  <input class="form-control" id="Title" name="Title" placeholder="Title" type="text" value="<?php echo $row->Title;?>" />
              	  <input class="form-control" id="Id" name="Id" type="hidden" value="<?php echo $row->Id;?>" />
                </div>
               
                <div class="form-group">
                  <label for="Description">Meta Description</label>
                  <textarea class="form-control" name="Description" rows="3"><?php echo $row->Description;?></textarea>
                </div>
				
				<div class="form-group">
					<label for="OrderBy">Order By</label>
					<select class="form-control" name="OrderBy" id="OrderBy">
						<option value="" selected>Please select</option>
						<option value=1>First group</option>
						<option value=2>Second group</option>
					</select>
				</div>	
				
				<div class="form-group">
					<label for="CategoryImage">Upload Category Image</label>
					<input type="file" name="CategoryImage" id="CategoryImage" class="form-control"/>
					<?php if($row->Image!=""){?>
						<br />
						<a href="../images/CategoryImage/<?php echo $row->Image;?>" target="_blank"><img src="../images/CategoryImage/<?php echo $row->Image;?>" width="165" /></a>
							 <a href='edit-seasonal-category?y=<?php echo $_GET['y'];?>&n=<?php echo $row->Image;?>&c=c' onclick='return DeleteImage();'>Delete</a>
						<?php }?> 
					<script>
					function DeleteImage()
					{
					return confirm("Are you sure you want to delete this image?");
					}
					</script>
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