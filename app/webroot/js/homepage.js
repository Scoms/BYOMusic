$(document).ready(function(){

	$('#searchBox').select2({
    minimumInputLength:1,
    placeholder: "search",
    ajax: {
        url: "/BYOMusic/WebServices/searchAll/"+$('#searchBox').val(),
        dataType: 'json',
        data: function(term, page) {
            return {
                pSearch: term,
            };
        },
        results: function(data, page) {
            return {
                results: data.results
            };
        },
        initSelection: function (element, callback) {
                              var data = { id: "ok", text: "ok" };
                            callback(data);
                        }
    },
    formatResult: formatResult,
    formatSelection: formatSelection,
	});

    $('#searchBox').on("select2-selecting", function(e) { 
        url = e['val'];
        $(location).attr('href',url);
    });
});
function formatResult(node) {
   // alert(node.id);
    return '<div>' + node.name + '</div>';
};

function formatSelection(node) {
	//$('#UserCountryId').val(node.id);
	//$('#UserCountryLabelEn').val(node.name);
    return node.name;
};