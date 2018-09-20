<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" 
>
<body onLoad="repaintAll();">
	<script type="text/javascript" language="javascript">
		<!--		
			var currentDateFormatted;
			var startDateFormatted;
			var currentDate = new Date();
			var numOccurred = "0";

			function repaintAll () {				
				var startDay, startMonth;
				
				startDay = currentDate.getDate();
				startMonth = currentDate.getMonth() + 1;			
				
				if (startDay < 10) startDay = "0" + startDay;
				if (startMonth < 10) startMonth = "0" + startMonth;
					
				currentDateFormatted = startMonth + "/" + startDay + "/" + currentDate.getFullYear();
				
				if (document.getElementById('tbodyStartDate').style.display == ""){					
					startDateFormatted = currentDateFormatted;
				}else {
					startDateFormatted = document.SubscriptionAdd.txtStartDate.value;
				}
				
				if (document.SubscriptionAdd.txtNumOccurred.value != ""){
					numOccurred = document.SubscriptionAdd.txtNumOccurred.value;
				} else {
					if (document.SubscriptionAdd.txtStartDate.value == ""){
						document.SubscriptionAdd.txtStartDate.value = startDateFormatted;
					}	
				}
				
				if (document.SubscriptionAdd.txtNumRecur.value == ""){
					document.SubscriptionAdd.elements["radDurationEnd"][0].checked = true;
				}
				
				EvaluateECheckType();
				showPayment();
				showDuration(document.SubscriptionAdd);
			}
			
			function showPayment() {
				if (typeof(document.SubscriptionAdd.radMethod)  != 'undefined') {
					// subscription add
					if (typeof(document.SubscriptionAdd.elements["radMethod"][0]) != 'undefined'){
	 					if (document.SubscriptionAdd.elements["radMethod"][0].checked){
							// Show Credit card 
							document.getElementById('tbodyCC').style.display='';
							document.getElementById('tbodyBank').style.display='none';
						} else {
							// Show Debit a Bank Account
							document.getElementById('tbodyCC').style.display='none';
							document.getElementById('tbodyBank').style.display='';
						}
					} else {
						document.getElementById('tbodyCC').style.display='';
						document.getElementById('tbodyBank').style.display='none';
					}
				} else {
					// subscription edit
					document.getElementById('btnReset').style.display='none';
					if (typeof(document.SubscriptionAdd.radInterval)  != 'undefined') {
											
						if (!isEmpty(document.SubscriptionAdd.ddlInterval, ""))
							document.SubscriptionAdd.elements["radInterval"][0].checked = true;
						else if (!isEmpty(document.SubscriptionAdd.txtIntervalDay, ""))
							document.SubscriptionAdd.elements["radInterval"][1].checked = true;
					}
				}
			}			
			
			function showDBA() {
				document.getElementById('tbodyCC').style.display='none';
				document.getElementById('tbodyBank').style.display='';
			}
			
			function isValidRegExp(field, fieldName, regexp){
				var re = new RegExp(regexp);
				if (re.test(field) == false) {
					alert('Invalid ' + fieldName + '.');
					field.focus();
					return false;
				}
				
				return true;
			}
			
			function showDuration(form) {
				if (form.elements["radDurationEnd"][0].checked){
					form.txtNumRecur.value = '';
					form.txtEndDate.value = '';
					
					form.txtNumRecur.disabled = true;
					form.txtEndDate.disabled = true;
				}
				else if (form.elements["radDurationEnd"][1].checked){
					form.txtNumRecur.disabled = true;
					form.txtEndDate.disabled = false;
				}else {
					form.txtNumRecur.disabled = false;
					form.txtEndDate.disabled = true;
				}
			}
			
			function validateForm(form){
				var strAmount;				
				
				if (document.getElementById('tbodyCC').style.display == ""){
					if (isEmpty(form.txtCCNum, "Card Number")) return false;
					if (isEmpty(form.txtExpDate, "Expiration Date")) return false;
				} else if (document.getElementById('tbodyBank').style.display == ""){
					if (isEmpty(form.txtNameOnAcct, "Name on Account")) return false;
					if (isEmpty(form.txtABA, "ABA Routing Number")) return false;
					if (isEmpty(form.txtBankAcctNum, "Account Number")) return false;
					if (isEmpty(form.ddlAcctType, "Bank Account Type")) return false;
					if (isEmpty(form.ECheckTypeID, ''))
						if (isEmpty(form.ddlECheckType, "eCheck Type")) return false;
					
					if (typeof(form.txtNameOnAcct)  != 'undefined') {
						if (isSafeString(form.txtNameOnAcct, 'Name on Bank Account') == false) return false;
					}
			
					//if (isValidRegExp(form.txtABA, "ABA Routing Number", "\\d{9}")) return false;
					
					//if (!isValidNumDigits(form.txtABA, 9, 9, "ABA Routing Number")) return false
				}				
				
				if (isEmpty(form.txtAmount, "Amount")) return false;
				
				if (!isValidNumRangeMoney(form.txtAmount, 0.01, '99999.00', 'Amount')) return false;	
														
				if (form.elements["radInterval"][0].checked) {
					if (isEmpty(form.ddlInterval, "Interval")) return false;
				}else if (form.elements["radInterval"][1].checked) {
					if (isEmpty(form.txtIntervalDay, "Interval Day")) return false;
					if (!isValidNumRange(form.txtIntervalDay, 7, 365, "Interval Day")) return false
				}else {
					// if no interval is selected
					alert("Subscription Interval is a required field.  Please select one.");
					return false;
				}
				
				var txtStartDateLabel;
				
				if (form.txtNumOccurred.value != "") txtStartDateLabel = 'Revised Start Date';
				else txtStartDateLabel = 'Subscription Start Date';
				
				if (isEmpty(form.txtStartDate, txtStartDateLabel)) return false;
				else if (!isValidDate(form.txtStartDate, txtStartDateLabel, startDateFormatted)) return false;
				
				if (!form.txtEndDate.disabled){
					if (isEmpty(form.txtEndDate, "Subscription End Date")) return false;
				}
				
				if (form.elements["radDurationEnd"][1].checked){
					if (isEmpty(form.txtEndDate, "End Date")) return false;
					else if (!isValidDate(form.txtEndDate, "Subscription End Date", form.txtStartDate.value)) return false;
					else if (!isValidDate(form.txtEndDate, "Subscription End Date", currentDateFormatted)) return false;
					if (numOccurred != "0") {
						if (!isValidNumRange(form.txtNumRecur, parseInt(numOccurred) + 1, "", "")) {
							alert('Please correct the End Date.  End Date should occur at least after ' + (parseInt(numOccurred) + 1) + ' occurrences');
							form.txtEndDate.focus();							
							return false;
						}
					}
				}else if (form.elements["radDurationEnd"][2].checked){
					if (isEmpty(form.txtNumRecur, "Number of Occurrences")) return false;
					if (numOccurred != "0") {
						if (!isValidNumRange(form.txtNumRecur, parseInt(numOccurred) + 1, "", "Number of Occurrences")) return false;
					} else {
						if (!isValidNumRange(form.txtNumRecur, 1, "", "Number of Occurrences")) return false;
					}
				}
				
				var startDate = new Date(form.txtStartDate.value);
							
				var maxDate = (startDate.getMonth() + 1) + "/" + startDate.getDate() + "/" + (startDate.getFullYear() + 3);

				var maxDate = new Date(startDate.getFullYear() + 3, startDate.getMonth(),startDate.getDate());
				var maxDateFormatted = (maxDate.getMonth() + 1) + "/" + maxDate.getDate() + "/" + maxDate.getFullYear();

				//if (!isValidDate(maxDateFormatted, "", form.txtEndDate.value)){
				//	alert("Your Subscription cannot run for more than three years. Please check your number of recurrences or end date.");
				//	if (form.elements["radDurationEnd"][1].checked){
				//		form.txtEndDate.focus();
				//	}else if (form.elements["radDurationEnd"][2].checked){
				//		form.txtNumRecur.focus();
				//	}
				//	return false;
				//}
				
				if (typeof(form.txtTrialAmount)  != 'undefined' && typeof(form.txtNumTrialPeriod)  != 'undefined') {
					if ( !isEmpty(form.txtTrialAmount, "") || !isEmpty(form.txtNumTrialPeriod, "") ){
						if (isEmpty(form.txtNumTrialPeriod, "Trial Occurrences")) return false;
						if (isEmpty(form.txtTrialAmount, "Trial Amount")) return false;
						if (!isValidNumRangeMoney(form.txtTrialAmount, '0', '99999.00', 'Trial Amount')) return false;	
						//if (!isValidAmount(form.txtTrialAmount, "Trial Amount")) return false;						
						
						if (!isValidNumRange(form.txtNumTrialPeriod, numOccurred, form.txtNumRecur.value, "Trial Occurrences")) return false;
					}
				}
				
				if (isEmpty(form.txtFirstName, "First Name")) return false;
				if (isEmpty(form.txtLastName, "Last Name")) return false;		
				
				if (typeof(form.txtEmail)  != 'undefined') {
					if (form.txtEmail.value.length > 0) {
						if (isValidEmail(form.txtEmail) == false) {
							return false;
						}
					}
				}
				
				if (typeof(form.txtDLDOB) != 'undefined') {
					if (form.txtDLDOB.value.substring(0,5) != 'XX/XX'){
						if (form.txtDLDOB.value.length > 0) {
							if (isValidBirthDate(form.txtDLDOB, 'Birth Date') == false) {
								alert('The Drivers License DOB that you have entered is not valid. Please re-enter this value and click Submit.');
								form.txtDLDOB.focus();
								return false;
							}
						}
					}
					
				}
				
				form.txtNumRecur.disabled = false;
				form.txtEndDate.disabled = false;
					
				form.action = '';
				return true;
			}
			
			// Copy billing info to shipping info
			function CopyFromBilling(form) {
				if (form.chkSameAsBill.checked) {
					copyField(form.txtFirstName, form.txtShippingFirstName);
					copyField(form.txtLastName, form.txtShippingLastName);
					copyField(form.txtCompany, form.txtShippingCompany);
					copyField(form.txtAddress, form.txtShippingAddress);
					copyField(form.txtCity, form.txtShippingCity);
					copyField(form.txtState, form.txtShippingState);
					copyField(form.txtZip, form.txtShippingZip);
					copyField(form.txtCountry, form.txtShippingCountry);
				}
			}
			
			function copyField(from, to) {
				if (typeof(from)  != 'undefined') {
					if (typeof(to) != 'undefined') {
					    	to.value = from.value;
					    }
				}
			}
			
			function calculateEndDate(form){	
				var nOccurrences = form.txtNumRecur.value;
				var endDate = "";
				
				if (form.elements["radDurationEnd"][2].checked){
					if (!isEmpty(form.txtStartDate, "") && !isEmpty(form.txtNumRecur, "") 
						&& isValidNumRange(form.txtNumRecur, 1, "", "")) {
						if (isValidDate(form.txtStartDate, "", startDateFormatted)){
							if (form.elements["radInterval"][0].checked && !isEmpty(form.ddlInterval, "")) {
								//var nMonth = monthsBetween(form.txtStartDate.value,form.txtEndDate.value);
								if (nOccurrences == "1"){
									endDate = form.txtStartDate.value;
								}
								else {
									var nMonth = parseInt(nOccurrences) * parseInt(form.ddlInterval.value) - parseInt(form.ddlInterval.value);
									endDate = addMonths(form.txtStartDate.value, nMonth);
								}
							}else if (form.elements["radInterval"][1].checked && !isEmpty(form.txtIntervalDay, "")
								&& isValidNumRange(form.txtIntervalDay, 7, 365, "")) {
								endDate = addDays(form.txtStartDate.value, (parseInt(nOccurrences) - 1) * parseInt(form.txtIntervalDay.value));
								
							}						
						}					
					}
					form.txtEndDate.value = endDate;
				}			
			}
			
			function calculateOccurrences(form){
				var nOccurrences = "";
				
				if (form.elements["radDurationEnd"][1].checked){
					if (!isEmpty(form.txtStartDate, "") && !isEmpty(form.txtEndDate, "")) {
						if (isValidDate(form.txtStartDate, "", startDateFormatted)
									&& isValidDate(form.txtEndDate, "", form.txtStartDate.value)){
							if (form.elements["radInterval"][0].checked && !isEmpty(form.ddlInterval, "")) {
								var nMonth = monthsBetween(form.txtStartDate.value,form.txtEndDate.value);
								nOccurrences = Math.floor(nMonth	  / form.ddlInterval.value) + 1;
							}else if (form.elements["radInterval"][1].checked && !isEmpty(form.txtIntervalDay, "")
								&& isValidNumRange(form.txtIntervalDay, 7, 365, "")) {
								var nDays = daysBetween(new Date(form.txtStartDate.value), new Date(form.txtEndDate.value));
								nOccurrences = Math.floor(nDays / form.txtIntervalDay.value) + 1;
							}	
						}						
					}
					form.txtNumRecur.value = nOccurrences;
				}
			}
			
			function addDays(strDate,iDays){
				var newDate = Date.parse(strDate);
				newDate = parseInt(newDate, 10);
				
				// Add 2 hrs to account for daylight savings time.
				newDate = newDate + iDays*(24*60*60*1000 + 120000);
				newDate = new Date(newDate);
				
				var newDay = newDate.getDate();
				var newMonth = newDate.getMonth() + 1;
				
				return  (newMonth < 10 ? "0" + newMonth : newMonth) + "/" +
						(newDay < 10 ? "0" + newDay : newDay)+ "/" +
						newDate.getFullYear() ;
			}
				
			function addMonths(strDate,iMonth){
				var startDate = new Date(strDate);
				var newDate = new Date(startDate.getFullYear(), startDate.getMonth() + iMonth,startDate.getDate());
				var newDay = newDate.getDate();
				
				if (newDay < startDate.getDate()){
					newDate = new Date(newDate.getFullYear(), newDate.getMonth(), newDate.getDate() - newDay);
				}
				
				newDay = newDate.getDate();
				var newMonth = newDate.getMonth() + 1;
				
				//alert(newDate);
				return  (newMonth < 10 ? "0" + newMonth : newMonth) + "/" +
						(newDay < 10 ? "0" + newDay : newDay)+ "/" +
						newDate.getFullYear() ;
				
			}
					
			function monthsBetween(date1, date2) {

				var startYear = date1.split('/')[2];
				var endYear = date2.split('/')[2];
				
				var startMonth = date1.split('/')[0];
				var endMonth = date2.split('/')[0];
				
				var startDay = date1.split('/')[1];
				var endDay = date2.split('/')[1];
				
				var nMonth = endMonth - startMonth;
				
				var nYear = endYear - startYear;
				
				if (startYear < endYear){
					nMonth = nYear * 12 + nMonth;
				}
				
				if (endDay < startDay) nMonth--;
				
				return nMonth;
			}
			
			function yearsBetween(date1, date2) {

				var startYear = date1.split('/')[2];
				var endYear = date2.split('/')[2];
				
				var startMonth = date1.split('/')[0];
				var endMonth = date2.split('/')[0];
				
				var startDay = date1.split('/')[1];
				var endDay = date2.split('/')[1];
				var nYear = endYear - startYear;				
				
				var nMonth = endMonth - startMonth;
				
				var nDay = endDay - startDay;
				
				if ((nMonth < 0) || ((nMonth == 0) && (nDay < 0) )) nYear = nYear - 1;
				
				return nYear;
			}
			
			function preventEnterKey(e, field, altfield){
				var ie = (document.all)?true:false ;
				var nn = (document.layers)?true:false ;
				var ns6 = (document.getElementById)?true:false ;
				
				var icode,ncode,nscode,key;

				if(ie) {
					icode = e.keyCode; 
				}else if(nn) { 
					ncode = e.which;
				} else if(ns6) {
					nscode = e.which;
				}

				if(icode == 13 || ncode == 13 || nscode == 13) {
					if ( (typeof(field) != 'undefined') && (field.disabled == false)) field.focus();
					else if (typeof(altfield) != 'undefined') altfield.focus();
					return false;
				}
				
				return true;

			}
			
			function EvaluateECheckType(){
				var selectedAcctTypeValue = document.SubscriptionAdd.ddlAcctType.options[document.SubscriptionAdd.ddlAcctType.selectedIndex].value;
				
				if (selectedAcctTypeValue == '')
					return;
						
				if (selectedAcctTypeValue == 'BC') {
					UpdateECheckTypeDesc('CCD (Corporate customer)', '3', false);
				} else {					
					UpdateECheckTypeDesc('', '', true);
				}
			}			

			function UpdateECheckTypeDesc(sECheckType, iECheckTypeID, bDropdown){
								
				var strDesc = '';
				
				if (sECheckType == '') {
					sECheckType = document.SubscriptionAdd.ddlECheckType.options[document.SubscriptionAdd.ddlECheckType.selectedIndex].text;
					iECheckTypeID = document.SubscriptionAdd.ddlECheckType.options[document.SubscriptionAdd.ddlECheckType.selectedIndex].value;
				}

				if (sECheckType != '' && sECheckType != '--Select One--')
					strDesc = "<a href='#' onClick=window.open('/help/glossary.htm#" + sECheckType.substr(0, 3) + "','help',config='height=400,width=600,scrollbars=1,resizable=1')>Tell me more</a>";
								
				if (bDropdown == false) {						
					document.getElementById('ECheckTypeInfo').style.display='none';
					strDesc = '<b>' + sECheckType + '</b> ' + strDesc;
				} else {
					document.getElementById('ECheckTypeInfo').style.display='';
					strDesc = strDesc;
				}

				document.SubscriptionAdd.ECheckTypeID.value = iECheckTypeID;
				
				document.getElementById('eCheckTypeDesc').innerHTML = strDesc;
				
			}
		//-->
	</script>
	<style type="text/css">
		INPUT.ButtonLarge
		{
			WIDTH: 163px;
		}
	</style>
	<script src="/help/ehlpdhtm.js" language="javascript" type="text/javascript"></script>
	

	
