<?php 
require_once('inc.files.php');
require_once('user-check.php'); 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title><?=$row_home->Title;?> - Jewish Retailers Step 3</title>
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
 <link href="css/modal.css" rel="stylesheet">

<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="js/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$("#success").hide();
$('#myFormSubmit').click(function(e) {
var NewCategory		 = $("#NewCategory").val();  
var NewSubCategory   = $("#NewSubCategory").val();  
var UserId           = $("#UserId").val();  
var RequestIN        = $("#RequestIN").val();  

if(NewCategory !='' && NewSubCategory!=''){

var dataString = 'NewCategory='+ NewCategory + '&NewSubCategory=' + NewSubCategory +'&UserId='+ UserId+'&RequestIN='+ RequestIN;
		$.ajax({
		url:'Request-New-Category.php',
		//data:$(this).serialize(),
		data: dataString,  
		type:'POST',
				success:function(data){
				//console.log(data);
				$("#success").show(); //=== Show Success Message==
				$("#NewCategory").val('');   
				$("#NewSubCategory").val('');   
				$("#myForm").hide();
				},
			error:function(data){
			$("#error").show().fadeOut(5000); //===Show Error Message====
			}
		});
	}	
		
e.preventDefault(); //=== To Avoid Page Refresh and Fire the Event "Click"===
	});
});
</script>

<script type="text/javascript" src="js/jewish-etailers-step3.js"></script>

<script>
Number.prototype.format = function(n, x) {
    var re = '(\\d)(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$1,');
};
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
			document.getElementById("step3").value = "Next >>";
		}else{
		$("#ShowMore").hide();
			document.getElementById("step3").value = "Submit";
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
<form enctype="multipart/form-data" class="newform" method="post" action="jewish-etailers-step3-script">      
	 
	       
    <br>

 
<fieldset class="newfiled">
    <legend><h5>Category 1</h5></legend>
    <div class="inputitem">
     <!--<a href="#" style="float:right;" class="purpule">Want to suggest a new Category?</a> -->
     <label class="title"></label>
     <div class="item-cont">
 <a href="#modal" class="big-link" data-reveal-id="Modal" style="float:right; margin-bottom:10px; color:#8A0E6E;">Want to suggest a new Category?</a>    
<select name="Category1" id="Category">
	<option value="">Please select</option>
<?php
$query = 'SELECT * FROM `categories` WHERE  `Status`="1" AND `UseFor` IN ("6","2") ORDER By Title ASC';
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
<?php }?>
</select>

    </div>
    
    <br>

    <div class="element-checkbox"  title="Checkboxes" >
    <label class="title"></label>		
     <label>
    <input type="checkbox" name="upgrade1" value="4.99" id="upgrade" />
    <span>Yes, I want to upgrade to a BOLD listing - only $4.99 a month.</span>
    </label>
     <span class="clearfix"></span>
    
     <label>
<input type="checkbox" name="Premium" value="99" id="Premium"  class="chk" onclick="showMe('div1')" />
<span>Upgrade to premium for maximum impact with a banner ad display - for only $99 a month.</span>
    </label>
    
<div id="div1" style="display:none" class="upload_div">
<small class="note">Note: Only JPG, PNG, and GIF formats will be approved. Animated banners are only acceptable for Pinned Ads. Ads uploaded outside of these formats will not be approved.</small>
    <div class="element-file">
    <label class="title">
    <strong>Upload banner: </strong>
    </label>
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
    <legend><h5>Category 2 (<span style="font-size:14px; color:#8A0E6E;">optional</span>)</h5></legend>
    <div class="inputitem">
      <label class="title"></label><div class="item-cont">
<select name="Category2">
    <option value="">Please select</option>
    <?php
    $query = 'SELECT * FROM `categories` WHERE `Status`="1" AND  `UseFor` IN ("6","2") ORDER By Title ASC';
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
    <?php }?>
</select>

    </div>
    
    <br>

    <div class="element-checkbox"  title="Checkboxes" >
    <label class="title"></label>		
     <label>
    <input type="checkbox" name="upgrade2" value="4.99" id="upgrade2"/>
    <span>Yes, I want to upgrade to a BOLD listing - only $4.99 a month.</span>
    </label>
     <span class="clearfix"></span>
   <label> 
<input type="checkbox" name="Premium2" value="99" id="Premium2" class="chk" onclick="showMe('div2')"/>
<span>Upgrade to premium for maximum impact with a banner ad display - for only $99 a month.</span>
    </label>
