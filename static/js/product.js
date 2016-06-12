$(document).ready(function() {
	
	$(".navigation_menu").removeClass("active");
	$("#menu_products").addClass("active");
	
	$("#category_items_carousel").owlCarousel({

		items : 4, //5 items above 1000px browser width

		itemsDesktop : [ 1199, 4 ],
		itemsDesktopSmall : [ 979, 3 ],
		itemsTablet : [ 768, 2 ],
		itemsTabletSmall : false,
		itemsMobile : [ 479, 1 ],

		autoPlay : true,
		stopOnHover : true

	});
	
	//$("#faucets-img").magnify();
	$("#product-image").mlens({
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
	
	/**
	 * Always call the skrollr init function after any document height changing plugin like carousel
	 */
	skrollr.init({
		skrollrBody:'page-container',
		edgeStrategy:'set'
	});
	
});

//add an item to the cart
function addToEnquiryList(item) {
	var items;
	if (typeof (localStorage["enquireList"]) != "undefined" && (localStorage["enquireList"]).length > 0) {
		items = JSON.parse(localStorage.getItem("enquireList"));
	} else {
		items = [];
	}
	
	if($.inArray(item, items)==-1){
		items.push(item);
		localStorage.setItem("enquireList", JSON.stringify(items));
	}
	
	//console.log("localStorage",localStorage);

}