<link href="/UI/themes/anet.css" type="text/css" rel="stylesheet">
<link href="/UI/themes/sandbox/layout.css" type="text/css" rel="stylesheet">
<script src="/UI/themes/XMLUtils.js" language="javascript" type="text/javascript"></script>

<div id="ucHeader_ucTopMenu_pnlMenu">
	
	<div class="HeaderLinks" align="right">
		<div class="HeaderLogout">
			<a href="/UI/themes/sandbox/logon.aspx?sub=logout" id="ucHeader_ucTopMenu_lnkLogout" class="HeaderLogout">Log Out</a>
		</div>
		<div class="HeaderLogoutLinkDivider">
			<span>|</span>
		</div>

	    <div class="HeaderMenu">
	        
		    <a href="javascript: openWin('/UI/themes/sandbox/ContactUs/Feedback.aspx', 'Feedback', '', '', '0');" id="ucHeader_ucTopMenu_lnkFeedback" class="HeaderLinks">Feedback</a><span 
		    class="HeaderLinksDivider">|</span><a href="javascript: openWin('/UI/themes/sandbox/ContactUs/Support.aspx', 'support', '750', '600', '0');" id="ucHeader_ucTopMenu_lnkSupport" class="HeaderLinks">Contact Us</a><span 
		    class="HeaderLinksDivider">|</span><a href="javascript: openHelp(0);" class="HeaderLinks">Help</a>
	    </div>
		<div id="HeaderMenuCorner"></div>
	</div>

