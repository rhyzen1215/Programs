	<?Php
		
		include 'Connect.php';
		
		
		$BorrID = "";
		
		$empID = "";
		$AppName = "";
		$DateProc = "";
		$Amount = "";
		$Term = "";
		$Monthly = "";
		$GrossIncome = "";
		$TranspoExpense = "";
		$HouseExpense = "";
		$EduExpense = "";
		$MedicalExpense = "";
		$RecExpense = "";
		$OtherExpense = "";
		$TotalExpense = "";
		$SpouseIncome = "";
		$OtherIncome = "";
		$NetIncome1 = "";
		$Income2 = "";
		$OtherExistExpense = "";
		$TotalIncome = "";
		$MonthlyAmort = "";
		$Excess = "";
		$TotalPayment = "";
		$MonthlyPercentage = "";
		$TotalMonthlyPercentage = "";
		$AmountLoan = "";
		$Off1 = "";
		$Off2 = "";
		$LoanID = "";
		$OverallIncome = "";
		$DevStat = 0;
		$Deviation = "";
		
		//Checkboxes
		
		$MPLPro = 0;
		$MPLCon = 0;
		$TMDRPro = 0;
		$TMDRCon = 0;
		$PREVPro = 0;
		$PREVCon = 0;
		$EMPAPPPro = 0;
		$EMPAPPCon = 0;
		$EMPSPro = 0;
		$EMPSCon = 0;
		$CHECKPro1 = 0;
		$CHECKPro2 = 0;
		$CHECKCon1 = 0;
		$CHECKCon2 = 0;
		$CASAPro1 = 0;
		$CASAPro2 = 0;
		$CASACon = 0;
		$MPL = "";
		$TMDR = "";
		$PREV = "";
		$EMP = "";
		$EMPS = "";
		$CHECKING = "";
		$CASA = "";
		$MonthlyAmort1 = "";


		if (isset($_REQUEST['MPLPro'])){ $MPLPro = 1; }
		if (isset($_REQUEST['MPLCon'])){ $MPLCon = 1; }
		if (isset($_REQUEST['TMDRPro'])){ $TMDRPro = 1; }
		if (isset($_REQUEST['TMDRCon'])){ $TMDRCon = 1; }
		if (isset($_REQUEST['PREVPro'])){ $PREVPro = 1; }
		if (isset($_REQUEST['PREVCon'])){ $PREVCon = 1; }
		if (isset($_REQUEST['EMPAPPPro'])){ $EMPAPPPro = 1; }
		if (isset($_REQUEST['EMPAPPCon'])){ $EMPAPPCon = 1; }
		if (isset($_REQUEST['EMPSPro'])){ $EMPSPro = 1; }
		if (isset($_REQUEST['EMPSCon'])){ $EMPSCon = 1; }
		if (isset($_REQUEST['CHECKPro1'])){ $CHECKPro1 = 1; }
		if (isset($_REQUEST['CHECKPro2'])){ $CHECKPro2 = 1; }
		if (isset($_REQUEST['CHECKCon1'])){ $CHECKCon1 = 1; }
		if (isset($_REQUEST['CHECKCon2'])){ $CHECKCon2 = 1; }
		if (isset($_REQUEST['CASAPro1'])){ $CASAPro1 = 1; }
		if (isset($_REQUEST['CASAPro2'])){ $CASAPro2 = 1; }
		if (isset($_REQUEST['CASACon'])){ $CASACon = 1; }
		

		if (isset($_REQUEST['BorID'])){
			$BorrID = $_REQUEST['BorID'];
			$Amount = $_REQUEST['Amnt'];
			$Term = $_REQUEST['Term'];
			$DateProc = $_REQUEST['DateProc'];
			$MonthlyAmort = $_REQUEST['Monthly'];
			$MonthlyAmort = $MonthlyAmort * 2;
			$Term = $Term." months";
			$BorrID = base64_decode($BorrID);
			$LoanID = $_REQUEST['LoanID'];

		}
		
		if (isset($_REQUEST['btnSubmit'])){
		
			$BorrID = $_REQUEST['BorID'];
			$Amount = $_REQUEST['Amnt'];
			$Term = $_REQUEST['Term'];
			$DateProc = $_REQUEST['DateProc'];
			$MonthlyAmort = $_REQUEST['Monthly'];
			$Term = $Term." months";
			$BorrID = base64_decode($BorrID);
			$BORChck = "";
			$LoanID = $_REQUEST['LoanID'];
			
			$MPL = $_REQUEST['MPL'];
			$TMDR = $_REQUEST['TMDR'];
			$PREV = $_REQUEST['PREV'];
			$EMP = $_REQUEST['EMP'];
			$EMPS = $_REQUEST['EMPS'];
			$CHECKING = $_REQUEST['CHECKING'];
			$CASA = $_REQUEST['CASA'];
			
			$Deviation = "";
			$DevStat = 0;
			
			if (isset($_REQUEST['chkDev'])){
				$Deviation = $_REQUEST['txtAreaDev'];
				$DevStat = 1;
			}
			
			$sql = "Select  * From Evaluation where borrowerno = '".$BorrID."'";
			$rs=odbc_exec($conn,$sql) or die("Error in query");	
			while (odbc_fetch_row($rs)) { $BORChck = "1"; }
				
			if ($BORChck == "1") {
			
				$sql = "Update Evaluation set MPLPro='".$MPLPro."',MPLCon='".$MPLCon."',TMDRPro='".$TMDRPro."',TMDRCon='".$TMDRCon."',PREVPro='".$PREVPro."',PREVCon='".$PREVCon."',EMPAPPPro='".$EMPAPPPro."',EMPAPPCon='".$EMPAPPCon."',EMPSPro='".$EMPSPro."',EMPSCon='".$EMPSCon."',CHECKPro1='".$CHECKPro1."',CHECKPro2='".$CHECKPro2."',CHECKCon1='".$CHECKCon1."',CHECKCon2='".$CHECKCon2."',CASAPro1='".$CASAPro1."',CASAPro2='".$CASAPro2."',CASACon='".$CASACon."', MPL='".$MPL."', TMDR='".$TMDR."', PREV='".$PREV."', EMP='".$EMP."', EMPS='".$EMPS."', CHECKING='".$CHECKING."', CASA='".$CASA."', Deviation='".$Deviation."', DevStat='".$DevStat."' where borrowerno = '".$BorrID."'";
				$rs=odbc_exec($conn,$sql) or die("Error in query");	
			}
			else {
				
				$sql = "Insert Into Evaluation(borrowerno, MPLPro, MPLCon, TMDRPro, TMDRCon, PREVPro, PREVCon, EMPAPPPro, EMPAPPCon, EMPSPro, EMPSCon, CHECKPro1, CHECKPro2, CHECKCon1, CHECKCon2, CASAPro1, CASAPro2, CASACon, MPL, TMDR, PREV, EMP, EMPS, CHECKING, CASA, Deviation, DevStat) Values('$BorrID', '$MPLPro', '$MPLCon',  '$TMDRPro', '$TMDRCon', '$PREVPro', '$PREVCon', '$EMPAPPPro', '$EMPAPPCon', '$EMPSPro', '$EMPSCon', '$CHECKPro1', '$CHECKPro2', '$CHECKCon1', '$CHECKCon2', '$CASAPro1', '$CASAPro2', '$CASACon', '$MPL', '$TMDR', '$PREV', '$EMP', '$EMPS', '$CHECKING', '$CASA', '$Deviation', '$DevStat')";
				$rs=odbc_exec($conn,$sql) or die("Error in query");
				
			}
			
			
					
		}
		
		
			$sql = "Select * From Evaluation where borrowerno = '".$BorrID."'";
			$rs=odbc_exec($conn,$sql) or die("Error in query");
			$MPLPro = odbc_result($rs,"MPLPro");
			$MPLCon = odbc_result($rs,"MPLCon");
			$TMDRPro = odbc_result($rs,"TMDRPro");
			$TMDRCon = odbc_result($rs,"TMDRCon");
			$PREVPro = odbc_result($rs,"PREVPro");
			$PREVCon = odbc_result($rs,"PREVCon");
			$EMPAPPPro = odbc_result($rs,"EMPAPPPro");
			$EMPAPPCon = odbc_result($rs,"EMPAPPCon");
			$EMPSPro = odbc_result($rs,"EMPSPro");
			$EMPSCon = odbc_result($rs,"EMPSCon");
			$CHECKPro1 = odbc_result($rs,"CHECKPro1");
			$CHECKPro2 = odbc_result($rs,"CHECKPro2");
			$CHECKCon1 = odbc_result($rs,"CHECKCon1");
			$CHECKCon2 = odbc_result($rs,"CHECKCon2");
			$CASAPro1 = odbc_result($rs,"CASAPro1");
			$CASAPro2 = odbc_result($rs,"CASAPro2");
			$CASACon = odbc_result($rs,"CASACon");
			$MPL = odbc_result($rs,"MPL");
			$TMDR = odbc_result($rs,"TMDR");
			$PREV = odbc_result($rs,"PREV");
			$EMP = odbc_result($rs,"EMP");
			$EMPS = odbc_result($rs,"EMPS");
			$CHECKING = odbc_result($rs,"CHECKING");
			$CASA = odbc_result($rs,"CASA");
			$DevStat = odbc_result($rs,"DevStat");
			$Deviation = odbc_result($rs,"Deviation");
			
	
		
		
		if ($MonthlyAmort == "") {$MonthlyAmort = 0; }
		
		$sql = "Select * From Loans where loanid = '".$LoanID."'";
		$rs=odbc_exec($conn,$sql) or die("Error in query");	
		while (odbc_fetch_row($rs)) {
			$Off1 = odbc_result($rs,"Officer1");
			$Off2 = odbc_result($rs,"Officer2");
		}
		
		
		
		$sql = "Select * From Borrower where borrowerno = '".$BorrID."'";
		$rs=odbc_exec($conn,$sql) or die("Error in query");	
		while (odbc_fetch_row($rs)) {
			$empID = odbc_result($rs,"employeeno");
			$AppName = odbc_result($rs,"Firstname")." ".odbc_result($rs,"MI")." ".odbc_result($rs,"Lastname");
			$AppName  = strtoupper($AppName);
			$GrossIncome = odbc_result($rs,"GrossIncome");
			$SpouseIncome = odbc_result($rs,"SpouseIncome");
			$OtherIncome = odbc_result($rs,"OtherIncome");
			$TranspoExpense = odbc_result($rs,"TranspoExpense");
			$HouseExpense = odbc_result($rs,"HouseExpense");
			$EduExpense = odbc_result($rs,"EduExpense");
			$MedicalExpense = odbc_result($rs,"MedicalExpense");
			$RecExpense = odbc_result($rs,"RecExpense"); 
			$OtherExpense = odbc_result($rs,"OtherExpense");
			$OtherExistExpense = odbc_result($rs,"OtherExistExpense");
			
			$GrossIncome2 = odbc_result($rs,"GrossIncome2");
			$SpouseIncome2 = odbc_result($rs,"SpouseIncome2");
			$OtherIncome2 = odbc_result($rs,"OtherIncome2");
			$TranspoExpense2 = odbc_result($rs,"TranspoExpense2");
			$HouseExpense2 = odbc_result($rs,"HouseExpense2");
			$EduExpense2 = odbc_result($rs,"EduExpense2");
			$MedicalExpense2 = odbc_result($rs,"MedicalExpense2");
			$RecExpense2 = odbc_result($rs,"RecExpense2"); 
			$OtherExpense2 = odbc_result($rs,"OtherExpense2");
			$OtherExistExpense2 = odbc_result($rs,"OtherExistExpense2");
		}
		
		
		$sql = "Select * From BorrowerDeduct where employeeno = '".$empID."'";
		$rs=odbc_exec($conn,$sql) or die("Error in query");	
		while (odbc_fetch_row($rs)) {
			//$AppName = odbc_result($rs,"Lastname");
		}
		
		
		$TotalExpense = $HouseExpense + $TranspoExpense + $EduExpense + $MedicalExpense + $RecExpense + $OtherExpense;
		
		$NetIncome1 = $GrossIncome - $TotalExpense;
		$Income2 = $SpouseIncome + $OtherIncome;
		$TotalIncome = $NetIncome1 + $Income2;
		$TotalIncome = $TotalIncome - $OtherExistExpense;
		$Excess = $TotalIncome - $MonthlyAmort;
		$TotalPayment = $OtherExistExpense + $MonthlyAmort;
		$MonthlyPercentage = $MonthlyAmort / $TotalIncome;
		$MonthlyPercentage = $MonthlyPercentage  * 100;
		
		$OverallIncome = $GrossIncome + $Income2;
		$TotalMonthlyPercentage = $TotalPayment / $OverallIncome;
		$TotalMonthlyPercentage = $TotalMonthlyPercentage * 100;
		
			
		$GrossIncome = number_format($GrossIncome,2,'.',',');
		$TranspoExpense = number_format($TranspoExpense,2,'.',',');
		$HouseExpense = number_format($HouseExpense,2,'.',',');
		$EduExpense = number_format($EduExpense,2,'.',',');
		$MedicalExpense = number_format($MedicalExpense,2,'.',',');
		$RecExpense = number_format($RecExpense,2,'.',',');
		$OtherExpense = number_format($OtherExpense,2,'.',',');
		$TotalExpense = number_format($TotalExpense,2,'.',',');
		$OtherExistExpense = number_format($OtherExistExpense,2,'.',',');
		$NetIncome1 = number_format($NetIncome1,2,'.',',');
		$Income2 = number_format($Income2,2,'.',',');
		$TotalIncome = number_format($TotalIncome,2,'.',',');
		$Excess = number_format($Excess,2,'.',',');
		$TotalPayment = number_format($TotalPayment,2,'.',',');
		$MonthlyPercentage = number_format($MonthlyPercentage,2,'.','');
		$MonthlyPercentage = $MonthlyPercentage." %";
		$TotalMonthlyPercentage = number_format($TotalMonthlyPercentage,2,'.','');
		$TotalMonthlyPercentage = $TotalMonthlyPercentage." %";
		
		
		$TotalExpense2 = $HouseExpense2 + $TranspoExpense2 + $EduExpense2 + $MedicalExpense2 + $RecExpense2 + $OtherExpense2;
		
		$NetIncome12 = $GrossIncome2 - $TotalExpense2;
		$Income22 = $SpouseIncome + $OtherIncome2;
		$TotalIncome2 = $NetIncome12 + $Income22;
		$TotalIncome2 = $TotalIncome2 - $OtherExistExpense2;
		$Excess2 = $TotalIncome2 - $MonthlyAmort;
		$TotalPayment2 = $OtherExistExpense2 + $MonthlyAmort;
		$MonthlyPercentage2 = $MonthlyAmort / $TotalIncome2;
		$MonthlyPercentage2 = $MonthlyPercentage2  * 100;
		
		$OverallIncome2 = $GrossIncome2 + $Income22;
		$TotalMonthlyPercentage2 = $TotalPayment2 / $OverallIncome2;
		$TotalMonthlyPercentage2 = $TotalMonthlyPercentage2 * 100;
		
		$MonthlyAmort1 = number_format($MonthlyAmort,2,'.',',');
		$GrossIncome2 = number_format($GrossIncome2,2,'.',',');
		$TranspoExpense2 = number_format($TranspoExpense2,2,'.',',');
		$HouseExpense2 = number_format($HouseExpense2,2,'.',',');
		$EduExpense2 = number_format($EduExpense2,2,'.',',');
		$MedicalExpense2 = number_format($MedicalExpense2,2,'.',',');
		$RecExpense2 = number_format($RecExpense2,2,'.',',');
		$OtherExpense2 = number_format($OtherExpense2,2,'.',',');
		$TotalExpense2 = number_format($TotalExpense2,2,'.',',');
		$OtherExistExpense2 = number_format($OtherExistExpense2,2,'.',',');
		$NetIncome12 = number_format($NetIncome12,2,'.',',');
		$Income22 = number_format($Income22,2,'.',',');
		$TotalIncome2 = number_format($TotalIncome2,2,'.',',');
		$Excess2 = number_format($Excess2,2,'.',',');
		$TotalPayment2 = number_format($TotalPayment2,2,'.',',');
		$MonthlyPercentage2 = number_format($MonthlyPercentage2,2,'.','');
		$MonthlyPercentage2 = $MonthlyPercentage2." %";
		$TotalMonthlyPercentage2 = number_format($TotalMonthlyPercentage2,2,'.','');
		$TotalMonthlyPercentage2 = $TotalMonthlyPercentage2." %";
		
	?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Evaluation Sheet</title>
