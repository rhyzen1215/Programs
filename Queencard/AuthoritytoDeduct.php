<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AUTHORITY TO DEDUCT</title>

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
					
					
					if (isset($_REQUEST['LoanID'])){
						$LoanID = $_REQUEST['LoanID'];
					}
				
					$sql = "Select * From Loans where loanid = '".$LoanID."'";
					$rs=odbc_exec($conn,$sql);
					$BorrowerID = odbc_result($rs,"BorrowerNo");
					$ProdName = odbc_result($rs,"Product");
					$BorrowerName = odbc_result($rs,"Name");
					$CompanyName = odbc_result($rs,"Company");
					$AmountLoan = odbc_result($rs,"AmountLoan");
					$Terms = odbc_result($rs,"Terms");
					$PayMode = odbc_result($rs,"Mode");
					$IntRate = odbc_result($rs,"Rate");
					$Officer1 = odbc_result($rs,"Officer1");
					$Officer2 = odbc_result($rs,"Officer2");
					
					
					
					$IntRate = $IntRate  * 100;
					$CentRate = $IntRate / 12;
					$AmountLoan1 = number_format($AmountLoan,2,'.',',');
					$AmountLoan = number_format($AmountLoan,0,'.','');
					$AmountLoanWord = convert_number_to_words($AmountLoan);
					$TermsWord = convert_number_to_words($Terms);
					
					$sql = "Select * From Borrower where borrowerno = '".$BorrowerID."'";
					$rs=odbc_exec($conn,$sql);
					$BorrowerName = odbc_result($rs,"Firstname")." ".odbc_result($rs,"MI")." ".odbc_result($rs,"Lastname");
					$BankAccount = odbc_result($rs,"BankAccount");
					
					$sql = "Select * From AmortSched where loanid = '".$LoanID."' and count = '1'";
					$rs=odbc_exec($conn,$sql);
					$AmrtSched = odbc_result($rs,"amortization");
					$AmrtSched = number_format($AmrtSched,2,'.',',');
					$AmrtSchedCon = convert_number_to_words($AmrtSched);
					$AmrtSchedDate = odbc_result($rs,"duedate");
					$AmrtSchedDate = date_create($AmrtSchedDate);
					$AmrtSchedDate = date_format($AmrtSchedDate,"m/d/Y");
					
					?>
				

					<style type='text/css'>
					@media print {#Footer { display: none !important; }}
					#Queencard {
					font-family: 'Times New Roman', Times, serif; font-size:18px; font-weight: bold;
					padding: 0px;
					}
					
					#Corproation {
					font-family: 'Century Gothic'; font-size:14px; font-weight: bold;
					padding: 0px;
					}
					
					p {
					text-indent: 40px;
					text-align:justify;
					font-size: 15px;
					}
					
					#bgImage {
					width:200px; height: 71px; background-image:url(images/GretchSig.jpg);
					}
					
					#Address {
					font-family: 'Times New Roman'; font-size:10px; font-weight: normal;
					padding: 0px;
					}
					
					#UpperBody {
					font-family:'Times New Roman'; font-size:14px; font-weight: normal;
					padding: 0px;
					}
					
					#UpperBodyP {
					font-family: 'Times New Roman', Times, serif; font-size:14px; font-weight: normal;
					text-align:justify;
					padding: 0px;
					}
					
					#UpperBody2 {
					font-family: 'Times New Roman', Times, serif; font-size:14px; font-weight: normal;
					text-align: justify;
					text-justify: inter-word;
					padding: 0px;
					}
					
					#bb {
     				border-bottom: 1px solid black !important;
					font-family: 'Times New Roman', Times, serif; font-size:12px; font-weight: normal;
					padding-left: 10px;
    				}
	
					#underL { text-decoration: underline;}
					
					#BorrowerName {
					font-family: 'Times New Roman', Times, serif; font-size:14px; font-weight: normal;
					padding: 0px;
					}
					
					#underWord {
					text-decoration: underline;
					}
					
					#tablemain {
					border: 0px solid black; border-collapse: collapse;
					font-family:'Century Gothic'; font-size:8px; font-weight: normal; border-spacing:inherit;
					padding-left: 2px; padding-right: 2px; margin:0px; text-align: right; padding-top: 0px; padding-bottom: 0px
					}
					
					#tableTotal {
					border: 1px; font-family:'Century Gothic'; font-size:10px; font-weight: bold; border-spacing:inherit;
					padding-left: 2px; padding-right: 2px; margin: 2px; text-align: right; padding-top: 0px; padding-bottom: 0px
					}
					
					</style>
					
					<table>
					<tr id='Queencard'><td id='Queencard' width='600' align='center'>AUTHORITY TO DEDUCT</td></tr>
					</table>

					<table>
					<tr height="20"></tr>
					</table>
					
					
                    <table>
                    <tr><td width="45">TO: </td><td id='UpperBody' width='584'>__________________________</td></tr>
                    <tr><td width="45"> </td><td id='UpperBody' width='584'>__________________________</td></tr>
                    <tr><td width="45"> </td><td id='UpperBody' width='584'>__________________________</td></tr>
                    <tr><td width="45"> </td><td id='UpperBody' width='584'>__________________________</td></tr>
                    </table>
                    
                    <table>
                    <tr><td width="45" height="70">Dear </td><td id='UpperBody' width='584'>__________________________ :</td></tr>
                    </table>
                    
					<table>
					<tr><td id='UpperBody' width='600'><p>This is to authorize you or your officially designated cashier or paymaster, to deduct from my salary the amount of PESOS: ____________________________
_______________________________________ (P______________) ONLY every payday starting _____________________________ until the total amount of PESOS: _____________________________________ (P______________) is fully paid and to remit the same to Queencard Corporation through its duly authorized collector, or at its office at G/F Sky City Tower, Mapa Street, Iloilo City, or through Queencard’s account with Queen City Development Bank (Queenbank) Mapa Branch under account number ________________________.
</p></td></tr>
					</table>
                    
                    
                    
                    <table>
					<tr><td id='UpperBody' width='600'><p>I am executing this authority to deduct pursuant to and in compliance with my promise to pay under Promissory Note which I executed in favor of Queencard Corporation on _______________. </p></td></tr>
					</table>
                    
                    
<table>
					<tr><td id='UpperBody' width='600'><p>This _______________________ day of ____________________________, at __________________________ City, Philippines.</p></td></tr>
</table>
                    
                    
                    
					
                    
                    <table>
                    <tr height="30">
                    <td width="321"></td>
                    <td></td></tr>
                    
					<tr id='Queencard'>
                    <td></td><td id='UpperBody' width='279' align='center'><u><strong><?Php echo strtoupper($BorrowerName);?></strong></u></td>
					</tr>
					<tr id='UpperBody'>
                    <td></td>
                    <td id='UpperBody' width='279' align='center'>Signature of Borrower over Printed Name</td>
					</tr>
</table>
                    
					
					


</body>
</html>