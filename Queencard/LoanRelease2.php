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
				echo 'document.location.href="homeApprove.html";';
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
	border:none;
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
	
.style8 {
	font-family: "Century Gothic";
	font-size: 14px;
	font-style:italic;
	color: #FF0000;
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
			
            
			<table>
			 <tr> <td align="center"><span class="style8">LOAN RELEASE DETAILS</td></tr>
             <tr><td><hr width=654px size="1" color="#666666" align="left"/></td></tr> 
             <tr><td height="20"></td></tr>
			</table>
			<!------------------------------------------------------------------------------------------------>
			
            
            
            <?Php
				
				
				$LoanIDnum = "";
				if (isset($_REQUEST['submitBorApprove'])){
					$LoanIDnum = $_REQUEST['LoanIDnum'];
				}
				if ((isset($_REQUEST['btnUpdateAmount'])) || (isset($_REQUEST['btnCheck'])) ||  (isset($_REQUEST['btnReleaseStatus']))){
					$LoanIDnum = $_REQUEST['loanIDnumber'];
				}
			?>
		
 			<form name="form1">
            <!-- Employee Break -------------------------------------------------------->
            <table>
              <tr>
			  <td><span class="style3">LOAN NUMBER  </span><input type="text" name="LoanNumber" id="LoanNumber" size="20" value="<?Php echo $LoanIDnum; ?>" />
			  <input type="hidden" name="loanIDnumber" id="loanIDnumber" size="20" value="<?Php echo $LoanIDnum; ?>" />
			 <!--<input type="submit" value="Search" name="Search" onclick="javascript: form.action='LoanSearch.php'; form.method='GET';" />
			 <input type="submit" value="View" name="EditLoan" onclick="javascript: form.action='ViewLoanDetails2.php'; form.method='GET';" />-->
             </span></td>
		      </tr>

			  <tr><td height="20"></td></tr>
			  <tr> <td><span class="style7">Employee Details</span></td></tr>
              <tr><td><hr width=654px size="3" color="#666666" align="left"/></td></tr>
			  
			</table>
			</form>
			
			
			<!-- Employee Detail ---------------------------------------------------->
			<?Php
			
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
					$ReleaseStat = odbc_result($rs,"ReleaseStat"); 
	
					$Date1 = odbc_result($rs,"due_date1");
					$Date2 = odbc_result($rs,"due_date2");
					
					$MonthlyInstall = number_format(odbc_result($rs,"semi_mo"),2,'.','');
					$OutstandingBal = number_format(odbc_result($rs,"balance"),2,'.','');
					
					$ProcessingFeeView = $ProcessingFee + $MRI;
					$ProcessingFeeView = number_format($ProcessingFeeView,2,'.','');
			
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
					else if ($PayMode == "3") { $PayMode = "Monthly"; }
					
					$DateMature = date_create($DateMature);
					$DateMature = date_format($DateMature,"Y-m-d");
					
					
					$DateApplied = date_create($DateApplied);
					$DateApplied = date_format($DateApplied,"Y-m-d");
					
					$DateReleased = date_create($DateReleased);
					$DateReleased = date_format($DateReleased,"Y-m-d");

					$FirstDueDate = date_create($FirstDueDate);
					$FirstDueDate = date_format($FirstDueDate,"Y-m-d");
					
					$sql="SELECT * FROM BORROWER WHERE BORROWERNO = '".$BorrNo."'";
			 		$rs0=odbc_exec($conn,$sql);
					while (odbc_fetch_row($rs0))
					{
						$GrossSal = number_format(odbc_result($rs0,"salary"),2,'.',',');
						$NetSal = number_format(odbc_result($rs0,"netsal"),2,'.',',');
						
					}
				
					if (isset($_REQUEST['btnUpdateAmount']))
					{
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
				
				

				
				$sql="SELECT * FROM COMPANY WHERE Branchname = '".$Company."'";
			 	$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs))
				{
					//$Date1 = odbc_result($rs,"Date1");
					//$Date2 = odbc_result($rs,"Date2");
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
				
				if (isset($_REQUEST['btnReleaseStatus'])){
				
					$LoanIDnum = $_REQUEST['loanIDnumber'];
					
					$ReDate = date_create();
					$ReDate = date_format($ReDate,"m/d/Y");
					$sql="Update Loans set releaseStat = 'Yes', released = '1', releaseDate = '".$ReDate."' WHERE loanid = '".$LoanIDnum."'";
			 		$rs=odbc_exec($conn,$sql);
					
					$sql="Update Loans set UpdateStat = '1' WHERE loanid = '".$LoanIDnum."'";
			 		$rs=odbc_exec($conn,$sql);
					
					$sql="SELECT * FROM LOANS WHERE LOANID = '".$LoanIDnum."'";
			 		$rs=odbc_exec($conn,$sql);
					$ReleaseStat = odbc_result($rs,"ReleaseStat"); 
					 
					echo '<script type="text/javascript">';
					echo 'alert("Loan successfully released.")';
					echo '</script>';
					
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
			<tr><td width="120" align="right">Gross Salary:</td>
			<td><input type="text" name="BPos" size = "15" id="BPos" value="<?Php echo $GrossSal ?>" /></td>
			<td width="120" align="right">Position:</td>
			<td><input type="text" name="BPos" size = "15" id="BPos" value="<?Php echo $Position ?>" /></td></tr>
			</table>
            
			<table>
			<tr>
            <td width="120" align="right">Net Salary:</td>
			<td><input type="text" name="BStat" size = "15" id="BStat" value="<?Php echo $NetSal ?>" /></td>
			<td width="120" align="right"></td>
			<td></td></tr>
			</table>
            
            
			
			
			<table>
			 <tr><td height="20"></td></tr>
			 <tr> <td><span class="style7">Loan Details</td></tr>
             <tr><td><hr width=654px size="3" color="#666666" align="left"/></td></tr> 
			</table>
			<!------------------------------------------------------------------------------------------------>
			
            <?Php 
			
					
					
			?>
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
			?>
			
            
			<script src="EIRCompute2.js" type="text/javascript"></script>
			<script src="EIR.js" type="text/javascript"></script>
            
						  
			<table>
			<tr><td width="130" align="right">Amount Loan:</td>
			<td><input type="text" name="LAmount" id="LAmount" size = "15" value="<?Php echo $AmountLoan; ?>" /></td>
			<td width="120" align="right">Processing Fee:</td>
			<td><input type="text" name="ProcFee" id="ProcFeeView" size = "15" value="<?Php echo $ProcessingFeeView; ?>" />
            <input type="hidden" name="ProcFee" id="ProcFee" size = "15" value="<?Php echo $ProcessingFee; ?>" /></td></tr>
			</table>
		
			<table>
			<tr><td width="130" align="right">Service Charge:</td>
			<td><input type="text" name="ServCharge" id="ServCharge" size = "15" value="<?Php echo $ServiceCharge; ?>" /></td>
			<td width="130" align="right">Documentary Stamp:</td>
			<td><input type="text" name="DocStamp" id="DocStamp" size = "15" value="<?Php echo $DocStamp; ?>" /></td></tr>
			</table>
			
			<table>
			<tr><td width="130" align="right"></td>
			<td><input type="hidden" name="APLFee" id="APLFee" size = "15" value="<?Php echo $APL; ?>" /></td>
			<td width="120" align="right"></td>
			<td><input type="hidden" name="MemFee" id="MemFee" size = "15" value="0.00" /></td></tr>
			</table>
			
			<table>
			<tr><td width="130" align="right">Notarial Fee:</td>
			<td><input type="text" name="NotFee" id="NotFee" size = "15" value="<?Php echo number_format($NotarialFee,2,'.',''); ?>" /></td>
            <td width="120" align="right">Net Proceeds:</td>
			<td><input type="text" name="NetProceeds" id="NetP" size = "15" value="<?Php echo $NetProceeds ?>" /></td></tr>
			</table>
			
			<table>
			<tr><td width="130" align="right"></td>
			<td><input type="hidden" name="MRI" id="MRI" size = "15" value="<?Php echo $MRI; ?>" /></td>

			<td width="120" align="right"></td>
			<td><input type="hidden" name="EIRSample" id="EIRSample" size = "15" value="<?Php echo $EIR.""; ?>" /></td></tr>
			</table>
            
            <table>
			<tr><td width="130" align="right" height="10"></td>
			<td></td>
			<td width="120" align="right"></td>
			<td></td></tr>
			</table>
			
						
			<?Php
			
			$ComakerName1 = "";
			$ComakerName2 = "";
				
				$sql="SELECT * FROM BORROWER WHERE BORROWERNO = '".$BorrNo."'";
			 	$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs))
				{ $SPOUSE = odbc_result($rs,"spousename");
				  $BADD = odbc_result($rs,"residenceadd");
				  $empID  = odbc_result($rs,"employeeno");
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
			
			<!--
			<table>
			<tr><td width="130" align="right">Date Applied:</td>
			<td><input type="hidden" name="BorrowNo" id="" value="<?Php //echo $DateApplied ?>" readonly="readonly"/></td>
			<td width="120" align="right">Amort Start Date:</td>
			<td><input type="hidden" name="strDate"  id="strDate" value="<?Php //echo $FirstDueDate ?>" readonly="readonly"/></td></tr>
			</table>
			
            
			<table>
			<tr><td width="130" align="right">Date Released:</td>
			<td><input type="date" name="DATERELEASED"  id="DATERELEASED" value="<?Php //echo $DateReleased ?>" readonly="readonly"/></td>
			<td width="120" align="right">Monthly Installment:</td>
			<td><input type="text" name="MonthlyInstall"  size = "15" id="MonthlyInstall" value="<?Php //echo $MonthlyInstall * 2; ?>" readonly="readonly"/></td></tr>
			</table> 
			
			<table>
			<tr><td width="130" align="right">Date Mature:</td>
			<td><input type="date" name="DATEMATURE"  id="DATEMATURE" value="<?Php //echo $DateMature ?>" /></td>
			<td width="120" align="right">Outstanding Bal.:</td>
			<td><input type="text" name="OutstandingBal"  size = "15" id="OutstandingBal" value="<?Php //echo $OutstandingBal ?>" />
			</td></tr>
			</table> 
		
			
			<table>
			<tr><td width="130" align="right"></td>
			<td><input type="text" name="strDate1"  size = "15" id="strDate1" value="<?Php //echo $Date1; ?>" /></td>
			<td width="120" align="right"></td>
			<td><input type="text" name="strDate2"  size = "15" id="strDate2" value="<?Php //echo $Date2; ?>" /></td></tr>
			</table>
			

			<!--<table>
			<tr><td width="130" align="right"></td><td></td>
			<td width="120" align="right"></td>
			<td><input name="btnEdit" id="bEdit" type="button" onclick="EditValues()" value="Edit" />
                <input name="btnSave" id="bSave" type="button" onclick="SaveValues()" value="Save" disabled="disabled"/></td></tr>
			</table>-->
			
            
            
            
            
            
            
            
            
            
            <input type="hidden" name="BorrowNo" id="" value="<?Php echo $DateApplied ?>" />
            <input type="hidden" name="strDate"  id="strDate" value="<?Php echo $FirstDueDate ?>" />
            <input type="hidden" name="DATERELEASED"  id="DATERELEASED" value="<?Php echo $DateReleased ?>" />
            <input type="hidden" name="MonthlyInstall" size="15" id="MonthlyInstall" value="<?Php echo $MonthlyInstall * 2; ?>"/>
            <input type="hidden" name="DATEMATURE"  id="DATEMATURE" value="<?Php echo $DateMature ?>" />
            <input type="hidden" name="OutstandingBal"  size = "15" id="OutstandingBal" value="<?Php echo $OutstandingBal ?>" />
		
            <table>
			 <tr><td height="20"></td></tr>
			 <tr> <td><span class="style7">Outstanding Obligations</td></tr>
             <tr><td><hr width=654px size="3" color="#666666" align="left"/></td></tr> 
			</table>
			<!------------------------------------------------------------------------------------------------>
            
            <table width="705">
					<tr>
					<td width="180"><strong>Name of Creditor</strong></td>
					<td width="120" align="center"><strong>Outstanding Balance</strong></td>
					<td width="109" align="center"><strong>Date Granted</strong></td>
					<td width="91" align="center"><strong>Date Mature</strong></td>
					<td width="134" align="center"><strong>Remarks</strong></td>
					</tr>
			</table>
            
					<table width="705">
					<?php
					$sql = "Select  * From BorrowerDeduct where employeeno = '".$empID."'";
					$rs=odbc_exec($conn,$sql) or die("Error in query");	
					while (odbc_fetch_row($rs)) {

						$OutB = odbc_result($rs,"amount") * 1;
						echo '<tr>';
						echo '<td width="180">'.odbc_result($rs,"description").'</td>';
						echo '<td width="120" align="center">'.number_format($OutB,2,'.',',').'</td>';
						echo '<td width="109" align="center">'.odbc_result($rs,"dategranted").'</td>';
						echo '<td width="91" align="center">'.odbc_result($rs,"datemature").'</td>';
						echo '<td width="134" align="center">'.odbc_result($rs,"remarks").'</td>';
						echo '</tr>';
					}
					?>
					</table>
            

			
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
			<input name="EIRSample" id="EIRSample" type="hidden" value="1" />
			<input name="payFrequency" id="payFrequency" type="hidden" value="<?Php echo $PayMode ?>" />
			
			<input name="LoanAmnt" id="LoanAmnt" type="hidden" value="<?Php echo $AmountLoan ?>" />			
			<input name="NetP" id="NetP" type="hidden" value="<?Php echo $NetProceeds ?>" />
			<input name="TotalD" id="TotalD" type="hidden" value="<?Php echo $TotalD ?>" />
			
			<input name="LoanAmnt" id="LoanAmnt" type="hidden" value="<?Php echo $AmountLoan ?>" />			
			<input name="NetP" id="NetP" type="hidden" value="<?Php echo $NetProceeds ?>" />
			<input name="TotalD" id="TotalD" type="hidden" value="<?Php echo $TotalD ?>" />
            <input name="AmortView" id="AmortView" type="hidden" value="1" />
			
			
			
			
			
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
            <script src="CommentWindow.js" type="text/javascript"></script>
			
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
			<td><a id="Amortization" href="#" onclick="Promissory();return false;" style="text-decoration:none;" >View</a></div></td></tr>
			
			<tr><td width="243" align="left">Amortization Schedule:</td>
			<td><a id="Amortization" href="#" onclick="<?Php echo $AmortSched ?>" style="text-decoration:none;">View</a></div></td></tr>
			
			<tr><td width="243" align="left">Disclosure Statement:</td>
			<td><a id="Amortization" href="#" onclick="Disclosure2();return false;" style="text-decoration:none;">View</a></div></td></tr>
			
			<tr><td width="243" align="left">Autmotic Debit Arrangement:</td>
			<td><a id="Amortization" href="#" onclick="ADA();return false;" style="text-decoration:none;">View</a></div></td></tr>
			
			<tr><td width="243" align="left">Evaluation Sheet</td>
			<?Php $BIDencode = base64_encode($BorrNo); ?>
			<td><a id="Amortization" href="EvaluationPrint.php?BorID=<?Php echo $BIDencode ?>&Amnt=<?Php echo $AmountLoan ?>&Term=<?Php echo $LoanTerm ?>&DateProc=<?Php echo date("m/d/Y"); ?>&Monthly=<?Php echo $MonthlyInstall ?>&LoanID=<?Php echo $LoanIDnum ?>" target="_blank" >View</a></div></td>
            <tr><td width="243" align="left">Credit Score</td>
			<?Php $BIDencode = base64_encode($BorrNo); ?>
			<td>
            <a href="CreditScorePrintView.php?BorID=<?Php echo $BorrNo; ?>" target="_blank">View</a></div></td></tr>
			</table>
			
            <table>
            <tr><td width="243" align="left">Deed of Assignment</td>
			<?Php $BIDencode = base64_encode($BorrNo); ?>
			<td><a id="Amortization" href="DeedofAssignment.php?BorID=<?Php echo $BIDencode ?>&LoanID=<?Php echo $LoanIDnum ?>" target="_blank" >View</a></div></td></tr>
			</table>
			
            
            
            <table>
			 <tr><td height="20"></td></tr>
			 <tr><td><span class="style7">Approval Status</span></td></tr>
			</table>
			<table>	
             <tr><td><hr width=654px size="3" color="#666666" align="left"/></td></tr> 
			</table>
			<!------------------------------------------------------------------------------------------------>
			
            
            <table>
			<tr><td width="300" align="right">Enrico O. Jacomille</td>
			<td><input type="text" name="LAmount" id="LAmount" size = "30" value="<?Php if ($Officer1 == "1") { echo 'Approved'; } else if ($Officer1 == "2") { echo 'Rejected'; } else { echo '---'; }?>" /></td></tr>
            
			<tr><td width="300" align="right">Dante A. Javellana</td>
			<td><input type="text" name="ProcFee" id="ProcFeeView" size = "30" value="<?Php if ($Officer2 == "1") { echo 'Approved'; } else if ($Officer2 == "2") { echo 'Rejected'; } else { echo '---'; }?>" /></td></tr>
			</table>
            
            
            <table>	
             <tr><td><hr width=654px size="3" color="#666666" align="left"/></td></tr> 
			</table>
            
            
            
            
            
			
			<table>
			<tr>
			<td width="198" align="right">Release Status: </td>
			<td width="59"> <?Php echo $ReleaseStat; ?></td>
			<td width="217"><input name="btnReleaseStatus" type="Submit" value="Release" onclick="javascript: frmViewAccount.action='LoanRelease2.php'; frmViewAccount.method='POST';"/></td></tr>
			 </table>
             
             <table>
			  <tr>
			<td width="198" align="right">Check Number: </td>
			<td width="137"><input name="checkNum" size="7" type="text" value="<?Php echo $CheckNum; ?>" <?Php if ($ApplicationStat != "Approved") { echo 'readonly'; } ?>/>
			<input name="btnCheck" type="Submit" value="Update" onclick="javascript: frmViewAccount.action='LoanRelease2.php'; frmViewAccount.method='POST';" <?Php if ($ApplicationStat != "Approved") { echo 'disabled="disabled"'; } ?> /></td>
			<td width="139">
			
			 <?Php if ($ApplicationStat != "Approved") {
			echo '<a id="Amortization" href="voucher.php?LoanID='.$LoanIDnum.'" style="text-decoration:none;" target="_blank">View Voucher</a>'; } 
			else if ($ApplicationStat == "Approved") {
			echo '<a id="Amortization" href="voucher.php?LoanID='.$LoanIDnum.'" style="text-decoration:none;" target="_blank">View Voucher</a>'; }
			echo '<br/>';
			echo '<a id="Amortization" href="PrintCheck.php?LoanID='.$LoanIDnum.'" style="text-decoration:none;" target="_blank">Print Cheque</a>';
			?>
			
			
			</td>
			 </tr>
			 </table>
			 
</form>
			
			
</body>
</html>