</div>

	
<div class="Main">
	<span id="ucHeader_lblHeader">
		<TABLE width="100%" cellspacing="0" cellpadding="0">
			<TR>
				<TD colspan="2" class="TopNav"></TD>
			</TR>
			<TR>
				<TD><img src="/UI/themes/anet/images/authorizenet_logo.gif" height="75px" width="176px;"></TD>
				<TD class="HeaderRight" valign="top"></TD>

			</TR>
		</TABLE>
	</span>
	
	<TABLE cellspacing="0" cellpadding="0" align="left" border="0" width="100%">
	<div id="ucHeader_ucTopNav">
	<tr><td colspan="2"><div class="barHoriz Content"><table class="TopNav" cellspacing="0" cellpadding="0"><tr><td><table class="InactiveHoriz" cellspacing="0" cellpadding="0" height="100%"><tr><td style="white-space:nowrap;"><a class="topNav" href="/UI/themes/sandbox/home.aspx">Home</a></td></tr></table></td><td><table class="activeHoriz" cellspacing="0" cellpadding="0" height="100%"><tr><td style="white-space:nowrap;"><a class="topNavActive" href="/UI/themes/sandbox/merch.aspx?page=terminal">Tools</a></td></tr></table></td><td><table class="InactiveHoriz" cellspacing="0" cellpadding="0" height="100%"><tr><td style="white-space:nowrap;"><a class="topNav" href="/UI/themes/sandbox/merch.aspx?page=history&sub=report">Reports</a></td></tr></table></td><td><table class="InactiveHoriz" cellspacing="0" cellpadding="0" height="100%"><tr><td style="white-space:nowrap;"><a class="topNav" href="/UI/themes/sandbox/merch.aspx?page=search&sub=batchlist">Search</a></td></tr></table></td><td><table class="InactiveHoriz" cellspacing="0" cellpadding="0" height="100%"><tr><td style="white-space:nowrap;"><a class="topNav" href="/UI/themes/sandbox/Settings/SettingsMain.aspx">Account</a></td></tr></table></td></tr></table></div></td></tr><tr height="100%"><td rowspan="2" class="barVert" valign="top"><div id=LeftNav class=LeftNav><div class="InactiveVert"><a class="LeftNav" href="/UI/themes/sandbox/merch.aspx?page=terminal">Virtual Terminal</a></div><div class="InactiveVert"><a class="LeftNav" href="/UI/themes/sandbox/batchupload.aspx">Upload Transactions</a></div><div class="activeVert"><a class="LeftNavActive" href="/UI/themes/sandbox/ARB/SubscriptionMenu.aspx">Recurring Billing</a></div><div class="InactiveVert"><a class="LeftNav" href="/UI/themes/sandbox/FraudFilter/Menu.aspx">Fraud Detection Suite</a></div><div class="InactiveVert"><a class="LeftNav" href="/UI/themes/sandbox/CustomerProfile/About.aspx">Customer Information Manager</a></div><div class="InactiveVert"><a class="LeftNav" href="/UI/themes/sandbox/Catalog/CatalogHome.aspx">Simple Checkout</a></div></td><td class="Content"></td></tr>

