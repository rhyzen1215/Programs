	<?Php
		
		include 'DBConnect.php';
		$empID = "";
		$PresentAdd = "";
		$PresentTel = "";
		$PresentPostal = "";
		$ProvAdd = "";
		$ProvTel = "";
		$ProvPostal = "";
		$SpouseName = "";
		$SpouseOccupation = "";
		$SpouseWorkplace = "";
		$SpouseTel = "";
		$DateMarried = "";
		$TIN = "";
		$SSS = "";
		$HDMF = "";
		$PhilHealth = "";
		$LanguageSpeak = "";
		$LanguageRead = "";
		$LanguageWrite = "";
		
		$EmpCheck = "";
		$UpdateStat = "";
		
		if (isset($_REQUEST['btnSaveInfo'])){
			
			$empID = $_REQUEST['EID'];
			$PresentAdd = $_REQUEST['PresentAdd'];
			$PresentTel = $_REQUEST['PresentTel'];
			$PresentPostal = $_REQUEST['PresentPostal'];
			$ProvAdd = $_REQUEST['ProvAdd'];
			$ProvTel = $_REQUEST['ProvTel'];
			$ProvPostal = $_REQUEST['ProvPostal'];
			$SpouseName = $_REQUEST['SpouseName'];
			$SpouseOccupation = $_REQUEST['SpouseOccupation'];
			$SpouseWorkplace = $_REQUEST['SpouseWorkplace'];
			$SpouseTel = $_REQUEST['SpouseTel'];
			$DateMarried = $_REQUEST['DateMarried'];
			$TIN = $_REQUEST['TIN'];
			$SSS = $_REQUEST['SSS'];
			$HDMF = $_REQUEST['HDMF'];
			$PhilHealth = $_REQUEST['PhilHealth'];
			
			$sql = "Select * From Employee where employeeid = '".$empID."'";
			$rs=odbc_exec($conn,$sql) or die("Error in query");	
			while (odbc_fetch_row($rs)) {$EmpCheck = "1";}
			
			if ($EmpCheck == "1") {
				$sql1 = "Update PersonalData set PresentAdd = '".$PresentAdd."', Pre_Telephone = '".$PresentTel."', Pre_Postal = '".$PresentPostal."', ProvincialAdd = '".$ProvAdd."', Pro_Telephone = '".$ProvTel."', Pro_Postal = '".$ProvPostal."', SpouseName = '".$SpouseName."', SpouseOccupation = '".$SpouseOccupation."', Spouse_Workplace = '".$SpouseWorkplace."', Spouse_Telephone = '".$SpouseTel."', DateMarried = '".$DateMarried."', TIN = '".$TIN."', SSS = '".$SSS."', HDMF = '".$HDMF."', PhilHealth = '".$PhilHealth."' where employeeno = '".$empID."'";
				$rs1=odbc_exec($conn,$sql1) or die("Error in query");	
				
				$UpdateStat = "1";
			}
		}
		
		
		
		if (isset($_REQUEST['EID'])){
			$empID = $_REQUEST['EID'];
			$sql1 = "Select * From PersonalData where employeeno = '".$empID."'";
			$rs1=odbc_exec($conn,$sql1) or die("Error in query");	
				$PresentAdd = odbc_result($rs1,"PRESENTADD");
				$PresentTel = odbc_result($rs1,"PRE_TELEPHONE");
				$PresentPostal = odbc_result($rs1,"PRE_POSTAL");
				$ProvAdd = odbc_result($rs1,"PROVINCIALADD");
				$ProvTel = odbc_result($rs1,"PRO_TELEPHONE");
				$ProvPostal = odbc_result($rs1,"PRO_POSTAL");
				$SpouseName = odbc_result($rs1,"SPOUSENAME");
				$SpouseOccupation = odbc_result($rs1,"SPOUSEOCCUPATION");
				$SpouseWorkplace = odbc_result($rs1,"SPOUSE_WORKPLACE");
				$SpouseTel = odbc_result($rs1,"SPOUSE_TELEPHONE");
				$DateMarried = odbc_result($rs1,"DATEMARRIED");
				$TIN = odbc_result($rs1,"TIN");
				$SSS = odbc_result($rs1,"SSS");
				$HDMF = odbc_result($rs1,"HDMF");
				$PhilHealth = odbc_result($rs1,"PhilHealth");
				$LanguageSpeak = odbc_result($rs1,"LANGUAGE_SPEAK");
				$LanguageRead = odbc_result($rs1,"LANGUAGE_READ");
				$LanguageWrite = odbc_result($rs1,"LANGUAGE_WRITE");
		}
		

	?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Employee Record</title>
</head>

<style type="text/css">

