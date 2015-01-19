<?php
$tb_torah_resources = 'SELECT * FROM `tb_torah_resources` WHERE `Status`="1" AND `Category`="'.$data2['Id'].'" OR `Category2`="'.$data2['Id'].'"  OR `Category3`="'.$data2['Id'].'" ORDER BY `CompanyWebsite` ASC';
$result = $db->query($tb_torah_resources);
$total  = $result->num_rows;
if($total > 0){
	while ($data_row = $result->fetch_assoc()) 
		{
	$city        = $db->query('SELECT * FROM `city` JOIN `country` ON `city`.CountryId=`country`.Id Where `city`.Id="'.$data_row['City'].'"');
	$city_code   = $city->fetch_assoc();			
	?>		
				
<?php if($data2['Id']==$data_row['Category']&& $data_row['Banner']!=""){?>   
<div>
<a href="<?=$data2['Seo']?>/<?=$data_row['Seo']?>">
<img src="<?php echo ADDRESS_SITE;?>images/Banner/<?php echo $data_row['Banner'];?>" />
</a>
</div>
<br>
<?php }?>


<?php if($data2['Id']==$data_row['Category2'] && $data_row['Banner2']!=""){?>
<div>
<a href="<?=$data2['Seo']?>/<?=$data_row['Seo']?>">
<img src="<?php echo ADDRESS_SITE;?>images/Banner/<?php echo $data_row['Banner2'];?>" />
</a>
</div>
<br>
<?php }?>

<?php if($data2['Id']==$data_row['Category3'] && $data_row['Banner3']!=""){?>
<div>
<a href="<?=$data2['Seo']?>/<?=$data_row['Seo']?>">
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
<?php
$dir = "listingads/torah-and-resources/";
$images = scandir($dir);
$i = rand(2, sizeof($images)-1);
$my_images = array (
  "0" =>  "../../listingads/torah-and-resources/".$images[$i]
);
$filename = randomImage1($my_images);
$key = array_search($filename, $my_images); // $key = 2;
$ID_Modal="1";
$dirs = opendir('listingads/torah-and-resources/');
?> 

<?php if($filename !="" && $filename !="listingads/torah-and-resources/Thumbs.db"){?>
<div>
<img src="<?php echo $filename;?>" />
</div>
<?php }?> 


