	<?Php
		
			include 'Connect.php';
			$BorrID = "";
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

	?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Employee Record</title>
</head>

<style type="text/css">

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
		<tr><th width="645" align="left">Personal Information</th></tr>
		<tr>
		<td align="right">Borrower No.:
		<input id="inputColor" type="text" value="<?Php echo $BorrID; ?>" name="BorrowerNo" size="10" readonly="readonly" />
		</td>
		</tr>
	</table>
	
	
	<hr size="2" width="650" align="left" color="#666666"/>

	<table>
		<tr><td height="20"></td></tr>
		<tr><td><font color="#990000"><i>Personal Details</i></font></td></tr>
	</table>
	<hr size="1" width="650" align="left" />
	<table>
		<tr>
			<td width="135" align="right">Employee No.:</td>
		  <td width="195"><input type="text" size="10"  name="LName" value=""/></td>
	  	  <td width="131" align="right"></td>
		  <td width="140"></td>
		</tr>
		<tr>
			<td width="135" align="right">Last Name:</td>
		  <td width="195"><input type="text" size="30"  name="LName" value=""/></td>
	  	  <td width="131" align="right">Sex:</td>
		  <td width="140"><input type="text" size="20"  name="Sex" value=""/></td>
		</tr>
		<tr>
			<td align="right">First Name:</td>
			<td><input type="text" size="30"  name="FName"  value=""/></td>
			<td align="right">Age:</td>
			<td><input type="text" size="20"  name="Age" value=""/></td>
		</tr>
		<tr>
			<td align="right">Middle Name:</td>
			<td><input type="text" size="30"  name="MName" value=""/></td>
			<td align="right">Civil Status:</td>
			<td><input type="text" size="20" name="CivilStatus" value=""/></td>
		</tr>
		
		<tr>
			<td align="right">Birth Place:</td>
			<td><input type="text" size="30"  name="BPlace" value=""/></td>
			<td align="right">No of Children:</td>
			<td><input type="text" size="20" name="Religion" value=""/></td>
		</tr>
		
		<tr>
			<td align="right">Birth Date:</td>
			<td><input type="date" size="20"  name="BDate" value=""/></td>
			
			<td align="right">Ages:</td>
			<td><input type="text" size="20" name="Citizenship" value=""/></td>
		</tr>
		
	</table>
	
	<table>
		<tr><td height="20"></td></tr>
		<tr><td><font color="#990000"><i>Contact Details</i></font></td></tr>
	</table>
	<hr size="1" width="650" align="left" />
	
	<table>
		<tr>
			<td width="135" align="right">Present Address:</td>
		    <td width="473"><input type="text" size="75" name="PresentAdd" value=""/></td>
		</tr>
	</table>
	
	<table>
		<tr>
			<td width="136" align="right">Telephone No.:</td>
		    <td width="196"><input type="text" size="30" name="PresentTel" value=""/></td>
		  	<td width="131" align="right">Postal Code:</td>
		    <td width="135"><input type="text" size="20" name="PresentPostal" value="" /></td>
		</tr>
	</table>
	
	<table>
		<tr>
		   <td width="137" align="right">Provincial Address:</td>
		   <td width="471"><input type="text" size="75" name="ProvAdd" value=""/></td>
		</tr>
	</table>
	
	<table>
		<tr>
			<td width="135" align="right">Telephone No.:</td>
	        <td width="197"><input type="text" size="30" name="ProvTel" value="" /></td>
		  	<td width="131" align="right">Postal Code:</td>
		    <td width="137"><input type="text" size="20" name="ProvPostal" value=""/></td>
		</tr>
	</table>
	
	
	<table>
		<tr>
			<td width="262" align="right">Do you own your Residence?:</td>
	        <td width="72"><input type="text" size="10" name="OwnRes"  value=""/></td>
		  	<td width="164" align="right">If Not, Monthly Rental:</td>
		    <td width="101"><input type="text" size="15" name="MRental" value=">"/></td>
		</tr>
		<tr>
			<td width="262" align="right">Are you a Depositor of the Bank?:</td>
	        <td width="72"><input type="text" size="10" name="BankDep"  value=""/></td>
		  	<td width="164" align="right">If Yes, Account Number:</td>
		    <td width="101"><input type="text" size="15" name="AccntNumber" value=""/></td>
		</tr>
		<tr>
			<td width="262" align="right"></td>
	        <td width="72"></td>
		  	<td width="164" align="right">Latest Balance:</td>
		    <td width="101"><input type="text" size="15" name="LatestBal"  value=""/></td>
		</tr>
	</table>
	
	<hr size="1" width="650" align="left" />
	<table>
		<tr>
			<td width="167" align="right">Educational Background:</td>
	      <td width="438"><input type="text" size="70" name="EducBack"  value=""/></td>
		</tr>
	</table>
	
	<hr size="1" width="650" align="left" />
	
	<table>
		<tr>
			<td width="135" align="right">TIN:</td>
		    <td width="197"><input type="text" size="30" name="TIN"  value=""/></td>
		  	<td width="131" align="right">SSS No.:</td>
		    <td width="136"><input type="text" size="20" name="SSS" value=""/></td>
		</tr>
		<tr>
			<td width="135" align="right">HDMF No.:</td>
		    <td width="197"><input type="text" size="30" name="HDMF"  value=""/></td>
		  	<td width="131" align="right">Philhealth No.:</td>
		    <td width="136"><input type="text" size="20" name="PhilHealth" value=""/></td>
		</tr>
	</table>
	<hr size="1" width="650" align="left" />
	
	<table>
		<tr>
			<td width="135" align="right">Spouse Name:</td>
		    <td width="196"><input type="text" size="30" name="SpouseName" value=""/></td>
		  	<td width="133" align="right">Spouse Occupation:</td>
		    <td width="135"><input type="text" size="20" name="SpouseOccupation" value="" /></td>
		</tr>
		<tr>
			<td width="135" align="right">Spouse Place of Work:</td>
		    <td width="196"><input type="text" size="30" name="SpouseWorkplace" value=""/></td>
		  	<td width="133" align="right">Telephone No.:</td>
		    <td width="135"><input type="text" size="20" name="SpouseTel" value=""/></td>
		</tr>
		<tr>
			<td width="135" align="right">Date Married:</td>
		    <td width="196"><input type="text" size="30" name="DateMarried" value=""/></td>
		  	<td width="133" align="right"></td>
		    <td width="135"></td>
		</tr>
	</table>
	
	
	<table>
		<tr><td height="20"></td></tr>
		<tr><td><font color="#990000"><i>Employment Details</i></font></td></tr>
	</table>
	<hr size="1" width="650" align="left" />
	
	<table width="658">
		<tr>
			<td width="145" align="right">Employer Name:</td>
          <td width="188"><input type="text" size="30" name="EmployerName" /></td>
			<td width="134" align="right">Position:</td>
          <td width="171"><input type="text" size="20"  name="Position"/></td>
		</tr>
		<tr>
			<td width="145" align="right">Company Name:</td>
          <td width="188"><input type="text" size="30" name="CompName" /></td>
			<td width="134" align="right">If Others:</td>
          <td width="171"><input type="text" size="20"  name="OtherComp"/></td>
		</tr>
		<tr>
			<td width="145" align="right">Company Address:</td>
          <td width="188"><input type="text" size="30" name="CompAdd" /></td>
			<td width="134" align="right">Station:</td>
          <td width="171"><input type="text" size="20" name="Station" /></td>
		</tr>
		
		<tr>
			<td width="145" align="right">Lenght of Service:</td>
          <td width="188"><input type="text" size="30" name="LService" /></td>
			<td width="134" align="right">Gross Salary:</td>
          <td width="171"><input type="text" size="20"  name="GrossSal"/></td>
		</tr>
		
		<tr>
			<td width="145" align="right">Employemnt Status:</td>
          <td width="188"><input type="text" size="30" name="EmpStatus" /></td>
			<td width="134" align="right">Net Salary:</td>
          <td width="171"><input type="text" size="20"  name="NetSal"/></td>
		</tr>
	</table>

	
	
	<table>
		<tr><td height="20"></td></tr>
		<tr><td><font color="#990000"><i>Income Source</i></font></td></tr>
	</table>
	<hr size="1" width="650" align="left" />
	
	<table width="658">
		<tr>
			<td width="145" align="right">Gross Monthly Income:</td>
          <td width="188"><input type="text" size="30"  name="GrossIncome"/></td>
			<td width="134" align="right"></td>
          <td width="171"></td>
		</tr>
	</table>
	
	<table>
		<tr><td height="20"></td></tr>
		<tr><td><font color="#990000"><i>Monthly Living Expenses</i></font></td></tr>
	</table>
	<hr size="1" width="650" align="left" />
	<table width="640">
		<tr>
		  <td width="182" align="right">Transportation:</td>
          <td width="104"><input type="text" size="12"  name="Transpo"/></td>
		  <td width="228" align="right">Medical Expenses:</td>
          <td width="124"><input type="text" size="12"  name="Medical"/></td>
		</tr>
		<tr>
		  <td width="182" align="right">House rental/Amortization:</td>
          <td width="104"><input type="text" size="12"  name="HouseRental" /></td>
		  <td width="228" align="right">Recreation Expenses:</td>
          <td width="124"><input type="text" size="12" name="Recreaction" /></td>
		</tr>
		
		<tr>
		  <td width="182" align="right">Education:</td>
          <td width="104"><input type="text" size="12" name="Education" /></td>
		  <td width="228" align="right">Other Expenses (food,clothing,etc.):</td>
          <td width="124"><input type="text" size="12"  name="OtherExpense"/></td>
		</tr>
		
	</table>

	

	<hr size="2" width="650" align="left" color="#666666"/>
	
	<table width="701">
		<tr>
			<td width="500"></td>
	        <td><input type="Reset" value="Reset"  /> <input type="Submit" value="Save"  name="btnSave" onclick="javascript: frmPersonal.action='Personal.php'; frmPersonal.method='POST';"/></td>
		</tr>	
	</table>
	</form>

</body>
</html>
