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
				
				if (isset($_REQUEST['SubComp'])){
					$LoanIDnum = $_REQUEST['LoanNumber'];
				}
				if (isset($_REQUEST['SubSave'])){
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
				$PayDate = "";
				
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
					$OutstandingBal = number_format(odbc_result($rs,"balance"),2,'.',',');
					$PayMode = odbc_result($rs,"mode");

					if ($PayMode == "2") { $PayMode = "Semi-Monthly"; }
					else if ($PayMode == "3") { $PayMode = "Monthly"; }
					
					$DateMature = date_create($DateMature);
					$DateMature = date_format($DateMature,"M d, Y");	
				}

			?>
            
            <table>
			  <tr><td height="20"></td></tr>
			  <tr> <td><span class="style8">PAYMENT UPDATE</span></td></tr>
              <tr><td><hr width=654px size="3" color="#666666" align="left"/></td></tr>
			</table>
            
            
 			<form name="form1">
            <!-- Employee Break -------------------------------------------------------->
            <table>
            <tr>
			<td><span class="style3">LOAN NUMBER:
            <input type="text" name="LoanNumber" id="LoanNumber" size="20" value="<?Php echo $LoanIDnum ?>" />
		    <input type="submit" value="View" name="ViewLoan" onclick="javascript: form1.action='OtherPayments.php'; form1.method='GET';" />
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
			<td><i><font color="#0000CC"><?Php echo $Status ?></font></i></td></tr>
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
			<td width="130"><i><font color="#0000CC"><?Php echo $OutstandingBal ?></font></i></td>
			</tr>
			</table>

            
            <table>
			<tr><td width="130" align="right">Date Mature:</td>
			<td  width="130"><i><font color="#0000CC"><?Php echo $DateMature ?></font></i></td>
			<td  width="130" align="right"></td>
			<td  width="130">
			</td></tr>
			</table>
            
              
                
            <table>
			 <tr><td height="20"></td></tr>
			 <tr> <td><span class="style7">Last Full Payment Details</td></tr>
             <tr><td><hr width=654px size="3" color="#666666" align="left"/></td></tr> 
			</table>
			<!------------------------------------------------------------------------------------------------>
			
            <table width="600" id="UpperBody">
					<tr>
					<td width="100" align="center"><strong>Date</strong></td>
					<td width="80" align="right"><strong>Principal</strong></td>
					<td width="80" align="right"><strong>Interest</strong></td>
					<td width="80" align="right"><strong>GRT</strong></td>
					<td width="80" align="right"><strong>Amount</strong></td>
                    <td width="80" align="right"><strong>Balance</strong></td>
                    <td width="80" align="right"><strong>Count</strong></td>
					</tr>
					</table>
                    
            <table>
            <?Php
			
				$sql="SELECT TOP 1 * FROM AMORTSCHED WHERE LOANID = '".$LoanIDnum."' and status = '1' order by count Desc";
			 	$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs))
				{	
					$DueDate = odbc_result($rs,"duedate");
					$Interest = number_format(odbc_result($rs,"Interest"),2,'.',',');
					$Principal = number_format(odbc_result($rs,"Principal"),2,'.',',');
					$GRT = number_format(odbc_result($rs,"GRT_Interest"),2,'.',',');
					$Amortization = number_format(odbc_result($rs,"Amortization"),2,'.',',');
					$Out_Bal = number_format(odbc_result($rs,"Out_Bal"),2,'.',',');
					$Cnt = odbc_result($rs,"count");
					
					$AmortVal  =odbc_result($rs,"Amortization");
					$OutBalVal  =odbc_result($rs,"Out_Bal");

					$DueDate = date_create($DueDate);
					$DueDate = date_format($DueDate,"m/d/Y");	
					
						echo '<tr>';
						echo '<th width="100" align="center">'.$DueDate.'</th>';
						echo '<th width="80" align="right">'.$Principal.'</th>';
						echo '<th width="80" align="right">'.$Interest.'</th>';
						echo '<th width="80" align="right">'.$GRT.'</th>';
						echo '<th width="80" align="right">'.$Amortization.'</th>';
						echo '<th width="80" align="right">'.$Out_Bal.'</th>';
						echo '<th width="80" align="right">'.$Cnt.'</th>';
						echo '</tr>';
				
				}
				
				$sql="SELECT TOP 1 * FROM AMORTSCHED WHERE LOANID = '".$LoanIDnum."' and status = '0' order by count";
			 	$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs))
				{	
					$DueDate = odbc_result($rs,"duedate");
					$Interest2 = number_format(odbc_result($rs,"Interest"),2,'.',',');
					$Principal2 = number_format(odbc_result($rs,"Principal"),2,'.',',');
					$GRT2 = number_format(odbc_result($rs,"GRT_Interest"),2,'.',',');
					$Amortization2 = number_format(odbc_result($rs,"Amortization"),2,'.',',');
					$Out_Bal2 = number_format(odbc_result($rs,"Out_Bal"),2,'.',',');
					$Cnt2 = odbc_result($rs,"count");
					
					$AmortVal2  =odbc_result($rs,"Amortization");
					$OutBalVal2  =odbc_result($rs,"Out_Bal");

					$DueDate = date_create($DueDate);
					$NextDueDate = date_format($DueDate,"m/d/Y");	
					
				
				}
				
				?>
              
              </table>
              
              
              
              
              
              
              
              
              <table>
			 <tr><td height="20"></td></tr>
			 <tr> <td><span class="style7">Payment Specifications</td></tr>
             <tr><td><hr width=654px size="3" color="#666666" align="left"/></td></tr> 
			</table>
			<!------------------------------------------------------------------------------------------------>
			
            
            <?Php
			
				$PrincipalValue = "";
				$InterestValue = "";
				$InterestPercent = "";
				$NumberofDays = "";
				$NumberofDays2 = "";
				$PercentDays = "";
				$PayDate = "";
				$Date1 = "";
				$Date2 = "";
				$GRTValue = "";
				$TotalAmount = "";
				$PayType = "";
				$Date1View = "";
				$Date2View = "";
				$Out_Bal  = "";
				$Cnt = "";
				$Date1 = date_create();
				$Date2 = date_create();
				
				
				if (isset($_REQUEST['SubComp'])){
				
					$LoanIDnum = $_REQUEST['LoanNumber'];
					$Date2 = $_REQUEST['PayDate'];
					$PayType = $_REQUEST['PayType'];
			
					

					$Date1 = date_create($NextDueDate);
					$Date2 = date_create($Date2);
					
					$Date1View = date_format($Date1,"M d, Y");
					$Date2View = date_format($Date2,"M d, Y");
					
					$diff = date_diff($Date1,$Date2);
					$NumberofDays = $diff->format("%R%a");
					$NumberofDays2 = $diff->format("%a");
					
					if (($NumberofDays2 > 0) && ($NumberofDays2 < 31)) { $PrincipalValue = $AmortVal; }
					else if ($NumberofDays2 > 30) { $PrincipalValue = $OutBalVal; }
					
					if ($PayType == "Penalty") {
						$InterestPercent = ".24";
						$InterestValue = $PrincipalValue * .24;
						$PercentDays = $NumberofDays / 360;
						$InterestValue = $InterestValue * $PercentDays;
						$GRTValue = $InterestValue * .05;
					
						$InterestValue = number_format($InterestValue,2,'.','');
						$GRTValue = number_format($GRTValue,2,'.','');
						$PayDate = date_format($Date2,"Y-m-d");
						$TotalAmount = $InterestValue + $GRTValue;
						$TotalAmount = number_format($TotalAmount,2,'.','');
					}
					
					if ($PayType == "Advance Payment") {
					
						$TotalAmount = $_REQUEST['TotalAmount']; 
						if ($TotalAmount > 0 ){
						$TotalAmount = number_format($TotalAmount,2,'.','');}
						
						$InterestValue = "";
						$Out_Bal = $OutstandingBal;
						$GRTValue = "";
						$PayDate = date_format($Date2,"Y-m-d");
						$PrincipalValue = "";
						$NumberofDays2 = "";
						
					}
					
					
					if ($PayType == "Pre-Payment") {
					
						$InterestPercent = ".02";
						$PrincipalValue = $OutBalVal;
						$InterestValue = $PrincipalValue * .02;
						$GRTValue = $InterestValue * .05;
					
						$InterestValue = number_format($InterestValue,2,'.','');
						$GRTValue = number_format($GRTValue,2,'.','');
						$PayDate = date_format($Date2,"Y-m-d");
						$TotalAmount = $InterestValue + $GRTValue;
						$TotalAmount = number_format($TotalAmount,2,'.','');
					
					}
					

					if ($PayType == "Amortization") {
					
						$sql="SELECT * FROM AMORTSCHED WHERE LOANID = '".$LoanIDnum."' and duedate = '".$Date2View."'";
						$rs=odbc_exec($conn,$sql);
						while (odbc_fetch_row($rs))
						{	
							$SchedID = odbc_result($rs,"ID");
							$DueDate = odbc_result($rs,"duedate");
							$Interest = number_format(odbc_result($rs,"Interest"),2,'.','');
							$Principal = number_format(odbc_result($rs,"Principal"),2,'.','');
							$GRT = number_format(odbc_result($rs,"GRT_Interest"),2,'.','');
							$Amortization = number_format(odbc_result($rs,"Amortization"),2,'.','');
							$Out_Bal = number_format(odbc_result($rs,"Out_Bal"),2,'.','');
							$Cnt = odbc_result($rs,"count");
		
							$DueDate = date_create($DueDate);
							$DueDate = date_format($DueDate,"m/d/Y");	
		
						}
						
						$PrincipalValue = $Principal;
						$InterestPercent = "";
						$InterestValue = $Interest;
						$GRTValue = $GRT;
						$TotalAmount = $Amortization;
						
						$InterestValue = number_format($InterestValue,2,'.','');
						$GRTValue = number_format($GRTValue,2,'.','');
						$PayDate = date_format($Date2,"Y-m-d");
						$TotalAmount = number_format($TotalAmount,2,'.','');
					
					}

				}
				
				
				
				if (isset($_REQUEST['SubSave'])){
					
					$LoanIDnum = $_REQUEST['LoanNumber'];
					$PayDes = $_REQUEST['PayType'];
					$Date2 = $_REQUEST['PayDate'];
					$PrincipalAmount = $_REQUEST['PrincipalAmount'];
					$IntAmount = $_REQUEST['IntAmount'];
					$GRTAmount = $_REQUEST['GRTAmount'];
					$TotalAmount = $_REQUEST['TotalAmount'];
					$OutBalAmount = $_REQUEST['OutBalAmount'];
					
					
					$Date1 = date_create();
					$Date1 = date_format($Date1,"m/d/Y");
					
					
					$Date2 = date_create($Date2);
					$Date2 = date_format($Date2,"m/d/Y");	
					
					if ($PayDes == "Amortization") {
						$sql="UPDATE AMORTSCHED SET status = '1'  WHERE LOANID = '".$LoanIDnum."' and DueDate = '".$Date2."'";
			 			$rs=odbc_exec($conn,$sql);
						
						$sql1="Update Loans Set balance = '".$OutBalAmount."' WHERE loanid = '".$LoanIDnum."'";
						$rs1=odbc_exec($conn,$sql1);
						
						$OutBalAmount = $OutBalAmount * 1;
						
						if ($OutBalAmount == '0') {
						$sql01="Update Loans Set Status = 'Paid', LoanStatus2 = '0' WHERE loanid = '".$LoanIDnum."'";
						$rs01=odbc_exec($conn,$sql01);
						}
						else {
						$sql01="Update Loans Set Status = 'Current', LoanStatus2 = '1' WHERE loanid = '".$LoanIDnum."'";
						$rs01=odbc_exec($conn,$sql01);
						}
						
					}
					
					if (($PayDes == "Penalty") || ($PayDes == "Pre-Payment") || ($PayDes == "Advance Payment")) {
					
					$sql1="INSERT INTO OTHERPAYMENTS(LOANID, DATEPAID, DESCRIPTION, AMOUNT, GRT, TOTALAMOUNT) VALUES('$LoanIDnum','$Date2','$PayDes','$IntAmount','$GRTAmount','$TotalAmount')";
			 		$rs1=odbc_exec($conn,$sql1);
					
					}
					
					
					echo "Payment Saved.";
					
					
				}
				
				if ($LoanIDnum == "" ) {
					$Date1View = "";
					$Date2View = "";
				}
				
			?>
            
            <table>
			<tr><td width="120" align="right">Payment Type:</td>
			<td>
            	<select name="PayType" style="width:110px">
                <option value="Amortization" <?Php if ($PayType == "Amortization") { echo 'selected="selected"'; } ?> >Amortization</option>
				<option value="Penalty" <?Php if ($PayType == "Penalty") { echo 'selected="selected"'; } ?> >Penalty</option>
                <option value="Advance Payment" <?Php if ($PayType == "Advance Payment") { echo 'selected="selected"';}?>>Advance Payment</option>
				<option value="Pre-Payment" <?Php if ($PayType == "Pre-Payment") { echo 'selected="selected"'; } ?>>Pre-Payment</option>
				</select></td>
            <td width="120" align="right">Payment Date:</td>
			<td><input type="date" name="PayDate" id="PayDate" size="20" value="<?Php echo $PayDate; ?>" /></td>
            <td><input type="submit" value="Compute" name="SubComp" onclick="javascript: form1.action='OtherPayments.php'; form1.method='GET';" />
            </td></tr>
			</table>
            
            <table>
			<tr><td width="130" align="right">Date Covered:</td>
			<td width="200"><i><font color="#0000CC"><?Php echo $Date1View." - ".$Date2View; ?></font></i></td>
            </tr>
			</table>
            
            <table>
			<tr><td width="130" align="right">Nof of Day(s):</td>
			<td width="130"><input type="text" name="NDays" id="PayDate" size="15" value="<?Php echo $NumberofDays2; ?>" /></td></tr>
			</table>

            <table>
			<tr><td width="130" align="right">Principal Amount:</td>
			<td width="130"><input type="text" name="PrincipalAmount" id="PayDate" size="15" value="<?Php echo $PrincipalValue; ?>" /></td>
			<td width="130" align="right">Penalty Interest:</td>
			<td width="130"><input type="text" name="IntPercent" id="PayDate" size="15" value="<?Php echo $InterestPercent; ?>" /></td></tr>
			</table>
            
            <table>
			<tr><td width="130" align="right">Interest Amount:</td>
			<td width="130"><input type="text" name="IntAmount" id="PayDate" size="15" value="<?Php echo $InterestValue; ?>" /></td>
			<td width="130" align="right">GRT Amount:</td>
			<td width="130"><input type="text" name="GRTAmount" id="PayDate" size="15" value="<?Php echo $GRTValue; ?>" /></td></tr>
			</table>
            
            <table>
			<tr><td width="130" align="right">Total Amount:</td>
			<td width="130"><input type="text" name="TotalAmount" id="PayDate" size="15" value="<?Php echo $TotalAmount; ?>" /></td>
			</tr>
			</table>
            
             <table>
			<tr><td width="130" align="right">Outstanding Balance:</td>
			<td width="130"><input type="text" name="OutBalAmount" id="" size="15" value="<?Php echo $Out_Bal; ?>" /></td>
			<td width="130" align="right">Count:</td>
			<td width="130"><input type="text" name="" id="" size="15" value="<?Php echo $Cnt; ?>" /></td></tr>
			</table>
            
            
            <table>
			<tr>
            <td width="120" align="right"></td>
            <td><input type="submit" value="Save" name="SubSave" onclick="javascript: form1.action='OtherPayments.php'; form1.method='GET';" />
            </td></tr>
			</table>
            
			</form>
            
            
            
            
            
                
			
			
</body>
</html>