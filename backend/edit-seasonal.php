<?php
require_once('include/config.php'); 
require_once('include/user-check.php'); 
if(isset($_GET['n']) && isset($_GET['c'])) {

		if (@file_exists('../images/CompanyLogo/'.$_GET['n']))  
		{  
			@unlink('../images/CompanyLogo/'.$_GET['n']);  
		}	 			
 	$sql  = "UPDATE `tb_seasonal` SET `CompanyLogo`='' Where `Id_Seasonal`= '".base64_decode($_GET['i'])."'";
	$res = mysqli_query($db, $sql);
	echo "<script>window.open('edit-seasonal?i=".$_GET['i']."','_self')</script>";
}

if(isset($_GET['n']) && isset($_GET['b'])) {

		if (@file_exists('../images/Banner/'.$_GET['n']))  
		{  
			@unlink('../images/Banner/'.$_GET['n']);  
		}	 			
  		$sql  = "UPDATE `tb_seasonal` SET `".$_GET['Banner']."`=''  Where `Id_Seasonal`= '".base64_decode($_GET['i'])."'";
		$res = mysqli_query($db, $sql);
	echo "<script>window.open('edit-seasonal?i=".$_GET['i']."','_self')</script>";
}
?>
<!DOCTYPE html>
<html><?php require_once('query/edit-seasonal-query.php'); ?>
<head>
<title>Edit Seasonal Category - <?php echo $row_home->Title;?></title>
<?php require_once('inc.header.files.php'); ?>

<meta content="width=device-width, initial-scale=1.0" charset="utf-8" name="viewport"/>
</head>
<body>
<?php require_once('inc.header.php'); ?>
<script src="../js/creditcard.js"></script>
<script src="../js/validationFun.js"></script>
<script>
Number.prototype.format = function(n, x) {
    var re = '(\\d)(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$1,');
};

function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}
$(document).ready(function(){
	$("#submit1").click(function() {
	var dir = $("input[type=radio]:checked").val();
	$( "#new_category").load('copy.php?directory='+dir);
  }); 
	}); 
		
$(document).ready(function(){
	$("#submit2").click(function() {
		var id = getUrlVars()['i'];
		var dir = $("input[type=radio]:checked").val();
		var e = document.getElementById("CategoryNew");
		var cat = e.options[e.selectedIndex].value;
		var cur = 'seasonal';
		$( "#copy_query").load('copy-query.php?i='+id+'&directory='+dir+'&category='+cat+'&current='+cur);			
  }); 
}); 

