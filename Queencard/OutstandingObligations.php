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
<title>Outstanding Obligations</title>

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
			
				$BorrID = "";
				if (isset($_REQUEST['BorID'])){
					$BorrID = $_REQUEST['BorID'];
				
				}	
			?>
		
 			<table>
			 <tr><td height="20"></td></tr>
			 <tr> <td><span class="style7">Employee Details</td></tr>
             <tr><td><hr width=654px size="3" color="#666666" align="left"/></td></tr> 
			</table>
			
			
			<!-- Employee Detail ---------------------------------------------------->
			<?Php
			
				
				$EmpNo = "";
				$Name = "";
				$Company = "";
				$PrdCode = "";

				
				
				$sql="SELECT * FROM BORROWER WHERE BORROWERNO = '".$BorrID."'";
			 	$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs))
				{	
				
					$EmpNo = odbc_result($rs,"employeeno");
					$Name = odbc_result($rs,"Lastname").", ".odbc_result($rs,"Firstname")." ".odbc_result($rs,"MI");
					$Company = odbc_result($rs,"company");
					
				}
				
				

				
			?>
			
            
			<table>
			<tr><td width="120" align="right">Borrower No:</td>
			<td><font color="#000099"><?Php echo $BorrID ?></font></td>
			<td width="120" align="right">Employee ID:</td>
			<td><font color="#000099"><?Php echo $EmpNo ?></font></td></tr>
			</table>
			
			<table>
			<tr><td width="120" align="right">Borrower Name:</td>
			<td width="300"><font color="#000099"><?Php echo $Name ?></font></td></tr>
			</table>
			
			<table>
			<tr><td width="120" align="right">Company Name:</td>
			<td width="300"><font color="#000099"><?Php echo $Company ?></font></td></tr>
			</table>
			
            
			
            <table>
			 <tr><td height="20"></td></tr>
			 <tr> <td><span class="style7">Outstanding Obligations</td></tr>
             <tr><td><hr width=654px size="3" color="#666666" align="left"/></td></tr> 
			</table>
			<!------------------------------------------------------------------------------------------------>
            
            <table width="804">
		  <tr>
					<td width="198"><font color="#0000FF"><strong>Name of Creditor</strong></font></td>
			<td width="133" align="center"><font color="#0000FF"><strong>Outstanding Balance</strong></font></td>
			<td width="112" align="center"><font color="#0000FF"><strong>Date Granted</strong></font></td>
			<td width="123" align="center"><font color="#0000FF"><strong>Date Mature</strong></font></td>
			<td width="112" align="center"><font color="#0000FF"><strong>Remarks</strong></font></td>
                    <td width="98" align="center"><font color="#0000FF"><strong></strong></font></td>
			  </tr>
			</table>
            
		  <table width="804">
					<?php
					$sql = "Select  * From BorrowerDeduct where employeeno = '".$EmpNo."'";
					$rs=odbc_exec($conn,$sql) or die("Error in query");	
					while (odbc_fetch_row($rs)) {
						$OutB = odbc_result($rs,"amount") * 1;
						$EmpNo2 = odbc_result($rs,"employeeno");
						$OutStandID = odbc_result($rs,"ID");
						$GrantDate = odbc_result($rs,"dategranted");
						$MatureDate = odbc_result($rs,"datemature");
						
						$GrantDate = date_create($GrantDate);
						$GrantDate = date_format($GrantDate,"m/d/Y");
						$MatureDate = date_create($MatureDate);
						$MatureDate = date_format($MatureDate,"m/d/Y");
						
						echo '<form name="frmOutStand">';
						echo '<tr>';
						echo '<td width="198">'.odbc_result($rs,"description").'</td>';
						echo '<td width="133" align="center">'.number_format($OutB,2,'.',',').'</td>';
						echo '<td width="112" align="center">'.$GrantDate.'</td>';
						echo '<td width="123" align="center">'.$MatureDate.'</td>';
						echo '<td width="112" align="center">'.odbc_result($rs,"remarks").'</td>';
						echo '<td width="98" align="center"><input type="submit" name="btnEditOS" value="Edit" onclick="javascript: frmOutStand.action=OutstandingObligations.php; frmOutStand.method=GET;"/></td>';
						
						echo '<input type="hidden" name="OutStandID" value="'.$OutStandID.'" />';
						echo '<input type="hidden" name="BorID" value="'.$BorrID.'" />';
						echo '<input type="hidden" name="EmpNo2" value="'.$EmpNo2.'" />';
						echo '<input type="hidden" name="LoanNum" value="'.odbc_result($rs,"loanid").'" />';
						echo '<input type="hidden" name="Creditor" value="'.odbc_result($rs,"description").'" />';
						echo '<input type="hidden" name="OuBal" value="'.number_format($OutB,2,'.','').'" />';
						echo '<input type="hidden" name="Granted" value="'.$GrantDate.'" />';
						echo '<input type="hidden" name="Mature" value="'.$MatureDate.'" />';
						echo '<input type="hidden" name="Remarks" value="'.odbc_result($rs,"remarks").'" />';
						
						echo '</tr>';
						echo '</form>';
					}
					?>
					</table>
                    
                    
                    <table>
                     <tr><td height="20"></td></tr>
                     <tr><td><hr width=654px size="3" color="#666666" align="left"/></td></tr> 
                    </table>
            		
                    <?Php
					
					$OutStandID = "";
					$EmpNo2 = "";
					$LoanNum = "";
					$Creditor = "";
					$OuBal = "";
					$Granted = "";
					$Mature = "";
					$Remarks = "";
					$StatusMsg = "";
					
					if (isset($_REQUEST['btnEditOS'])){
					
						$OutStandID = $_REQUEST['OutStandID'];
						$EmpNo2 = $_REQUEST['EmpNo2'];
						$LoanNum = $_REQUEST['LoanNum'];
						$Creditor = $_REQUEST['Creditor'];
						$OuBal = $_REQUEST['OuBal'];
						$Granted = $_REQUEST['Granted'];
						$Mature = $_REQUEST['Mature'];
						$Remarks = $_REQUEST['Remarks'];
						
						$Granted = date_create($Granted);
						$Granted = date_format($Granted,"Y-m-d");
						$Mature = date_create($Mature);
						$Mature = date_format($Mature,"Y-m-d");
						
					}
					
					if (isset($_REQUEST['btnUpdateOS'])){
						
						$ChckExst = "";
						$OutStandID = $_REQUEST['OutStandID'];
						$EmpNo2 = $_REQUEST['EmpNo2'];
						$LoanNum = $_REQUEST['LoanNum'];
						$Creditor = $_REQUEST['Creditor'];
						$OuBal = $_REQUEST['OuBal'];
						$Granted = $_REQUEST['Granted'];
						$Mature = $_REQUEST['Mature'];
						$Remarks = $_REQUEST['Remarks'];
						
						$sql = "Select  * From BorrowerDeduct where ID = '".$OutStandID."'";
						$rs=odbc_exec($conn,$sql) or die("Error in query");	
						while (odbc_fetch_row($rs)) { $ChckExst = "1"; }
						
						if  ($ChckExst == "1") {
							$sql = "Update BorrowerDeduct set loanid = '".$LoanNum."', description = '".$Creditor."', amount = '".$OuBal."', dategranted = '".$Granted."', datemature = '".$Mature."', remarks = '".$Remarks."' where ID = '".$OutStandID."'";
							$rs=odbc_exec($conn,$sql) or die("Error in query");	
						}
						
						echo '<input type="hidden" name="BorID" id="BorID"  size = "15" value="'.$BorrID.'" />';
						$StatusMsg = "Account Updated.";
					}
					
					
					if (isset($_REQUEST['btnSaveOS'])){
						
						$ChckExst = "";
						$OutStandID = $_REQUEST['OutStandID'];
						$EmpNo2 = $_REQUEST['EmpNo2'];
						$LoanNum = $_REQUEST['LoanNum'];
						$Creditor = $_REQUEST['Creditor'];
						$OuBal = $_REQUEST['OuBal'];
						$Granted = $_REQUEST['Granted'];
						$Mature = $_REQUEST['Mature'];
						$Remarks = $_REQUEST['Remarks'];
						
						
							$sql = "Insert Into BorrowerDeduct (employeeno,loanid,description,amount,dategranted,datemature,remarks) Values ('$EmpNo2','$LoanNum','$Creditor','$OuBal','$Granted','$Mature','$Remarks')";
							$rs=odbc_exec($conn,$sql) or die("Error in query");	
							
							echo '<input type="hidden" name="BorID" id="BorID"  size = "15" value="'.$BorrID.'" />';
							$StatusMsg = "Account Added.";
				
					}
					
					
					
					
					
					
					if (isset($_REQUEST['btnRefreshOS'])){
						
				
						$sql0 = "Select * From Loans where employeeno = '".$EmpNo."' and status = 'Current' AND loanstatus = 'Approved' AND releaseStat = 'Yes'";
						$rs0=odbc_exec($conn,$sql0) or die("Error in query");
						while (odbc_fetch_row($rs0))
						{
							
							$LoanIDTemp = odbc_result($rs0,"loanid");
							echo $EmpNo;
							echo $LoanIDTemp;
							
							$ProdCodeTemp = substr(odbc_result($rs0,"loanid"),0,4);
							
							$sql2 = "Select * From Product where Productcode = '".$ProdCodeTemp."'";
							$rs2=odbc_exec($conn,$sql2) or die("Error in query");	
							if (odbc_fetch_row($rs2))
							
							{ $ProdNameTemp = odbc_result($rs2,"productname"); }

							$sql = "Select * From BorrowerDeduct where employeeno = '".$EmpNo."'";
							$rs=odbc_exec($conn,$sql) or die("Error in query");	
							if (odbc_fetch_row($rs0))
							{
							
							

					
							}
							else {
							
							}
							
							
							echo '<input type="hidden" name="BorID" id="BorID"  size = "15" value="'.$BorrID.'" />';
							
						}
				
					}
					
					
					
					
					
					if (isset($_REQUEST['btnDeleteOS'])){
					$OutStandID = $_REQUEST['OutStandID'];
					$sql = "Delete From BorrowerDeduct where ID = '".$OutStandID."'";
					$rs=odbc_exec($conn,$sql) or die("Error in query");	
					$StatusMsg = "Account Deleted.";
					}
					
					?>
            		
                    <form name="frmOSSave">
                    <input type="hidden" name="OutStandID" id="OutStandID"  size = "15" value="<?Php echo $OutStandID ?>" />
                    <table>
                    <tr><td width="200" align="right">Name of Creditor</td>
                    <td><input type="text" name="Creditor" id="Creditor" size = "30" value="<?Php echo $Creditor ?>" /></td>
                    <td width="120" align="right">Loan Number:</td>
                    <td><input type="text" name="LoanNum" id="LoanNum"  size = "15" value="<?Php echo $LoanNum ?>" /></td></tr>
                    </table>
                    
                    <table>
                    <tr><td width="200" align="right">Outstanding Balance</td>
                    <td width="120"><input type="text" name="OuBal" id="OuBal"  size = "30" value="<?Php echo $OuBal ?>" /></td>
                    <td width="120" align="right">Date Granted:</td>
                    <td><input type="date" name="Granted" id="Granted"  size = "15" value="<?Php echo $Granted ?>" /></td></tr>
                    </table>
                    
                    <table>
                    <tr><td width="200" align="right">Remarks</td>
                    <td width="120"><input type="text" name="Remarks"id="Remarks" size = "30" value="<?Php echo $Remarks ?>" /></td>
                    <td width="120" align="right">Date Mature:</td>
                    <td><input type="date" name="Mature" id="Mature"  size = "15" value="<?Php echo $Mature ?>" /></td></tr>
                    </table>
                    
                    <table width="635">
                    <tr><td width="202" align="right"></td>
                    <td width="346">
                    <input type="submit" name="btnSaveOS" value="Save" onclick="javascript: frmOSSave.action=OutstandingObligations.php; frmOSSave.method=GET;"/>
                    <input type="submit" name="btnUpdateOS" value="Update" onclick="javascript: frmOSSave.action=OutstandingObligations.php; frmOSSave.method=GET;"/>
                    <input type="submit" name="btnDeleteOS" value="Delete" onclick="javascript: frmOSSave.action=OutstandingObligations.php; frmOSSave.method=GET;"/></td>
                    <td width="42" align="right"></td>
                    <td width="25"><input type="hidden" name="EmpNo2" id="EmpNo2"  size = "15" value="<?Php echo $EmpNo2 ?>" /></td></tr>
                    <input type="hidden" name="BorID" id="BorID"  size = "15" value="<?Php echo $BorrID ?>" />
                    </table>
       				
                    
                    <table>
                    <tr><td width="200" align="right"></td>
                    <td width="300"><?Php echo $StatusMsg; ?></td></tr>
                    </table>
                    </form>
		
			
           
			
</body>
</html>