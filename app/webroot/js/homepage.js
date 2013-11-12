$(document).ready(function(){

	$('#logIn').hide();
	//$('li').hover(alert('hover'));

});

function logInMenu(){
	if(!$('#logIn').is(':visible')){
		$('#logIn').show();
	}
	else{
		$('#logIn').hide();
	}
};