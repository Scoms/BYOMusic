
$(document).ready(function(){
	//$("#gmapSearch").click(createGMapFromAddress($("#gmapSearchText").text(),'map_canvas'));
	$("#gmapSearch").click(function(e){
		e.preventDefault();
		createGMapFromAddress($("#address").val(),"map_canvas");
		});
});
/*
function displayAjaxCall(data){
	//Bar infos
	var bar = data.Bar;
	$('#barName').text(data.Bar.name);

	// beverages
	beverageDisplay(data.Beverage);
}

function beverageDisplay(beverages){
	var tempCategory = '';
	var currentCategory = '';
	var str = '';
	var div_id;
	//Beverage display creation
	for (var i = 0; i < beverages.length; i++) {	
		tempCategory = beverages[i].BeverageCategory;
		if(currentCategory == '' || currentCategory.id != tempCategory.id){
			currentCategory = tempCategory;
			div_id = currentCategory.label;
			str += currentCategory == '' ? '' : '</div>';
			str += '<h3 class="action" id=h3_'+div_id+'>'+div_id+'</h3>';
			str += '<div id=div_'+div_id+'>';
			categories.push(div_id);
		}
		str+= '<p>'+beverages[i].label+'</p>';
	};
	//if beverages, close the last div
	str += beverages.length > 0 ? '</div>' : '';
	$('#beverageDisplay').html(str);
	setDivListeners();
}

function setDivListeners(){
	for (var i = categories.length - 1; i >= 0; i--) {
		if(!$("#h3_"+categories[i]).hasClass('listened'))
		{
			$("#h3_"+categories[i]).addClass('listened');
			$("#h3_"+categories[i]).click(function(e){
			var div_id = e.target.id.substr(3,e.target.id.length);
			div_id = "div_" + div_id;
			obj = $("#"+div_id);
			obj.toggle();
		});
		}
	}
}
*/