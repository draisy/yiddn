<?php 
require_once('inc.files.php');
require_once('user-check.php'); 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title><?=$row_home->Title;?> - Entertainment Step 4</title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link href='http://fonts.googleapis.com/css?family=Comfortaa:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
<link href="css/inner.css" rel="stylesheet">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all" />
<link href="css/innermedia.css" rel="stylesheet">
<link href="css/dashboard.css" rel="stylesheet">
<link rel="stylesheet" href="css/newform.css" type="text/css" />
<link rel="stylesheet" href="css/dropdown.css" />
<link rel="stylesheet" href="css/alertbox.css" />
 <script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/creditcard.js"></script>
<script type="text/javascript" src="js/entertainment-step4.js"></script>

<script>

Number.prototype.format = function(n, x) {
    var re = '(\\d)(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$1,');
};

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
	
$("input").click(function(event) {
        updateTotal();
		$("#SummaryDivShow").show();
});
	
   $('#PaymentPlan').click(function(event) {
        updateTotal();
		$("#SummaryDivShow").show();
    });
	$("#SummaryDivShow").hide(); 
	
	
		$('#PaymentPlan').on('change', function() {
		$(".charge_summary").show(); 
			if ($(this).val()==10) {
				$('#TotalCost').val("Total charges: $xxx every 3 months");
			}else if ($(this).val()==20) {
				$('#TotalCost').val("Total charges: $xxx every six months");
			}else if ($(this).val()=='RECUR') {
				$('#TotalCost').val("Total charges: $xxx every months");
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
	total				= parseFloat(document.getElementById('total').value);
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
				DiscountAmount  	 = OrderAmount/100*10;
				TotalDis 			 = DiscountAmount + CouDiscountAmount;
				AmountCharged 		 = OrderAmount - TotalDis;
					}
			}
	$('#TotalCost').val("Order Total: $" + AmountCharged.format(2) + " every 3 months");
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
				DiscountAmount  	 = OrderAmount/100*20;
				TotalDis 			 = DiscountAmount + CouDiscountAmount;
				AmountCharged 		 = OrderAmount - TotalDis;
					}
			}
	$('#TotalCost').val("Order Total: $" + AmountCharged.format(2) + " every 6 months");
	}
		
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
				DiscountAmount  	 = OrderAmount/100*20;
				TotalDis 			 = DiscountAmount + CouDiscountAmount;
				AmountCharged 		 = OrderAmount - TotalDis;
					}
			}
	$('#TotalCost').val("Order Total: $" + AmountCharged.format(2) + " per month");
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
				DiscountAmount  	 = OrderAmount/100*20;
				TotalDis 			 = DiscountAmount + CouDiscountAmount;
				AmountCharged 		 = OrderAmount - TotalDis;
					}
			}
	$('#TotalCost').val("Order Total: $" + AmountCharged.format(2) + " One time");
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
document.getElementById('AmountCharged').value=AmountCharged;

	$('#amount').val(total.format());
	$('.Summary').html('Coupon Code: '+ CouponCode +'<br>Order Amount: $'+ OrderAmount.format(2) +'<br>Coupon Discount Amount: $'+ CouponDiscountAmount.format(2) +'<br>Discount Amount: $' + DiscountAmount.format(2) + '<br>Amount to be Charged: $'+ AmountCharged.format(2));
	totaltext = total.format(2);
	
}
	</script>

<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

   </head>
<body>	




<!--Header -->  
 <?php require_once('inc.header.php'); ?>
<!--/Header -->




   
 <!--Navigation -->
	<?php require_once('inc.navigation.php'); ?>
 <!--/Navigation -->


       <div class="cl">&nbsp;</div>

   	<section id="content-main" style="width:100%;">
    <div class="shell">
    
    <div id="main">
	<div id='article' style="width:90%;">
             <?php require_once('inc.dashboadlinks.php'); ?>
 <br>
<br>
<br><br>
  <h3>POST YOUR LISTING</span></h3>
     

       <?php 
	   if(isset($_SESSION['errors'])){
		echo '<h4>'. $_SESSION['errors'].'</h2>';
		unset( $_SESSION['errors']);
	   }
	   ?>
       <fieldset>
       <legend>
       <h4>STEP 4: Payment Information</h4>
       </legend>
<form enctype="multipart/form-data" class="newform" method="post" action="entertainment-step4-script">
<?php
$tb_entertainment = 'SELECT * FROM `tb_entertainment` WHERE `OrderId`="'.$_SESSION['OrderId'].'"';
$result = $db->query($tb_entertainment);
$total  = $result->num_rows;
$row = $result->fetch_assoc();
?>	       
    <br>
<input type="hidden" id="total" name="total" value="<?=$row['upgrade']+$row['Premium']+$row['upgrade2']+$row['Premium2']+$row['upgrade3']+$row['Premium3']?>">
<input type="hidden" id="CompanyName" name="CompanyName" value="<?=$row['CompanyName']?>">
<input type="hidden" id="City" name="City" value="<?=$row['City']?>">
<input type="hidden" id="Agent" name="Agent" value="<?=$row['Agent']?>">
<input type="hidden" id="Category" name="Category" value="<?=$row['Category']?>">
<input type="hidden" id="Description" name="Description" value="<?=$row['ShortDescription']?>">
<input type="hidden" id="Address" name="Address" value="<?=$row['CompanyAddress']?>">


 <fieldset class="newfiled">
    <legend><h5>Choose a Payment Plan</h5></legend>
    <div class="inputitem">
      <label class="title">You can save up to 20% by paying in advance!</label>
      <div class="item-cont">
        <select id="PaymentPlan" name="PaymentPlan">
        <option value="">Choose a payment plan</option>
        <option value="10">Get 10% OFF if paid quarterly</option>
        <option value="20">Get 20% OFF if paid half yearly</option>
        <option value="RECUR">Regular Charges as indicated - Charged every month</option>
        <option value="ONETIME">Only charge for one month</option>     
        </select> 
