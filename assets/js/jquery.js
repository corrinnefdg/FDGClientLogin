// JavaScript Document


$(document).ready(function(){
	
	// Client Name slider
	$(".slideTitle").click(function(){
		$(this).next(".slideInfo").slideToggle("slow");
		
		$(this).parent(".slideInfo").siblings().children().next().slideUp();
       return false;
	});
  
	
	// function to make the header shadow appear once the page is scrolled down
	$(window).scroll(function() { 

		//if window is scrolled any more than 0 the shadow appears
		if($(window).scrollTop() > 0) 
		{
			if(!$(".header").hasClass('shadow'))
			{
				$(".header").addClass('shadow');
			}
		}
		else
		{
			$('.header').removeClass('shadow');
		}
	});
	
	
}); //end document.ready