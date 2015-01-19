<?php
require_once('../newsletter/email.php');
date_default_timezone_set('Etc/UTC');

require '../include/PHPMailerAutoload.php';
$errors = array();
$success = null;
$body    ='';
$headers ='';
$header  ='';
function ShowAdvertisement(){
	$key='';
	global $db;
	$query = 'SELECT * FROM `tb_ad_circular` ORDER By `Id_Ad_circular` DESC';
	$result = $db->query($query);
	$total_results = $result->num_rows;
	$count = 1;
		echo '
		  <table class="table table-bordered table-striped" id="dataTable1">
            <thead>
			<tr>
				<th colspan="5" style="background-image:none !important;color:#000 !important; cursor:default !important">
		<strong>Total '.$total_results.' record(s) found.</strong>
				</th>
			</tr>
			 <tr class="btn-primary">
			  <th>#</th>
              <th>Company Name</th>
			    <th width="100">City</th>
			  <th>Date Created </th>
			  <th>User ID</th>
              <th>Action</th>
			  <th style="display:none">OrderId</th>
           </tr>
		</thead><tbody>';
	if($total_results>0){	
	while ($row = $result->fetch_assoc()) 
	{
	echo '
	
		<tr>
		<td>'.$count++.'</td>
		<td>'.$row['CompanyName'].'</td>
		<td>';
		if($row['City']!=""){
$query_city = 'SELECT * FROM `city` where `Status`="1" AND `Id`="'.$row['City'].'"';
$result_city = $db->query($query_city);
$row_city = $result_city->fetch_assoc(); 
echo $row_city['City'];

$query_country = 'SELECT * FROM `country` where `Status`="1" AND `Id`="'.$row_city['CountryId'].'"';
$result_country = $db->query($query_country);
$row_country = $result_country->fetch_assoc(); 
echo " (".$row_country['Country'].")";
}
		
		echo'</td>
		<td>'.$row['DateAdded'].'</td>
		<td >';
if($row['UserId']!=""){
$query_account = 'SELECT * FROM `account` where `Status`="1" AND `Id`='.$row['UserId'];
$result_account = $db->query($query_account);
$row_account = $result_account->fetch_assoc(); 
echo $row_account['EmailAddress'];
}
		echo '</td>
		<td>
  	    <a class="table-actions" data-toggle="modal" href="#myModal-'.$row['Id_Ad_circular'].'" title="View"><i class="icon-list-alt"></i></a>
		<a class="table-actions" href="adcircular?y='.base64_encode($row['Id_Ad_circular']).'&ac='.$row['Status'].'&u='.$row['UserId'].'" title="Status">';
		if($row['Status']=="1"){
			echo '<i class="icon-ok" style="color:#009900" Title="approve"></i>';
		 }else{
			echo '<i class="icon-ok" style="color:#FF0000" Title="Reject"></i>';
		}
   echo '</a>
      <a class="table-actions" href="edit-adcircular?i='.base64_encode($row['Id_Ad_circular']).'" title="Edit">  <i class="icon-pencil"></i></a>

		<a class="table-actions" href="adcircular?y='.base64_encode($row['Id_Ad_circular']).'&oid='.$row['OrderId'].'" title="Delete" onclick="return confirmDelete();"><i class="icon-trash"></i></a></td>
		<td style="display:none">'.$row['OrderId'].'</td>
		</tr>
	
	';
	echo '<div class="modal fade" id="myModal-'.$row['Id_Ad_circular'].'">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button aria-hidden="true" class="close" data-dismiss="modal" type="button">×</button>
                  <h4 class="modal-title">Ad Circular </h4>
                </div>
                <div class="modal-body">
				<div class="row">
<div class="col-sm-12">
	<div class="alert alert-info">
		<strong>Enter Ad details</strong>
	</div>
</div>

<div class="col-sm-12">

<div class="col-sm-6">
<strong>Category: </strong>';
if($row['Category1']!=""){
$query_category = 'SELECT * FROM `sub-categories` where `Status`="1" AND `Id`='.$row['Category1'];
$result_category = $db->query($query_category);
$row_category = $result_category->fetch_assoc(); 
echo $row_category['Title'];
}
echo '</div>

<div class="col-sm-6">
<strong>Another Category: </strong>';
if($row['Category2']!=""){
$query_category = 'SELECT * FROM `sub-categories` where `Status`="1" AND `Id`='.$row['Category2'];
$result_category = $db->query($query_category);
$row_category = $result_category->fetch_assoc(); 
echo $row_category['Title'];
}
echo '</div>

</div>
<div class="col-sm-12">

<div class="col-sm-6">
<strong>Ad Title: </strong>'.$row['AdTitle'].'  
</div>
<div class="col-sm-6">
	<strong>Ad URL: </strong>'.$row['AdURL'].'
</div>

</div>

<div class="col-sm-12">
<div class="col-sm-6">
	<strong>Address: </strong>'.$row['Address'].'  
</div>
<div class="col-sm-6">
	<strong>Description:   </strong>'.$row['Description'].'
</div>
</div>
<div class="clearfix">&nbsp;</div>

<div class="col-sm-12">

<div class="col-sm-6">
	<strong>Agent:  </strong>'.$row['Agent'].'   
</div>

<div class="col-sm-6">
	<strong>CompanyKeywords: </strong>'.$row['CompanyKeywords'].'
</div>

</div>

<div class="clearfix">&nbsp;</div>
<div class="col-sm-12">
	<strong>Telephone:  </strong>'.$row['Telephone'].'   
</div>

<div class="clearfix">&nbsp;</div>
<div class="col-sm-12">
	<div class="alert alert-info">
		<strong>Where do you want your ad to show?</strong>
	</div>
</div>
			  
			 
<div class="col-sm-12">
<strong>Large Top Banner:  </strong>
	<br>';
	if($row['Banner']!=""){
	echo '<img src="../images/Banner/'.$row['Banner'].'" style="max-width:300px;">';
	}else{echo "N/A.";}
echo '
</div>';

	echo '<div class="col-sm-12">
	<strong>Small Top Banner :  </strong>
	<br>';
	if($row['Banner3']!=""){
	echo '<img src="../images/Banner/'.$row['Banner3'].'" style="max-width:300px;">';
	}else{echo "N/A.";}
echo '
</div>';

	echo '<div class="col-sm-12">
	<strong>Standard Ad spot:  </strong>
	<br>';
	if($row['Banner2']!=""){
	echo '<img src="../images/Banner/'.$row['Banner2'].'" style="max-width:300px;">';
	}else{echo "N/A.";}
echo '
</div>

<hr>

<div class="col-sm-12">
	<div class="alert alert-info">
		<strong>Choose a Payment Plan</strong>
	</div>
</div>

<div class="col-sm-12">
	<strong>Payment Plan: </strong>';
	
$query_order = 'SELECT * FROM `order` WHERE `OrderId`= "'.$row['OrderId'].'"  AND `OrderId`!="" ';
$result_order = $db->query($query_order);
$total_results = $result_order->num_rows;
if($total_results>0){
$row_order = $result_order->fetch_object();

	if($row['PaymentPlan']=="10"){
	  $PaymentPlan ="$".number_format($row_order->AmountCharged,2)." Every 3 months";
	}elseif($row['PaymentPlan']=="20"){
	  $PaymentPlan ="$".number_format($row_order->AmountCharged,2)." Every 6 months";
	}elseif($row['PaymentPlan']=="RECUR"){
	  $PaymentPlan ="$".number_format($row_order->AmountCharged,2)." Per month";
	}elseif($row['PaymentPlan']=="ONETIME"){
	  $PaymentPlan ="$".number_format($row_order->AmountCharged,2)." Only one month";
	}else{
		 $PaymentPlan ="Free";
	}
	echo  $PaymentPlan;
}else{echo "Free";}
	echo'
</div>

<div class="col-sm-12">
	<div class="alert alert-info">
		<strong>Discount Coupons</strong>
	</div>
</div>

<div class="col-sm-12">
	<strong>Enter Coupon Code: </strong>'.$row_order->CouponCode.'
</div>




<div class="col-sm-12">
	<div class="alert alert-info">
		<strong>Payment Detail</strong>
	</div>
</div>

<div class="col-sm-6">
	<strong>Name as on Card: </strong>'.$row_order->NameasonCard.'
</div>

<div class="col-sm-6">
	<strong>Card Number: </strong>'.$row_order->ccnumber.'
</div>

<div class="col-sm-6">
	<strong>Credit Card type: </strong>'.$row_order->NameonCard.'
</div>

<div class="col-sm-6">
	<strong>Expiry Date: </strong>'.$row_order->ExpiryDate.'
</div>


<div class="col-sm-12">
	<strong>CVV: </strong>'.$row_order->CVV.'
</div>

<div class="col-sm-12">
	<div class="alert alert-info">
		<strong>Summary</strong>
	</div>
</div>

<div class="col-sm-6">
	';
	if($total_results>0){
	echo $row_order->Summary;
	}else{
	echo 'N/A';
	}
echo'
</div>


<div class="col-sm-6">
<strong>Status: </strong>';
if($row['Status']=="1"){
echo "Enable";
}else{
echo "Disable ";
}
echo '  </div>

<div class="col-sm-6"><strong>Date Created: </strong>'.$row['DateAdded'].'  </div>
				 </div>
				 </div>
 				 <div class="modal-footer">
                  <button class="btn btn-primary" data-dismiss="modal" type="button">Close</button>
                </div>
              </div>
            </div>
          </div>';
	}
   }		echo'</tbody></table>';
}
if(isset($_GET['y'])&& !isset($_GET['ac'])){	
		$id = base64_decode($_GET['y']);
		$delete = "delete from `tb_ad_circular` where `Id_Ad_circular` = $id";
		$run = mysqli_query($db, $delete);
		$delete = "delete from `order` where `OrderId` ='".$_GET['oid']."'";
		$run = mysqli_query($db, $delete);
		if($run==0){
		$errors[] ="Please Try again.";
		@header( "refresh:0;adcircular");
		}else
		{
		$success.= "Record has been successfully deleted.";
		@header("refresh:0;url=adcircular");
		}
}
if(isset($_GET['y'])&& isset($_GET['ac'])){	
		$id = base64_decode($_GET['y']);
		$action = $_GET['ac'];

		if($action== "1"){
		$insert = "UPDATE `tb_ad_circular` SET `Status`='0' where  `Id_Ad_circular`='".$id."' ";
		$result = $db->query($insert);
		// Procedural way
		$run = mysqli_query($db, $insert);
///Start Email
$UserId = $_GET['u'];
$select = "SELECT * FROM `account` where `Id`='".$UserId."' ";
$run = mysqli_query($db, $select);
$row = $run->fetch_assoc();
$Email = $row['EmailAddress']; 
$ip      = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
$parts = explode('@', $Email);
$username = $parts[0];
$body .='<div dir="ltr" style="width:600px;"><table width="600" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top">';
		$body .= $inc_header;
		$body .='
	</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  
     <tr><td><strong>Dear '.$row['FirstName'].',</strong></td></tr>
  <tr>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td>
	<p>Yaasher  Koach for your input! We appreciate every suggestion for and from our fellow  Yiddn. <br />
  <br />
  Your  submission has been reviewed, but unfortunately it does not meet our specific  guidelines at this time. Please try again and we hope to hear from you soon. <br />
  <br />
  Need  some help? Don&#39;t hesitate to contact us to walk you through it. <br />
  <br />
L&#39;hitraot!</p>
</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  
  <tr>
    <td>your fellow yiddn</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
   <tr>
    <td align="left" valign="top">';
	$body .= $inc_footer;
	$body .='
	</td>
  </tr>
</table></div>';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet =  'UTF-8';
$mail->Host       = "smtp.gmail.com";      
$mail->SMTPDebug  = 0;
$mail->SMTPAuth   = true;                 
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->IsHTML(true);
$mail->Username   = "noreply@yiddn.com";  
$mail->Password   = "sabelefg";
// These should be dynamic
$mail->setFrom($row_home->EmailFrom, $row_home->Title);
$mail->addReplyTo($row_home->EmailTo, $row_home->Title);
$mail->addAddress($Email, $row_home->Title); 
$mail->Subject = "AdCircular  - Reject Your Request - ".$row_home->Title;
$mail->Body=$body;
		if($mail->send()){
			///End Email
		$_SESSION["success"] = "Reject Successfully.";	
			if(isset($_GET['o'])){
		echo "<script>window.open('orders','_self')</script>";
				}else{
		echo "<script>window.open('adcircular','_self')</script>";
				}
			}
		}
		elseif($action== "Inactive"){
		$insert = "UPDATE `tb_ad_circular` SET `Status`='1' where `Id_Ad_circular`='".$id."' ";
		$result = $db->query($insert);
		$row = $run->fetch_assoc();
		// Procedural way
		$run = mysqli_query($db, $insert);
		$_SESSION["success"] = "Enable Successfully.";	
///Start Email
$UserId = $_GET['u'];
$select = "SELECT * FROM `account` where `Id`='".$UserId."' ";
$run = mysqli_query($db, $select);
$row = $run->fetch_assoc();

$info 	  = "SELECT * FROM `tb_ad_circular` where `Id_Ad_circular`= '".$id."'";
$run_info = mysqli_query($db, $info);
$row_info = $run_info->fetch_assoc();

$Email = $row['EmailAddress']; 
$ip      = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
$parts = explode('@', $Email);
$username = $parts[0];
$body .='<div dir="ltr" style="width:600px;"><table width="600" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top">';
		$body .= $inc_header;
		$body .='
	</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr><td><strong>Dear '.$row['FirstName'].',</strong></td></tr>

  <tr>
    <td><p>L&#39;chayim&#33; Your listing has been approved&#33;  Join us for a quick round of the hora?</p> </td>
  </tr>

  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td width="43%" valign="top"><strong>OrderId</strong></td>
        <td width="57%">'.$row_info['OrderId'].'</td>
      </tr>
      <tr>
        <td valign="top"><strong>Company Name</strong></td>
         <td>'.$row_info['CompanyName'].'</td>
      </tr>
	  <tr>
        <td valign="top"><strong>Category 1</strong></td>
        <td>';
if($row_info['Category']!=""){
$query_subcat = 'SELECT * FROM `sub-categories` where `Status`="1" AND `Id`='.$row_info['Category1'];
$result_subcat = $db->query($query_subcat);
$row_subcat = $result_subcat->fetch_assoc(); 
$body .= $row_subcat['Title'];
}
$body .='</td>
      </tr>
	   <tr>
        <td valign="top"><strong>Category 2</strong></td>
      <td>';
if($row_info['Category2']!=""){
$query_subcat = 'SELECT * FROM `sub-categories` where `Status`="1" AND `Id`='.$row_info['Category2'];
$result_subcat = $db->query($query_subcat);
$row_subcat = $result_subcat->fetch_assoc(); 
$body .= $row_subcat['Title'];
}
$body .='</td>
      </tr>
      <tr>
        <td valign="top"><strong>AdTitle</strong></td>
        <td>'.$row_info['AdTitle'].'</td>
      </tr>
      <tr>
        <td valign="top"><strong>AdURL</strong></td>
        <td>'.$row_info['AdURL'].'</td>
      </tr>
      <tr>
        <td valign="top"><strong>Address</strong></td>
        <td>'.$row_info['Address'].'</td>
      </tr>
      <tr>
        <td valign="top"><strong>Description</strong></td>
     	<td>'.$row_info['Description'].'</td>
      </tr>
      <tr>
         <td valign="top"><strong>Agent</strong></td>
         <td>'.$row_info['Agent'].'</td>
      </tr>
      <tr>
        <td valign="top"><strong>Company Keywords</strong></td>
        <td>'.$row_info['CompanyKeywords'].'</td>
      </tr>
	  <tr>
        <td valign="top"><strong> Large Top Banner - $2499.00 / month (Pinned at top of the page).</strong></td>
        <td>';
		if($row_info['large']!=""){
			$body .= "Yes";
			}else{
			$body .="No";
			}
		$body .= '</td>
      </tr>
	  <tr>
        <td valign="top"><strong>Banner 1</strong></td>
       		<td>';
	if($row_info['Banner']!=""){
	 $body  .= '<img src="http://www.yiddn.com/images/Banner/'.$row_info['Banner'].'" style="max-width:200px;">';
	}else{$body .= "N/A.";}
	 $body .= '</td>
      </tr>
	  <tr>
        <td valign="top"><strong>Small Top Banner   - $1249.00 / month (Pinned at top of the page).</strong></td>
       <td>';
		if($row_info['small']!=""){
			$body .= "Yes";
			}else{
			$body .= "No";
			}
		$body .= '</td>
      </tr>
	   <tr>
        <td valign="top"><strong>Banner 3</strong></td>
       		<td>';
	if($row_info['Banner3']!=""){
	 $body  .= '<img src="http://www.yiddn.com/images/Banner/'.$row_info['Banner3'].'" style="max-width:200px;">';
	}else{$body .= "N/A.";}
	 $body .= '</td>
      </tr>
	   <tr>
        <td valign="top"><strong>Standard Ad spot  - $499.00 / month .</strong></td>
       <td>';
		if($row_info['stantard']!=""){
			$body .= "Yes";
			}else{
			$body .= "No";
			}
		$body .= '</td>
      </tr>
	   <tr>
        <td valign="top"><strong>Banner 2</strong></td>
       		<td>';
	if($row_info['Banner2']!=""){
	 $body  .= '<img src="http://www.yiddn.com/images/Banner/'.$row_info['Banner2'].'" style="max-width:200px;">';
	}else{$body .= "N/A.";}
	 $body .= '</td>
      </tr>
	  
	   <tr>
        <td valign="top"><strong>City</strong></td>
        <td>';
if($row_info['City']!=""){
$query_city = 'SELECT * FROM `city` where `Status`="1" AND `Id`='.$row_info['City'];
$result_city = $db->query($query_city);
$row_city= $result_city->fetch_assoc(); 
$body .= $row_city['City'];
}
$body .='</td>
      </tr>
	  	  <tr>
        <td valign="top"><strong>Payment Plan</strong></td>
        <td>';
$query_order = 'SELECT * FROM `order` WHERE `OrderId`= "'.$row_info['OrderId'].'"  AND `OrderId`!="" ';
$result_order = $db->query($query_order);
$total_results = $result_order->num_rows;
if($total_results>0){
$row_order = $result_order->fetch_object();
	if($row_info['PaymentPlan']=="10"){
	  $PaymentPlan ="$".number_format($row_order->AmountCharged,2)." Every 3 months";
	}elseif($row_info['PaymentPlan']=="20"){
	  $PaymentPlan ="$".number_format($row_order->AmountCharged,2)." Every 6 months";
	}elseif($row_info['PaymentPlan']=="RECUR"){
	  $PaymentPlan ="$".number_format($row_order->AmountCharged,2)." Per month";
	}elseif($row_info['PaymentPlan']=="ONETIME"){
	  $PaymentPlan ="$".number_format($row_order->AmountCharged,2)." Only one month";
	}else{
		 $PaymentPlan ="Free";
	}
	$body .=  $PaymentPlan;
}else{$body .= "Free";
}
	
		$body .='</td>
      </tr>
	  <tr>
        <td valign="top"><strong>Summary</strong></td>
       <td>';
		if($total_results>0){
			$body .=$row_order->Summary;	
		}else{
			$body .="N/A";
			}
		$body .='</td>
      </tr>
    </table></td>
  </tr>
  
  
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  <tr>
    <td>your fellow yiddn</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
   <tr>
    <td align="left" valign="top">';
	$body .= $inc_footer;
	$body .='
	</td>
  </tr>
</table></div>';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';
$mail->Host       = "smtp.gmail.com";      
$mail->SMTPDebug  = 0;
$mail->SMTPAuth   = true;                 
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->IsHTML(true);
$mail->Username   = "noreply@yiddn.com";  
$mail->Password   = "sabelefg";
// These should be dynamic
$mail->setFrom($row_home->EmailFrom, $row_home->Title);
$mail->addReplyTo($row_home->EmailTo, $row_home->Title);
$mail->addAddress($Email, $row_home->Title); 
$mail->Subject = "Your listing has been approved - AdCircular - ".$row_home->Title;
$mail->Body=$body;
		if($mail->send()){
			///End Email
		$_SESSION["success"] = "Approved Successfully.";	
			if(isset($_GET['o'])){
		echo "<script>window.open('orders','_self')</script>";
				}else{
		echo "<script>window.open('adcircular','_self')</script>";
				}
		
			}	
		}else{
		$insert = "UPDATE `tb_ad_circular` SET `Status`='1' where  `Id_Ad_circular`='".$id."'";
		$result = $db->query($insert);
		$run = mysqli_query($db, $insert);
///Start Email
$UserId = $_GET['u'];
$select = "SELECT * FROM `account` where `Id`='".$UserId."' ";
$run = mysqli_query($db, $select);
$row = $run->fetch_assoc();
$info 	  = "SELECT * FROM `tb_ad_circular` where `Id_Ad_circular`= '".$id."'";
$run_info = mysqli_query($db, $info);
$row_info = $run_info->fetch_assoc();
$Email = $row['EmailAddress']; 
$ip      = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
$parts = explode('@', $Email);
$username = $parts[0];
$body .='<div dir="ltr" style="width:600px;"><table width="600" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top">';
		$body .= $inc_header;
		$body .='
	</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
   <tr><td><strong>Dear '.$row['FirstName'].',</strong></td></tr>

  <tr>
    <td><p>L&#39;chayim&#33; Your listing has been approved&#33;  Join us for a quick round of the hora?</p> </td>
  </tr>

  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td width="43%" valign="top"><strong>OrderId</strong></td>
        <td width="57%">'.$row_info['OrderId'].'</td>
      </tr>
      <tr>
        <td valign="top"><strong>Company Name</strong></td>
         <td>'.$row_info['CompanyName'].'</td>
      </tr>
	  <tr>
        <td valign="top"><strong>Category 1</strong></td>
        <td>';
if($row_info['Category']!=""){
$query_subcat = 'SELECT * FROM `sub-categories` where `Status`="1" AND `Id`='.$row_info['Category1'];
$result_subcat = $db->query($query_subcat);
$row_subcat = $result_subcat->fetch_assoc(); 
$body .= $row_subcat['Title'];
}
$body .='</td>
      </tr>
	   <tr>
        <td valign="top"><strong>Category 2</strong></td>
      <td>';
if($row_info['Category2']!=""){
$query_subcat = 'SELECT * FROM `sub-categories` where `Status`="1" AND `Id`='.$row_info['Category2'];
$result_subcat = $db->query($query_subcat);
$row_subcat = $result_subcat->fetch_assoc(); 
$body .= $row_subcat['Title'];
}
$body .='</td>
      </tr>
      <tr>
        <td valign="top"><strong>AdTitle</strong></td>
        <td>'.$row_info['AdTitle'].'</td>
      </tr>
      <tr>
        <td valign="top"><strong>AdURL</strong></td>
        <td>'.$row_info['AdURL'].'</td>
      </tr>
      <tr>
        <td valign="top"><strong>Address</strong></td>
        <td>'.$row_info['Address'].'</td>
      </tr>
      <tr>
        <td valign="top"><strong>Description</strong></td>
     	<td>'.$row_info['Description'].'</td>
      </tr>
      <tr>
         <td valign="top"><strong>Agent</strong></td>
         <td>'.$row_info['Agent'].'</td>
      </tr>
      <tr>
        <td valign="top"><strong>Company Keywords</strong></td>
        <td>'.$row_info['CompanyKeywords'].'</td>
      </tr>
	  <tr>
        <td valign="top"><strong> Large Top Banner - $2499.00 / month (Pinned at top of the page).</strong></td>
        <td>';
		if($row_info['large']!=""){
			$body .= "Yes";
			}else{
			$body .="No";
			}
		$body .= '</td>
      </tr>
	  <tr>
        <td valign="top"><strong>Banner 1</strong></td>
       		<td>';
	if($row_info['Banner']!=""){
	 $body  .= '<img src="http://www.yiddn.com/images/Banner/'.$row_info['Banner'].'" style="max-width:200px;">';
	}else{$body .= "N/A.";}
	 $body .= '</td>
      </tr>
	  <tr>
        <td valign="top"><strong>Small Top Banner   - $1249.00 / month (Pinned at top of the page).</strong></td>
       <td>';
		if($row_info['small']!=""){
			$body .= "Yes";
			}else{
			$body .= "No";
			}
		$body .= '</td>
      </tr>
	   <tr>
        <td valign="top"><strong>Banner 3</strong></td>
       		<td>';
	if($row_info['Banner3']!=""){
	 $body  .= '<img src="http://www.yiddn.com/images/Banner/'.$row_info['Banner3'].'" style="max-width:200px;">';
	}else{$body .= "N/A.";}
	 $body .= '</td>
      </tr>
	   <tr>
        <td valign="top"><strong>Standard Ad spot  - $499.00 / month .</strong></td>
       <td>';
		if($row_info['stantard']!=""){
			$body .= "Yes";
			}else{
			$body .= "No";
			}
		$body .= '</td>
      </tr>
	   <tr>
        <td valign="top"><strong>Banner 2</strong></td>
       		<td>';
	if($row_info['Banner2']!=""){
	 $body  .= '<img src="http://www.yiddn.com/images/Banner/'.$row_info['Banner2'].'" style="max-width:200px;">';
	}else{$body .= "N/A.";}
	 $body .= '</td>
      </tr>
	  
	   <tr>
        <td valign="top"><strong>City</strong></td>
        <td>';
if($row_info['City']!=""){
$query_city = 'SELECT * FROM `city` where `Status`="1" AND `Id`='.$row_info['City'];
$result_city = $db->query($query_city);
$row_city= $result_city->fetch_assoc(); 
$body .= $row_city['City'];
}
$body .='</td>
      </tr>
	  	  <tr>
        <td valign="top"><strong>Payment Plan</strong></td>
        <td>';
$query_order = 'SELECT * FROM `order` WHERE `OrderId`= "'.$row_info['OrderId'].'"  AND `OrderId`!="" ';
$result_order = $db->query($query_order);
$total_results = $result_order->num_rows;
if($total_results>0){
$row_order = $result_order->fetch_object();
	if($row_info['PaymentPlan']=="10"){
	  $PaymentPlan ="$".number_format($row_order->AmountCharged,2)." Every 3 months";
	}elseif($row_info['PaymentPlan']=="20"){
	  $PaymentPlan ="$".number_format($row_order->AmountCharged,2)." Every 6 months";
	}elseif($row_info['PaymentPlan']=="RECUR"){
	  $PaymentPlan ="$".number_format($row_order->AmountCharged,2)." Per month";
	}elseif($row_info['PaymentPlan']=="ONETIME"){
	  $PaymentPlan ="$".number_format($row_order->AmountCharged,2)." Only one month";
	}else{
		 $PaymentPlan ="Free";
	}
	$body .=  $PaymentPlan;
}else{$body .= "Free";
}
	
		$body .='</td>
      </tr>
	  <tr>
        <td valign="top"><strong>Summary</strong></td>
       <td>';
		if($total_results>0){
			$body .=$row_order->Summary;	
		}else{
			$body .="N/A";
			}
		$body .='</td>
      </tr>
    </table></td>
  </tr>
  
  
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  <tr>
    <td>your fellow yiddn</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
   <tr>
    <td align="left" valign="top">';
	$body .= $inc_footer;
	$body .='
	</td>
  </tr>
</table></div>';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';
$mail->Host       = "smtp.gmail.com";      
$mail->SMTPDebug  = 0;
$mail->SMTPAuth   = true;                 
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->IsHTML(true);
$mail->Username   = "noreply@yiddn.com";  
$mail->Password   = "sabelefg";
// These should be dynamic
$mail->setFrom($row_home->EmailFrom, $row_home->Title);
$mail->addReplyTo($row_home->EmailTo, $row_home->Title);
$mail->addAddress($Email, $row_home->Title); 
$mail->Subject = "Your listing has been approved - AdCircular - ".$row_home->Title;
$mail->Body=$body;
		if($mail->send()){
			///End Email
		$_SESSION["success"] = "Approved Successfully.";	
			if(isset($_GET['o'])){
		echo "<script>window.open('orders','_self')</script>";
				}else{
		echo "<script>window.open('adcircular','_self')</script>";
				}
		
			}
		}
	}?>
<script>
function confirmDelete()
{
return confirm("Are you sure you want to delete this Ad Circular?");
}
</script> 