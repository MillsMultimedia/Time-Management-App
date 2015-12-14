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
});


$('.delete_btn').click( function(evt) {
	var confirm = prompt("WARNING: You are about to delete a task. Type DELETE to proceed");

	if (confirm == 'DELETE')
		window.location.replace("/admin/delete/"+$(this).attr('data-account')+"/"+$(this).attr('name'));
});

}); //end document ready