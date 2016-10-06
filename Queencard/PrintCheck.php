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
                    
                    <table width="639">
                    <tr height="5"></tr>
                    </table>
				
					<table width="639">
                    
      <tr>
                    	<td width="10" height="20"></td>
		  <td id='UpperBody' width='450' align='left'></td>
				  <td id='UpperBody' width='163' align='left'><strong><?Php echo date_format(date_create(),"M d, Y"); ?></strong></td>
					</tr>
                    
                  
				  <tr>
                    	<td height="30"></td>
					  <td id='UpperBody' width='450' align='center'><strong><?Php echo $Payee; ?></strong></td>
					  <td id='UpperBody' width='163' align='left'><strong><?Php echo $NetProceed; ?></strong></td>
					</tr>
                    
                   
                    
                    </table>
                    
                    
                    
<table width="496">
<tr>
						<td id='UpperBody' width='515' align='center'><strong><?Php echo $NetProceedWord; ?></strong></td>
  </tr>
					</table>
					  
					 
	
					
			


</body>
</html>