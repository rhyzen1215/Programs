<script type="text/javascript">
				function TableValues() {

					var IntR = document.getElementById("InterestRate").value;
					var LoanAmt = document.getElementById("LoanAmount").value;
					var Trms = document.getElementById("LoanTerm").value;
	
					var VarInt1 = parseFloat(LoanAmt) * parseFloat(IntR);
					var VarTrm = Trms * 30;
					VarTrm = VarTrm / 360;
	
					var VarIntVal = VarInt1 * VarTrm;
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
					var LastVarPrin = LoanAmt - VarPrinAll;
					LastVarPrin = LastVarPrin.toFixed(2);
					var nTerm = Trms * 2;
					<!--document.getElementById("Interest").value = LastVarPrin; -->
					var AmortVal = 0.00;
					var OutBal = parseFloat(LoanAmt);
					var TotalInterest = 0;
					var TotalGRT = 0;
					var TotalAmort = 0;
					
					var newWin = window.open("", "name", "width=500, height=600, menubar=no, titlebar=no");
					newWin.document.open();
					newWin.document.write("<style type='text/css'>");
					
					newWin.document.write("#tablemain {");
					newWin.document.write("border: 0px solid black; border-collapse: collapse;");
					newWin.document.write("font-family:'Century Gothic'; font-size:12px; font-weight: normal; border-spacing:inherit;")
					newWin.document.write("Spadding-left: 2px; padding-right: 8px; margin: 8px; text-align: right")
					newWin.document.write("}");
					
					newWin.document.write("#tableTotal {");
					newWin.document.write("border: 0px; font-family:'Century Gothic'; font-size:12px; font-weight: bold; border-spacing:inherit;")
					newWin.document.write("Spadding-left: 2px; padding-right: 8px; margin: 8px; text-align: right")
					newWin.document.write("}");
					
					newWin.document.write("</style>");
					
					newWin.document.write("<table id='tableTotal'>");
					newWin.document.write("<tr id='tableTotal'><td id='tablemain' width='100'>Date</td>");
					newWin.document.write("<th id='tableTotal' width='60'>Principal</th>");
					newWin.document.write("<th id='tableTotal' width='60'>Interest</th>");
					newWin.document.write("<th id='tableTotal' width='60'>GRT</th>");
					newWin.document.write("<th id='tableTotal' width='60'>Amortization</th>");
					newWin.document.write("<th id='tableTotal' width='100'>Out. Balance</th></tr>");
					
					for (var i=0; i < nTerm; i++) {
					
					if (i == (nTerm-1)){ VarPrin=LastVarPrin;}
					AmortVal = parseFloat(VarPrin) + parseFloat(VarIntVal) + parseFloat(VarGRT);
					OutBal = parseFloat(OutBal) - parseFloat(VarPrin);
					OutBal = OutBal.toFixed(2);
  					newWin.document.write("<tr id='tablemain'><th id='tablemain' width='100'>Date " + (i + 1) + "</th>");
					newWin.document.write("<th id='tablemain' width='60'>" + VarPrin + "</th>");
					newWin.document.write("<th id='tablemain' width='60'>" + VarIntVal + "</th>");
					newWin.document.write("<th id='tablemain' width='60'>" + VarGRT + "</th>");
					newWin.document.write("<th id='tablemain' width='60'>" + AmortVal + "</th>");
					newWin.document.write("<th id='tablemain' width='100'>" + OutBal + "</th></tr>");
					
					TotalInterest = parseFloat(TotalInterest) + parseFloat(VarIntVal);
					TotalGRT = parseFloat(TotalGRT) + parseFloat(VarGRT);
					TotalAmort = parseFloat(TotalAmort) + parseFloat(AmortVal);
		
					}
					
					newWin.document.write("<tr><th width='100'></th>");
					newWin.document.write("<th width='60' id='tableTotal'>" + LoanAmt + "</th>");
					newWin.document.write("<th width='60' id='tableTotal'>" + TotalInterest.toFixed(2) + "</th>");
					newWin.document.write("<th width='60' id='tableTotal'>" + TotalGRT.toFixed(2) + "</th>");
					newWin.document.write("<th width='60' id='tableTotal'>" + TotalAmort.toFixed(2) + "</th>");
					newWin.document.write("<th width='100'></th></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<input name='btnSave' type='button' onclick='javascript: window.print();	' value='Print' />");
					newWin.document.close();
				}
				
				
				function AMortFactor() {
				
					var Irate = 0.12;
	var ITerms = 12;
	var xTerm = 0;
	
	var DimRate = parseFloat(Irate) / 12;
	var DimVar0 = parseFloat(DimRate) + 1;
	var DimVar1 = parseFloat(DimVar0);
	var DimVar2 = 0;
	var DimAmort = 0;
	DimVar1 = 1;
	
	Iterms = ITerms + xTerm;
	
	
	do {
		DimVar1 = DimVar1 / DimVar0;
		DimVar2 = DimVar2 + DimVar1;
		xTerm = xTerm + 1;
	}
	while (xTerm < Iterms);
	
	DimAmort = LAmnt / DimVar2;
	document.getElementById("EIRSample").value = DimAmort;
	
	}
</script>
