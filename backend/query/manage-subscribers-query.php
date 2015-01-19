<?php
$errors = array();
$success = null;
function ShowSubscribers(){
	$key='';
	global $db;
	$query = 'SELECT * FROM `subscribers`  ORDER By Id DESC';
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
              <th>Email</th>
			  <th>Type</th>
			  <th>Date Created</th>
		<!--    <th>Action</th>-->
           </tr>
		</thead><tbody>';
	while ($row = $result->fetch_assoc()) 
	{
	echo '
	
		<tr>
		<td>'.$count++.'</td>
		<td>'.$row['Email'].'</td>
		<td>'.$row['Type'].'</td>
		<td>'.$row['DateAdded'].'</td>
		<!-- <td>
  	    <a class="table-actions" data-toggle="modal" href="#myModal-'.$row['Id'].'" title="View"><i class="icon-list-alt"></i></a>
		<a class="table-actions" href="request?y='.base64_encode($row['Id']).'&ac=" title="Status">';
		if($row['Status']=="1"){
			echo '<i class="icon-eye-open"></i>';
		 }else{
			echo '<i class="icon-eye-close "></i>';
		}
   echo '</a>
		<a class="table-actions" href="edit-request?y='.base64_encode($row['Id']).'" title="Edit"><i class="icon-pencil"></i></a>
		<a class="table-actions" href="request?y='.base64_encode($row['Id']).'" title="Delete" onclick="return confirmDelete();"><i class="icon-trash"></i></a></td>-->
		</tr>
	
	';
	
	}
		echo'</tbody></table>';
}
?>
		 
