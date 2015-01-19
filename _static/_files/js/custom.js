// Slider
jQuery(document).ready(function(){
			jQuery('#slider').skdslider({delay:5000, animationSpeed: 2000,autoSlide:false,animationType:'fading'});
 			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
 		});
 
 
 
 
// Drop Dwon


$(function(){
	$('.animated > li').hover(function(){
		$(this).find('div[class^="container-"]').stop().slideDown('fast');
	},
	function(){
		$(this).find('div[class^="container-"]').stop().slideUp('slow');
	});
});

 
 $(document).ready(function() {
 $('.masterTooltip').hover(function(){
           var title = $(this).attr('title');
        $(this).data('tipText', title).removeAttr('title');
        $('<p class="tooltip"></p>')
        .text(title)
        .appendTo('body')
        .fadeIn('slow');
}, function() {
        // Hover out code
        $(this).attr('title', $(this).data('tipText'));
        $('.tooltip').remove();
}).mousemove(function(e) {
        var mousex = e.pageX + 20; //Get X coordinates
        var mousey = e.pageY + 10; //Get Y coordinates
        $('.tooltip')
        .css({ top: mousey, left: mousex })
});
});
 
 
