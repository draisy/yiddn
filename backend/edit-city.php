<?php
require_once('include/config.php'); 
require_once('include/user-check.php'); 
?>
<!DOCTYPE html>
<html><?php require_once('query/city-query.php'); ?>
<head>
<title>Edit Country -  <?php echo $row_home->Title;?></title>
<?php require_once('inc.header.files.php'); ?>
<meta content="width=device-width, initial-scale=1.0" charset="utf-8" name="viewport"/>
<script>
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
	}
	
	
	
	function getcategory(strURL) {		
		
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('Province_div').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
</script>

</head>
<body>
<?php require_once('inc.header.php'); ?>
<div class="container-fluid">
  <div class="page-title">
    <h1> Edit Country</h1>
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
$qs = "SELECT * FROM `city` WHERE id = '$id'";
$result = $db->query($qs);
$result = mysqli_query($db, $qs);
$row = $result->fetch_object(); 
?>
            <form method="post" class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-lg-3">Country</label>
                  <div class="col-lg-9">
                    <select class="select2able" name="CountryId" id="CountryId" onChange="getcategory('get-province.php?CountryId='+this.value)">
                      <option value="">---Select---</option>
					<?php
                    $query_country = 'SELECT * FROM `country` where `Status`="1"';
                    $result_country = $db->query($query_country);
                    while ($row_country = $result_country->fetch_assoc()) 
                    {?>
                    <option value="<?php echo $row_country['Id'];?>" <?php if($row->CountryId==$row_country['Id']){echo 'selected="selected"';}?>><?php echo $row_country['Country'];?></option>
                    <?php 
                    }?>
                    </select>
                  </div>
                </div>
                
                 <div class="form-group">
                  <label class="control-label col-lg-3">Province</label>
                  <div class="col-lg-9"  id="Province_div">
                    <select class="select2able" name="ProvinceId">
<?php 
// Set up query
$query2 = 'SELECT * FROM `province` where `Status`="1"';
// OOP way
$result2 = $db->query($query2);
// Procedural way
while ($row1 = $result2->fetch_assoc()) 
{
?>
<option value="<?php echo $row1['Id'];?>" <?php if($row->ProvinceId==$row1['Id']){echo 'selected="selected"';}?>><?php echo $row1['Province'];?> </option>
<?php } ?>
</select>
                    </select>
                  </div>
                </div>
              
              <div class="form-group">
                <label class="control-label col-lg-3">City</label>
                <div class="col-lg-9">
                  <input class="form-control" placeholder="City" name="City" type="text" value="<?php echo $row->City; ?>"/>
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