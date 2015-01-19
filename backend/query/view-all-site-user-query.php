<?php
$errors = array();
$success = null;

function ShowSiteUser(){
	$key='';
	global $db;
	$query = 'SELECT * FROM `account` WHERE `AccountType`="3" ORDER By Id DESC';
	$result = $db->query($query);
	$total_results = $result->num_rows;
	$count = 1;
		echo '
		<table class="table table-bordered table-striped" id="dataTable1">
            <thead>
			<tr>
				<th colspan="6" style="background-image:none !important;color:#000 !important; cursor:default !important">
				<strong>Total  '.$total_results.' record(s) found</strong>
				</th>
			</tr>
			<tr  class="btn-primary">
              <th>#</th>
              <th>First / Last Name</th>
              <th>Login ID</th>
              <th>Email List</th>
              <th >Date Created </th>
              <th>Action</th>
     		</tr>
	  	</thead><tbody>';
	while ($row = $result->fetch_assoc()) 
	{
	echo '
	
		<tr>
		<td>'.$count++.'</td>
		<td>'.$row['FirstName'].' / '.$row['LastName'].'</td>
		<td>'.$row['EmailAddress'].'</td>
		<td >'.$row['EmailList'].'</td>
		<td >'.$row['DateCreated'].'</td>
		<td>
  	    <a class="table-actions" data-toggle="modal" href="#myModal-'.$row['Id'].'" title="View"><i class="icon-list-alt"></i></a>
		<a class="table-actions" href="manage-site-users?y='.base64_encode($row['Id']).'&ac='.$row['Status'].'" title="Status">';
		if($row['Status']=="1"){
			echo '<i class="icon-eye-open"></i>';
		 }else{
			echo '<i class="icon-eye-close "></i>';
		}
   echo '</a>
		<a class="table-actions" href="edit-site-user?y='.base64_encode($row['Id']).'" title="Edit"><i class="icon-pencil"></i></a>
		<a class="table-actions" href="manage-site-users?y='.base64_encode($row['Id']).'" title="Delete" onclick="return confirmDelete();"><i class="icon-trash"></i></a></td>
		</tr>
	';
	echo '<div class="modal fade" id="myModal-'.$row['Id'].'">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button aria-hidden="true" class="close" data-dismiss="modal" type="button">×</button>
                  <h4 class="modal-title">Site User</h4>
                </div>
                <div class="modal-body">
                  <p><strong>First Name:	 </strong>'.$row['FirstName'].'      </p>
			      <p><strong>Last Name:  	 </strong>'.$row['LastName'].'  	 </p>
				  <p><strong>City: 			 </strong>'.$row['City'].'  		 </p>
				  <p><strong>State Province: </strong>'.$row['StateProvince'].'  </p>
				  <p><strong>Zipcode:  		 </strong>'.$row['Zipcode'].'        </p>
				  <p><strong>Country:  		 </strong>'.$row['Country'].'        </p>
				  <p><strong>Login ID: 		 </strong>'.$row['EmailAddress'].'   </p>
				  <p><strong>Phone Number:	 </strong>'.$row['PhoneNumber'].'    </p>
 			      <p><strong>How did you hear about our site?</strong><br>'.$row['OurSite'].'    </p>
				  <p><strong>Specific Email List:	 </strong>'.$row['EmailList'].'    </p>
				  <p><strong>Password: 		 </strong>'.rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($row['Password']), MCRYPT_MODE_CBC, md5(md5($key))), "\0").'  </p>
				  <p><strong>Status:   		 </strong>';
				  if($row['Status']=="1"){
				  echo "Enable";
				  }else{
				  echo "Disable ";
				  }
				  echo '  </p>
			     <p><strong>Date Created: </strong>'.$row['DateCreated'].'  </p>
				 </div>
 				 <div class="modal-footer">
                  <button class="btn btn-primary" data-dismiss="modal" type="button">Close</button>
                </div>
              </div>
            </div>
          </div>';
	}
		echo'</tbody></table>';
}
if(isset($_GET['y'])&& !isset($_GET['ac'])){	
		$id = base64_decode($_GET['y']);
		$delete = "delete from `account` where Id = $id AND `AccountType`='3'";
		$run = mysqli_query($db, $delete);
		if($run==0){
		$errors[] ="Please Try again.";
		@header( "refresh:1;manage-site-users");
		}else
		{
		$success.= "Record has been successfully deleted.";
		@header("refresh:0;url=manage-site-users");
		}
}
if(isset($_GET['y'])&& isset($_GET['ac'])){	
		$id = base64_decode($_GET['y']);
		$action = $_GET['ac'];

		if($action== "1"){
		$insert = "UPDATE `account` SET `Status`='0' where `Id`='".$id."'   AND `AccountType`='3' ";
		$result = $db->query($insert);
		// Procedural way
		$run = mysqli_query($db, $insert);
		$_SESSION["success"] = "Disable Successfully.";	
		@header("refresh:0;url=manage-site-users");
		}
		elseif($action== "Inactive"){
		$insert = "UPDATE `account` SET `Status`='1' where `Id`='".$id."'  AND `AccountType`='3' ";
		$result = $db->query($insert);
		// Procedural way
		$run = mysqli_query($db, $insert);
		$_SESSION["success"] = "Enable Successfully.";	
		@header("refresh:0;url=manage-site-users");
		}else{
		$insert = "UPDATE `account` SET `Status`='1' where `Id`='".$id."'  AND `AccountType`='3' ";
		$result = $db->query($insert);
		$_SESSION["success"] = "Enable Successfully.";	
		@header("refresh:0;url=manage-site-users");
		}
	}
?>
<script>
function confirmDelete()
{
return confirm("Are you sure you want to delete this Site User?");
}
</script> 


		 
