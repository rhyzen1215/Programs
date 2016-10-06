<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DEED OF UNDERTAKING</title>

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
					
					$IntRateWord = convert_number_to_words($IntRate);
					
					$sql = "Select * From Borrower where borrowerno = '".$BorrowerID."'";
					$rs=odbc_exec($conn,$sql);
					$BorrowerName = odbc_result($rs,"Firstname")." ".odbc_result($rs,"MI")." ".odbc_result($rs,"Lastname");
					$ResAdd = odbc_result($rs,"residenceAdd");
					$SSSNum = odbc_result($rs,"SSS");
					$CompanyName2 = odbc_result($rs,"Company");
					$CivilStatus = odbc_result($rs,"CivilStatus");

					$CompanyName2 = strtoupper($CompanyName2);
					
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
					
					td {
						text-align:justify;
						font-family: 'Times New Roman'; 
						font-size:14px; 
						font-weight: normal;
						
					}
					 
					#Queencard {
					font-family: 'Times New Roman', Times, serif; font-size:18px; font-weight: bold;
					padding: 0px;
					text-align:center;
					}
					
				
					
					p {
					text-indent: 40px;
					text-align:justify;
					font-size: 14px;
					}

					
					
					#UpperBody {
					font-family:'Times New Roman'; font-size:14px; font-weight: normal;
					padding: 0px;
					}
					
				
					
					#BorrowerName {
					font-family: 'Times New Roman', Times, serif; font-size:14px; font-weight: normal;
					padding: 0px;
					}
					
				
					
					</style>
					
                    <table>
					<tr height="20"></tr>
					</table>
                    
                    
					<table>
					<tr><td id='Queencard' width='600' align='center'>DEED OF UNDERTAKING AND ASSIGNMENT </td></tr>
					<tr><td id='Queencard' width='600' align='center'>WITH</td></tr>
					<tr><td id='Queencard' width='600' align='center'>SPECIAL POWER OF ATTORNEY COUPLED WITH INTEREST</td></tr>
