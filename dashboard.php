<?php 
require_once('inc.files.php');
require_once('user-check.php'); 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title><?=$row_home->Title;?> - Dashboard</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link href="css/inner.css" rel="stylesheet">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all" />
<link href="css/innermedia.css" rel="stylesheet">
<link href="css/dashboard.css" rel="stylesheet">
<link rel="stylesheet" href="css/dropdown.css" />
<link href='http://fonts.googleapis.com/css?family=Comfortaa:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
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
	<div id='article' style="width:92%;">
<?php
$query = "select * from `account` where `Id`= '".$_SESSION['Yiddn_login_Id']."' ";
$result = $db->query($query);
$row_account = $result->fetch_object();
$UserName =  ucwords($row_account->FirstName." ".$row_account->LastName);
?>    
   <h3>Dashboard - <span><?=$UserName;?></span></h3>
   <div class="main"><?php require_once('inc.dashboadlinks.php'); ?></div>
<br>
<br>
<br>

       <?php 
	   if(isset($_SESSION['success'])){
		echo '<h2 style="font-size:18px;">'. $_SESSION['success'].'</h2>';
		unset( $_SESSION['success']);
	   }
	   ?>
       
       
     
  <fieldset>
    <legend>
    <h4>Your Listings</h4>
    </legend>
       
  <table>
    <thead>
        <tr>
            <th width="15%">Order ID</th>
            <th width="15%">Order Date</th>
            <th width="17%">Listing Type</th>
            <th width="24%">Payment Plan</th>
             <th width="18%">Status</th>
             <th width="11%">Action</th>

        </tr>
    </thead>
<?php
$query = 'SELECT * FROM `order` WHERE `UserId`="'.$row_account->Id.'" AND  `Status`="Active"  ORDER By Id DESC';
$result = $db->query($query);
$total_results = $result->num_rows;
$count = 1;
while ($row = $result->fetch_object()){
if($row->OrderType =="Jewish E-Taile"){
	$tb = "tb_etailer";
	$page = "update-jewish-etailers-step";
}elseif($row->OrderType =="Services"){
	$tb = "tb_services";
	$page = "update-jewish-etailers-step";
}elseif($row->OrderType =="Local Directory"){
	$tb = "tb_local";
	$page = "update-local-directory-step";
	
}elseif($row->OrderType =="Torah & Resources"){
	$tb = "tb_torah_resources";
	$page = "update-torah-and-resources-step";
	
}elseif($row->OrderType =="Entertainment"){
	$tb = "tb_entertainment";
	$page = "update-entertainment-step";
	
}elseif($row->OrderType =="Ad Circular"){
	$tb = "tb_ad_circular";
	$page = "update-general-directory-step";
	
}
$query_tb   = "select * from `".$tb."` where `OrderId`= '".$row->OrderId."'";
$result_tb  = $db->query($query_tb);
$row_tb 	= $result_tb->fetch_array();
if($row_tb['PaymentPlan']=="10"){
$PaymentPlan ="$".number_format($row->AmountCharged,2)." Every 3 months";
}elseif($row_tb['PaymentPlan']=="20"){
$PaymentPlan ="$".number_format($row->AmountCharged,2)." Every 6 months";
}elseif($row_tb['PaymentPlan']=="RECUR"){
$PaymentPlan ="$".number_format($row->AmountCharged,2)." Per month";
}elseif($row_tb['PaymentPlan']=="ONETIME"){
$PaymentPlan ="$".number_format($row->AmountCharged,2)." Only one month";
}else{
$PaymentPlan ="Free";
}	
 $step = "";
 $step = $row_tb['step']  + 1;
  ?>
    <tr>
        <td data-title="Order ID"><?=$row->OrderId;?></td>
        <td data-title="Order Date"><?=date('d-M-Y',strtotime($row->OrderDate));?></td>
        <td data-title="Listing Type"><?php if($row->OrderType == "Jewish E-Taile"){echo "Retailers";}else{echo $row->OrderType;} ?></td>
        <td data-title="Payment Plan"><?=$PaymentPlan;?></td>
        <td data-title="Status"><?php if($row_tb['Status']=="0"){echo "Disabled";}else{echo "Enabled ";} ?></td>
    	<td data-title="Action">
    <a href="<?php echo $page.$step;?>?i=<?php echo base64_encode($row->OrderId);?>" class="listings">			    <img src="images/edit-icon.png" title="Edit" align="left" />
    </a>
    &nbsp;
    <a href="cancel?i=<?php echo base64_encode($row->OrderId);?>">
    <img src="images/cancel-icon.png" title="cancel" /></a>
    </td>
    </tr>
<?php }?>
</table>
   
   </fieldset>
     
         
         
         
           
         
         
           
         
         
          
         
         
          
         
        
                  
       
  	</div>
	</div>
    
    
    
	 
		
	</div>
 

</section>
 
   
    <div class="cl">&nbsp;</div>
                    
                    
                    

        
    
<!-- Footer -->
<?php require_once('inc.footer.php'); ?>
<!-- /Footer -->


          
 
        
 
 <!-- Java Script -->      
<?php require_once('inc.jsfiles.php'); ?>
 <!-- Java Script -->

</body>
</html>