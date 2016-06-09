$(document).ready(function() {
	
	$(".navigation_menu").removeClass("active");
	$("#menu_products").addClass("active");
	
	if($("#selectedSubCategoryId").val().length>0){
		$("#subctgr_"+$("#selectedSubCategoryId").val()).addClass("active");
	}
});
