 <script src="<?=ADDRESS_SITE?>js/jquery.min.js" type="text/javascript"></script>
<script src="<?=ADDRESS_SITE?>js/liquidmetal.js" type="text/javascript"></script>
<script src="<?=ADDRESS_SITE?>js/jquery.flexselect.js" type="text/javascript"></script>
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
	  
	  $("select.flexselect").flexselect({
  allowMismatch: true,
  inputNameTransform:  function(name) { return "new_" + name; }
});
	  
	  
	  
    </script>  

<script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="js\/1.7.2.jquery.min"><\/script>')</script>
  	<script src="<?=ADDRESS_SITE?>js/modernizr.js"></script>
     <script src="<?=ADDRESS_SITE?>js/jquery.easing.min.js"></script>
 <script src="<?=ADDRESS_SITE?>js/login.js"></script>
 <script src="<?=ADDRESS_SITE?>js/slider.js"></script>
 <script src="<?=ADDRESS_SITE?>js/custom.js"></script>