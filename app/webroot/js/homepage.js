$(document).ready(function(){

	$('#logIn').hide();
});

function logInMenu(){
	if(!$('#logIn').is(':visible')){
		$('#logIn').show();
	}
	else{
		$('#logIn').hide();
	}
};