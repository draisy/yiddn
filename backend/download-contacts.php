<?php
require_once('include/config.php'); 
require_once('include/user-check.php'); 
@header('Content-type: application/vnd.ms-excel');
@header("Content-Disposition: attachment; filename=download-contacts.xls");
?>
<table width="100%" border="1" cellpadding="8" cellspacing="2" bordercolor="#ccc">
<tr style="background-color:#96257F;color:#fff; font-weight:bold;">
  <td>Id</td>
  <td>FirstName / LastName</td>
  <td>City</td>
  <td>Province</td>
  <td>Zipcode</td>
  <td>Country</td>
  <td>Phone</td>
  <td>Email</td>
</tr>
<?php
$query = 'SELECT * FROM `account` WHERE `AccountType`="3" AND `EmailList`="yes" ORDER By Id DESC';
$result = $db->query($query);
$total_results = $result->num_rows;
$count = 1;
while ($row = $result->fetch_assoc()) 
{
?>
<tr>
  <td style=""><?php echo $count++;?></td>
  <td style=""><?php echo $row['FirstName']." / ".$row['LastName'];?></td>
  <td style=""><?php echo $row['City'];?></td>
  <td style=""><?php echo $row['StateProvince'];?></td>
  <td style=""><?php echo $row['Zipcode'];?></td>
  <td style=""><?php echo $row['Country'];?></td>
  <td style=""><?php echo $row['PhoneNumber'];?></td>
  <td style=""><?php echo $row['EmailAddress'];?></td>
</tr>
<?php }?>
</table>