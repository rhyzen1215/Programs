
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style2 {font-size: 12px}

.styleText {text-align:right}
-->


input[type=date]
{
	width: 190px;
	margin-left:2px;
}

input[type=date],input[type=text],select
{
	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;
	border-spacing:inherit;
	padding-left: 2px;
	margin: 2px;
}
.style3 {
	font-size: 14px;
	font-weight: bold;
	font-family: "Century Gothic";
}
.style7 {
	font-family: "Century Gothic";
	font-size: 12px;
	font-weight: bold;
}
</style>


<script type="text/javascript">

	
	
	function SaveValues() {

	var IntR = document.getElementById("IntRate").value;
	var LoanAmt = document.getElementById("LoanAmount").value;
	var Trms = document.getElementById("Terms").value;
	
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
	
	document.getElementById("Interest").value = VarIntVal;
	document.getElementById("Principal").value = VarPrin;
	document.getElementById("GRT").value = VarGRT;
	
	var cntr = 1;
	do{
	document.write(VarPrin);
	document.write("<br>");
	cntr = cntr + 1;
	}while (cntr > Trms);
	
	}
	
</script>

</head>

<body>
            
	  

         <table width="720" cellpadding="0" cellspacing="0">
		  <tr>
            <td width="478"><div align="center"><span class="style3">LOAN DETAILS</span></div></td>
            <td width="126"></td>
          </tr>
         <tr>
		 </tr>
         <tr>
         <td><hr width=654px size="1" color="#666666" align="left"/></td>
         </tr>
		 
		 </table>




        <table cellpadding="0" cellspacing="0">

		  <tr>
          <th>&nbsp;</th>
          </tr>
					
          <tr>
            <td width="713"><table width="604" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="177" height="20"><div align="right" class="style13 style2"><font face="Century Gothic">Interest Rate:</font></div></td>
                  <th width="132"><div align="left"><input name="InterestRate" id="IntRate" style="text-align:right;" type="text"  size="12" value=""  /></div></th>
				  <td width="142"><div align="right" class="style13 style2"><font face="Century Gothic">Terms:</font></div></td>
                  <th width="151"><div align="left"><input name="ServiceCharge" id="" style="text-align:right;" type="text"  size="12" value=""  /></div></th>
                </tr>
				
				<tr>
                  <td width="177"><div align="right" class="style13 style2"><font face="Century Gothic">Loan Amount:</font></div></td>
                  <th width="132"><div align="left"><input name="ProcessingFee" id="LoanAmount" style="text-align:right;" type="text"  size="12" value="" /></div></th>
				  <td width="142"><div align="right" class="style13 style2"><font face="Century Gothic">Documentary Stamp:</font></div></td>
                  <th width="151"><div align="left"><input name="DocumentaryStamp" id="DocStamp" style="text-align:right;" type="text"  size="12" value="" /></div></th>
                </tr>
				
				<tr>
                  <td width="177"><div align="right" class="style13 style2"><font face="Century Gothic">Terms:</font></div></td>
                  <th width="132"><div align="left"><input name="MembershipFee" id="Terms" style="text-align:right;" type="text"  size="12" value="" /></div></th>
				  <td width="142"><div align="right" class="style13 style2"><font face="Century Gothic">Notarial Fee:</font></div></td>
                  <th width="151"><div align="left"><input name="NotarialFee" id="NotFee" style="text-align:right;" type="text"  size="12" value="" /></div></th>
                </tr>
				
				<tr>
                  <td width="177"><div align="right" class="style13 style2"><font face="Century Gothic">MRI:</font></div></td>
                  <th width="132"><div align="left"><input name="MRI" id="MRI"style="text-align:right;"  type="text"  size="12" value="" /></div></th>
				  <td width="142"><div align="right" class="style13 style2"><font face="Century Gothic">Credit Ratio:</font></div></td>
                  <th width="151"><div align="left"><input name="MEIR" id="MEIR" style="text-align:right;" type="text"  size="12" value="" /></div></th>
                </tr>
				
				<tr>
                  <td width="177"><div align="right" class="style13 style2"><font face="Century Gothic">APL:</font></div></td>
                  <th width="132"><div align="left"><input name="APL" id="APL" style="text-align:right;" type="text"  size="12" value="" /></div></th>
				  <td width="142"><div align="right" class="style13 style2"><font face="Century Gothic">EIR:</font></div></td>
                  <th width="151"><div align="left"><input name="EIR" id="EIRSample" style="text-align:right;" type="text"  size="12" value="" 	/></div></th>
                </tr>
				
				<tr>
                  <td width="177"><div align="right" class="style13 style2"><font face="Century Gothic">Mode:</font></div></td>
                  <th width="132"><div align="left">
				  <select id="DeductM" name="DeductMode" style="width:99px; margin-left:2px;" >
  								<option value="Deducted" selected="selected">Deducted</option>
  								<option value="Not deducted">Not deducted</option>
				  </select>
				  </div></th>
				  <td width="142"><div align="right" class="style13 style2"><font face="Century Gothic"></font></div></td>
                  <th width="151"><div align="left"></div></th>
                </tr>
				
                <tr>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
				  <th>&nbsp;</th>
                  <th><div align="left"></div></th>
                </tr>
				
				<tr>
                  <th>&nbsp;</th>
                  <th><div align="left">
				  
				 
                    <input name="btnEdit" id="bEdit" type="button" onclick="TableValues()" value="Edit" />
                    <input name="btnSave" id="bSave" type="button" onclick="smpleVal()" value="Save" />
			
				  
                  </div></th>
				  <th><div align="right"></div></th>
                  <th>&nbsp;</th>
                </tr>
				
               
				
            </table></td>
          </tr>
          <tr height="15"> </tr>
        </table>
		
		
		
		<table cellpadding="0" cellspacing="0">
	
          <tr>
            <td width="713">
			<table width="454" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="176" height="20"><div align="right" class="style13 style2"><font face="Century Gothic">Principal:</font></div></td>
                  <th width="276"><div align="left"><input name="LoanAmount2" id="Principal" style="text-align:right;"  type="text"  size="20" value="" readonly /></div></th>
                </tr>
				
				<tr>
                  <td width="176" height="20"><div align="right" class="style13 style2"><font face="Century Gothic">Interest:</font></div></td>
                  <th width="276"><div align="left"><input name="TotalDeduct" id="Interest" style="text-align:right;" type="text"  size="20" value="" readonly /></div></th>
                </tr>
				
				<tr>
                  <td width="176" height="20"><div align="right" class="style13 style2"><font face="Century Gothic">GRT:</font></div></td>
                  <th width="276"><div align="left"><input name="NetProceeds" id="GRT" style="text-align:right;" type="text"  size="20" value="" readonly /></div></th>
                </tr>
				
                <tr>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>
				
				<tr>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>

            </table></td>
          </tr>
          <tr height="15"> </tr>
        </table>
		
		
		
		<table width="454" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="176" height="20"><div align="right" class="style13 style2"><font face="Century Gothic">Principal:</font></div></td>
                  <th width="276"><div align="left"><input name="LoanAmount2" id="Principal" style="text-align:right;"  type="text"  size="20" value="" readonly /></div></th>
                </tr>
		</table>
		
		
		<table border="1">
		
			<script>
	
				function TableValues() {

					var IntR = document.getElementById("IntRate").value;
					var LoanAmt = document.getElementById("LoanAmount").value;
					var Trms = document.getElementById("Terms").value;
	
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
					document.getElementById("Interest").value = LastVarPrin;
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
					
					for (var i=0; i<nTerm; i++) {
					
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
				

			</script>
			
		</table>
		
</body>
</html>