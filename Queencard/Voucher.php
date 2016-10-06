<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Voucher Form</title>

<style type='text/css'>
	@media print {#Footer { display: none !important; }}
	#Queencard {
	font-family: 'Times New Roman', Times, serif; font-size:14px; font-weight: bold;
	padding: 0px;
	}

	#UpperBody {
	font-family: 'Times New Roman', Times, serif; font-size:14px; font-weight: normal;
	padding: 0px; margin: 0px;
	}
	
	#SmallerText {
	font-family: 'Times New Roman', Times, serif; font-size:12px; font-weight: normal;
	padding: 0px; margin: 0px;
	}
	
	#SmallerText2 {
	font-family: 'Times New Roman', Times, serif; font-size:12px; font-weight: normal;
	padding-left: 10px; margin-left: 10px;
	}
	
	#SmallerTextU {
	font-family: 'Times New Roman', Times, serif; font-size:12px; font-weight: normal;
	padding: 0px; margin: 0px; border-bottom: solid 1px #000000; 
	}
	
	#underL { 
	font-family: 'Times New Roman', Times, serif; font-size:14px; font-weight: normal;
	padding: 0px; text-decoration: underline;}
	
	#UpperLine {
	font-family: 'Times New Roman', Times, serif; font-size:14px; font-weight: normal;
	padding: 0px; 
	border-collapse: collapse;
	border: solid 1px #000000; 
	}
	
	#UpperLine2 {
	font-family: 'Times New Roman', Times, serif; font-size:14px; font-weight: normal;
	padding: 0px;
	border-collapse: collapse;
	border: solid 1px #000000; 
	}
	
	
	table {
		border-collapse: collapse;
		margin: 5px;
	}
	
	</style>
					
</head>

<body>
					
					
					
					<?Php
					
					include 'connect.php';
					include 'NumConvert.php';
					
					$LoanID = "";
					$BorrowerID = "";
					$ProdName = "";
					$AmountLoan = "";
					$AmountLoanWord = "";
					$AmountLoan1 = "";
					$Terms = "";
					$TermsWord = "";
					$PayMode = "";
					$IntRate = "";
					$CentRate = "";
					$CentRate1 = "";
					$CentRateW = "";
					$PointCentRate = "";
					$DateApproved = "";
					$Payee = "";
					$PNum = "";
					$NetProceed = "";
					$ServCharge = "";
					$ProcessFee = "";
					$NotarialFee = "";
					$DocStamp = "";
					$NetProceedWord = "";
					$ProdCode = "";
					$Company = "";
					$NowDate = "";
					$CheckNum = "";
					$APLFee = "";
					
					
					if (isset($_REQUEST['LoanID'])){
						$LoanID = $_REQUEST['LoanID'];
					}
				
					$sql = "Select * From Loans where loanid = '".$LoanID."'";
					$rs=odbc_exec($conn,$sql);
					$Payee = odbc_result($rs,"Name");
					$BorrowerID = odbc_result($rs,"BorrowerNo");
					$ProdName = odbc_result($rs,"Product");
					$ProdCode = odbc_result($rs,"ProductCode");
					$Company = odbc_result($rs,"Company");
					$AmountLoan = odbc_result($rs,"AmountLoan");
					$Terms = odbc_result($rs,"Terms");
					$PayMode = odbc_result($rs,"Mode");
					$IntRate = odbc_result($rs,"Rate");
					$Officer1 = odbc_result($rs,"Officer1");
					$Officer2 = odbc_result($rs,"Officer2");
					$PNum = odbc_result($rs,"PNum");
					$NetProceed = odbc_result($rs,"NetAmount");
					$CheckNum = odbc_result($rs,"CheckNumber");
					$APLFee = odbc_result($rs,"APLFee");
					$MRI = odbc_result($rs,"MRI");
					$ServCharge = odbc_result($rs,"otherfees");
					$ProcessFee = odbc_result($rs,"processfee");
					$NotarialFee = odbc_result($rs,"notarialfee");
					$DocStamp = odbc_result($rs,"docstampfee");
					$DeductMode = odbc_result($rs,"deductionmode");
					
					$ProcessFee = $ProcessFee + $MRI + $APLFee;
					$ServCharge = number_format($ServCharge,2,'.',',');
					$ProcessFee = number_format($ProcessFee,2,'.',',');
					$NotarialFee = number_format($NotarialFee,2,'.',',');
					$DocStamp = number_format($DocStamp,2,'.',',');
					
					if ($DeductMode == "2") { $NetProceed = $AmountLoan; };
					$NetProceed = number_format($NetProceed,2,'.','');
					
					$NetWholeLen = strlen($NetProceed);
					
					$NetProceedWhole = substr($NetProceed,0,$NetWholeLen - 3);
					$NetProceedPart = substr($NetProceed,$NetWholeLen - 2,3);
					
					
					$NetProceedWholeStr = convert_number_to_words($NetProceedWhole);
					$NetProceedPart = $NetProceedPart * 1;
					
					if ($NetProceedPart > 0) { $NetProceedPartStr = convert_number_to_words($NetProceedPart); }
					
					if ($NetProceedPart == 0 ){$NetProceedWord = $NetProceedWholeStr." Pesos"; }
					else if ($NetProceedPart == 1 ){$NetProceedWord = $NetProceedWholeStr." Pesos and ".$NetProceedPartStr." Centavo"; }
					else if ($NetProceedPart > 1 ){$NetProceedWord = $NetProceedWholeStr." Pesos and ".$NetProceedPartStr." Centavos"; }
					
					$NetProceed = number_format($NetProceed,2,'.',',');
					$AmountLoan1 = number_format($AmountLoan,2,'.',',');

					$sql = "Select * From Borrower where Borrowerno = '".$BorrowerID."'";
					$rs=odbc_exec($conn,$sql);
					$Name = odbc_result($rs,"Firstname").' '.substr(odbc_result($rs,"MI"),0,1).'. '.odbc_result($rs,"Lastname");
					$ResAdd = odbc_result($rs,"ResidenceAdd");
					
					$NowDate = date_create($NowDate);
					$NowDate = date_format($NowDate,"m/d/Y");
					
					?>
					<table>
					<tr id='Queencard'><td id='Queencard' width='581' align='center'>QUEENCARD CORPORATION</td>
					</tr>
					<tr id='UpperBody'><td id='' width='581' align='center'>Sky City Tower, Mapa Street, Iloilo City</td>
					</tr>
					</table>

					<table width="590">
					<tr height="10"></tr>
					<tr><td id='Queencard' width='600' align='center'>CHECK VOUCHER</td></tr>
