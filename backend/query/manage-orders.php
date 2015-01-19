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
				<th colspan="9" style="background-image:none !important;color:#000 !important; cursor:default !important">
		<strong>Total '.$total_results.' record(s) found.</strong>
				</th>
			</tr>
			 <tr class="btn-primary">
			  <th>#</th>
              <th>Name</th>
			  <th>Order Type</th>
              <th>Date Created </th>
              <th>Order ID</th>
			  <th>Subscription ID</th>
			  <th>Transaction ID</th>
			  <th>User ID</th>
              <th>Action</th>
           </tr>
		</thead><tbody>';
	if($total_results>0){	
	while ($row = $result->fetch_assoc()) 
	{
		
if($row['OrderType'] =="Jewish E-Taile"){
	$tb  = "tb_etailer";
	$key = "Id_Etailer";
	$url = "jewish-e-tailers";
}elseif($row['OrderType'] =="Local Directory"){
	$tb  = "tb_local";
	$key = "Id_Local";
	$url = "local-directory";
}elseif($row['OrderType'] =="Torah & Resources"){
	$tb  = "tb_torah_resources";
	$key = "Id_torah_resources";
	$url = "torah-and-resources";
}elseif($row['OrderType'] =="Services"){
	$tb  = "tb_services";
	$key = "Id_Services";
	$url = "services";
}elseif($row['OrderType'] =="Ad Circular"){
	$tb =  "tb_ad_circular";
	$key = "Id_Ad_circular";
	$url = "adcircular";
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
		<td>'.$row['OrderId'].'</td>
		<td>'.$row['subscriptionId'].'</td>
		<td>'.$row['transactionId'].'</td>
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
		<a class="table-actions" href="'.$url.'?y='.base64_encode($row_tb["$key"]).'&ac='.$row_tb['Status'].'&u='.$row_tb['UserId'].'&tb='.$tb.'&key='.$key.'&o=o" title="Status">';
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
	<strong>Upgrade: </strong>';
	if($row_tb['upgrade']!="" && $row_tb['upgrade']!="N/A."){
        echo $row_tb['upgrade'];
	}else{
		echo "No";
	}
	echo '
</div>
 <div class="clearfix"></div>
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
	<strong>Upgrade: </strong>';
	if($row_tb['upgrade2']!="" && $row_tb['upgrade2']!="N/A."){
        echo $row_tb['upgrade2'];
	}else{
		echo "No";
	}
	echo '
</div>
 <div class="clearfix"></div>
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
	<strong>Upgrade: </strong>';
	if($row_tb['upgrade3']!="" && $row_tb['upgrade3']!="N/A."){
        echo $row_tb['upgrade3'];
	}else{
		echo "No";
	}
	echo '
</div>
 <div class="clearfix"></div>
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
	<strong>Upgrade: </strong>';
	if($row_tb['upgrade']!="" && $row_tb['upgrade']!="N/A."){
        echo $row_tb['upgrade'];
	}else{
		echo "No";
	}
	echo '
</div>
 <div class="clearfix"></div>
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
	<strong>Upgrade: </strong>';
	if($row_tb['upgrade2']!="" && $row_tb['upgrade2']!="N/A."){
        echo $row_tb['upgrade2'];
	}else{
		echo "No";
	}
	echo '
</div>
 <div class="clearfix"></div>
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
	<strong>Upgrade: </strong>';
	if($row_tb['upgrade3']!="" && $row_tb['upgrade3']!="N/A."){
        echo $row_tb['upgrade3'];
	}else{
		echo "No";
	}
	echo '
</div>
 <div class="clearfix"></div>
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
?>
<script>
function confirmDelete()
{
return confirm("Are you sure you want to delete this Order?");
}
</script> 


		 
