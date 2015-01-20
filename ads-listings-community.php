<?php
 $tb_local =  'SELECT * FROM `tb_local` WHERE  `Status`="1" AND `City`="'.$data1['Id'].'" OR `City2`="'.$data1['Id'].'" OR `City3`="'.$data1['Id'].'" group by Category1';
$result = $db->query($tb_local);
$total  = $result->num_rows;
if($total > 0){
  $featured_text = false;
	while ($data_row = $result->fetch_assoc()) 
		{
	$city        = $db->query('SELECT * FROM `city` JOIN `country` ON `city`.CountryId=`country`.Id Where `city`.Id="'.$data_row['City'].'"');
	$city_code   = $city->fetch_assoc();			
	?>		
				
<?php if($data2['Id']==$data_row['City']&& $data_row['Banner']!=""){
  if ($featured_text == false) {echo "<h3>Featured Ads</h3><br/>"; $featured_text = true;};
?>  
<div>
<a href="<?=$data2['ProvinceSeo']?>/<?=$data_row['Seo']?>">
<img src="<?php echo ADDRESS_SITE;?>images/Banner/<?php echo $data_row['Banner'];?>" />
</a>
</div>
<br>
<?php }?>


<?php if($data2['Id']==$data_row['City2'] && $data_row['Banner2']!=""){
   if ($featured_text == false) {echo "<h3>Featured Ads</h3><br/>"; $featured_text = true;};
?> 
<div>
<a href="<?=$data2['ProvinceSeo']?>/<?=$data_row['Seo']?>">
<img src="<?php echo ADDRESS_SITE;?>images/Banner/<?php echo $data_row['Banner2'];?>" />
</a>
</div>
<br>
<?php }?>

<?php if($data2['Id']==$data_row['City3'] && $data_row['Banner3']!=""){
  if ($featured_text == false) {echo "<h3>Featured Ads</h3><br/>"; $featured_text = true;};
?> 
<div>
<a href="<?=$data2['ProvinceSeo']?>/<?=$data_row['Seo']?>">
<img src="<?php echo ADDRESS_SITE;?>images/Banner/<?php echo $data_row['Banner3'];?>" />
</a>
</div>
<br>
<?php }?>

	
	<?php }
}
?>

<?php 
  function randomImage1 ($array) {
  $total = count($array);
  $call = rand(0,$total-1);
  return $array[$call];
  }
?>
<?php /*
$dir = "listingads/local-directory/";
$images = scandir($dir);
$i = rand(2, sizeof($images)-1);
$my_images = array (
  "0" =>  "../../../listingads/local-directory/".$images[$i]
);
$filename = randomImage1($my_images);
$key = array_search($filename, $my_images); // $key = 2;
$ID_Modal="1";
$dirs = opendir('listingads/local-directory/');
*/
?> 

<?php //if($filename !="" && $filename !="listingads/local-directory/Thumbs.db"){?>
<!-- <div>
<img src="<?php //echo $filename;?>" />
</div> -->
<?php //}?> 