<?php
 require_once('backend/include/config.php');
if($_REQUEST)
{
	$key = '';	
	$Email   = $_REQUEST['Email'];
	$query = "select * from `account` where `EmailAddress`= '".$Email."'";
	$result = $db->query($query);
	if($result->num_rows > 0) // not available
		{
			echo "<script>
			document.getElementById('Email').value='';
			</script>";
			echo '<br><div class="required">
			The Email is Already registered in our system.</div>';
		}
}
?>
