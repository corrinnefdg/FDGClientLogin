// JavaScript Document


$(document).ready(function(){
	
	// Client Name slider
	$(".clientName").click(function(){
		$(".clientInfo").slideToggle("slow");
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