	<?Php
		
		include 'Connect.php';
		
		$BorrID = "";
		$AppName = "";
		$Address = "";
		$Branch = "";
		$Number = "";
		
		$Application = "";
		$Residence = "";
		$Health = "";
		$Credit = "";
		$Experience = "";
		$Employment1 = "";
		$Employment2 = "";
		$Education = "";
		$Stability = "";
		$Salary = "";
		$Dependents = "";
		$Payment = "";
		$Financial = "";
		
		$Ownership = "";
		$Employment = "";
		$Repayment = "";
		
		$TotalScore = "";
		$Standing = "";
		$CreditCheck = "";
		$Reason = "";
		
		

		if (isset($_REQUEST['BorID'])){
			$BorrID = $_REQUEST['BorID'];
		}
		
		$sql = "Select * From Borrower where borrowerno = '".$BorrID."'";
		$rs=odbc_exec($conn,$sql) or die("Error in query");	
		while (odbc_fetch_row($rs)) {
			$empID = odbc_result($rs,"employeeno");
			$AppName = odbc_result($rs,"Firstname")." ".odbc_result($rs,"MI")." ".odbc_result($rs,"Lastname");
			$AppName  = strtoupper($AppName);
			$Address = odbc_result($rs,"ResidenceAdd");
			$Branch = odbc_result($rs,"company");
			$Number = odbc_result($rs,"TelNo");
			
		}
		
		$sql = "Select * From CreditScore where borrowerno = '".$BorrID."'";
		$rs=odbc_exec($conn,$sql) or die("Error in query");	
		while (odbc_fetch_row($rs)) {
			$Application = odbc_result($rs,"Application");
			$Residence = odbc_result($rs,"Residence");
			$Health = odbc_result($rs,"Health");
			$Credit = odbc_result($rs,"Credit");
			$Experience = odbc_result($rs,"Experience");
			$Employment1 = odbc_result($rs,"Employment1");
			$Employment2 = odbc_result($rs,"Employment2");
			$Education = odbc_result($rs,"Education");
			$Stability = odbc_result($rs,"Stability");
			$Salary = odbc_result($rs,"Salary");
			$Dependents = odbc_result($rs,"Dependents");
			$Payment = odbc_result($rs,"Payment");
			$Financial = odbc_result($rs,"Financial");
			$Reason = odbc_result($rs,"Reason");
			
			$Ownership = $Application +	$Residence + $Health + $Credit + $Experience;
			$Employment = $Employment1 + $Employment2 + $Education + $Stability + $Salary;
			$Repayment = $Dependents + $Payment + $Financial;
			
			$TotalScore = $Ownership +  $Employment + $Repayment;
			if ($TotalScore >= 75) { $Standing = "PASS"; }
			else if ($TotalScore <= 74) { $Standing = "FAIL"; }
		}
	
	?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Evaluation Sheet</title>
</head>

<style type="text/css">

input[type=text]
{
	font-family:"Century Gothic";
	font-size:8px;
	font-weight: bold;
	padding-left: 2px;
	color:#000066;
}

select
{
	font-family:"Century Gothic";
	font-size:8px;
	font-weight: bold;
	border-spacing:inherit;
	padding-left: 2px;
	margin: 2px;
	width:100px;
}

#td4 {
	font-family:"Century Gothic";
	font-size:10px;
	font-weight: bold;
	border:#000000 solid 1px ;
	}

#td2 {
	font-family:"Century Gothic";
	font-size:10px;
	font-weight: bold;
	border-bottom:solid 1px #000000;
	border-top:solid 1px #000000;

	 }
	 
#td3 {
	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;

	 }


td {

	font-family:"Century Gothic";
	font-size:10px;
	 }
	 
#td1 {

	font-family:"Century Gothic";
	font-size:10px;
	font-weight: bold;
	 }


th {
	font-family:"Century Gothic";
	font-size:8px;
	font-weight: bold;
     }
	
#th1 {
	font-family:"Century Gothic";
	font-size:10px;
	font-weight: bold;
     }
	 
table {
	margin: 0px;
	padding: 0px;
     }

</style>

