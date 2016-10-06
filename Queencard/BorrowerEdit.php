	<?Php
		
		include 'Connect.php';
		$BorrID = "";
		
		$empID = "";
		$FName = "";
		$MName = "";
		$LName = "";
		$BDate = "";
		$BPlace = "";
		$Sex = "";
		$Age = "";
		$Company = "";
		$Company2 = "";
		$Station = "";
		$Salary = "";
		$NetSal = "";
		$Position = "";
		$Status = "";
		$CivilStatus = "";
		$SpouseName = "";
		$NoChildren = "";
		$Ages = "";
		$TelNo = "";
		$ResidenceAdd = "";
		$ResOwner = "";
		$Rental = "";
		$Depositor = "";
		$BankAccount ="";
		$LatestBalance = "";
		$Education = "";
		$Employer = "";
		$CompanyAdd = "";
		$Service = "";
		$TIN = "";
		$SSS = "";
		$HDMF = "";
		$PhilHealth = "";
		$Postal = "";
		$SpouseOccupation = "";
		$SpousePlacework = "";
		$SpouseTelephone = "";
		$DateMarried = "";
		$GrossIncome = "";
		$TranspoExpense = "";
		$HouseExpense = "";
		$EduExpense = "";
		$MedicalExpense = "";
		$RecExpense = "";
		$OtherExpense = "";
		$SpouseIncome = "";
		$OtherIncome = "";
		$OtherExistExpense = "";
		
			$sql = "Select top (1) borrowerno From Borrower order by borrowerno desc";
			$rs=odbc_exec($conn,$sql) or die("Error in query");	
			$BorrID = odbc_result($rs,"borrowerno");	
			$BorCode = substr($BorrID,3,4);
			$BorCode = $BorCode + 1;
			$CodeLen = strlen($BorCode);
			if ($CodeLen == 1 ) { $BorrID = "QC000".$BorCode; }
			else if ($CodeLen == 2 ) { $BorrID = "QC00".$BorCode; }
			else if ($CodeLen == 3 ) { $BorrID = "QC0".$BorCode; }
			else if ($CodeLen == 4 ) { $BorrID = "QC".$BorCode; }
		
		if (isset($_REQUEST['btnPersonal'])){
			$BorrID = $_REQUEST['BorrowerNo'];
			$empID = $_REQUEST['employeeno'];
			$FName = $_REQUEST['FName'];
			$MName = $_REQUEST['MName'];
			$LName = $_REQUEST['LName'];
			$Age = $_REQUEST['Age'];
			$Sex = $_REQUEST['Sex'];
			$BPlace = $_REQUEST['BPlace'];
			$BDate = $_REQUEST['BDate']; 
			$CivilStatus = $_REQUEST['CivilStatus'];
			$NoChildren = $_REQUEST['noChildren'];
			$Ages = $_REQUEST['Ages'];
			$sql = "UPDATE BORROWER SET EMPLOYEENO = '".$empID."', FIRSTNAME = '".$FName."', MI = '".$MName."', LASTNAME = '".$LName."', AGE = '".$Age."', SEX = '".$Sex."', BIRTHDATE = '".$BDate."', BIRTHPLACE = '".$BPlace."', CIVILSTATUS = '".$CivilStatus."', NOCHILDREN = '".$NoChildren."', AGES = '".$Ages."' WHERE BORROWERNO = '".$BorrID."'"; $rs=odbc_exec($conn,$sql) or die("Error in query");
			
		}
		
		
		if (isset($_REQUEST['btnContact'])){
			$BorrID = $_REQUEST['BorrowerNo'];
			$TelNo = $_REQUEST['TelNo'];
			$ResidenceAdd = $_REQUEST['ResidenceAdd'];
			$ResOwner = $_REQUEST['ResOwner'];
			$Rental = $_REQUEST['Rental'];
			$Depositor = $_REQUEST['Depositor'];
			$BankAccount = $_REQUEST['BankAccount'];
			$LatestBalance = $_REQUEST['LatestBalance'];
			$Postal = $_REQUEST['Postal'];
			$Education = $_REQUEST['Education'];
			$TIN = $_REQUEST['TIN'];
			$SSS = $_REQUEST['SSS'];
			$HDMF = $_REQUEST['HDMF'];
			$PhilHealth = $_REQUEST['PhilHealth'];
			$SpouseName = $_REQUEST['SpouseName'];
			$SpouseOccupation = $_REQUEST['SpouseOccupation'];
			$SpousePlacework = $_REQUEST['SpousePlacework'];
			$SpouseTelephone = $_REQUEST['SpouseTelephone'];
			$DateMarried = $_REQUEST['DateMarried'];
			$SpouseIncome = $_REQUEST['SpouseIncome'];
			
			$sql = "UPDATE BORROWER SET TelNo = '".$TelNo."', ResidenceAdd = '".$ResidenceAdd."', ResOwner = '".$ResOwner."', Rental = '".$Rental."', Depositor = '".$Depositor."', BankAccount = '".$BankAccount."', LatestBalance = '".$LatestBalance."', Postal = '".$Postal."', Education = '".$Education."', TIN = '".$TIN."', SSS = '".$SSS."', HDMF = '".$HDMF."', PhilHealth = '".$PhilHealth."', SpouseName = '".$SpouseName."', SpouseOccupation = '".$SpouseOccupation."', SpousePlacework = '".$SpousePlacework."' , SpouseTelephone = '".$SpouseTelephone."', DateMarried = '".$DateMarried."', SpouseIncome = '".$SpouseIncome."' WHERE BORROWERNO = '".$BorrID."'"; $rs=odbc_exec($conn,$sql) or die("Error in query");
			
		}
		
			
		if (isset($_REQUEST['btnEmployment'])){
			$BorrID = $_REQUEST['BorrowerNo'];
			$Employer =$_REQUEST['Employer'];
			$CompanyAdd = $_REQUEST['CompanyAdd'];
			$Service = $_REQUEST['Service'];
			$Company = $_REQUEST['Company'];
			$Company2 = $_REQUEST['Company2'];
			$Station = $_REQUEST['Station'];
			$Position = $_REQUEST['Position'];
			$Salary = $_REQUEST['Salary'];
			$NetSal = $_REQUEST['NetSal'];
			
			$sql = "UPDATE BORROWER SET Employer = '".$Employer."', CompanyAdd = '".$CompanyAdd."', Service = '".$Service."', Company = '".$Company."', Company2 = '".$Company2."', Station = '".$Station."', Position = '".$Position."', Salary = '".$Salary."', NetSal = '".$NetSal."' WHERE BORROWERNO = '".$BorrID."'"; $rs=odbc_exec($conn,$sql) or die("Error in query");
			
		}
		
			
		if (isset($_REQUEST['btnIncome'])){
			$BorrID = $_REQUEST['BorrowerNo'];
			$GrossIncome = $_REQUEST['GrossIncome'];
			$OtherIncome = $_REQUEST['OtherIncome'];

			$sql = "UPDATE BORROWER SET GrossIncome = '".$GrossIncome."', OtherIncome = '".$OtherIncome."' WHERE BORROWERNO = '".$BorrID."'"; 
			$rs=odbc_exec($conn,$sql) or die("Error in query");
			
		}
		
		if (isset($_REQUEST['btnIncome2'])){
			$BorrID = $_REQUEST['BorrowerNo'];
			$GrossIncome2 = $_REQUEST['GrossIncome2'];
			$OtherIncome2 = $_REQUEST['OtherIncome2'];

			$sql = "UPDATE BORROWER SET GrossIncome2 = '".$GrossIncome2."', OtherIncome2 = '".$OtherIncome2."' WHERE BORROWERNO = '".$BorrID."'"; 
			$rs=odbc_exec($conn,$sql) or die("Error in query");
			
		}
		
		
		if (isset($_REQUEST['btnExpense'])){
			$BorrID = $_REQUEST['BorrowerNo'];
			$TranspoExpense = $_REQUEST['TranspoExpense'];
			$HouseExpense = $_REQUEST['HouseExpense'];
			$EduExpense = $_REQUEST['EduExpense'];
			$MedicalExpense = $_REQUEST['MedicalExpense'];
			$RecExpense = $_REQUEST['RecExpense'];
			$OtherExpense = $_REQUEST['OtherExpense'];
			$OtherExistExpense = $_REQUEST['OtherExistExpense'];

			$sql = "UPDATE BORROWER SET TranspoExpense = '".$TranspoExpense."', HouseExpense = '".$HouseExpense."', EduExpense = '".$EduExpense."', MedicalExpense = '".$MedicalExpense."', RecExpense = '".$RecExpense."', OtherExpense = '".$OtherExpense."', OtherExistExpense = '".$OtherExistExpense."' WHERE BORROWERNO = '".$BorrID."'";
			$rs=odbc_exec($conn,$sql) or die("Error in query");
			
		}
		
		if (isset($_REQUEST['btnExpense2'])){
			$BorrID = $_REQUEST['BorrowerNo'];
			$TranspoExpense2 = $_REQUEST['TranspoExpense2'];
			$HouseExpense2 = $_REQUEST['HouseExpense2'];
			$EduExpense2 = $_REQUEST['EduExpense2'];
			$MedicalExpense2 = $_REQUEST['MedicalExpense2'];
			$RecExpense2 = $_REQUEST['RecExpense2'];
			$OtherExpense2 = $_REQUEST['OtherExpense2'];
			$OtherExistExpense2 = $_REQUEST['OtherExistExpense2'];

			$sql = "UPDATE BORROWER SET TranspoExpense2 = '".$TranspoExpense2."', HouseExpense2 = '".$HouseExpense2."', EduExpense2 = '".$EduExpense2."', MedicalExpense2 = '".$MedicalExpense2."', RecExpense2 = '".$RecExpense2."', OtherExpense2 = '".$OtherExpense2."', OtherExistExpense2 = '".$OtherExistExpense2."' WHERE BORROWERNO = '".$BorrID."'";
			$rs=odbc_exec($conn,$sql) or die("Error in query");
			
		}
		
		
		
		if ((isset($_GET['submitBor'])) || (isset($_GET['btnPersonal'])) || (isset($_GET['btnContact'])) || (isset($_GET['btnEmployment'])) || (isset($_GET['btnIncome'])) || (isset($_GET['btnIncome2'])) || (isset($_GET['btnExpense'])) || (isset($_GET['btnExpense2']))){
			if (isset($_GET['submitBor'])) { $BorrID = $_REQUEST['searchBorrower']; }
			else {$BorrID = $_REQUEST['BorrowerNo'];}
			
			$sql1 = "Select * From Borrower where borrowerno = '".$BorrID."'";
			$rs1=odbc_exec($conn,$sql1) or die("Error in query");	
			$empID = odbc_result($rs1,"employeeno");
			$FName = odbc_result($rs1,"Firstname");
			$MName = odbc_result($rs1,"MI");
			$LName = odbc_result($rs1,"lastname");
			$Age = odbc_result($rs1,"Age");
			$Sex = odbc_result($rs1,"sex");
			$Company = odbc_result($rs1,"Company");
			$Company2 = odbc_result($rs1,"Company2");
			$Salary = odbc_result($rs1,"Salary");
			$NetSal = odbc_result($rs1,"NetSal");
			$BPlace = odbc_result($rs1,"BirthPlace");
			$BDate = odbc_result($rs1,"BirthDate");
			$BDate = date_create($BDate);
			$BDate = date_format($BDate,"Y-m-d");
			$Station = odbc_result($rs1,"Station");
			$Position = odbc_result($rs1,"Position");
			$Status = odbc_result($rs1,"Status");
			$CivilStatus = odbc_result($rs1,"CivilStatus");
			$SpouseName = odbc_result($rs1,"SpouseName");
			$NoChildren = odbc_result($rs1,"NoChildren");
			$Ages = odbc_result($rs1,"Ages");
			$TelNo = odbc_result($rs1,"TelNo");
			$ResidenceAdd = odbc_result($rs1,"ResidenceAdd");
			$ResOwner = odbc_result($rs1,"ResOwner");
			$Rental = odbc_result($rs1,"Rental");
			$Depositor = odbc_result($rs1,"Depositor");
			$BankAccount = odbc_result($rs1,"BankAccount");
			$LatestBalance = odbc_result($rs1,"LatestBalance");
			$Education = odbc_result($rs1,"Education");
			$Employer = odbc_result($rs1,"Employer");
			$CompanyAdd = odbc_result($rs1,"CompanyAdd");
			$Service = odbc_result($rs1,"Service");
			$Postal = odbc_result($rs1,"Postal");
			$TIN = odbc_result($rs1,"TIN");
			$SSS = odbc_result($rs1,"SSS");
			$HDMF =odbc_result($rs1,"HDMF");
			$PhilHealth = odbc_result($rs1,"PhilHealth");
			$SpouseOccupation = odbc_result($rs1,"SpouseOccupation");
			$SpousePlacework = odbc_result($rs1,"SpousePlacework");
			$SpouseTelephone = odbc_result($rs1,"SpouseTelephone");
			$DateMarried = odbc_result($rs1,"DateMarried");
			$GrossIncome = odbc_result($rs1,"GrossIncome");
			$TranspoExpense = odbc_result($rs1,"TranspoExpense");
			$HouseExpense = odbc_result($rs1,"HouseExpense");
			$EduExpense = odbc_result($rs1,"EduExpense");
			$MedicalExpense = odbc_result($rs1,"MedicalExpense");
			$RecExpense = odbc_result($rs1,"RecExpense");
			$OtherExpense = odbc_result($rs1,"OtherExpense");
			$SpouseIncome = odbc_result($rs1,"SpouseIncome");
			$OtherIncome = odbc_result($rs1,"OtherIncome");
			$OtherExistExpense = odbc_result($rs1,"OtherExistExpense");
			
			$GrossIncome2 = odbc_result($rs1,"GrossIncome2");
			$TranspoExpense2 = odbc_result($rs1,"TranspoExpense2");
			$HouseExpense2 = odbc_result($rs1,"HouseExpense2");
			$EduExpense2 = odbc_result($rs1,"EduExpense2");
			$MedicalExpense2 = odbc_result($rs1,"MedicalExpense2");
			$RecExpense2 = odbc_result($rs1,"RecExpense2");
			$OtherExpense2 = odbc_result($rs1,"OtherExpense2");
			$OtherIncome2 = odbc_result($rs1,"OtherIncome2");
			$OtherExistExpense2 = odbc_result($rs1,"OtherExistExpense2");
			}
			
	
	?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Employee Record</title>