</table>

					<table>
					<tr height="20"></tr>
					</table>
					
					
                   
                    
					<table>
					<tr><td id='UpperBody' width='600'><p>I, <strong><?Php echo $BorrowerName; ?></strong>, of legal age, <?Php echo strtolower($CivilStatus); ?>, Filipino, and a resident of <strong><?Php echo $ResAdd; ?></strong>, witnesseth that:</p></td></tr>
					</table>
                    
                    
                    
                    <table width="600">
					<tr><td width='600'><ol>
                    <li>I am indebted to <strong>QUEENCARD CORPORATION</strong> in the amount of <strong>PESOS: <?Php echo strtoupper($AmountLoanWord); ?> (<u><?Php echo "P".$AmountLoan1; ?></u>) ONLY</strong>, subject to <u><strong><?Php echo strtoupper($IntRateWord); ?></strong></u> percent (<u><strong><?Php echo $IntRate."%"; ?></strong></u>) interest per annum under Promissory Note dated ___________________________;</li><br />
                    
                    <li>I understand that the grant of such loan is a special privilege made possible in view of my employment with <u><strong><?Php echo $CompanyName2; ?></strong></u> which is a company affiliated with or closely related to Queencard Corporation;</li><br />
                    
                     <li>In consideration for the granting of such loan, I agreed to execute this deed of undertaking and assignment with special power of attorney coupled with interest as additional and special condition for the grant of such loan;</li><br />
                     
                     
                     <li>NOW, THEREFORE, for and in consideration of the foregoing premises and of the undertakings, stipulations and commitments hereinafter set forth, and to further secure the full and prompt payment of my loan obligation and to ensure my faithful and complete compliance with my undertakings and obligations to Queencard Corporation even in the event that I am not anymore connected or employed with <u><strong><?Php echo $CompanyName2; ?></strong></u>  for whatever reason, I hereby expressly and voluntarily assign, transfer and convey by way of additional and special security unto and in favor of Queencard Corporation, its successors and assigns, all of my rights, title, interests and claims in and over any and all salaries or receivables / collectibles that I may have from and with my new/future employer, whether here or abroad, until my said principal obligation, agreed interest, fees and service/penalty charges (if applicable) in favor of Queencard Corporation shall have been fully paid;</li><br />
                     
                     <li>It is a condition that if I shall well and truly pay my obligation to Queencard Corporation despite the termination of my employment with <u><strong><?Php echo $CompanyName2; ?></strong></u>  for whatever cause, I shall be released from said obligation and this deed shall henceforth cease to have effect. Otherwise, this deed shall remain in full force and effect.</li><br />
                     
                     <li>To carry out and achieve the purpose for which this deed of undertaking is executed, I hereby name, constitute and appoint Queencard Corporation, or any of its duly authorized officer or representative, to be my true and lawful Attorney-in-Fact and in my name, place and stead, to act for and in my behalf, and to represent me in and by doing any and all of the following acts and deeds:<br /><br />
                        <ol type="a">
				         <li>To collect/receive from my new/future employer the sum of money, to be deducted from my salary, commission, bonus(es), 13th month pay, leave conversion, or other remuneration, the amount which I promised to pay Queencard Corporation under Promissory Note dated ___________________;</li>
					      <br />
                          
                          
                           <li>To execute, sign, subscribe and/or swear to any acknowledgment receipt, document or statement as may be necessary or appropriate and take full steps as may be required under the premises;</li>
					      <br />
                          
                          <li>Specifically, to fill in the date, amount and other necessary and appropriate details in the <strong>Authority To Deduct</strong> which I am signing simultaneous with this undertaking with special power of attorney;</li>
					      <br />
                          
                          <li>To instruct/authorize my new employer to issue a check representing my monthly salary/remuneration in the name of Queencard Corporation, and for its representative to receive the proceeds thereof and to apply the same amount to my obligation with Queencard Corporation until fully paid;</li>
					      <br />
                          
                          <li>To receive documents, notices and such other papers or processes anent the foregoing;</li>
					      <br />
					      
                       </ol>
                      </li> 
                      
                       <li>This authority is effective and limited only to my aforesaid loan obligation with Queencard Corporation under Promissory Note dated ____________________. However, this Special Power of Attorney shall continue to be valid and effective so long as my said obligation with Queencard Corporation subsists. It shall automatically terminate upon full and complete satisfaction of the said loan obligation.</li><br />
                      
				   </ol></td>
					</tr>
					</table>

                    <table>
					<tr><td id='UpperBody' width='592'><p><strong>HEREBY GIVING AND GRANTING</strong> unto my said assignee and attorney-in-fact full power and authority to do and perform all and every act requisite and necessary to carry into effect the foregoing authority, as fully to all intents and purposes as I might or could lawfully do if personally present, and hereby ratifying and confirming all that my said attorney-in-fact shall lawfully do or cause to be done by virtue hereof.</p></td></tr>
					</table>
                    
<table>
					<tr><td id='UpperBody' width='592'><p><strong>IN WITNESS WHEREOF</strong>, I have hereunto affixed my signature this ___ day of ______________________ at _____________________, Philippines.</p></td></tr>
