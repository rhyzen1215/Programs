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

</head>

<body>
            

			<!-- Employee Detail ---------------------------------------------------->
			<?Php
			

				
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
						$duedate1 = $_REQUEST['strDate_1'];
						$duedate2 = $_REQUEST['strDate_2'];
				
					$sql0="Update Loans set amountloan = '".$AmountLoan1."', terms = '".$Term1."', semi_mo = '".$MonthlyInstall1."', balance = '".$AmountLoan1."', otherfees = '".$ServiceCharge1."', processfee = '".$ProcessingFee1."', notarialfee = '".$NotarialFee1."', docstampfee = '".$DocStamp1."', APLfee = '".$APL1."', MRI = '".$MRI1."',  EIR = '".$EIR1."', netamount = '".$NetProceeds1."', comakerno1 = '".$comakerno11."', comakerno2 = '".$comakerno21."', dateapplied = '".$dateapplied1."', releasedate = '".$releasedate1."', startamortdate = '".$startamortdate1."', datemature = '".$datemature1."', due_date1 = '".$duedate1."', due_date2 = '".$duedate2."' WHERE loanid = '".$LoanIDnum1."'";
			 		$rs0=odbc_exec($conn,$sql0);
					
					
					
					echo 'Successfully Saved';
					
					}
				
				
				
				
				
			?>
			
</body>
</html>