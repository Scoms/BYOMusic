
function createGMapFromAddress(address, gmap_id, map_options){
    map_options = (map_options) ? map_options : {
        zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    },                                
    map = new google.maps.Map(document.getElementById(gmap_id), map_options),
    geoclient = new google.maps.Geocoder();                                
    geoclient.geocode({'address': address}, function(results, status){
        if(status == google.maps.GeocoderStatus.OK){
        	//alert(results[0].geometry.location);
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map, 
                position: results[0].geometry.location,
                title : address                       
            });
       		return results[0].geometry.location;
        } 
        if(status == google.maps.GeocoderStatus.ZERO_RESULTS){
        	alert("no results");
        }
    }); 
};