// JavaScript Document


$(document).ready(function(){
	
	
	//listen for clicks on the submit button
	$('#addButton').click(function(){
		
		console.log("meow");
		
		var target_form = $(this).closest('form');
		//console.log(target_form);
		
		/* $('input').each(function() {
			var name = $('input').attr('name');
		}); */
		
		
		//var cli_name = $(target_form + '#cli_name').val();
		
		var cli_type = $(target_form).children('.cliType').val();
		console.log(cli_type);
		
		//var cli_url = $('#cli_url').val();
		//var cli_user = $('#cli_user').val();
		//var cli_pass = $('#cli_pass').val();
		
		
		
		
		$.ajax({
			type: 'POST', //or GET, or whatever
			url: '../../insert.php', // form's destination
			data: ({'inputName': cli_name, 
				'inputType': cli_type, 
				'inputUrl': cli_url,
				'inputUser': cli_user,
				'inputPass': cli_pass
			}), // send each of the form's keys: values
			contentType: 'application/json; charset=utf-8',
			dataType: 'json',
			success: function(data){
				$('.addNewInfo').append("<p>1 entry added</p>").hide().fadeIn(slow);
			},
			error: function(data){
				// shit went wrong
			}
		});
		return false; //so the page won't refresh
	});
	
	
	
	
	// Client Name slider
	$(".slideTitle").click(function(){
		$(this).next(".slideInfo").slideToggle("slow");
		
		$(this).parent(".slideInfo").siblings().children().next().slideUp();
       return false;
	});
	
		// "Add New" info slider inside existing Client Name
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