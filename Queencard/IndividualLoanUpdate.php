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

th {
	font-family: "Century Gothic";
	font-size: 12px;
	font-weight:normal;

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
	font-weight:bold;
	color:#0066FF;
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
				
				if (isset($_REQUEST['ViewLoan'])){
					$LoanIDnum = $_REQUEST['LoanNumber'];
				}

				include 'connect.php';
				$BorrNo = "";
				$EmpNo = "";
				$Name = "";
				$Company = "";
				$Creditratio = "";
				$Position = "";
				$Status = "";
				$Term = "";
				$AmountLoan = "";
				$DateMature = "";
				$PayMode = "";
				$OutstandingBal = "";
				
				if (isset($_REQUEST['btnUpdateBal'])){
					$LoanIDnum = $_REQUEST['LoanNumber'];
					$LoanStatus = $_REQUEST['LoanStatus'];
					$OutstandingBal = $_REQUEST['OutstandingBal'];
					$sql="UPDATE LOANS SET status = '".$LoanStatus."', Balance = '".$OutstandingBal."' WHERE LOANID = '".$LoanIDnum."'";
			 		$rs=odbc_exec($conn,$sql);
					echo "Succesfully Updated.";
				}
				
				if (isset($_REQUEST['btnPaymentDel'])){
				
					$LoanIDnum = $_REQUEST['LoanNumber'];
					$PaymentID1 = $_REQUEST['PaymentID'];
					$PaymentDes1 = $_REQUEST['PaymentDes'];
					
					$PaymentID1 = $PaymentID1 * 1;
					
					if ($PaymentDes1=="Amortization") {
					
						$sql="UPDATE AMORTSCHED SET status = '0'  WHERE LOANID = '".$LoanIDnum."' and ID = '".$PaymentID1."'";
						$rs=odbc_exec($conn,$sql);
						
						$sql="SELECT TOP 1 * FROM AMORTSCHED WHERE LOANID = '".$LoanIDnum."' and status = '1' ORDER BY COUNT DESC";
						$rs=odbc_exec($conn,$sql);
						$reverseOutBal = odbc_result($rs,"out_bal");
						
						$sql="UPDATE LOANS SET balance = '".$reverseOutBal."'  WHERE LOANID = '".$LoanIDnum."'";
						$rs=odbc_exec($conn,$sql);
					
					}
					
					if (($PaymentDes1=="Penalty") || ($PaymentDes1=="Pre-Payment")) {
					$sql="DELETE FROM OTHERPAYMENTS WHERE ID = '".$PaymentID1."'";
			 		$rs=odbc_exec($conn,$sql);
					}
					
					echo "Succesfully Updated.";
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
					$Position = odbc_result($rs,"position");
					$Status = odbc_result($rs,"status");
					$Term = odbc_result($rs,"terms");
					$AmountLoan = number_format(odbc_result($rs,"amountloan"),2,'.',',');
					$DateMature = odbc_result($rs,"datemature");
					$OutstandingBal = number_format(odbc_result($rs,"balance"),2,'.','');
					$PayMode = odbc_result($rs,"mode");

					if ($PayMode == "2") { $PayMode = "Semi-Monthly"; }
					else if ($PayMode == "3") { $PayMode = "Monthly"; }
					
					$DateMature = date_create($DateMature);
					$DateMature = date_format($DateMature,"m/d/Y");	
				}

			?>
            
             <table>
			  <tr><td height="20"></td></tr>
			  <tr> <td><span class="style8">INDIVIDUAL UPDATE</span></td></tr>
              <tr><td><hr width=654px size="3" color="#666666" align="left"/></td></tr>
			</table>
            
 			<form name="form1">
            <!-- Employee Break -------------------------------------------------------->
            <table>
            <tr>
			<td><span class="style3">LOAN NUMBER:
            <input type="text" name="LoanNumber" id="LoanNumber" size="20" value="<?Php echo $LoanIDnum ?>" />
		    <input type="submit" value="View" name="ViewLoan" onclick="javascript: form1.action='IndividualLoanUpdate.php'; form1.method='GET';" />
            </td>
		    </tr>

			  <tr><td height="20"></td></tr>
			  <tr> <td><span class="style7">Employee Details</span></td></tr>
              <tr><td><hr width=654px size="3" color="#666666" align="left"/></td></tr>
			  
			</table>

			<table>
			<tr><td width="120" align="right">Borrower No:</td>
			<td width="200"><i><font color="#0000CC"><?Php echo $BorrNo ?></font></i></td>
			<td width="120" align="right">Employee ID:</td>
			<td width="200"><i><font color="#0000CC"><?Php echo $EmpNo ?></font></i></td></tr>
			</table>
			
			<table>
			<tr><td width="120" align="right">Borrower Name:</td>
			<td width="200"><i><font color="#0000CC"><?Php echo $Name ?></font></i></td>
            <td width="120" align="right">Company Name:</td>
			<td width="200"><i><font color="#0000CC"><?Php echo $Company ?></font></i></td></tr>
			</table>

			<table>
			<tr><td width="120" align="right">Loan Status:</td>
			<td>
            	<select name="LoanStatus" style="width:110px">
				<option value="Current" <?Php if ($Status == "Current") { echo 'selected="selected"'; } ?> >Current</option>
				<option value="Past Due" <?Php if ($Status == "Past Due") { echo 'selected="selected"'; } ?>>Past Due</option>
				<option value="Paid" <?Php if ($Status == "Paid") { echo 'selected="selected"'; } ?>>Paid</option>
				<option value="Litigation" <?Php if ($Status == "Litigation") { echo 'selected="selected"'; } ?>>Litigation</option>
				</select></td></tr>
			</table>
			
			
			<table>
			 <tr><td height="20"></td></tr>
			 <tr> <td><span class="style7">Loan Details</td></tr>
             <tr><td><hr width=654px size="3" color="#666666" align="left"/></td></tr> 
			</table>
			<!------------------------------------------------------------------------------------------------>
			
			<table>
			<tr><td width="130" align="right">Schedule Mode:</td>
			<td width="130"><i><font color="#0000CC"><?Php echo $PayMode; ?></font></i></td>
			<td width="130" align="right">Terms:</td>
			<td width="130"><i><font color="#0000CC"><?Php echo $Term; ?></font></i></td></tr>
			</table>
			
			
						  
			<table>
			<tr><td width="130" align="right">Amount Loan:</td>
			<td  width="130"><i><font color="#0000CC"><?Php echo $AmountLoan; ?></font></i></td>
            <td width="130" align="right">Outstanding Bal.:</td>
			<td width="130"><input type="text" name="OutstandingBal"  size = "15" id="OutstandingBal" value="<?Php echo $OutstandingBal ?>" /></td>
			</tr>
			</table>

            
            <table>
			<tr><td width="130" align="right">Date Mature:</td>
			<td  width="130"><i><font color="#0000CC"><?Php echo $DateMature ?></font></i></td>
			<td  width="130" align="right"></td>
			<td  width="130">
			<input name="btnUpdateBal" type="Submit" value="Update" onclick="javascript: form1.action='IndividualLoanUpdate.php'; form1.method='GET';"/></td></tr>
			</table>
			
			</form>
            
            
            
					
					<table>
					<tr>
					<td id='UpperBody' width='600' align='left'><hr size='2' width='600' color='#666666'/></td>
					</tr>
					</table>
					
					
					<table>
					<tr>
					<td id='Queencard' width='550'><font color="#990000"><i>Payment History</i></font></td>
					</tr>
					</table>
					
					
					<table width="680" id="UpperBody">
					<tr>
                    <td width="100" align="center"><strong>Description</strong></td>
					<td width="100" align="center"><strong>Date</strong></td>
					<td width="80" align="right"><strong>Principal</strong></td>
					<td width="80" align="right"><strong>Interest</strong></td>
					<td width="80" align="right"><strong>GRT</strong></td>
					<td width="80" align="right"><strong>Amount</strong></td>
                    <td width="80" align="right"><strong>Balance</strong></td>
                    <td width="80" align="right"><strong>Count</strong></td>
                    <td width="100" align="right"><strong></strong></td>
					</tr>
					</table>
                    
					<table width="680" id="UpperBody">
                    
            	<?Php
				
				$sql0="DELETE FROM PAYMENTHISTORY";
			 	$rs0=odbc_exec($conn,$sql0);
				
				$sql="SELECT * FROM AMORTSCHED WHERE LOANID = '".$LoanIDnum."' and status = '1' order by count";
			 	$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs))
				{	
					$SchedID = odbc_result($rs,"ID");
					$DueDate = odbc_result($rs,"duedate");
					$Interest = number_format(odbc_result($rs,"Interest"),2,'.',',');
					$Principal = number_format(odbc_result($rs,"Principal"),2,'.',',');
					$GRT = number_format(odbc_result($rs,"GRT_Interest"),2,'.',',');
					$Amortization = number_format(odbc_result($rs,"Amortization"),2,'.',',');
					$Out_Bal = number_format(odbc_result($rs,"Out_Bal"),2,'.',',');
					$Cnt = odbc_result($rs,"count");

					$DueDate = date_create($DueDate);
					$DueDate = date_format($DueDate,"m/d/Y");	
					
					$sqlC="SELECT * FROM ADVANCEPAYMENT WHERE LOANID = '".$LoanIDnum."' and count = '".$Cnt."'";
					$rsC=odbc_exec($conn,$sqlC);
					while (odbc_fetch_row($rsC)) {
						$Interest0 = number_format(odbc_result($rsC,"Interest"),2,'.','');
						$Principal0 = number_format(odbc_result($rsC,"Principal"),2,'.','');
						$GRT0 = number_format(odbc_result($rsC,"GRT"),2,'.','');
						$Amortization0 = number_format(odbc_result($rsC,"Amortization"),2,'.','');
						$Out_Bal0 = number_format(odbc_result($rsC,"Out_Bal"),2,'.','');
						$Interest = $Interest - $Interest0;
						$Principal = $Principal - $Principal0;
						$GRT = $GRT - $GRT0;
						$Amortization = $Amortization - $Amortization0;
						$Out_Bal = odbc_result($rs,"Out_Bal") - $Principal0;
					}
						

					$sql1="INSERT INTO PAYMENTHISTORY(ID, LOANID, DESCRIPTION, DATE, PRINCIPAL, 
					INTEREST, GRT, AMOUNT, OUTBAL, COUNT) VALUES('$SchedID','$LoanIDnum','Amortization','$DueDate',
					'$Principal','$Interest','$GRT','$Amortization','$Out_Bal','$Cnt')";
			 		$rs1=odbc_exec($conn,$sql1);
					
					
						$sqlA="SELECT * FROM ADVANCEPAYMENT WHERE LOANID = '".$LoanIDnum."' AND COUNT = '".(odbc_result($rs,"count") + 1)."'";
						$rsA=odbc_exec($conn,$sqlA);
						while (odbc_fetch_row($rsA))
						{
							
							$Prin1 = number_format(odbc_result($rsA,"PRINCIPAL"),2,'.',',');
							$Int1 = number_format(odbc_result($rsA,"INTEREST"),2,'.',',');
							$GRT1 = number_format(odbc_result($rsA,"GRT"),2,'.',',');
							$Amount1 = number_format(odbc_result($rsA,"AMOUNT"),2,'.',',');
							$Outbal1 = number_format(odbc_result($rsA,"OUT_BAL"),2,'.',',');
							$cnt1 = odbc_result($rsA,"COUNT");
							
							$sql1A="INSERT INTO PAYMENTHISTORY(ID, LOANID, DESCRIPTION, DATE, PRINCIPAL, INTEREST,
							GRT, AMOUNT, OUTBAL, COUNT) 
							VALUES('$SchedID','$LoanIDnum','Amortization','$DueDate',
							'$Prin1','$Int1','$GRT1','$Amount1','$Outbal1','$cnt1')";
			 				$rs1=odbc_exec($conn,$sql1A);
					
						}
				
				}
				
				
				$sql="SELECT * FROM OTHERPAYMENTS WHERE LOANID = '".$LoanIDnum."'";
			 	$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs))
				{	
				
					$PayID = odbc_result($rs,"ID");
					$DueDate = odbc_result($rs,"DatePaid");
					$Description = odbc_result($rs,"Description");
					$Interest = number_format(odbc_result($rs,"Amount"),2,'.',',');
					$GRT = number_format(odbc_result($rs,"GRT"),2,'.',',');
					$TotalAmount = number_format(odbc_result($rs,"TotalAmount"),2,'.',',');


					$DueDate = date_create($DueDate);
					$DueDate = date_format($DueDate,"m/d/Y");	
					
					$sql1="INSERT INTO PAYMENTHISTORY(ID, LOANID, DESCRIPTION, DATE, PRINCIPAL, INTEREST, GRT, AMOUNT, OUTBAL, COUNT) VALUES('$PayID','$LoanIDnum','$Description','$DueDate','','$Interest','$GRT','$TotalAmount','','')";
			 		$rs1=odbc_exec($conn,$sql1);
				
				}
				
				
			    $sql="SELECT * FROM PAYMENTHISTORY WHERE LOANID = '".$LoanIDnum."' order by Date";
			 	$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs))
				{	
					$PaymentID = odbc_result($rs,"ID");
					$DueDate = odbc_result($rs,"DATE");
					$Des = odbc_result($rs,"DESCRIPTION");
					$Interest = number_format(odbc_result($rs,"Interest"),2,'.',',');
					$Principal = number_format(odbc_result($rs,"Principal"),2,'.',',');
					$GRT = number_format(odbc_result($rs,"GRT"),2,'.',',');
					$Amortization = number_format(odbc_result($rs,"AMOUNT"),2,'.',',');
					$Out_Bal = number_format(odbc_result($rs,"OUTBAL"),2,'.',',');

					$DueDate = date_create($DueDate);
					$DueDate = date_format($DueDate,"m/d/Y");	
					
						echo '<tr>';
						echo '<form name="form2">';
						echo '<th width="100" align="center">'.$Des.'</th>';
						echo '<th width="100" align="center">'.$DueDate.'</th>';
						echo '<th width="80" align="right">'.$Principal.'</th>';
						echo '<th width="80" align="right">'.$Interest.'</th>';
						echo '<th width="80" align="right">'.$GRT.'</th>';
						echo '<th width="80" align="right">'.$Amortization.'</th>';
						echo '<th width="80" align="right">'.$Out_Bal.'</th>';
						echo '<th width="80" align="right">'.odbc_result($rs,"count").'</th>';
						echo '<th width="100" align="right"><input name="btnPaymentDel" type="Submit" value="Remove" onclick="javascript: form2.action=IndividualLoanUpdate.php; form2.method=GET;"/></th>';
						echo '<input type="hidden" name="LoanNumber" value="'.$LoanIDnum.'" />';
						echo '<input type="hidden" name="PaymentID" value="'.$PaymentID.'" />';
						echo '<input type="hidden" name="PaymentDes" value="'.$Des.'" />';
						echo '</form>';
						echo '</tr>';
				
				}
				
				
				
				?>
                
                </table>
			 
				
                
			
			
</body>
</html>