<body>

	
	<table width="700">
		<tr align="center"><th id="th1" width="686">QUEENCARD CORPORATION</th>
		</tr>
		<tr align="center">
		  <th id="th1">Credit Score: Salary Based General Purpose Consumption Loan </th>
		</tr>
		<tr><td height="10"></td></tr>
	</table>
	
	<form name="frmCredit">
	<input type="hidden" size="10"  name="BorID" value="<?Php echo $BorrID; ?>" readonly="readonly"/>
	<table width="700">
	<tr>
	<td width="122"id="td1">Name of Applicant:</td>
	<td id="td1" width="276">
	<input type="text" size="30"  name="empname" value="<?Php echo $AppName; ?>" readonly="readonly" style="border:none"/></td>
	<td id="td1" width="125">Originating Branch:</td>
	<td id="td1" width="157">
	<input type="text" size="20"  name="text" value="<?Php echo $Branch; ?>" readonly="readonly" style="border:none"/></td>
	</tr></table>
	
	<table width="700">
	<tr>
	<td width="120" id="td1">Address:</td>
	<td id="td1" width="279"><input type="text" size="40"  name="empname" value="<?Php echo $Address; ?>" readonly="readonly" style="border:none"/>
	</td>
	<td id="td1" width="124">Contact Number :</td>
	<td id="td1" width="157"><input type="text" size="20"  name="date" value="<?Php echo $Number; ?>" readonly="readonly" style="border:none"/>
	</td>
	</tr></table>
	
	
	<table width="700"><tr><td height="10"></td></tr></table>
	
	<table width="700" id="td1">
	<tr>
	<td width="177" height="20">CREDIT SCORE </td>
	<td width="227"align="left">[ <?Php if ($Standing == "PASS"){echo '&#10004;';}else{echo "&nbsp;&nbsp;&nbsp;";}?> ] Pass 75 points up </td>
	<td width="280"align="left">[ <?Php if ($Standing == "FAIL"){echo '&#10004;';}else{echo "&nbsp;&nbsp;&nbsp;";}?> ] Fail 74 points and below</td>
	</tr>
	</table>
	
	
	<table width="700" id="td2">
	<tr>
	<td width="281" height="14">Ownership/Management </td>
	<td width="241" align="center">35 points</td>
	<td width="162" align="center">Credit Rating</td>
	</tr>
	</table>
	
	<table width="700" id="td1">
	<tr><td width="281">Existing Relationship with QCDB</td>
	</tr>
	</table>

	<table width="700">
	<tr>
	<td width="57"></td>
	<td width="531" align="left"> Applicant personally known to the bank for more than 5 years</td>
	<td width="40" align="left">[ <?Php if ($Application == 7) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 7</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left">  Applicant personally known to the bank but for less than 5 years</td>
	<td width="40" align="left">[ <?Php if ($Application == 4) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 4 </td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left"> Not known to the officers of the bank</td>
	<td width="40" align="left">[ <?Php if ($Application == 1) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 1 </td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	</table>
	
	
	<table width="700" id="td1">
	<tr><td width="281">Residency and relationship with the community</td>
	</tr>
	</table>
	
	<table width="700">
	<tr>
	<td width="57"></td>
	<td width="531" align="left"> Living in present address for more than 10 years</td>
	<td width="40" align="left">[ <?Php if ($Residence == 7) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 7 </td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left">  Living in present address for more than 5 years</td>
	<td width="40" align="left">[ <?Php if ($Residence == 4) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 4</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57" height="21"></td>
	<td width="531" align="left"> Living in present address for less than 5 years</td>
	<td width="40" align="left">[ <?Php if ($Residence == 1) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 1</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	</table>
	
	<table width="700" id="td1">
	<tr><td width="281">Health Condition</td>
	</tr>
	</table>
	
	<table width="700">
	<tr>
	<td width="57"></td>
	<td width="531" align="left"> Excellent health with no hospital record for the past 24 months</td>
	<td width="40" align="left">[ <?Php if ($Health == 7) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 7</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left">   Good health with medical maintenance record </td>
	<td width="40" align="left">[ <?Php if ($Health == 4) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 4</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left">  Health issues unresolved</td>
	<td width="40" align="left">[ <?Php if ($Health == 1) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 1</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	</table>
	
	
	<table width="700" id="td1">
	<tr><td width="281">Credit Card/Telco subscriber and limits</td>
	</tr>
	</table>
	
	<table width="700">
	<tr>
	<td width="57"></td>
	<td width="531" align="left"> Holder for 5 years with credit limit of P100,000.00 and above</td>
	<td width="40" align="left">[ <?Php if ($Credit == 7) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 7</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left">   Holder for 5 years with credit limit of P100,000.00 and below</td>
	<td width="40" align="left">[ <?Php if ($Credit == 4) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 4</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left">  Holder for 3 years and below</td>
	<td width="40" align="left">[ <?Php if ($Credit == 1) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 1</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	</table>
	
	
	<table width="700" id="td1">
	<tr><td width="281">Experience and Track Record</td>
	</tr>
	</table>
	
	<table width="700">
	<tr>
	<td width="57"></td>
	<td width="531" align="left">  Established track record with excellent handling of account</td>
	<td width="40" align="left">[ <?Php if ($Experience == 7) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 7</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left">   Good repayment habits but exhibit payment failures</td>
	<td width="40" align="left">[ <?Php if ($Experience == 4) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 4</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left">  Poor payment history with adverse experience</td>
	<td width="40" align="left">[ <?Php if ($Experience == 1) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 1</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	</table>
	
	
	
	
	
	<table width="700">
	<tr><td></td><td height="10"></td></tr>
	</table>
	
	
	<table width="700" id="td2">
	<tr>
	<td width="281">Employment, Education, Repayment Indicators</td>
	<td width="241" align="center">35 points</td>
	<td width="162" align="center">Credit Rating</td>
	</tr>
	</table>
	
	<table width="700" id="td1">
	<tr><td width="281">Experience and Track Record</td>
	</tr>
	</table>

	<table width="700">
	<tr>
	<td width="57"></td>
	<td width="531" align="left"> Have been a salary loan borrower for more than 5 years</td>
	<td width="40" align="left">[ <?Php if ($Employment1 == 7) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 7</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left">Have been a salary loan borrower for less than 5 years</td>
	<td width="40" align="left">[ <?Php if ($Employment1 == 4) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 4</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left"> Have been a salary loan borrower for less than 3 years</td>
	<td width="40" align="left">[ <?Php if ($Employment1 == 1) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 1</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	</table>
	
	
	<table width="700" id="td1">
	<tr><td width="281">Employment Record</td>
	</tr>
	</table>

	<table width="700">
	<tr>
	<td width="57"></td>
	<td width="531" align="left"> Permanently employed with total monthly family income (TMFI) of P30,000.00 and above</td>
	<td width="40" align="left">[ <?Php if ($Employment2 == 7) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 7</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left"> Permanently employed with total monthly family income (TMFI) of P15,000.01 to P29,999.99 and below</td>
	<td width="40" align="left">[ <?Php if ($Employment2 == 4) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 4</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left"> Permanently employed with total monthly family income (TMFI) of P15,000.00 and below</td>
	<td width="40" align="left">[ <?Php if ($Employment2 == 1) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 1</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	</table>
	
	
	<table width="700" id="td1">
	<tr><td width="281">Educational Attainment</td>
	</tr>
	</table>

	<table width="700">
	<tr>
	<td width="57"></td>
	<td width="531" align="left">Graduated college with post-graduate studies</td>
	<td width="40" align="left">[ <?Php if ($Education == 7) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 7</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left">Graduated college  </td>
	<td width="40" align="left">[ <?Php if ($Education == 4) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 4</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left"> Studied college</td>
	<td width="40" align="left">[ <?Php if ($Education == 1) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 1</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	</table>
	
	
	<table width="700" id="td1">
	<tr><td width="281">Stability of Employment and Tenure</td>
	</tr>
	</table>

	<table width="700">
	<tr>
	<td width="57"></td>
	<td width="531" align="left">Have been employed with permanent status for more than 10 years </td>
	<td width="40" align="left">[ <?Php if ($Stability == 7) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 7</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left">Have been employed with permanent status for more than 3 years but less than 10 years</td>
	<td width="40" align="left">[ <?Php if ($Stability == 4) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 4</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left">Have been employed with permanent status for 3 years and below</td>
	<td width="40" align="left">[ <?Php if ($Stability == 1) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 1</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	</table>
	
	
	<table width="700" id="td1">
	<tr><td width="281">Borrowings, aside from this loan application</td>
	</tr>
	</table>

	<table width="700">
	<tr>
	<td width="57"></td>
	<td width="531" align="left"> Salary loan solely with this bank</td>
	<td width="39" align="left">[ <?Php if ($Salary == 7) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 7</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left">  With salary loans from SSS, GSIS, Pag-Ibig, other Financial/Lending Institutions</td>
	<td width="40" align="left">[ <?Php if ($Salary == 4) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 4</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left">   With salary /housing loans from SSS, GSIS, Pag-ibig, other Financial/Lending Institutions</td>
	<td width="40" align="left">[ <?Php if ($Salary == 1) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 1</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	</table>
	
	
	
	
	
	
	<table width="700">
	<tr><td></td><td height="10"></td></tr>
	</table>
	
	<table width="700" id="td2">
	<tr>
	<td width="281">Repayment Capacity</td>
	<td width="241" align="center">30 points</td>
	<td width="162" align="center">Credit Rating</td>
	</tr>
	</table>
	
	<table width="700" id="td1">
	<tr><td width="281">Number of dependents </td>
	</tr>
	</table>

	<table width="700">
	<tr>
	<td width="57"></td>
	<td width="531" align="left">  Single/Married with no dependent</td>
	<td width="40" align="left">[ <?Php if ($Dependents == 10) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 10</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left">Married with one to two dependents</td>
	<td width="40" align="left">[ <?Php if ($Dependents == 6) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 6</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left"> Married with more than 3 dependents</td>
	<td width="40" align="left">[ <?Php if ($Dependents == 3) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 3</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	</table>
	
	
	<table width="700" id="td1">
	<tr><td width="281">Loan to Net Income/TMFI (based on Total Credits to CASA and ITR, if Salary Based)</td>
	</tr>
	</table>

	<table width="700">
	<tr>
	<td width="57"></td>
	<td width="531" align="left">  Total monthly amortization is less than 30% of net income after tax for previous year</td>
	<td width="40" align="left">[ <?Php if ($Payment == 10) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 10</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left">Total monthly amortization is less than 50% but more than 30% of net income after tax for previous year</td>
	<td width="40" align="left">[ <?Php if ($Payment == 6) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 6</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left">  Amortization exceeds 50% of net income after tax for previous year</td>
	<td width="40" align="left">[ <?Php if ($Payment == 3) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 3</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	</table>
	
	
	<table width="700" id="td1">
	<tr><td width="281">Financial Leverage (Total Liabilities/Equity)</td>
	</tr>
	</table>

	<table width="700">
	<tr>
	<td width="57"></td>
	<td width="531" align="left">  Financial leverage is below 0.30x</td>
	<td width="40" align="left">[ <?Php if ($Financial == 10) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 10</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left">Financial leverage is above 0.30x but below 0.50x</td>
	<td width="40" align="left">[ <?Php if ($Financial == 6) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 6</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	<tr>
	<td width="57"></td>
	<td width="531" align="left">  Financial leverage is above 0.50x but below 1.00x</td>
	<td width="40" align="left">[ <?Php if ($Financial == 3) { echo '&#10004;';} else { echo "&nbsp;&nbsp;&nbsp;";} ?> ] 3</td>
	<td width="52" align="left">&nbsp;</td>
	</tr>
	</table>
	
	
	<table width="700">
	<tr><td></td><td height="10"></td></tr>
	</table>
	
	<hr width="700" size="1" align="left"/>

	<table width="700" id="td1">
	<tr><td width="248"><em>Observations and Action on the Request</em>:</td>
	<td width="287"><input type="text" size="20" value="<?Php echo $Standing; ?>" readonly="readonly" style="border:none"/></td>
	<td width="149">Total Score: <?Php echo $TotalScore; ?></td>
	</tr>
	</table>
	
	<table width="700" id="td1">
	<tr>
	<?Php 
	if ($Standing == "FAIL") { echo '<td width="200">Reason: '.$Reason.'</td>'; }
	?>
	</tr>
	<tr>
	<td width="472">&nbsp;</td>
	<td width="216"><img src="images/Gretchen_CS.jpg" width="140" height="45"/></td>
	</tr>
	</table>
	

	<!--<table width="700">
	<tr>
	<td width="116"><strong>Approved by:</strong></td>
	<td width="572">&nbsp;</td>
	</table>-->
	
	<?Php 
	//if ($Standing == "PASS"){
	//echo '<table width="583">';
	//echo '<tr>';
	//echo '<td width="87">&nbsp;</td>';
	//echo '<td width="210"><img src="images/DAJ_1.jpg" width="120" height="45"/></td>';
	//echo '<td width="49">&nbsp;</td>';
	//echo '<td width="217"><img src="images/EOJ_1.jpg" width="120" height="45"/></td>';
	//echo '</tr>';
	//echo '</table>';
	//}
	//else if ($Standing == "FAIL"){
	//echo '<table width="700">';
	//echo '<tr><td width="116">&nbsp;</td><td width="572"><strong>MARGARET RUTH C. FLORETE</strong></td></tr>';
	//echo '<tr><td width="116">&nbsp;</td><td width="572">PRESIDENT</td></tr>';
	//echo '</table>';
	//}
	
	?>
	</form>
	
</body>
</html>
