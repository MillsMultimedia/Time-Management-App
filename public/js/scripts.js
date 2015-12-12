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

// $('#add_submit').click( function() {

// 	alert( '/update/' + $(this).attr('name') );
	
// 	$.post( ('/update/' + $(this).attr('name')), { 'description' : $('#description').val(), 'hours_used' : $('#hours_used').val() } );

// });

}); //end document ready