</table>
					
					<table width="590">
					<tr id='UpperBody'><td id='Queencard' width='425' align='center'></td>
					<td id='UpperBody' width='153' align='left'>CV #:</td>
					</tr>
</table>
					
					
					<table width="585">
					<tr>
						<td width="382" id='UpperLine'>
						<table width="372">
						<tr>
						<td id='UpperBody' width='79' align='left'>Payee:</td>
						<td id='UpperBody' width='281' align='left'><strong><?Php echo $Payee; ?></strong></td>
						</tr>
						</table>
					  </td>
						
						<td width="381" id='UpperLine'>
						<table width="183">
						<tr>
						<td id='UpperBody' width='74' align='left'>Date:</td>
						<td id='UpperBody' width='97' align='left'><strong><?Php echo $NowDate; ?></strong></td>
						</tr>
						</table>
					  </td>
					</tr>
					
					<tr>
						<td width="382" id='UpperLine'>
						<table width="372">
						<tr>
						<td id='UpperBody' width='79' align='left'>Address:</td>
						<td id='UpperBody' width='281' align='left'><strong><?Php echo $ResAdd; ?></strong></td>
						</tr>
						</table>
					  </td>
						
						<td width="381" id='UpperLine'>
						<table width="183">
						<tr>
						<td id='UpperBody' width='74' align='left'>Check No.:</td>
						<td id='UpperBody' width='97' align='left'><strong><?Php echo $CheckNum; ?></strong></td>
						</tr>
						</table>
					  </td>
					</tr>
					<tr>
						<td width="382" id='UpperLine'>
						<table width="372">
						<tr>
						<td id='UpperBody' width='79' align='center'><strong>PARTICULARS</strong></td>
						</tr>
						</table>
					  </td>
						
						<td width="381" id='UpperLine'>
						<table width="183">
						<tr>
						<td id='UpperBody' width='74' align='center'><strong>AMOUNT</strong></td>
						</tr>
						</table>
					  </td>
					</tr>
					
					
					<tr>
						<td width="382" height="114" id='UpperLine'>
						
						<table width="372">
						<tr>
						<td id='SmallerText' width='79' align='left'>Net Proceeds of <strong><?Php echo $ProdName; ?></strong> No.: <strong><?Php echo $LoanID; ?></strong>; PN No.: <strong><?Php echo $PNum; ?></strong></td>
						</tr>
						</table>

						<table width="371">
                        <tr height="10">
						  <td id='SmallerText' width='124' align='right'></td>
						  <td id='SmallerText' width='38' align='right'></td>
						  <td id='SmallerText' width='107' align='right'></td>
						  <td id='SmallerText' width='82' align='left'></td>
						</tr>
                        
						<tr height="10">
						  <td id='SmallerText' width='124' align='right'></td>
						  <td id='SmallerText' width='38' align='right'></td>
						  <td id='SmallerText' width='107' align='right'><?Php if ($DeductMode == "2") { echo "(Not Deducted)"; };?></td>
						  <td id='SmallerText' width='82' align='left'></td>
						</tr>
						<tr>
						  <td id='SmallerText' width='124' align='right'>Principal</td>
						  <td id='SmallerText' width='38' align='right'></td>
						  <td id='SmallerText' width='107' align='right'><strong><?Php echo $AmountLoan1; ?></strong></td>
						  <td id='SmallerText' width='82' align='left'></td>
						</tr>
						<tr>
							<td id='SmallerText' width='124' align='right'>Service Charge</td>
							<td id='SmallerText' width='38' align='right'></td>
							<td id='SmallerText' width='107' align='right'><strong><?Php echo $ServCharge; ?></strong></td>
							<td id='SmallerText' width='82' align='left'></td>
						</tr>
						<tr>
							<td id='SmallerText' width='124' align='right'>Processing Fee</td>
							<td id='SmallerText' width='38' align='right'></td>
							<td id='SmallerText' width='107' align='right'><strong><?Php echo $ProcessFee; ?></strong></td>
							<td id='SmallerText' width='82' align='left'></td>
						</tr>
						<tr>
							<td id='SmallerText' width='124' align='right'>Notarial Fee</td>
							<td id='SmallerText' width='38' align='right'></td>
							<td id='SmallerText' width='107' align='right'><strong><?Php echo $NotarialFee; ?></strong></td>
							<td id='SmallerText' width='82' align='left'></td>
						</tr>
						<tr>
							<td id='SmallerText' width='124' align='right'>Documantary Stamp</td>
							<td id='SmallerText' width='38' align='right'></td>
							<td id='SmallerTextU' width='107' align='right'><strong><?Php echo $DocStamp; ?></strong></td>
							<td id='SmallerText' width='82' align='left'></td>
						</tr>
						<tr>
							<td id='SmallerText' width='124' align='right'>Net Proceeds</td>
							<td id='SmallerText' width='38' align='right'></td>
							<td id='SmallerText' width='107' align='right'><strong>&nbsp;</td>
							<td id='SmallerText' width='82' align='left'></td>
						</tr>
						</table>
						
					 </td>
					 <td width="381" id='UpperLine'>
						<table width="183">
						<tr>
						<td id='SmallerText' width='79' align='left'>P<?Php echo $AmountLoan1.'; '.$Terms.' mos.'; ?></td>
						</tr>
						</table>
						
						<table width="147">
						<tr height="10">
			
						  <td id='SmallerText' width='115' align='right'></td>
						  <td id='SmallerText' width='20' align='left'></td>
						</tr>
						<tr>
						  <td id='SmallerText' width='115' align='right'>&nbsp;</td>
						  <td id='SmallerText' width='20' align='left'></td>
						</tr>
						<tr>

							<td id='SmallerText' width='115' align='right'>&nbsp;</td>
							<td id='SmallerText' width='20' align='left'></td>
						</tr>
						<tr>
							<td id='SmallerText' width='115' align='right'>&nbsp;</td>
							<td id='SmallerText' width='20' align='left'></td>
						</tr>
						<tr>

							<td id='SmallerText' width='115' align='right'>&nbsp;</td>
							<td id='SmallerText' width='20' align='left'></td>
						</tr>
						<tr>
							<td id='SmallerText' width='115' align='right'>&nbsp;</td>
							<td id='SmallerText' width='20' align='left'></td>
						</tr>
						<tr>
							<td id='SmallerText' width='115' align='right'><strong><?Php echo $NetProceed; ?></strong></td>
							<td id='SmallerText' width='20' align='left'></td>
						</tr>
					   </table>
					
						
					  </td>
					</tr>
					
					
					<tr>
						<td width="382" id='UpperLine'>
						<table width="372">
						<tr>
						<td id='UpperBody' width='79' align='left'><strong>AMOUNT IN WORDS</strong></td>
						</tr>
						<tr>
						<td id='UpperBody' width='79' align='center'><?Php echo $NetProceedWord; ?></td>
						</tr>
						</table>
					    </td>
						
						<td width="381" id='UpperLine'>
						<table width="183">
						<tr>
						<td id='UpperBody' width='74' align='left'><strong>RECEIVED BY:</strong></td>
						</tr>
						<tr>
						<td id='UpperBody' width='74' align='center'>&nbsp;</td>
						</tr>
						</table>
					  </td>
					</tr>
					
					</table>
					
		
					<table width="587" >
					<tr>
					<td id='UpperBody' width='151' align='left'><strong>JOURNAL ENTRIES</strong></td>
					<td id='UpperBody' width='261' align='center'><strong>DEBIT</strong></td>
					<td id='UpperBody' width='159' align='center'><strong>CREDIT</strong></td>
					</tr>
