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
				
	var LAmnt = 20000;
	var Irate = 0.12;
	var ITerms = 12;
	var xTerm = 0;
	
	var TermCnt = ITerms * 2;
	
	var DimRate = parseFloat(Irate) / 12;
	var DimVar0 = parseFloat(DimRate) + 1;
	var DimVar1 = DimVar0;
	DimVar1 = DimRate + 1;
	var DimVar2 = 0;
	var DimAmort = 0;
	DimVar1 = 1;
	
	Iterms = ITerms + xTerm;
	
	this.document.write(DimRate + "<br />");
	this.document.write(DimVar0 + "<br />");
	this.document.write(DimVar1 + "<br />");
	
	
	
	
	do {
		DimVar1 = DimVar1 / DimVar0;
		DimVar2 = DimVar2 + DimVar1;
		xTerm = xTerm + 1;
	}
	while (xTerm < TermCnt);
	
	this.document.write(DimVar2 + "<br />");
	
	DimAmort = LAmnt / DimVar2;
	
	this.document.write(DimAmort + "<br />");
	
	this.document.close();
	
	}
</script>
	
	<input type="button" value="Click" onclick="AMortFactor()" />
</body>
</html>
