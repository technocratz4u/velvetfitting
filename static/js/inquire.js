$(document).ready(function() {
	
	var itemsSelected = "";
	if (typeof (localStorage["enquireList"]) != "undefined" && (localStorage["enquireList"]).length > 0) {
		var items = JSON.parse(localStorage.getItem("enquireList"));
		for(var i=0;i<items.length;i++){
			if(itemsSelected.length>0){
				itemsSelected+="\n";
			}
			itemsSelected+=(i+1)+". "+items[i];
		}
	}
	
	$("#inquiryDetail").val("I am interested in your products."+"\n"+itemsSelected+"\n\nPlease contact me on my email/phone.");
	
	$("#inquirySubmit").click(function() {
		if($("#inquiryDetail").val().length==0){
			$("#alertMsg").html("Please fill the details of the inquiry");
			$("#alertMsg").show();
			$('html, body').animate({scrollTop:240}, '600', 'swing');
		}else if($("#inquiryEmail").val().length==0){
			$("#alertMsg").html("Please fill in your email");
			$("#alertMsg").show();
			$('html, body').animate({scrollTop:240}, '600', 'swing');
		}else if($("#inquiryMobile").val().length==0){
			$("#alertMsg").html("Please fill in your mobile no.");
			$("#alertMsg").show();
			$('html, body').animate({scrollTop:240}, '600', 'swing');
		}else if(!validateEmail($("#inquiryEmail").val())){
			$("#alertMsg").html("Please provide a valid email");
			$("#alertMsg").show();
			$('html, body').animate({scrollTop:240}, '600', 'swing');
		}else{
			$("#inquiryFrom").submit();
		}
	});
	
});

function validateEmail(sEmail){
	var filter = /^[^\s@]+@[^\s@]+\.[^\s@]+$/ ;
    if (filter.test(sEmail)) {
        return true;
    } else {
        return false;
    }
}