<div id="div2" style="display:none" class="upload_div">
<small class="note">Note: Only JPG, PNG, and GIF formats will be approved. Animated banners are only acceptable for Pinned Ads. Ads uploaded outside of these formats will not be approved.</small>
    <div class="element-file">
    <label class="title">
    <strong>Upload banner: </strong>
    </label>
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
    <legend><h5>Category 3 (<span style="font-size:14px; color:#8A0E6E;">optional</span>)</h5></legend>
    <div class="inputitem">
      <label class="title"></label><div class="item-cont">
<select name="Category3">
    <option value="">Please select</option>
    <?php
    $query = 'SELECT * FROM `categories` WHERE  `Status`="1" AND `UseFor` IN ("6","2") ORDER By Title ASC';
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
    <?php }?>
</select>

    </div>
    
    <br>

    <div class="element-checkbox"  title="Checkboxes" >
    <label class="title"></label>		
     <label>
<input type="checkbox" name="upgrade3" value="4.99" id="upgrade3"/>
    <span>Yes, I want to upgrade to a BOLD listing - only $4.99 a month.</span>
    </label>
     <span class="clearfix"></span>
    
     <label>        
<input type="checkbox" name="Premium3" value="99" id="Premium3" class="chk" onclick="showMe('div3')"/>
<span>Upgrade to premium for maximum impact with a banner ad display - for only $99 a month.</span>
    </label>
<div id="div3" style="display:none" class="upload_div">
<small class="note">Note: Only JPG, PNG, and GIF formats will be approved. Animated banners are only acceptable for Pinned Ads. Ads uploaded outside of these formats will not be approved.</small>
    <div class="element-file">
    <label class="title">
    <strong>Upload banner: </strong>
    </label>
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
    <legend><h5>City</h5></legend>
    <div class="inputitem">
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
        $query2 = 'SELECT * FROM `city` where `CountryId`="'.$row['Id'].'" AND `Status`="1"';
        $result2 = $db->query($query2);
        while ($row2 = $result2->fetch_assoc()) 
        {
        ?>
        <option value="<?php echo $row2['Id'];?>"><?php echo $row2['City'];?></option>
        <?php }?>
        </optgroup>
    <?php }?>
</select>


    </div>
 

<input name="step3"     value="3" id="step" type="hidden" />
<input name="orderid"  value="<?=$_SESSION['OrderId']?>" id="orderid" type="hidden"  />
</fieldset>

    
    
    
    
     
     
    
    
<div class="submit">
<input type="submit" onClick="return JewishEtailersStep3()" id="step3" name="step3"  value="Submit"/>     
<input type="button" value="<< Previous" onclick="return confirmBack();" class="pre"/>
</div>
          
<script type="text/javascript">
   function confirmBack()
{
	Return = confirm("If you click on back button the data will be cleared?");
if (Return==true){
	window.location='update-jewish-etailers-step2?i=<?=base64_encode($_SESSION['OrderId']);?>';
	
  }
}
</script>
  
    
      </form>
      </fieldset>
      <!--modal content -->
<div id="modal" class="modal">
    <div class="modal-content">
        <div class="header">
            <h2>Request New Category</h2>
        </div>
        <div class="copy">
            <p>
      <div id="success" class='success'>Your Request Has Been Successfully Submitted</div>
        <form id="myForm" method="post" class="newform">
    
    <fieldset>
        <legend><h2>New Category</h2></legend>
       
       <div class="inputitem">
        <label for="NewCategory">New Category:</label>
        <input name="NewCategory" id="NewCategory" type="text" class="large" required />
       </div>
       
       <div class="inputitem"> 
        <label for="NewSubCategory">New Sub Category:</label>
        <input name="NewSubCategory" id="NewSubCategory" class="large" type="text" required />
       </div>
       
        <input  id="UserId" name="UserId" type="hidden" value="<?php echo $_SESSION["Yiddn_login_Id"] ?>"  />
        <input  id="RequestIN" name="RequestIN" type="hidden" value="Jewish E-Taile" />
		<input  id="myFormSubmit" name="myFormSubmit" type="button" value="Submit" class="add-btn">
    </fieldset>
        
        </form>      
            </p>
        </div>
        <div class="cf footer">
            <a href="#" class="closebtn">Close</a>
        </div>
    </div>
    <div class="overlay"></div>
</div>    
    	<!--modal content -->
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


</body>
</html>