<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>Yiddn</title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/inner.css" rel="stylesheet">
 <link rel="stylesheet" href="css/reset.css" type="text/css" media="all" />
  <link href="css/innermedia.css" rel="stylesheet">
  <link href="css/dashboard.css" rel="stylesheet">
  <link rel="stylesheet" href="css/newform.css" type="text/css" />
   <link rel="stylesheet" href="css/dropdown.css" />
  <link href='http://fonts.googleapis.com/css?family=Comfortaa:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>


<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
   </head>
<body>	




<!--Header -->  
 <header id="header">   
 <div class="shell">
  <select id="mobilemenu" size="1">
           <option selected>Navigation</option>
             <option>Retailers</option>  
         <option>Torah Resources</option>
         <option>Services</option>
         <option>Entertainment</option>
         <option>Community</option>
         <option>Special Offers</a></option>
            </select>
 
 
 
 
  <div id="nav-top">
   <span><a href="#">My Account</a> | <a href="#">Logout</a> </span>
   
  <div class="shellsearch">
  <form class="searchform" method="get"   action="#">
<input class="searchfield" type="text" placeholder='What are you looking for?' name="keywords" /> IN
<input class="searchfield2" type="text" placeholder='Flatbush' name="Location" id="Location" />
<input class="searcbutton" type="submit" value="&nbsp;" name="Go" id="Go"/>
</form>
    </div>
    
    
   </div>
 
 <div id="logo"><a href="#"><img src="images/logo.png" alt=""></a></div>
  
 
 
  
  
   </div>
 
 
  </header> 
<!--/Header -->




   
 <!--Navigation -->
	<nav class="inner">
    <div class="shell">
		<ul class="nav clearfix">
	<li><a href="#">Retailers</a> </li>
  	<li>
		<a href="#">Torah Resources</a>
 		</li>
	  <li><a href="#">Services</a></li>      
        <li><a href="#">Entertainment</a></li>      
        <li><a href="#">Community</a></li>   
        <li><a href="#">Special Offers</a></li> 
</ul>
        </div>
		
	</nav>
<!--/Navigation -->

       <div class="cl">&nbsp;</div>

   	<section id="content-main" style="width:100%;">
    <div class="shell">
    
    <div id="main">
	<div id='article' style="width:90%;">
     <div class="dashboard-links">
     <a class="dbutton" href="">Post to General Directory</a>         
    <a class="dbutton" href="">Post to Jewish Etailers</a>
  <a class="dbutton" href="">Post to Torah & Resources</a>    
  <a class="dbutton" href="">Post to Jewish Local</a>
  <a class="dbutton" href="">My Profile</a>
  <a class="dbutton" href="">Bookmarks</a>
  </div>
    
 <br>
<br>
<br><br>
  <h3>POST YOUR LISTING</span></h3>
     

       
       <fieldset>
       <legend>
       <h4>STEP 4: Payment Information</h4>
       </legend>
        <form enctype="multipart/form-data" class="newform" method="post">
      
	 
	       
    <br>

 <fieldset class="newfiled">
    <legend><h5>Choose a Payment Plan</h5></legend>
    <div class="inputitem">
      <label class="title">You can save up to 20% by paying in advance!</label>
      <div class="item-cont">
      <select name="select" >
 			  <option value="">Choose a payment plan</option>
        <option value="10">Get 10% OFF if paid quarterly</option>
        <option value="20">Get 20% OFF if paid half yearly</option>
        <option value="RECUR">Regular Charges as indicated - Charged every month</option>
        <option value="ONETIME">Only charge for one month</option>     
        </select> 
        <span class="purpule">Note:Unless cancelled, your subscriptions will be renewed at the selected rate. Subscriptions can be revised or cancelled at any time from your account page.
</span>
    </div>
    </div>
    
    
    
    
     </fieldset>
     
     <br>



 <fieldset class="newfiled">
    <legend><h5>Discount Coupons</h5></legend>
    <div class="inputitem">
      <label class="title">Enter Coupon Code:    <span class="small">(case sensitive)</span></label>
        <input class="small" type="email" name="email" value=""/> <input type="submit" value="Apply"/> 
