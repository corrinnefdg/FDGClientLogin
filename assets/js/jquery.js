// JavaScript Document


$(document).ready(function(){
	
	// Client Name slider
	$(".clientName").click(function(){
		$(".clientInfo").slideToggle("slow");
	});
  
  
	  // sticky header
	  var stickyNavTop = $('.header').offset().top;  
		  
		var stickyNav = function(){  
			var scrollTop = $(window).scrollTop();  
				   
			if (scrollTop > stickyNavTop) {   
				$('.header').addClass('sticky');  
			} else {  
				$('.header').removeClass('sticky');   
			}  
		};  
	  
		stickyNav();  
		  
		$(window).scroll(function() {  
			stickyNav();  
		});  
	
}); //end document.ready