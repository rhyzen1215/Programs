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
<title>Loan Approval</title>

</head>

<body>
            

			<!-- Employee Detail ---------------------------------------------------->
			<?Php
			
				$LoanIDnum = "";
				
				if (isset($_REQUEST['btnUpdateStatus'])){
				
					$LoanIDnum = $_REQUEST['loanIDnumber'];
					$AppStatus = $_REQUEST['AppStatus'];
					$AppStatNum = "0";
					
					$sql="SELECT * FROM OFFICERS WHERE USERNAME = '".$Muser."'";
					$rs=odbc_exec($conn,$sql);
					while (odbc_fetch_row($rs))
					{	
						$OfficerID = odbc_result($rs,"OfficerID");
					}
					
					
					if ( $AppStatus == "Approved") { $AppStatNum = "1"; }
					else if ( $AppStatus == "Rejected") { $AppStatNum = "2"; }
					else if ( $AppStatus == "Added") { $AppStatNum = "0"; }
					else if ( $AppStatus == "Pending") { $AppStatNum = "0"; }
					else if ( $AppStatus == "Cancelled") { $AppStatNum = "4"; }
					
					
					$ToDate = date_create();
					$ToDate = date_format($ToDate,"m/d/Y");	
					
					if ($OfficerID == "OFF1") { 
						$sql="UPDATE LOANS SET OFFICER1 = '".$AppStatNum."', DateApprovedOff1 = '".$ToDate."' WHERE LOANID = '".$LoanIDnum."' ";
						$rs=odbc_exec($conn,$sql);
					}
					else if ($OfficerID == "OFF2") { 
						$sql="UPDATE LOANS SET OFFICER2 = '".$AppStatNum."',DateApprovedOff2 = '".$ToDate."' WHERE LOANID = '".$LoanIDnum."'";
						$rs=odbc_exec($conn,$sql);
					}
					else if ($OfficerID == "OFF3") { 
						$sql="UPDATE LOANS SET OFFICER3 = '".$AppStatNum."', DateApprovedOff3 = '".$ToDate."' WHERE LOANID = '".$LoanIDnum."'";
						$rs=odbc_exec($conn,$sql);
					}
					
					
					$sql="SELECT * FROM LOANS WHERE LOANID = '".$LoanIDnum."'";
					$rs=odbc_exec($conn,$sql);
					while (odbc_fetch_row($rs))
					{	
						$OfficerID1 = odbc_result($rs,"Officer1");
						$OfficerID2 = odbc_result($rs,"Officer2");
					}
					
				
					if (($OfficerID1 == "1") && ($OfficerID2 == "1")) {
					$sql="UPDATE LOANS SET LOANSTATUS = 'Approved' WHERE LOANID = '".$LoanIDnum."'";
					$rs=odbc_exec($conn,$sql);
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
						$Term = odbc_result($rs,"terms");
						$AmountLoan = number_format(odbc_result($rs,"amountloan"),2,'.','');
						$NetProceeds = number_format(odbc_result($rs,"netamount"),2,'.','');
						$comm1 = odbc_result($rs,"MRI");
						$comm2 = odbc_result($rs,"MRI");
						$ApplicationStat = odbc_result($rs,"loanstatus"); 
					}
						
					$sql="SELECT * FROM COMAKER WHERE COMAKERNO = '".$comm1."'";
			 		$rs1=odbc_exec($conn,$sql);
					while (odbc_fetch_row($rs1)){
					$commName1 = odbc_result($rs1,"Lastname").", ".odbc_result($rs1,"Firstname")." ".odbc_result($rs1,"Middlename");}

						echo '<table>';
						echo '<tr><td width="130" align="right">Loan Status:</td>';
						echo '<td><strong>'.$ApplicationStat.'</strong></td></tr>';
						
						echo '<tr><td width="120" align="right">Borrower Name:</td>';
						echo '<td><strong>'.$Name.'</strong></td></tr>';
						
						echo '<tr><td width="130" align="right">Company:</td>';
						echo '<td><strong>'.$Company.'</strong></td></tr>';
						
						echo '<tr><td width="120" align="right">Loan Amount:</td>';
						echo '<td><strong>'.$AmountLoan.'</strong></td></tr>';
						
						echo '<tr><td width="120" align="right">Terms:</td>';
						echo '<td><strong>'.$Term.'</strong></td></tr>';
						echo '</table>';
				
						
			
				}
				
				
				
	?>
			
</body>
</html>