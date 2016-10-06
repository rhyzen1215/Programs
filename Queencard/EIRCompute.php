<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
	<script src="EIRCompute.js" type="text/javascript"></script>
	<script src="EIR.js" type="text/javascript"></script>
	<table>
	<tr>
	<td>Principal:</td>
	<td><input type="text" id="LoanAmnt"  /></td>
	<td>Term:</td>
	<td><input type="text" id="LTerms"  /></td>
	</tr>
	
	<tr>
	<td>Interest:</td>
	<td><input type="text" id="IntRate"  /></td>
	<td>Deduction:</td>
	<td><input type="text" id="TotalD"  /></td>
	</tr>
	
	<tr>
	<td>Net Proceeds:</td>
	<td><input type="text" id="NetProc"  /></td>
	<td></td>
	<td></td>
	</tr>
	
	
	<a id="Amortization" href="#" onclick="Amort(); return false;" style="text-decoration:none;">Diminishing</a><br />
	<a id="Amortization" href="#" onclick="AddOn(); return false;" style="text-decoration:none;">Add On</a><br />
	<a id="Amortization" href="#" onclick="Amort3(); return false;" style="text-decoration:none;">Fix</a><br />
	<tr>
	<td>MEIR:</td>
	<td><input type="text" id="MEIR"  /><br /></td>
	<td>EIR:</td>
	<td><input type="text" id="EIR"  size="10"/><br /></td>
	</tr>
	<tr>
	</table>
</body>
</html>
