	<?Php
		
		include 'DBConnect.php';
		$empID = "";
		$FName = "";
		$MName = "";
		$LName = "";
		$BDate = "";
		$BPlace = "";
		$Sex = "";
		$Age = "";
		$CivilStatus = "";
		$Religion = "";
		$Citizenship = "";
		$Height = "";
		$Weight = "";
		$BloodType = "";
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
		
		if (isset($_REQUEST['btnSave'])){
			
			$empID = $_REQUEST['empIDVal'];
			$FName = $_REQUEST['FName'];
			$MName = $_REQUEST['MName'];
			$LName = $_REQUEST['LName'];
			$Sex = $_REQUEST['Sex'];
			$Age = $_REQUEST['Age'];
			$BDate = $_REQUEST['BDate'];
			$BPlace = $_REQUEST['BPlace'];
			
			$CivilStatus = $_REQUEST['CivilStatus'];
			$Religion = $_REQUEST['Religion'];
			$Citizenship = $_REQUEST['Citizenship'];
			$Height = $_REQUEST['Height'];
			$Weight = $_REQUEST['Weight'];
			$BloodType = $_REQUEST['BloodType'];
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
			$LanguageSpeak = $_REQUEST['LanguageSpeak'];
			$LanguageRead = $_REQUEST['LanguageRead'];
			$LanguageWrite = $_REQUEST['LanguageWrite'];
			
			$sql = "Select * From Employee where employeeid = '".$empID."'";
			$rs=odbc_exec($conn,$sql) or die("Error in query");	
			while (odbc_fetch_row($rs)) {$EmpCheck = "1";}
			
			if ($EmpCheck == "1") {

				$sql1 = "Update PersonalData set Firstname = '".$FName."', Middlename = '".$MName."', Lastname = '".$LName."', Birthdate = '".$BDate."', Birthplace = '".$BPlace."', Sex = '".$Sex."', Age = '".$Age."', CivilStatus = '".$CivilStatus."', Religion = '".$Religion."', Citizenship = '".$Citizenship."', Height = '".$Height."', Weight = '".$Weight."', BloodType = '".$BloodType."', PresentAdd = '".$PresentAdd."', Pre_Telephone = '".$PresentTel."', Pre_Postal = '".$PresentPostal."', ProvincialAdd = '".$ProvAdd."', Pro_Telephone = '".$ProvTel."', Pro_Postal = '".$ProvPostal."', SpouseName = '".$SpouseName."', SpouseOccupation = '".$SpouseOccupation."', Spouse_Workplace = '".$SpouseWorkplace."', Spouse_Telephone = '".$SpouseTel."', DateMarried = '".$DateMarried."', TIN = '".$TIN."', SSS = '".$SSS."', HDMF = '".$HDMF."', PhilHealth = '".$PhilHealth."', Language_Speak = '".$LanguageSpeak."', Language_Read = '".$LanguageRead."', Language_Write = '".$LanguageWrite."' where employeeno = '".$empID."'";
				$rs1=odbc_exec($conn,$sql1) or die("Error in query");	
				
				
				echo '<script>'; 
				echo 'alert("Personal Data for Employee Number '.$empID.' was Successfully Saved.")'; 
				echo '</script>';  
			}
		}
		
		
		
		if (isset($_REQUEST['btnSearch'])){
			$empID = $_REQUEST['empID'];
			$sql1 = "Select * From PersonalData where employeeno = '".$empID."'";
			$rs1=odbc_exec($conn,$sql1) or die("Error in query");	
				$FName = odbc_result($rs1,"Firstname");
				$MName = odbc_result($rs1,"Middlename");
				$LName = odbc_result($rs1,"lastname");
				$Sex = odbc_result($rs1,"Sex");
				$Age = odbc_result($rs1,"Age");
				$BDate = odbc_result($rs1,"Birthdate");
				$CivilStatus = odbc_result($rs1,"CivilStatus");
				$BPlace = odbc_result($rs1,"BIRTHPLACE");
				$Religion = odbc_result($rs1,"RELIGION");
				$Citizenship = odbc_result($rs1,"Citizenship");
				$Height = odbc_result($rs1,"Height");
				$Weight = odbc_result($rs1,"Weight");
				$BloodType = odbc_result($rs1,"BLOODTYPE");
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
}

th{

	font-family:"Century Gothic";
	font-size:14px;
	font-weight: bold;
	color:#0000FF;
}

</style>

