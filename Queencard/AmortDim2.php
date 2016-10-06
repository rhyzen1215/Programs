<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<script type="text/javascript">

	function AMortFactor() {
	
	this.document.open();
	
	var DimAmount = 32000;
	var DimintRate = 0.12;
    var DimVarE = 0.12;
    var DimTerms = 24;
    var DimVarB = 24;
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
	
	this.document.write(DimVar2 + "<br />");	
    var DimFactor = DimVar2;
    DimAmort = DimAmount / DimFactor;
    var DimAmort2 = DimAmort * DimVarB;
    DimAmort2 = DimAmort2 - DimAmount;
    DimAmort = DimAmort / 2;
	
	this.document.write(DimAmort + "<br />");
	
	
	
	this.document.write("<table border = '1'>");
	var DimPrin = 0;
	var runBal = 32000;
	
	for (var i=0; i<(DimVarB * 2); i++) {
	
		var DimMod = i % 2;
		if (DimMod == 0){
			DimAmount = DimAmount - (DimPrin * 2);}
			
			var DimInt = DimAmount * DimVarE;
			DimInt = DimInt / 12;
			DimInt = DimInt / 2;
			var DimGRT = DimInt * 0.05;
			var FinalAmort = DimAmort + DimGRT;
			DimPrin = DimAmort - DimInt;
			runBal = runBal - DimPrin;
		
			this.document.write("<tr>");
			this.document.write("<td>" + DimPrin.toFixed(2) + "</td>");
			this.document.write("<td>" + DimInt.toFixed(2) + "</td>");
			this.document.write("<td>" + DimGRT.toFixed(2) + "</td>");
			this.document.write("<td>" + runBal.toFixed(2) + "</td>");
			this.document.write("<td>" + (i + 1) + "</td>");
			this.document.write("</tr>");
	}
	
	this.document.write("</table>");
	this.document.write(DimTerms.toFixed(2) + "\n" + "100 <br />");
	this.document.write(DimGRT.toFixed(2) + "<br />");
	this.document.write(DimPrin.toFixed(2) + "<br />");
	this.document.write(FinalAmort.toFixed(2) + "<br />");
	this.document.write(DimMod.toFixed(2) + "<br />");
	
	this.document.close();
	
	}
</script>
	
	<input type="button" value="Click" onclick="AMortFactor()" />
</body>
</html>
