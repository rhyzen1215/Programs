

		function ADA2() {
					
					var StrtDate = document.getElementById("strDate").value;
					var DueDate1 = document.getElementById("strDate1").value;
					var DueDate2 = document.getElementById("strDate2").value;
					
					var AmortValue = document.getElementById("Amortz").value;
					var ProdCode = document.getElementById("ProductCode").value;
					var CompName = document.getElementById("ComName").value;
					var PrdName = document.getElementById("ProdName").value;
					var LoanNo = document.getElementById("LoanNumber").value;
					var BorrowerName = document.getElementById("BName").value;
					var PRDName = document.getElementById("PRDName").value;
					var ComName = document.getElementById("ComName").value;
					
					var IntR = document.getElementById("IntRate").value;
					var LoanAmt = document.getElementById("LAmount").value;
					var Trms = document.getElementById("LTerms").value;
		
					
					var rlDate = new Date(StrtDate);
					var nwRlDate = (rlDate.getMonth() + 1) + "/" + rlDate.getDate() + "/" + rlDate.getFullYear();
					
					var AmortText = "";
					var AmortValueTxt = DigitConvert(AmortValue) + " (P" + AmortValue + ")";
					
					
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
					var myDate = myMonth + " " + myDay + ", " + myYear; 
					
					
					
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
					
					DimAmort = "  PHP " +  DimAmort + "  ";
					
					
					
					
					
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
				
					var newWin = window.open("", "name", "width=500, height=600, menubar=no, titlebar=no");
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
					newWin.document.write("align: right;");
					newWin.document.write("}");
					
					newWin.document.write("#pIndent {");
					newWin.document.write("text-indent: 30px;");
					newWin.document.write("align: right;");
					newWin.document.write("}");
					
					
					newWin.document.write("#underWord {");
					newWin.document.write("text-decoration: underline;");
					newWin.document.write("}");
					
					
					newWin.document.write("#Address {");
					newWin.document.write("font-family: 'Times New Roman'; font-size:10px; font-weight: normal;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("#UpperBody {");
					newWin.document.write("font-family: 'Times New Roman', Times, serif; font-size:12px; font-weight: normal;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					
					newWin.document.write(".underLined {");
					newWin.document.write("width=150px;;");
					newWin.document.write("}");
					
					
					newWin.document.write("#UpperBody2 {");
					newWin.document.write("font-family: 'Times New Roman', Times, serif; font-size:12px; font-weight: normal;");
					newWin.document.write("text-align: justify;");
					newWin.document.write("text-justify: inter-word;");
					newWin.document.write("padding: 0px;");
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
					newWin.document.write("<tr><td id='underWord' width='600' align='left'>" + myDate + "</td></tr>");
					newWin.document.write("<tr><td width='600' height='10' align='left'></td></tr>");
					newWin.document.write("<tr><td id='UpperBody' width='600' align='left'>QUEENCARD CORPORATION</td></tr>");
					newWin.document.write("<tr><td id='UpperBody' width='600' align='left'>G/F Sky City Tower, Mapa Street</td></tr>");
					newWin.document.write("<tr><td id='UpperBody' width='600' align='left'>Iloilo City</td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td width='600' height='20' align='left'></td></tr>");
					newWin.document.write("<tr><td id='Queencard' width='600' align='center'>RE: AUTOMATIC DEBIT ARRANGEMENT</td></tr>");
					newWin.document.write("<tr><td width='600' height='10' align='left'></td></tr>");
					newWin.document.write("<tr><td id='UpperBody' width='600' align='left'>Gentlemen/Madam:</td></tr>");
					newWin.document.write("<tr><td width='600' height='10' align='left'></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr id='UpperBody2'><td id='UpperBody2' width='600'><p> This is to authorize you to debit from my salary, my/ our savings/ checking account No. ");
					newWin.document.write("<label id='underWord'>" + LoanNo.bold() + " </label>");
					newWin.document.write(" to be applied as payment for my/our monthly amortization and/or obligations to QUEENCARD CORPORATION arising from ");
					newWin.document.write("<label id='underWord'>" + PRDName.bold() + "</label>");
					newWin.document.write(" transactions, which I/we executed in their favor on ________________ , to wit: </p></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td width='600' height='10' align='left'></td></tr>");
					newWin.document.write("<tr id='UpperBody2'><td id='UpperBody2' width='600'><p id='pIndent'> a. Amount of  ");
					newWin.document.write("<label id='underWord'>  " + DimAmort.bold() + "  </label>");
					newWin.document.write("  to be debited on or before _____________ of the month commencing on  ");
					newWin.document.write("<label id='underWord'>  " + nwRlDate.bold() + "  </label>");
					newWin.document.write("  and every  ");
					newWin.document.write("<label id='underWord'>  " + dteCheck.bold() + "  </label>");
					newWin.document.write("   of the month thereafter, or </p></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td width='600' height='10' align='left'></td></tr>");
					newWin.document.write("<tr id='UpperBody2'><td id='UpperBody2' width='600'><p id='pIndent'> b. Amount of PHP _____________ (which excludes past due charges in accordance with my statement of account) be debited after the said due date in view of the fact that the available balance of the deposit is not sufficient to cover the net monthly amortization or obligation(s) when due.</p></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("</table>");
					
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td width='600' height='10' align='left'></td></tr>");
					newWin.document.write("<tr id='UpperBody2'><td id='UpperBody2' width='600'><p>And/ or whatever interest, penalties, charges escalation, accelerations, or adjustments thereof as may be imposed by QUEENCARD CORPORATION pursuant to the terms and conditions of the aforesaid contracts.</p></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td width='600' height='10' align='left'></td></tr>");
					newWin.document.write("<tr id='UpperBody2'><td id='UpperBody2' width='600'><p>I/We undertake to deposit sufficient funds to cover the aforesaid monthly amortization and/or obligations and likewise, agree not to close the aforesaid account until said obligations are fully paid.</p></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td width='600' height='10' align='left'></td></tr>");
					newWin.document.write("<tr id='UpperBody2'><td id='UpperBody2' width='600'><p>I/We herebyauthorize either <label id='underWord'>" + ComName.bold() + "</label> or QUEENCARD CORPORATION any of their dully authorized representative(s) to conduct the necessary inquiry and /or examination of my <label id='underWord'><strong> PAYROLL ACCOUNT </strong></label> account for the purpose affecting the implementation of this automatic debit authorization/arrangement.</p></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td width='600' height='10' align='left'></td></tr>");
					newWin.document.write("<tr id='UpperBody2'><td id='UpperBody2' width='600'><p>This authority likewise serves to render <label id='underWord'>" + ComName.bold() + "</label> or QUEENCARD CORPORATION or any of their duly authorized representative(s) free and harmless from any and all liability arising out of deposits, the pertinent provisions of the General Banking Act, as to the confidentiality of my/our deposit account(s) and other related laws on the subject of disclosure of bank deposits/transactions.</p></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("</table>");
					

					newWin.document.write("<table>");
					newWin.document.write("<tr><td width='600' height='10' align='left'></td></tr>");
					newWin.document.write("<tr id='UpperBody2'><td id='UpperBody2' width='600'><p>Furthermore, this will authorize you to remit the debited amount to QUEENCARD CORPORATION for application to the settlement of my <label id='underWord'>" + PRDName.bold() + "</label>	 due and other charges.</p></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("</table>");
 
 
					newWin.document.write("<table>");
					newWin.document.write("<tr><td width='600' height='10' align='left'></td></tr>");
					newWin.document.write("<tr id='UpperBody2'><td id='UpperBody2' width='600'><p>For failure on my part to fully settle my credit obligations with QUEENCARD CORPORATION, I hereby authorize <label id='underWord'>" + ComName.bold() + "</label> / QUEENCARD CORPORATION to withhold my <label id='underWord'><strong> PAYROLL ACCOUNT </strong></label> account with the bank. Any misrepresentation or false statement/information, apart from constituting a grave offense of dishonesty, which shall be dealt with in accordance with the Code of Discipline, shall constitute grounds for termination of my availment with QUEENCARD CORPORATION.</p></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td width='600' height='10' align='left'></td></tr>");
					newWin.document.write("<tr id='UpperBody2'><td id='UpperBody2' width='600'><p>I/we also acknowledge that the authority granted herein shall not in any manner prejudice any of the right and privileges granted to <label id='underWord'>" + ComName.bold() + "</label> and QUEENCARD CORPORATION under the <label id='underWord'>" + PRDName.bold() + "</label> application form contract and such other related documents, or rights of QUEENCARD CORPORATION and/or <label id='underWord'>" + ComName.bold() + "</label> to terminate this agreement at its option in case of the default or violation of the terms and conditions thereof, or of any reason whatsoever, in any manner at its absolute option and discretion.</p></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td width='600' height='30' align='left'></td></tr>");
					newWin.document.write("<tr id='UpperBody2'><td id='UpperBody2' width='600'><p>Very truly yours,</p></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table id='Queencard'>");
					newWin.document.write("<tr><td width='600' height='10' align='left'></td></tr>");
					newWin.document.write("<tr><td id='underWord' width='600' align='left'>" + BorrowerName + "</td></tr>");
					newWin.document.write("<tr><td id='UpperBody' width='600' align='left'>Applicant's Signature over Printed Name</td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.close();
				}



function DigitConvert(DigitAmnt){
	
					var num = parseFloat(DigitAmnt);
					var wNum = Math.floor(num);
					if (wNum > 0){ var dNum = num - wNum;}
					else { var dNum = num;}
					dNum = dNum * 100;
					dNum = dNum.toFixed();
					var wholewords = toWords(wNum);
					var decwords = toWords(dNum);
					var words = "";
	
					if (wNum > 1){
						if (dNum == 1){ words = wholewords + "Pesos and " + decwords + "Centavo";}
						else if (dNum > 1){ words = wholewords + "Pesos and " + decwords + "Centavos";}
						else { words = wholewords + "Pesos";}
					}
					else if (wNum == 1){
						if (dNum == 1){ words = wholewords + "Peso and " + decwords + "Centavo";}
						else if (dNum > 1){ words = wholewords + "Peso and " + decwords + "Centavos";}
						else { words = wholewords + "Peso";}
					}
					else {
						if (dNum == 1){ words = decwords + "Centavo";}
						else if (dNum > 1){ words = decwords + "Centavos";}
					}
	
			return words;
		}
		
function NumberConvert(DigitAmnt){
	
				var num = parseFloat(DigitAmnt);
				var words = toWords(num);
				return words;
		}