</div>
	
		<tr>
			<td class="Main" valign="top" height="100%">
				<table id="MainWin" width="100%" height="100%" cellspacing="0" cellpadding="0" border="0" style="MARGIN-TOP:-1px; POSITION:relative">
					
					
					
					
					


					<span id="ucHeader_lblBreadCrumb">
						<tr>
							<td>
								

							</td>
						</tr>

					</span>
					<tr>
						<td id="Main" valign="top" style="PADDING: 10px 0px 4px 15px;">
							
						

	<form name="SubscriptionAdd" method="post" action="subscriptionadd.aspx" id="SubscriptionAdd" onsubmit="return validateForm(this);" autocomplete="off">
<div>
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMjA0OTE0MjI4MQ9kFgYCAQ9kFgJmD2QWAmYPZBYKAgEPFgIeBGhyZWYFKC9VSS90aGVtZXMvc2FuZGJveC9sb2dvbi5hc3B4P3N1Yj1sb2dvdXRkAgMPFgIeB1Zpc2libGVoFgICAQ8WAh8BaGQCBQ8WAh8ABVtqYXZhc2NyaXB0OiBvcGVuV2luKCcvVUkvdGhlbWVzL3NhbmRib3gvQ29udGFjdFVzL0ZlZWRiYWNrLmFzcHgnLCAnRmVlZGJhY2snLCAnJywgJycsICcwJyk7ZAIHDxYCHwAFX2phdmFzY3JpcHQ6IG9wZW5XaW4oJy9VSS90aGVtZXMvc2FuZGJveC9Db250YWN0VXMvU3VwcG9ydC5hc3B4JywgJ3N1cHBvcnQnLCAnNzUwJywgJzYwMCcsICcwJyk7ZAIIDw8WAh8BaGQWAgIBDxYCHwAFWWphdmFzY3JpcHQ6IG9wZW5XaW4oJy9VSS90aGVtZXMvc2FuZGJveC9Db250YWN0VXMvQ2hhdC5hc3B4JywgJ2NoYXQnLCAnNTAwJywgJzM1MCcsICcwJyk7ZAIDD2QWCAIHD2QWBAIHDxAPZBYCHghvbmNoYW5nZQUgamF2YXNjcmlwdDogRXZhbHVhdGVFQ2hlY2tUeXBlKClkZGQCCQ8QD2QWAh8CBWJqYXZhc2NyaXB0OiBVcGRhdGVFQ2hlY2tUeXBlRGVzYyhvcHRpb25zW3NlbGVjdGVkSW5kZXhdLnRleHQsIG9wdGlvbnNbc2VsZWN0ZWRJbmRleF0udmFsdWUsIHRydWUpOw8WAgIBAgIWAhAFG1BQRCAoV3JpdHRlbiBhdXRob3JpemF0aW9uKQUBMWcQBRxXRUIgKEludGVybmV0IGF1dGhvcml6YXRpb24pBQEyZ2RkAggPZBYCAgEPFgIeCWlubmVyaHRtbAUsQW1lcmljYW4gRXhwcmVzcywgRGlzY292ZXIsIE1hc3RlckNhcmQsIFZpc2FkAhYPDxYCHwFoZBYCAgEPEGRkFgFmZAIiDw8WAh8BaGRkAgcPZBYCAgEPZBYCZg8WAh4EVGV4dAXJAw0KCTxkaXYgY2xhc3M9IkNvcHlyaWdodCIgYWxpZ249InJpZ2h0Ij4NCgkJPGEgY2xhc3M9IkNvcHlyaWdodCIgdGFyZ2V0PSJfYmxhbmsiIGhyZWY9Imh0dHA6Ly93d3cuYXV0aG9yaXplLm5ldC9jb21wYW55L3Rlcm1zLyI+VGVybXMgb2YgVXNlPC9hPiZuYnNwO3wmbmJzcDsNCgkJPGEgY2xhc3M9IkNvcHlyaWdodCIgdGFyZ2V0PSJfYmxhbmsiIGhyZWY9Imh0dHA6Ly93d3cuYXV0aG9yaXplLm5ldC9jb21wYW55L3ByaXZhY3kvIj5Qcml2YWN5IFBvbGljeTwvYT48YnI+DQoJCcKpIDIwMDUsIDIwMTIuIEF1dGhvcml6ZS5OZXQgaXMgYSByZWdpc3RlcmVkIHRyYWRlbWFyayBvZiBDeWJlclNvdXJjZSBDb3Jwb3JhdGlvbi48YnI+IA0KCQlBbGwgb3RoZXIgbWFya3MgYXJlIHRoZSBwcm9wZXJ0eSBvZiB0aGVpciByZXNwZWN0aXZlIG93bmVycy4gQWxsIHJpZ2h0cyByZXNlcnZlZC4gDQoJPC9kaXY+DQpkGAEFHl9fQ29udHJvbHNSZXF1aXJlUG9zdEJhY2tLZXlfXxYBBQ5yYWRidG5JbnRlcnZhbP+OHxdXh0THtvxTmWK5zvob/SQd" />
</div>

