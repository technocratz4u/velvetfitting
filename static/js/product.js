$(document).ready(function() {
	
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

	if (typeof (SessionStorage["enquireList"]) != "undefined" && (SessionStorage["enquireList"]).length > 0) {
		var items = JSON.parse(SessionStorage.getItem("enquireList"));
		items.push(item);
		SessionStorage.setItem("enquireList", JSON.stringify(items));

	} else {
		var items = [];
		items[0] = item;
		SessionStorage.setItem("enquireList", JSON.stringify(items));

	}
	console.log("SessionStorage",SessionStorage);

}