<?php
require_once('include/config.php'); 
require_once('include/user-check.php'); 
@header('Content-type: application/vnd.ms-excel');
@header("Content-Disposition: attachment; filename=download-subscribers.xls");
?>
<table width="100%" border="1" cellpadding="8" cellspacing="2" bordercolor="#ccc">
<tr style="background-color:#96257F;color:#fff; font-weight:bold;">
  <td>Id</td>
  <td>Email</td>
  <td>Type</td>
</tr>
<?php
$query = 'SELECT * FROM `subscribers` ORDER By Id ASC';
$result = $db->query($query);
$total_results = $result->num_rows;
$count = 1;
while ($row = $result->fetch_assoc()) 
{
?>
<tr>
  <td style=""><?php echo $count++;?></td>
  <td style=""><?php echo $row['Email'];?></td>
  <td style=""><?php echo $row['Type'];?></td>
  <td style=""><?php echo $row['DateAdded'];?></td>
</tr>
<?php }?>
</table>