<script language="JavaScript"> var helplink = "/help"</script>
		<input autocomplete="off" type="hidden" name="__PAGE_KEY" value="wBUQLqLqrXn%2bxK101FKjQCzhaR5DHsBSyN4iiN0T%2bnk%3d" />
		<table width="100%">

			<TBODY>
				<tr>
					<td colspan="2">					
						<div id="PageHeader">
							<div id="Title">
								Create New ARB Subscription
							</div>
							<div id="Help">
								<a href="javascript:openHelp(10001);" id="lnkHelp">
									Help
								</a>	
							</div>

						</div>					
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<hr>
					</td>
				</tr>
				<tr id="trTopIntroForCreate">

	<td colspan="2">
						To create a new ARB subscription, provide payment, order, subscription, customer billing, and shipping information below. 
						For help with providing subscription information, see the <a href="javascript:openHelp(10001);">Create New ARB Subscription help file</a>.
					</td>
</tr>

				<tr>
					<td colspan="2">
							<div id="ValidationSummary1" class="DefaultErrorFont" style="color:Red;MARGIN:7px;display:none;">

</div>

						<input name="txtNumOccurred" type="text" maxlength="3" id="txtNumOccurred" style="width:30px;DISPLAY: none" />

						
					</td>
				</tr>
				<tr>
					<td colspan="2" align="right">	
						* Required Fields
					</td>
				</tr>
				<div id="pnlPaymentMethod">
	
					<TR>

						<TD class="HeaderFont" colSpan="2">Select Payment Method
						</TD>
					</TR>
					<TR>
						<TD colSpan="2">
							<table id="radMethod" onclick="javascript:showPayment();" border="0">
		<tr>
			<td><input id="radMethod_0" type="radio" name="radMethod" value="CC" checked="checked" /><label for="radMethod_0">Charge a Credit Card</label></td>
		</tr><tr>

			<td><input id="radMethod_1" type="radio" name="radMethod" value="ECheck" /><label for="radMethod_1">Charge a Bank Account</label></td>
		</tr>
	</table></TD>
					</TR>
				
