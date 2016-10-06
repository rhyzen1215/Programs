		function Amort3() {
					

					var ValNet = 116400;
					var IRRval = [];
					ValNet = ValNet * -1;
					IRRval.push(ValNet);
					
					var newWin = window.open("", "name", "width=500, height=600, menubar=no, titlebar=no");
					newWin.document.open();
					newWin.document.write("<table>");

					var DimMon =11001.6;
										  
					for (var i=0; i < 12; i++) {

  						newWin.document.write("<tr>");
						newWin.document.write("<th width='80'>" + DimMon + "</th>");
						newWin.document.write("<th width='30'>" + (i + 1) + "</th></tr>");
						
						IRRval.push(DimMon);
						

					}
					
					
					
					var IRR = IRRCalc(IRRval);
					var IRR2 = Math.pow((1+IRR),12);
					IRR2 = IRR2 - 1;
					IRR2 = IRR2 * 100;
					IRR2 = IRR2.toFixed(2);
					IRR2 = IRR2 + " %";
					
					newWin.document.write("<tr>");
					newWin.document.write("<th width='60'>" + ValNet + "</th>");
					newWin.document.write("<th width='60'>" + IRR2 + "</th>");
					newWin.document.write("</tr>");
	
					newWin.document.write("</table>");
					newWin.document.close();
					
					document.getElementById("MEIR").value = IRR;
					document.getElementById("EIR").value = IRR2;
				}
				
				
				

		function Amort2() {
					

					var IntR = document.getElementById("IntRate").value;
					var LoanAmt = document.getElementById("LoanAmnt").value;
					var Trms = document.getElementById("LTerms").value;
					var TDeduct = document.getElementById("TotalD").value;

					var Intrst = parseFloat(LoanAmt) * parseFloat(IntR);
					var DimInt = Intrst / Trms;
					DimInt = DimInt / 2;
					var DimGRT = DimInt * 0.05;
					
					
					var DimPrin = parseFloat(LoanAmt) / parseFloat(Trms);
					DimPrin = DimPrin / 2;

					var nTerm = Trms * 2;
					var TotalInterest = 0;
					var TotalGRT = 0;
					var TotalAmort = 0;
					
					var DimAmount = LoanAmt;
					var runBal = LoanAmt;
					
					var ValNet = parseFloat(LoanAmt) - parseFloat(TDeduct);
					var IRRval = [];
					ValNet = ValNet * -1;
					IRRval.push(ValNet);
					
					
					
					var newWin = window.open("", "name", "width=500, height=600, menubar=no, titlebar=no");
					newWin.document.open();
					newWin.document.write("<table>");
	
					
					var DimMon =0;
										  
					for (var i=0; i < nTerm; i++) {
					
						DimAmount = DimAmount - DimPrin;
						runBal = runBal - DimPrin;
						DimMon = DimPrin + DimInt + DimGRT;

  						newWin.document.write("<tr>");
						newWin.document.write("<th width='60'>" + DimPrin.toFixed(2) + "</th>");
						newWin.document.write("<th width='60'>" + DimInt.toFixed(2) + "</th>");
						newWin.document.write("<th width='60'>" + DimGRT.toFixed(2) + "</th>");
						newWin.document.write("<th width='60'></th>");
						newWin.document.write("<th width='80'>" + DimMon.toFixed(2) + "</th>");
						newWin.document.write("<th width='100'>" + runBal.toFixed(2) + "</th>");
						newWin.document.write("<th width='30'>" + (i + 1) + "</th></tr>");
						
						IRRval.push(DimMon);
						
						TotalInterest = parseFloat(TotalInterest) + parseFloat(DimInt);
						TotalGRT = parseFloat(TotalGRT) + parseFloat(DimGRT);
						TotalAmort = parseFloat(TotalAmort) + parseFloat(DimMon);

					}
					
					
					
					var IRR = IRRCalc(IRRval);
					var IRR2 = Math.pow((1+IRR),12);
					IRR2 = IRR2 - 1;
					IRR2 = IRR2 * 100;
					IRR2 = IRR2.toFixed(2);
					IRR2 = IRR2 + " %";
					
					newWin.document.write("<tr>");
					newWin.document.write("<th width='60'>" + IRR + "</th>");
					newWin.document.write("<th width='60'>" + IRR2 + "</th>");
					newWin.document.write("</tr>");
	
					newWin.document.write("</table>");
					newWin.document.close();
					
					document.getElementById("MEIR").value = IRR;
					document.getElementById("EIR").value = IRR2;
					document.getElementById("NetProc").value = ValNet;
				}
				
				
				
				
				
				
				
				
				
				function Amort() {
					

					var IntR = document.getElementById("IntRate").value;
					var LoanAmt = document.getElementById("LoanAmnt").value;
					var Trms = document.getElementById("LTerms").value;
					var TDeduct = document.getElementById("TotalD").value;
					
					var Intrst = parseFloat(LoanAmt) * parseFloat(IntR);
					
					var VarTrm = Trms * 30;
					VarTrm = VarTrm / 360;
					
					var pwrTerm = Trms * 2;
					
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
					
					var ValNet = parseFloat(LoanAmt) - parseFloat(TDeduct);
					var IRRval = [];
					ValNet = ValNet * -1;
					IRRval.push(ValNet);
					
					
					
					var newWin = window.open("", "name", "width=500, height=600, menubar=no, titlebar=no");
					newWin.document.open();
					newWin.document.write("<table>");
	
					
					
										  
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
						var DimMon = DimPrin + DimInt + DimGRT;

  						newWin.document.write("<tr>");
						newWin.document.write("<th width='60'>" + DimPrin.toFixed(2) + "</th>");
						newWin.document.write("<th width='60'>" + DimInt.toFixed(2) + "</th>");
						newWin.document.write("<th width='60'>" + DimGRT.toFixed(2) + "</th>");
						newWin.document.write("<th width='60'></th>");
						newWin.document.write("<th width='80'>" + DimMon.toFixed(2) + "</th>");
						newWin.document.write("<th width='100'>" + runBal.toFixed(2) + "</th>");
						newWin.document.write("<th width='30'>" + (i + 1) + "</th></tr>");
						
						IRRval.push(DimMon.toFixed(2));
						
						TotalInterest = parseFloat(TotalInterest) + parseFloat(DimInt);
						TotalGRT = parseFloat(TotalGRT) + parseFloat(DimGRT);
						TotalAmort = parseFloat(TotalAmort) + parseFloat(DimMon);

					}
					
					
					
					var IRR = IRRCalc(IRRval);
					var IRR2 = Math.pow((1+IRR),24);
					IRR2 = IRR2 - 1;
					IRR2 = IRR2 * 100;
					IRR2 = IRR2.toFixed(2);
					IRR2 = IRR2 + " %";
					
					newWin.document.write("<tr>");
					newWin.document.write("<th width='60'>" + IRR + "</th>");
					newWin.document.write("<th width='60'>" + IRR2 + "</th>");
					newWin.document.write("</tr>");
	
					newWin.document.write("</table>");
					newWin.document.close();
					
					document.getElementById("MEIR").value = IRR;
					document.getElementById("EIR").value = IRR2;
					document.getElementById("NetProc").value = ValNet;
				}
