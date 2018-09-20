function addonsPopup()
{
	$.blockUI({message: $("#addons1")});		
}
function closePopUp()
{
	$.unblockUI();
}

function payment_gateway1()
{
	$.blockUI({message: $("#payment_gateway1")});		
}
function closePopUp1()
{
	$.unblockUI();
}

function free_payment_gateway()
{
	$.blockUI({message: $("#free_payment_gateway")});		
}
function closePopUp2()
{
	$.unblockUI();
}


$(function() {
		$("#clientHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});
		$("#invoiceHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});
                $("#invoiceHelp1 a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("class")).html();
				},
				showURL: false
		});
		$("#recurringHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});
		$("#autobillHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});
		$("#staffHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});
		$("#productHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});
		$("#productserviceHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});
		$("#currencyHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});
		$("#payementgatewayHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});
		$("#customizationHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});
		$("#additionalfieldsHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});
		$("#sendattachmentHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});
		/*$("#latefeeHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});*/
		$("#invoiceschedulingHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});
		$("#templatesHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});
		$("#timetrackingHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});
		$("#exportpdfHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});
		$("#exportreportHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});
		$("#userfriendlyHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});
		$("#unbrabdedHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});
		$("#businesslogoHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});
		$("#datasecurityHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});
		$("#customersupportHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});
		$("#apiHelp a").tooltip({				 
				bodyHandler: function() {
						return $($(this).attr("href")).html();
				},
				showURL: false
		});			
});		