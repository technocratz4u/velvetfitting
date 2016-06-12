$(document).ready(function() {
	
	$(".navigation_menu").removeClass("active");
	$("#menu_contact").addClass("active");
	
    function initialize() {
        var mapOptions = {
            zoom: 15,
            center: new google.maps.LatLng(28.67426, 77.31916),
            mapTypeId: google.maps.MapTypeId.ROAD,
            scrollwheel: false
        }
        var map = new google.maps.Map(document.getElementById('map'),
            mapOptions);

        var myLatLng = new google.maps.LatLng(28.67426, 77.31916);
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title:"B-23, DSIDC Compound, Jhilmil Industrial Area, Shahdara, Delhi - 110095, India"

        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    
    /**
	 * Always call the skrollr init function after any document height changing plugin like carousel
	 */
	skrollr.init({
		skrollrBody:'page-container',
		edgeStrategy:'set'
	});
		
});
