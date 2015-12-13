$(document).ready( function(){

/**********************************
Admin Overview Page
**********************************/

//
$('#add_account').click( function(evt) {
	$('.add_new').slideDown("slow");
});

$('#add_submit').click( function(){
	//POST FORM DATA
});


/**********************************
Admin Update Page
**********************************/
$('#add_update').click( function(evt) {
	$('.add_new').slideDown("slow");
});

$('.edit_btn').click( function(evt) {
	var row_id = $(this).attr('name');
	
	$('tr#'+row_id).toggle();

	$('.edit_task').toggle();

	var desc_val = $('tr#'+row_id).children().eq(1).html();

	var hrs_val = $('tr#'+row_id).children().eq(2).html();

	// console.log( info );
	// console.log( test_text );

	$('#edit_desc').val( desc_val );
	$('#edit_hrs').val( hrs_val );
});

$('#cancel_btn').click( function() {
	location.reload(true);
});

$('.delete_btn').click( function(evt) {
	var confirm = prompt("WARNING: You are about to delete a task. Type DELETE to proceed");

	if (confirm == 'DELETE')
		window.location.replace("/admin/delete/"+$(this).attr('data-account')+"/"+$(this).attr('name'));
});

}); //end document ready