</div>
				<tr>
					<td colspan="2" class="HeaderFont">
						Payment/Authorization Information
					</td>

				</tr>
				<tbody id="tbodyBank" style="DISPLAY: none">
					<tr>
						<td align="right">
							Name on Account
						</td>
						<td><input name="txtNameOnAcct" type="text" maxlength="22" id="txtNameOnAcct" />&nbsp;*
						</td>
					</tr>
					<tr>

						<td align="right">
							ABA Routing Number
						</td>
						<td><input name="txtABA" type="text" maxlength="9" id="txtABA" />&nbsp;* <a class="Small" href="javascript:openHelp(14001);"> What is this? </a>
						</td>
					</tr>
					<tr>
						<td align="right" width="35%">

							Account Number
						</td>
						<td><input name="txtBankAcctNum" type="text" maxlength="17" id="txtBankAcctNum" />&nbsp;*
						</td>
					</tr>
					<tr>
						<td align="right">
							Bank Account Type
						</td>
						<td>

							<select name="ddlAcctType" id="ddlAcctType" onchange="javascript: EvaluateECheckType()">
	<option value="">--Select One--</option>
	<option value="C">Checking</option>
	<option value="S">Savings</option>
	<option value="BC">Business Checking</option>

</select>&nbsp;*
						</td>

					</tr>
					<tr>
						<td align="right">
							eCheck Type
						</td>
						<td>
							<span id="ECheckTypeInfo">
						<select name="ddlECheckType" id="ddlECheckType" onchange="javascript: UpdateECheckTypeDesc(options[selectedIndex].text, options[selectedIndex].value, true);">
	<option value="">--Select One--</option>

	<option value="1">PPD (Written authorization)</option>
	<option value="2">WEB (Internet authorization)</option>

</select>&nbsp;*
						</span><span id="eCheckTypeDesc" class="DefaultSmallFont"></span>
							<input type="hidden" id="ECheckTypeID" name="ECheckTypeID">
						</td>
					</tr>
					<tr>

						<td align="right">
							Bank Name
						</td>
						<td><input name="txtBankName" type="text" maxlength="50" id="txtBankName" />&nbsp;
						</td>
					</tr>
				</tbody>
				<tbody id="tbodyCC">
					<tr>

						<td align="right">
							Accepted Payment Method
						</td>
						<td>
							<span id="lblPaymentMethod">American Express, Discover, MasterCard, Visa</span>
						</td>
					</tr>
					<tr>
						<td align="right" width="35%">

							Card Number
						</td>
						<td width="65%"><input name="txtCCNum" type="text" maxlength="16" id="txtCCNum" />&nbsp;*&nbsp;&nbsp;<span class="DefaultSmallFont">(enter number without spaces)
						</td>
					</tr>
					<tr>
						<td align="right">
							Expiration Date
						</td>
						<td><input name="txtExpDate" type="text" maxlength="4" id="txtExpDate" style="width:60px;" />&nbsp;*&nbsp;&nbsp;(MMYY)</span>

						</td>
					</tr>
				</tbody>
				<TBODY>
					<tr>
						<td align="right">
							Amount
						</td>
						<td><input name="txtAmount" type="text" maxlength="9" id="txtAmount" />&nbsp;*&nbsp;&nbsp;<span class="DefaultSmallFont">(i.e.,10.00)</span>

						</td>
					</tr>
					<tr>
						<td colspan="2" class="HeaderFont">
							Order Information
						</td>
					</tr>
					<tr>
						<td align="right">

							Subscription Name
						</td>
						<td>
							<input name="txtSubscriptionName" type="text" maxlength="50" id="txtSubscriptionName" />
						</td>
					</tr>
					<tr>
						<td align="right">
							Invoice #
						</td>

						<td>
							<input name="txtInvoiceNum" type="text" maxlength="20" id="txtInvoiceNum" />
						</td>
					</tr>
					<tr>
						<td align="right" valign="top">
							Description
						</td>
						<td>

							<textarea name="txtDescription" rows="5" cols="20" id="txtDescription" style="width:265px;"></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="HeaderFont">
							Subscription Interval
						</td>
					</tr>
					<tbody id="tbodyInterval">

						<tr>
							<td colspan="2">
								* Select how often the customer should be billed. You must select a <a href="javascript:void(0);" onMouseOver="BSPSPopupOnMouseOver(event);" onclick="BSSCPopup('/help/Miscellaneous/Pop-up_Terms/ARB/Subscription_Interval.htm');return false;">Subscription Interval</a> by either selecting a month based interval from the drop-down OR entering an interval based on a set number of days.
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="radio" name="radInterval" value="MM" checked onclick="javascript:calculateOccurrences(document.SubscriptionAdd);calculateEndDate(document.SubscriptionAdd);">

								<select name="ddlInterval" id="ddlInterval" onchange="javascript:calculateOccurrences(document.SubscriptionAdd);calculateEndDate(document.SubscriptionAdd);">
	<option value="">Select One</option>
	<option value="1">Every</option>
	<option value="2">Every other</option>
	<option value="3">Every three</option>
	<option value="6">Every six</option>

	<option value="12">Every twelve</option>

