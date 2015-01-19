<?php
require_once('include/config.php'); 
require_once('include/user-check.php'); 
?>
<!DOCTYPE html>
<html><?php require_once('query/edit-copupns-query.php'); ?>
<head>
<title>Edit Copupns - <?php echo $row_home->Title;?></title>
<?php require_once('inc.header.files.php'); ?>

<meta content="width=device-width, initial-scale=1.0" charset="utf-8" name="viewport"/>
</head>
<body>
<?php require_once('inc.header.php'); ?>
<div class="container-fluid">
  <div class="page-title">
    <h1> Edit Copupns </h1>
  </div>
  <div class="row">
   
    <div class="col-lg-6">
      <div class="row">
        <div class="col-lg-12">
          <div class="widget-container fluid-height clearfix">
            <div class="heading"><i class="icon-edit-sign"></i>Edit Copupns</div>
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
$query = "select * from `copupns` where `Id`= ".base64_decode($_GET['y']);
$result = $db->query($query);
if(@$result->num_rows > 0){
$row = $result->fetch_object();
?>
            <div class="widget-content padded">
              <form method="post">
                <div class="form-group">
                  <label for="Title">Code</label>
                  <input class="form-control" id="Code" name="Code" placeholder="Code" type="text" required value="<?php echo $row->Code;?>" disabled />
                   <input class="form-control" id="Code" name="Code" placeholder="Code" type="hidden" value="<?php echo $row->Code;?>" />
              	  <input class="form-control" id="Id" name="Id" type="hidden" value="<?php echo $row->Id;?>" />
                </div>
                <div class="form-group">
                  <label for="Title">Start Date</label>
                  <input class="form-control" id="dpd1" name="StartDate" placeholder="StartDate" type="text" value="<?php echo $row->StartDate;?>" required />
                </div>
                
                
                <div class="form-group">
                  <label for="Title">End Date</label>
                  <input class="form-control" id="dpd2" name="EndDate" placeholder="End Date" type="text" value="<?php echo $row->EndDate;?>" required />
                </div>
                <div class="form-group">
                  <label for="Title">Discount </label>
                  <input value="<?php echo $row->Discount;?>" class="form-control" id="Discount" name="Discount" placeholder="Discount" type="text" required />
                  
                </div>
                <div class="form-group">
             <label>Discount Type</label>
                <div class="col-lg-9">
                  <label class="radio">
                    <input name="DiscountType"  <?php if($row->DiscountType=="Percent"){echo 'checked';}?> type="radio" value="Percent" required/>
                   Percent</label>
                  <label class="radio">
                    <input name="DiscountType" <?php if($row->DiscountType=="Amount"){echo 'checked';}?> type="radio" value="Amount" required />
                   Amount</label>
                </div>
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
<script>
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
     
    var checkin = $('#dpd1').datepicker({
    onRender: function(date) {
    return date.valueOf() < now.valueOf() ? 'disabled' : '';
    }
    }).on('changeDate', function(ev) {
    if (ev.date.valueOf() > checkout.date.valueOf()) {
    var newDate = new Date(ev.date)
    newDate.setDate(newDate.getDate() + 1);
    checkout.setValue(newDate);
    }
    checkin.hide();
    $('#dpd2')[0].focus();
    }).data('datepicker');
    var checkout = $('#dpd2').datepicker({
    onRender: function(date) {
    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
    }
    }).on('changeDate', function(ev) {
    checkout.hide();
    }).data('datepicker');
</script>

</body>
</html>