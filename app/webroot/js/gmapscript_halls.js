$(document).ready(function(){
	//createGMapFromAddress("paris","map_canvas");
	$(".hallAddress").hover(function(e){
		$("#gmapContainer h2").text($(this).attr('id'));
		createGMapFromAddress($(this).html(),"map_canvas");
	});
})