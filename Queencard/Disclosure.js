

		function Disclosure2() {
					
					var StrtDate = document.getElementById("strDate").value;
					var DueDate1 = document.getElementById("strDate1").value;
					var DueDate2 = document.getElementById("strDate2").value;
					
					var AmortValue = document.getElementById("Amortz").value;
					var ProdCode = document.getElementById("ProductCode").value;
					var IntR = document.getElementById("IntRate").value;
					var LoanAmt = document.getElementById("LoanAmnt").value;
					var Trms = document.getElementById("LTerms").value;
					var TDeduct = document.getElementById("TotalD").value;
					var NetProc = document.getElementById("NetP").value;
					var CompName = document.getElementById("ComName").value;
					var PrdName = document.getElementById("ProdName").value;
					var LoanNo = document.getElementById("LoanNumber").value;
					var payFreq = document.getElementById("payFrequency").value;
					var BorrowerName = document.getElementById("BName").value;
					var BorrowerName2 = document.getElementById("BrName").value;
					var ComakerName1 = document.getElementById("comName1").value;
					var ComakerName2 = document.getElementById("comName2").value;
					var BSpouse = document.getElementById("BSpouse").value;
					var BAdd = document.getElementById("BAdd").value;
					var CAdd1 = document.getElementById("BAdd1").value;
					
					var ValVar = "";

					var DeductM = document.getElementById("DeductM").value;
					var SCharge = document.getElementById("ServCharge").value;
					var ProcFee = document.getElementById("ProcFee").value;
					var MRIVal = document.getElementById("MRI").value;
					var DocStamp = document.getElementById("DocStamp").value;
					var NotFee = document.getElementById("NotFee").value;
					var APL = document.getElementById("APLFee").value;
					var EIRS = document.getElementById("EIRSample").value;
					var MonthlyInstall = document.getElementById("MonthlyInstall").value;
					var FORMATNAME = document.getElementById("FORMATNAME").value;
					
					var LoanAmtNet = parseFloat(LoanAmt);
					
					
					var DimAmount = LoanAmt;
					var DimintRate = IntR;
    				var DimVarE = IntR;
    				var DimTerms = Trms;
    				var DimVarB = Trms;
    				DimintRate = DimintRate / 12;
    				var DimVar0 = DimintRate + 1;
    				var DimVar1 = DimVar0;
    				var DimVar2 = 0;
    				DimVar1 = DimVar1 / DimVar0;
					do {
        				DimVar1 = DimVar1 / DimVar0;
        				DimVar2 = DimVar2 + DimVar1;
        				DimTerms = DimTerms - 1;
      				} while (DimTerms != 0);
    				var DimFactor = DimVar2;
    				DimAmort = DimAmount / DimFactor;
    				var DimAmort2 = DimAmort * DimVarB;
    				DimAmort2 = DimAmort2 - DimAmount;
    				DimAmort = DimAmort / 2;
					DimAmort =  DimAmort.toFixed(2);
					
					
					var month = new Array();
    				month[0] = "January";
    				month[1] = "February";
    				month[2] = "March";
    				month[3] = "April";
   					month[4] = "May";
    				month[5] = "June";
    				month[6] = "July";
    				month[7] = "August";
    				month[8] = "September";
    				month[9] = "October";
    				month[10] = "November";
    				month[11] = "December";
					
					var mdate = new Date();
    				var myMonth = month[mdate.getMonth()];
					var myDay = mdate.getDate();
					var myYear = mdate.getFullYear();
					
					var myDate1 = myMonth + " " + myDay + ", " + myYear; 
					
					var SCharge1 = "";
					var SCharge2 = "";
					var ProcFee1 = "";
					var ProcFee2 = "";
					var FCharge1 = "";
					var FCharge2 = "";
					var MRI1 = "";
					var MIR2 = "";
					var DocStamp1 = "";
					var DocStamp2 = "";
					var NotFee1 = "";
					var NotFee2 = "";
					var APL1 = "";
					var APL2 = "";
					
					
					
					var FCharge = parseFloat(ProcFee) + parseFloat(SCharge) + parseFloat(MRIVal);
					var FCharges =  FCharge.toFixed(2);
					var NSCharge = 0;
					var NSChargePrint = "";
					<!--var NSCharge =  parseFloat(DocStamp) + parseFloat(NotFee) + parseFloat(APL);
					<!--NSCharge =  NSCharge.toFixed(2);
					
					var TCharge =  0;
					
					
					var NetPro = 0;
					
					if (DocStamp > 0 ) {
					NSCharge =  parseFloat(NSCharge) + parseFloat(DocStamp); }
					
					if (NotFee > 0 ) {
					NSCharge =  parseFloat(NSCharge) + parseFloat(NotFee); }
					
					if (APL > 0 ) {
					NSCharge =  parseFloat(NSCharge) + parseFloat(APL);	}
					
					if (NSCharge > 0) {
					NSCharge = NSCharge.toFixed(2);
					NSChargePrint = NSCharge; }
					else  { NSCharge = 0; NSChargePrint = "";}
					
					if (DeductM == "Not deducted"){
						SCharge1 = SCharge;
						ProcFee1 = MRIVal;
						ProcFee1 = ProcFee;
						FCharge1 = FCharges;
						DocStamp1 = DocStamp;
						NotFee1 = NotFee;
						NetPro = parseFloat(LoanAmt);
						APL1 = APL;
						SCharge1 = parseFloat(SCharge1);
						SCharge1 = SCharge1.format(2);
						ProcFee1 = parseFloat(ProcFee) + parseFloat(MRIVal);
						ProcFee1 = ProcFee1.format(2);
						FCharge1 = parseFloat(FCharge1);
						FCharge1 = FCharge1.format(2);
						DocStamp1 = parseFloat(DocStamp1);
						DocStamp1 = DocStamp1.format(2);
						NotFee1 = parseFloat(NotFee1);
						NotFee1 = NotFee1.format(2);
						APL1 = parseFloat(APL1);
						APL1 = APL1.format(2);
						<!--NSCharge =  parseFloat(DocStamp1) + parseFloat(NotFee1) + parseFloat(APL1);
					
						}
					else if (DeductM == "Deducted"){
						SCharge2 = SCharge; 
						ProcFee2 = MRI;
						ProcFee2 = ProcFee2 + ProcFee;
						FCharge2 = FCharges;
						DocStamp2 = DocStamp;
						NotFee2 = NotFee;
						NetPro = parseFloat(LoanAmt);
						APL2 = APL;
						SCharge2 = parseFloat(SCharge2);
						SCharge2 = SCharge2.format(2);
						ProcFee2 = parseFloat(ProcFee) + parseFloat(MRIVal);
						ProcFee2 = ProcFee2.format(2);
						FCharge2 = parseFloat(FCharge2);
						FCharge2 = FCharge2.format(2);
						DocStamp2 = parseFloat(DocStamp2);
						DocStamp2 = DocStamp2.format(2);
						NotFee2 = parseFloat(NotFee2);
						NotFee2 = NotFee2.format(2);
						APL2 = parseFloat(APL2);
						APL2 = APL2.format(2);
						<!--NSCharge =  parseFloat(DocStamp2) + parseFloat(NotFee2) + parseFloat(APL2);
						}
						
					
					TCharge = parseFloat(TCharge);
					TCharge = TCharge.toFixed(2);
					NSCharge = parseFloat(NSCharge);
					NSCharge = NSCharge.toFixed(2);
					FCharges = parseFloat(FCharges);
					FCharges = FCharges.toFixed(2);
					
					MonthlyInstall = parseFloat(MonthlyInstall);
					MonthlyInstall = MonthlyInstall.format(2);
					
					
					var ComTrms = Trms / 12;
					var ComInt = IntR * 100;
					ComInt = ComInt * ComTrms;
					ComInt = ComInt.toFixed(4);
					
					var freq = "";
					if ((payFreq == "Monthly") || (payFreq == "Semi-Monthly")) { freq = "mos";}
					else if (payFreq == "Weekly") { freq = "weeks";}
		
		
		
					var DigVal = DigitConvert(LoanAmt);
					var IntWord = NumberConvert(IntR * 100);
					var InValue = parseFloat(IntR) * 100;
					IntWord = IntWord + " (" + InValue + ")";
					var termDoc = NumberConvert(Trms * 2);
					termDoc = termDoc + " (" + (Trms * 2) + ")";
					
					
					<!--if (ProdCode =="QSAL"){ AmortText = "SEE AMORTIZATION SCHEDULE";}
					<!--else { AmortText = AmortValueTxt;}
					
					var myTExt = "semi-monthly";
					
					var strDate = new Date(StrtDate);
					var strDay = strDate.getDate();
					var strMonth = (strDate.getMonth() + 1);
					var strYear = strDate.getFullYear();
					var SDate = strMonth + "/" + strDay + "/" + strYear;
					
					
					
					var dt1Val = "";
					var dt1Comp = 0;
					var dt2Comp = 0;
					
					if (DueDate1 < 21){
					dt1Comp = DueDate1;
					if (dt1Comp == 1) { dt1Val = DueDate1 + "st";}
					else if (dt1Comp == 2) { dt1Val = DueDate1 + "nd";}
					else if (dt1Comp == 3) { dt1Val = DueDate1 + "rd";}
					else { dt1Val = DueDate1 + "th";}
					}
					
					else if (DueDate1 > 20){
					dt1Comp = DueDate1 % 10;
					if (dt1Comp == 1) { dt1Val = DueDate1 + "st";}
					else if (dt1Comp == 2) { dt1Val = DueDate1 + "nd";}
					else if (dt1Comp == 3) { dt1Val = DueDate1 + "rd";}
					else { dt1Val = DueDate1 + "th";}
					}
					
					if (DueDate2 < 21){
					dt1Comp = DueDate2;
					if (dt1Comp == 1) { dt2Val = DueDate2 + "st";}
					else if (dt1Comp == 2) { dt2Val = DueDate2 + "nd";}
					else if (dt1Comp == 3) { dt2Val = DueDate2 + "rd";}
					else { dt2Val = DueDate2 + "th";}
					}
					
					else if (DueDate2 > 20){
					dt1Comp = DueDate2 % 10;
					if (dt1Comp == 1) { dt2Val = DueDate2 + "st";}
					else if (dt1Comp == 2) { dt2Val = DueDate2 + "nd";}
					else if (dt1Comp == 3) { dt2Val = DueDate2 + "rd";}
					else { dt2Val = DueDate2 + "th";}
					}
					
					
					var dteCheck = dt1Val + " and " + dt2Val;
					
	
					var newWin = window.open("", "name", "width=700, height=800, menubar=no, titlebar=no");
					newWin.document.open();
					newWin.document.write("<style type='text/css'>");
				
					newWin.document.write("@media print {#Footer { display: none !important; }}");
					newWin.document.write("#Queencard {");
					newWin.document.write("font-family: 'Times New Roman', Times, serif; font-size:12px; font-weight: bold;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("#Corproation {");
					newWin.document.write("font-family: 'Century Gothic'; font-size:14px; font-weight: bold;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("p {");
					newWin.document.write("text-indent: 40px;");
					newWin.document.write("align: right;");
					newWin.document.write("}");
					
					
					newWin.document.write("#Address {");
					newWin.document.write("font-family: 'Times New Roman'; font-size:10px; font-weight: normal;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("#UpperBody {");
					newWin.document.write("font-family: 'Times New Roman', Times, serif; font-size:12px; font-weight: normal;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("#UpperBody2 {");
					newWin.document.write("font-family: 'Times New Roman', Times, serif; font-size:12px; font-weight: normal;");
					newWin.document.write("text-align: justify;");
					newWin.document.write("text-justify: inter-word;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("#bb {");
     				newWin.document.write("border-bottom: 1px solid black !important;");
					newWin.document.write("font-family: 'Times New Roman', Times, serif; font-size:12px; font-weight: normal;");
					newWin.document.write("padding-left: 10px;");
    				newWin.document.write("}");
	
					newWin.document.write("#underL { text-decoration: underline;}");
					
					newWin.document.write("#BorrowerName {");
					newWin.document.write("font-family: 'Times New Roman', Times, serif; font-size:10px; font-weight: normal;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("#tablemain {");
					newWin.document.write("border: 0px solid black; border-collapse: collapse;");
					newWin.document.write("font-family:'Century Gothic'; font-size:8px; font-weight: normal; border-spacing:inherit;")
					newWin.document.write("padding-left: 2px; padding-right: 2px; margin:0px; text-align: right; padding-top: 0px; padding-bottom: 0px")
					newWin.document.write("}");
					
					newWin.document.write("#tableTotal {");
					newWin.document.write("border: 1px; font-family:'Century Gothic'; font-size:10px; font-weight: bold; border-spacing:inherit;")
					newWin.document.write("padding-left: 2px; padding-right: 2px; margin: 2px; text-align: right; padding-top: 0px; padding-bottom: 0px")
					newWin.document.write("}");
					
					newWin.document.write("</style>");
					
					newWin.document.write("<table id='Queencard'>");
					newWin.document.write("<tr id='Queencard'><td id='Queencard' width='600' align='center'>DISCLOSURE STATEMENT ON LOAN/CREDIT TRANSACTIONS</td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table id='Queencard'>");
					newWin.document.write("<tr id='Queencard'><td id='Queencard' width='600' align='center'>(As required under R.A. 3765, Truth in Lending Act)</td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td height='10'></td>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left'>NAME OF BORROWER: </td>");
					newWin.document.write("<td id='bb' align='left'>" + FORMATNAME.bold() + "</td></tr>");
					newWin.document.write("<tr><td id='UpperBody' align='right'>HOME ADDRESS: </td>");
					newWin.document.write("<td id='bb' align='left'>" + BAdd.bold() + "</td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='50' height='30'></td>");
					newWin.document.write("</table>");
					
					LoanAmt = parseFloat(LoanAmt);
					LoanAmt = LoanAmt.format(2);
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='50'></td>");
					newWin.document.write("<td id='UpperBody' align='left'><strong>1. </strong>LOAN GRANDTED (Amount Financed)</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='200'></td>");
					newWin.document.write("<td id='UpperBody' align='left'>(A) <label id='underL'>P " + LoanAmt.bold() + "</label></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='50'></td>");
					newWin.document.write("<td id='UpperBody' align='left'><strong>2. </strong>FINANCED CHARGES</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='200'></td>");
					newWin.document.write("<td id='UpperBody' align='left'></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='50'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='200'></td>");
					newWin.document.write("<td id='UpperBody' align='left' width='100'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='100'>NOT DEDUCTED</td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'>DEDUCTED</td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='50'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='200'></td>");
					//newWin.document.write("<td id='UpperBody' align='left' width='100'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='400'>(All other incidental to loan include)</td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='70'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='200'>a. Interest <label id='underL'><strong>" + ComInt + " %</strong></label> for <label id='underL'>" + Trms.bold() + " " + freq.bold() + "</label> from</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='70'></td>");
					newWin.document.write("<td id='UpperBody' align='center'width='200'> ________ to _______</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='80'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td></tr>");
					newWin.document.write("</table>");
					
					
				
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='70'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='200'>b. Service Charge</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='80'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'>" + SCharge1 + "</td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'>" + SCharge2 + "</td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='70'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='200'>c. Commitment Fee</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='80'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td></tr>");
					newWin.document.write("</table>");
					
				
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='70'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='200'>d. Processing Fee</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='80'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'>" + ProcFee1 + "</td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'>" + ProcFee2 + "</td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td></tr>");
					newWin.document.write("</table>");
					
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='70'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='200'><strong>TOTAL FINANCED CHARGES</strong></td>");
					newWin.document.write("<td id='UpperBody' align='left' width='80'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'>" + FCharge1 + "</td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'>" + FCharge2 + "</td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'>" + addCommas(FCharges) + "</td></tr>");
					newWin.document.write("</table>");

					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='50'></td>");
					newWin.document.write("<td id='UpperBody' align='left'><strong>3. </strong>NON-FINANCED CHARGES</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='200'></td>");
					newWin.document.write("<td id='UpperBody' align='left'></td></tr>");
					newWin.document.write("</table>");
					
					
					if (DocStamp > 0 ) {
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='70'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='200'>Documentary Stamp</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='80'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'>" + DocStamp1 + "</td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'>" + DocStamp2 + "</td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td></tr>");
					newWin.document.write("</table>");
					}
					
					if (NotFee > 0 ) {
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='70'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='200'>Notarial Fee</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='80'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'>" + NotFee1 + "</td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'>" + NotFee2 + "</td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td></tr>");
					newWin.document.write("</table>");
					}
					
					
					if (APL > 0 ) {
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='70'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='200'>Allow. for Probable Losses</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='80'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'>" + APL1 + "</td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'>" + APL2 + "</td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td></tr>");
					newWin.document.write("</table>");
					}
					
					newWin.document.write("<table >");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='70'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='303'><strong>TOTAL NON-FINANCED CHARGES</strong></td>");
					//newWin.document.write("<td id='UpperBody' align='left' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'> " + addCommas(NSChargePrint) + "</td></tr>");
					newWin.document.write("</table>");
					
					
					TCharge =  parseFloat(FCharge) + parseFloat(NSCharge);
					TCharge =  TCharge.toFixed(2);
			
			
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='50'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='303'><strong>4. </strong>TOTAL DEDUCTION FROM LOANS (B+C)</td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='40'></td>");
					var TCPrint = TCharge.toLocaleString('en');
					newWin.document.write("<td id='bb' align='center' width='80'>" + addCommas(TCharge) + "</td></tr>");
					newWin.document.write("</table>");


					if (DeductM == "Deducted"){
					NetPro = parseFloat(LoanAmtNet) - parseFloat(TCharge);	
					}
					NetPro = NetPro.toFixed(2);
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='50'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='303'><strong>5. </strong>NET PROCEEDS (A less B)</td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='40'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'>" + addCommas(NetPro) + "</td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='50'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='303'><strong>6. </strong>PERCENTAGE OF FINANCE CHARGES TOTAL</td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='40'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='60'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='303'>AMOUNT FINANCED (Computed in Accordance</td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='40'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='60'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='303'>with Section 2(1) of CB Circular (A Less B))</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='50'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='303'><strong>7. </strong>EFFECTIVE INTEREST RATE</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='30'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'>" + EIRS + " %</td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='50'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='303'><strong>8. </strong>MODE OF PAYMENT</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='30'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td></tr>");
					newWin.document.write("</table>");
					
					
					if (ProdCode=="QPBD") {
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='60'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='303'>a. Single payment on</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'>" + LoanAmt + "</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='200'>(Principal Only)</td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='60'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='303'>b. Installment amount payable in <span id='bb' width='20'>" + Trms.bold() + " " + freq.bold() + "</span>.</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'>" + MonthlyInstall + "</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='200'>(Interest & GRT)</td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td></tr>");
					newWin.document.write("</table>");
					} else
					{
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='60'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='303'>a. Single payment on</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='left' width='20'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='60'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='303'>b. Installment amount payable in <span id='bb' width='20'>" + Trms.bold() + " " + freq.bold() + "</span>.</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='bb' align='center' width='80'>" + MonthlyInstall + "</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='20'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td></tr>");
					newWin.document.write("</table>");
					}
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='50'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='303'><strong>9. </strong>COLLATERAL</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='30'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='50'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='303'><strong>10. </strong>ADDITIONAL CHARGES IN CASE STIPULATION</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='30'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='60'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='303'>ARE NOT MET BY THE BORROWER</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='70'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='30'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='60'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='303'><span id='bb' width='15'><strong>36 % </strong></span> per annum penalty charge on all past due accounts</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='70'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='30'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='60'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='303'><span id='bb' width='15'><strong>2 % </strong></span> pre payment penalty if preterminated prior maturity</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='70'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='30'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='20'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='80'></td></tr>");
					newWin.document.write("</table>");
					
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='60'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='303'></td>");
					newWin.document.write("<td id='UpperBody' align='left' width='70'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='30'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='250'>CERTIFIED CORRECT <img src='images/GretchSig2.jpg' style='width:140px; height: 75px;' /></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr></td>");
					newWin.document.write("<td height='30'></td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>")
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='60'></td>");
					newWin.document.write("<td id='UpperBody2' width='600'><p>I acknowledge RECEIPT of a copy of this statement prior to the consummation of this LOAN/ CREDIT TRANSACTION and that I understand and fully agree to the terms and conditions thereof.</p></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr></td>");
					newWin.document.write("<td height='30'></td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>")
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='60'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='303'></td>");
					newWin.document.write("<td id='UpperBody' align='left' width='70'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='30'></td>");
					newWin.document.write("<td id='bb' align='center'>" + FORMATNAME.bold() + "</td></tr>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='60'></td>");
					newWin.document.write("<td id='UpperBody' align='left'width='303'></td>");
					newWin.document.write("<td id='UpperBody' align='left' width='70'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='30'></td>");
					newWin.document.write("<td id='UpperBody' align='center'>SIGNATURE OF APPLICANT</td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr></td>");
					newWin.document.write("<td height='10'></td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>")
					
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='60'></td>");
					newWin.document.write("<td id='UpperBody2' width='300'>Date: " + myDate1 + "</td></tr>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='60'></td>");
					newWin.document.write("<td id='UpperBody2' width='300'>Note: A COPY MUST BE FURNISHED TO BORROWER</td></tr>");
					newWin.document.write("</table>");
					

					newWin.document.close();
		}




function addCommas(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}