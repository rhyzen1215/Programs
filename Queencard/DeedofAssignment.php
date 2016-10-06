<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Deed of Assignment</title>

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
				
					
					
					?>
				

					<style type='text/css'>
					@media print {#Footer { display: none !important; }}
					#Queencard {
					font-family: 'Times New Roman', Times, serif; font-size:12px; font-weight: bold;
					padding: 0px;
					}
					
					#Corproation {
					font-family: 'Century Gothic'; font-size:14px; font-weight: bold;
					padding: 0px;
					}
					
					p {
					text-indent: 40px;
					text-align:justify;
					font-size: 12px;
					}
					
					#bgImage {
					width:200px; height: 71px; background-image:url(images/GretchSig.jpg);
					}
					
					#Address {
					font-family: 'Times New Roman'; font-size:10px; font-weight: normal;
					padding: 0px;
					}
					
					#UpperBody {
					font-family: 'Times New Roman', Times, serif; font-size:12px; font-weight: normal;
					padding: 0px;
					}
					
					#UpperBodyP {
					font-family: 'Times New Roman', Times, serif; font-size:12px; font-weight: normal;
					text-align:justify;
					padding: 0px;
					}
					
					#UpperBody2 {
					font-family: 'Times New Roman', Times, serif; font-size:12px; font-weight: normal;
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
					font-family: 'Times New Roman', Times, serif; font-size:10px; font-weight: normal;
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
					<tr id='Queencard'><td id='Queencard' width='600' align='center'>DEED OF ASSIGNMENT</td></tr>
					<tr id='UpperBody'><td id='Queencard' width='600' align='center'>(As collateral for SALARY BASED GENERAL CONSUMPTION LOAN Availment)</td></tr>
					</table>

					<table>
					<tr height="20"></tr>
					</table>
					
					
					<table>
                    <tr><td id='UpperBody' width='600'>KNOW ALL MEN BY THESE PRESENTS:</td></tr>
					<tr><td id='UpperBody' width='600'><p>That I/WE, <u><?Php echo strtoupper($BorrowerName);?></u>, for and in consideration of the sum of PESOS: <u><strong><?Php echo strtoupper($AmountLoanWord). " (P".$AmountLoan1.")";?></strong></u>  as form of loan as availed of thru Promissory Notes with <u>QUEENCARD CORPORATION</u>, a domestic corporation organized in accordance with the laws of the Philippines with principal address at Sky City Tower, Mapa St., Iloilo City 5000, Philippines, have assigned to <u>QUEENCARD CORPORATION</u>, its successors, or assigns all my/our rights, title and interest in the sum of <u><strong><?Php echo strtoupper($AmountLoanWord). " (P".$AmountLoan1.")";?></strong></u>, Philippine currency, together with any interest thereon, out of my/our <u>13th month pay/14th month pay/Retirement Pay/Commission and other benefits</u> with <u><?Php echo strtoupper($CompanyName);?></u> in my/our name it being understood that <u>QUEENCARD CORPORATION</u> and/or <u><?Php echo strtoupper($CompanyName);?></u> has full control of the said sum, together with its interests, and that the said sum shall be assigned to <u>QUEENCARD CORPORATION</u> to fully secure my obligation and same cannot be withdrawn by the undersigned, his heirs, successors and assigns, unless the outstanding amount due on my/our <u>SALARY BASED GENERAL CONSUMPTION LOAN</u> including the extensions, reavailments, and renewals of the Promissory Notes thereof granted to me/us by the Firm as well as the interest thereon and expenses incurred  have been fully paid.  In the event that the said loan availment is/are not paid at maturity or any time upon demand by the <u>QUEENCARD CORPORATION</u> for any reason whatsoever,<u><?Php echo strtoupper($CompanyName);?></u> through instructions from <u>QUEENCARD CORPORATION</u> is fully authorized and empowered to remit to <u>QUEENCARD CORPORATION</u> and apply without prior notice to me/us the said <u>13th month pay/14th month pay/Retirement Pay/Commission and other benefits</u> to the payment of the loan or credit accommodations herein mentioned.</p></td></tr>
					</table>
                    
                    
                    
                    <table>
					<tr><td id='UpperBody' width='600'><p>In addition, upon service of any writ of attachment or assignment on the above-mentioned <u>SALARY BASED GENERAL CONSUMPTION LOAN</u> by third parties, the said loan availment shall automatically become due and demandable and that<u> <?Php echo strtoupper($CompanyName);?></u> is fully authorized without prior notice to me/us to assign my <u>13th month pay/14th month pay/Retirement Pay/Commission and other benefits</u> and to apply the proceeds thereof as payment to the availment herein mentioned.  </p></td></tr>
					</table>
                    
                    
<table>
					<tr><td id='UpperBody' width='600'><p>Further, I/We waive in favor of Bangko Sentral ng Pilipinas my/our right under existing laws to the confidentiality of my/our <u>13th month pay/14th month pay/Retirement Pay/Commission and other benefits</u> subject to this Deed of Assignment.</p></td></tr>
</table>
                    
                    
                    
                    <table>
					<tr><td id='UpperBody' width='600'><p>IN WITNESS HEREOF, I/We have hereunto affixed my/our signature at ____________________, Philippines, this day of _____________________________.</p></td></tr>
					</table>
					
                    
                    <table>
                    <tr height="10"></tr>
					<tr id='Queencard'><td id='Queencard' width='600' align='center'><u><strong><?Php echo strtoupper($BorrowerName);?></strong></u></td></tr>
					<tr id='UpperBody'><td id='UpperBody' width='600' align='center'>(Signature over printed name)</td></tr>
</table>
                    
                    <table>
                    <tr height="20"></tr>
					<tr id='UpperBody'><td id='UpperBody' width='599' align='center'>SIGNED IN THE PRESENCE OF:</td>
					</tr>
                    <tr height="10"></tr>
                    </table>
                     <table width="600">
					<tr>
                    <td id='UpperBody' width='300' align='center'>____________________________</td>
                    <td id='UpperBody' width='296' align='center'>____________________________</td>
                    </tr>
                    </table>
                    
                    
                    <table>
                    <tr height="20"></tr>
					<tr><td id='UpperBody' width='600'>REPUBLIC OF THE PHILIPPINES (CITY OF ___________________)S.S.</td></tr>
					</table>
                    
                    <table>
					<tr><td id='UpperBodyP' width='600'>_______________________ City, Philippines, this ___________ day of _______________, 20_____ before me, a Notary Public personally appeared _________________________________ with ____________________________ issued at _____________________ on ______________________________ who executed the foregoing Deed of Assignment and acknowledged to me that the same is his/her free and voluntary act and deed.</td></tr>
					</table>
                    
                    
                    <table>
                    <tr height="10"></tr>
					<tr>
                    <td id='UpperBody' width='50'>Doc. No. </td>
                    <td id='UpperBody' width='100'>______________</td>
                    </tr>
                    <tr>
                    <td id='UpperBody' width='50'>Page No. </td>
                    <td id='UpperBody' width='100'>______________</td>
                    </tr>
                    <tr>
                    <td id='UpperBody' width='50'>Book No. </td>
                    <td id='UpperBody' width='100'>______________</td>
                    </tr>
                    <tr>
                    <td id='UpperBody' width='50'>Series of </td>
                    <td id='UpperBody' width='100'>______________</td>
                    </tr>
					</table>
	
					
					


</body>
</html>