</table>
					
					
					
					<table width="586" id='UpperLine2'>
                           
					<tr>
					<td width='135' height="30" align='left' id='SmallerText2'><?Php echo $ProdCode.'-'.$Company; ?></td>
					<td width='201' id='SmallerText2' align='right'><?Php echo $AmountLoan1; ?></td>
					<td width='68' id='SmallerText2' align='right'>&nbsp;</td>
					<td width='105' id='SmallerText2' align='right'><?Php if ($DeductMode == "2") { echo "(Not Deducted)"; };?></td>
					<td width='53' id='SmallerText2' align='right'>&nbsp;</td>
					</tr>
					<tr>
					<td width='135' id='SmallerText2' align='right'>Service Charge</td>
					<td width='201' id='SmallerText2' align='right'>&nbsp;</td>
					<td width='68' id='SmallerText2' align='right'>&nbsp;</td>
					<td width='105' id='SmallerText2' align='right'><?Php echo $ServCharge; ?></td>
					<td width='53' id='SmallerText2' align='right'>&nbsp;</td>
					</tr>
					<tr>
					<td width='135' id='SmallerText2' align='right'>Processing Fee</td>
					<td width='201' id='SmallerText2' align='right'>&nbsp;</td>
					<td width='68' id='SmallerText2' align='right'>&nbsp;</td>
					<td width='105' id='SmallerText2' align='right'><?Php echo $ProcessFee; ?></td>
					<td width='53' id='SmallerText2' align='right'>&nbsp;</td>
					</tr>
					<tr>
					<td width='135' id='SmallerText2' align='right'>Notarial Fee</td>
					<td width='201' id='SmallerText2' align='right'>&nbsp;</td>
					<td width='68' id='SmallerText2' align='right'>&nbsp;</td>
					<td width='105' id='SmallerText2' align='right'><?Php echo $NotarialFee; ?></td>
					<td width='53' id='SmallerText2' align='right'>&nbsp;</td>
					</tr>
					<tr>
					<td width='135' id='SmallerText2' align='right'>Documentary Stamp</td>
					<td width='201' id='SmallerText2' align='right'>&nbsp;</td>
					<td width='68' id='SmallerText2' align='right'>&nbsp;</td>
					<td width='105' id='SmallerText2' align='right'><?Php echo $DocStamp; ?></td>
					<td width='53' id='SmallerText2' align='right'>&nbsp;</td>
					</tr>
					<tr>
					<td width='135' height="20" align='right' id='SmallerText2'>Net Proceeds</td>
					<td width='201' id='SmallerText2' align='right'>&nbsp;</td>
					<td width='68' id='SmallerText2' align='right'>&nbsp;</td>
					<td width='105' id='SmallerText2' align='right'><?Php echo $NetProceed; ?></td>
					<td width='53' id='SmallerText2' align='right'>&nbsp;</td>
					</tr>
					<tr>
					<td width='135' align='right' id='SmallerText2'>&nbsp;</td>
					<td width='201' id='SmallerText2' align='right'>&nbsp;</td>
					<td width='68' id='SmallerText2' align='right'>&nbsp;</td>
					<td width='105' id='SmallerText2' align='right'>&nbsp;</td>
					<td width='53' id='SmallerText2' align='right'>&nbsp;</td>
					</tr>
</table>

					

					<table width="586">
					<tr><td width="586" align='left'><img src="images/Voucher3.jpg" width="582" height="60"/> </td></tr>
					</table>
				
					
				
	
					
			


</body>
</html>