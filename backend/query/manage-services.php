<?php
require_once('../newsletter/email.php');
$errors = array();
$success = null;
$body    ='';
$headers ='';
$header  ='';
function ShowServicesDirectory(){
	$key='';
	global $db;
	$query = 'SELECT * FROM `tb_services` ORDER By `Id_Services`  DESC ';
	$result = $db->query($query);
	$total_results = $result->num_rows;
	$count = 1;
		echo '
		  <table class="table table-bordered table-striped" id="dataTable1">
            <thead>
			<tr>
				<th colspan="6" style="background-image:none !important;color:#000 !important; cursor:default !important">
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
  	    <a class="table-actions" data-toggle="modal" href="#myModal-'.$row['Id_Services'].'" title="View"><i class="icon-list-alt"></i></a>
		
		<a class="table-actions" href="services?y='.base64_encode($row['Id_Services']).'&ac='.$row['Status'].'&u='.$row['UserId'].'" title="Status">';
		if($row['Status']=="1"){
			echo '<i class="icon-ok" style="color:#009900" Title="approve"></i>';
		 }else{
			echo '<i class="icon-ok" style="color:#FF0000" Title="Reject"></i>';
		}
   echo '</a>
   <a class="table-actions" href="edit-services?i='.base64_encode($row['Id_Services']).'" title="Edit">  <i class="icon-pencil"></i></a>
		
 
		<a class="table-actions" href="services?y='.base64_encode($row['Id_Services']).'&oid='.$row['OrderId'].'"  title="Delete" onclick="return confirmDelete();"><i class="icon-trash"></i></a></td>
		</tr>
	
	';
	echo '<div class="modal fade" id="myModal-'.$row['Id_Services'].'">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button aria-hidden="true" class="close" data-dismiss="modal" type="button">×</button>
                  <h4 class="modal-title">Services</h4>
                </div>
                <div class="modal-body">
				<div class="row">
<div class="col-sm-12">
	<div class="alert alert-info">
		<strong>Enter Ad details</strong>
	</div>
</div>

<div class="col-sm-6">
<strong>Company Name: </strong>'.$row['CompanyName'].'  
</div>

<div class="col-sm-6">
	<strong>Company Address: </strong>'.$row['CompanyAddress'].'  
</div>

<div class="col-sm-6">
	<strong>Company Email:   </strong>'.$row['CompanyEmail'].'   
</div>

<div class="col-sm-6">
	<strong>Company Website: </strong>'.$row['CompanyWebsite'].'
</div>

<div class="col-sm-12">
<strong>Company Logo:</strong>';
if($row['CompanyLogo']!=""){
echo '<br><img src="../images/CompanyLogo/'.$row['CompanyLogo'].'" style="max-width:300px;">';
}else{
	echo "N/A.";
	}
echo '</div>

<div class="col-sm-6">
	<strong>Short Description: </strong>'.$row['ShortDescription'].'  		  </div>

<div class="col-sm-6">
	<strong>Description:   </strong>'.$row['Description'].'
</div>

<div class="col-sm-6">
	<strong>Agent:  </strong>'.$row['Agent'].'   
</div>

<div class="col-sm-6">
	<strong>CompanyKeywords: </strong>'.$row['CompanyKeywords'].'
</div>

<div class="col-sm-12">
	<strong>CompanyWebsite:      </strong>'.$row['CompanyWebsite'].'
</div>

<div class="col-sm-12">
	<div class="alert alert-info">
		<strong>Where do you want your ad to show?</strong>
	</div>
</div>
			  
			 

<div class="col-sm-6">
<strong>Category 1: </strong>';
if($row['Category']!=""){
$query_category = 'SELECT * FROM `sub-categories` where `Status`="1" AND `Id`='.$row['Category'];
$result_category = $db->query($query_category);
$row_category = $result_category->fetch_assoc(); 
echo $row_category['Title'];
}
echo '</div>
<div class="col-sm-6">
	<strong>Upgrade: </strong>';
	if($row['upgrade']!="" && $row['upgrade']!="N/A."){
        echo $row['upgrade'];
	}else{
		echo "No";
	}
	echo '
</div>
 <div class="clearfix"></div>
<div class="col-sm-12">
	<strong>Premium: </strong>$';
	if($row['Premium']!=""){
		echo number_format($row['Premium'],2);
		}else{
		echo "0.00";
	}
	echo'
</div>
<div class="col-sm-12">
	<strong>Banner:  </strong>
	<br>';
	if($row['Banner']!=""){
	echo '<img src="../images/Banner/'.$row['Banner'].'" style="max-width:300px;">';
	}else{echo "N/A.";}
echo '</div>

<hr>


<div class="col-sm-6">
<strong>Category 2: </strong>';
if($row['Category2']!=""){
$query_category = 'SELECT * FROM `sub-categories` where `Status`="1" AND `Id`='.$row['Category2'];
$result_category = $db->query($query_category);
$row_category = $result_category->fetch_assoc(); 
echo $row_category['Title'];
}
echo '</div>
<div class="col-sm-6">
	<strong>Upgrade: </strong>';
	if($row['upgrade2']!="" && $row['upgrade2']!="N/A."){
        echo $row['upgrade2'];
	}else{
		echo "No";
	}
	echo '
</div>
 <div class="clearfix"></div>
<div class="col-sm-12">
	<strong>Premium: </strong>$';
	if($row['Premium2']!=""){
		echo number_format($row['Premium2'],2);
		}else{
		echo "0.00";
	}
	echo'
</div>
<div class="col-sm-12">
	<strong>Banner:  </strong>
	<br>';
	if($row['Banner2']!=""){
	echo '<img src="../images/Banner/'.$row['Banner2'].'" style="max-width:300px;">';
	}else{echo "N/A.";}
echo '
</div>

<hr>


<div class="col-sm-6">
<strong>Category 3: </strong>';
if(mysqli_real_escape_string($db,$row['Category3'])!=""){
$query_category = 'SELECT * FROM `sub-categories` where `Status`="1" AND `Id`='.mysqli_real_escape_string($db,$row['Category3']);
$result_category = $db->query($query_category);
$row_category = $result_category->fetch_assoc(); 
echo mysqli_real_escape_string($db,$row_category['Title']);
}
echo '</div>
<div class="col-sm-6">
	<strong>Upgrade: </strong>';
	if($row['upgrade3']!="" && $row['upgrade3']!="N/A."){
        echo $row['upgrade3'];
	}else{
		echo "No";
	}
	echo '
</div>
 <div class="clearfix"></div>
<div class="col-sm-12">
	<strong>Premium: </strong>$';
	if($row['Premium3']!=""){
		echo number_format($row['Premium3'],2);
		}else{
		echo "0.00";
	}
	echo'
</div>
<div class="col-sm-12">
	<strong>Banner:  </strong>
	<br>';
	if($row['Banner3']!=""){
	echo '<img src="../images/Banner/'.$row['Banner3'].'" style="max-width:300px;">';
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
	  $PaymentPlan ="$".$row_order->AmountCharged." Every 3 months";
	}elseif($row['PaymentPlan']=="20"){
	  $PaymentPlan ="$".$row_order->AmountCharged." Every 6 months";
	}elseif($row['PaymentPlan']=="RECUR"){
	  $PaymentPlan ="$".$row_order->AmountCharged." Per month";
	}elseif($row['PaymentPlan']=="ONETIME"){
	  $PaymentPlan ="$".$row_order->AmountCharged." Only one month";
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
		$delete = "delete from `tb_services` where `Id_Services` = $id";
		$run = mysqli_query($db, $delete);
		$delete = "delete from `order` where `OrderId` ='".$_GET['oid']."'";
		$run = mysqli_query($db, $delete);
		if($run==0){
		$errors[] ="Please Try again.";
		@header( "refresh:0;services");
		}else
		{
		$success.= "Record has been successfully deleted.";
		@header("refresh:0;url=services");
		}
}
if(isset($_GET['y'])&& isset($_GET['ac'])){	
		$id = base64_decode($_GET['y']);
		$action = $_GET['ac'];

		if($action== "1"){
		$insert = "UPDATE `tb_services` SET `Status`='0' where  `Id_Services`='".$id."' ";
		$result = $db->query($insert);
		// Procedural way
		$run = mysqli_query($db, $insert);
///Start Email
$UserId = $_GET['u'];
$select = "SELECT * FROM `account` where `Id`='".$UserId."' ";
$run = mysqli_query($db, $select);
$row = $run->fetch_assoc();
$Email = $row['EmailAddress']; 
$subject = "Services  - Reject Your Request - ".$row_home->Title;
$from    = $row_home->EmailFrom;
$to      = $Email;
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
		$headers .= 'MIME-Version: 1.0'."\r\n";
		$header  .='Content-Type: image/jpg';
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.$row_home->Title.' <'.$row_home->EmailFrom.'>, '."\r\n";
		$headers .= 'Reply-to: '.$row_home->Title.' <'.$row_home->EmailTo.'>,'."\r\n";		if(mail($to,$subject,$body,$headers)){
		if(mail($to,$subject,$body,$headers)){
			///End Email
		$_SESSION["success"] = "Disable Successfully.";	
			if(isset($_GET['o'])){
		echo "<script>window.open('orders','_self')</script>";
				}else{
		echo "<script>window.open('services','_self')</script>";
				}
			}
			}
		}
		elseif($action== "Inactive"){
		$insert = "UPDATE `tb_services` SET `Status`='1' where `Id_Services`='".$id."' ";
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

$info 	  = "SELECT * FROM `tb_services` where `Id_Services`= '".$id."'";
$run_info = mysqli_query($db, $info);
$row_info = $run_info->fetch_assoc();

$Email   = $row['EmailAddress']; 
$subject = "Your listing has been approved - Services - ".$row_home->Title;
$from    = $row_home->EmailFrom;
$to      = $Email;
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
        <td valign="top"><strong>Company Address</strong></td>
        <td>'.$row_info['CompanyAddress'].'</td>
      </tr>
      <tr>
        <td valign="top"><strong>Company Email</strong></td>
        <td>'.$row_info['CompanyEmail'].'</td>
      </tr>
      <tr>
        <td valign="top"><strong>Company Website</strong></td>
        <td>'.$row_info['CompanyWebsite'].'</td>
      </tr>
	  <tr>
        <td valign="top"><strong>Company Logo</strong></td>
       		<td>';
	if($row_info['CompanyLogo']!=""){
	 $body .='<img src="http://www.yiddn.com/images/CompanyLogo/'.$row_info['CompanyLogo'].'" style="max-width:200px;">';
	}else{$body .= "N/A.";}
	 $body .= '</td>
      </tr>
      <tr>
        <td valign="top"><strong>Short Description</strong></td>
        <td>'.$row_info['ShortDescription'].'</td>
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
        <td valign="top"><strong>Category 1</strong></td>
        <td>';
if($row_info['Category']!=""){
$query_subcat = 'SELECT * FROM `sub-categories` where `Status`="1" AND `Id`='.$row_info['Category'];
$result_subcat = $db->query($query_subcat);
$row_subcat = $result_subcat->fetch_assoc(); 
$body .= $row_subcat['Title'];
}
$body .='</td>
      </tr>
	  <tr>
        <td valign="top"><strong>I want to upgrade to a BOLD listing - only $4.99 a month. </strong></td>
        <td>';
		if($row_info['upgrade']!="" && $row_info['upgrade']!="N/A."){
			$body .= "Yes";
			}else{
			$body .="No";
			}
		$body .= '</td>
      </tr>
	  <tr>
        <td valign="top"><strong>Upgrade to premium for maximum impact with a banner ad display - for only $499 a month.</strong></td>
       <td>';
	   if($row_info['Premium']!="" && $row_info['Premium']!="N/A."){
			$body .= "Yes";
			}else{
			$body .= "No";
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
        <td valign="top"><strong>I want to upgrade to a BOLD listing - only $4.99 a month.</strong> </td>
        <td>';
	   if($row_info['upgrade2']!="" && $row_info['upgrade2']!="N/A."){
			$body .= "Yes";
			}else{
			$body .="No";
			}
		$body .='</td>
      </tr>
	  <tr>
        <td valign="top"><strong>Upgrade to premium for maximum impact with a banner ad display - for only $499 a month.</strong></td>
       <td>';
	   if($row_info['Premium2']!="" && $row_info['Premium2']!="N/A."){
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
	 $body .='<img src="http://www.yiddn.com/images/Banner/'.$row_info['Banner2'].'" style="max-width:200px;">';
	}else{$body .="N/A.";}
	 $body .= '</td>
      </tr>
	  <tr>
        <td valign="top"><strong>Category 3</strong></td>
      <td>';
if(mysqli_real_escape_string($db,$row_info['Category3'])!=""){
$query_subcat = 'SELECT * FROM `sub-categories` where `Status`="1" AND `Id`='.mysqli_real_escape_string($db,$row_info['Category3']);
$result_subcat = $db->query($query_subcat);
$row_subcat = $result_subcat->fetch_assoc(); 
$body .= mysqli_real_escape_string($db,$row_subcat['Title']);
}
$body .='</td>
      </tr>
	  <tr>
        <td valign="top"><strong>I want to upgrade to a BOLD listing - only $4.99 a month. </strong></td>
        <td>';
	   if($row_info['upgrade3']!="" && $row_info['upgrade3']!="N/A."){
			$body .="Yes";
			}else{
			$body .= "No";
			}
		$body .='</td>
      </tr>
	  <tr>
        <td valign="top"><strong>Upgrade to premium for maximum impact with a banner ad display - for only $499 a month.</strong></td>
       <td>';
	   if($row_info['Premium3']!="" && $row_info['Premium3']!="N/A."){
			$body .= "Yes";
			}else{
			$body .= "No";
			}
		$body .='</td>
      </tr>
	   <tr>
        <td valign="top"><strong>Banner 3</strong></td>
       		<td>';
	if($row_info['Banner3']!=""){
	$body .= '<img src="http://www.yiddn.com/images/Banner/'.$row_info['Banner3'].'" style="max-width:200px;">';
	}else{$body .="N/A.";}
	 $body .='</td>
      </tr>
	   <tr>
        <td valign="top"><strong>City</strong></td>
        <td>';
	$city 	  = "SELECT * FROM`city` where `Id`='".$row_info['City']."'";
	$run_city = mysqli_query($db, $city);
	$row_city = $run_city->fetch_assoc();
	$body .= $row_city['City'];
	$body .= '</td>
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
		$headers .= 'MIME-Version: 1.0'."\r\n";
		$header  .='Content-Type: image/jpg';
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.$row_home->Title.' <'.$row_home->EmailFrom.'>, '."\r\n";
		$headers .= 'Reply-to: '.$row_home->Title.' <'.$row_home->EmailTo.'>,'."\r\n";		if(mail($to,$subject,$body,$headers)){
			if(mail($to,$subject,$body,$headers)){
				///End Email
			$_SESSION["success"] = "Enable Successfully.";	
					if(isset($_GET['o'])){
		echo "<script>window.open('orders','_self')</script>";
				}else{
		echo "<script>window.open('services','_self')</script>";
				}
				}
			}
		}else{
		$insert = "UPDATE `tb_services` SET `Status`='1' where  `Id_Services`='".$id."'";
		$result = $db->query($insert);
		$run = mysqli_query($db, $insert);
///Start Email
$UserId = $_GET['u'];
$select = "SELECT * FROM `account` where `Id`='".$UserId."' ";
$run = mysqli_query($db, $select);
$row = $run->fetch_assoc();
$info 	  = "SELECT * FROM `tb_services` where `Id_Services`= '".$id."'";
$run_info = mysqli_query($db, $info);
$row_info = $run_info->fetch_assoc();
$Email = $row['EmailAddress']; 
$subject = "Your listing has been approved - Services  - ".$row_home->Title;
$from    = $row_home->EmailFrom;
$to      = $Email;
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
        <td valign="top"><strong>Company Address</strong></td>
        <td>'.$row_info['CompanyAddress'].'</td>
      </tr>
      <tr>
        <td valign="top"><strong>Company Email</strong></td>
        <td>'.$row_info['CompanyEmail'].'</td>
      </tr>
      <tr>
        <td valign="top"><strong>Company Website</strong></td>
        <td>'.$row_info['CompanyWebsite'].'</td>
      </tr>
	  <tr>
        <td valign="top"><strong>Company Logo</strong></td>
       		<td>';
	if($row_info['CompanyLogo']!=""){
	 $body .='<img src="http://www.yiddn.com/images/CompanyLogo/'.$row_info['CompanyLogo'].'" style="max-width:200px;">';
	}else{$body .= "N/A.";}
	 $body .= '</td>
      </tr>
      <tr>
        <td valign="top"><strong>Short Description</strong></td>
        <td>'.$row_info['ShortDescription'].'</td>
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
        <td valign="top"><strong>Category 1</strong></td>
        <td>';
if($row_info['Category']!=""){
$query_subcat = 'SELECT * FROM `sub-categories` where `Status`="1" AND `Id`='.$row_info['Category'];
$result_subcat = $db->query($query_subcat);
$row_subcat = $result_subcat->fetch_assoc(); 
$body .= $row_subcat['Title'];
}
$body .='</td>
      </tr>
	  <tr>
        <td valign="top"><strong>I want to upgrade to a BOLD listing - only $4.99 a month. </strong></td>
        <td>';
		if($row_info['upgrade']!="" && $row_info['upgrade']!="N/A."){
			$body .= "Yes";
			}else{
			$body .="No";
			}
		$body .= '</td>
      </tr>
	  <tr>
        <td valign="top"><strong>Upgrade to premium for maximum impact with a banner ad display - for only $499 a month.</strong></td>
       <td>';
	   if($row_info['Premium']!="" && $row_info['Premium']!="N/A."){
			$body .= "Yes";
			}else{
			$body .= "No";
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
        <td valign="top"><strong>I want to upgrade to a BOLD listing - only $4.99 a month.</strong> </td>
        <td>';
	   if($row_info['upgrade2']!="" && $row_info['upgrade2']!="N/A."){
			$body .= "Yes";
			}else{
			$body .="No";
			}
		$body .='</td>
      </tr>
	  <tr>
        <td valign="top"><strong>Upgrade to premium for maximum impact with a banner ad display - for only $499 a month.</strong></td>
       <td>';
	   if($row_info['Premium2']!="" && $row_info['Premium2']!="N/A."){
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
	 $body .='<img src="http://www.yiddn.com/images/Banner/'.$row_info['Banner2'].'" style="max-width:200px;">';
	}else{$body .="N/A.";}
	 $body .= '</td>
      </tr>
	  <tr>
        <td valign="top"><strong>Category 3</strong></td>
      <td>';
if(mysqli_real_escape_string($db,$row_info['Category3'])!=""){
$query_subcat = 'SELECT * FROM `sub-categories` where `Status`="1" AND `Id`='.mysqli_real_escape_string($db,$row_info['Category3']);
$result_subcat = $db->query($query_subcat);
$row_subcat = $result_subcat->fetch_assoc(); 
$body .= mysqli_real_escape_string($db,$row_subcat['Title']);
}
$body .='</td>
      </tr>
	  <tr>
        <td valign="top"><strong>I want to upgrade to a BOLD listing - only $4.99 a month. </strong></td>
        <td>';
	   if($row_info['upgrade3']!="" && $row_info['upgrade3']!="N/A."){
			$body .="Yes";
			}else{
			$body .= "No";
			}
		$body .='</td>
      </tr>
	  <tr>
        <td valign="top"><strong>Upgrade to premium for maximum impact with a banner ad display - for only $499 a month.</strong></td>
       <td>';
	   if($row_info['Premium3']!="" && $row_info['Premium3']!="N/A."){
			$body .= "Yes";
			}else{
			$body .= "No";
			}
		$body .='</td>
      </tr>
	   <tr>
        <td valign="top"><strong>Banner 3</strong></td>
       		<td>';
	if($row_info['Banner3']!=""){
	$body .= '<img src="http://www.yiddn.com/images/Banner/'.$row_info['Banner3'].'" style="max-width:200px;">';
	}else{$body .="N/A.";}
	 $body .='</td>
      </tr>
	   <tr>
        <td valign="top"><strong>City</strong></td>
        <td>';
	$city 	  = "SELECT * FROM`city` where `Id`='".$row_info['City']."'";
	$run_city = mysqli_query($db, $city);
	$row_city = $run_city->fetch_assoc();
	$body .= $row_city['City'];
	$body .= '</td>
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
		$headers .= 'MIME-Version: 1.0'."\r\n";
		$header  .='Content-Type: image/jpg';
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.$row_home->Title.' <'.$row_home->EmailFrom.'>, '."\r\n";
		$headers .= 'Reply-to: '.$row_home->Title.' <'.$row_home->EmailTo.'>,'."\r\n";
		if(mail($to,$subject,$body,$headers)){
			///End Email
		$_SESSION["success"] = "Enable Successfully.";	
			if(isset($_GET['o'])){
		echo "<script>window.open('orders','_self')</script>";
				}else{
		echo "<script>window.open('services','_self')</script>";
				}
		
			}
		}
	}
?>
<script>
function confirmDelete()
{
return confirm("Are you sure you want to delete this service?");
}
</script> 


		 