</head>

<style type="text/css">
a {text-decoration:none;}
#inputColor {
	font-family:"Century Gothic";
	color:#990000;
	}
	
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
	color:#000066;
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
	color:#000066;
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
		<tr><th width="645" align="left">Personal Information</th></tr>
		<tr>
		<td align="right">Borrower No.:
		<input id="inputColor" type="text" value="<?Php echo $BorrID; ?>" name="BorrowerNo" size="10" readonly="readonly" />
		</td>
		</tr>
	</table>
	</form>
	
	
	<hr size="2" width="650" align="left" color="#666666"/>
	<form name="frmPersonal">
	<input type="hidden" value="<?Php echo $BorrID; ?>" name="BorrowerNo" />
	<table>
		<tr><td height="20"></td></tr>
		<tr><td><font color="#990000"><i>Personal Details</i></font></td></tr>
	</table>
	<hr size="1" width="650" align="left" />
	<table>
		<tr>
			<td width="135" align="right">Employee No.:</td>
		  <td width="195"><input type="text" size="10"  name="employeeno" value="<?Php echo $empID; ?>"/></td>
	  	  <td width="131" align="right"></td>
		  <td width="140"></td>
		</tr>
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
			<td align="right">Civil Status:</td>
			<td><input type="text" size="20" name="CivilStatus" value="<?Php echo $CivilStatus; ?>"/></td>
		</tr>
		
		<tr>
			<td align="right">Birth Place:</td>
			<td><input type="text" size="30"  name="BPlace" value="<?Php echo $BPlace; ?>"/></td>
			<td align="right">No of Children:</td>
			<td><input type="text" size="20" name="noChildren" value="<?Php echo $NoChildren; ?>"/></td>
		</tr>
		
		<tr>
			<td align="right">Birth Date:</td>
			<td><input type="date" size="20"  name="BDate" value="<?Php echo $BDate; ?>"/></td>
			
			<td align="right">Ages:</td>
			<td><input type="text" size="20" name="Ages" value="<?Php echo $Ages; ?>"/></td>
		</tr>

		<tr>
			<td height="10"></td><td></td><td></td><td></td>
		</tr>
		<tr>
			<td align="right"></td>
			<td align="right"></td>
			<td align="right" id="inputColor"><?Php if (isset($_REQUEST['btnPersonal'])){ echo 'Successfully Updated.'; } ?></td>
			<td align="right">
			<input type="submit" name="btnPersonal" value="Save" onclick="javascript: frmPersonal.action='BorrowerEdit.php'; frmPersonal.method='GET';"/></td>
		</tr>
		
	</table>
	</form>
	
	
	
	<table>
		<tr><td height="20"></td></tr>
		<tr><td><font color="#990000"><i>Contact Details</i></font></td></tr>
	</table>
	<hr size="1" width="650" align="left" />
	
	
	<form name="frmContact">
	<input type="hidden" value="<?Php echo $BorrID; ?>" name="BorrowerNo" />
	<table>
		<tr>
		   <td width="137" align="right">Residence Address:</td>
		   <td width="471"><input type="text" size="60" name="ResidenceAdd" value="<?Php echo $ResidenceAdd; ?>"/></td>
		</tr>
	</table>
	
	<table>
		<tr>
			<td width="114" align="right">Telephone No.:</td>
          <td width="228"><input type="text" size="30" name="TelNo" value="<?Php echo $TelNo; ?>" /></td>
		  	<td width="157" align="right">Postal Code:</td>
	      <td width="101"><input type="text" size="15" name="Postal" value="<?Php echo $Postal; ?>"/></td>
		</tr>
	</table>
	
	
	<table>
		<tr>
			<td width="262" align="right">Do you own your Residence?:</td>
	        <td width="72"><input type="text" size="10" name="ResOwner"  value="<?Php echo $ResOwner ?>"/></td>
		  	<td width="164" align="right">If Not, Monthly Rental:</td>
		    <td width="101"><input type="text" size="15" name="Rental" value="<?Php echo $Rental; ?>"/></td>
		</tr>
		<tr>
			<td width="262" align="right">Are you a Depositor of the Bank?:</td>
	        <td width="72"><input type="text" size="10" name="Depositor"  value="<?Php echo $Depositor; ?>"/></td>
		  	<td width="164" align="right">If Yes, Account Number:</td>
		    <td width="101"><input type="text" size="15" name="BankAccount" value="<?Php echo $BankAccount; ?>"/></td>
		</tr>
		<tr>
			<td width="262" align="right"></td>
	        <td width="72"></td>
		  	<td width="164" align="right">Latest Balance:</td>
		    <td width="101"><input type="text" size="15" name="LatestBalance"  value="<?Php echo $LatestBalance; ?>"/></td>
		</tr>
	</table>
	
	
	<hr size="1" width="650" align="left" />
	<table>
		<tr>
			<td width="167" align="right">Educational Background:</td>
	      <td width="438"><input type="text" size="60" name="Education"  value="<?Php echo $Education; ?>"/></td>
		</tr>
	</table>
	
	<hr size="1" width="650" align="left" />
	
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
		    <td width="196"><input type="text" size="30" name="SpousePlacework" value="<?Php echo $SpousePlacework; ?>"/></td>
		  	<td width="133" align="right">Telephone No.:</td>
		    <td width="135"><input type="text" size="20" name="SpouseTelephone" value="<?Php echo $SpouseTelephone; ?>"/></td>
		</tr>
		<tr>
			<td width="135" align="right">Date Married:</td>
		    <td width="196"><input type="text" size="30" name="DateMarried" value="<?Php echo $DateMarried; ?>"/></td>
		  	<td width="133" align="right">Spouse Income:</td>
		    <td width="135"><input type="text" size="20" name="SpouseIncome" value="<?Php echo $SpouseIncome; ?>"/></td>
		</tr>
		
		
		<tr>
			<td height="10"></td><td></td><td></td><td></td>
		</tr>
		<tr>
			<td align="right"></td>
			<td align="right"></td>
			<td align="right" id="inputColor"><?Php if (isset($_REQUEST['btnContact'])){ echo 'Successfully Updated.'; } ?></td>
			<td align="right">
			<input type="submit" name="btnContact" value="Save" onclick="javascript: frmContact.action='BorrowerEdit.php'; frmContact.method='GET';"/></td>
		</tr>
		
	</table>
	</form>
	
	
	
	<form name="btnEmployment">
	<input type="hidden" value="<?Php echo $BorrID; ?>" name="BorrowerNo" />
	<table>
		<tr><td height="20"></td></tr>
		<tr><td><font color="#990000"><i>Employment Details</i></font></td></tr>
	</table>
	<hr size="1" width="650" align="left" />
	
	<table width="668">
		<tr>
			<td width="145" align="right">Employer Name:</td>
          <td width="188"><input type="text" size="30" name="Employer"  value="<?Php echo $Employer; ?>"/></td>
			<td width="134" align="right">Position:</td>
          <td width="181"><input type="text" size="20"  name="Position"  value="<?Php echo $Position; ?>"/></td>
		</tr>
		<tr>
			<td width="145" align="right">Company Name:</td>
          <td width="188"><input type="text" size="30" name="Company" value="<?Php echo $Company; ?>" /></td>
			<td width="134" align="right">If Others:</td>
          <td width="181"><input type="text" size="20"  name="Company2" value="<?Php echo $Company2; ?>"/></td>
		</tr>
		<tr>
			<td width="145" align="right">Company Address:</td>
          <td width="188"><input type="text" size="30" name="CompanyAdd" value="<?Php echo $CompanyAdd; ?>" /></td>
			<td width="134" align="right">Station:</td>
          <td width="181"><input type="text" size="20" name="Station"  value="<?Php echo $Station; ?>"/></td>
		</tr>
		
		<tr>
			<td width="145" align="right">Lenght of Service:</td>
          <td width="188"><input type="text" size="30" name="Service"  value="<?Php echo $Service; ?>"/></td>
			<td width="134" align="right">Gross Salary:</td>
          <td width="181"><input type="text" size="20"  name="Salary" value="<?Php echo $Salary; ?>"/></td>
		</tr>
		
		<tr>
			<td width="145" align="right">Employemnt Status:</td>
          <td width="188"><input type="text" size="30" name="Status" value="<?Php echo $Status; ?>" /></td>
			<td width="134" align="right">Net Salary:</td>
          <td width="181"><input type="text" size="20"  name="NetSal" value="<?Php echo $NetSal; ?>"/></td>
		</tr>
		
		<tr>
			<td height="10"></td><td></td><td></td><td></td>
		</tr>
		<tr>
			<td align="right"></td>
			<td align="right"></td>
			<td align="right" id="inputColor"><?Php if (isset($_REQUEST['btnEmployment'])){ echo 'Successfully Updated.'; } ?></td>
			<td align="right">
			<input type="submit" name="btnEmployment" value="Save" onclick="javascript: btnEmployment.action='BorrowerEdit.php'; btnEmployment.method='GET';"/></td>
		</tr>
		
		
	</table>

	</form>
	
	
	
	<form name="frmIncome">
	<input type="hidden" value="<?Php echo $BorrID; ?>" name="BorrowerNo" />
	<table>
		<tr><td height="20"></td></tr>
		<tr><td><font color="#990000"><i>Income Source</i></font></td></tr>
	</table>
	<hr size="1" width="650" align="left" />
	
	
	<table width="669">
		<tr>
			<td width="145" align="right">Gross Monthly Income:</td>
            <td width="188"><input type="text" size="30"  name="GrossIncome" value="<?Php echo $GrossIncome; ?>"/></td>
			<td width="134" align="right">Other Income:</td>
          <td width="182"><input type="text" size="30"  name="OtherIncome" value="<?Php echo $OtherIncome; ?>"/></td>
		</tr>
		
		<tr>
			<td height="10"></td><td></td><td></td><td></td>
		</tr>
		<tr>
			<td align="right"></td>
			<td align="right"></td>
			<td align="right" id="inputColor"><?Php if (isset($_REQUEST['btnIncome'])){ echo 'Successfully Updated.'; } ?></td>
			<td align="right">
			<input type="submit" name="btnIncome" value="Save" onclick="javascript: frmIncome.action='BorrowerEdit.php'; frmIncome.method='GET';"/></td>
		</tr>
	</table>
	
	</form>
	
	
	
	<form name="frmExpense">
	<input type="hidden" value="<?Php echo $BorrID; ?>" name="BorrowerNo" />
	<table>
		<tr><td height="20"></td></tr>
		<tr><td><font color="#990000"><i>Monthly Living Expenses</i></font></td></tr>
	</table>
	<hr size="1" width="650" align="left" />
	<table width="669">
		<tr>
		  <td width="177" align="right">Transportation:</td>
          <td width="102"><input type="text" size="12"  name="TranspoExpense" value="<?Php echo $TranspoExpense; ?>"/></td>
		  <td width="219" align="right">Medical Expenses:</td>
          <td width="151"><input type="text" size="12"  name="MedicalExpense" value="<?Php echo $MedicalExpense; ?>"/></td>
		</tr>
		<tr>
		  <td width="177" align="right">House rental/Amortization:</td>
          <td width="102"><input type="text" size="12"  name="HouseExpense" value="<?Php echo $HouseExpense; ?>" /></td>
		  <td width="219" align="right">Recreation Expenses:</td>
          <td width="151"><input type="text" size="12" name="RecExpense" value="<?Php echo $RecExpense; ?>" /></td>
		</tr>
		
		<tr>
		  <td width="177" align="right">Education:</td>
          <td width="102"><input type="text" size="12" name="EduExpense" value="<?Php echo $EduExpense; ?>" /></td>
		  <td width="219" align="right">Other Expenses (food,clothing,etc.):</td>
          <td width="151"><input type="text" size="12"  name="OtherExpense" value="<?Php echo $OtherExpense; ?>"/></td>
		</tr>
		
		<tr>
		  <td width="177" align="right">Other Existing Debt Payment:</td>
          <td width="102"><input type="text" size="12" name="OtherExistExpense" value="<?Php echo $OtherExistExpense; ?>" /></td>
		  <td width="219" align="right"><a href="OutstandingObligations.php?BorID=<?Php echo $BorrID; ?>" target="_blank">Outstanding Obligations</a>|</td>
          <td width="151">|<a href="CreditScore.php?BorID=<?Php echo $BorrID; ?>" target="_blank">Credit Score</a></td>
		</tr>
		
		<tr>
			<td height="10"></td><td></td><td></td>
			<td></td>
		</tr>
		<tr>
			<td align="right"></td>
			<td align="right"></td>
			<td align="right" id="inputColor"><?Php if (isset($_REQUEST['btnExpense'])){ echo 'Successfully Updated.'; } ?></td>
			<td align="right">
			<input type="submit" name="btnExpense" value="Save" onclick="javascript: frmExpense.action='BorrowerEdit.php'; frmExpense.method='GET';"/></td>
		</tr>
		
	</table>
    
    
  
    
    
	<form name="frmIncome2">
	<input type="hidden" value="<?Php echo $BorrID; ?>" name="BorrowerNo" />
	<table>
		<tr><td height="20"></td></tr>
		<tr><td><font color="#990000"><i>Income Source (Adjusted)</i></font></td></tr>
	</table>
	<hr size="1" width="650" align="left" />
	
	
	<table width="669">
		<tr>
			<td width="145" align="right">Gross Monthly Income:</td>
            <td width="188"><input type="text" size="30"  name="GrossIncome2" value="<?Php echo $GrossIncome2; ?>"/></td>
			<td width="134" align="right">Other Income:</td>
          <td width="182"><input type="text" size="30"  name="OtherIncome2" value="<?Php echo $OtherIncome2; ?>"/></td>
		</tr>
		
		<tr>
			<td height="10"></td><td></td><td></td><td></td>
		</tr>
		<tr>
			<td align="right"></td>
			<td align="right"></td>
			<td align="right" id="inputColor"><?Php if (isset($_REQUEST['btnIncome2'])){ echo 'Successfully Updated.'; } ?></td>
			<td align="right">
			<input type="submit" name="btnIncome2" value="Save" onclick="javascript: frmIncome.action='BorrowerEdit.php'; frmIncome.method='GET';"/></td>
		</tr>
	</table>
	
	</form>

	
	<form name="frmExpense2">
	<input type="hidden" value="<?Php echo $BorrID; ?>" name="BorrowerNo" />
	<table>
		<tr><td height="20"></td></tr>
		<tr><td><font color="#990000"><i>Monthly Living Expenses (Adjusted)</i></font></td></tr>
	</table>
	<hr size="1" width="650" align="left" />
	<table width="669">
		<tr>
		  <td width="177" align="right">Transportation:</td>
          <td width="102"><input type="text" size="12"  name="TranspoExpense2" value="<?Php echo $TranspoExpense2; ?>"/></td>
		  <td width="219" align="right">Medical Expenses:</td>
          <td width="151"><input type="text" size="12"  name="MedicalExpense2" value="<?Php echo $MedicalExpense2; ?>"/></td>
		</tr>
		<tr>
		  <td width="177" align="right">House rental/Amortization:</td>
          <td width="102"><input type="text" size="12"  name="HouseExpense2" value="<?Php echo $HouseExpense2; ?>" /></td>
		  <td width="219" align="right">Recreation Expenses:</td>
          <td width="151"><input type="text" size="12" name="RecExpense2" value="<?Php echo $RecExpense2; ?>" /></td>
		</tr>
		
		<tr>
		  <td width="177" align="right">Education:</td>
          <td width="102"><input type="text" size="12" name="EduExpense2" value="<?Php echo $EduExpense2; ?>" /></td>
		  <td width="219" align="right">Other Expenses (food,clothing,etc.):</td>
          <td width="151"><input type="text" size="12"  name="OtherExpense2" value="<?Php echo $OtherExpense2; ?>"/></td>
		</tr>
		
		<tr>
		  <td width="177" align="right">Other Existing Debt Payment:</td>
          <td width="102"><input type="text" size="12" name="OtherExistExpense2" value="<?Php echo $OtherExistExpense2; ?>" /></td>
		  <td width="219" align="right"></td>
          <td width="151"></td>
		</tr>
		
		<tr>
			<td height="10"></td><td></td><td></td><td></td>
		</tr>
		<tr>
			<td align="right"></td>
			<td align="right"></td>
			<td align="right" id="inputColor"><?Php if (isset($_REQUEST['btnExpense2'])){ echo 'Successfully Updated.'; } ?></td>
			<td align="right">
			<input type="submit" name="btnExpense2" value="Save" onclick="javascript: frmExpense.action='BorrowerEdit.php'; frmExpense.method='GET';"/></td>
		</tr>
		
	</table>

	

	<hr size="2" width="650" align="left" color="#666666"/>
	
	</form>

</body>
</html>
