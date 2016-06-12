$(document).ready(function() {
	
	$(".navigation_menu").removeClass("active");
	$("#menu_home").addClass("active");
	
	$("#buy-from-us-img").addClass("animated zoomIn");
	
	/*
	var windowViewPortHeight = $( window ).height();
	var isGetToKnowLColAnimated = false;
	var isGetToKnowRColAnimated = false;
	var isBuyFromUsLColAnimated = false;
	var isBuyFromUsRColAnimated = false;
	$(window).scroll(function() {
	    var scrollPosition = $(window).scrollTop();
	    if(!isGetToKnowLColAnimated){
	    	var getToKnowLColTop = $("#get-to-know-lcol").offset().top;
	    	if(scrollPosition>(getToKnowLColTop-windowViewPortHeight)){
	    		$("#get-to-know-lcol").addClass("animated bounceInLeft");
	    		isGetToKnowLColAnimated = true;
	    		//console.log("Animating GetToKnowLCol at scrollPosition : "+scrollPosition+", getToKnowLColTop : "+getToKnowLColTop+", windowViewPortHeight : "+windowViewPortHeight);
	    	}
	    }
	    if(!isGetToKnowRColAnimated){
	    	var getToKnowRColTop = $("#get-to-know-rcol").offset().top;
	    	if(scrollPosition>(getToKnowRColTop-windowViewPortHeight)){
	    		$("#get-to-know-rcol").addClass("animated bounceInRight");
	    		isGetToKnowRColAnimated = true;
	    		//console.log("Animating GetToKnowRCol at scrollPosition : "+scrollPosition+", getToKnowRColTop : "+getToKnowRColTop+", windowViewPortHeight : "+windowViewPortHeight);
	    	}
	    }
	    if(!isBuyFromUsLColAnimated){
	    	var buyFromUsLColTop = $("#buy-from-us-list-lcol").offset().top;
	    	if(scrollPosition>(buyFromUsLColTop-windowViewPortHeight)){
	    		$("#buy-from-us-list-lcol").addClass("animated zoomIn");
	    		isBuyFromUsLColAnimated = true;
	    		//console.log("Animating GetToKnowLCol at scrollPosition : "+scrollPosition+", getToKnowLColTop : "+getToKnowLColTop+", windowViewPortHeight : "+windowViewPortHeight);
	    	}
	    }
	    if(!isBuyFromUsRColAnimated){
	    	var buyFromUsRColTop = $("#buy-from-us-list-rcol").offset().top;
	    	if(scrollPosition>(buyFromUsRColTop-windowViewPortHeight)){
	    		$("#buy-from-us-list-rcol").addClass("animated zoomIn");
	    		isBuyFromUsRColAnimated = true;
	    		//console.log("Animating GetToKnowLCol at scrollPosition : "+scrollPosition+", getToKnowLColTop : "+getToKnowLColTop+", windowViewPortHeight : "+windowViewPortHeight);
	    	}
	    }
	});
	*/
	$('#homeCarousel').owlCarousel({
    	slideSpeed : 100,
		paginationSpeed : 400,
		singleItem : true,
		autoPlay : true,
		stopOnHover : true
    });
	
	$("#hot-this-week-carousel").owlCarousel({

		items : 4, //5 items above 1000px browser width

		itemsDesktop : [ 1199, 4 ],
		itemsDesktopSmall : [ 979, 3 ],
		itemsTablet : [ 768, 2 ],
		itemsTabletSmall : false,
		itemsMobile : [ 479, 1 ],

		autoPlay : true,
		stopOnHover : true

	});
	
	/**
	 * Always call the skrollr init function after any document height changing plugin like carousel
	 */
	skrollr.init({
		skrollrBody:'page-container',
		edgeStrategy:'set'
	});
	
});