<input id="TotalCost" name="TotalCost" size="50" style="border:0px; width:auto; font-size:18px;"/><br><span class="purpule">Note:Unless cancelled, your subscriptions will be renewed at the selected rate. Subscriptions can be revised or cancelled at any time from your account page.
</span>
    </div>
    </div>
    
    
    
    
     </fieldset>
     
     <br>



 <fieldset class="newfiled">
    <legend><h5>Discount Coupons</h5></legend>
    <div class="inputitem">

<label class="title">Enter Coupon Code:<span class="small">(case sensitive)</span></label>
<input name="Coupon" id="Coupon" type="text"  />
<input type="button" value="Apply" onclick="return CouponFun();"  />
<input name="CouponDiscount" id="CouponDiscount" type="hidden" /><div class="clr">&nbsp;</div>
<span class="purpule">Coupon code expires after one-time use. It applies to the first payment of your selected billing cycle only.<div>&nbsp;</div></small>

       </div>
       
    </fieldset>
    
    <br>
    
 <fieldset class="newfiled" id="SummaryDivShow">
    <legend><h5>Charge Summary</h5></legend>
    <div class="inputitem">

<p class="Summary">Order Total: $xxx</p>
<textarea class="Summary" id="Summary" name="Summary" style="display:none"></textarea>
<input type="hidden" name="OrderAmount"        id="OrderAmount" />
<input type="hidden" name="CouponDiscountAmount" id="CouponDiscountAmount" />
<input type="hidden" name="DiscountAmount"     id="DiscountAmount" />
<input type="hidden" name="AmountCharged"  id="AmountCharged" />
<input type="hidden" name="OrderType"      id="OrderType" value="Ad Circular" />

</div>
       
    </fieldset>
    
    <br>
 <fieldset class="newfiled">
    <legend><h5>Payment Details</h5></legend>


  <div class="inputitem">
    <label class="title">Name as on Card:</label>
        <input name="NameasonCard" class="large" id="NameasonCard" type="text" />
    </div>
    
    
    <div class="inputitem">
    <label class="title">Card Number:</label>
        <input name="CreditCard" class="large" id="CreditCard" type="text" />
    </div>
    
     
     
     <div class="inputitem">
      <label class="title">Credit Card type:</label>
      <div class="item-cont">
 	   <select name="NameonCard" id="NameonCard" pattern="[4][0-9]{15}">
         <option value="Visa">Visa</option>
         <option value="MasterCard">MasterCard</option>
         <option value="AmEx">American Express</option>
         <option value="Discover">Discover</option>
       </select> 
 
    </div>
    </div>
 

    
    	<div class="inputname">
        <label class="title">Expiry Date:</label>
        <span class="nameFirst"> 
<select name="ExpMon" id="ExpMon" title="select a month" style="width:100px;float:left; margin-right:10px;"> 
        <option value="01">Jan</option> 
        <option value="02">Feb</option> 
        <option value="03">Mar</option>
        <option value="04">Apr</option> 
        <option value="05">May</option> 
        <option value="06">June</option> 
        <option value="07">July</option> 
        <option value="08">Aug</option> 
        <option value="09">Sept</option> 
        <option value="10">Oct</option> 
        <option value="11">Nov</option> 
        <option value="12">Dec</option> 
 </select>    
         </span><span class="nameLast"> 
<select name="ExpYear" id="ExpYear" title="select a year" style="width:100px;"> 
 	<?php for ($year = 2014; $year < 2025; $year++){
	 echo '<option value="'.$year.'">'.$year.'</option>';
	}?>
</select>
         </span></div>
		 <br>
         <div class="inputitem">
            <label class="title">CSV</label>
            <input class="small" name="CVV" id="CVV" type="text" />
        </div>
         <input name="step4"     value="4" id="step" type="hidden" />
         <input name="orderid"  value="<?=$_SESSION['OrderId']?>" id="orderid" type="hidden"  />
     </fieldset>
     
     
    
      <div class="submit">
         <input type="submit"  name="step4" onClick="return EntertainmentStep4s()" value="Submit"/>  
<input type="button" value="<< Previous" onclick="return confirmBack();" class="pre"/>      </div>
          

<script type="text/javascript">
   function confirmBack()
{
	Return = confirm("If you click on back button the data will be cleared?");
if (Return==true){
	window.location='update-entertainment-step3?i=<?=base64_encode($_SESSION['OrderId']);?>';
	
  }
}
</script>
    
      </form>
      </fieldset>
<script type="text/javascript" src="js/newform.js"></script>

       
     
   
     
         
         
         
           
         
         
           
         
         
          
         
         
          
         
        
                  
       
  	</div>
	</div>
    
    
    
	 
		
	</div>
 

</section>
 
   
    <div class="cl">&nbsp;</div>
                    
                    
                    

        
<!-- Footer -->
<?php require_once('inc.footer.php'); ?>
<!-- /Footer -->
      
         
 
        
 
 
 
  
<!-- Java Script -->       

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>
<script src="js/liquidmetal.js" type="text/javascript"></script>
<script src="js/jquery.flexselect.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("select.special-flexselect").flexselect({ hideDropdownOnEmptyInput: true });
        $("select.flexselect").flexselect();
        $("input:text:enabled:first").focus();
       /*$("form").submit(function() {
          alert($(this).serialize());
          return false;
        });*/
      });
</script>   
<script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="js\/1.7.2.jquery.min"><\/script>')</script>
<script src="js/modernizr.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/login.js"></script>
<script src="js/custom.js"></script>
<!-- Java Script -->



</body>
</html>