</head>

<style type="text/css">

a {text-decoration:none; font-size:12px; font-weight:bold;}

input[type=text],select
{
	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;
	padding-left: 2px;
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

#td4 {
	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;
	border:#000000 solid 1px ;
	}

#td2 {
	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;
	border-bottom:solid 1px #000000;
	border-top:solid 1px #000000;

	 }
	 
#td3 {
	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;
	border-bottom:solid 1px #000000;

	 }


td {

	font-family:"Century Gothic";
	font-size:12px;
	 }
	 
#td1 {

	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;
	 }


th {
	font-family:"Century Gothic";
	font-size:14px;
	font-weight: bold;
     }
	 
table {
	margin: 0px;
	padding: 0px;
     }

</style>

<body>

	
	<table width="700">
		<tr align="center"><th width="686">QUEENCARD CORPORATION</th>
		</tr>
		<tr align="center"><th height="24">Evaluation Sheet</th>
		<td width="200" align="left">
			<?Php $BIDencode = base64_encode($BorrID); ?>
			<a id="Amortization" href="EvaluationPrint.php?BorID=<?Php echo $BIDencode ?>&Amnt=<?Php echo $Amount ?>&Term=<?Php echo $Term ?>&DateProc=<?Php echo date("m/d/Y"); ?>&Monthly=<?Php echo $MonthlyAmort ?>&LoanID=<?Php echo $LoanID ?>" target="_blank" >Print Preview</a></div></td></tr>
		
		<tr><td height="10"></td></tr>
	</table>
	

	<table width="700">
	<tr>
	<td id="td1" width="120">Name of Applicant:</td>
	<td id="td1" width="276">
	<input type="text" size="30"  name="empname" value="<?Php echo $AppName; ?>" readonly="readonly" style="border:none"/></td>
	<td id="td1" width="125">Date Processed:</td>
	<td id="td1" width="152">
	<input type="text" size="10"  name="date" value="<?Php echo $DateProc; ?>" readonly="readonly" style="border:none"/></td>
	</tr></table>
	
	<table width="700">
	<tr>
	<td id="td1" width="120">Amount Desired:</td>
	<td id="td1" width="276"><input type="text" size="15"  name="Amnt" value="<?Php echo $Amount; ?>" readonly="readonly" style="border:none"/>
	Term: <input type="text" size="10"  name="empname" value="<?Php echo $Term; ?>" readonly="readonly" style="border:none"/></td>
	<td id="td1" width="125">Monthly Repayment:</td>
	<td id="td1" width="154"><input type="text" size="10"  name="" value="<?Php echo $MonthlyAmort1; ?>" readonly="readonly" style="border:none"/></td>
	</tr></table>
	
	
	<table width="700">
		<tr><td height="10"></td></tr>
		<tr align="center"><th width="686">APPLICANT/CO-MAKER INCOME SOURCE</th></tr>
		<tr><td height="5"></td></tr>
	</table>
	
	
	<table width="700" id="td2">
	<tr>
	<td width="323">MONTHLY INCOME VS STANDARD</td>
	<td width="115" align="right">AS STATED</td>
	<td width="111" align="right">AS ADJUSTED</td>
	<td width="124" align="right">ADJUSTED AMOUNT</td>
	</tr>
	</table>
	
	<table width="700">
	<tr>
	<td width="323">
		<table>
			<tr><td width="313">Gross Monthly Income</td></tr>
			<tr><tr><td>Less: Monthly Living Expenses</td></tr>
		</table>
		<table>
			<tr><td width="48"></td><td width="258">Transportation</td></tr>
			<tr><td width="48"></td><td width="258">House Rental/Amortization</td></tr>
			<tr><td width="48"></td><td width="258">Education</td></tr>
			<tr><td width="48"></td><td width="258">Medical Expenses</td></tr>
			<tr><td width="48"></td><td width="258">Recreation Expenses</td></tr>
			<tr><td width="48"></td><td width="258">Other Expenses (food,clothing,etc.)</td></tr>
			<tr><td width="48"></td><td width="258">Total Expenses</td></tr>
		</table>
		<table>
			<tr><td width="313">Income after Deducting Expenses</td></tr>
			<tr><tr><td>Add: Other and Spouse's Income</td></tr>
			<tr><tr><td>Less: Other Existing Debt Repayment</td></tr>
		</table>
	</td>
		
	<td width="115">
		<table>
			<tr><td width="92" align="right"><?Php echo $GrossIncome; ?></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
		</table>
		
		<table width="100">
			<tr><td width="96" align="right"><?Php echo $TranspoExpense; ?></td>
			</tr>
			<tr><td width="96" align="right"><?Php echo $HouseExpense; ?></td>
			</tr>
			<tr><td width="96" align="right"><?Php echo $EduExpense; ?></td>
			</tr>
			<tr><td width="96" align="right"><?Php echo $MedicalExpense; ?></td>
			</tr>
			<tr><td width="96" align="right"><?Php echo $RecExpense; ?></td>
			</tr>
			<tr><td width="96" align="right"><?Php echo $OtherExpense; ?></td>
			</tr>
			<tr><td width="96" align="right"><?Php echo $TotalExpense; ?></td>
			</tr>
		</table>
		
		<table>
			<tr><td width="93" align="right"><?Php echo $NetIncome1; ?></td>
			</tr>
			<tr><td align="right"><?Php echo $Income2; ?></td></tr>
			<tr><td align="right"><?Php echo $OtherExistExpense; ?></td></tr>
		</table>
	</td>
	
	
	<td width="111">
		<table>
			<tr><td width="93" align="right"><?Php echo $GrossIncome2; ?></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
		</table>
		
		<table>
			<tr><td width="93" align="right"><?Php echo $TranspoExpense2; ?></td>
			</tr>
			<tr><td width="93" align="right"><?Php echo $HouseExpense2; ?></td>
			</tr>
			<tr><td width="93" align="right"><?Php echo $EduExpense2; ?></td>
			</tr>
			<tr><td width="93" align="right"><?Php echo $MedicalExpense2; ?></td>
			</tr>
			<tr><td width="93" align="right"><?Php echo $RecExpense2; ?></td>
			</tr>
			<tr><td width="93" align="right"><?Php echo $OtherExpense2; ?></td>
			</tr>
			<tr><td width="93" align="right"><?Php echo $TotalExpense2; ?></td>
			</tr>
		</table>
		
		<table>
			<tr><td width="94" align="right"><?Php echo $NetIncome12; ?></td>
			</tr>
			<tr><td align="right"><?Php echo $Income22; ?></td></tr>
			<tr><td align="right"><?Php echo $OtherExistExpense2; ?></td></tr>
		</table>

	</td>
	<td width="124">
		
		<table>
			<tr><td width="106" align="right"><?Php echo $GrossIncome2; ?></td>
			</tr>
			<tr><td>&nbsp;</td></tr>
		</table>
		
		<table>
			<tr><td width="106" align="right"><?Php echo $TranspoExpense2; ?></td>
			</tr>
			<tr><td width="106" align="right"><?Php echo $HouseExpense2; ?></td>
			</tr>
			<tr><td width="106" align="right"><?Php echo $EduExpense2; ?></td>
			</tr>
			<tr><td width="106" align="right"><?Php echo $MedicalExpense2; ?></td>
			</tr>
			<tr><td width="106" align="right"><?Php echo $RecExpense2; ?></td>
			</tr>
			<tr><td width="106" align="right"><?Php echo $OtherExpense2; ?></td>
			</tr>
			<tr><td width="106" align="right"><?Php echo $TotalExpense2; ?></td>
			</tr>
		</table>
		
		<table>
			<tr><td width="106" align="right"><?Php echo $NetIncome12; ?></td>
			</tr>
			<tr><td align="right"><?Php echo $Income22; ?></td></tr>
			<tr><td align="right"><?Php echo $OtherExistExpense2; ?></td></tr>
		</table>
		
	</td>
	
	</tr>
	
	</table>

	
	<table width="700" id="td2">
	<tr>
	<td width="323">Total Monthly Family Disposable Income (TMFDI)</td>
	<td width="115">
		<table width="100">
		  <tr><td width="87" align="right"><?Php echo $TotalIncome; ?></td>
		</tr></table>
	</td>
	<td width="111">
		<table width="101">
		  <tr><td width="93" align="right"><?Php echo $TotalIncome2; ?></td>
		</tr></table>
	</td>
	<td width="124">
		<table width="113">
		  <tr><td width="105" align="right"><?Php echo $TotalIncome2; ?></td>
		</tr></table>
	</td>
	</tr>
	</table>
	
	<table width="700" id="td3">
	<tr>
	<td width="323">Monthly Payment this Loan (MPL)</td>
	<td width="115">
		<table width="101">
		  <tr><td width="93" align="right"><?Php echo $MonthlyAmort1; ?></td>
		</tr></table>
	</td>
	<td width="111">
		<table width="101">
		  <tr><td width="93" align="right"><?Php echo $MonthlyAmort1; ?></td>
		</tr></table>
	</td>
	<td width="124">
		<table width="115">
		  <tr><td width="107" align="right"><?Php echo $MonthlyAmort1; ?></td>
		</tr></table>
	</td>
	</tr>
	<tr>
	<td width="323">Excess/ (Deficit)</td>
	<td width="115">
		<table width="101">
		  <tr><td width="93" align="right"><?Php echo $Excess; ?></td>
		</tr></table>
	</td>
	<td width="111">
		<table width="101">
		  <tr><td width="93" align="right"><?Php echo $Excess2; ?></td>
		</tr></table>
	</td>
	<td width="124">
		<table width="114">
		  <tr><td width="106" align="right"><?Php echo $Excess2; ?></td>
		</tr></table>
	</td>
	</tr>
	<tr>
	<td width="323">Total Monthly Debt Payment Including This Loan (TMDR)</td>
	<td width="115">
		<table width="101">
		  <tr><td width="93" align="right"><?Php echo $TotalPayment; ?></td>
		</tr></table>
	</td>
	<td width="111">
		<table width="101">
		  <tr><td width="93" align="right"><?Php echo $TotalPayment2; ?></td>
		</tr></table>
	</td>
	<td width="124">
		<table width="114">
		  <tr><td width="106" align="right"><?Php echo $TotalPayment2; ?></td>
		</tr></table>
	</td>
	</tr>
	</table>
	
	<table width="687" id="td1">
	<tr>
	<td width="561">Monthly Debt Payment This Loan as a % of TMFDI</td>
	<td width="114" align="right"><?Php echo $MonthlyPercentage2 ; ?></td>
	</tr>
	<tr>
	<td width="561">Total Monthly Debt Repayments as a % of Total Monthly Income</td>
	<td width="114" align="right"><?Php echo $TotalMonthlyPercentage2 ; ?></td>
	</tr>
	<tr>
	<td width="561">(Total Monthly Income=Gross Income+Other Income+Spouse Income)</td>
	<td width="114">&nbsp;</td>
	</tr>
	</table>
	
	
	<form name="frmEvaluate">
    
	<?Php $BorrID = base64_encode($BorrID); ?>
	<input type="hidden" value="<?Php echo $BorrID; ?>" name="BorID" />
	<input type="hidden" value="<?Php echo $Amount; ?>" name="Amnt" />
	<input type="hidden" value="<?Php echo $Term; ?>" name="Term" />
	<input type="hidden" value="<?Php echo $DateProc; ?>" name="DateProc" />
	<input type="hidden" value="<?Php echo $MonthlyAmort; ?>" name="Monthly" />
    <input type="hidden" value="<?Php echo $LoanID; ?>" name="LoanID" />
	<table width="700" id="td2">
	<tr>
	<td width="323">EVALUATION PROCESS</td>
	<td width="115">PRO</td>
	<td width="111">CON</td>
	<td width="124">REMARKS</td>
	</tr>
	</table>
	
	<table width="700">
	<tr>
	<td width="323">MPL versus TMFDI (75%)</td>
	<td width="115"><input type="checkbox" name="MPLPro" <?Php if ($MPLPro == 1) { echo 'checked="checked"';} ?> />w/in standard</td>
	<td width="111"><input type="checkbox" name="MPLCon" <?Php if ($MPLCon == 1) { echo 'checked="checked"';} ?>/>not within</td>
	<td width="124" align="center"><input type="text" size="10" name="MPL" value="<?Php echo $MPL; ?>"/></td>
	</tr>
	<tr>
	<td width="323">TMDR versus TMFI (55%)</td>
	<td width="115"><input type="checkbox" name="TMDRPro" <?Php if ($TMDRPro == 1) { echo 'checked="checked"';} ?> />w/in standard</td>
	<td width="111"><input type="checkbox" name="TMDRCon" <?Php if ($TMDRCon == 1) { echo 'checked="checked"';} ?>/>not within</td>
	<td width="124" align="center"><input type="text" size="10" name="TMDR" value="<?Php echo $TMDR; ?>"/></td>
	</tr>
	<tr>
	<td width="323">Previous Experience with Queenbank</td>
	<td width="115"><input type="checkbox" name="PREVPro" <?Php if ($PREVPro == 1) { echo 'checked="checked"';} ?>/>satisfactory</td>
	<td width="111"><input type="checkbox" name="PREVCon" <?Php if ($PREVCon == 1) { echo 'checked="checked"';} ?>/>not satisfactory</td>
	<td width="124" align="center"><input type="text" size="10" name="PREV" value="<?Php echo $PREV; ?>"/></td>
	</tr>
	<tr>
	<td width="323">Employment of Applicant/Co-borrower</td>
	<td width="115"><input type="checkbox" name="EMPAPPPro" <?Php if ($EMPAPPPro == 1) { echo 'checked="checked"';} ?> />stable</td>
	<td width="111"><input type="checkbox" name="EMPAPPCon" <?Php if ($EMPAPPCon == 1) { echo 'checked="checked"';} ?>/>unstable</td>
	<td width="124" align="center"><input type="text" size="10" name="EMP" value="<?Php echo $EMP; ?>"/></td>
	</tr>
	<tr>
	<td width="323">Employment of Spouse</td>
	<td width="115"><input type="checkbox" name="EMPSPro" <?Php if ($EMPSPro == 1) { echo 'checked="checked"';} ?>/>stable</td>
	<td width="111"><input type="checkbox" name="EMPSCon" <?Php if ($EMPSCon == 1) { echo 'checked="checked"';} ?>/>unstable</td>
	<td width="124" align="center"><input type="text" size="10" name="EMPS" value="<?Php echo $EMPS; ?>"/></td>
	</tr>
	<tr>
	<td width="323">Checkings (applicant/co-borrower)</td>
	<td width="115"><input type="checkbox" name="CHECKPro1" <?Php if ($CHECKPro1 == 1) { echo 'checked="checked"';} ?>/>favorable</td>
	<td width="111"><input type="checkbox" name="CHECKCon1" <?Php if ($CHECKCon1 == 1) { echo 'checked="checked"';} ?> />unfavorable</td>
	<td width="124" align="center"><input type="text" size="10" name="CHECKING" value="<?Php echo $CHECKING; ?>" /></td>
	</tr>
	<tr>
	<td width="323">&nbsp;</td>
	<td width="115"><input type="checkbox" name="CHECKPro2" <?Php if ($CHECKPro2 == 1) { echo 'checked="checked"';} ?>/>mixed</td>
	<td width="111"><input type="checkbox" name="CHECKCon2" <?Php if ($CHECKCon2 == 1) { echo 'checked="checked"';} ?>/>sued</td>
	<td width="124">&nbsp;</td>
	</tr>
	<tr>
	<td width="323">CASA with other Banks</td>
	<td width="115"><input type="checkbox" name="CASAPro1" <?Php if ($CASAPro1 == 1) { echo 'checked="checked"';} ?>/>handled well</td>
	<td width="111"><input type="checkbox" name="CASACon" <?Php if ($CASACon == 1) { echo 'checked="checked"';} ?>/>fairly handled</td>
	<td width="124" align="center"><input type="text" size="10" name="CASA" value="<?Php echo $CASA; ?>"/></td>
	</tr>
	<tr>
	<td width="323">&nbsp;</td>
	<td width="115"><input type="checkbox" name="CASAPro2" <?Php if ($CASAPro2 == 1) { echo 'checked="checked"';} ?>/>closed due to</td>
	<td width="111">poor handling</td>
	<td width="124" align="center"><input type="Submit" name="btnSubmit" value="Save"/></td>
	</tr>
	</table>
	
	
	<table width="700" id="td3">
	</table>
	
	
	<table width="700">
		<tr><td height=""></td></tr>
		<tr align="center"><th width="686">OUTSTANDING OBLIGATION (APPLICANT/CO-BORROWER)</th></tr>
	</table>
	
	
	
	<table width="700" id="td2">
	<tr>
	<td width="165">CREDITOR/BANK</td>
	<td width="131">ORIGINAL AMOUNT</td>
	<td width="102">OUTSTANDING</td>
	<td width="99">DATE GRANTED</td>
	<td width="76">MATURITY</td>
	<td width="99">EXPERIENCE</td>
	</tr>
	</table>
	
	<table width="700">
	<?php
	$sql = "Select  * From BorrowerDeduct where employeeno = '".$empID."'";
	$rs=odbc_exec($conn,$sql) or die("Error in query");	
	while (odbc_fetch_row($rs)) {
		$OutAmount = odbc_result($rs,"amount");
		$OutAmount = $OutAmount * 1;
		$OutAmount = number_format($OutAmount,2,'.',',');
		
		$sql1 = "Select  * From Loans where LoanID = '".odbc_result($rs,"loanid")."'";
		$rs1=odbc_exec($conn,$sql1) or die("Error in query");	 
		
	echo '<tr>';
	echo '<td width="165">'.odbc_result($rs,"description").'</td>';
	echo '<td width="131">'.number_format(odbc_result($rs1,"amountloan"),2,'.',',').'</td>';
	echo '<td width="102">'.$OutAmount.'</td>';
	echo '<td width="99">'.odbc_result($rs,"dategranted").'</td>';
	echo '<td width="76">'.odbc_result($rs,"datemature").'</td>';
	echo '<td width="99">'.odbc_result($rs,"remarks").'</td>';
	echo '</tr>';
	
	}
	
	
	?>
	</table>
	
	<table width="700">
		<tr align="center"><td width="686">Note: Outstanding balance will be paid off upon release of new loan</td></tr>
	</table>
	
	<table width="700" id="td2">
	<tr>
	<td width="165">Total</td>
	<td width="131">&nbsp;</td>
	<td width="102">&nbsp;</td>
	<td width="99">&nbsp;</td>
	<td width="76">&nbsp;</td>
	<td width="99">&nbsp;</td>
	</tr>
	</table>
	
	<table width="700">
		<tr><td height="5"></td></tr>
		<tr align="center"><th width="686">TRANSACTION PROPOSED</th></tr>
	</table>

	<table width="700">
	<tr>
	<td width="89">&nbsp;</td>
	<td width="599">Clean <?Php echo $Term; ?> loan.</td>
	</tr>
	<tr>
	<td width="89">&nbsp;</td>
	<td width="599">Interest at 14% p.a. discounted/simple payable semi-monthly.</td>
	</tr>
	<tr>
	<td width="89">&nbsp;</td>
	<td width="599">Monthly amortization of P<?Php echo $MonthlyAmort1; ?> payable every semi-monthly/monthly/quarterly for the </td>
	</tr>
	<tr>
	<td width="89">&nbsp;</td>
	<td width="599">duration of the loan.</td>
	</tr>
	</table>
	
	<table width="700">
	<tr>
	<td width="460">
	    <input type="Checkbox" name="chkDev" value=""  <?Php if ($DevStat == 1) { echo 'checked="checked"'; } ?>/>
	    Deviation        
		<textarea name="txtAreaDev" cols="40" rows="3" style="text-align:left; ">
         <?Php if ($DevStat == 1) { echo $Deviation; } ?>
        </textarea></td>
	<td width="228" align="center"><!--<img src="images/gretchen2.jpg" width="210" height="80" />--></td>
	</tr>
	</table>
	
	</form>
	
	<!--<table width="700">
	<tr>
	<td width="118"><strong>APPROVED BY:</strong></td>
	<td width="216" height="10"><img src="<?Php //if ($Off2 == 1) { echo 'images/DAJ_1.jpg'; } else { echo 'images/DAJ_0.jpg'; } ?>" width="165" height="65"/></td>
	<td width="72">&nbsp;</td>
	<td width="216"><img src="<?Php //if ($Off1 == 1) { echo 'images/EOJ_1.jpg'; } else { echo 'images/EOJ_0.jpg'; } ?>" width="165" height="65"/></td>
	<td width="54">&nbsp;</td>
	</tr>
	</table> -->
	
</body>
</html>
