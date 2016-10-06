
<?Php
include 'connect.php';
if (isset($_REQUEST['SearchBor'])){
	$Search = $_REQUEST['SearchBor'];
	
}
		
?>
				
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Loan Analysis</title>
<style type="text/css">
<!--
.style2 {font-size: 12px}

-->
select
{
	width: 195px;
	margin-left:2px;
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
}
.style3 {
	font-size: 14px;
	font-weight: bold;
	}
th {
	font-family: "Century Gothic";
	font-size: 12px;
	font-weight: bold;
	white-space:nowrap;
	padding-left: 10px;
	padding-right: 20px;
	border-bottom:double;
	border-left: solid 1px black;
}

td {
	font-family: "Century Gothic";
	font-size: 12px;
	white-space:nowrap;
	padding-left: 10px;
	padding-right: 10px;
}

.style8 {
	font-family: "Century Gothic";
	font-size: 14px;
	font-style:italic;
	font-weight:bold;
	color: #FF0000;
	}
	
.style9 {
	font-family: "Century Gothic";
	font-size: 14px;
	border-top:thin;
	font-weight:bold;
	color: #0000FF;
	}
	
</style>

</head>

<body>
        
			<table>
			 <tr> <td align="center"><span class="style8">LOAN ANALYSYS</span></td></tr>
             <tr><td><hr width=640px size="1" color="#666666" align="left"/></td></tr> 
			</table>
			<!------------------------------------------------------------------------------------------------>
			
            
			<table>
				<tr height="10">
                <td></td>
                <td></td>
                <td></td>
  				</tr>
			</table>
			
			<table> 
				<tr height="20">
				<th width="80">LOAN NUMBER</th>
                <th width="80">PN NUMBER</th>
				<th width="200">BORROWER NAME</th>
                <th width="80">DATE GRANTED</th>
                <th width="80">MATURITY DATE</th>
                <th width="80">TERM</th>
				<th width="80">PRIN. AMOUNT</th>
                <th width="80" >PRIN. OUTSTANDING</th>
                <th width="80" >LATEST PAY AMOUNT</th>
                <th width="80" >LATEST PAY DATE</th>
  				</tr>
                
			 <?Php
			 
			include 'connect.php';
			$TotalBalance = 0;
			$TotalPrincipal = 0;
			$TotalLastPay = 0;
			
			if (isset($_GET['ViewLoan2'])){
			 
				$LoanCompany = $_REQUEST['LoanStatus'];
				$LoanProduct = $_REQUEST['LoanProduct'];
				
				
				
			 	$sql="SELECT * FROM LOANS WHERE COMPANY = '".$LoanCompany."' AND PRODUCTCODE = '".$LoanProduct."' AND status IN ('Current','Past Due','ITL') AND LOANSTATUS = 'Approved'  AND releaseStat = 'Yes' order by Name";
			 	$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs))
					{
						
						$sql1="SELECT TOP 1 * FROM AMORTSCHED WHERE LOANID = '".odbc_result($rs,"LOANID")."' order by COUNT DESC";
			 			$rs1=odbc_exec($conn,$sql1);
						
						
						$ReleaseDate = date_create(odbc_result($rs,"ReleaseDate"));
						$ReleaseDate = date_format($ReleaseDate,"M d, Y");
						
						$Maturity = date_create(odbc_result($rs1,"DueDate"));
						$Maturity = date_format($Maturity,"M d, Y");
						
						$sql2="SELECT TOP 1 * FROM AMORTSCHED WHERE LOANID='".odbc_result($rs,"LOANID")."' AND STATUS='1' order by COUNT DESC";
			 			$rs2=odbc_exec($conn,$sql2);
						$LastUpdate = date_create(odbc_result($rs2,"DueDate"));
						$LastUpdate = date_format($LastUpdate,"M d, Y");
						$LastPayment = number_format(odbc_result($rs2,"AMORTIZATION"),2,'.',',');
						
						$Terms = odbc_result($rs,"terms");
						
						if ($Terms < 12) { 
							$Terms = $Terms." months"; }
						else if ($Terms == 12) {
							$Terms = $Terms / 12; 
							$Terms = $Terms." year"; }
						else if ($Terms > 12) {
							$Terms = $Terms / 12; 
							$Terms = $Terms." years"; }	
						
							
						echo ('<form name="SubSearch" action="LoanRelease2.php">');
						echo ('<tr>');
						echo ('<td width="80">'.substr(odbc_result($rs,"LOANID"),5,9).'</td>');
						echo ('<td width="80">'.substr(odbc_result($rs,"PNUM"),3,9).'</td>');
						echo ('<td width="200">'.odbc_result($rs,"NAME").'</td>');
						echo ('<td width="80" align="center">'.$ReleaseDate.'</td>');
						echo ('<td width="80" align="center">'.$Maturity.'</td>');
						echo ('<td width="80" align="center">'.$Terms.'</td>');
						echo ('<td width="80" align="right">'.number_format(odbc_result($rs,"AMOUNTLOAN"),2,'.',',').'</td>');
						echo ('<td width="80" align="right">'.number_format(odbc_result($rs,"BALANCE"),2,'.',',').'</td>');
						echo ('<td width="80" align="right">'.$LastPayment.'</td>');
						echo ('<td width="80" align="center">'.$LastUpdate.'</td>');
						echo ('</tr>');
						echo ('</form>');
						
						$TotalBalance = $TotalBalance + number_format(odbc_result($rs,"BALANCE"),2,'.','');
						$TotalPrincipal = $TotalPrincipal + number_format(odbc_result($rs,"AMOUNTLOAN"),2,'.','');
						$TotalLastPay = $TotalLastPay + number_format(odbc_result($rs2,"AMORTIZATION"),2,'.','');
					}	
					
						echo ('<tr>');
						echo ('<td width="80"></td>');
						echo ('<td width="80"></td>');
						echo ('<td width="200"></td>');
						echo ('<td width="80" align="center"></td>');
						echo ('<td width="80" align="center"></td>');
						echo ('<td width="80" align="center"></td>');
						echo ('<td width="80" align="right"></td>');
						echo ('<td width="80" align="right"></td>');
						echo ('<td width="80" align="right"></td>');
						echo ('<td width="80" align="right"></td>');
						echo ('</tr>');
						
						
						echo ('<tr>');
						echo ('<td width="80"></td>');
						echo ('<td width="80"></td>');
						echo ('<td width="200"><strong><a href="LoanAnalysisPrint.php?LoanStatus='.$LoanCompany.'&LoanProduct='.$LoanProduct.'" style="text-decoration:none;" target="_blank">Print View</a></strong></td>');
						echo ('<td width="80" align="center"></td>');
						echo ('<td width="80" align="center"></td>');
						echo ('<td width="80" align="center"></td>');
						echo ('<td width="80" align="right"><span class="style9">'.number_format($TotalPrincipal,2,'.',',').'</td>');
						echo ('<td width="80" align="right" style="border:thick"><span class="style9">'.number_format($TotalBalance,2,'.',',').'</td>');
						echo ('<td width="80" align="right" style="border:thick"><span class="style9">'.number_format($TotalLastPay,2,'.',',').'</td>');
						echo ('<td width="80" align="right"></td>');
						echo ('</tr>');
						
					
			}
			?>
			 </table>
					
            
           

</body>
</html>