function showMe(box) {
        var chboxs = document.getElementsByClassName("chk");
        var vis = "none";
        for(var i=0;i<chboxs.length;i++) { 
            if(chboxs[i].checked){
             vis = "block";
                break;
            }
        }
        document.getElementById(box).style.display = vis;
}


	$(document).ready(function() {
	$("#ShowMore").hide();
	$('input[type=checkbox]').click(function(){
		if ($('input[type=checkbox]:checked').length > 0) { 
			$("#ShowMore").show();
		}else{
		$("#ShowMore").hide();
		}
	});
	
	/*--- OnLoad Where do you want your ad to show? ---*/	
	$(document).ready(function() {
		if ($("#Premium").is(':checked')) {
			$("#ShowMore").show();
			document.getElementById("div1").style.display = "block";
		}else{
			document.getElementById("div1").style.display = "none";
		}
		if ($("#Premium2").is(':checked')) {
			$("#ShowMore").show();
			document.getElementById("div2").style.display = "block";
		}else{
			document.getElementById("div2").style.display = "none";
		}
		if ($("#Premium3").is(':checked')) {
			$("#ShowMore").show();
			document.getElementById("div3").style.display = "block";
		}else{
			document.getElementById("div3").style.display = "none";
		}
/*--- OnClick Where do you want your ad to show? ---*/	
		$("#Premium").on("click",function(){
			if ($("#Premium").is(':checked')) {
				$("#ShowMore").show();
				document.getElementById("div1").style.display = "block";
			}else{
				document.getElementById("div1").style.display = "none";
			}
		});
		$("#Premium2").on("click",function(){
			if ($("#Premium2").is(':checked')) {
				$("#ShowMore").show();
				document.getElementById("div2").style.display = "block";
			}else{
				document.getElementById("div2").style.display = "none";
			}
		});
		$("#Premium3").on("click",function(){
			if ($("#Premium3").is(':checked')) {
				$("#ShowMore").show();
				document.getElementById("div3").style.display = "block";
			}else{
				document.getElementById("div3").style.display = "none";
			}
		});
	});
	
	/*--- ---*/	
	$(window).load(function() {
	 updateTotal();
	});
		
	$("input").click(function(event) {
        updateTotal();
    });
	
   $('#PaymentPlan').click(function(event) {
        updateTotal();
    });
	
	
		$('#PaymentPlan').on('change', function() {
		$(".charge_summary").show(); 
			if ($(this).val()==10) {
				$('#TotalCost').val("Total charges: $xxx every 3 months");
			}else if ($(this).val()==20) {
				$('#TotalCost').val("Total charges: $xxx every six months");
			}else if ($(this).val()=='RECUR') {
				$('#TotalCost').val("Total charges: $xxx every month");
			}else if ($(this).val()=='ONETIME') {
				$('#TotalCost').val("Total charges: $xxx Only one month");
			}else{
			$('#TotalCost').val("Total charges: $xxx");
			}
		});
});

