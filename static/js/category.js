var moduloIndex = 0;
var intervalIndex = 4;
$(document).ready(function() {
	
	$(".navigation_menu").removeClass("active");
	$("#menu_products").addClass("active");
	
	if($("#selectedSubCategoryId").val().length>0){
		$("#subctgr_"+$("#selectedSubCategoryId").val()).addClass("active");
	}
	
	//setInterval(animateCategoryElements, 5000);
	
	/**
	 * Always call the skrollr init function after any document height changing plugin like carousel
	 */
	skrollr.init({
		skrollrBody:'page-container',
		edgeStrategy:'set'
	});
});

/*function animateCategoryElements(){
	var currentIndex = moduloIndex;
	console.log("----------------------------- moduloIndex:"+moduloIndex);
	while(currentIndex<$(".hot-this-week-img-container img").length){
		console.log("---:"+currentIndex);
		var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		$(".hot-this-week-img-container img:eq("+currentIndex+")").addClass("animated flip").one(animationEnd, function() {
            $(this).removeClass("animated flip");
        });
		currentIndex += intervalIndex;
	}
	
	moduloIndex = (moduloIndex+1)%intervalIndex;
}*/