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
	var el  = document.getElementById('edit');
	var inp = document.getElementById('inp');
	el.addEventListener('click', function(){
		inp.disabled = false;
		inp.focus(); // set the focus on the editable field
	});
	
	
}); //end document.ready