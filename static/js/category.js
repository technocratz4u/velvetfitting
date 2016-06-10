$(document).ready(function() {
	
	$(".navigation_menu").removeClass("active");
	$("#menu_products").addClass("active");
	
	$(".hot-this-week-img-container img").addClass("animated pulse");
	
	if($("#selectedSubCategoryId").val().length>0){
		$("#subctgr_"+$("#selectedSubCategoryId").val()).addClass("active");
	}
});