</select>
								month(s)<br>
								<input value="DD" name="radInterval" type="radio" id="radbtnInterval" onclick="javascript:calculateOccurrences(document.SubscriptionAdd);calculateEndDate(document.SubscriptionAdd);" />
								Every
								<input name="txtIntervalDay" type="text" maxlength="3" id="txtIntervalDay" onkeypress="return preventEnterKey(event, document.SubscriptionAdd.txtStartDate, document.SubscriptionAdd.txtStartDate);" onblur="javascript:calculateOccurrences(document.SubscriptionAdd);calculateEndDate(document.SubscriptionAdd);" style="width:30px;" />
								days
								<span class="DefaultSmallFont">(Min 7, Max 365)</span><br>

							</td>
						</tr>
					</tbody>
					<TBODY>
						<tr>
							<td colspan="2">
								<span id="lblInterval"></span>
							</td>
						</tr>

						<tr>
							<td colspan="2" class="HeaderFont">
								Subscription Duration
							</td>
						</tr>
						<tr>
							<td colspan="2">
								Enter a <a href="javascript:void(0);" onMouseOver="BSPSPopupOnMouseOver(event);" onclick="BSSCPopup('/help/Miscellaneous/Pop-up_Terms/ARB/Start_Date.htm');return false;">Start Date</a> to establish when the subscription begins and enter either an <a href="javascript:void(0);" onMouseOver="BSPSPopupOnMouseOver(event);" onclick="BSSCPopup('/help/Miscellaneous/Pop-up_Terms/ARB/End_Date.htm');return false;">End Date</a> OR indicate the total number of billing occurrences in <a href="javascript:void(0);" onMouseOver="BSPSPopupOnMouseOver(event);" onclick="BSSCPopup('/help/Miscellaneous/Pop-up_Terms/ARB/Ends_After.htm');return false;">Ends After</a> to establish when the subscription expires.
							</td>

						</tr>
						<tr>
							<td colspan="2" class="DefaultSmallFont">
								<b>Note:</b> The <a class="small" href="javascript:void(0);" onMouseOver="BSPSPopupOnMouseOver(event);" onclick="BSSCPopup('/help/Miscellaneous/Pop-up_Terms/ARB/Subscription_Duration.htm');return false;">Subscription Duration</a> <i>includes</i> payments within the <a class="small" href="javascript:void(0);" onMouseOver="BSPSPopupOnMouseOver(event);" onclick="BSSCPopup('/help/Miscellaneous/Pop-up_Terms/ARB/Trial_Period.htm');return false;">Trial Period</a> when a trial period is set.
							</td>

						</tr>
						
						<tbody id="tbodyStartDate">
							<tr>
								<td align="right">
									Start Date
								</td>
								<td>
									<input name="txtStartDate" type="text" maxlength="10" id="txtStartDate" onkeypress="return preventEnterKey(event, document.SubscriptionAdd.txtEndDate, document.SubscriptionAdd.txtNumRecur);" onchange="javascript:calculateOccurrences(document.SubscriptionAdd);calculateEndDate(document.SubscriptionAdd);" style="width:100px;" />
									*&nbsp;&nbsp;<span class="DefaultSmallFont">(MM/DD/YYYY)</span>

								</td>
							</tr>
						</tbody>
						<tr>
							<td colspan="2">
								<div style="padding-left: 127px;">
									<div>
										<input type="radio" name="radDurationEnd" value="NoEndDate" onclick="javascript:showDuration(document.SubscriptionAdd);calculateOccurrences(document.SubscriptionAdd);">
										No End Date (ongoing subscription)
									</div>

								</div>
							</td>
						</tr>
						<tr>
							<td align="right">
								<input type="radio" name="radDurationEnd" value="EndDate" onclick="javascript:showDuration(document.SubscriptionAdd);">&nbsp;End 
								Date
							</td>
							<td>
								<input name="txtEndDate" type="text" maxlength="10" id="txtEndDate" onkeypress="return preventEnterKey(event, document.SubscriptionAdd.txtTrialAmount, document.SubscriptionAdd.txtCustomerID);" onblur="javascript:calculateOccurrences(document.SubscriptionAdd);" style="width:100px;" />

								*&nbsp;&nbsp;<span class="DefaultSmallFont">(MM/DD/YYYY)</span>
							</td>
						</tr>
						<tr>
							<td align="right">
								<input type="radio" name="radDurationEnd" value="EndDuration" onclick="javascript:showDuration(document.SubscriptionAdd);"
									checked>Ends After
							</td>
							<td>

								<input name="txtNumRecur" type="text" maxlength="4" id="txtNumRecur" onkeypress="return preventEnterKey(event, document.SubscriptionAdd.txtTrialAmount, document.SubscriptionAdd.txtCustomerID);" onblur="javascript:calculateEndDate(document.SubscriptionAdd);" style="width:100px;" />
								occurrences
							</td>
						</tr>
						<tr>
							<td colspan="2" class="HeaderFont">
								Trial Period
							</td>
						</tr>
						
						<div id="pnlTrialAdd">

	
							<tr>
								<td colspan="2">
									If you would like to include a <a href="javascript:void(0);" onMouseOver="BSPSPopupOnMouseOver(event);" onclick="BSSCPopup('/help/Miscellaneous/Pop-up_Terms/ARB/Trial_Period.htm');return false;">Trial Period</a> for the subscription, enter the amount of each trial payment in <a href="javascript:void(0);" onMouseOver="BSPSPopupOnMouseOver(event);" onclick="BSSCPopup('/help/Miscellaneous/Pop-up_Terms/ARB/Trial_Period_Amount.htm');return false;">Trial Amount</a> and enter the number of payments that should be included in the Trial Period in <a href="javascript:void(0);" onMouseOver="BSPSPopupOnMouseOver(event);" onclick="BSSCPopup('/help/Miscellaneous/Pop-up_Terms/ARB/Trial_Period_Cycles.htm');return false;">Trial Occurrences</a>.
								</td>
							</tr>

							<TR>
								<TD align="right">Trial Amount
								</TD>
								<TD>
									<input name="txtTrialAmount" type="text" maxlength="9" id="txtTrialAmount" /></TD>
							</TR>
							<TR>
								<TD align="right">Trial Occurrences
								</TD>
								<TD>

									<input name="txtNumTrialPeriod" type="text" maxlength="3" id="txtNumTrialPeriod" style="width:30px;" /></TD>
							</TR>
						
