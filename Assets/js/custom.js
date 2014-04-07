$(document).ready(function(){	
			
	init_masonry();	
	//  $("#selecter, #multiple").selecter();
	
	
/* ---------- Deals Modal  ---------- */	
	$('.content-txt.comment').focus(function() {
  		$(".comment_btn").show();
	});
	$('#locationInput').focus(function() {
  		$(".locationReset").addClass('selected_area');
  		
	});
	$('#locationInput').focusout(function() {
		$(".locationReset").removeClass('selected_area');
	});
	
	
	$('#myModal').on('shown', function () {
			    	$(window).trigger('resize');
			    	$(".comment_btn").hide();
			    });
	


/* ---------- Masonry Gallery ---------- */

function init_masonry(){
	
	if($('.masonry-gallery')){  
	
    	var $container = $('.masonry-gallery');

	    var gutter = 15;
	    var min_width = 250;
	    //$container.imagesLoaded( function(){
	    //    $container.masonry({
	    //        itemSelector : '.masonry-thumb',
	    //        gutterWidth: gutter,
	    //        isAnimated: true,
	    //          columnWidth: function( containerWidth ) {
	    //            var num_of_boxes = (containerWidth/min_width | 0);
	    //
	    //            var box_width = (((containerWidth - (num_of_boxes-1)*gutter)/num_of_boxes) | 0) ;
	    //
	    //            if (containerWidth < min_width) {
	    //                box_width = containerWidth;
	    //            }
	    //
	    //            $('.masonry-thumb').width(box_width);
	    //
	    //            return box_width;
	    //          }
	    //    });
	    //});
	
	}
}

});