function updateTotal() {
    var total = 0;
	var totaltext = "";
    $("#menu input:checked").each(function() {
        total += parseFloat(this.value);
    });
	Coupon				= document.getElementById('Coupon').value;
	PaymentPlan			= document.getElementById('PaymentPlan').value;
	CouponDiscount      = document.getElementById('CouponDiscount').value;
	CouponDiscountAmount= document.getElementById('CouponDiscountAmount').value;
	
	if(Coupon==""){
	 CouponCode="NA";
	 CouponDiscountAmount="0.00";
	}else{
	CouponCode=Coupon;
	CouponDiscountAmount	= CouponDiscount;
	}
	/** ----- PaymentPlan 10% -----**/
	if(PaymentPlan==10){
	OrderAmount 		 = total* 3;
	CouponDiscountAmount = OrderAmount /100 * CouponDiscountAmount;
			if(Coupon==""){
			DiscountAmount  	 = OrderAmount/100*10;
			CouDiscountAmount  	 = "0.00";	
			AmountCharged 		 = OrderAmount - DiscountAmount;
			}else{
					if(CouponDiscountAmount!=""){
				CouDiscountAmount  	 = OrderAmount/100*CouponDiscount;	
				DiscountAmount  	 = CouDiscountAmount/100*10;
				TotalDis = DiscountAmount + CouDiscountAmount;
				AmountCharged 		 = OrderAmount - TotalDis;
					}
			}
	$('#TotalCost').val("Order Total: $" + OrderAmount.format(2) + " per month");
	}
	/** ----- PaymentPlan 20% -----**/
	else if(PaymentPlan==20){
	OrderAmount 		 = total* 6;
	CouponDiscountAmount = OrderAmount /100 * CouponDiscountAmount;
			if(Coupon==""){
			DiscountAmount  	 = OrderAmount/100*20;
			CouDiscountAmount  	 = "0.00";	
			AmountCharged 		 = OrderAmount - DiscountAmount;
			}else{
					if(CouponDiscountAmount!=""){
				CouDiscountAmount  	 = OrderAmount/100*CouponDiscount;	
				DiscountAmount  	 = CouDiscountAmount/100*20;
				TotalDis = DiscountAmount + CouDiscountAmount;
				AmountCharged 		 = OrderAmount - TotalDis;
					}
			}
	$('#TotalCost').val("Order Total: $" + OrderAmount.format(2) + " per month");
	}
	
	/** ----- PaymentPlan  -----**/
	
	
	/** ----- PaymentPlan RECUR% -----**/
	else if(PaymentPlan=="RECUR"){
	OrderAmount 		 = total* 1;
	CouponDiscountAmount = OrderAmount /100 * CouponDiscountAmount;
			if(Coupon==""){
			DiscountAmount  	 = 0;
			CouDiscountAmount  	 = 0;	
			AmountCharged 		 = OrderAmount - DiscountAmount;
			}else{
					if(CouponDiscountAmount!=""){
				CouDiscountAmount  	 = OrderAmount/100*CouponDiscount;	
				DiscountAmount  	 = 0;
				TotalDis = DiscountAmount + CouDiscountAmount;
				AmountCharged 		 = OrderAmount - TotalDis;
					}
			}
	$('#TotalCost').val("Order Total: $" + OrderAmount.format(2) + " per month");
	}
	
	
	/** ----- PaymentPlan RECUR% -----**/
	else if(PaymentPlan=="ONETIME"){
	OrderAmount 		 = total* 1;
	CouponDiscountAmount = OrderAmount /100 * CouponDiscountAmount;
			if(Coupon==""){
			DiscountAmount  	 = 0;
			CouDiscountAmount  	 = 0;	
			AmountCharged 		 = OrderAmount - DiscountAmount;
			}else{
					if(CouponDiscountAmount!=""){
				CouDiscountAmount  	 = OrderAmount/100*CouponDiscount;	
				DiscountAmount  	 = 0;
				TotalDis = DiscountAmount + CouDiscountAmount;
				AmountCharged 		 = OrderAmount - TotalDis;
					}
			}
	$('#TotalCost').val("Order Total: $" + OrderAmount.format(2) + " per month");
	}
	
	
	/** ----- PaymentPlan  -----**/
	
	
	
	/*else{
		OrderAmount =total;
		DiscountAmount ="0.00";
		AmountCharged = OrderAmount - DiscountAmount;
		
		$('#TotalCost').val("Order Total: $" + OrderAmount.toFixed(2) + " per month");
	}*/
	
	 
document.getElementById('OrderAmount').value=OrderAmount.format(2);
document.getElementById('CouponDiscountAmount').value=CouponDiscountAmount.format(2);
document.getElementById('DiscountAmount').value=DiscountAmount.format(2);
document.getElementById('AmountCharged').value=AmountCharged.format(2);

	$('#amount').val(total.format());
	$('.Summary').html('Coupon Code: '+ CouponCode +'<br>Order Amount: $'+ OrderAmount.format(2) +'<br>Coupon Discount Amount: $'+ CouponDiscountAmount.format() +'<br>Discount Amount: $' + DiscountAmount.format(2) + '<br>Amount to be Charged: $'+ AmountCharged.format(2));
	totaltext = total.format(2);
	
}
	</script>
<div class="container-fluid">
  <div class="page-title">
    <h1> Edit Seasonal </h1>
  </div>
  <div class="row">
   
    <div class="col-lg-6">
      <div class="row">
        <div class="col-lg-12">
          <div class="widget-container fluid-height clearfix">
            <div class="heading"><i class="icon-edit-sign"></i>Edit Seasonal</div>
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
              
              <form method="post" enctype="multipart/form-data">

