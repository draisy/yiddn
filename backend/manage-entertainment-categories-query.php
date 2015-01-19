<?php
$errors = array();
$success = null;
function ShowEntertainmentDirectoryCategories(){
	$key='';
	global $db;
	$query = 'SELECT * FROM `categories` WHERE `UseFor`="5" ORDER By Id DESC';
	$result = $db->query($query);
	$total_results = $result->num_rows;
	$count = 1;
		echo '<table class="table table-bordered table-striped" id="dataTable1">
            <thead>
			<tr>
			<th colspan="4" style="background-image:none !important;color:#000 !important; cursor:default !important">
		<strong>Total '.$total_results.' record(s) found.</strong>
			</th>
			</tr>
			  <tr  class="btn-primary">
			  <th>#</th>
              <th>Title</th>
              <th>Date Created </th>
              <th>Action</th>
			  </tr>
              
	  	
		</thead><tbody>';
	while ($row = $result->fetch_assoc()) 
	{
	echo '
	
		<tr>
		<td>'.$count++.'</td>
		<td>'.$row['Title'].'</td>
		<td>'.$row['DateCreated'].'</td>
		<td>
  	    <a class="table-actions" data-toggle="modal" href="#myModal-'.$row['Id'].'" title="View"><i class="icon-list-alt"></i></a>
		<a class="table-actions" href="manage-entertainment-categories?y='.base64_encode($row['Id']).'&ac='.$row['Status'].'" title="Status">';
		if($row['Status']=="1"){
			echo '<i class="icon-eye-open"></i>';
		 }else{
			echo '<i class="icon-eye-close "></i>';
		}
   echo '</a>
		<a class="table-actions" href="edit-entertainment-category?y='.base64_encode($row['Id']).'" title="Edit"><i class="icon-pencil"></i></a>
		<a class="table-actions" href="manage-entertainment-categories?y='.base64_encode($row['Id']).'" title="Delete" onclick="return confirmDelete();"><i class="icon-trash"></i></a>
		<a class="table-actions" href="manage-entertainment-categories?y='.base64_encode($row['Id']).'&mf='; 
		 if($row['Mf']=='yes'){
			echo 'no';
		 }elseif($row['Mf']=='no'){
			echo 'yes';
		 }else{
			echo 'yes';
		}echo'" title="Make Feature"><i class="icon-home"> Make Feature: '.ucwords($row['Mf']).'</i></a>
		</td>
		</tr>
	';
	echo '<div class="modal fade" id="myModal-'.$row['Id'].'">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button aria-hidden="true" class="close" data-dismiss="modal" type="button">×</button>
                  <h4 class="modal-title">Jewish E-Tailers Category</h4>
                </div>
                <div class="modal-body">
                  <p><strong>Title:	 	   </strong>'.$row['Title'].'      </p>
			      <p><strong>Description:  </strong><br>'.$row['Description'].'    </p>
				  <p><strong>Status:   	   </strong>';
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
		echo'</tbody> </table>';
}
if(isset($_GET['y'])&& !isset($_GET['ac']) && !isset($_GET['mf']) ){	
		$id = base64_decode($_GET['y']);
		$delete = "delete from `categories` where Id = $id";
		$run = mysqli_query($db, $delete);
		if($run==0){
		$errors[] ="Please Try again.";
		@header( "refresh:0;manage-entertainment-categories");
		}else
		{
		$success.= "Record has been successfully deleted.";
		@header("refresh:0;url=manage-entertainment-categories");
		}
}

if(isset($_GET['y'])&& isset($_GET['ac'])){	
		$id = base64_decode($_GET['y']);
		$action = $_GET['ac'];

		if($action== "1"){
		$insert = "UPDATE `categories` SET `Status`='0' where `UseFor`='5' AND  `Id`='".$id."' ";
		$result = $db->query($insert);
		// Procedural way
		$run = mysqli_query($db, $insert);
		$_SESSION["success"] = "Disable Successfully.";	
		@header("refresh:0;url=manage-entertainment-categories");
		}
		elseif($action== "Inactive"){
		$insert = "UPDATE `categories` SET `Status`='1' where `UseFor`='5' AND  `Id`='".$id."' ";
		$result = $db->query($insert);
		// Procedural way
		$run = mysqli_query($db, $insert);
		$_SESSION["success"] = "Enable Successfully.";	
		@header("refresh:0;url=manage-entertainment-categories");
		}else{
		$insert = "UPDATE `categories` SET `Status`='1' where `UseFor`='5' AND  `Id`='".$id."'";
		$result = $db->query($insert);
		$_SESSION["success"] = "Enable Successfully.";	
		@header("refresh:0;url=manage-entertainment-categories");
		}
	}
	
if(isset($_GET['y'])&& isset($_GET['mf'])){	
		$id = base64_decode($_GET['y']);
		$action = $_GET['mf'];

		if($action == "yes"){
	$UPDATE = "UPDATE `categories` SET `Mf`='yes' where `UseFor`='5' AND  `Id`='".$id."' ";
	$query = $db->query($UPDATE);
		$_SESSION["success"] = "Disable Make Feature Successfully.";	
	@header("refresh:0;url=manage-jewish-e-tailers-categories");
		}
		elseif($action == "no"){
	$UPDATE = "UPDATE `categories` SET `Mf`='no' where `UseFor`='5' AND  `Id`='".$id."' ";
	$query = $db->query($UPDATE);
		$_SESSION["success"] = "Make Feature Successfully.";	
	@header("refresh:0;url=manage-jewish-e-tailers-categories");
		}else{
	$UPDATE = "UPDATE `categories` SET `Mf`='yes' where `UseFor`='5' AND  `Id`='".$id."'";
	$query = $db->query($UPDATE);
		$_SESSION["success"] = "Make Feature Successfully.";	
	@header("refresh:0;url=manage-entertainment-categories");
		}
}
?>
<script>
function confirmDelete()
{
return confirm("Are you sure you want to delete this Category?");
}
</script> 