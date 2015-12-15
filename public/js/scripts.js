$(document).ready( function(){

$('.cancel_btn').click( function() {
	location.reload(true);
});


/**********************************
Task List Page - Admin View
**********************************/

//unhide the form to add a new task
$('#add_update').click( function(evt) {
	$('.add_new').slideDown("slow");
	$('#add_update').toggle();
});


//unhide the form to edit a task
$('.edit_btn').click( function(evt) {
	//get the row id and hide that row
	var row_id = $(this).attr('name');
	$('tr#'+row_id).toggle();

	//unhide the form
	$('.edit_task').toggle();

	//get the current task description and hours values
	var desc_val = $('tr#'+row_id).children().eq(1).html();
	var hrs_val = $('tr#'+row_id).children().eq(2).html();

	//set current values into input fields
	$('#edit_desc').val( desc_val );
	$('#edit_hrs').val( hrs_val );
	$('#task_id').val( row_id );
});


$('.delete_btn').click( function(evt) {
	var confirm = prompt("WARNING: You are about to delete a task. Type DELETE to proceed");

	if (confirm == 'DELETE')
		window.location.replace("/tasks/delete/"+$(this).attr('data-account')+"/"+$(this).attr('name'));
});


/**********************************
User Listing /admin view
**********************************/

$('.edit_acct').click( function(evt) {

	//get the row id and hide that row
	var row_id = $(this).attr('name');

	$('tr#'+row_id).toggle();

	//unhide the form
	$('.edit_account').toggle();

	//get the current task description and hours values
		//Business Name
		var bus_name = $('tr#'+row_id).children().eq(0).children().eq(0).html();
		//Package
		var package_value = $('tr#'+row_id).children().eq(1).html();
		//Contact Name
		var contact = $('tr#'+row_id).children().eq(2).html();
		//Email
		var email = $('tr#'+row_id).children().eq(3).children().eq(0).html();

	//set current values into input fields
	$('#edit_name').val( bus_name );
	$('#edit_package').val( package_value );
	$('#edit_contact').val( contact );
	$('#edit_email').val( email );
	$('#user_id').val( row_id );

});


$('.delete_acct').click( function(evt) {
	var confirm = prompt("WARNING: You are about to delete a user. Type DELETE to proceed");

	if (confirm == 'DELETE')
		window.location.replace("/admin/delete/"+$(this).attr('name'));
});


/**********************************
Some styling
**********************************/
var margin = $('header').height()/2 - 8;

$('.header_links').css('margin-top', margin);


}); //end document ready