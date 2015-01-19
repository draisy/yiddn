<?php 
require_once('inc.files.php');
require_once('user-check.php'); 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title><?=$row_home->Title;?> - Special Offers Step 1</title>
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

<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
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

    
     <h3>Special Offers / POST YOUR LISTING</span></h3>
     
     
   

       
       <fieldset>
       <legend>
       <h4>Step 1: Company Information</h4>
       </legend>
<form enctype="multipart/form-data" class="newform" method="post" action="general-directory-step1-script">
      
	<?php
    if(isset($errors)) {
        foreach($errors as $err) {
        ?>
        <strong><?php echo $err;?></strong>
        <?php
             }
       }
    ?>
    
    <div class="inputitem">
    <label class="title" for="CompanyName">Company Name:</label>
    <input class="large" name="CompanyName" id="CompanyName" type="text"  pattern="[a-zA-Z ]+" />
    </div>
    
    
    <div class="inputitem">
    <a href="#modal" class="big-link" data-reveal-id="Modal" style="float:right; margin-bottom:10px; color:#8A0E6E;">Want to suggest a new Category?</a>    
    <label  class="title" for="Category">Select Category:</label>
	<select class="large" name="Category1" id="Category">
    <option value="">Please select</option>
    <?php
    $query = 'SELECT * FROM `categories` WHERE  `UseFor`="1" ORDER By Title ASC';
    $result = $db->query($query);
    while ($row = $result->fetch_assoc()) 
    {	
    ?>
    <optgroup label="<?php echo $row['Title'];?>">
    <?php 
    $query2 = 'SELECT * FROM `sub-categories` where `Cid`="'.$row['Id'].'"';
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
    
    <div class="inputitem">
    <label  class="title" for="Category2">Select another Category (<span style="font-size:14px; color:#8A0E6E;">optional</span>):</label>
    <select class="large" name="Category2">
    <option value="">Please select</option>
    <?php
    $query = 'SELECT * FROM `categories` WHERE  `UseFor`="1" ORDER By Title ASC';
    $result = $db->query($query);
    while ($row = $result->fetch_assoc()) 
    {	
    ?>
    <optgroup label="<?php echo $row['Title'];?>">
    <?php 
    $query2 = 'SELECT * FROM `sub-categories` where `Cid`="'.$row['Id'].'"';
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
    
     <div class="inputitem">
      <label class="title" for="AdTitle">Ad Title:</label>
      <input class="large" name="AdTitle"  id="AdTitle" type="text" pattern="[a-zA-Z ]+" />
     </div>
    
     
     <div class="inputitem">
      <label class="title" for="AdURL">Ad URL:</label>
      <input class="large" name="AdURL" id="AdURL" type="text" />
      <input name="step"  value="1" id="step" type="hidden" />
      <input name="OrderType"  type="hidden" value="Ad Circular" />
      </div>
    
    
      <div class="submit">
      <input type="submit" onClick="return GeneralDirectoryStep1()" name="step1"  value="Next >>"/>     
      </div>
      </form>    
      </fieldset>
      <!--modal content -->
<div id="modal" class="modal">
    <div class="modal-content">
        <div class="header">
            <h2 style="font-size:20px;">Request New Category</h2>
        </div>
        <div class="copy">
            <p>
      <div id="success" class='success'>Your Request Has Been Successfully Submitted</div>
        <form id="myForm" method="post" class="newform">
    
    <fieldset style="border:0;">
        
       <div class="inputitem">
        <label for="NewCategory">New Category:</label>
        <input name="NewCategory" id="NewCategory" type="text" class="large" required />
       </div>
       
       <div class="inputitem"> 
        <label for="NewSubCategory">New Sub Category:</label>
        <input name="NewSubCategory" id="NewSubCategory" class="large" type="text" required />
       </div>
       
        <input  id="UserId" name="UserId" type="hidden" value="<?php echo $_SESSION["Yiddn_login_Id"] ?>"  />
        <input  id="RequestIN" name="RequestIN" type="hidden" value="Ad Circular" />
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


<script type="text/javascript" src="js/general-directory-step1.js"></script>
</body>
</html>