<body>
	
	<form name="frmSearch">
	<table>
		<tr>
			<th width="430" align="left">Personal Information</th>
			<td align="right">Employee No.: <input type="text" size="7"  name="empID" value="<?Php echo $empID; ?>"/><input type="submit" value="search"  name="btnSearch" onclick="javascript: frmSearch.action='Personal.php'; frmSearch.method='POST';"/></td>
		</tr>
	</table>
	</form>
	
	
	<hr size="2" width="650" align="left" color="#666666"/>
	<form name="frmPersonal">
	<input type="hidden" size="7"  name="empIDVal" value="<?Php echo $empID; ?>"/>
	
	<table>
		<tr>
			<td width="135" align="right">Last Name:</td>
		  <td width="195"><input type="text" size="30"  name="LName" value="<?Php echo $LName; ?>"/></td>
	  	  <td width="131" align="right">Sex:</td>
		  <td width="140"><input type="text" size="20"  name="Sex" value="<?Php echo $Sex; ?>"/></td>
		</tr>
		<tr>
			<td align="right">First Name:</td>
			<td><input type="text" size="30"  name="FName"  value="<?Php echo $FName; ?>"/></td>
			<td align="right">Age:</td>
			<td><input type="text" size="20"  name="Age" value="<?Php echo $Age; ?>"/></td>
		</tr>
		<tr>
			<td align="right">Middle Name:</td>
			<td><input type="text" size="30"  name="MName" value="<?Php echo $MName; ?>"/></td>
			<td align="right">Birth Date:</td>
			<td><input type="date" size="20"  name="BDate" value="<?Php echo $BDate; ?>"/></td>
		</tr>
		
		<tr>
			<td align="right">Birth Place:</td>
			<td><input type="text" size="30"  name="BPlace" value="<?Php echo $BPlace; ?>"/></td>
			<td align="right">Religion:</td>
			<td><input type="text" size="20" name="Religion" value="<?Php echo $Religion; ?>"/></td>
		</tr>
		
		<tr>
			<td align="right">Civil Status:</td>
			<td><input type="text" size="30" name="CivilStatus" value="<?Php echo $CivilStatus; ?>"/></td>
			<td align="right">Citizenship:</td>
			<td><input type="text" size="20" name="Citizenship" value="<?Php echo $Citizenship; ?>"/></td>
		</tr>
		<tr>
			<td align="right">Height:</td>
			<td><input type="text" size="30" name="Height" value="<?Php echo $Height; ?>"/></td>
			<td align="right">Weight:</td>
			<td><input type="text" size="20" name="Weight" value="<?Php echo $Weight; ?>"/></td>
		</tr>
		<tr>
			<td align="right">Blood Type:</td>
			<td><input type="text" size="30" name="BloodType" value="<?Php echo $BloodType; ?>"/></td>
			<td align="right"></td>
			<td></td>
		</tr>
	</table>
	
	<hr size="1" width="650" align="left" />
	
	<table>
		<tr>
			<td width="135" align="right">Present Address:</td>
		    <td width="473"><input type="text" size="75" name="PresentAdd" value="<?Php echo $PresentAdd; ?>"/></td>
		</tr>
	</table>
	
	<table>
		<tr>
			<td width="136" align="right">Telephone No.:</td>
		    <td width="196"><input type="text" size="30" name="PresentTel" value="<?Php echo $PresentTel; ?>"/></td>
		  	<td width="131" align="right">Postal Code:</td>
		    <td width="135"><input type="text" size="20" name="PresentPostal" value="<?Php echo $PresentPostal; ?>" /></td>
		</tr>
	</table>
	
	<table>
		<tr>
		   <td width="137" align="right">Provincial Address:</td>
		   <td width="471"><input type="text" size="75" name="ProvAdd" value="<?Php echo $ProvAdd; ?>"/></td>
		</tr>
	</table>
	
	<table>
		<tr>
			<td width="135" align="right">Telephone No.:</td>
	        <td width="197"><input type="text" size="30" name="ProvTel" value="<?Php echo $ProvTel; ?>" /></td>
		  	<td width="131" align="right">Postal Code:</td>
		    <td width="137"><input type="text" size="20" name="ProvPostal" value="<?Php echo $ProvPostal; ?>"/></td>
		</tr>
	</table>

	
	<table>
		<tr>
			<td width="135" align="right">TIN:</td>
		    <td width="197"><input type="text" size="30" name="TIN"  value="<?Php echo $TIN; ?>"/></td>
		  	<td width="131" align="right">SSS No.:</td>
		    <td width="136"><input type="text" size="20" name="SSS" value="<?Php echo $SSS; ?>"/></td>
		</tr>
		<tr>
			<td width="135" align="right">HDMF No.:</td>
		    <td width="197"><input type="text" size="30" name="HDMF"  value="<?Php echo $HDMF; ?>"/></td>
		  	<td width="131" align="right">Philhealth No.:</td>
		    <td width="136"><input type="text" size="20" name="PhilHealth" value="<?Php echo $PhilHealth; ?>"/></td>
		</tr>
	</table>
	<hr size="1" width="650" align="left" />
	
	<table>
		<tr>
			<td width="135" align="right">Spouse Name:</td>
		    <td width="196"><input type="text" size="30" name="SpouseName" value="<?Php echo $SpouseName; ?>"/></td>
		  	<td width="133" align="right">Spouse Occupation:</td>
		    <td width="135"><input type="text" size="20" name="SpouseOccupation" value="<?Php echo $SpouseOccupation; ?>" /></td>
		</tr>
		<tr>
			<td width="135" align="right">Spouse Place of Work:</td>
		    <td width="196"><input type="text" size="30" name="SpouseWorkplace" value="<?Php echo $SpouseWorkplace; ?>"/></td>
		  	<td width="133" align="right">Telephone No.:</td>
		    <td width="135"><input type="text" size="20" name="SpouseTel" value="<?Php echo $SpouseTel; ?>"/></td>
		</tr>
		<tr>
			<td width="135" align="right">Date Married:</td>
		    <td width="196"><input type="text" size="30" name="DateMarried" value="<?Php echo $DateMarried; ?>"/></td>
		  	<td width="133" align="right"></td>
		    <td width="135"></td>
		</tr>
	</table>
	
	
	<table>
		<tr>
			<td height="20"></td>
		</tr>
		
		<tr>
			<td><font color="#990000"><i>Children/Dependents</i></font></td>
		</tr>
	</table>
	<hr size="1" width="700" align="left" />
	
	<table width="701">
		<tr>
			<td width="51" align="right">Name:</td>
	        <td width="165"><input type="text" size="25"  /></td>
			<td width="94" align="right">Date of Birth:</td>
	        <td width="136"><input type="date" size="10"  /></td>
			<td width="82" align="right">Relationship:</td>
	        <td width="145"><input type="text" size="15"  /></td>
		</tr>
		<tr>
			<td width="51" align="right">Name:</td>
	        <td width="165"><input type="text" size="25"  /></td>
			<td width="94" align="right">Date of Birth:</td>
	        <td width="136"><input type="date" size="10"  /></td>
			<td width="82" align="right">Relationship:</td>
	        <td width="145"><input type="text" size="15"  /></td>
		</tr>
		<tr>
			<td width="51" align="right">Name:</td>
	        <td width="165"><input type="text" size="25"  /></td>
			<td width="94" align="right">Date of Birth:</td>
	        <td width="136"><input type="date" size="10"  /></td>
			<td width="82" align="right">Relationship:</td>
	        <td width="145"><input type="text" size="15"  /></td>
		</tr>
	</table>

	
	<table>
		<tr>
			<td height="20"></td>
		</tr>
		
		<tr>
			<td><font color="#990000"><i>Language/Dialect</i></font></td>
		</tr>
	</table>
	<hr size="1" width="700" align="left" />
	
	<table width="701">
		<tr>
			<td width="51" align="right">Speak:</td>
	        <td width="165"><input type="text" size="20" name="LanguageSpeak" value="<?Php echo $LanguageSpeak; ?>"/></td>
			<td width="51" align="right">Read:</td>
	        <td width="165"><input type="text" size="20" name="LanguageRead" value="<?Php echo $LanguageRead; ?>"/></td>
			<td width="51" align="right">Write:</td>
	        <td width="165"><input type="text" size="20" name="LanguageWrite" value="<?Php echo $LanguageWrite; ?>"/></td>
		</tr>	
	</table>


	
	<hr size="2" width="700" align="left" color="#666666"/>
	
	<table width="701">
		<tr>
			<td width="500"></td>
	        <td><input type="Reset" value="Reset"  /> <input type="Submit" value="Save"  name="btnSave" onclick="javascript: frmPersonal.action='Personal.php'; frmPersonal.method='POST';"/></td>
		</tr>	
	</table>
	</form>

</body>
</html>
