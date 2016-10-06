

		function Amortization_AddOn() {

					var IntR = document.getElementById("IntRate").value;
					var LoanAmt = document.getElementById("LoanAmnt").value;
					var Trms = document.getElementById("LTerms").value;
					var TDeduct = document.getElementById("TotalD").value;
					var NetProc = document.getElementById("NetP").value;
					var CompName = document.getElementById("ComName").value;
					var PrdName = document.getElementById("ProdName").value;
					var LoanNo = document.getElementById("LoanNumber").value;
					
					var StrtDate = document.getElementById("strDate").value;
					var DueDate1 = document.getElementById("strDate1").value;
					var DueDate2 = document.getElementById("strDate2").value;
					
				
					
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
					
				
					var newWin = window.open("", "name", "width=500, height=600, menubar=no, titlebar=no");
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
					
					newWin.document.write("#Address {");
					newWin.document.write("font-family: 'Century Gothic'; font-size:10px; font-weight: normal;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("#UpperBody {");
					newWin.document.write("font-family: 'Times New Roman', Times, serif; font-size:12px; font-weight: normal;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("#tablemain {");
					newWin.document.write("border: 0px solid black; border-collapse: collapse;");
					newWin.document.write("font-family:'Century Gothic'; font-size:8px; font-weight: normal; border-spacing:inherit;")
					newWin.document.write("Spadding-left: 2px; padding-right: 2px; margin:2px; text-align: right; padding-top: 0px; padding-bottom: 0px")
					newWin.document.write("}");
					
					newWin.document.write("#tableTotal {");
					newWin.document.write("border: 0px; font-family:'Century Gothic'; font-size:10px; font-weight: bold; border-spacing:inherit;")
					newWin.document.write("Spadding-left: 2px; padding-right: 2px; margin: 2px; text-align: right; padding-top: 0px; padding-bottom: 0px")
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
					newWin.document.write("<tr id='UpperBody'><td id='UpperBody' width='600'>This is to authorize " + CompName.bold() + " to deduct from my PAYROLL ACCOUNT the amount hereunder stipulated and to remit the same to QUEENCARD CORPORATION as payment of my " + PrdName.bold() + " No: " + LoanNo.bold() + " /PN No.: " + PNNumber + " every _____ and _____ of the month or until fully paid as follows.</td></tr>");
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
					newWin.document.write("</table>");
					newWin.document.write("<hr width=600px size='1' color='#666666' align='left'/>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr id='tablemain'><td id='tableTotal' width='100'></td>");
					newWin.document.write("<th id='tablemain' width='60'></th>");
					newWin.document.write("<th id='tablemain' width='60'></th>");
					newWin.document.write("<th id='tablemain' width='60'></th>");
					newWin.document.write("<th id='tablemain' width='60'>" + TDeduct + "</th>");
					newWin.document.write("<th id='tablemain' width='80'>" + NetProc + "</th>");
					newWin.document.write("<th id='tablemain' width='100'>" + LoanAmt + "</th></tr>");
					for (var i=0; i < nTerm; i++) {
					
					
			
					if (i == (nTerm-1)){ VarPrin=LastVarPrin;}
					AmortVal = parseFloat(VarPrin) + parseFloat(VarIntVal) + parseFloat(VarGRT);
					OutBal = parseFloat(OutBal) - parseFloat(VarPrin);
					OutBal = OutBal.toFixed(2);
					AmortVal = AmortVal.toFixed(2);
					
  					newWin.document.write("<tr id='tablemain'><th id='tablemain' width='100'>" + newDate + "</th>");
					newWin.document.write("<th id='tablemain' width='60'>" + VarPrin + "</th>");
					newWin.document.write("<th id='tablemain' width='60'>" + VarIntVal + "</th>");
					newWin.document.write("<th id='tablemain' width='60'>" + VarGRT + "</th>");
					newWin.document.write("<th id='tablemain' width='60'></th>");
					newWin.document.write("<th id='tablemain' width='80'>" + AmortVal + "</th>");
					newWin.document.write("<th id='tablemain' width='100'>" + OutBal + "</th></tr>");
					
					TotalInterest = parseFloat(TotalInterest) + parseFloat(VarIntVal);
					TotalGRT = parseFloat(TotalGRT) + parseFloat(VarGRT);
					TotalAmort = parseFloat(TotalAmort) + parseFloat(AmortVal);
		
					}
					newWin.document.write("</table>");
					newWin.document.write("<hr width=600px size='1' color='#666666' align='left'/>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><th width='100'></th>");
					newWin.document.write("<th width='60' id='tableTotal'>" + LoanAmt + "</th>");
					newWin.document.write("<th width='60' id='tableTotal'>" + TotalInterest.toFixed(2) + "</th>");
					newWin.document.write("<th width='60' id='tableTotal'>" + TotalGRT.toFixed(2) + "</th>");
					newWin.document.write("<th width='60' id='tableTotal'>" + TDeduct + "</th>");
					newWin.document.write("<th width='80' id='tableTotal'>" + TotalAmort.toFixed(2) + "</th>");
					newWin.document.write("<th width='100'></th></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.close();
				}
