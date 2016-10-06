
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
        	
            <?php
$date=date_create("2013-03-15");
echo date_format($date,"M d, Y");
date_add($date,date_interval_create_from_date_string("1 day"));
echo date_format($date,"M d, Y");
?>

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
                <th width="500">DATE GRANTED</th>
  				</tr>
             </table>
             
			<table> 
			
			 <?Php
			 
			include 'connect.php';
			$TotalBalance = 0;
			$TotalPrincipal = 0;
			$TotalLastPay = 0;
			
			if (isset($_GET['ViewLoan2'])){
			 
				$LoanCompany = $_REQUEST['LoanStatus'];
				$LoanProduct = $_REQUEST['LoanProduct'];
				$DateFrom = $_REQUEST['DateFrom'];
				$DateTo = $_REQUEST['DateTo'];
				
				$DateFrom=date_create($DateFrom);
				$DateTo=date_create($DateTo);
				$DateFromTemp = $DateFrom;
				

				
						
				
				
				
			 	$sql="SELECT * FROM LOANS WHERE COMPANY = '".$LoanCompany."' AND PRODUCTCODE = '".$LoanProduct."' AND status IN ('Current','Past Due','ITL') AND LOANSTATUS = 'Approved'  AND releaseStat = 'Yes' order by Name";
			 	$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs))
					{
						
						echo ('<form name="SubSearch" action="LoanRelease2.php">');
						echo ('<tr>');
						echo ('<td width="80">'.substr(odbc_result($rs,"LOANID"),5,9).'</td>');
						echo ('<td width="80">'.substr(odbc_result($rs,"PNUM"),3,9).'</td>');
						echo ('<td width="200">'.odbc_result($rs,"NAME").'</td>');
						
						while($DateFromTemp <= $DateTo)
						{
							$LastPayment = 0;
							$DateFromTemp = date_format($DateFromTemp,"m/d/y H:i:s");
							
							$sql2="SELECT * FROM AMORTSCHED WHERE LOANID='".odbc_result($rs,"LOANID")."' AND DUEDATE = '".$DateFromTemp."'";
							$rs2=odbc_exec($conn,$sql2);
							while (odbc_fetch_row($rs2))
							{
								$LastPayment = number_format(odbc_result($rs2,"AMORTIZATION"),2,'.',',');
								echo ('<td width="80" align="right">'.$LastPayment.'</td>');
							}
							
							
							$DateFromTemp=date_create($DateFromTemp);
							date_add($DateFromTemp,date_interval_create_from_date_string("1 day"));
						}
						
						$DateFromTemp = $DateFrom;
						
						echo ('</tr>');
						
						
					}	
					

					
			}
			?>
            
			 </table>
					
            
           

</body>
</html>