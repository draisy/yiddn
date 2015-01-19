<?php 
require_once('inc.files.php');
require_once('user-check.php'); 
if(isset($_GET['i'])) {
	$delete = "delete from `bookmark` where Id =".base64_decode($_GET['i']);
    $run = mysqli_query($db, $delete);
	echo "<script>window.open('bookmark','_self')</script>";
}
if(isset($_POST['Bookmark'])){
	$Comment = mysqli_real_escape_string($db,$_POST['Comment']);
	$Id      = $_POST['Id'];
 	$sql  = "UPDATE `bookmark` SET `Comment`='".$Comment."' Where `Id`= '".$Id."'";
	$res = mysqli_query($db, $sql);
	echo "<script>window.open('bookmark','_self')</script>";
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title><?=$row_home->Title;?> - Bookmark</title>
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
	<div id='article' style="width:92%;">
    
       
        <?php require_once('inc.dashboadlinks.php'); ?>
  
    
 <br>
<br>
<br>
<br>
 
       
     
  <fieldset>
    <legend>
    <h4>Bookmarks</h4>
    </legend>
       
  <table>
    <thead>
        <tr>
            <th width="15%">#</th>
            <th width="15%">URL</th>
            <th width="17%">Company Name</th>
            <th width="24%">Date Added</th>
             <th width="11%">Comments</th>
             <th width="11%">Action</th>
        </tr>
    </thead>
<?php
$query = 'SELECT * FROM `bookmark` WHERE `UserId`="'.$_SESSION['Yiddn_login_Id'].'"   ORDER By Id DESC';
$result = $db->query($query);
$total_results = $result->num_rows;
$count = 1;
while ($row = $result->fetch_object()){
  ?>
    
    <tr>
        <td data-title="Order ID"><?php echo $count++;?></td>
        <td data-title="Order Date"><a href="http://<?php echo $row->CompanyUrl;?>" target="_blank">View</a></td>
        <td data-title="Listing Type"><?php echo $row->CompanyName;?></td>
        <td data-title="Payment Plan"><?php echo $row->DateAdded;?></td>
        <td data-title="Comments">
<?php if($row->Comment==""){
echo "<a href='#Modal".$row->Id."' class='big-link'>add comment...</a>";}else{
echo strlen($row->Comment) >= 1 ? 
substr($row->Comment, 0, 4) . "<a  href='#Modal".$row->Id."' class='big-link'>read more...</a>": 
$row->Comment;
}?></td>
        <td data-title="Action"><a href="bookmark?i=<?php echo base64_encode($row->Id);?>" onclick='return DeleteBookmark();'><img src="images/cancel-icon.png" title="Delete" /></a></td>

    </tr>
 
	<!--modal content -->
<div id="Modal<?=$row->Id?>" class="modal">
    <div class="modal-content">
        <div class="header">
            <h2>Comment Box</h2>
        </div>
        <div class="copy">
             
<form id="myForm" method="post">

 
<textarea required name="Comment"  style="font-size: 1em;
font-weight: 500;
width: 100%; border:1px solid #ccc; padding:4px; min-height:100px; font-family:'Muli', sans-serif;" placeholder="Comment..."><?php echo $row->Comment;?></textarea>

<input  id="Id" name="Id" type="hidden" class="large"  value="<?php echo $row->Id ?>"  />
<div class="clearfix"></div><br>

<input  id="myFormSubmit" name="Bookmark" type="submit" class="add-btn" value="Submit">

 

</form> 
         </div>
        <div class="cf footer">
            <a href="#" class="closebtn">Close</a>
        </div>
    </div>
    <div class="overlay"></div>
</div>    
    	<!--modal content -->

   
<?php }?>
<script>
function DeleteBookmark()
{
	return confirm("Are you sure you want to delete this Bookmark?");
}
</script>
   </table>
   
   </fieldset>
     
         
         
         
           
         
         
           
         
         
          
         
         
          
         
        
                  
       
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


</body>
</html>