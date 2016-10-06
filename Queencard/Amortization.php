<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Amortization Schedule</title>

<style type='text/css'>

#Queencard {
	font-family: 'Times New Roman', Times, serif; font-size:14px; font-weight: bold;
	padding: 0px;
	}

#Queencard2 {
	font-family: 'Times New Roman', Times, serif; font-size:12px; font-weight: bold;
	padding: 0px;
	}
	
p {
	text-indent: 50px;
	text-align:justify;
	}
#underWord {
	text-decoration: underline;
	}
#tablemain {
	border: 0px solid black; border-collapse: collapse;
	font-family:"Times New Roman"; font-size:10px; font-weight: normal; border-spacing:inherit;
	padding-left: 2px; padding-right: 2px; margin:0px; text-align: right; padding-top: 0px; padding-bottom: 0px;
	}
	
#UpperBody {
	font-family: 'Times New Roman';
	font-size:12px;
	font-weight: normal;
	padding: 0px;
	}
	
#BorrowerName {
	font-family: 'Times New Roman'; 
	font-size:10px;
	font-weight: normal;
	padding: 0px;
	}
	
					
</style>
</head>

<body>
		    <?Php
				include 'connect.php';
				include 'NumConvert.php';
				$LoanIDnum = $_REQUEST['LoanID'];
				$AmortDates = $_REQUEST['AmortDates'];
				
				
					$sql = "Select * From Loans where loanid = '".$LoanIDnum."'";
					$rs=odbc_exec($conn,$sql);
					$BorrowerID = odbc_result($rs,"BorrowerNo");
					$ProdName = odbc_result($rs,"Product");
					$Company = odbc_result($rs,"Company");
					$AmountLoan = odbc_result($rs,"AmountLoan");
					$NetProceed = odbc_result($rs,"NetAmount");
					$Terms = odbc_result($rs,"Terms");
					$PNum = odbc_result($rs,"PNum");
					$PMode = odbc_result($rs,"mode");
					
					$com1 = odbc_result($rs,"comakerno1");
					$com2 = odbc_result($rs,"comakerno2");
					$releaseDate = odbc_result($rs,"releaseDate");
					$releaseDate = date_create($releaseDate);
					
					$sql2 = "Select * From Borrower where borrowerno = '".$BorrowerID."'";
					$rs2=odbc_exec($conn,$sql2);
					$BorrowerName = odbc_result($rs2,"Firstname")." ".odbc_result($rs2,"MI")." ".odbc_result($rs2,"Lastname");
					$BankAccount = odbc_result($rs2,"BankAccount");
					
					$sql2 = "Select * From Comaker where comakerno = '".$com1."'";
					$rs2=odbc_exec($conn,$sql2);
					$ComName1 = odbc_result($rs2,"Firstname")." ".odbc_result($rs2,"Middlename")." ".odbc_result($rs2,"Lastname");
					
					$sql2 = "Select * From Comaker where comakerno = '".$com2."'";
					$rs2=odbc_exec($conn,$sql2);
					$ComName2 = odbc_result($rs2,"Firstname")." ".odbc_result($rs2,"Middlename")." ".odbc_result($rs2,"Lastname");
					
					
					$TotalDeduct = odbc_result($rs,"ProcessFee") + odbc_result($rs,"OtherFees") + odbc_result($rs,"DocStampfee") + odbc_result($rs,"APLFee") + odbc_result($rs,"MRI");
					
					
					
					
					$DueDate1 = odbc_result($rs,"due_date1");
					$DueDate2 = odbc_result($rs,"due_date2");
					
					$DueDate11 = substr($DueDate1, -1);
					$DueDate12 = substr($DueDate2, -1);
					
					$AmountLoan = number_format($AmountLoan,2,'.',',');
					$NetProceed = number_format($NetProceed,2,'.',',');
					$TotalDeduct = number_format($TotalDeduct,2,'.',',');
					
					if (($DueDate1 == "11") || ($DueDate1 == "12") || ($DueDate1 == "13")) { $DueDate1 = $DueDate1."th"; }
					else {
						if ($DueDate11 =="1") { $DueDate1 = $DueDate1."st"; }
						else if ($DueDate11 =="2") { $DueDate1 = $DueDate1."nd"; }
						else if ($DueDate11 =="3") { $DueDate1 = $DueDate1."rd"; }
						else { $DueDate1 = $DueDate1."th"; }
					}
					
					if (($DueDate2 == "11") || ($DueDate2 == "12") || ($DueDate2 == "13")) { $DueDate2 = $DueDate2."th"; }
					else {
						if ($DueDate12 =="1") { $DueDate2 = $DueDate2."st"; }
						else if ($DueDate12 =="2") { $DueDate2 = $DueDate2."nd"; }
						else if ($DueDate12 =="3") { $DueDate2 = $DueDate2."rd"; }
						else { $DueDate2 = $DueDate2."th"; }
					}
					

					$AmountLoanWord = convert_number_to_words($AmountLoan);
					$TermsWord = convert_number_to_words($Terms);
					
					if ($PMode == "2") {
						$DueDateWord = $DueDate1." and ".$DueDate2; }
					else if ($PMode == "3") {
						$DueDateWord = $DueDate2; }
					
					
		
			?>
		
        <table id='Queencard'>
		<tr id='Queencard'><td id='Queencard' width='600' align='center'>QUEENCARD CORPORATION</td></tr>
		<tr id='Queencard'><td id='Address' width='600' align='center'>Sky Cit Tower, Mapa Street, Iloilo City</td></tr>
		<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>
		<tr id='UpperBody'><td id='UpperBody' width='600' align='center'></td></tr>
		<tr id='Queencard'><td id='Corproation' width='600' align='center'>AMORTIZATION</td></tr>
		</table>
        
        <table>
		<tr id='UpperBody'><td id='UpperBody' width='600'><p> This is to authorize <label id='underWord'><strong> <?Php echo $Company; ?> </strong></label> to deduct from my <label id='underWord'><strong>PAYROLL ACCOUNT</strong></label> the amount hereunder stipulated and to remit the same to <strong>QUEENCARD CORPORATION</strong> as payment of my <label id='underWord'> <strong><?Php echo $ProdName; ?></strong></label>  No: <label id='underWord'><strong><?Php echo $LoanIDnum; ?></strong></label> /PN No.: <label id='underWord'><strong>______________</strong></label> every <label id='underWord'><strong><?Php echo $DueDateWord; ?></strong></label> of the month or until fully paid as follows.</p></td></tr>
        
        </table>
               
                    
        <table>
		<tr>
        <th id="Queencard2" width='100'>Due Date</th>
		<th id="Queencard2" width='60'>Principal</th>
		<th id="Queencard2" width='60'>Interest</th>
		<th id="Queencard2" width='60'>GRT</th>
		<th id="Queencard2" width='60'>Charges</th>
		<th id="Queencard2" width='80'>Amortization</th>
		<th id="Queencard2" width='100'>Out. Balance</th>
        </tr>
        </table>
        
        </table>
		<tr><hr width=600px size="1" color="#666666" align="left" /></tr>
		<table>
                        
        <table>
        <tr>
        <th id='tablemain' width='100'></th>
		<th id='tablemain' width='60'></th>
		<th id='tablemain' width='60'></th>
		<th id='tablemain' width='60'></th>
		<th id='tablemain' width='60'><strong><?Php echo $TotalDeduct; ?></strong></th>
		<th id='tablemain' width='80'><strong><?Php echo $NetProceed; ?></strong></th>
		<th id='tablemain' width='100'><strong><?Php echo $AmountLoan; ?></strong></th>
        </tr>
     
    <?Php
				
				$TotalInterest = 0;
				$TotalGRT = 0;
				$TotalAmort = 0;
				
				
				$sql="SELECT * FROM AMORTSCHED WHERE LOANID = '".$LoanIDnum."' order by count";
			 	$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs))
				{	
					$DueDate = odbc_result($rs,"duedate");
					$Interest = number_format(odbc_result($rs,"Interest"),2,'.',',');
					$Principal = number_format(odbc_result($rs,"Principal"),2,'.',',');
					$GRT = number_format(odbc_result($rs,"GRT_Interest"),2,'.',',');
					$Amortization = number_format(odbc_result($rs,"Amortization"),2,'.',',');
					$Out_Bal = number_format(odbc_result($rs,"Out_Bal"),2,'.',',');

					$DueDate = date_create($DueDate);
					$DueDate = date_format($DueDate,"m/d/Y");	
					
						echo '<tr>';
						if ($AmortDates=="true"){
						echo '<th id="tablemain" width="100">'.$DueDate.'</th>';
						} else {
						echo '<th id="tablemain" width="100"></th>';
						}
						echo '<th id="tablemain" width="60">'.$Principal.'</th>';
						echo '<th id="tablemain" width="60">'.$Interest.'</th>';
						echo '<th id="tablemain" width="60">'.$GRT.'</th>';
						echo '<th id="tablemain" width="60"></th>';
						echo '<th id="tablemain" width="80">'.$Amortization.'</th>';
						echo '<th id="tablemain" width="100">'.$Out_Bal.'</th>';
						echo '<th id="tablemain" width="30">'.odbc_result($rs,"count").'</th>';
						echo '</tr>';

						$TotalInterest = $TotalInterest + odbc_result($rs,"Interest");
						$TotalGRT = $TotalGRT + odbc_result($rs,"GRT_Interest");
						$TotalAmort = $TotalAmort + odbc_result($rs,"Amortization");
				}
						
						echo '</table>';
						
						echo '</table>';
						echo '<tr><hr width=600px size="1" color="#666666" align="left" /></tr>';
						echo '<table>';
					
						echo '<table>';
						echo '<tr>';
						echo '<th id="tablemain" width="100"></th>';
						echo '<th id="tablemain" width="60"><strong>'.$AmountLoan.'</strong></th>';
						echo '<th id="tablemain" width="60"><strong>'.$TotalInterest.'</strong></th>';
						echo '<th id="tablemain" width="60"><strong>'.$TotalGRT.'</strong></th>';
						echo '<th id="tablemain" width="60"><strong>'.$TotalDeduct.'</strong></th>';
						echo '<th id="tablemain" width="80"><strong>'.$TotalAmort.'</strong></th>';
						echo '<th id="tablemain" width="100"></th>';
						echo '<th id="tablemain" width="30"></th>';
						echo '</tr>';
						echo '</table>';
				
				
				
	?>
    	
   			<table>
			<tr>
			<th width='450' id='tableTotal'></th>
			<th width='200' id='UpperBody' align='center'><label id='underWord'><strong><?php echo $BorrowerName; ?></strong></label></th>
			<th width='30' id='tableTotal'></th>
			</tr>
			<tr>
			<th width='450' id='tableTotal'></th>
			<th width='200' id='BorrowerName' align='center'>Name and Signature of Borrower</th>
			<th width='30' id='tableTotal'></th>
			</tr>
			</table>
            
            
            <table>
			<tr height='10' id='UpperBody'><td id='UpperBody' width='600' align='left'></td></tr>
			<tr id='UpperBody'><td id='UpperBody' width='600' align='left'><p> This is to authorize <label id='underWord'><strong> <?Php echo $Company; ?> </strong></label> to deduct from my/our <label id='underWord'><strong>PAYROLL ACCOUNT</strong></label> the amount herein stipulated of whatever due and to remit the same to <strong>QUEENCARD CORPORATION</strong> in case <label id='underWord'><strong><?php echo $BorrowerName; ?></strong></label> fails or refuses to pay the said loan amount.</p></td></tr>
			</table>
					
					
			<table>
			<tr id='UpperBody'><td id='UpperBody' width='300' align='center'></td>
			<tr id='UpperBody'><td id='UpperBody' width='300' align='center'><label id='underWord'><strong><?Php echo $ComName1; ?></strong></label></td>
			<td id='UpperBody' width='300' align='center'><label id='underWord'><strong><?Php echo $ComName2; ?></strong></label></td></tr>
			<tr id='BorrowerName'><td id='BorrowerName' width='300' align='center'>Co-Maker</td>
			<td id='BorrowerName' width='300' align='center'>Co-Maker</td></tr>
			</table>
					
					
			<table>
			<tr id='UpperBody'><th><img src='images/preparedby.jpg' width='360' height='80' /></th>
			<td>
            <table width='250'>
                <tr>
                <td width='150' id='BorrowerName' align='right'>Account Number:</td>
                <td width='100' id='BorrowerName' align='left'><strong><?Php echo $LoanIDnum; ?></strong></td>
                </tr>				
                <tr>
                <td id='BorrowerName' align='right'>PN Number:</td>
                <td></td>
                <tr>
                <td id='BorrowerName' align='right'>Date Released:</td>
                <td id='BorrowerName' align='left'><strong><?Php //echo date_format($releaseDate,"m/d/Y"); ?></strong></td>
                </tr>						
                <tr>
                <td id='BorrowerName' align='right'>Check Number:</td>
                <td></td>
                </tr>					
                <tr><td id='BorrowerName' align='right'>Savings Acc. No.:</td>
                <td id='BorrowerName' align='left'><strong><?Php echo $BankAccount; ?></strong></td>
                </tr>
			<table>
            </td></tr>
			</table>
        
</body>
</html>
