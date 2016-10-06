			<?Php
				session_start();

				include 'connect.php';
				if (isset($_SESSION['CurUser'])) {
				$Muser =$_SESSION['CurUser'];
				}
				else
				{
				echo "Not Set";
				}
				
				$sql="SELECT * FROM Users WHERE username = '".$Muser."'";
				$rs=odbc_exec($conn,$sql);
				$Check = odbc_result($rs,"status");
				if ($Check != 0)
				{
				echo '<script>';
				echo 'document.location.href="home.html";';
				echo '</script>';
				}
				$onClick = false;
			?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<script src="Schedule.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style2 {font-size: 12px}

.styleText {text-align:right}
-->

	a {
	text-decoration:none;
	font-family:"Century Gothic";
	font-weight:bolder;
	font-size:12px;
	}

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
	color: #000099;
	}
	
input[type=date]
	{
	width: 115px;
	}
	
	
.style3 {
	font-size: 14px;
	font-weight: bold;
	font-family: "Century Gothic";
	}
td {
	font-family: "Century Gothic";
	font-size: 12px;
	font-weight: bold;
	}
	
.style7 {
	font-family: "Century Gothic";
	font-size: 12px;
	font-style:italic;
	color:#990000;
	}
	
</style>


<script type="text/javascript">

	function EditValues() {
	
	document.getElementById("IntRate").readOnly = false;
	document.getElementById("ServCharge").readOnly = false;
	document.getElementById("ProcFee").readOnly = false;
	document.getElementById("MemFee").readOnly = false;
	document.getElementById("APLFee").readOnly = false;
	document.getElementById("MRI").readOnly = false;
	document.getElementById("DocStamp").readOnly = false;
	document.getElementById("NotFee").readOnly = false;
	document.getElementById("bEdit").disabled = true;
	document.getElementById("bSave").disabled = false;
	}
	
	function SaveValues() {

	document.getElementById("IntRate").readOnly = true;
	document.getElementById("ServCharge").readOnly = true;
	document.getElementById("ProcFee").readOnly = true;
	document.getElementById("MemFee").readOnly = true;
	document.getElementById("APLFee").readOnly = true;
	document.getElementById("MRI").readOnly = true;
	document.getElementById("DocStamp").readOnly = true;
	document.getElementById("NotFee").readOnly = true;
	document.getElementById("bEdit").disabled = false;
	document.getElementById("bSave").disabled = true;
	
	var SC = document.getElementById("ServCharge").value;
	var PF = document.getElementById("ProcFee").value;
	var MF = document.getElementById("MemFee").value;
	var APL = document.getElementById("APLFee").value;
	var MRI = document.getElementById("MRI").value;
	var DS = document.getElementById("DocStamp").value;
	var NF = document.getElementById("NotFee").value;
	var TL = document.getElementById("LAmount").value;
	var Trms = document.getElementById("LTerms").value;
	
	
	

	var TotalD = parseFloat(SC) + parseFloat(PF) + parseFloat(MF) + parseFloat(APL) + parseFloat(MRI) + parseFloat(DS) + parseFloat(NF);
	var NetP = parseFloat(TL);
	
	NetP = parseFloat(TL) - parseFloat(TotalD);
	
	TotalD = TotalD.toFixed(2);
	NetP = NetP.toFixed(2);
	
	
	
	var PrincipalVal = TL / Trms;
	PrincipalVal = PrincipalVal / 2;
	
	
	
	
	
	document.getElementById("TotalD").value = TotalD;
	document.getElementById("NetP").value = NetP;
	
	
	var LAmnt = document.getElementById("LAmount").value;
	
	
	
	}
	
	
</script>

</head>

