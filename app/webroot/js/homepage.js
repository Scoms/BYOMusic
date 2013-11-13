$(document).ready(function(){

	$('#logIn').hide();
	//$('li').hover(alert('hover'));

});

function logInMenu(){
	if(!$('#logIn').is(':visible')){
		$('#logIn').slideDown(500);
	}
	else{
		$('#logIn').slideUp(500);
	}
};