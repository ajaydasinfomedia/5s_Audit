function loadBanner()
{
	$.blockUI({message: $("#popup_new"),  centerY: true, centerX: true, css: {top:'15%', left:'25%'}});			
}

$(document).ready(function() {
			
	//$("#discountBanner").trigger("click");		
	$("#discountBanner").click(function() {
			
			//$.blockUI.defaults.css = {};
			//var browser = navigator.appName;   			
			$.blockUI({message: $("#popup_new"),  centerY: true, centerX: true, css: {top:'15%', left:'25%'}});			
	});
	
	$("#closePopID").click(function() {			
		$.unblockUI();	
	});

});


