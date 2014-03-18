// JavaScript Document


$(document).ready(function(){
	
	// Client Name slider
	$(".slideTitle").click(function(){
		$(this).next(".slideInfo").slideToggle("slow");
		
		$(this).parent(".slideInfo").siblings().children().next().slideUp();
       return false;
	});
	
	
	// "Add New" info slider
	$(".slideNew").click(function(){
		$(this).next(".addNewInfo").slideToggle("slow");
		
		$(this).parent(".addNewInfo").siblings().children().next().slideUp();
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
	
	
	// make form fields editable
	$(".editButton").click(function(){
		$(this).siblings().removeAttr('disabled');
	});
	
	// trying to cancel edit too - doesn't work
	// might toggle above code instead
	$(".cancelButton").click(function(){
		$(this).siblings().attr('disabled');
	});
	
	
	// draggable Client Names to reorder
	/* $(function() {
		$( "#sortable" ).sortable();
		$( "#sortable" ).disableSelection();
	}); */
	
	
}); //end document.ready