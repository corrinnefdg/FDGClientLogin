// JavaScript Document

// user login / user account system
// http://www.php-login.net/
// http://tutorialzine.com/2009/10/cool-login-system-php-jquery/
// http://webdevrefinery.com/forums/topic/3280-how-to-make-a-user-account-system/
// http://stackoverflow.com/questions/3076993/creating-a-webpage-with-user-accounts-what-do-i-need-to-keep-in-mind

$(document).ready(function(){
	
	
	// Delete client entry
	$('#deleteButton').click(function(){
		
		var target_form = $(this).closest('form');

		$.ajax({
			type: 'POST',
			url: 'delete.php', // form's destination
			data: { 
				clientRecordId:$(target_form).children('#cli_id').val()
			}, // send each of the form's keys: values
			// contentType: 'application/json; charset=utf-8',
			//processData: 'false',
			dataType: 'text',
			success: function(data){
				console.log("Great success!");
				$('.clientEntry').append("<p class='p-success'>Entry removed!</p>");
				//$('#final_msg').fadeIn().delay(10000).fadeOut();
			},
			error: function(data){
				// shit went wrong
				console.log("No success.");
			}
		});
		return false; //so the page won't refresh
	});
	
	
	// Edit existing client entry
	$('#saveButton').click(function(){
		
		var target_form = $(this).closest('form');

		// post info to PHP
		$.ajax({
			type: 'POST',
			url: 'edit.php', // form's destination
			data: { 
				clientRecordType:$(target_form).children('#cli_type').val(), 
				clientRecordUrl:$(target_form).children('#cli_url').val(),
				clientRecordUser:$(target_form).children('#cli_user').val(),
				clientRecordPass:$(target_form).children('#cli_pass').val(),
				clientRecordId:$(target_form).children('#cli_id').val()
			}, // send each of the form's keys: values
			// contentType: 'application/json; charset=utf-8',
			//processData: 'false',
			dataType: 'text',
			success: function(data){
				console.log("Great success!");
				console.log(data);
				$('.newEntry').append("<p class='p-edit'>Entry edited!</p>");
				//$('#final_msg').fadeIn().delay(10000).fadeOut();
			},
			error: function(data){
				// shit went wrong
				console.log("No success.");
			}
		});
		
		$(this).toggle("left") // hide "save" button
		.prev(".cancelButton").toggle("left") // hide "cancel" button	
		.prev(".editButton").toggle("right"); // show "edit" button	
		
		// add "disabled" attribute to form, except "cancel" and "edit" buttons in case user wants to edit again
		$(this).siblings().not(".editButton").not(".cancelButton")
		.attr('disabled',!$(this).siblings().not(".editButton").not(".cancelButton").attr('disabled'));
		
		return false; //so the page won't refresh
		
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
	

	// Insert new client entry
	$('#addButton').click(function(e){
		e.preventDefault();
		console.log("click");
		
		var target_form = $(this).closest('form');
		console.log($(target_form).children('#cli_name').val());

		$.ajax({
			type: 'POST',
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
				$('.newEntry').append("<p class='p-success'>Entry added!</p>");
				//$('#final_msg').fadeIn().delay(10000).fadeOut();
			},
			error: function(data){
				// shit went wrong
				console.log("No success.");
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
	

	// draggable Client Names to reorder
	// currently conflicts with slidetoggles
	/* $(function() {
		$( "#sortable" ).sortable();
		$( "#sortable" ).disableSelection();
	}); */
	
	
}); //end document.ready