<body>
            
			
			<?Php
				$LoanIDnum = "";
				if ((isset($_REQUEST['EditLoan'])) || (isset($_REQUEST['btnUpdateBal'])) || (isset($_REQUEST['btnCheck'])) || (isset($_REQUEST['btnUpdateAmount'])) || (isset($_REQUEST['btnLoanSave'])) || (isset($_REQUEST['btnUpdateStatus']))){
					$LoanIDnum = $_REQUEST['loanIDnumber'];
				}
				
			?>
 			<form name="form1">
            <!-- Employee Break -------------------------------------------------------->
            <table>
              <tr>
			  <td><span class="style3">LOAN NUMBER  </span><input type="text" name="LoanNumber" id="LoanNumber" size="20" value="<?Php echo $LoanIDnum ?>" />
			  <input type="hidden" name="loanIDnumber" id="loanIDnumber" size="20" value="<?Php echo $LoanIDnum ?>" />
			 <input type="submit" value="Search" name="Search" onclick="javascript: form.action='LoanSearch.php'; form.method='GET';" />
			 <input type="submit" value="View" name="EditLoan" onclick="javascript: form.action='ViewLoanDetails2.php'; form.method='GET';" /></span></td>
		      </tr>

			  <tr><td height="20"></td></tr>
			  <tr> <td><span class="style7">Employee Details</span></td></tr>
              <tr><td><hr width=654px size="3" color="#666666" align="left"/></td></tr>
			  
			</table>
			</form>
			
			
			<!-- Employee Detail ---------------------------------------------------->
			<?Php
			
				include 'connect.php';
				$BorrNo = "";
				$EmpNo = "";
				$Name = "";
				$Company = "";
				$Creditratio = "";
				$Position = "";
				$Status = "";
				$EIR = "";
				$ApplicationStat = "";
				$Term = "";
				$AmountLoan = "";
				$TotalDeduction = "";
				$NetProceeds = "";
				
				$InterestRate = "";
				$serviceCharge = "";
				$ProcessingFee = "";
				$NotarialFee = "";
				$DocStamp = "";
				$MRI = "";
				$APL = "";
				$EIR = "";
				
				$DateApplied = "";
				$DateReleased = "";
				$StartDate = "";
				
				$Comaker1 = "";
				$Comaker2 = "";
				$ComakerName1 = "";
				$Comakername2 = "";
				
				$FirstDueDate = "";
				
				$CADD1 = "";
				$CADD2 = "";
				$SPOUSE = "";
				$Purpose = "";
				$OutstandingBal = "";
				$PrdCode = "";
				$CheckNum = "";
				
				if (isset($_REQUEST['btnUpdateAmount'])) {
					$LoanIDnum = $_REQUEST['loanIDnumber'];
				}
				

				if (isset($_REQUEST['btnUpdateStatus'])){
				
					$LoanIDnum = $_REQUEST['loanIDnumber'];
					$AppStatus = $_REQUEST['AppStatus'];
					
					$LIDC = substr($LoanIDnum,0,4);
					
					$DateRel = date_create();
					$DateRel = date_format($DateRel,"m/d/Y");
						
					$sql="Update Loans set LoanStatus = '".$AppStatus."', releaseDate = '".$DateRel."'  WHERE loanid = '".$LoanIDnum."'";
			 		$rs=odbc_exec($conn,$sql);
					
					if ($LIDC <> "QPBD"){
						if (($AppStatus == "Added") || ($AppStatus == "Pending") || ($AppStatus == "Approve")) {
							$sql="Update Loans set releaseDate = '".$DateRel."', UpdateStat = '1' WHERE loanid = '".$LoanIDnum."'";
							$rs=odbc_exec($conn,$sql);
						}
					}
					
				}
				
				if (isset($_REQUEST['btnLoanSave2'])) {
						$LoanIDnum1 = $_REQUEST['loanIDnumber'];
						$AmountLoan1 = $_REQUEST['LAmount'];
						$Term1 = $_REQUEST['LTerms'];
						$MonthlyInstall1 = $_REQUEST['MonthlyInstall'];
						$ServiceCharge1 = $_REQUEST['ServCharge'];
						$ProcessingFee1 = $_REQUEST['ProcFee'];
						$NotarialFee1 = $_REQUEST['NotFee'];
						$DocStamp1 = $_REQUEST['DocStamp'];
						$APL1 = $_REQUEST['APLFee'];
						$MRI1 = $_REQUEST['MRI'];
						$EIR1 = $_REQUEST['EIRSample'];
						$comakerno11 = $_REQUEST['comID1'];
						$comakerno21 = $_REQUEST['comID2'];
						$dateapplied1 = $_REQUEST['Date_Applied'];
						$NetProceeds1 = $_REQUEST['NetProceeds'];
						$releasedate1 = $_REQUEST['DATERELEASED'];
						$startamortdate1 = $_REQUEST['strDate'];
						$datemature1 = $_REQUEST['DATEMATURE'];
						$duedate1 = $_REQUEST['strDate1'];
						$duedate2 = $_REQUEST['strDate2'];
						$TotalD = $_REQUEST['TotalD'];
						$LoanAmount = $AmountLoan;
						$LoanTerm = $Term;
					
					$sql0="Update Loans set amountloan = '".$AmountLoan1."', terms = '".$Term1."', semi_mo = '".$MonthlyInstall1."', balance = '".$AmountLoan1."', otherfees = '".$ServiceCharge1."', processfee = '".$ProcessingFee1."', notarialfee = '".$NotarialFee1."', docstampfee = '".$DocStamp1."', APLfee = '".$APL1."', MRI = '".$MRI1."',  EIR = '".$EIR1."', netamount = '".$NetProceeds1."', comakerno1 = '".$comakerno11."', comakerno2 = '".$comakerno21."', dateapplied = '".$dateapplied1."', releasedate = '".$releasedate1."', startamortdate = '".$startamortdate1."', datemature = '".$datemature1."', due_date1 = '".$duedate1."', due_date2 = '".$duedate2."' WHERE loanid = '".$LoanIDnum1."'";
			 		$rs0=odbc_exec($conn,$sql0);
					
					}
				
				
				
				
				
				
				
				
				
				
				$sql="SELECT * FROM LOANS WHERE LOANID = '".$LoanIDnum."'";
			 	$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs))
				{	
					$PrdCode = odbc_result($rs,"productcode");
					$BorrNo = odbc_result($rs,"borrowerno");
					$EmpNo = odbc_result($rs,"employeeno");
					$Name = odbc_result($rs,"name");
					$Company = odbc_result($rs,"company");
					$Creditratio = odbc_result($rs,"creditratio");
					$Position = odbc_result($rs,"position");
					$Status = odbc_result($rs,"status");
					$Term = odbc_result($rs,"terms");
					$AmountLoan = number_format(odbc_result($rs,"amountloan"),2,'.','');
					$NetProceeds = number_format(odbc_result($rs,"netamount"),2,'.','');
					$InterestRate = number_format(odbc_result($rs,"rate"),4,'.','');
					$ServiceCharge = number_format(odbc_result($rs,"otherfees"),2,'.','');
					$ProcessingFee = number_format(odbc_result($rs,"processfee"),2,'.','');
					$NotarialFee = number_format(odbc_result($rs,"notarialfee"),2,'.','');
					$DocStamp = number_format(odbc_result($rs,"docstampfee"),2,'.','');
					$APL = number_format(odbc_result($rs,"APLfee"),2,'.','');
					$EIR = odbc_result($rs,"EIR");
					$MRI = odbc_result($rs,"MRI");
					$DateApplied = odbc_result($rs,"dateapplied");
					$DateReleased = odbc_result($rs,"releasedate");
					$DateMature = odbc_result($rs,"datemature");
					$FirstDueDate = odbc_result($rs,"StartAmortDate"); 
					$ApplicationStat = odbc_result($rs,"loanstatus"); 
					$CheckNum = odbc_result($rs,"checknumber");  
					$Date1 = odbc_result($rs,"due_date1");
					$Date2 = odbc_result($rs,"due_date2");
					
					
					
					$MonthlyInstall = number_format(odbc_result($rs,"semi_mo"),2,'.','');
					$OutstandingBal = number_format(odbc_result($rs,"balance"),2,'.','');
					
					$PayMode = odbc_result($rs,"mode");
					
					$Officer1  = odbc_result($rs,"Officer1"); 
					$Officer2  = odbc_result($rs,"Officer2"); 

					$Comaker1 =odbc_result($rs,"comakerno1");
					$Comaker2 = odbc_result($rs,"comakerno2");
					$Purpose  = odbc_result($rs,"loanpurpose"); 
					$comRelation1  = odbc_result($rs,"relation1"); 
					$comRelation2  = odbc_result($rs,"relation2"); 
					$comKnown1  = odbc_result($rs,"timeknown1"); 
					$comKnown2  = odbc_result($rs,"timeknown2"); 
					
					$DeductMode  = odbc_result($rs,"deductionmode");
					
					if ($DeductMode == "1") { $DeductMode = "Deducted"; }
					else if ($DeductMode == "2") { $DeductMode = "Not deducted"; }
					
					if ($PayMode == "2") { $PayMode = "Semi-Monthly"; }
					else if ($PayMode == "3") { $PayMode = "Monthly"; $MonthlyInstall = $MonthlyInstall / 2; }
					
					$DateMature = date_create($DateMature);
					$DateMature = date_format($DateMature,"Y-m-d");
					
					
					$DateApplied = date_create($DateApplied);
					$DateApplied = date_format($DateApplied,"Y-m-d");
					
					$DateReleased = date_create($DateReleased);
					$DateReleased = date_format($DateReleased,"Y-m-d");

					$FirstDueDate = date_create($FirstDueDate);
					$FirstDueDate = date_format($FirstDueDate,"Y-m-d");
					
					if (isset($_REQUEST['btnUpdateAmount'])) {
						$LoanIDnum = $_REQUEST['loanIDnumber'];
						$AmountLoan = $_REQUEST['LAmount'];
						$Term = $_REQUEST['LTerms'];
						$LoanAmount = $AmountLoan;
						$LoanTerm = $Term;
					
					include 'LoanApplication.php';
					
					$sql0="Update Loans set amountloan = '".$AmountLoan."', terms = '".$Term."', semi_mo = '".$MonthlyInstall."', principal = '".$PrincipalVal."', interest = '".$InterestVal."', grt = '".$GRTVal."', balance = '".$AmountLoan."', otherfees = '".$ServiceCharge."', processfee = '".$ProcessingFee."', notarialfee = '".$NotarialFee."', docstampfee = '".$DocStamp."', APLfee = '".$APL."', MRI = '".$MRI."', netamount = '".$NetProceeds."' WHERE loanid = '".$LoanIDnum."'";
			 		$rs0=odbc_exec($conn,$sql0);
					
					}
					
					
					echo '<input name="DATEAPPROVED" id="DATEAPPROVED" type="hidden"  size="30" value="'.odbc_result($rs,"DateApprovedOff2").'" />';	
					$TotalD = $ServiceCharge + $ProcessingFee + $NotarialFee + $DocStamp + $APL + $MRI;
					
				}
				
				
				$sql="SELECT * FROM PRODUCT WHERE productcode = '".$PrdCode."'";
			 	$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs))
				{
					$prodname = odbc_result($rs,"productname");
				}
				

				if (isset($_REQUEST['btnUpdateBal'])){
					$LoanIDnum = $_REQUEST['loanIDnumber'];
					$OutBal = $_REQUEST['OutstandingBal'];
					$sql="Update Loans set balance = '".$OutBal."' WHERE loanid = '".$LoanIDnum."'";
			 		$rs=odbc_exec($conn,$sql);
					$sql="Update Borrowerdeduct set amount = '".$OutBal."' WHERE loanid = '".$LoanIDnum."'";
			 		$rs=odbc_exec($conn,$sql);
					$sql="Select balance from Loans WHERE loanid = '".$LoanIDnum."'";
			 		$rs=odbc_exec($conn,$sql);
					$OutstandingBal = odbc_result($rs,"balance"); 
					
				}
				
				if (isset($_REQUEST['btnCheck'])){
					$LoanIDnum = $_REQUEST['loanIDnumber'];
					$checkNum = $_REQUEST['checkNum'];
					$sql="Update Loans set checknumber = '".$checkNum."' WHERE loanid = '".$LoanIDnum."'";
			 		$rs=odbc_exec($conn,$sql);
					$sql="Select checknumber from Loans WHERE loanid = '".$LoanIDnum."'";
			 		$rs=odbc_exec($conn,$sql);
					$CheckNum = odbc_result($rs,"checknumber");  
					
					
				}
				
				
				
				
				$CheckNum = trim($CheckNum);
				
				
				
			?>
			
			<form name="frmViewAccount">
            
			<input type="hidden" name="loanIDnumber" id="loanIDnumber" size="20" value="<?Php echo $LoanIDnum ?>" />
			<table>
			<tr><td width="120" align="right">Borrower No:</td>
			<td><input type="text" name="BorrowerNo" id="BorrowerNo" size = "15" value="<?Php echo $BorrNo ?>" /></td>
			<td width="120" align="right">Employee ID:</td>
			<td><input type="text" name="EmpNo" id="EmpNo"  size = "15" value="<?Php echo $EmpNo ?>" /></td></tr>
			</table>
			
			<table>
			<tr><td width="120" align="right">Borrower Name:</td>
			<td width="300"><input type="text" name="BName" id="BName"  size = "51" value="<?Php echo $Name ?>" /></td></tr>
			</table>
			
			<table>
			<tr><td width="120" align="right">Company Name:</td>
			<td width="300"><input type="text" name="ComName"id="ComName" size = "51" value="<?Php echo $Company ?>" /></td></tr>
			</table>
			
			<table>
			<tr><td width="120" align="right">Position:</td>
			<td><input type="text" name="BPos" size = "15" id="BPos" value="<?Php echo $Position ?>" /></td>
			<td width="120" align="right">Loan Status:</td>
			<td><input type="text" name="BStat" size = "15" id="BStat" value="<?Php echo $Status ?>" /></td></tr>
			</table>
			
			
			<table>
			 <tr><td height="20"></td></tr>
			 <tr> <td><span class="style7">Loan Details</td></tr>
             <tr><td><hr width=654px size="3" color="#666666" align="left"/></td></tr> 
			</table>
			<!------------------------------------------------------------------------------------------------>
			
			<table>
			<tr><td width="130" align="right">Interest Rate:</td>
			<td><input type="text" name="IntRate" id="IntRate" size = "15" value="<?Php echo $InterestRate; ?>" /></td>
			<td width="120" align="right">Terms:</td>
			<td><input type="text" name="LTerms" id="LTerms" size = "15" value="<?Php echo $Term; ?>" /></td></tr>
			</table>
			
			<?php 
			$LoanAmount = $AmountLoan;
			$LoanTerm = $Term;
			echo '<input id="TotalD" type="hidden"  size="30" value="'.$TotalD.'" />';
			
			

					$cnt = 0;
					$cntr = 0;
					$InitialAmnt = 0;
					
					$sql="SELECT * FROM LOANS WHERE LOANID = '".$LoanIDnum."'";
					$rs=odbc_exec($conn,$sql);
					while (odbc_fetch_row($rs))
					{	
						$mode =  odbc_result($rs,"mode");
						$InitialAmnt = odbc_result($rs,"netamount");
						$InitialAmnt = $InitialAmnt * (-1);
					}
					
					$y[$cnt] = $InitialAmnt;
					//echo "</br>",$y[$cnt];
					$sql="SELECT * FROM AMORTSCHED WHERE LOANID = '".$LoanIDnum."'";
					$rs=odbc_exec($conn,$sql);
					while (odbc_fetch_row($rs))
					{	
						//$cntr = $cntr  + 1;
						//if (($cntr % 2) == 0){
						$cnt = $cnt  + 1;
						$y[$cnt] = odbc_result($rs,"amortization");
						//echo "</br>",$y[$cnt];
						//}
					}
						
					include 'IRRFUNCTION.php';
		
					$iRate = IRRHelper::IRR($y);
					
					$fctr = 0;
					
					if ($mode == "2") { $fctr = 24; }
					if ($mode == "3") { $fctr = 12; }
					
					$mRate = pow(1 + $iRate,$fctr);
					$mRate = $mRate - 1;
					$mRate = $mRate * 100;
					$iRate = $iRate * 100;
					
					$mRate = number_format($mRate,2,'.','');
			
			
			?>
			
			<script src="EIRCompute2.js" type="text/javascript"></script>
			<script src="EIR.js" type="text/javascript"></script>
						  
			<table>
			<tr><td width="130" align="right">Amount Loan:</td>
			<td><input type="text" name="LAmount" id="LAmount" size = "15" value="<?Php echo $AmountLoan; ?>" />
			  <input name="btnUpdateAmount" type="submit" value="Update" onclick="javascript: frmViewAccount.action='ViewLoanDetails2.php'; frmViewAccount.method='POST';"/></td>
			<td width="120" align="right">Processing Fee:</td>
			<td><input type="text" name="ProcFee" id="ProcFee" size = "15" value="<?Php echo $ProcessingFee; ?>" /></td></tr>
			</table>
		
			<table>
			<tr><td width="130" align="right">Service Charge:</td>
			<td><input type="text" name="ServCharge" id="ServCharge" size = "15" value="<?Php echo $ServiceCharge; ?>" /></td>
			<td width="120" align="right">APL Fee:</td>
			<td><input type="text" name="APLFee" id="APLFee" size = "15" value="<?Php echo $APL; ?>" /></td></tr>
			</table>
			
			<table>
			<tr><td width="130" align="right">Documentary Stamp:</td>
			<td><input type="text" name="DocStamp" id="DocStamp" size = "15" value="<?Php echo $DocStamp; ?>" /></td>
			<td width="120" align="right">Membership Fee:</td>
			<td><input type="text" name="MemFee" id="MemFee" size = "15" value="0.00" /></td></tr>
			</table>
			
			<table>
			<tr><td width="130" align="right">Notarial Fee:</td>
			<td><input type="text" name="NotFee" id="NotFee" size = "15" value="<?Php echo $NotarialFee; ?>" /></td>
			<td width="120" align="right">EIR:</td>
			<td><input type="text" name="EIRSample" id="EIRSample" size = "15" value="<?Php echo $mRate; ?>" />
			<!--<a id="Amortization" href="#" onclick="Diminishing(); return false;" style="text-decoration:none;"> Compute</a>--></td></tr>
			</table>
			
			<table>
			<tr><td width="130" align="right">MRI:</td>
			
			<td><input type="text" name="MRI" id="MRI" size = "15" value="<?Php echo number_format($MRI,2,'.',''); ?>" /></td>
			<td width="120" align="right">Net Proceeds:</td>
			<td><input type="text" name="NetProceeds" id="NetP" size = "15" value="<?Php echo $NetProceeds ?>" /></td></tr>
			</table>
			
						
			<?Php
			
			$ComakerName1 = "";
			$ComakerName2 = "";
				
				$sql="SELECT * FROM BORROWER WHERE BORROWERNO = '".$BorrNo."'";
			 	$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs))
				{ $SPOUSE = odbc_result($rs,"spousename");
				  $BADD = odbc_result($rs,"residenceadd");
				}
				
				
				$sql="SELECT * FROM COMAKER WHERE COMAKERNO = '".$Comaker1."'";
			 	$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs))
				{ $ComakerName1 = odbc_result($rs,"lastname").", ".odbc_result($rs,"firstname")." ".odbc_result($rs,"middlename");
				$ComakerName1 = strtoupper($ComakerName1);
				echo '<input id="CNAME1" type="hidden"  size="30" value="'.$ComakerName1.'" />';
				echo '<input id="CAGE1" type="hidden"  size="30" value="'.odbc_result($rs,"age").'" />';
				echo '<input id="CSEX1" type="hidden"  size="30" value="'.odbc_result($rs,"sex").'" />';
				echo '<input id="CSTATUS1" type="hidden"  size="30" value="'.odbc_result($rs,"marstatus").'" />';
				echo '<input id="CADD1" type="hidden"  size="30" value="'.odbc_result($rs,"address").'" />';
				echo '<input id="CSPOUSE1" type="hidden"  size="30" value="'.odbc_result($rs,"spouse").'" />';
				echo '<input id="CTEL1" type="hidden"  size="30" value="'.odbc_result($rs,"telno").'" />';
				echo '<input id="CDEP1" type="hidden"  size="30" value="'.odbc_result($rs,"dependents").'" />';
				echo '<input id="CCOMPADD1" type="hidden"  size="30" value="'.odbc_result($rs,"companyAdd").'" />';
				echo '<input id="COWNRES1" type="hidden"  size="30" value="'.odbc_result($rs,"OwnRes").'" />';
				echo '<input id="CRENTAL1" type="hidden"  size="30" value="'.odbc_result($rs,"Rental").'" />';
				echo '<input id="CCOMP1" type="hidden"  size="30" value="'.odbc_result($rs,"company").'" />';
				echo '<input id="CSERVICE1" type="hidden"  size="30" value="'.odbc_result($rs,"lenghtService").'" />';
				echo '<input id="CSAL1" type="hidden"  size="30" value="'.odbc_result($rs,"salary").'" />';
				echo '<input id="CPOS1" type="hidden"  size="30" value="'.odbc_result($rs,"position").'" />';
				echo '<input id="CCURR1" type="hidden"  size="30" value="'.odbc_result($rs,"currentAccnt").'" />';
				echo '<input id="CSAV1" type="hidden"  size="30" value="'.odbc_result($rs,"savingsAccnt").'" />';
				echo '<input id="TIN1" type="hidden"  size="30" value="'.trim(odbc_result($rs,"tin")).'" />';
				echo '<input id="SSS1" type="hidden"  size="30" value="'.trim(odbc_result($rs,"sss")).'" />';
				}
				
				$sql="SELECT * FROM COMAKER WHERE COMAKERNO = '".$Comaker2."'";
			 	$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs))
				{$ComakerName2 = odbc_result($rs,"lastname").", ".odbc_result($rs,"firstname")." ".odbc_result($rs,"middlename");
				$ComakerName2 = strtoupper($ComakerName2);
				//$CADD2 = odbc_result($rs,"address");
				echo '<input id="CNAME2" type="hidden"  size="30" value="'.$ComakerName2.'" />';
				echo '<input id="CAGE2" type="hidden"  size="30" value="'.odbc_result($rs,"age").'" />';
				echo '<input id="CSEX2" type="hidden"  size="30" value="'.odbc_result($rs,"sex").'" />';
				echo '<input id="CSTATUS2" type="hidden"  size="30" value="'.odbc_result($rs,"marstatus").'" />';
				echo '<input id="CADD2" type="hidden"  size="30" value="'.odbc_result($rs,"address").'" />';
				echo '<input id="CSPOUSE2" type="hidden"  size="30" value="'.odbc_result($rs,"spouse").'" />';
				echo '<input id="CTEL2" type="hidden"  size="30" value="'.odbc_result($rs,"telno").'" />';
				echo '<input id="CDEP2" type="hidden"  size="30" value="'.odbc_result($rs,"dependents").'" />';
				echo '<input id="CCOMPADD2" type="hidden"  size="30" value="'.odbc_result($rs,"companyAdd").'" />';
				echo '<input id="COWNRES2" type="hidden"  size="30" value="'.odbc_result($rs,"OwnRes").'" />';
				echo '<input id="CRENTAL2" type="hidden"  size="30" value="'.odbc_result($rs,"Rental").'" />';
				echo '<input id="CCOMP2" type="hidden"  size="30" value="'.odbc_result($rs,"company").'" />';
				echo '<input id="CSERVICE2" type="hidden"  size="30" value="'.odbc_result($rs,"lenghtService").'" />';
				echo '<input id="CSAL2" type="hidden"  size="30" value="'.odbc_result($rs,"salary").'" />';
				echo '<input id="CPOS2" type="hidden"  size="30" value="'.odbc_result($rs,"position").'" />';
				echo '<input id="CCURR2" type="hidden"  size="30" value="'.odbc_result($rs,"currentAccnt").'" />';
				echo '<input id="CSAV2" type="hidden"  size="30" value="'.odbc_result($rs,"savingsAccnt").'" />';
				echo '<input id="TIN2" type="hidden"  size="30" value="'.trim(odbc_result($rs,"tin")).'" />';
				echo '<input id="SSS2" type="hidden"  size="30" value="'.trim(odbc_result($rs,"sss")).'" />';
				}
				
			
			echo '<script src="Comaker.js" type="text/javascript"></script>';
			echo '<table>';
			echo '<tr><td width="130" align="right">Comaker No. 1:</td>';
			echo '<td><input type="text" name="comID1" id="comID1" size = "15" value="'.$Comaker1.'" /></td>';
			echo '<td width="120" align="right">Comaker Name 1:</td>';
			echo '<td><input type="text" name="comName1" id="comName1" size = "25" value="'.$ComakerName1.'" />';
			echo '<a id="Amortization" href="#" onclick="Comaker1();return false;" style="text-decoration:none;">View</a></td></tr>';
			echo '</table>';
			
			echo '<script src="Comaker2.js" type="text/javascript"></script>';
			echo '<table>';
			echo '<tr><td width="130" align="right">Comaker No. 2:</td>';
			echo '<td><input type="text" name="comID2" id="comID2" size = "15" value="'.$Comaker2.'" /></td>';
			echo '<td width="120" align="right">Comaker Name 2:</td>';
			echo '<td><input type="text" name="comName2" id="comName2" size = "25" value="'.$ComakerName2.'" />';
			echo '<a id="Amortization" href="#" onclick="Comaker2();return false;" style="text-decoration:none;">View</a></td></tr>';
			echo '</table>';
			
			?>
			
			<table>
			<tr><td width="130" align="right">Date Applied:</td>
			<td><input type="date" name="Date_Applied" id="DateApplied" value="<?Php echo $DateApplied ?>" /></td>
			<td width="120" align="right">Amort Start Date:</td>
			<td><input type="date" name="strDate"  id="strDate" value="<?Php echo $FirstDueDate ?>" /></td></tr>
			</table>
			
			<table>
			<tr><td width="130" align="right">Date Released:</td>
			<td><input type="date" name="DATERELEASED"  id="DATERELEASED" value="<?Php echo $DateReleased ?>" /></td>
			<td width="120" align="right">Monthly Installment:</td>
			<td><input type="text" name="MonthlyInstall"  size = "15" id="MonthlyInstall" value="<?Php echo $MonthlyInstall * 2; ?>" /></td></tr>
			</table>
			
			<table>
			<tr><td width="130" align="right">Date Mature:</td>
			<td><input type="date" name="DATEMATURE"  id="DATEMATURE" value="<?Php echo $DateMature ?>" /></td>
			<td width="120" align="right">Outstanding Bal.:</td>
			<td><input type="text" name="OutstandingBal"  size = "15" id="OutstandingBal" value="<?Php echo $OutstandingBal ?>" />
			<input name="btnUpdateBal" type="Submit" value="Update" onclick="javascript: frmViewAccount.action='ViewLoanDetails2.php'; frmViewAccount.method='POST';"/></td></tr>
			</table>
			
			
			<table>
			<tr><td width="130" align="right">Amortization Date 1:</td>
			<td><input type="text" name="strDate_1"  size = "15" id="strDate1" value="<?Php echo $Date1 ?>" /></td>
			<td width="120" align="right">Amortization Date 2:</td>
			<td><input type="text" name="strDate_2"  size = "15" id="strDate2" value="<?Php echo $Date2 ?>" />
            <input name="btnLoanSave2" type="Submit" value="Save" onclick="javascript: frmViewAccount.action='ViewLoanDetails2Save.php'; frmViewAccount.method='POST';"/>
            </td></tr>
			</table>
			
			<!--<table>
			<tr><td width="130" align="right"></td><td></td>
			<td width="120" align="right"></td>
			<td><input name="btnEdit" id="bEdit" type="button" onclick="EditValues()" value="Edit" />
                <input name="btnSave" id="bSave" type="button" onclick="SaveValues()" value="Save" disabled="disabled"/></td></tr>
			</table>-->
			

			
			<table>
			 <tr><td height="20"></td></tr>
			 <tr><td><span class="style7">Loan Documents</span></td></tr>
			</table>
			<table>	
             <tr><td><hr width=654px size="3" color="#666666" align="left"/></td></tr> 
			</table>
			<!------------------------------------------------------------------------------------------------>
			
			<table width="655">
					
					<?Php
					$LoanIDCode = substr($LoanIDnum,0,4);
				 	$LoanIDSub = substr($LoanIDnum,-9);
				 	$LoanIDCode = strtoupper($LoanIDCode);
					$AmortSched = "";
					echo '<input id="subCode" type="hidden"  size="30" value="'.$LoanIDCode.'" required />'; 
				 	echo '<input id="subCode" type="hidden"  size="30" value="'.$LoanIDSub.'" required />'; 
					include 'LoanApplication.php';
					?>
		
	
			<input name="Amortz" id="Amortz" type="hidden" value="<?Php echo ($PrincipalVal + $InterestVal + $GRTVal) ?>" />
			<input name="strDate1" id="strDate1" type="hidden" value="<?Php echo $Date1 ?>" />
			<input name="strDate2" id="strDate2" type="hidden" value="<?Php echo $Date2 ?>" />
			<input name="ProductCode" id="ProductCode" type="hidden" value="<?Php echo $PrdCode ?>" />
			<input name="ProdName" id="ProdName" type="hidden" value="<?Php echo $prodname ?>" />
			<input name="PRDName" id="PRDName" type="hidden" value="<?Php echo $prodname ?>" />
			<input name="BAdd1" id="BAdd1" type="hidden" value="<?Php echo $CADD1 ?>" />
			<input name="BAdd2" id="BAdd2" type="hidden" value="<?Php echo $CADD2 ?>" />
			<input name="BSpouse" id="BSpouse" type="hidden" value="<?Php echo $SPOUSE ?>" />
			<input name="BAdd" id="BAdd" type="hidden" value="<?Php echo $BADD ?>" />
			<input name="LPURPOSE" id="LPURPOSE" type="hidden" value="<?Php echo $Purpose ?>" />
			<input name="BrName" id="BrName" type="hidden" value="<?Php echo $Name ?>" />
			
			<input name="COMREL1" id="COMREL1" type="hidden" value="<?Php echo trim($comRelation1) ?>" />
			<input name="COMREL2" id="COMREL2" type="hidden" value="<?Php echo $comRelation2 ?>" />
			<input name="COMKNOWN1" id="COMKNOWN1" type="hidden" value="<?Php echo trim($comKnown1) ?>" />
			<input name="COMKNOWN2" id="COMKNOWN2" type="hidden" value="<?Php echo $comKnown2 ?>" />

			<input name="DeductM" id="DeductM" type="hidden" value="<?Php echo $DeductMode ?>" />
			<input name="EIRSample1" id="EIRSample" type="hidden" value="1" />
			<input name="payFrequency" id="payFrequency" type="hidden" value="<?Php echo $PayMode ?>" />
			
			<input name="LoanAmnt" id="LoanAmnt" type="hidden" value="<?Php echo $AmountLoan ?>" />			
			<input name="NetP" id="NetP" type="hidden" value="<?Php echo $NetProceeds ?>" />
			<input name="TotalD" id="TotalD" type="hidden" value="<?Php echo $TotalD ?>" />
			
			<input name="LoanAmnt" id="LoanAmnt" type="hidden" value="<?Php echo $AmountLoan ?>" />			
			<input name="NetP" id="NetP" type="hidden" value="<?Php echo $NetProceeds ?>" />
			<input name="TotalD" id="TotalD" type="hidden" value="<?Php echo $TotalD ?>" />
			<input name="AmortView" id="AmortView" type="hidden" value="0" />
			
			
			
			
			<script src="Schedule_AddOn.js" type="text/javascript"></script>
			<script src="Schedule_Dim.js" type="text/javascript"></script>
			<script src="PromissoryNote.js" type="text/javascript"></script>
			<script src="towords.js" type="text/javascript"></script>
			<script src="Disclosure.js" type="text/javascript"></script>
			<script src="ADA.js" type="text/javascript"></script>
			
			<script src="Application.js" type="text/javascript"></script>
			<script src="NumFormat.js" type="text/javascript"></script>
			<script src="NumConvertion.js" type="text/javascript"></script>
			<script src="SampleData.js" type="text/javascript"></script>
			<script src="NewWindow.js" type="text/javascript"></script>
            <script src="AmortWindow.js" type="text/javascript"></script>
			
				<?Php 
				
				 
				 
				 
				 
				 if ($LoanIDCode == "QSAL") {
				 	if ($PayMode == "Monthly" ){
				 	$AmortSched = "Amortization_DimMonthly();return false;"; }
					else {
					$AmortSched = "Amortization_Dim();return false;"; }
					}
				 else { $AmortSched = "Amortization_AddOn();return false;"; }
					


				$sqlN = "Select * From Borrower where borrowerno = '".$BorrNo."'";
				$rsN = odbc_exec($conn,$sqlN);
				$BrN = odbc_result($rsN,"firstname")." ".odbc_result($rsN,"mi")." ".odbc_result($rsN,"lastname");
				$BrN = strtoupper($BrN);
				
				echo '<input name="FORMATNAME" id="FORMATNAME" type="hidden"  size="30" value="'.$BrN.'" />';
				echo '<input name="BDATE" id="BDATE" type="hidden"  size="30" value="'.odbc_result($rsN,"birthdate").'" />';
				echo '<input name="BPLACE" id="BPLACE" type="hidden"  size="30" value="'.odbc_result($rsN,"birthplace").'" />';
				echo '<input name="CSTATUS" id="CSTATUS" type="hidden"  size="30" value="'.odbc_result($rsN,"civilstatus").'" />';
				echo '<input name="SPOUSE" id="SPOUSE" type="hidden"  size="30" value="'.odbc_result($rsN,"spousename").'" />';
				echo '<input name="SPOUSE" id="NOCHILDREN" type="hidden"  size="30" value="'.odbc_result($rsN,"NoChildren").'" />';	
				echo '<input name="SPOUSE" id="RADD" type="hidden"  size="30" value="'.odbc_result($rsN,"residenceadd").'" />';
				echo '<input name="SPOUSE" id="TELNO" type="hidden"  size="30" value="'.odbc_result($rsN,"TelNo").'" />';
				echo '<input name="SPOUSE" id="RESOWN" type="hidden"  size="30" value="'.odbc_result($rsN,"ResOwner").'" />';
				echo '<input name="SPOUSE" id="DEPOSITOR" type="hidden"  size="30" value="'.odbc_result($rsN,"Depositor").'" />';
				echo '<input name="SPOUSE" id="LATESTBAL" type="hidden"  size="30" value="'.odbc_result($rsN,"LatestBalance").'" />';
				echo '<input name="SPOUSE" id="EDUC" type="hidden"  size="30" value="'.odbc_result($rsN,"Education").'" />';
				echo '<input name="SPOUSE" id="BACCOUNT" type="hidden"  size="30" value="'.odbc_result($rsN,"BankAccount").'" />';
				echo '<input name="SPOUSE" id="EMPLOYER" type="hidden"  size="30" value="'.odbc_result($rsN,"Employer").'" />';
				echo '<input name="SPOUSE" id="COMPADD" type="hidden"  size="30" value="'.odbc_result($rsN,"CompanyAdd").'" />';
				echo '<input name="SPOUSE" id="SERVICE" type="hidden"  size="30" value="'.odbc_result($rsN,"Service").'" />';
				echo '<input name="SPOUSE" id="SALARY" type="hidden"  size="30" value="'.odbc_result($rsN,"Salary").'" />';
				echo '<input name="SPOUSE" id="POSITION" type="hidden"  size="30" value="'.odbc_result($rsN,"Position").'" />';			
				echo '<input name="SPOUSE" id="STATUS" type="hidden"  size="30" value="'.odbc_result($rsN,"Status").'" />';				
				echo '<input name="SPOUSE" id="RENTAL" type="hidden"  size="30" value="'.odbc_result($rsN,"rental").'" />';	
				
				
				echo '<input id="Officer1" type="hidden"  size="30" value="'.$Officer1.'" />';
				echo '<input id="Officer2" type="hidden"  size="30" value="'.$Officer2.'" />';
									
				?>
			
			<tr><td width="243" align="left">Application Form:</td>
			<td width="400"><a id="Amortization" href="#" onclick="NewApp();return false;" style="text-decoration:none;">View</a></td>
			</tr>
			
			<tr><td width="243" align="left">Promissory Note:</td>
			<td><a id="Amortization" href="#" onclick="Promissory();return false;" style="text-decoration:none;">View</a></div></td></tr>
			
			<!--<tr><td width="243" align="left">Amortization Schedule:</td>
			<td><a id="Amortization" href="#" onclick="<?Php //echo $AmortSched ?>" style="text-decoration:none;">View</a></div></td></tr>
            
            <tr><td width="243" align="left">Amortization Schedule:</td>
            <?Php //$BIDencode = base64_encode($BorrNo); ?>
			<td><a id="Amortization" href="Amortization.php?LoanID=<?Php //echo $LoanIDnum ?>" target="_blank" >View</a></div></td></div></td></tr>	
            -->
            
            <tr><td width="243" align="left">Amortization Schedule:</td>
            <?Php $BIDencode = base64_encode($BorrNo); ?>
			<td><a id="Amortization" href="#" onclick="NewAmort();return false;" style="text-decoration:none;">View</a></div></td></tr>
            
             <tr><td width="243" align="left">Amortization Schedule2:</td>
            <?Php $BIDencode = base64_encode($BorrNo); ?>
			<td><a id="Amortization" href="#" onclick="Amortization_DimMonthly();return false;" style="text-decoration:none;">View</a></div></td></tr>
			
			<tr><td width="243" align="left">Disclosure Statement:</td>
			<td><a id="Amortization" href="#" onclick="Disclosure2();return false;" style="text-decoration:none;">View</a></div></td></tr>
			
			<tr><td width="243" align="left">Autmotic Debit Arrangement:</td>
			<td><a id="Amortization" href="#" onclick="ADA();return false;" style="text-decoration:none;">View</a></div></td></tr>
			
			<tr><td width="243" align="left">Evaluation Sheet</td>
			<?Php $BIDencode = base64_encode($BorrNo); ?>
			<td><a id="Amortization" href="Evaluation.php?BorID=<?Php echo $BIDencode ?>&Amnt=<?Php echo $AmountLoan ?>&Term=<?Php echo $LoanTerm ?>&DateProc=<?Php echo date("m/d/Y"); ?>&Monthly=<?Php echo $MonthlyInstall ?>&LoanID=<?Php echo $LoanIDnum ?>" target="_blank" >View</a></div></td></tr>	
            	
            <tr><td width="243" align="left">Deed of Assignment</td>
			<?Php $BIDencode = base64_encode($BorrNo); ?>
			<td><a id="Amortization" href="DeedofAssignment.php?BorID=<?Php echo $BIDencode ?>&LoanID=<?Php echo $LoanIDnum ?>" target="_blank" >View</a></div></td></tr>
            
            <tr><td width="243" align="left">Authority to Deduct</td>
			<td><a id="Amortization" href="AuthoritytoDeduct.php?LoanID=<?Php echo $LoanIDnum ?>" target="_blank" >View</a></div></td></tr>

            
             <tr><td width="243" align="left">Deed of Undertaking</td>
			<td><a id="Amortization" href="DeedofUndertaking.php?LoanID=<?Php echo $LoanIDnum ?>" target="_blank" >View</a></div></td></tr>
			</table>
            
            
            <!--<table>
            <tr><td width="243" align="left">Amortization 2</td>
			<?Php //$BIDencode = base64_encode($BorrNo); ?>
			<td><a id="Amortization" href="Amortization.php?LoanID=<?Php //echo $LoanIDnum ?>" target="_blank" >View</a></div></td></tr>-->
			</table>
			
						
			
			<table>	
             <tr><td><hr width=654px size="3" color="#666666" align="left"/></td></tr> 
			</table>
			
            
			<table>
			<tr>
			<td width="198" align="right">Application Status:</td>
			<td width="137"><select name="AppStatus" style="width:110px">
				<option value="Added" <?Php if ($ApplicationStat == "Added") { echo 'selected="selected"'; } ?> >Added</option>
				<option value="Pending" <?Php if ($ApplicationStat == "Pending") { echo 'selected="selected"'; } ?>>Pending</option>
				<option value="Approved" <?Php if ($ApplicationStat == "Approved") { echo 'selected="selected"'; } ?>>Approved</option>
				<option value="Cancelled" <?Php if ($ApplicationStat == "Cancelled") { echo 'selected="selected"'; } ?>>Cancelled</option>
				<option value="Rejected" <?Php if ($ApplicationStat == "Rejected") { echo 'selected="selected"'; } ?>>Rejected</option>
				</select>
			 </td>
			 <td width="139"><input name="btnUpdateStatus" type="Submit" value="Save" onclick="javascript: frmViewAccount.action='ViewLoanDetails2.php'; frmViewAccount.method='POST';"/></td></tr>
			 
			  <tr>
			<td width="198" align="right">Check Number: </td>
			<td width="137"><input name="checkNum" size="7" type="text" value="<?Php echo $CheckNum; ?>" <?Php if ($ApplicationStat != "Approved") { echo 'readonly'; } ?>/>
			<input name="btnCheck" type="Submit" value="Update" onclick="javascript: frmViewAccount.action='ViewLoanDetails2.php'; frmViewAccount.method='POST';" <?Php if ($ApplicationStat != "Approved") { echo 'disabled="disabled"'; } ?> /></td>
			<td width="139">
			
			 <?Php if ($ApplicationStat != "Approved") {
			echo '<a id="Amortization" href="voucher.php?LoanID='.$LoanIDnum.'" style="text-decoration:none;" target="_blank">View Voucher</a>'; } 
			else if ($ApplicationStat == "Approved") {
			echo '<a id="Amortization" href="voucher.php?LoanID='.$LoanIDnum.'" style="text-decoration:none;" target="_blank">View Voucher</a>'; }
			
			?>
			
			
			</td>
			 </tr>
			 </table>
			 
		</form>
			
			
</body>
</html>