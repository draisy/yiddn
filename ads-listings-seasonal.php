<?php
$tb_seasonal = 'SELECT * FROM `tb_seasonal` WHERE `Status`="1" AND `Category`="'.$data1['Id'].'" OR `Category2`="'.$data1['Id'].'"  OR `Category3`="'.$data1['Id'].'" ORDER BY `CompanyWebsite` ASC';
$result = $db->query($tb_seasonal);
$total  = $result->num_rows;
if($total > 0){
  $featured_text = false;
	while ($data_row = $result->fetch_assoc()) 
		{
	$city        = $db->query('SELECT * FROM `city` JOIN `country` ON `city`.CountryId=`country`.Id Where `city`.Id="'.$data_row['City'].'"');
	$city_code   = $city->fetch_assoc();			
	?>		
				
<?php if($data1['Id']==$data_row['Category']&& $data_row['Banner']!=""){
  if ($featured_text == false) {echo "<h3>Featured Ads</h3><br/>"; $featured_text = true;};
?>  
<div> 
<a href="<?=$data1['Seo']?>/<?=$data_row['Seo']?>" class="btn btn-default venoboxframe" data-type="iframe" title="<?=$data_row['CompanyName'];?>">
<img src="<?php echo ADDRESS_SITE;?>images/Banner/<?php echo $data_row['Banner'];?>" />
</a>
</div>
<br>
<?php }?>


<?php if($data1['Id']==$data_row['Category2'] && $data_row['Banner2']!=""){
  if ($featured_text == false) {echo "<h3>Featured Ads</h3><br/>"; $featured_text = true;};
?>
<div>
<a href="<?=$data1['Seo']?>/<?=$data_row['Seo']?>" class="btn btn-default venoboxframe" data-type="iframe" title="<?=$data_row['CompanyName'];?>">
<img src="<?php echo ADDRESS_SITE;?>images/Banner/<?php echo $data_row['Banner2'];?>" />
</a>
</div>
<br>
<?php }?>

<?php if($data1['Id']==$data_row['Category3'] && $data_row['Banner3']!=""){
  if ($featured_text == false) {echo "<h3>Featured Ads</h3><br/>"; $featured_text = true;};
?>
<div>
<a href="<?=$data1['Seo']?>/<?=$data_row['Seo']?>" class="btn btn-default venoboxframe" data-type="iframe" title="<?=$data_row['CompanyName'];?>">
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
$dir = "listingads/jewish-e-tailers/";
$images = scandir($dir);
$i = rand(2, sizeof($images)-1);
$my_images = array (
  "0" =>  "../../listingads/jewish-e-tailers/".$images[$i]
);
$filename = randomImage1($my_images);
$key = array_search($filename, $my_images); // $key = 2;
$ID_Modal="1";
$dirs = opendir('listingads/jewish-e-tailers/');
*/
?> 

<?php // if($filename !="" && $filename !="listingads/jewish-e-tailers/Thumbs.db"){?>
<!-- <div>
<img src="<?php echo $filename;?>" />
</div> -->
<?php //}?> 
