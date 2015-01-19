<?php
$errors = array();
$success = null;
$body    ='';
$headers ='';
$header  ='';
function ShowBusinessDirectory(){
	$key='';
	global $db;
	$query = 'SELECT * FROM `order` ORDER By `Id` DESC';
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
              <th>Name</th>
			  <th>Order Type</th>
              <th>Date Created </th>
			  <th>User ID</th>
              <th>Action</th>
           </tr>
		</thead><tbody>';
	if($total_results>0){	
	while ($row = $result->fetch_assoc()) 
	{
		
if($row['OrderType'] =="Jewish E-Taile"){
	$tb =  "tb_etailer";
	$key = "Id_Etailer";
}elseif($row['OrderType'] =="Local Directory"){
	$tb =  "tb_local";
	$key = "Id_Local";
}elseif($row['OrderType'] =="Torah & Resources"){
	$tb =  "tb_torah_resources";
	$key = "Id_torah_resources";
}elseif($row['OrderType'] =="Ad Circular"){
	$tb =  "tb_ad_circular";
	$key = "Id_Ad_circular";
}

$query_tb   = "select * from `".$tb."` where `OrderId`= '".$row['OrderId']."'";
$result_tb  = $db->query($query_tb);
$row_tb 	= $result_tb->fetch_array();
		
	echo '
	
		<tr>
		<td>'.$count++.'</td>
		<td>';
			if($row['OrderType'] =="Ad Circular"){
			echo $row_tb['AdTitle'];
			}else{
			echo $row_tb['CompanyName'];
			} echo'</td>
		<td>'.$row['OrderType'].'</td>
		
		<td>'.$row_tb['DateAdded'].'</td>
		<td >';
if($row_tb['UserId']!=""){
$query_account = 'SELECT * FROM `account` where `Status`="1" AND `Id`='.$row_tb['UserId'];
$result_account = $db->query($query_account);
$row_account = $result_account->fetch_assoc(); 
echo $row_account['EmailAddress'];
}
		echo '</td>
		<td>
  	    <a class="table-actions" data-toggle="modal" href="#myModal-'.$row['Id'].'" title="View"><i class="icon-list-alt"></i></a>
		<a class="table-actions" href="orders?y='.base64_encode($row['OrderId']).'&ac='.$row_tb['Status'].'&u='.$row_tb['UserId'].'&tb='.$tb.'&key='.$key.'" title="Status">';
		if($row_tb['Status']=="1"){
			echo '<i class="icon-ok" style="color:#009900" Title="approve"></i>';
		 }else{
			echo '<i class="icon-ok" style="color:#FF0000" Title="Reject"></i>';
		}
   echo '</a>
		<a class="table-actions" href="orders?y='.base64_encode($row['OrderId']).'&tb='.$tb.'&key='.$key.'&oid='.$row['Id'].'" title="Delete" onclick="return confirmDelete();"><i class="icon-trash"></i></a></td>
		</tr>
	
	';
	echo '<div class="modal fade" id="myModal-'.$row['Id'].'">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button aria-hidden="true" class="close" data-dismiss="modal" type="button">×</button>
                  <h4 class="modal-title">Order Details - '.$row['OrderType'].' / Subscription ID - '.$row['subscriptionId'].'</h4>
                </div>
                <div class="modal-body">
				<div class="row">
<div class="col-sm-12">
	<div class="alert alert-info">
		<strong>Enter Ad details</strong>
	</div>
</div>';

if($row['OrderType'] =="Ad Circular"){
	echo '
<div class="col-sm-6">
<strong>Category: </strong>';
if($row_tb['Category1']!=""){
$query_category = 'SELECT * FROM `sub-categories` where `Status`="1" AND `Id`='.$row_tb['Category1'];
$result_category = $db->query($query_category);
$row_category = $result_category->fetch_assoc(); 
echo $row_category['Title'];
}
echo '</div>

<div class="col-sm-6">
<strong>Another Category: </strong>';
if($row_tb['Category2']!=""){
$query_category = 'SELECT * FROM `sub-categories` where `Status`="1" AND `Id`='.$row_tb['Category2'];
$result_category = $db->query($query_category);
$row_category = $result_category->fetch_assoc(); 
echo $row_category['Title'];
}
echo '</div>';
}
echo'

<div class="col-sm-6">
<strong>Name: </strong>';
			if($row['OrderType'] =="Ad Circular"){
			echo $row_tb['AdTitle'];
			}else{
			echo $row_tb['CompanyName'];
			} echo'  
</div>

<div class="col-sm-6">
	<strong>Address: </strong>';
			if($row['OrderType'] =="Ad Circular"){
			echo $row_tb['Address'];
			}else{
			echo $row_tb['CompanyAddress'];
			} echo'  
</div>
<br>
<div class="col-sm-6">
	<strong>Company Email:   </strong>';
			if($row['OrderType'] =="Ad Circular"){
			echo "N/A.";
			}else{
			echo $row_tb['CompanyEmail'];
			} echo' 
</div>
<br>
<div class="col-sm-6">';
			if($row['OrderType'] =="Ad Circular"){
			echo "<strong>Ad URL: </strong>".$row_tb['AdURL'];
			}else{
			echo "<strong>Company Website: </strong>".$row_tb['CompanyWebsite'];
			} 
echo'</div><br>';

if($row['OrderType'] !="Ad Circular"){
	
echo '<div class="col-sm-12">
<strong>Company Logo:</strong>';
if($row_tb['CompanyLogo']!=""){
echo '<br><img src="../images/CompanyLogo/'.$row_tb['CompanyLogo'].'" style="max-width:300px;">';
}else{
	echo "N/A.";
	}
echo '</div>

<div class="col-sm-6">
	<strong>Short Description: </strong>'.$row_tb['ShortDescription'].'  		  </div>';
}

echo'<br>
<div class="col-sm-6">
	<strong>Description:   </strong>'.$row_tb['Description'].'
</div>

<div class="col-sm-6">
	<strong>Agent:  </strong>'.$row_tb['Agent'].'   
</div>
<br>
<div class="col-sm-6">
	<strong>Keywords: </strong>'.$row_tb['CompanyKeywords'].'
</div>';
if($row['OrderType'] !="Ad Circular"){
echo '<div class="col-sm-12">
	<strong>CompanyWebsite:      </strong>'.$row_tb['CompanyWebsite'].'
</div>';
}

echo '<p>&nbsp;</p>
<div class="col-sm-12">
	<div class="alert alert-info">
		<strong >Where do you want your ad to show?</strong>
	</div>
</div>';

if($row['OrderType']=="Jewish E-Taile" || $row['OrderType']=="Torah & Resources"){
	echo '
	<!-- Start Categories -->
	<div class="col-sm-6">
<strong>Category 1: </strong>';
if($row_tb['Category']!=""){
$query_category = 'SELECT * FROM `sub-categories` where `Status`="1" AND `Id`='.$row_tb['Category'];
$result_category = $db->query($query_category);
$row_category = $result_category->fetch_assoc(); 
echo $row_category['Title'];
}
echo '</div>
<div class="col-sm-6">
	<strong>Upgrade: </strong>'.$row_tb['upgrade'].'
</div>
<div class="col-sm-12">
	<strong>Premium: </strong>$';
	if($row_tb['Premium']!=""){
		echo number_format($row_tb['Premium'],2);
		}else{
		echo "0.00";
	}
	echo'
</div>
<div class="col-sm-12">
	<strong>Banner:  </strong>
	<br>';
	if($row_tb['Banner']!=""){
	echo '<img src="../images/Banner/'.$row_tb['Banner'].'" style="max-width:300px;">';
	}else{echo "N/A.";}
echo '</div>

<hr>


<div class="col-sm-6">
<strong>Category 2: </strong>';
if($row_tb['Category2']!=""){
$query_category = 'SELECT * FROM `sub-categories` where `Status`="1" AND `Id`='.$row_tb['Category2'];
$result_category = $db->query($query_category);
$row_category = $result_category->fetch_assoc(); 
echo $row_category['Title'];
}
echo '</div>
<div class="col-sm-6">
	<strong>Upgrade: </strong>'.$row_tb['upgrade2'].'
</div>
<div class="col-sm-12">
	<strong>Premium: </strong>$';
	if($row_tb['Premium2']!=""){
		echo number_format($row_tb['Premium2'],2);
		}else{
		echo "0.00";
	}
	echo'
</div>
<div class="col-sm-12">
	<strong>Banner:  </strong>
	<br>';
	if($row_tb['Banner2']!=""){
	echo '<img src="../images/Banner/'.$row_tb['Banner2'].'" style="max-width:300px;">';
	}else{echo "N/A.";}
echo '
</div>

<hr>


<div class="col-sm-6">
<strong>Category 3: </strong>';
if($row_tb['Category3']!=""){
$query_category = 'SELECT * FROM `sub-categories` where `Status`="1" AND `Id`='.$row_tb['Category3'];
$result_category = $db->query($query_category);
$row_category = $result_category->fetch_assoc(); 
echo $row_category['Title'];
}
echo '</div>
<div class="col-sm-6">
	<strong>Upgrade: </strong>'.$row_tb['upgrade3'].'
</div>
<div class="col-sm-12">
	<strong>Premium: </strong>$';
	if($row_tb['Premium3']!=""){
		echo number_format($row_tb['Premium3'],2);
		}else{
		echo "0.00";
	}
	echo'
</div>
<div class="col-sm-12">
	<strong>Banner:  </strong>
	<br>';
	if($row_tb['Banner3']!=""){
	echo '<img src="../images/Banner/'.$row_tb['Banner3'].'" style="max-width:300px;">';
	}else{echo "N/A.";}
echo '
</div> <!-- End Categories -->';
}

elseif($row['OrderType']=="Local Directory"){

echo '
			<!-- Start City -->
<div class="col-sm-6">
<strong>City 1: </strong>';
if($row_tb['City']!=""){
$query_city = 'SELECT * FROM `city` where `Status`="1" AND `Id`='.$row_tb['City'];
$result_city = $db->query($query_city);
$row_city= $result_city->fetch_assoc(); 
echo $row_city['City'];
}
echo '</div>
<div class="col-sm-6">
	<strong>Upgrade: </strong>'.$row_tb['upgrade'].'
</div>
<div class="col-sm-12">
	<strong>Premium: </strong>$';
	if($row_tb['Premium']!=""){
		echo number_format($row_tb['Premium'],2);
		}else{
		echo "0.00";
	}
	echo'
</div>
<div class="col-sm-12">
	<strong>Banner:  </strong>
	<br>';
	if($row_tb['Banner']!=""){
	echo '<img src="../images/Banner/'.$row_tb['Banner'].'" style="max-width:300px;">';
	}else{echo "N/A.";} 
echo '</div>

<hr>
		<!-- End City -->

<div class="col-sm-6">
<strong>City 2: </strong>';
if($row_tb['City2']!=""){
$query_city = 'SELECT * FROM `city` where `Status`="1" AND `Id`='.$row_tb['City2'];
$result_city = $db->query($query_city);
$row_city= $result_city->fetch_assoc(); 
echo $row_city['City'];
}
echo '</div>
<div class="col-sm-6">
	<strong>Upgrade: </strong>'.$row_tb['upgrade'].'
</div>
<div class="col-sm-6">
	<strong>Upgrade: </strong>'.$row_tb['upgrade2'].'
</div>
<div class="col-sm-12">
	<strong>Premium: </strong>$';
	if($row_tb['Premium2']!=""){
		echo number_format($row_tb['Premium2'],2);
		}else{
		echo "0.00";
	}
	echo'
</div>
<div class="col-sm-12">
	<strong>Banner:  </strong>
	<br>';
	if($row_tb['Banner2']!=""){
	echo '<img src="../images/Banner/'.$row_tb['Banner2'].'" style="max-width:300px;">';
	}else{echo "N/A.";}
echo '
</div><div class="col-sm-6">
<strong>City 3: </strong>';
if($row_tb['City3']!=""){
$query_city = 'SELECT * FROM `city` where `Status`="1" AND `Id`='.$row_tb['City2'];
$result_city = $db->query($query_city);
$row_city= $result_city->fetch_assoc(); 
echo $row_city['City'];
}
echo '</div>
<div class="col-sm-6">
	<strong>Upgrade: </strong>'.$row_tb['upgrade3'].'
</div>
<div class="col-sm-12">
	<strong>Premium: </strong>$';
	if($row_tb['Premium3']!=""){
		echo number_format($row_tb['Premium3'],2);
		}else{
		echo "0.00";
	}
	echo'
</div>
<div class="col-sm-12">
	<strong>Banner:  </strong>
	<br>';
	if($row_tb['Banner3']!=""){
	echo '<img src="../images/Banner/'.$row_tb['Banner3'].'" style="max-width:300px;">';
	}else{echo "N/A.";}
echo '
</div>
<div class="col-sm-12">

<div class="col-sm-6">

<strong>Category: </strong>';
if($row_tb['Category1']!=""){
$query_category = 'SELECT * FROM `categories` where `Status`="1" AND `Id`='.$row_tb['Category1'];
$result_category = $db->query($query_category);
$row_category = $result_category->fetch_assoc(); 
echo $row_category['Title'];
}
echo '</div>

</div>

';
	
}else{
	echo '<div class="col-sm-12">
	<strong>Large Top Banner:  </strong>
	<br>';
	if($row_tb['Banner']!=""){
	echo '<img src="../images/Banner/'.$row_tb['Banner'].'" style="max-width:300px;">';
	}else{echo "N/A.";}
echo '
</div>';

	echo '<div class="col-sm-12">
	<strong>Small Top Banner :  </strong>
	<br>';
	if($row_tb['Banner2']!=""){
	echo '<img src="../images/Banner/'.$row_tb['Banner2'].'" style="max-width:300px;">';
	}else{echo "N/A.";}
echo '
</div>';

	echo '<div class="col-sm-12">
	<strong>Standard Ad spot:  </strong>
	<br>';
	if($row_tb['Banner3']!=""){
	echo '<img src="../images/Banner/'.$row_tb['Banner3'].'" style="max-width:300px;">';
	}else{echo "N/A.";}
echo '
</div>';
	
	}			  
			 
echo '<hr>


<div class="col-sm-12">
	<div class="alert alert-info">
		<strong>Choose a Payment Plan</strong>
	</div>
</div>

<div class="col-sm-12">
	<strong>Payment Plan: </strong>';
	
$query_order = 'SELECT * FROM `order` WHERE `OrderId`= "'.$row_tb['OrderId'].'"';
$result_order = $db->query($query_order);
$row_order = $result_order->fetch_object();
	if($row_tb['PaymentPlan']=="10"){
	  $PaymentPlan ="$".number_format($row_order->AmountCharged,2)." Every 3 months";
	}elseif($row_tb['PaymentPlan']=="20"){
	  $PaymentPlan ="$".number_format($row_order->AmountCharged,2)." Every 6 months";
	}elseif($row_tb['PaymentPlan']=="RECUR"){
	  $PaymentPlan ="$".number_format($row_order->AmountCharged,2)." Per month";
	}elseif($row_tb['PaymentPlan']=="ONETIME"){
	  $PaymentPlan ="$".number_format($row_order->AmountCharged,2)." Only one month";
	}else{
		 $PaymentPlan ="Free";
	}
	echo  $PaymentPlan;
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
	'.$row_order->Summary.'
</div>


<div class="col-sm-6">
<strong>Status: </strong>';
if($row_tb['Status']=="1"){
echo "Enable";
}else{
echo "Disable ";
}
echo '  </div>

<div class="col-sm-6"><strong>Date Created: </strong>'.$row_tb['DateAdded'].'  </div>
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
		$delete = "delete from `order` where `Id` =".$_GET['oid'];
		$run = mysqli_query($db, $delete);
		
		$delete = "delete from ".$_GET['tb']." where `OrderId` = '".$id."'";
		$run = mysqli_query($db, $delete);
		
		
		if($run==0){
		$errors[] ="Please Try again.";
		@header( "refresh:0;orders");
		}else
		{
		$success.= "Record has been successfully deleted.";
		@header("refresh:0;url=orders");
		}
}
if(isset($_GET['y'])&& isset($_GET['ac'])){	
		$id = base64_decode($_GET['y']);
		$action = $_GET['ac'];

		if($action== "1"){
		$insert = "UPDATE `".$_GET['tb']."` SET `Status`='0' where  `OrderId`='".$id."' ";
		$result = $db->query($insert);
		// Procedural way
		$run = mysqli_query($db, $insert);
///Start Email
$UserId = $_GET['u'];
$select = "SELECT * FROM `account` where `Id`='".$UserId."' ";
$run = mysqli_query($db, $select);
$row = $run->fetch_assoc();
$Email = $row['EmailAddress']; 
$subject = "Reject Your Request - ".$row_home->Title;
$from    = $row_home->EmailFrom;
$to      = $Email;
$ip      = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
$parts = explode('@', $Email);
$username = $parts[0];
$body .='<table width="600" align="center" border="0" cellspacing="0" cellpadding="5" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; border:10px solid #95247e">

  <tr style="background-color:#96257F">
    <td><img src="http://www.yiddn.com/images/logo.png" /></td>
  </tr>

 <tr style="background-color:#96257F">
    <td align="right" style="font-size:18px; font-weight:bold">
	Request Status
	</td>
  </tr>

  <tr>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td><strong>Dear '.$username.',</strong></td>
  </tr>
  <tr>
    <td>
	Reject Your Request.</td>
  </tr>

  <tr>
    <td>Kind Regards,'. $_SERVER['HTTP_HOST'].'</td>
  </tr>
</table>';
$headers .= 'MIME-Version: 1.0'."\r\n";
$header  .='Content-Type: image/jpg';
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$row_home->Title.' <'.$row_home->EmailFrom.'>, '."\r\n";
$headers .= 'Reply-to: '.$row_home->Title.' <'.$row_home->EmailTo.'>,'."\r\n";
mail($to,$subject,$body,$headers);
		///End Email
		$_SESSION["success"] = "Disable Successfully.";	
		@header("refresh:0;url=orders");
		}
		elseif($action== "Inactive"){
			
		$insert = "UPDATE `".$_GET['tb']."` SET `Status`='1' where `OrderId`='".$id."' ";
		$result = $db->query($insert);
		$row = $run->fetch_assoc();
		$run = mysqli_query($db, $insert);
		
			
if($_GET['tb'] =="Jewish E-Taile" || $_GET['tb'] =="Torah & Resources" ){			
		
		$_SESSION["success"] = "Enable Successfully.";	
///Start Email
$UserId = $_GET['u'];
$select = "SELECT * FROM `account` where `Id`='".$UserId."' ";
$run = mysqli_query($db, $select);
$row = $run->fetch_assoc();

$info 	  = "SELECT * FROM`".$_GET['tb']."` where `OrderId`='".$id."'";
$run_info = mysqli_query($db, $info);
$row_info = $run_info->fetch_assoc();

$Email = $row['EmailAddress']; 
$subject = "Approve Your Request - ".$row_home->Title;
$from    = $row_home->EmailFrom;
$to      = $Email;
$ip      = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
$parts = explode('@', $Email);
$username = $parts[0];
$body .='<table width="800" align="center" border="0" cellspacing="0" cellpadding="5" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; border:10px solid #95247e">

  <tr style="background-color:#96257F">
     <td><img src="http://www.yiddn.com/images/logo.png" /></td>
  </tr>

  <tr>
    <td align="right" style="font-size:18px; font-weight:bold">
	Request Status
	</td>
  </tr>

  <tr>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td><strong>Dear '.$username.',</strong></td>
  </tr>
  <tr>
    <td>
	<p>L&#39;chayim&#33; Your listing has been approved&#33;  Join us for a quick round of the hora?</p> 
	</td>
  </tr>

  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td><strong>OrderId</strong></td>
        <td>'.$row_info['OrderId'].'</td>
      </tr>
      <tr>
        <td><strong>Company Name</strong></td>
         <td>'.$row_info['CompanyName'].'</td>
      </tr>
      <tr>
        <td><strong>Company Address</strong></td>
        <td>'.$row_info['CompanyAddress'].'</td>
      </tr>
      <tr>
        <td><strong>Company Email</strong></td>
        <td>'.$row_info['CompanyEmail'].'</td>
      </tr>
      <tr>
        <td><strong>Company Website</strong></td>
        <td>'.$row_info['CompanyWebsite'].'</td>
      </tr>
	  <tr>
        <td><strong>Company Logo</strong></td>
       		<td>';
	if($row_info['CompanyLogo']!=""){
	 $body .='<img src="http://www.yiddn.com/images/CompanyLogo/'.$row_info['CompanyLogo'].'" style="max-width:200px;">';
	}else{$body .= "N/A.";}
	 $body .= '</td>
      </tr>
      <tr>
        <td><strong>Short Description</strong></td>
        <td>'.$row_info['ShortDescription'].'</td>
      </tr>
      <tr>
        <td><strong>Description</strong></td>
     	<td>'.$row_info['Description'].'</td>
      </tr>
      <tr>
         <td><strong>Agent</strong></td>
         <td>'.$row_info['Agent'].'</td>
      </tr>
      <tr>
        <td><strong>Company Keywords</strong></td>
        <td>'.$row_info['CompanyKeywords'].'</td>
      </tr>
	  <tr>
        <td><strong>Category 1</strong></td>
        <td>'.$row_info['Category'].'</td>
      </tr>
	  <tr>
        <td><strong>I want to upgrade to a BOLD listing - only $4.99 a month. </strong></td>
        <td>';
		if($row_info['upgrade']!=""){
			$body .= "Yes";
			}else{
			$body .="No";
			}
		$body .= '</td>
      </tr>
	  <tr>
        <td><strong>Upgrade to premium for maximum impact with a banner ad display - for only $499 a month.</strong></td>
       <td>';
		if($row_info['Premium']!=""){
			$body .= "Yes";
			}else{
			$body .= "No";
			}
		$body .= '</td>
      </tr>
	   <tr>
        <td><strong>Banner 1</strong></td>
       		<td>';
	if($row_info['Banner']!=""){
	 $body  .= '<img src="http://www.yiddn.com/images/Banner/'.$row_info['Banner'].'" style="max-width:200px;">';
	}else{$body .= "N/A.";}
	 $body .= '</td>
      </tr>
	   <tr>
        <td><strong>Category 2</strong></td>
        <td>'.$row_info['Category2'].'</td>
      </tr>
	  <tr>
        <td><strong>I want to upgrade to a BOLD listing - only $4.99 a month.</strong> </td>
        <td>';
		if($row_info['upgrade2']!=""){
			$body .= "Yes";
			}else{
			$body .="No";
			}
		$body .='</td>
      </tr>
	  <tr>
        <td><strong>Upgrade to premium for maximum impact with a banner ad display - for only $499 a month.</strong></td>
       <td>';
		if($row_info['Premium2']!=""){
			$body .= "Yes";
			}else{
			$body .= "No";
			}
		$body .= '</td>
      </tr>
	  <tr>
        <td><strong>Banner 2</strong></td>
       		<td>';
	if($row_info['Banner2']!=""){
	 $body .='<img src="http://www.yiddn.com/images/Banner/'.$row_info['Banner2'].'" style="max-width:200px;">';
	}else{$body .="N/A.";}
	 $body .= '</td>
      </tr>
	  <tr>
        <td><strong>Category 3</strong></td>
        <td>'.$row_info['Category3'].'</td>
      </tr>
	  <tr>
        <td><strong>I want to upgrade to a BOLD listing - only $4.99 a month. </strong></td>
        <td>';
		if($row_info['upgrade3']!=""){
			$body .="Yes";
			}else{
			$body .= "No";
			}
		$body .='</td>
      </tr>
	  <tr>
        <td><strong>Upgrade to premium for maximum impact with a banner ad display - for only $499 a month.</strong></td>
       <td>';
		if($row_info['Premium3']!=""){
			$body .= "Yes";
			}else{
			$body .= "No";
			}
		$body .='</td>
      </tr>
	   <tr>
        <td><strong>Banner 3</strong></td>
       		<td>';
	if($row_info['Banner3']!=""){
	$body .= '<img src="http://www.yiddn.com/images/Banner/'.$row_info['Banner3'].'" style="max-width:200px;">';
	}else{$body .="N/A.";}
	 $body .='</td>
      </tr>
	   <tr>
        <td><strong>City</strong></td>
        <td>';
	$city 	  = "SELECT * FROM`city` where `Id`='".$row_info['City']."'";
	$run_city = mysqli_query($db, $city);
	$row_city = $run_city->fetch_assoc();
	$body .= $row_city['City'];
$body .= '</td>
      </tr>
	  <tr>
        <td><strong>Payment Plan</strong></td>
        <td>';
$order 	  = "SELECT * FROM`order` where `OrderId`='".$id."'";
$run_order = mysqli_query($db, $order);
$row_order = $run_order->fetch_assoc();
	
	if($row_info['PaymentPlan']=="10"){
	  $PaymentPlan ="$".number_format($row_order['AmountCharged'],2)." Every 3 months";
	}elseif($row_info['PaymentPlan']=="20"){
	  $PaymentPlan ="$".number_format($row_order['AmountCharged'],2)." Every 6 months";
	}elseif($row_info['PaymentPlan']=="RECUR"){
	  $PaymentPlan ="$".number_format($row_order['AmountCharged'],2)." Per month";
	}elseif($row_info['PaymentPlan']=="ONETIME"){
	  $PaymentPlan ="$".number_format($row_order['AmountCharged'],2)." Only one month";
	}else{
		 $PaymentPlan ="Free"; 
	}
	$body .= $PaymentPlan;
		
		$body .='</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>Kind Regards,'. $_SERVER['HTTP_HOST'].'</td>
  </tr>
</table>';
		
}

$headers .= 'MIME-Version: 1.0'."\r\n";
$header  .='Content-Type: image/jpg';
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$row_home->Title.' <'.$row_home->EmailFrom.'>, '."\r\n";
$headers .= 'Reply-to: '.$row_home->Title.' <'.$row_home->EmailTo.'>,'."\r\n";
mail($to,$subject,$body,$headers);
///End Email
		$_SESSION["success"] = "Enable Successfully.";	
		@header("refresh:0;url=orders");
		}else{
			
		$insert = "UPDATE `".$_GET['tb']."` SET `Status`='1' where  `OrderId`='".$id."'";
		$result = $db->query($insert);
		$run = mysqli_query($db, $insert);
			
		if($_GET['tb'] =="Jewish E-Taile" || $_GET['tb'] =="Torah & Resources" ){			
	
	
///Start Email
$UserId = $_GET['u'];
$select = "SELECT * FROM `account` where `Id`='".$UserId."' ";
$run = mysqli_query($db, $select);
$row = $run->fetch_assoc();

$info 	  = "SELECT * FROM`".$_GET['tb']."` where `OrderId`='".$id."'";
$run_info = mysqli_query($db, $info);
$row_info = $run_info->fetch_assoc();

$Email = $row['EmailAddress']; 
$subject = "Approve Your Request - ".$row_home->Title;
$from    = $row_home->EmailFrom;
$to      = $Email;
$ip      = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
$parts = explode('@', $Email);
$username = $parts[0];
$body .='<table width="800" align="center" border="0" cellspacing="0" cellpadding="5" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; border:10px solid #95247e">

  <tr style="background-color:#96257F">
     <td><img src="http://www.yiddn.com/images/logo.png" /></td>
  </tr>

  <tr>
    <td align="right" style="font-size:18px; font-weight:bold">
	Request Status
	</td>
  </tr>

  <tr>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td><strong>Dear '.$username.',</strong></td>
  </tr>
  <tr>
    <td>
	<p>L&#39;chayim&#33; Your listing has been approved&#33;  Join us for a quick round of the hora?</p> 
	</td>
  </tr>

  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td><strong>OrderId</strong></td>
        <td>'.$row_info['OrderId'].'</td>
      </tr>
      <tr>
        <td><strong>Company Name</strong></td>
         <td>'.$row_info['CompanyName'].'</td>
      </tr>
      <tr>
        <td><strong>Company Address</strong></td>
        <td>'.$row_info['CompanyAddress'].'</td>
      </tr>
      <tr>
        <td><strong>Company Email</strong></td>
        <td>'.$row_info['CompanyEmail'].'</td>
      </tr>
      <tr>
        <td><strong>Company Website</strong></td>
        <td>'.$row_info['CompanyWebsite'].'</td>
      </tr>
	  <tr>
        <td><strong>Company Logo</strong></td>
       		<td>';
	if($row_info['CompanyLogo']!=""){
	 $body .='<img src="http://www.yiddn.com/images/CompanyLogo/'.$row_info['CompanyLogo'].'" style="max-width:200px;">';
	}else{$body .= "N/A.";}
	 $body .= '</td>
      </tr>
      <tr>
        <td><strong>Short Description</strong></td>
        <td>'.$row_info['ShortDescription'].'</td>
      </tr>
      <tr>
        <td><strong>Description</strong></td>
     	<td>'.$row_info['Description'].'</td>
      </tr>
      <tr>
         <td><strong>Agent</strong></td>
         <td>'.$row_info['Agent'].'</td>
      </tr>
      <tr>
        <td><strong>Company Keywords</strong></td>
        <td>'.$row_info['CompanyKeywords'].'</td>
      </tr>
	  <tr>
        <td><strong>Category 1</strong></td>
        <td>'.$row_info['Category'].'</td>
      </tr>
	  <tr>
        <td><strong>I want to upgrade to a BOLD listing - only $4.99 a month. </strong></td>
        <td>';
		if($row_info['upgrade']!=""){
			$body .= "Yes";
			}else{
			$body .="No";
			}
		$body .= '</td>
      </tr>
	  <tr>
        <td><strong>Upgrade to premium for maximum impact with a banner ad display - for only $499 a month.</strong></td>
       <td>';
		if($row_info['Premium']!=""){
			$body .= "Yes";
			}else{
			$body .= "No";
			}
		$body .= '</td>
      </tr>
	   <tr>
        <td><strong>Banner 1</strong></td>
       		<td>';
	if($row_info['Banner']!=""){
	 $body  .= '<img src="http://www.yiddn.com/images/Banner/'.$row_info['Banner'].'" style="max-width:200px;">';
	}else{$body .= "N/A.";}
	 $body .= '</td>
      </tr>
	   <tr>
        <td><strong>Category 2</strong></td>
        <td>'.$row_info['Category2'].'</td>
      </tr>
	  <tr>
        <td><strong>I want to upgrade to a BOLD listing - only $4.99 a month.</strong> </td>
        <td>';
		if($row_info['upgrade2']!=""){
			$body .= "Yes";
			}else{
			$body .="No";
			}
		$body .='</td>
      </tr>
	  <tr>
        <td><strong>Upgrade to premium for maximum impact with a banner ad display - for only $499 a month.</strong></td>
       <td>';
		if($row_info['Premium2']!=""){
			$body .= "Yes";
			}else{
			$body .= "No";
			}
		$body .= '</td>
      </tr>
	  <tr>
        <td><strong>Banner 2</strong></td>
       		<td>';
	if($row_info['Banner2']!=""){
	 $body .='<img src="http://www.yiddn.com/images/Banner/'.$row_info['Banner2'].'" style="max-width:200px;">';
	}else{$body .="N/A.";}
	 $body .= '</td>
      </tr>
	  <tr>
        <td><strong>Category 3</strong></td>
        <td>'.$row_info['Category3'].'</td>
      </tr>
	  <tr>
        <td><strong>I want to upgrade to a BOLD listing - only $4.99 a month. </strong></td>
        <td>';
		if($row_info['upgrade3']!=""){
			$body .="Yes";
			}else{
			$body .= "No";
			}
		$body .='</td>
      </tr>
	  <tr>
        <td><strong>Upgrade to premium for maximum impact with a banner ad display - for only $499 a month.</strong></td>
       <td>';
		if($row_info['Premium3']!=""){
			$body .= "Yes";
			}else{
			$body .= "No";
			}
		$body .='</td>
      </tr>
	   <tr>
        <td><strong>Banner 3</strong></td>
       		<td>';
	if($row_info['Banner3']!=""){
	$body .= '<img src="http://www.yiddn.com/images/Banner/'.$row_info['Banner3'].'" style="max-width:200px;">';
	}else{$body .="N/A.";}
	 $body .='</td>
      </tr>
	   <tr>
        <td><strong>City</strong></td>
        <td>';
	$city 	  = "SELECT * FROM`city` where `Id`='".$row_info['City']."'";
	$run_city = mysqli_query($db, $city);
	$row_city = $run_city->fetch_assoc();
	$body .= $row_city['City'];
$body .= '</td>
      </tr>
	  <tr>
        <td><strong>Payment Plan</strong></td>
        <td>';
$order 	  = "SELECT * FROM`order` where `OrderId`='".$id."'";
$run_order = mysqli_query($db, $order);
$row_order = $run_order->fetch_assoc();
	
	if($row_info['PaymentPlan']=="10"){
	  $PaymentPlan ="$".number_format($row_order['AmountCharged'],2)." Every 3 months";
	}elseif($row_info['PaymentPlan']=="20"){
	  $PaymentPlan ="$".number_format($row_order['AmountCharged'],2)." Every 6 months";
	}elseif($row_info['PaymentPlan']=="RECUR"){
	  $PaymentPlan ="$".number_format($row_order['AmountCharged'],2)." Per month";
	}elseif($row_info['PaymentPlan']=="ONETIME"){
	  $PaymentPlan ="$".number_format($row_order['AmountCharged'],2)." Only one month";
	}else{
		 $PaymentPlan ="Free"; 
	}
	$body .= $PaymentPlan;
		
		$body .='</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>Kind Regards,'. $_SERVER['HTTP_HOST'].'</td>
  </tr>
</table>';
			
		}
			
$headers .= 'MIME-Version: 1.0'."\r\n";
$header  .='Content-Type: image/jpg';
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$row_home->Title.' <'.$row_home->EmailFrom.'>, '."\r\n";
$headers .= 'Reply-to: '.$row_home->Title.' <'.$row_home->EmailTo.'>,'."\r\n";
mail($to,$subject,$body,$headers);
///End Email
		$_SESSION["success"] = "Enable Successfully.";	
		@header("refresh:0;url=orders");
		}
	}
?>
<script>
function confirmDelete()
{
return confirm("Are you sure you want to delete this Order?");
}
</script> 


		 
