

		function Amortization_Dim() {
					
					var StrtDate = document.getElementById("strDate").value;
					var DueDate1 = document.getElementById("strDate1").value;
					var DueDate2 = document.getElementById("strDate2").value;
					
					var IntR = document.getElementById("IntRate").value;
					var LoanAmt = document.getElementById("LoanAmnt").value;
					var Trms = document.getElementById("LTerms").value;
					var TDeduct = document.getElementById("TotalD").value;
					var NetProc = document.getElementById("NetP").value;
					var CompName = document.getElementById("ComName").value;
					var PrdName = document.getElementById("ProdName").value;	
					var LoanNo = document.getElementById("LoanNumber").value;
					var BorrowerName = document.getElementById("BName").value;
					var ComakerName1 = document.getElementById("comName1").value;
					var ComakerName2 = document.getElementById("comName2").value;
					var DATERELEASED = document.getElementById("DATERELEASED").value;
					var payFrequency = document.getElementById("payFrequency").value;
					var ViewAmort = document.getElementById("AmortView").value;
					
					var PNNumber = "______________";
					

					var Intrst = parseFloat(LoanAmt) * parseFloat(IntR);
					var VarTrm = Trms * 30;
					VarTrm = VarTrm / 360;
					
					var VarIntVal = Intrst * VarTrm;
					VarIntVal = VarIntVal / Trms;
	
					<!---Semi MOnthly --->
					VarIntVal = VarIntVal / 2;
					
					
	
					var VarPrin = parseFloat(LoanAmt) / parseFloat(Trms);
					<!---Semi MOnthly --->
					VarPrin = VarPrin / 2;
					var VarGRT = VarIntVal * 0.05;
					VarPrin = VarPrin.toFixed(2);
					VarIntVal = VarIntVal.toFixed(2);
					VarGRT = VarGRT.toFixed(2);
					
					
					
					var VarPrinAll = parseFloat(VarPrin) * ((Trms * 2) - 1);
					var LastVarPrin = parseFloat(LoanAmt) - parseFloat(VarPrinAll);
					LastVarPrin = LastVarPrin.toFixed(2);
					
				
					
					var nTerm = Trms * 2;
					var AmortVal = 0.00;
					var OutBal = parseFloat(LoanAmt);
					var TotalInterest = 0;
					var TotalGRT = 0;
					var TotalAmort = 0;
					
					
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
					
					DueDate1 = DueDate1 * 1;
					DueDate2 = DueDate2 * 1;
					
					var txt;
					
					if (ViewAmort == "0") {
    				var r1 = confirm("View Amortization Dates?");
					}
					else
					{ r1 = true; }

					var newWin = window.open("", "name", "width=800, height=700, menubar=no, titlebar=no");
					newWin.document.open();
					newWin.document.write("<style type='text/css'>");
				
					newWin.document.write("@media print {#Footer { display: none !important; }}");
					newWin.document.write("#Queencard {");
					newWin.document.write("font-family: 'Times New Roman', Times, serif; font-size:16px; font-weight: bold;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("#Corproation {");
					newWin.document.write("font-family: 'Century Gothic'; font-size:14px; font-weight: bold;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("p {");
					newWin.document.write("text-indent: 50px;");
					newWin.document.write("align: right;");
					newWin.document.write("}");
					
					newWin.document.write("#underWord {");
					newWin.document.write("text-decoration: underline;");
					newWin.document.write("}");
					
					newWin.document.write("#Address {");
					newWin.document.write("font-family: 'Century Gothic'; font-size:10px; font-weight: normal;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("#UpperBody {");
					newWin.document.write("font-family: 'Times New Roman', Times, serif; font-size:12px; font-weight: normal;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("#BorrowerName {");
					newWin.document.write("font-family: 'Times New Roman', Times, serif; font-size:10px; font-weight: normal;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("#tablemain {");
					newWin.document.write("border: 0px solid black; border-collapse: collapse;");
					newWin.document.write("font-family:'Century Gothic'; font-size:8px; font-weight: normal; border-spacing:inherit;")
					newWin.document.write("padding-left: 2px; padding-right: 2px; margin:0px; text-align: right; padding-top: 0px; padding-bottom: 0px;")
					newWin.document.write("}");
					
					newWin.document.write("#tableTotal {");
					newWin.document.write("border: 1px; font-family:'Century Gothic'; font-size:10px; font-weight: bold; border-spacing:inherit;")
					newWin.document.write("padding-left: 2px; padding-right: 2px; margin: 2px; text-align: right; padding-top: 0px; padding-bottom: 0px")
					newWin.document.write("}");
					
					newWin.document.write("</style>");
					
					
					newWin.document.write("<table id='Queencard'>");
					newWin.document.write("<tr id='Queencard'><td id='Queencard' width='600' align='center'>QUEENCARD CORPORATION</td></tr>");
					newWin.document.write("<tr id='Queencard'><td id='Address' width='600' align='center'>Sky Cit Tower, Mapa Street, Iloilo City</td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("<tr id='Queencard'><td id='Corproation' width='600' align='center'>AMORTIZATION</td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr id='Queencard'><td id='Address' width='600' align='center'></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600'><p> This is to authorize ");
					newWin.document.write("<label id='underWord'>" + CompName.bold() + "</label>");
					newWin.document.write(" to deduct from my <label id='underWord'><strong>PAYROLL ACCOUNT</strong></label> the amount hereunder stipulated and to remit the same to <strong>QUEENCARD CORPORATION</strong> as payment of my ");
					newWin.document.write("<label id='underWord'>" + PrdName.bold() + "</label> No: ");
					newWin.document.write("<label id='underWord'>" + LoanNo.bold() + "</label> /PN No.: ");
					newWin.document.write("<label id='underWord'>" + PNNumber + "</label> every <label id='underWord'>" + dt1Val.bold() + " and " + dt2Val.bold() + "</label> of the month or until fully paid as follows.</p></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table id='tableTotal'>");
					newWin.document.write("<tr id='tableTotal'><td id='tableTotal' width='100'>Due Date</td>");
					newWin.document.write("<th id='tableTotal' width='60'>Principal</th>");
					newWin.document.write("<th id='tableTotal' width='60'>Interest</th>");
					newWin.document.write("<th id='tableTotal' width='60'>GRT</th>");
					newWin.document.write("<th id='tableTotal' width='60'>Charges</th>");
					newWin.document.write("<th id='tableTotal' width='80'>Amortization</th>");
					newWin.document.write("<th id='tableTotal' width='100'>Out. Balance</th></tr>");
					
					newWin.document.write("<tr height='5'></tr>");
					
					if (Trms < 30) {
					newWin.document.write("</table>");
					newWin.document.write("<tr><td><hr width=600px size='1' color='#666666' align='left'/></td></tr>");
					newWin.document.write("<table cellpadding='0'>");
					}
					
					newWin.document.write("<tr id='tablemain'><td id='tableTotal' width='100'></td>");
					newWin.document.write("<th id='tablemain' width='60'></th>");
					newWin.document.write("<th id='tablemain' width='60'></th>");
					newWin.document.write("<th id='tablemain' width='60'></th>");
					newWin.document.write("<th id='tablemain' width='60'>" + TDeduct + "</th>");
					newWin.document.write("<th id='tablemain' width='80'>" + NetProc + "</th>");
					newWin.document.write("<th id='tablemain' width='100'>" + LoanAmt + "</th></tr>");
					
					
					
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
					

					var DimPrin = 0;
					
					var runBal = LoanAmt;
	
	
					var strDate = new Date(StrtDate);
					var strDay = strDate.getDate();
					var strMonth = (strDate.getMonth() + 1);
					var strYear = strDate.getFullYear();
					var tmpDate = DueDate2;
					strDay = strDay * 1;
					strMonth = strMonth * 1;
					
					
					var newStrDate = strMonth + "/" + strDay + "/" + strYear;
					if ((strDay > DueDate1) && (strDay < DueDate2)) {strDay = DueDate2;}
					
					var endDate = new Date(strDate.getFullYear(), strDate.getMonth() + 1, 0);
					var endDay = endDate.getDate();
					
					
					
					for (var i=0; i < nTerm; i++) {
					
						var DimMod = i % 2;
						if (DimMod == 0){DimAmount = DimAmount - (DimPrin * 2);}
			
						var DimInt = DimAmount * DimVarE;
						DimInt = DimInt / 12;
						DimInt = DimInt / 2;
						var DimGRT = DimInt * 0.05;
						var FinalAmort = DimAmort + DimGRT;
						DimPrin = DimAmort - DimInt;
						runBal = runBal - DimPrin;
						runBal = Math.abs(runBal);
						var DimMon = DimPrin + DimInt + DimGRT;
						
						
						if (r1 == true) {newWin.document.write("<tr id='tablemain'><th id='tablemain' width='100'>" + newStrDate + "</th>"); } 
						else { newWin.document.write("<tr id='tablemain'><th id='tablemain' width='100'></th>"); }
						newWin.document.write("<th id='tablemain' width='60'>" + DimPrin.toFixed(2) + "</th>");
						newWin.document.write("<th id='tablemain' width='60'>" + DimInt.toFixed(2) + "</th>");
						newWin.document.write("<th id='tablemain' width='60'>" + DimGRT.toFixed(2) + "</th>");
						newWin.document.write("<th id='tablemain' width='60'></th>");
						newWin.document.write("<th id='tablemain' width='80'>" + DimMon.toFixed(2) + "</th>");
						newWin.document.write("<th id='tablemain' width='100'>" + runBal.toFixed(2) + "</th>");
						newWin.document.write("<th id='tablemain' width='30'>" + (i + 1) + "</th></tr>");
					
						TotalInterest = parseFloat(TotalInterest) + parseFloat(DimInt);
						TotalGRT = parseFloat(TotalGRT) + parseFloat(DimGRT);
						TotalAmort = parseFloat(TotalAmort) + parseFloat(DimMon);
					
						
						endDate = new Date(strDate.getFullYear(), strDate.getMonth() + 1, 0);
						endDay = endDate.getDate();
						
						
						if (strDay == DueDate1)
						{
							strDay = DueDate2;
						}
						else if (strDay == DueDate2) 
						{
							strDay = DueDate1;
							strMonth = (strDate.getMonth() + 2);
							strYear = strDate.getFullYear();
							if (strMonth == 13) { strMonth = 1; strYear = strYear + 1; }
							StrtDate = strMonth + "/" + strDay + "/" + strYear;
							strDate = new Date(StrtDate);
						}
					
					
						if (strDay == DueDate2){
							if (DueDate2 > endDay){
							strMonth = (strDate.getMonth() + 1);
							strYear = strDate.getFullYear();
							newStrDate = strMonth + "/" + endDay + "/" + strYear;
							}
							else {
							strMonth = (strDate.getMonth() + 1);
							strYear = strDate.getFullYear();
							newStrDate = strMonth + "/" + strDay + "/" + strYear;
							}
						}
						else {
							strMonth = (strDate.getMonth() + 1);
							strYear = strDate.getFullYear();
							newStrDate = strMonth + "/" + strDay + "/" + strYear;
						}
					

					}
					
					
					if (Trms < 30) {
					newWin.document.write("</table>");
					newWin.document.write("<tr><hr width=600px size='1' color='#666666' align='left'/></tr>");
					newWin.document.write("<table>");
					}
					
					newWin.document.write("<tr><th width='100'></th>");
					newWin.document.write("<th width='60' id='tableTotal'>" + LoanAmt + "</th>");
					newWin.document.write("<th width='60' id='tableTotal'>" + TotalInterest.toFixed(2) + "</th>");
					newWin.document.write("<th width='60' id='tableTotal'>" + TotalGRT.toFixed(2) + "</th>");
					newWin.document.write("<th width='60' id='tableTotal'>" + TDeduct + "</th>");
					newWin.document.write("<th width='80' id='tableTotal'>" + TotalAmort.toFixed(2) + "</th>");
					newWin.document.write("<th width='100'></th></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr>");
					newWin.document.write("<th width='450' id='tableTotal'></th>");
					newWin.document.write("<th width='200' id='UpperBody' align='center'><label id='underWord'><strong>" + BorrowerName + "</strong></label></th>");
					newWin.document.write("<th width='30' id='tableTotal'></th>");
					newWin.document.write("</tr>");
					newWin.document.write("<tr>");
					newWin.document.write("<th width='450' id='tableTotal'></th>");
					newWin.document.write("<th width='200' id='BorrowerName' align='center'>Name and Signature of Borrower</th>");
					newWin.document.write("<th width='30' id='tableTotal'></th>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");

					
					BorrowerName = BorrowerName.bold();
					newWin.document.write("<table>");
					newWin.document.write("<tr height='10' id='UpperBody'><td id='UpperBody' width='600' align='left'></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='left'><p> This is to authorize <label id='underWord'>" + CompName.bold() + "</label> to deduct from my/our <label id='underWord'><strong>PAYROLL ACCOUNT</strong></label> the amount herein stipulated of whatever due and to remit the same to <strong>QUEENCARD CORPORATION</strong> in case <label id='underWord'>" + BorrowerName + "</label> fails or refuses to pay the said loan amount.</p></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='300' align='center'></td>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='300' align='center'><label id='underWord'>" + ComakerName1.bold() + "</label></td>");
					newWin.document.write("<td id='UpperBody' width='300' align='center'><label id='underWord'>" + ComakerName2.bold() + "</label></td></tr>");
					newWin.document.write("<tr id='BorrowerName'><td id='BorrowerName' width='300' align='center'>Co-Maker</td>");
					newWin.document.write("<td id='BorrowerName' width='300' align='center'>Co-Maker</td></tr>");
					newWin.document.write("</table>");
					
					
					
					
					var relDate = new Date(DATERELEASED);
					var newRelDate = (relDate.getMonth() + 1) + "/" + relDate.getDate() + "/" + relDate.getFullYear();
					newRelDate  = "";
					
					newWin.document.write("<table>");
					newWin.document.write("<tr id='UpperBody'><th><img src='images/preparedby.jpg' width='360' height='80' /></th>");
					newWin.document.write("<td><table width='250'>");
					newWin.document.write("<tr><td width='150' id='BorrowerName' align='right'>Account Number:</td>");
					newWin.document.write("<td width='100' id='BorrowerName' align='left'>" + LoanNo.bold() + "</td></tr>");					
					newWin.document.write("<tr><td id='BorrowerName' align='right'>PN Number:</td>");
					newWin.document.write("<td></td></tr>");							
					newWin.document.write("<tr><td id='BorrowerName' align='right'>Date Released:</td>");
					newWin.document.write("<td id='BorrowerName' align='left'>" + newRelDate.bold() + "</td></tr>");						
					newWin.document.write("<tr><td id='BorrowerName' align='right'>Check Number:</td>");
					newWin.document.write("<td></td></tr>");						
					newWin.document.write("<tr><td id='BorrowerName' align='right'>Savings Acc. No.:</td>");
					newWin.document.write("<td></td></tr>");
					newWin.document.write("<table></td></tr>");
					newWin.document.write("</table>");
					

					
					
					
					newWin.document.close();
				}




































function Amortization_DimMonthly() {
					
					var StrtDate = document.getElementById("strDate").value;
					var DueDate1 = document.getElementById("strDate1").value;
					var DueDate2 = document.getElementById("strDate2").value;
					
					var IntR = document.getElementById("IntRate").value;
					var LoanAmt = document.getElementById("LoanAmnt").value;
					var Trms = document.getElementById("LTerms").value;
					var TDeduct = document.getElementById("TotalD").value;
					var NetProc = document.getElementById("NetP").value;
					var CompName = document.getElementById("ComName").value;
					var PrdName = document.getElementById("ProdName").value;	
					var LoanNo = document.getElementById("LoanNumber").value;
					var BorrowerName = document.getElementById("BName").value;
					var ComakerName1 = document.getElementById("comName1").value;
					var ComakerName2 = document.getElementById("comName2").value;
					var DATERELEASED = document.getElementById("DATERELEASED").value;
					var payFrequency = document.getElementById("payFrequency").value;
					var ViewAmort = document.getElementById("AmortView").value;

					var PNNumber = "______________";
					

					var Intrst = parseFloat(LoanAmt) * parseFloat(IntR);
					var VarTrm = Trms * 30;
					VarTrm = VarTrm / 360;
					
					var VarIntVal = Intrst * VarTrm;
					VarIntVal = VarIntVal / Trms;
	
					<!---Semi MOnthly --->
					VarIntVal = VarIntVal / 2;
					
					
					var TDeduct0 = TDeduct * 1;
					
					var VarPrin = parseFloat(LoanAmt) / parseFloat(Trms);
					<!---Semi MOnthly --->
					VarPrin = VarPrin / 2;
					var VarGRT = VarIntVal * 0.05;
					VarPrin = VarPrin.toFixed(2);
					VarIntVal = VarIntVal.toFixed(2);
					VarGRT = VarGRT.toFixed(2);
					
					
					
					var VarPrinAll = parseFloat(VarPrin) * ((Trms * 2) - 1);
					var LastVarPrin = parseFloat(LoanAmt) - parseFloat(VarPrinAll);
					LastVarPrin = LastVarPrin.toFixed(2);
					
				
					
					var nTerm = Trms;
					var AmortVal = 0.00;
					var OutBal = parseFloat(LoanAmt);
					var TotalInterest = 0;
					var TotalGRT = 0;
					var TotalAmort = 0;
					
					
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
					
					
					
					var txt;
					
					if (ViewAmort == "0") {
    				var r = confirm("View Amortization Dates?");
					}
					else
					{ r = true; }
					
    			
					var newWin = window.open("", "name", "width=800, height=700, menubar=no, titlebar=no");
					newWin.document.open();
					newWin.document.write("<style type='text/css'>");
				
					newWin.document.write("@media print {#Footer { display: none !important; }}");
					newWin.document.write("#Queencard {");
					newWin.document.write("font-family: 'Times New Roman', Times, serif; font-size:16px; font-weight: bold;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("#Corproation {");
					newWin.document.write("font-family: 'Century Gothic'; font-size:14px; font-weight: bold;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("p {");
					newWin.document.write("text-indent: 50px;");
					newWin.document.write("align: right;");
					newWin.document.write("}");
					
					newWin.document.write("#underWord {");
					newWin.document.write("text-decoration: underline;");
					newWin.document.write("}");
					
					newWin.document.write("#Address {");
					newWin.document.write("font-family: 'Century Gothic'; font-size:10px; font-weight: normal;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("#UpperBody {");
					newWin.document.write("font-family: 'Times New Roman', Times, serif; font-size:12px; font-weight: normal;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
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
					newWin.document.write("<tr id='Queencard'><td id='Queencard' width='600' align='center'>QUEENCARD CORPORATION</td></tr>");
					newWin.document.write("<tr id='Queencard'><td id='Address' width='600' align='center'>Sky Cit Tower, Mapa Street, Iloilo City</td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("<tr id='Queencard'><td id='Corproation' width='600' align='center'>AMORTIZATION</td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr id='Queencard'><td id='Address' width='600' align='center'></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600'><p> This is to authorize ");
					newWin.document.write("<label id='underWord'>" + CompName.bold() + "</label>");
					newWin.document.write(" to deduct from my <label id='underWord'><strong>PAYROLL ACCOUNT</strong></label> the amount hereunder stipulated and to remit the same to <strong>QUEENCARD CORPORATION</strong> as payment of my ");
					newWin.document.write("<label id='underWord'>" + PrdName.bold() + "</label> No: ");
					newWin.document.write("<label id='underWord'>" + LoanNo.bold() + "</label> /PN No.: ");
					newWin.document.write("<label id='underWord'>" + PNNumber + "</label> every <label id='underWord'>" + dt1Val.bold() + " and " + dt2Val.bold() + "</label> of the month or until fully paid as follows.</p></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table id='tableTotal'>");
					newWin.document.write("<tr id='tableTotal'><td id='tableTotal' width='100'>Due Date</td>");
					newWin.document.write("<th id='tableTotal' width='60'>Principal</th>");
					newWin.document.write("<th id='tableTotal' width='60'>Interest</th>");
					newWin.document.write("<th id='tableTotal' width='60'>GRT</th>");
					newWin.document.write("<th id='tableTotal' width='60'>Charges</th>");
					newWin.document.write("<th id='tableTotal' width='80'>Amortization</th>");
					newWin.document.write("<th id='tableTotal' width='100'>Out. Balance</th></tr>");
					
					newWin.document.write("<tr height='5'></tr>");
					
					if (Trms < 30) {
					newWin.document.write("</table>");
					newWin.document.write("<tr><td><hr width=600px size='1' color='#666666' align='left'/></td></tr>");
					newWin.document.write("<table cellpadding='0'>");
					}
					
					newWin.document.write("<tr id='tablemain'><td id='tableTotal' width='100'></td>");
					newWin.document.write("<th id='tablemain' width='60'></th>");
					newWin.document.write("<th id='tablemain' width='60'></th>");
					newWin.document.write("<th id='tablemain' width='60'></th>");
					newWin.document.write("<th id='tablemain' width='60'>" + TDeduct0.toFixed(2) + "</th>");
					newWin.document.write("<th id='tablemain' width='80'>" + NetProc + "</th>");
					newWin.document.write("<th id='tablemain' width='100'>" + LoanAmt + "</th></tr>");
					
					
					
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
					
					if (payFrequency == "Monthly") { DimAmort = DimAmort * 2;}
					
					var DimPrin = 0;
					
					var runBal = LoanAmt;
	
	
					var strDate = new Date(StrtDate);
					var strDay = strDate.getDate();
					var strMonth = (strDate.getMonth() + 1);
					var strYear = strDate.getFullYear();
					var tmpDate = DueDate2;
					var newStrDate = strMonth + "/" + strDay + "/" + strYear;
					if ((strDay > DueDate1) && (strDay < DueDate2)) {strDay = DueDate2;}

					for (var i=0; i < nTerm; i++) {
					
			
						DimAmount = DimAmount - DimPrin;
			
						var DimInt = DimAmount * DimVarE;
						DimInt = DimInt / 12;
						var DimGRT = DimInt * 0.05;
						var FinalAmort = DimAmort + DimGRT;
						DimPrin = DimAmort - DimInt;
						runBal = runBal - DimPrin;
						runBal = Math.abs(runBal);
						var DimMon = DimPrin + DimInt + DimGRT;
						

						if (r == true) {newWin.document.write("<tr id='tablemain'><th id='tablemain' width='100'>" + newStrDate + "</th>"); } 
						else { newWin.document.write("<tr id='tablemain'><th id='tablemain' width='100'></th>"); }
						newWin.document.write("<th id='tablemain' width='60'>" + DimPrin.toFixed(2) + "</th>");
						newWin.document.write("<th id='tablemain' width='60'>" + DimInt.toFixed(2) + "</th>");
						newWin.document.write("<th id='tablemain' width='60'>" + DimGRT.toFixed(2) + "</th>");
						newWin.document.write("<th id='tablemain' width='60'></th>");
						newWin.document.write("<th id='tablemain' width='80'>" + DimMon.toFixed(2) + "</th>");
						newWin.document.write("<th id='tablemain' width='100'>" + Math.abs(runBal.toFixed(2)) + "</th>");
						newWin.document.write("<th id='tablemain' width='30'>" + (i + 1) + "</th></tr>");
					
						TotalInterest = parseFloat(TotalInterest) + parseFloat(DimInt);
						TotalGRT = parseFloat(TotalGRT) + parseFloat(DimGRT);
						TotalAmort = parseFloat(TotalAmort) + parseFloat(DimMon);
					
						strDay = DueDate2;
						
						if (strDay == DueDate2) {
							if (strMonth == 2){strDate.setDate(strDate.getDate() + 31);}
							else {strDate.setDate(strDate.getDate() + 30);}
							}
					
					
						var endDate = new Date(strDate.getFullYear(), strDate.getMonth()+1, 0);
						var endDay = endDate.getDate();
					
						if (DueDate2 == strDay){
							if (DueDate2 > endDay){
							strMonth = (strDate.getMonth() + 1);
							strYear = strDate.getFullYear();
							newStrDate = strMonth + "/" + endDay + "/" + strYear;}
							else {
							strMonth = (strDate.getMonth() + 1);
							strYear = strDate.getFullYear();
							newStrDate = strMonth + "/" + strDay + "/" + strYear;
							}
						}
						else {
							strMonth = (strDate.getMonth() + 1);
							strYear = strDate.getFullYear();
							newStrDate = strMonth + "/" + strDay + "/" + strYear;
						}
					

					}
					
					
					if (Trms < 30) {
					newWin.document.write("</table>");
					newWin.document.write("<tr><hr width=600px size='1' color='#666666' align='left'/></tr>");
					newWin.document.write("<table>");
					}
					
					newWin.document.write("<tr><th width='100'></th>");
					newWin.document.write("<th width='60' id='tableTotal'>" + LoanAmt + "</th>");
					newWin.document.write("<th width='60' id='tableTotal'>" + TotalInterest.toFixed(2) + "</th>");
					newWin.document.write("<th width='60' id='tableTotal'>" + TotalGRT.toFixed(2) + "</th>");
					newWin.document.write("<th width='60' id='tableTotal'>" + TDeduct0.toFixed(2) + "</th>");
					newWin.document.write("<th width='80' id='tableTotal'>" + TotalAmort.toFixed(2) + "</th>");
					newWin.document.write("<th width='100'></th></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr>");
					newWin.document.write("<th width='450' id='tableTotal'></th>");
					newWin.document.write("<th width='200' id='UpperBody' align='center'><label id='underWord'><strong>" + BorrowerName + "</strong></label></th>");
					newWin.document.write("<th width='30' id='tableTotal'></th>");
					newWin.document.write("</tr>");
					newWin.document.write("<tr>");
					newWin.document.write("<th width='450' id='tableTotal'></th>");
					newWin.document.write("<th width='200' id='BorrowerName' align='center'>Name and Signature of Borrower</th>");
					newWin.document.write("<th width='30' id='tableTotal'></th>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");

					
					BorrowerName = BorrowerName.bold();
					newWin.document.write("<table>");
					newWin.document.write("<tr height='10' id='UpperBody'><td id='UpperBody' width='600' align='left'></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='left'><p> This is to authorize <label id='underWord'>" + CompName.bold() + "</label> to deduct from my/our <label id='underWord'><strong>PAYROLL ACCOUNT</strong></label> the amount herein stipulated of whatever due and to remit the same to <strong>QUEENCARD CORPORATION</strong> in case <label id='underWord'>" + BorrowerName + "</label> fails or refuses to pay the said loan amount.</p></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='300' align='center'></td>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='300' align='center'><label id='underWord'>" + ComakerName1.bold() + "</label></td>");
					newWin.document.write("<td id='UpperBody' width='300' align='center'><label id='underWord'>" + ComakerName2.bold() + "</label></td></tr>");
					newWin.document.write("<tr id='BorrowerName'><td id='BorrowerName' width='300' align='center'>Co-Maker</td>");
					newWin.document.write("<td id='BorrowerName' width='300' align='center'>Co-Maker</td></tr>");
					newWin.document.write("</table>");
					
					
					
					
					var relDate = new Date(DATERELEASED);
					var newRelDate = (relDate.getMonth() + 1) + "/" + relDate.getDate() + "/" + relDate.getFullYear();
					newRelDate  = "";
					
					newWin.document.write("<table>");
					newWin.document.write("<tr id='UpperBody'><th><img src='images/preparedby.jpg' width='360' height='80' /></th>");
					newWin.document.write("<td><table width='250'>");
					newWin.document.write("<tr><td width='150' id='BorrowerName' align='right'>Account Number:</td>");
					newWin.document.write("<td width='100' id='BorrowerName' align='left'>" + LoanNo.bold() + "</td></tr>");					
					newWin.document.write("<tr><td id='BorrowerName' align='right'>PN Number:</td>");
					newWin.document.write("<td></td></tr>");							
					newWin.document.write("<tr><td id='BorrowerName' align='right'>Date Released:</td>");
					newWin.document.write("<td id='BorrowerName' align='left'>" + newRelDate.bold() + "</td></tr>");						
					newWin.document.write("<tr><td id='BorrowerName' align='right'>Check Number:</td>");
					newWin.document.write("<td></td></tr>");						
					newWin.document.write("<tr><td id='BorrowerName' align='right'>Savings Acc. No.:</td>");
					newWin.document.write("<td></td></tr>");
					newWin.document.write("<table></td></tr>");
					newWin.document.write("</table>");

					newWin.document.close();
				}