input[type=date]
{
	width: 120px;
	margin-left:2px;
	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;
	border-spacing:inherit;
	padding-left: 2px;
	margin: 2px;
}

select
{
	width: 175px;
	margin-left:2px;
}

input[type=text],select
{
	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;
	border-spacing:inherit;
	padding-left: 2px;
	margin: 2px;
}

select
{
	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;
	border-spacing:inherit;
	padding-left: 2px;
	margin: 2px;
	width:100px;
}


td {

	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;
	color:#000099;
}

th{

	font-family:"Century Gothic";
	font-size:14px;
	font-weight: bold;
	color:#0000FF;
}

</style>

<body>
	
	
	
	<table><tr><th>Contact Details</th></tr></table>
	
	<hr size="2" width="460" align="left" color="#666666"/>
	
	<form>
	<input type="hidden" size="20"  name="EID" value="<?Php echo $empID; ?>"/>
	<table>
		<tr>
			<td width="127" align="right">Present Address:</td>
	      <td width="350"><input type="text" size="50" name="PresentAdd" value="<?Php echo $PresentAdd; ?>"/></td>
		</tr>
	</table>
	
	<table width="489">
		<tr>
			<td width="127" align="right">Telephone No.:</td>
	      <td width="139"><input type="text" size="20" name="PresentTel" value="<?Php echo $PresentTel; ?>"/></td>
		  	<td width="91" align="right">Postal Code:</td>
	      <td width="112"><input type="text" size="10" name="PresentPostal" value="<?Php echo $PresentPostal; ?>" /></td>
		</tr>
</table>
	
	
	<hr size="1" width="490" align="left" />
	<table>
		<tr>
		   <td width="125" align="right">Provincial Address:</td>
	      <td width="352"><input type="text" size="50" name="ProvAdd" value="<?Php echo $ProvAdd; ?>"/></td>
		</tr>
	</table>
	
	<table width="490">
		<tr>
			<td width="125" align="right">Telephone No.:</td>
          <td width="142"><input type="text" size="20" name="ProvTel" value="<?Php echo $ProvTel; ?>" /></td>
		  	<td width="92" align="right">Postal Code:</td>
	      <td width="111"><input type="text" size="10" name="ProvPostal" value="<?Php echo $ProvPostal; ?>"/></td>
		</tr>
</table>

	
	<hr size="1" width="490" align="left" />
	
	<table width="490">
		<tr>
			<td width="75" align="right">TIN:</td>
	      <td width="136"><input type="text" size="20" name="TIN"  value="<?Php echo $TIN; ?>"/></td>
		  	<td width="96" align="right">SSS No.:</td>
	      <td width="163"><input type="text" size="20" name="SSS" value="<?Php echo $SSS; ?>"/></td>
		</tr>
		<tr>
			<td width="75" align="right">HDMF No.:</td>
	      <td width="136"><input type="text" size="20" name="HDMF"  value="<?Php echo $HDMF; ?>"/></td>
		  	<td width="96" align="right">Philhealth No.:</td>
	      <td width="163"><input type="text" size="20" name="PhilHealth" value="<?Php echo $PhilHealth; ?>"/></td>
		</tr>
</table>
	<hr size="1" width="490" align="left" />
	
	<table width="489">
		<tr>
			<td width="145" align="right">Spouse Name:</td>
	      <td width="332"><input type="text" size="30" name="SpouseName" value="<?Php echo $SpouseName; ?>"/></td>
	  </tr>
		<tr>
		  	<td width="145" align="right">Spouse Occupation:</td>
	      <td width="332"><input type="text" size="30" name="SpouseOccupation" value="<?Php echo $SpouseOccupation; ?>" /></td>
		</tr>
		<tr>
			<td width="145" align="right">Spouse Place of Work:</td>
	      <td width="332"><input type="text" size="30" name="SpouseWorkplace" value="<?Php echo $SpouseWorkplace; ?>"/></td>
	  </tr>
		<tr>
		  	<td width="145" align="right">Telephone No.:</td>
			
	      <td width="332"><input type="text" size="30" name="SpouseTel" value="<?Php echo $SpouseTel; ?>"/></td>
		</tr>
		<tr>
			<td width="145" align="right">Date Married:</td>
	      <td width="332"><input type="text" size="20" name="DateMarried" value="<?Php echo $DateMarried; ?>"/> 
		  <input type="submit" value="Save" name="btnSaveInfo" /></td>
		</tr>
</table>
	
	</form>
	<hr size="1" width="490" align="left" />
	<table><tr><th width="477" align="center"><font color="#FF0000">
	<?Php if ($UpdateStat == "1"){ echo 'Successfully Updated.';  } ?>
	</font></th>
	</tr></table>
	
	

</body>
</html>
