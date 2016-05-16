$(document).ready(function() {
	$('#homeCarousel').owlCarousel({
    	slideSpeed : 100,
		paginationSpeed : 400,
		singleItem : true,
		autoPlay : true,
		stopOnHover : true
    });
	
	//$("#faucets-img").magnify();
	$("#faucets-img").mlens({
		imgSrc: $(this).attr("data-big"),	  // path of the hi-res version of the image
		imgSrc2x: $(this).attr("data-big2x"),  // path of the hi-res @2x version of the image
                                                  //for retina displays (optional)
		lensShape: "circle",                // shape of the lens (circle/square)
		lensSize: ["30%","30%"],            // lens dimensions (in px or in % with respect to image dimensions)
		                                    // can be different for X and Y dimension
		borderSize: 4,                  // size of the lens border (in px)
		borderColor: "#fff",            // color of the lens border (#hex)
		borderRadius: 0,                // border radius (optional, only if the shape is square)
		//imgOverlay: $("#gear").attr("data-overlay"), // path of the overlay image (optional)
		overlayAdapt: true,    // true if the overlay image has to adapt to the lens size (boolean)
		zoomLevel: 1,          // zoom level multiplicator (number)
		responsive: true       // true if mlens has to be responsive (boolean)
	});
});