<?php 
$query = "select * from `tb_seasonal` where `Id_Seasonal`= '".base64_decode($_GET['i'])."'";
$result = $db->query($query);
if($result->num_rows > 0){	
$row_result = $result->fetch_object();

$query = 'SELECT * FROM `order` WHERE `OrderId`="'.$row_result->OrderId.'"';
$results = $db->query($query);
$rows = $results->fetch_object();
?> 

      <fieldset>
        <legend>
        <h2>Enter Ad details</h2>
        </legend>
        <div class="form-group">
        <label for="CompanyName">Company  Name:</label>
        <input name="CompanyName" id="CompanyName" type="text" class="form-control"  value="<?php echo $row_result->CompanyName;?>" />
        </div>
        <input type="hidden" id="Id" name="Id" value="<?php echo $row_result->Id_Seasonal;?>" />
       
        <div class="form-group">
        <label for="Address">Company Address:</label>
        <textarea name="CompanyAddress"   class="widget-content" id="CompanyAddress"><?php echo $row_result->CompanyAddress;?></textarea>
        </div>
		
		<div class="form-group">
			<label for="Telephone">Telephone:</label>
			<input name="Telephone" id="Telephone" class="form-control"  type="text" value="<?php echo $row_result->Telephone;?>" />
		</div>
        
          <div class="form-group">
        <label for="CompanyEmail">Company Email:</label>
        <input name="CompanyEmail" id="CompanyEmail" class="form-control" value="<?php echo $row_result->CompanyEmail;?>" type="text" />
         </div>
         
         <div class="form-group">
        <label for="CompanyWebsite">Company Website:</label>
        <input name="CompanyWebsite" id="CompanyWebsite" type="text" class="form-control" value="<?php echo $row_result->CompanyWebsite;?>" placeholder="http://" />
        </div>
		
		<div class="form-group">
        <label for="AffiliateWebsite">Affiliate Website:</label>
        <input name="AffiliateWebsite" id="AffiliateWebsite" type="text" class="form-control" value="<?php echo $row_result->AffiliateWebsite;?>" placeholder="http://" />
        </div>
        
        
         <div class="form-group">
        <label for="CompanyLogo">Upload Logo (optional):</label>
        <input type="file" name="CompanyLogo" id="CompanyLogo" />
<?php if($row_result->CompanyLogo!=""){?>
<br />
<a href="../images/CompanyLogo/<?php echo $row_result->CompanyLogo;?>" target="_blank"><img src="../images/CompanyLogo/<?php echo $row_result->CompanyLogo;?>" width="100" /></a>
     <a href='edit-seasonal?i=<?php echo $_GET['i'];?>&n=<?php echo $row_result->CompanyLogo;?>&c=c' onclick='return DeleteLogo();'>Delete</a>
<?php }?> 
<script>
function DeleteLogo()
{
return confirm("Are you sure you want to delete this Logo?");
}
</script>
    </div>

	 <div class="form-group">
        <label for="ShortDescription">Short Description:</label>
        <textarea id="ShortDescription" name="ShortDescription" class="widget-content"  style="height:40px;"><?php echo $row_result->ShortDescription;?></textarea>
     </div>
     
        <div class="form-group">
        <label for="Description">Description:</label>
        <textarea id="Description" name="Description" class="widget-content"><?php echo $row_result->Description;?></textarea>
        </div> 
        
    <div class="form-group"> 
        <label for="Agent">Agent: (optional)</label>
        <input name="Agent" id="Agent" type="text" class="form-control" value="<?php echo $row_result->Agent;?>"  />
     </div> 
    
      <div class="form-group">     
       <label for="CompanyKeywords">Keywords:</label>
        <input name="CompanyKeywords" id="CompanyKeywords" class="form-control" type="text" value="<?php echo $row_result->CompanyKeywords;?>" />
     </div>
      </fieldset>
      <fieldset id="menu">
        <legend>
        <h2>Where do you want your ad to show?</h2>
        </legend>
        <fieldset style="width:97%">
          <legend>Category 1</legend>
 <div class="form-group">  
<select name="Category1" id="Category" class="form-control">
	<option value="">Please select</option>
<?php
$query = 'SELECT * FROM `categories` WHERE  `UseFor`="7" ORDER By Title ASC';
$result = $db->query($query);
while ($row = $result->fetch_assoc()) 
{	
?>
 <optgroup label="<?php echo $row['Title'];?>">
    <?php 
    $query2 = 'SELECT * FROM `sub-categories` where `Cid`="'.$row['Id'].'"';
    $result2 = $db->query($query2);
    while ($row2 = $result2->fetch_assoc()) 
    {
    ?>
     <option value="<?php echo $row2['Id'];?>" <?php if($row_result->Category==$row2['Id']){echo 'selected="selected"';}?>><?php echo $row2['Title'];?></option>
    <?php }?>
 </optgroup>
<?php }?>
</select>
</div>
  <div class="form-group">  
           
          <input type="checkbox" disabled="disabled"  name="upgrade1" value="4.99" id="upgrade" <?php if($row_result->upgrade=='4.99'){echo 'checked="checked"';}?> />
          <label for="upgrade">Yes, I want to upgrade to a BOLD listing - only $4.99 a month.</label>
  </div>
  
   <div class="form-group">         
          <input type="checkbox" disabled="disabled"  name="Premium" value="499" id="Premium"  class="chk" onclick="showMe('div1')" <?php if($row_result->Premium=='499'){echo 'checked="checked"';}?> />
          <label for="Premium">Upgrade to premium for maximum impact with a banner ad display - for only $499 a month.</label>
	</div>
    
         
          <div id="div1" style="display:none" class="upload_div">
            <div class="form-group">  
            <p><strong>Upload banner </strong>
              <input name="Banner1" type="file" />
            </p>
            <em> Banner size should be exactly 632 X 174*</em> 
<?php if($row_result->Banner!=""){?>
<br />
<a href="../images/Banner/<?php echo $row_result->Banner;?>" target="_blank">
<img src="../images/Banner/<?php echo $row_result->Banner;?>" width="100" /></a>
<a href='edit-seasonal?i=<?php echo $_GET['i'];?>&n=<?php echo $row_result->Banner;?>&b=b&Banner=Banner' onclick='return DeleteBanner();'>Delete</a>
<?php }?> 
<script>
function DeleteBanner()
{
return confirm("Are you sure you want to delete this Banner?");
}
</script>
				</div>
            </div>
        </fieldset>
      <fieldset style="width:97%">
         <div class="form-group">         

          <legend>Category 2 (optional)</legend>
<select name="Category2" class="form-control">
    <option value="">Please select</option>
    <?php
    $query = 'SELECT * FROM `categories` WHERE  `UseFor`="7" ORDER By Title ASC';
    $result = $db->query($query);
    while ($row = $result->fetch_assoc()) 
    {	
    ?>
        <optgroup label="<?php echo $row['Title'];?>">
        <?php 
        $query2 = 'SELECT * FROM `sub-categories` where `Cid`="'.$row['Id'].'"';
        $result2 = $db->query($query2);
        while ($row2 = $result2->fetch_assoc()) 
        {
        ?>
        <option value="<?php echo $row2['Id'];?>" <?php if($row_result->Category2==$row2['Id']){echo 'selected="selected"';}?>><?php echo $row2['Title'];?></option>
        <?php }?>
        </optgroup>
    <?php }?>
</select>
          </div>
     <div class="form-group">         

          <input type="checkbox" disabled="disabled"  name="upgrade2" value="4.99" id="upgrade2" <?php if($row_result->upgrade2=='4.99'){echo 'checked="checked"';}?> />
          <label for="upgrade2">Yes, I want to upgrade to a BOLD listing - only $4.99 a month.</label>
      </div>
      
         <div class="form-group">         
          <input type="checkbox" disabled="disabled"  name="Premium2" value="499" id="Premium2" class="chk" onclick="showMe('div2')" <?php if($row_result->Premium2=='499'){echo 'checked="checked"';}?> />
          <label for="Premium2">Upgrade to premium for maximum impact with a banner ad display - for only $499 a month.</label>
        </div>
        
          <div id="div2" style="display:none" class="upload_div">
            <div class="form-group"> 
            <p><strong>Upload banner </strong>
              <input name="Banner2" type="file" />
            </p>
            <em> Banner size should be exactly 632 X 174*</em>
	
	<?php if($row_result->Banner2!=""){?>
    <br />
<a href="../images/Banner/<?php echo $row_result->Banner2;?>" target="_blank">
<img src="../images/Banner/<?php echo $row_result->Banner2;?>" width="100" /></a>
    <a href='edit-seasonal?i=<?php echo $_GET['i'];?>&n=<?php echo $row_result->Banner2;?>&b=b&Banner=Banner2' onclick='return DeleteBanner();'>Delete</a>
    <?php }?> 
    <script>
		function DeleteBanner()
		{
			return confirm("Are you sure you want to delete this Banner?");
		}
    </script>
    	</div>
            
</div>
        </fieldset>
        <fieldset style="width:97%">
          <div class="form-group"> 
          <legend>Category 3 (optional)</legend>
<select name="Category3" class="form-control">
    <option value="">Please select</option>
    <?php
    $query = 'SELECT * FROM `categories` WHERE  `UseFor`="7" ORDER By Title ASC';
    $result = $db->query($query);
    while ($row = $result->fetch_assoc()) 
    {	
    ?>
        <optgroup label="<?php echo $row['Title'];?>">
        <?php 
        $query2 = 'SELECT * FROM `sub-categories` where `Cid`="'.$row['Id'].'"';
        $result2 = $db->query($query2);
        while ($row2 = $result2->fetch_assoc()) 
        {
        ?>
        <option value="<?php echo $row2['Id'];?>" <?php if($row_result->Category3==$row2['Id']){echo 'selected="selected"';}?>><?php echo $row2['Title'];?></option>
        <?php }?>
        </optgroup>
    <?php }?>
</select>
	</div>
      <div class="form-group"> 
          <input type="checkbox" disabled="disabled" name="upgrade3" value="4.99" id="upgrade3" <?php if($row_result->upgrade3=='4.99'){echo 'checked="checked"';}?>/>
          <label for="upgrade3">Yes, I want to upgrade to a BOLD listing - only $4.99 a month.</label>
       </div>
       
       <div class="form-group"> 
          <input type="checkbox" disabled="disabled"  name="Premium3" value="499" id="Premium3" class="chk" onclick="showMe('div3')" <?php if($row_result->Premium3=='499'){echo 'checked="checked"';}?>/>
          <label for="Premium3">Upgrade to premium for maximum impact with a banner ad display - for only $499 a month.</label>
       </div>
         
          <div id="div3" style="display:none" class="upload_div">
         <div class="form-group"> 
            <p><strong>Upload banner </strong>
              <input name="Banner3" type="file" />
            </p>
            <em> Banner size should be exactly 632 X 174*</em> 
            
		<?php if($row_result->Banner3!=""){?>
        <br />
<a href="../images/Banner/<?php echo $row_result->Banner3;?>" target="_blank">
<img src="../images/Banner/<?php echo $row_result->Banner3;?>" width="100" /></a>
        <a href='edit-seasonal?i=<?php echo $_GET['i'];?>&n=<?php echo $row_result->Banner3;?>&b=b&Banner=Banner3' onclick='return DeleteBanner();'>Delete</a>
        <?php }?> 
        <script>
            function DeleteBanner()
            {
                return confirm("Are you sure you want to delete this Banner?");
            }
        </script>
            	</div>
            </div>
        </fieldset>
      </fieldset>
      
      <fieldset id="menu">
       <div class="form-group"> 
        <legend>
        <h2>City</h2>
        </legend>
   

<select name="City" id="City" class="form-control">
	<option value="">Please select</option>
	<?php
    $query = 'SELECT * FROM `country` WHERE `Status`="1" ORDER By `Country` ASC';
    $result = $db->query($query);
    while ($row = $result->fetch_assoc()) 
    {	
    ?>
        <optgroup label="<?php echo $row['Country'];?>">
        <?php 
        $query2 = 'SELECT * FROM `city` where `CountryId`="'.$row['Id'].'"';
        $result2 = $db->query($query2);
        while ($row2 = $result2->fetch_assoc()) 
        {
        ?>
        <option value="<?php echo $row2['Id'];?>"  <?php if($row_result->City==$row2['Id']){echo 'selected="selected"';}?>><?php echo $row2['City'];?></option>
        <?php }?>
        </optgroup>
    <?php }?>
  </select>
	</div>
        
      </fieldset>
      <span id="ShowMore">
      <fieldset class="payment_plan" style="display:none !important">
        <legend>
        <h2>Choose a Payment Plan</h2>
        </legend>
        <p>You can save up to 20% by paying in advance!</p>
        <label for="PaymentPlan"></label>
        <select disabled="disabled" id="PaymentPlan" name="PaymentPlan">
        <option value="">Choose a payment plan</option>
        <option value="10" <?php if($row_result->PaymentPlan=='10'){echo 'selected="selected"';}?>>Get 10% OFF if paid quarterly</option>
        <option value="20" <?php if($row_result->PaymentPlan=='20'){echo 'selected="selected"';}?>>Get 20% OFF if paid half yearly</option>
        <option value="RECUR" <?php if($row_result->PaymentPlan=='RECUR'){echo 'selected="selected"';}?>>Regular Charges as indicated - Charged every month</option>
        <option value="ONETIME" <?php if($row_result->PaymentPlan=='ONETIME'){echo 'selected="selected"';}?>>Only charge for one month</option>     
        </select>
 <div style="border:0px; width:auto; font-size:18px;">
       
<?php
if($row_result->PaymentPlan=='10'){
$PaymentPlan ="$".number_format($rows->AmountCharged,2)." Every 3 months";
}elseif($row_result->PaymentPlan=="20"){
$PaymentPlan ="$".number_format($rows->AmountCharged,2)." Every 6 months";
}elseif($row_result->PaymentPlan=="RECUR"){
$PaymentPlan ="$".number_format($rows->AmountCharged,2)." Per month";
}elseif($row_result->PaymentPlan=="ONETIME"){
$PaymentPlan ="$".number_format($rows->AmountCharged,2)." Only one month";
}else{
$PaymentPlan ="Free";
}
echo "Order Total: ".$PaymentPlan;
		?>
         </div>
        <input id="TotalCost" type="hidden"  name="TotalCost" size="50" style="border:0px; width:auto; font-size:18px;"/>
        <small>Note:Unless cancelled, your subscriptions will be renewed at the selected rate. Subscriptions can be revised or cancelled at any time from your account page.</small>

      </fieldset>
      
      
         <fieldset style="display:none !important">
      <legend><h2>Discount Coupons</h2></legend>
      <label for="Coupon">Enter Coupon Code:</label>
      <input disabled="disabled" name="Coupon" id="Coupon" type="text" onblur="CouponFun();" value="<?php echo $row_result->Coupon;?>" />
      <input disabled="disabled" name="CouponDiscount" id="CouponDiscount" type="hidden" value="<?php echo $row_result->CouponDiscount;?>" />
      
   </fieldset>
      
      <fieldset style="display:none !important">
        <legend>
        <h2>Payment Detail</h2>
        </legend>
        
        <label for="NameasonCard">Name as on Card :</label>
        <input disabled="disabled" name="NameasonCard" id="NameasonCard" type="text" value="<?php echo $rows->NameasonCard;?>" />
        <br />
        <label for="CreditCard">Card Number:</label>
        <input disabled="disabled" name="CreditCard" id="CreditCard" type="text" value="<?php echo $rows->ccnumber;?>" />
        <br />
        <label for="NameonCard">Credit Card type:</label>
        <select disabled="disabled" name="NameonCard" id="NameonCard" >
         <option value="Visa" <?php if($rows->NameonCard=='Visa'){echo 'selected="selected"';}?>>Visa</option>
         <option value="MasterCard" <?php if($rows->NameonCard=='MasterCard'){echo 'selected="selected"';}?>>MasterCard</option>
         <option value="AmEx" <?php if($rows->NameonCard=='AmEx'){echo 'selected="selected"';}?>>American Express</option>
       <option value="Discover" <?php if($rows->NameonCard=='Discover'){echo 'selected="selected"';}?>>Discover</option>
       <!--
      	  <option value="CarteBlanche">Carte Blanche</option>
          <option value="DinersClub">Diners Club</option>
          <option value="Discover">Discover</option>
          <option value="EnRoute">enRoute</option>
          <option value="JCB">JCB</option>
          <option value="Maestro">Maestro</option>
          <option value="Solo">Solo</option>
          <option value="Switch">Switch</option>
          <option value="VisaElectron">Visa Electron</option>
          <option value="LaserCard">Laser</option>
        -->
        </select>
        <br />
        <label for="ExpiryDate">Expiry Date: YYYY-MM</label>
        <input disabled="disabled" name="ExpiryDate" id="ExpiryDate" type="text" value="<?php echo $rows->ExpiryDate;?>" />
        <br />
        <label for="CVV">CVV:</label>
        <input disabled="disabled" name="CVV" id="CVV" type="text" value="<?php echo $rows->CVV;?>" />
      </fieldset>
      <fieldset style="display:none !important">
        <legend>
        <h2>Charge Summary</h2>
        </legend>
        <?php echo $rows->Summary;?>
<textarea class="Summary" id="Summary" name="Summary" style="display:none"></textarea>
<input type="hidden" name="OrderAmount"    id="OrderAmount" />
<input type="hidden" name="CouponDiscountAmount" id="CouponDiscountAmount" />
<input type="hidden" name="DiscountAmount" id="DiscountAmount" />
<input type="hidden" name="AmountCharged"  id="AmountCharged" />
<input type="hidden" name="OrderType"      id="OrderType" value="Jewish E-Taile" />
      </fieldset>
      </span>
      <button type="submit" name="submit" class="btn btn-primary"  onclick="return validationFun()">Submit</button>
      <?php }?>
      
      </form>
              
		<form method="post" action="" name="copyform" id="copyform">	 
			<h2>Copy listing</h2>
			<div class="form-group">
				<label><strong>Select Directory:</strong></label><br/>
				<!--<label><input type="radio" name="directory" value="1" style="margin-right:10px;">Special Offers</label><br/> -->
				<label><input type="radio" name="directory" value="2" style="margin-right:10px;">Retailers</label><br/>
				<label><input type="radio" name="directory" value="3" style="margin-right:10px;">Local</label><br/>
				<label><input type="radio" name="directory" value="4" style="margin-right:10px;">Torah & Resources</label><br/>
				<label><input type="radio" name="directory" value="5" style="margin-right:10px;">Entertainment</label><br/>
				<label><input type="radio" name="directory" value="6" style="margin-right:10px;">Services</label><br/>
				<label><input type="radio" name="directory" value="7"style="margin-right:10px;">Seasonal</label><br/>
				<br/>
			 <input type="button" id="submit1" name="copy" class="btn btn-primary" value="Submit Directory"></input>
			 </div>
			 
         <!--   <div class="widget-content padded">
                  <form method="post">	-->
				<div id="new_category">
					<label for="Title">Select New Sub-Category</label>
					<select class="select2able" name="Category1" id="CategoryNew">
					<option value="">Please select</option>
					 <?php
					$query = "SELECT * FROM `categories` WHERE `Status`='1' AND  `UseFor`='7' ORDER By Title ASC";
					$result = $db->query($query);
					while ($row = $result->fetch_assoc()) 
					{	
					?>
					 <optgroup label="<?php echo $row['Title'];?>">
						<?php 
						$query2 = 'SELECT * FROM `sub-categories` where `Status`="1" AND `Cid`="'.$row['Id'].'"';
						$result2 = $db->query($query2);
						while ($row2 = $result2->fetch_assoc()) 
						{
						?>
						 <option value="<?php echo $row2['Id'];?>"><?php echo $row2['Title'];?></option>
						<?php }?>
					 </optgroup>
					<?php }?>
					</select>
				</div>
				<br/>
				<input type="button" id="submit2" name="copy" class="btn btn-primary" value="Copy Listing"></input>
				<div id="copy_query">
			</div>
		<!--</div> -->
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