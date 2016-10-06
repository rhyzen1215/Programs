<?Php
 include 'CIFconnect.php';
 setcookie("LogInUser","",time(),"/Queencard");
 $_SESSION['CurUser'] = $Muser;
?>
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
            <td width="478"><div align="center"><span class="style3">QUEENBANK Customer Information File (CIF)</span></div></td>
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
            <td width="713">
			<table width="454" cellpadding="0" cellspacing="0">
                <tr>
				  <form name="form1">
                  <td width="176" height="20"><div align="right" class="style13 style2"><font face="Century Gothic">Branch Code :</font></div></td>
                  <th width="276"><div align="left"><input name="BranchCode" id="Principal" style="text-align:right;"  type="text"  size="20" value="" />
				  <input name="Submit" id="Submit" type="Submit" onclick="javascript: form1.action='UpdateCIF.php'; form1.method='GET';" value="Submit" />
				  <input name="SearchText" type="hidden"  size="20" value="" />
				  </div></th>
				  </form>
                </tr>
				
				<tr>
                  <td width="176" height="20">&nbsp;</td>
                  <th width="276"><div align="left"></div></th>
                </tr>
				
				<tr>
                  <td width="176" height="20">&nbsp;</td>
                  <th width="276"><div align="left"></div></th>
                </tr>
				
            </table></td>
          </tr>
          <tr height="15"> </tr>
        </table>
		

</body>
</html>