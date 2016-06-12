$(document).ready(function() {
	
	$(".navigation_menu").removeClass("active");
	$("#menu_about").addClass("active");

	/**
	 * Always call the skrollr init function after any document height changing plugin like carousel
	 */
	skrollr.init({
		skrollrBody:'page-container',
		edgeStrategy:'set'
	});
	
});
