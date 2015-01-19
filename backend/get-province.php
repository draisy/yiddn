<?php
require_once('include/config.php'); 
require_once('include/user-check.php'); 
$CountryId=$_REQUEST['CountryId'];
?>
<select class="select2able" name="ProvinceId" style="width:100%; padding:5px;  border:solid 1px #AAAAAA;
    border-bottom-left-radius:4px;
    border-bottom-right-radius:4px;
    border-top-left-radius:4px;
    border-top-right-radius:4px;">
<!--<option>--Select--</option>-->
<?php 
// Set up query
$query2 = 'SELECT * FROM `province` where `Status`="1" AND `CountryId`="'.$CountryId.'"';
// OOP way
$result2 = $db->query($query2);
// Procedural way
while ($row1 = $result2->fetch_assoc()) 
{
?>
<option value="<?php echo $row1['Id'];?>"><?php echo $row1['Province'];?> </option>
<?php } ?>
</select>