<br>

        <span class="purpule">Coupon code expires after one-time use. It applies to the first payment of your selected billing cycle only.

</span>
    </div>
    
    
    
     </fieldset>
    
    
    <br>
 <fieldset class="newfiled">
    <legend><h5>Payment Details</h5></legend>


  <div class="inputitem">
    <label class="title">Name as on Card:</label>
     <input class="large" type="email" name="email" value=""/>
    </div>
    
    
    <div class="inputitem">
    <label class="title">Card Number:</label>
     <input class="large" type="email" name="email" value=""/>
    </div>
    
     
     
     <div class="inputitem">
      <label class="title">Credit Card type:</label>
      <div class="item-cont">
 			<select name="NameonCard" id="NameonCard">
		 <option value="Visa">Visa</option>
		 <option value="MasterCard">MasterCard</option>
		 <option value="AmEx">American Express</option>
		 <option value="Discover">Discover</option>
        </select> 
 
    </div>
    </div>
 

    
    	<div class="inputname">
        <label class="title">Expiry Date:</label>
        <span class="nameFirst"> 
        <select name="ExpMon" id="ExpMon" title="select a month" style="width:30%;float:left; margin-right:10px;"> 
        <option value="01">Jan</option> 
        <option value="02">Feb</option> 
        <option value="03">Mar</option>
        <option value="04">Apr</option> 
        <option value="05">May</option> 
        <option value="06">June</option> 
        <option value="07">July</option> 
        <option value="08">Aug</option> 
        <option value="09">Sept</option> 
        <option value="10">Oct</option> 
        <option value="11">Nov</option> 
        <option value="12">Dec</option> 
 </select>   
        
         </span><span class="nameLast"> 
        <select name="ExpYear" id="ExpYear" title="select a year" style="width:30%;"> 
        <option value="2014">2014</option> 
        <option value="2015">2015</option> 
        <option value="2016">2016</option>
        <option value="2017">2017</option> 
        <option value="2018">2018</option> 
        <option value="2019">2019</option> 
        <option value="2020">2020</option> 
        <option value="2021">2021</option> 
        <option value="2022">2022</option> 
        <option value="2023">2023</option> 
        <option value="2024">2024</option> 
</select>
         </span></div>

     
<br>

         <div class="inputitem">
    <label class="title">CSV</label>
     <input class="small" type="email" name="email" value=""/>
    </div>
    
     </fieldset>
     
     
    
    
    
     
     
    
    
      <div class="submit">
      <input type="submit" value="Submit"/>       <input type="submit" value="<< Previous" class="pre"/>

      </div>
          

  
    
      </form>
      </fieldset>
<script type="text/javascript" src="js/newform.js"></script>

       
     
   
     
         
         
         
           
         
         
           
         
         
          
         
         
          
         
        
                  
       
  	</div>
	</div>
    
    
    
	 
		
	</div>
 

</section>
 
   
    <div class="cl">&nbsp;</div>
                    
                    
                    

        
    
    <!-- Footer -->
 <footer>
 <div class="shellfooter">
  <div class="shell">
    <div class="links">
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Listings</a>
        <a href="#">Advertise</a>
        <a href="#">Faq</a>
        <a href="#">Legal & Privacy</a>
        <a href="#">Contact</a>
  </div>
  
  <p class="copyright">
 <span>Yiddn.com is a registered trademark. No portion of this site or its content may be duplicated or distributed.<br>
</span>  
 © Copyright 2014 Yiddn Inc. All rights reserved 
 </p>
  
   </div>
    </div> 
    
   
     </footer>
 <!-- /Footer -->
 


      
         
 
        
 
 
 
  
<!-- Java Script -->       
 
 <script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="js\/1.7.2.jquery.min"><\/script>')</script>
 <script src="js/jquery.min.js"></script>
 	<script src="js/modernizr.js"></script>
     <script src="js/jquery.min.js"></script>
     <script src="js/jquery.easing.min.js"></script>
 <script src="js/login.js"></script>
  <script src="js/custom.js"></script>
  <!-- Java Script -->



</body>
</html>