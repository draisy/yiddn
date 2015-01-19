<?php 
require_once('inc.files.php');
require_once('user-check.php'); 
if(isset($_GET['n']) && isset($_GET['b'])) {

		if (file_exists('images/Banner/'.$_GET['n']))  
		{  
			unlink('images/Banner/'.$_GET['n']);  
		}	 			
   $sql  = "UPDATE `tb_local` SET `".$_GET['Banner']."`=''  Where `OrderId`= '".$_SESSION['OrderId']."'";
		$res = mysqli_query($db, $sql);
	echo "<script>window.open('update-local-directory-step3','_self')</script>";
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title><?=$row_home->Title;?> - Update Local Directory Step 3</title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <link href='http://fonts.googleapis.com/css?family=Comfortaa:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
<link href="css/inner.css" rel="stylesheet">
 <link rel="stylesheet" href="css/reset.css" type="text/css" media="all" />
  <link href="css/innermedia.css" rel="stylesheet">
  <link href="css/dashboard.css" rel="stylesheet">
  <link rel="stylesheet" href="css/newform.css" type="text/css" />
   <link rel="stylesheet" href="css/dropdown.css" />


<script src="js/jquery.min.js" type="text/javascript"></script>

<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script>

	/*--- OnLoad Where do you want your ad to show? ---*/	
	$(document).ready(function() {
		if ($("#Premium").is(':checked')) {
			$("#ShowMore").show();
			document.getElementById("div1").style.display = "block";
		}else{
			document.getElementById("div1").style.display = "none";
		}
		if ($("#Premium2").is(':checked')) {
			$("#ShowMore").show();
			document.getElementById("div2").style.display = "block";
		}else{
			document.getElementById("div2").style.display = "none";
		}
		if ($("#Premium3").is(':checked')) {
			$("#ShowMore").show();
			document.getElementById("div3").style.display = "block";
		}else{
			document.getElementById("div3").style.display = "none";
		}
/*--- OnClick Where do you want your ad to show? ---*/	
		$("#Premium").on("click",function(){
			if ($("#Premium").is(':checked')) {
				$("#ShowMore").show();
				document.getElementById("div1").style.display = "block";
			}else{
				document.getElementById("div1").style.display = "none";
			}
		});
		$("#Premium2").on("click",function(){
			if ($("#Premium2").is(':checked')) {
				$("#ShowMore").show();
				document.getElementById("div2").style.display = "block";
			}else{
				document.getElementById("div2").style.display = "none";
			}
		});
		$("#Premium3").on("click",function(){
			if ($("#Premium3").is(':checked')) {
				$("#ShowMore").show();
				document.getElementById("div3").style.display = "block";
			}else{
				document.getElementById("div3").style.display = "none";
			}
		});
	});
</script>
   </head>
<body>	




<!--Header -->  
 <?php require_once('inc.header.php'); ?>
<!--/Header -->




   
 <!--Navigation -->
	<?php require_once('inc.navigation.php'); ?>
 <!--/Navigation -->


       <div class="cl">&nbsp;</div>

   	<section id="content-main" style="width:100%;">
    <div class="shell">
    
    <div id="main">
	<div id='article' style="width:90%;">
             <?php require_once('inc.dashboadlinks.php'); ?>

    
 <br>
<br>
<br><br>
  <h3>POST YOUR LISTING</span></h3>
     

       
       <fieldset>
       <legend>
       <h4>STEP 3: Where do you want your ad to show?</h4>
       </legend>

<?php 
$query = "select * from `tb_local` where `OrderId`= '".base64_decode($_GET['i'])."'  AND  `UserId`= '".$_SESSION['Yiddn_login_Id']."'";
$result = $db->query($query);
if($result->num_rows > 0){	
$row_result = $result->fetch_object();

$query = 'SELECT * FROM `order` WHERE `OrderId`="'.$row_result->OrderId.'"';
$results = $db->query($query);
$rows = $results->fetch_object();
?>        
<form enctype="multipart/form-data" class="newform" method="post" action="update-local-directory-step3-script">      
    <br>
<fieldset class="newfiled">
    <legend><h5>City 1</h5></legend>
    <div class="inputitem">
     <!--<a href="#" style="float:right;" class="purpule">Want to suggest a new Category?</a>--> 
     <label class="title"></label>
     <div class="item-cont">
<select name="City" id="City">
	<option value="">Please select</option>
	<?php
    $query = 'SELECT * FROM `country` WHERE `Status`="1" ORDER By `Country` ASC';
    $result = $db->query($query);
    while ($row = $result->fetch_assoc()) 
    {	
    ?>
        <optgroup label="<?php echo $row['Country'];?>">
        <?php  
        $query2 = 'SELECT * FROM `city` where `Status`="1" AND `CountryId`="'.$row['Id'].'"';
        $result2 = $db->query($query2);
        while ($row2 = $result2->fetch_assoc()) 
        {
        ?>
        <option value="<?php echo $row2['Id'];?>" <?php if($row_result->City==$row2['Id']){echo 'selected="selected"';}?>><?php echo $row2['City'];?></option>
        <?php }?>
        </optgroup>
    <?php }?>
  </select>

    </div>
    
    <br>

    <div class="element-checkbox"  title="Checkboxes" >
    <label class="title"></label>		
     <label>
    <input type="checkbox" name="upgrade1" value="4.99" id="upgrade" <?php if($row_result->upgrade=='4.99'){echo 'checked="checked"';}?> />
    <span>Yes, I want to upgrade to a BOLD listing - only $4.99 a month.</span>
    </label>
     <span class="clearfix"></span>
    
     <label>
<input type="checkbox" name="Premium" value="99" id="Premium"  class="chk" onclick="showMe('div1')" <?php if($row_result->Premium=='99'){echo 'checked="checked"';}?> />
<span>Upgrade to premium for maximum impact with a banner ad display - for only $99 a month.</span>
    </label>
    
<div id="div1" style="display:none" class="upload_div">
<small class="note">Note: Only JPG, PNG, and GIF formats will be approved. Animated banners are only acceptable for Pinned Ads. Ads uploaded outside of these formats will not be approved.</small>
    <div class="element-file">
    <label class="title">
    <strong>Upload banner: </strong>
    </label>
<?php if($row_result->Banner!=""){?>
<br />
<a href="images/Banner/<?php echo $row_result->Banner;?>" target="_blank">
<img src="images/Banner/<?php echo $row_result->Banner;?>" width="100" /></a>
<a href='update-local-directory-step3?n=<?php echo $row_result->Banner;?>&b=b&Banner=Banner' onclick='return DeleteBanner();'>Delete</a>
<?php }?> 
<script>
function DeleteBanner()
{
return confirm("Are you sure you want to delete this Banner?");
}
</script>
   
    <label class="large" >
    <div class="button">Choose Banner 1</div>
    <input type="file" class="file_input" name="Banner1" />
    <div class="file_text">No file selected </div>
    </label>
    <small class="note"><em>Banner size should be exactly 302 x 165*</em></small>
    </div>
</div>
               </div>
    
     </fieldset>    
      <br>
	
<fieldset class="newfiled">
    <legend><h5>City 2</h5></legend>
    <div class="inputitem">
      <label class="title"></label><div class="item-cont">
<select name="City2">
    <option value="">Please select</option>
	<?php
    $query = 'SELECT * FROM `country` WHERE `Status`="1" ORDER By `Country` ASC';
    $result = $db->query($query);
    while ($row = $result->fetch_assoc()) 
    {	
    ?>
        <optgroup label="<?php echo $row['Country'];?>">
        <?php 
        $query2 = 'SELECT * FROM `city` where `Status`="1" AND `CountryId`="'.$row['Id'].'"';
        $result2 = $db->query($query2);
        while ($row2 = $result2->fetch_assoc()) 
        {
        ?>
        <option value="<?php echo $row2['Id'];?>" <?php if($row_result->City2==$row2['Id']){echo 'selected="selected"';}?>><?php echo $row2['City'];?></option>
        <?php }?>
        </optgroup>
    <?php }?>
</select>

    </div>
    
    <br>

    <div class="element-checkbox"  title="Checkboxes" >
    <label class="title"></label>		
     <label>
    <input type="checkbox" name="upgrade2" value="4.99" id="upgrade2" <?php if($row_result->upgrade2=='4.99'){echo 'checked="checked"';}?>/>
    <span>Yes, I want to upgrade to a BOLD listing - only $4.99 a month.</span>
    </label>
     <span class="clearfix"></span>
   <label> 
<input type="checkbox" name="Premium2" value="99" id="Premium2" class="chk" onclick="showMe('div2')" <?php if($row_result->Premium2=='99'){echo 'checked="checked"';}?>/>
<span>Upgrade to premium for maximum impact with a banner ad display - for only $99 a month.</span>
    </label>
<div id="div2" style="display:none" class="upload_div">
<small class="note">Note: Only JPG, PNG, and GIF formats will be approved. Animated banners are only acceptable for Pinned Ads. Ads uploaded outside of these formats will not be approved.</small>
    <div class="element-file">
    <label class="title">
    <strong>Upload banner: </strong>
    </label>
<?php if($row_result->Banner2!=""){?>
<br />
<a href="images/Banner/<?php echo $row_result->Banner2;?>" target="_blank">
<img src="images/Banner/<?php echo $row_result->Banner2;?>" width="100" /></a>
<a href='update-local-directory-step3?n=<?php echo $row_result->Banner2;?>&b=b&Banner=Banner2' onclick='return DeleteBanner();'>Delete</a>
<?php }?> 
<script>
function DeleteBanner()
{
return confirm("Are you sure you want to delete this Banner?");
}
</script>

    <label class="large" >
    <div class="button">Choose Banner 2</div>
    <input type="file" class="file_input" name="Banner2" />
    <div class="file_text">No file selected </div>
    </label>
    <small class="note"><em>Banner size should be exactly 302 x 165*</em></small>
    </div>
</div>    
   </div>
    
     </fieldset>
     <br>
     
<fieldset class="newfiled">
    <legend><h5>City 3</h5></legend>
    <div class="inputitem">
      <label class="title"></label><div class="item-cont">
<select name="City3">
   <option value="">Please select</option>
	<?php
    $query = 'SELECT * FROM `country` WHERE `Status`="1" ORDER By `Country` ASC';
    $result = $db->query($query);
    while ($row = $result->fetch_assoc()) 
    {	
    ?>
        <optgroup label="<?php echo $row['Country'];?>">
        <?php 
        $query2 = 'SELECT * FROM `city` where `Status`="1" AND `CountryId`="'.$row['Id'].'"';
        $result2 = $db->query($query2);
        while ($row2 = $result2->fetch_assoc()) 
        {
        ?>
        <option value="<?php echo $row2['Id'];?>" <?php if($row_result->City3==$row2['Id']){echo 'selected="selected"';}?>><?php echo $row2['City'];?></option>
        <?php }?>
        </optgroup>
    <?php }?>
</select>

    </div>
    
    <br>

    <div class="element-checkbox"  title="Checkboxes" >
    <label class="title"></label>		
     <label>
<input type="checkbox" name="upgrade3" value="4.99" id="upgrade3" <?php if($row_result->upgrade3=='4.99'){echo 'checked="checked"';}?>/>
    <span>Yes, I want to upgrade to a BOLD listing - only $4.99 a month.</span>
    </label>
     <span class="clearfix"></span>
    
     <label>        
<input type="checkbox" name="Premium3" value="99" id="Premium3" class="chk" onclick="showMe('div3')" <?php if($row_result->Premium3=='99'){echo 'checked="checked"';}?>/>
<span>Upgrade to premium for maximum impact with a banner ad display - for only $99 a month.</span>
    </label>
<div id="div3" style="display:none" class="upload_div">
<small class="note">Note: Only JPG, PNG, and GIF formats will be approved. Animated banners are only acceptable for Pinned Ads. Ads uploaded outside of these formats will not be approved.</small>
    <div class="element-file">
    <label class="title">
    <strong>Upload banner: </strong>
    </label>
<?php if($row_result->Banner3!=""){?>
<br />
<a href="images/Banner/<?php echo $row_result->Banner3;?>" target="_blank">
<img src="images/Banner/<?php echo $row_result->Banner3;?>" width="100" /></a>
<a href='update-local-directory-step3?n=<?php echo $row_result->Banner3;?>&b=b&Banner=Banner3' onclick='return DeleteBanner();'>Delete</a>
<?php }?> 
<script>
function DeleteBanner()
{
return confirm("Are you sure you want to delete this Banner?");
}
</script>
    
    <label class="large" >
    <div class="button">Choose Banner 3</div>
    <input type="file" class="file_input" name="Banner3" />
    <div class="file_text">No file selected </div>
    </label>
    <small class="note"><em>Banner size should be exactly 302 x 165*</em></small>
    </div>
</div>
   </div>
    
     </fieldset>
     <br>
<fieldset class="newfiled">
    <legend><h5>Category</h5></legend>
    <div class="inputitem">
<select name="Category1" id="Category">
            <option value="">Please select</option>
            <?php
            $query = 'SELECT * FROM `categories` WHERE `Status`="1" AND  `UseFor`="3" ORDER By Title ASC';
            $result = $db->query($query);
            while ($row = $result->fetch_assoc()) 
            {	
            ?>
             <option value="<?php echo $row['Id'];?>"  <?php if($row_result->Category1==$row['Id']){echo 'selected="selected"';}?>><?php echo $row['Title'];?></option>
            <?php }?>
			</select>


    </div>
 

<input name="step3"     value="3" id="step" type="hidden" />
<input name="OrderId"  value="<?=base64_decode($_GET['i'])?>" id="OrderId" type="hidden"  />
</fieldset>

    
    
    
    
     
     
    
    
    <div class="submit">
      <input type="submit" onClick="return LocalDirectoryStep3()" name="step3"  value="Next >>"/>     
         <input type="button" value="<< Previous" onClick="window.location='update-local-directory-step2?i=<?php echo $_GET['i'];?>';" class="pre"/>
    </div>
      </form>
    <?php }?>  
      </fieldset>
<script type="text/javascript" src="js/newform.js"></script>

       
       
  	</div>
	</div>
    
    
    
	 
		
	</div>
 

</section>
 
   
    <div class="cl">&nbsp;</div>
                    
                    
                    

        
<!-- Footer -->
<?php require_once('inc.footer.php'); ?>
<!-- /Footer -->
 
      
         
 
        
 
 
 
  
<!-- Java Script -->       
 

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>
<script src="js/liquidmetal.js" type="text/javascript"></script>
<script src="js/jquery.flexselect.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("select.special-flexselect").flexselect({ hideDropdownOnEmptyInput: true });
        $("select.flexselect").flexselect();
        $("input:text:enabled:first").focus();
       /*$("form").submit(function() {
          alert($(this).serialize());
          return false;
        });*/
      });
</script>   
<script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="js\/1.7.2.jquery.min"><\/script>')</script>
<script src="js/modernizr.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/login.js"></script>
<script src="js/custom.js"></script>
  <!-- Java Script -->

 <script type="text/javascript" src="js/local-directory-step3.js"></script>

<script>
function showMe(box) {
        var chboxs = document.getElementsByClassName("chk");
        var vis = "none";
        for(var i=0;i<chboxs.length;i++) { 
            if(chboxs[i].checked){
             vis = "block";
                break;
            }
        }
        document.getElementById(box).style.display = vis;
}
$(document).ready(function() {
	$("#ShowMore").hide();
	$('input[type=checkbox]').click(function(){
		if ($('input[type=checkbox]:checked').length > 0) { 
			$("#ShowMore").show();
		}else{
		$("#ShowMore").hide();
		}
	});
});

</script>
</body>
</html>