</table>
                    
                    
                    
                     <table>
                     <tr>
                        <td width="166" height="20">&nbsp;</td>
                       <td width="233"></td>
                        <td width="150">&nbsp;</td>
                      </tr>
					</table>
                      
                    <table>
                      <tr>
                        <td width="38"></td>
                        <td width="261"><u><strong><?Php echo $BorrowerName; ?></strong></u></td>
                        <td width="19"></td>
                        <td width="260"><strong>QUEENCARD  CORPORATION</strong></td>
                      </tr>
                      <tr>
                        <td width="38"></td>
                        <td width="261">Assignor / Principal</td>
                        <td width="19"></td>
                        <td width="260">Assignee / Attorney-in-Fact</td>
                      </tr>
                       <tr>
                        <td width="38"></td>
                        <td width="261">SSS I.D No.<u><strong><?Php echo $SSSNum; ?></strong></u></td>
                        <td width="19"></td>
                        <td width="260"></td>
                      </tr>
                    </table>
                    
                    
                     <table>
                     <tr><td width="166" height="20">&nbsp;</td></tr>
					</table>
                    
                    
                    <table>
                      <tr>
                        <td width="38"></td>
                        <td width="195">&nbsp;</td>
                        <td width="85"></td>
                        <td width="260">Represented  by:</td>
                      </tr>
                      <tr>
                        <td width="38"></td>
                        <td width="195">&nbsp;</td>
                        <td width="85"></td>
                        <td width="260">&nbsp;</td>
                      </tr>
                       <tr>
                        <td width="38"></td>
                        <td width="195">&nbsp;</td>
                        <td width="85"></td>
                        <td width="260"><strong><u>GRETCHEN R. RASGO</u></strong></td>
                      </tr>
                      <tr>
                        <td width="38"></td>
                        <td width="195">&nbsp;</td>
                        <td width="85"></td>
                        <td width="260">SSS I.D No. <u><strong>07-2340665-1</strong></u></td>
                      </tr>
                    </table>
                    
                    
                    
                     <table>
                     <tr>
                        <td width="166" height="30">&nbsp;</td>
                       <td width="233"></td>
                        <td width="150">&nbsp;</td>
                      </tr>
                       <tr>
                        <td width="166">&nbsp;</td>
                        <td width="233"><p align="center"><strong><em>Signed in the Presence of:</em></strong></p></td>
                        <td width="150">&nbsp;</td>
                      </tr>
                    </table>
                    
                    <table>
                      <tr>
                        <td width="246" height="15"><p>___________________</p></td>
                        <td width="84"></td>
                        <td width="219"><p>___________________</p></td>
                      </tr>
                    </table>
                    
                    
                    
                    
                    <table>
                     <tr>
                        <td width="166" height="50">&nbsp;</td>
                      </tr>
					</table>
                    
                    
                    
                    <table>
					<tr><td id='Queencard' width='600' align='center' height="45"></td>
					</tr>
					<tr><td id='Queencard' width='600' align='center'>A C K N O W L E D G M E N T</td></tr>
					<tr><td width='600' align='center' id='Queencard' height="45"></td>
					</tr>
					</table>
                    
                    
                    <table>
                      <tr><td width="246">Republic of the Philippines)</td></tr>
                      <tr><td width="246">City of ________________) S.S</td></tr>
                      <tr><td width="246">X - - - - - - - - - - - - - - - - - - - - X</td></tr>
</table>
                    
                     <table>
					 <tr><td id='Queencard' width='600' align='center' height="30"></td></tr>
					 </table>
                    
                    
                    <table>
					<tr><td id='UpperBody' width='592'><p>BEFORE ME, this _____________ day of _______________________ at _____________________________ City, Philippines, personally appeared the above-named persons exhibiting to me their competent evidence of identity as indicated below their respective names, known to me to be the same persons who executed the foregoing instrument and they acknowledged to me that the same is their free and voluntary act and deed.</p></td></tr>
					</table>
                    
                    <table>
					<tr><td id='UpperBody' width='592'><p>This Deed of Undertaking and Assignment with Special Power of Attorney Coupled With Interest consists of three (3) pages only including the page where this acknowledgment is written and signed by the parties and their witnesses hereof.</p></td></tr>
					</table>
                    
<table>
					<tr><td id='UpperBody' width='592'><p>IN WITNESS WHEREOF, I have hereunto set my hand on the date and place above-written.</p></td></tr>
</table>
                    
                    
                    <table>
					 <tr><td id='Queencard' width='600' align='center' height="30"></td></tr>
					 </table>
                     
                    <table width="177">
                      <tr><td width="61">Doc   No. </td>
                      <td width="104">__________</td>
                      </tr>
                      <tr><td width="61">Page   No. </td>
                      <td width="104">__________</td>
                      </tr>
                      <tr><td width="61">Book   No. </td>
                      <td width="104">__________</td>
                      </tr>
                      <tr><td width="61">Series of </td>
                      <td width="104">__________</td>
                      </tr>
                     
                    </table>
                    
</body>
</html>