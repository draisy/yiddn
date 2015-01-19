<?php
require_once('include/config.php'); 
require_once('include/user-check.php'); 

$dir = $_GET['directory'];
echo '
<label for="Title">Select New Sub-Category</label>
<select class="select2able form-control" name="Category1" id="CategoryNew">';
?>
<?php
if ($dir == 3) { ?>
	<option value="">Please select</option>
		<?php
			$query = 'SELECT * FROM `categories` WHERE `Status`="1" AND `UseFor`="3" AND `CityID`="0" ORDER By Title ASC';
			$result = $db->query($query);
			while ($row = $result->fetch_assoc()) 
				{	
			?>
				<option value="<?php echo $row['Id'];?>"><?php echo $row['Title'];?></option>
			<?php }
} elseif ($dir == 7) { ?>
	<option value="">Please select</option>
	<?php
		$query = 'SELECT * FROM `categories` WHERE `Status`="1" AND `UseFor`="7" ORDER By Title ASC';
		$result = $db->query($query);
		while ($row = $result->fetch_assoc()) 
		{	
		?>
		<option value="<?php echo $row['Id'];?>"><?php echo $row['Title'];?></option>
	<?php }
} else {
	echo'
	<option value="">Please select</option>';

	$query = "SELECT * FROM `categories` WHERE `Status`='1' AND  `UseFor`=$dir ORDER By Title ASC";
	$result = $db->query($query);
	while ($row = $result->fetch_assoc()) 
	{	
	?>
	 <optgroup label="<?php echo $row['Title'];?>">
		<?php 
		$query2 = 'SELECT * FROM `sub-categories` where `Status`="1" AND `Cid`="'.$row['Id'].'"';
		$result2 = $db->query($query2);
		while ($row2 = $result2->fetch_assoc()) 
		{
		?>
		 <option value="<?php echo $row2['Id'];?>"><?php echo $row2['Title'];?></option>
		<?php }?>
	 </optgroup>
	<?php }
} ?>
</select>
