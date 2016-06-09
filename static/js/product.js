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