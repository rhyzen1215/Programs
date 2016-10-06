

		function Promissory2() {
					
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
					var ComakerName1 = document.getElementById("comName1").value;
					var ComakerName2 = document.getElementById("comName2").value;
					var BSpouse = document.getElementById("BSpouse").value;
					var BAdd = document.getElementById("BAdd").value;
					var CAdd1 = document.getElementById("BAdd1").value;
					var CAdd2 = document.getElementById("BAdd2").value;
					
					var AmortText = "";
					var AmortValueTxt = DigitConvert(AmortValue) + " (P" + AmortValue + ")";
					
					
			
					var DigVal = DigitConvert(LoanAmt);
					var IntWord = NumberConvert(IntR * 100);
					var InValue = parseFloat(IntR) * 100;
					IntWord = IntWord + " (" + InValue + ")";
					var termDoc = NumberConvert(Trms * 2);
					termDoc = termDoc + " (" + (Trms * 2) + ")";
					
					
					if (ProdCode =="QSAL"){ AmortText = "SEE AMORTIZATION SCHEDULE";}
					else { AmortText = AmortValueTxt;}
					
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
					newWin.document.write("text-indent: 40px;");
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
					newWin.document.write("<tr id='Queencard'><td id='Queencard' width='600' align='center'>Promissory Note</td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table id='Queencard'>");
					newWin.document.write("<tr id='Queencard'><td id='UpperBody' width='600' align='right'>Iloilo City, Philippines</td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr id='Queencard'><td id='Address' width='600' align='center' height='30'></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("<tr id='UpperBody2'><td id='UpperBody2' width='600'><p> FOR VALUE RECEIVED, I/We jointly and severally promise to pay QUEENCARD CORPORATION (hereinafter referred to as the \"Firm\") or order, at its Office in G/F Sky City Tower, Mapa Street, Iloilo City the sum of PESOS: ");
					newWin.document.write("<label id='underWord'>&nbsp;&nbsp;&nbsp;&nbsp;" + DigVal.bold() + " (P" + LoanAmt.bold() + ")&nbsp;&nbsp;&nbsp;&nbsp; </label>");
					newWin.document.write(" Philippine Currency, with interest thereon at the rate of ");
					newWin.document.write("<label id='underWord'>&nbsp;&nbsp;&nbsp;&nbsp;" + IntWord.bold() + "&nbsp;&nbsp;&nbsp;&nbsp;</label>");
					newWin.document.write(" percent per annum, payable in ");
					newWin.document.write("<label id='underWord'>&nbsp;&nbsp;&nbsp;&nbsp;" + termDoc.bold() + " &nbsp;&nbsp;&nbsp;&nbsp;</label>");
					newWin.document.write("" + myTExt + " installments of PESOS: ");
					newWin.document.write("<label id='underWord'>&nbsp;&nbsp;&nbsp;&nbsp;" + AmortText.bold() + "&nbsp;&nbsp;&nbsp;&nbsp;</label>");
					newWin.document.write(" the first installments to become due on ");
					newWin.document.write("<label id='underWord'>&nbsp;&nbsp;&nbsp;&nbsp;" + SDate.bold() + "&nbsp;&nbsp;&nbsp;&nbsp;</label>");
					newWin.document.write(" and the succeeding installments to fall due on or before the ");
					newWin.document.write("<label id='underWord'>&nbsp;&nbsp;&nbsp;&nbsp;" + dteCheck.bold() + "&nbsp;&nbsp;&nbsp;&nbsp;</label>");
					newWin.document.write(" day of each and every month thereafter, until the whole sum of principal and interest shall have been  fully paid. It is understood, however, that should default be made in the payment of any installment(s) as and when the same become(s) due and payable as herein provided, then the whole sum remaining unpaid under this note shall forthwith become due and payable at the option of the holder.</p></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr id='Queencard'><td id='Address' width='600' align='center' height='10'></td></tr>");
					newWin.document.write("<tr id='UpperBody2'><td id='UpperBody2' width='600'><p> In case of non-payment of this note or any installments thereof at maturity, I/We jointly and severally agree to pay an additional amount equivalent of twenty four percent (24%) per annum of the amount due and demandable as penalty and collection charges, in the form of liquidated damages, until fully paid; and further sum of fifteen percent (15%) thereof in full, without any deduction, as and for attorney's fee whether actually incurred or not, exclusive of costs and judicial/extra-judicial expenses; moreover, I/We jointly and severally, further empower and authorized the Firm at its option, and without notice, to set-off or to apply to the payment of this note any and all funds, which may be in its hands on deposit or otherwise belonging to anyone or all of us, and to hold as security thereof any real or personal property, which may be its possession or control by virtue of any other contract. </p></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr id='Queencard'><td id='Address' width='600' align='center' height='10'></td></tr>");
					newWin.document.write("<tr id='UpperBody2'><td id='UpperBody2' width='600'><p>It is a special condition of this contract that the parties herein agree that the amount of pesos-obligation under this agreement is based on the present value of the peso, and if there be any change in the value thereof, due to extraordinary inflation or deflation or any other cause or reason, then the peso-obligation herein contracted shall be adjusted with the value of the peso then prevailing at the time of the complete fulfillment of the obligation.</p></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr id='Queencard'><td id='Address' width='600' align='center' height='10'></td></tr>");
					newWin.document.write("<tr id='UpperBody2'><td id='UpperBody2' width='600'><p>In the event that I, or any one of my co-makers is separated from the company for whatever reason, upon the option of Queencard Corporation or upon failure of payment of the amount due will render this loan obligation due and demandable.</p></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr id='Queencard'><td id='Address' width='600' align='center' height='10'></td></tr>");
					newWin.document.write("<tr id='UpperBody2'><td id='UpperBody2' width='600'><p>Demand and Notice of Dishonor Waived. Holder/s may account partial payment(s) and endorsers, and all parties to this note.</p></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr id='Queencard'><td id='Address' width='600' align='center' height='10'></td></tr>");
					newWin.document.write("<tr id='UpperBody2'><td id='UpperBody2' width='600'><p>In case of judicial execution of this obligation or any part of it, I/We waive all my/our right(s) under the provision of Rule 39, Sec.12, of the Rules of Court.</p></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr id='Queencard'><td id='Address' width='600' align='center' height='10'></td></tr>");
					newWin.document.write("<tr id='UpperBody2'><td id='UpperBody2' width='600'><p>This Promissory Note is secured by a _______________ executed by me/us in favor of the QUEENCARD CORPORATION.</p></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table width='600'>");
					newWin.document.write("<tr height='30'>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table width='600'>");
					newWin.document.write("<tr width='300'>");
					
					newWin.document.write("<td>");
					newWin.document.write("<table width='250' height='50' cellpadding='50'>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody2' align='center'><label id='underWord'>" + ComakerName1.bold() + "</label>");
					newWin.document.write("</td>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' >CO-MAKER (Print Name and Sign in Ink)");
					newWin.document.write("</td>");
					newWin.document.write("<tr>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' >RELATIONSHIP TO BORROWER");
					newWin.document.write("</td>");
					newWin.document.write("<tr>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' >HOME ADDRESS: <label id='underWord'>" + CAdd1.bold() + "</label>");
					newWin.document.write("</td>");
					newWin.document.write("<tr>");
					newWin.document.write("</table>");
					newWin.document.write("</td>");
					
					
					newWin.document.write("<td width='300'>");
					newWin.document.write("<table width='250' height='50' cellpadding='50'>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody2' align='center'><label id='underWord'>" + BorrowerName.bold() + "</label>");
					newWin.document.write("</td>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' >APPLICANT (Print Name and Sign in Ink)");
					newWin.document.write("</td>");
					newWin.document.write("<tr>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' >HOME ADDRESS: <label id='underWord'>" + BAdd.bold() + "</label>");
					newWin.document.write("</td>");
					newWin.document.write("<tr>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' >  ");
					newWin.document.write("</td>");
					newWin.document.write("<tr>");
					newWin.document.write("</table>");
					newWin.document.write("</td>");
					
					newWin.document.write("</tr>");
					
					
					newWin.document.write("<tr height='10'></tr>");
					
					newWin.document.write("<tr>");
					
					newWin.document.write("<td>");
					newWin.document.write("<table width='300' height='50'>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody2' align='center'> <label id='underWord'>" + ComakerName2.bold() + "</label>");
					newWin.document.write("</td>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' >CO-MAKER (Print Name and Sign in Ink)");
					newWin.document.write("</td>");
					newWin.document.write("<tr>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' >RELATIONSHIP TO BORROWER");
					newWin.document.write("</td>");
					newWin.document.write("<tr>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' >HOME ADDRESS: <label id='underWord'>" + CAdd2.bold() + "</label>");
					newWin.document.write("</td>");
					newWin.document.write("<tr>");
					newWin.document.write("</table>");
					newWin.document.write("</td>");
					
					
					newWin.document.write("<td>");
					newWin.document.write("<table width='300' height='50'>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody2' align='center'><label id='underWord'>" + BSpouse.bold() + "</label>");
					newWin.document.write("</td>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' >NAME & SIGNATURE OF SPOUSE");
					newWin.document.write("</td>");
					newWin.document.write("<tr>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' >");
					newWin.document.write("</td>");
					newWin.document.write("<tr>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' >  ");
					newWin.document.write("</td>");
					newWin.document.write("<tr>");
					newWin.document.write("</table>");
					newWin.document.write("</td>");
					
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr id='Queencard'><td id='Address' align='center' height='20'></td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' >PURPOSE OF LOAN: ______________________________________________________________ .</td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td height='20'></td></tr>");
					newWin.document.write("<tr><td id='UpperBody' >SIGNATURE VERIFIED BY: </td><td width='200'>__________________________________________. </td></tr>");
					newWin.document.write("<tr><td></td><td width='200' id='Address' align='center'>(Name & Signature of Dept./Branch Head)</td></tr>");
					newWin.document.write("</table>");
					
					
					
					newWin.document.write("<table width='600'>");
					newWin.document.write("<tr><td height='20'></td></tr>");
					newWin.document.write("<tr id='Queencard' align='center'><td id='UpperBody' height='30'>SIGNED IN THE PRESENCE OF</td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table width='600'>");
					newWin.document.write("<tr><td align='center'>____________________</td><td align='center'>____________________</td></tr>");
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