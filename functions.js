// JavaScript Document


$(document).ready(function(){
	
	
	//listen for clicks on the submit button
	$('#addButton').click(function(){
		
		console.log("clicked.");
		
		var target_form = $(this).closest('form');

		$.ajax({
			type: 'POST', //or GET
			url: 'insert.php', // form's destination
			data: { 
				inputName:$(target_form).children('#cli_name').val(), 
				inputType:$(target_form).children('#cli_type').val(), 
				inputUrl:$(target_form).children('#cli_url').val(),
				inputUser:$(target_form).children('#cli_user').val(),
				inputPass:$(target_form).children('#cli_pass').val()
			}, // send each of the form's keys: values
			// contentType: 'application/json; charset=utf-8',
			//processData: 'false',
			dataType: 'text',
			success: function(data){
				console.log("Great success!");
				console.log(data);
				//$('.addNewInfo').append("<p>One entry added</p>").hide().fadeIn(slow);
			},
			error: function(data){
				// shit went wrong
				console.log("No success.");
				console.log(data);
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
  
	
	// make the header shadow appear once the page is scrolled down
	$(window).scroll(function() { 

		//if window is scrolled any more than 0 the shadow appears
		if($(window).scrollTop() > 0) {
			if(!$(".header").hasClass('shadow')){
				$(".header").addClass('shadow');
			}
		}
		else {
			$('.header').removeClass('shadow');
		}
	});
	
	
	
	// make form fields editable
	$(".editButton").click(function(){
			
		$(this).toggle("left") // hide "edit" button
		.next(".cancelButton").toggle("right") // show "cancel" button
		.next(".saveButton").toggle("right") // show "save" button
		.siblings().removeAttr('disabled'); // remove "disabled" attribute from form fields

	});
	
	
	// cancel edit button
	$(".cancelButton").click(function(){
		
		$(this).toggle("left") // hide "cancel" button
		.next(".saveButton").toggle("left"); // hide "save" button		
		
		// add "disabled" attribute to form, except "save" and "edit" buttons in case user wants to edit again
		$(this).siblings().not(".editButton").not(".saveButton")
		.attr('disabled',!$(this).siblings().not(".editButton").not(".saveButton").attr('disabled')); 
		$(this).prev(".editButton").toggle("right"); // show "edit" button	

	});
	
	
	
	// draggable Client Names to reorder
	// conflicts with slidetoggles
	/* $(function() {
		$( "#sortable" ).sortable();
		$( "#sortable" ).disableSelection();
	}); */
	
	
}); //end document.ready