</div>
						<tr>
							<td colspan="2" class="HeaderFont">
								Customer Billing Information
							</td>
						</tr>
						<tr>

							<td align="right">
								Customer ID
							</td>
							<td><input name="txtCustomerID" type="text" maxlength="20" id="txtCustomerID" style="width:162px;" />
							</td>
						</tr>
						
						<tr>
							<td align="right">
								First Name
							</td>

							<td><input name="txtFirstName" type="text" maxlength="50" id="txtFirstName" style="width:162px;" />
								*
							</td>
						</tr>
						<tr>
							<td align="right">
								Last Name
							</td>
							<td><input name="txtLastName" type="text" maxlength="50" id="txtLastName" style="width:162px;" />
								*
							</td>

						</tr>
						<tr>
							<td align="right">
								Company
							</td>
							<td><input name="txtCompany" type="text" maxlength="50" id="txtCompany" style="width:162px;" />
							</td>
						</tr>
						<tr>

							<td align="right">
								Address
							</td>
							<td><input name="txtAddress" type="text" maxlength="60" id="txtAddress" style="width:162px;" />
							</td>
						</tr>
						<tr>
							<td align="right">
								City
							</td>

							<td><input name="txtCity" type="text" maxlength="40" id="txtCity" style="width:162px;" />
							</td>
						</tr>
						<tr>
							<td align="right">
								State/Province
							</td>
							<td><input name="txtState" type="text" maxlength="40" id="txtState" style="width:162px;" />
							</td>

						</tr>
						<tr>
							<td align="right">
								Zip Code
							</td>
							<td><input name="txtZip" type="text" maxlength="20" id="txtZip" style="width:162px;" />
							</td>
						</tr>
						<tr>

							<td align="right">
								Country
							</td>
							<td><input name="txtCountry" type="text" maxlength="60" id="txtCountry" style="width:162px;" />
							</td>
						</tr>
						<tr>
							<td align="right">
								Phone
							</td>

							<td><input name="txtPhone" type="text" maxlength="25" id="txtPhone" style="width:162px;" />
							</td>
						</tr>
						<tr>
							<td align="right">
								Fax
							</td>
							<td><input name="txtFax" type="text" maxlength="25" id="txtFax" style="width:162px;" />
							</td>

						</tr>
						<tr>
							<td align="right">
								Email
							</td>
							<td><input name="txtEmail" type="text" maxlength="255" id="txtEmail" style="width:162px;" />
							</td>
						</tr>
						
						<tr>

							<td colspan="2" class="HeaderFont">
								Shipping Information
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="checkbox" value="1" name="chkSameAsBill" onClick="javascript:CopyFromBilling(document.SubscriptionAdd);">Same 
								as information entered in Billing Information, or :
							</td>
						</tr>
						<tr>

							<td align="right">
								First Name
							</td>
							<td><input name="txtShippingFirstName" type="text" maxlength="50" id="txtShippingFirstName" style="width:162px;" />
							</td>
						</tr>
						<tr>
							<td align="right">
								Last Name
							</td>

							<td><input name="txtShippingLastName" type="text" maxlength="50" id="txtShippingLastName" style="width:162px;" />
							</td>
						</tr>
						<tr>
							<td align="right">
								Company
							</td>
							<td><input name="txtShippingCompany" type="text" maxlength="50" id="txtShippingCompany" style="width:162px;" />
							</td>

						</tr>
						<tr>
							<td align="right">
								Address
							</td>
							<td><input name="txtShippingAddress" type="text" maxlength="60" id="txtShippingAddress" style="width:162px;" />
							</td>
						</tr>
						<tr>

							<td align="right">
								City
							</td>
							<td><input name="txtShippingCity" type="text" maxlength="40" id="txtShippingCity" style="width:162px;" />
							</td>
						</tr>
						<tr>
							<td align="right">
								State/Province
							</td>

							<td><input name="txtShippingState" type="text" maxlength="40" id="txtShippingState" style="width:162px;" />
							</td>
						</tr>
						<tr>
							<td align="right">
								Zip Code
							</td>
							<td><input name="txtShippingZip" type="text" maxlength="20" id="txtShippingZip" style="width:162px;" />
							</td>

						</tr>
						<tr>
							<td align="right">
								Country
							</td>
							<td><input name="txtShippingCountry" type="text" maxlength="60" id="txtShippingCountry" style="width:162px;" />
							</td>
						</tr>
						<tr>

							<td></td>
							<td>
								<input type="submit" name="btnSubmit" value="Submit" id="btnSubmit" class="Button" />
								<input id=btnReset type="button" class="Button" name="btnReset" value="Reset" onclick="javascript:location.reload(true);">
								<!--<input id=btnReset type="reset" name="btnReset" value="Reset">-->
							</td>
						</tr>
		</table>
	

<script type="text/javascript">
//<![CDATA[
var Page_ValidationSummaries =  new Array(document.getElementById("ValidationSummary1"));
//]]>
</script>

<script type="text/javascript">
//<![CDATA[
var ValidationSummary1 = document.all ? document.all["ValidationSummary1"] : document.getElementById("ValidationSummary1");
ValidationSummary1.headertext = "Please correct the following error(s):";
//]]>
</script>
</form>
	<script type="text/javascript" language="javascript">
		<!--
			showDuration(document.SubscriptionAdd);
			showPayment();
		//-->
	</script>
	
    
					
						</td>
					</tr>
					<tr>
						<td height="80%" valign="bottom">

						
							
	<div class="Copyright" align="right">
		<a class="Copyright" target="_blank" href="http://www.authorize.net/company/terms/">Terms of Use</a>&nbsp;|&nbsp;
		<a class="Copyright" target="_blank" href="http://www.authorize.net/company/privacy/">Privacy Policy</a><br>
		© 2005, 2012. Authorize.Net is a registered trademark of CyberSource Corporation.<br> 
		All other marks are the property of their respective owners. All rights reserved. 
	</div>

						</td>

					</tr>
				</table>
			</td>
		</tr>
	</table>
	<script type="text/javascript" language="javascript">
	<!--
		// This will undo filling in the 1px gap between top navigation and main content area.
		// Gap is present only when the left navigation is visible (due to the use of rowspan)
		//		so we need to undo this when LeftNav != visible.
		
		if (document.getElementById('LeftNav') == null)	// If Left Navigation is shown
			if (document.getElementById('MainWin') != null)
				document.getElementById('MainWin').style.margin = '0px';
	//-->
</script>
</div>
</body>
