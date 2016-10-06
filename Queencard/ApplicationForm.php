
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Application Form</title>

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
					
					if ($PayMode == "2") { $PayMode = "semi-monthly"; }
					else if ($PayMode == "3") { $PayMode = "monthly"; }
					
					$CentRate = number_format($CentRate,2,'.',',');
					$PointCentRate = substr($CentRate,-2,2);
					$CentRate1 = number_format($CentRate,0,'.','');
					$CentRateW = convert_number_to_words($CentRate1);
					$PointCentRate = convert_number_to_words($PointCentRate);
					$IntRate = convert_number_to_words($IntRate).' ('.$IntRate.' %)';
					$CentRateW = $CentRateW.' point '.$PointCentRate.' ('.$CentRate.' %)';
					
					$DateApproved = odbc_result($rs,"DateApprovedOff1");
					$DateApproved = date_create($DateApproved);
					$DateApproved = date_format($DateApproved,"m/d/Y");

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
					align: right; font-size: 12px;
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
					<tr id='Queencard'><td id='Queencard' width='600' align='center'>QUEENCARD CORPORATION</td></tr>
					<tr id='UpperBody'><td id='Queencard' width='600' align='center'>Sky City Tower, Mapa Street, Iloilo City</td></tr>
					</table>

					<table>
					<tr></tr>
					</table>
					
					
					<table>
					<tr><td id='UpperBody' width='600'><p>I hereby apply for a &nbsp;<label id='underWord'>&nbsp;&nbsp;&nbsp;&nbsp; <strong><?Php echo $ProdName; ?> </strong>&nbsp;&nbsp;&nbsp;&nbsp;</label>&nbsp; of &nbsp;<label id='underWord'> &nbsp;&nbsp;&nbsp;&nbsp;<strong><?Php echo $AmountLoanWord.' (P'.$AmountLoan1.')'; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;</label>&nbsp; Philippine Currency, repayable in &nbsp; <label id='underWord'> &nbsp;&nbsp;&nbsp;&nbsp;<strong><?Php echo $TermsWord.' ('.$Terms.')'; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp; </label>&nbsp; equal <?Php echo $PayMode; ?> payments at the rate of &nbsp; <label id='underWord'> &nbsp;&nbsp;&nbsp;&nbsp;<strong><?Php echo $CentRateW; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp; </label>&nbsp; per centum, &nbsp; <label id='underWord'> &nbsp;&nbsp;&nbsp;&nbsp;<strong><?Php echo $IntRate; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp; </label>&nbsp; per annum, subject to the conditions contained in the Promissory Note and other supporting documents, to be used as follows:</p></td></tr>
					</table>
					
	
					<table>
					<tr><td id='UpperBody' width='600'><p>I hereby submit the following information, which I certify to be true and correct.</p></td></tr>
					</table>
					
					
					<table>
					<tr><td height='10'></td></tr>
					</table>
					
					<?Php
					$empID = "";
					$sql = "Select * From Borrower where Borrowerno = '".$BorrowerID."'";
					$rs=odbc_exec($conn,$sql);
					$empID = odbc_result($rs,"employeeno");
					$Name = odbc_result($rs,"Firstname").' '.substr(odbc_result($rs,"MI"),0,1).'. '.odbc_result($rs,"Lastname");
					$BPlace = odbc_result($rs,"birthplace");
					$BDate = odbc_result($rs,"birthdate");
					$BDate = date_create($BDate);
					$BDate = date_format($BDate,"m/d/Y");
					$Age = odbc_result($rs,"age");
					$CStatus = odbc_result($rs,"civilstatus");
					$Spouse = odbc_result($rs,"spousename");
					$ChildAges = odbc_result($rs,"Ages");
					$NoChildren = odbc_result($rs,"NoChildren");
					if ($NoChildren == 0) { $NoChildren = "NA"; }
					if ($NoChildren == "NA") { $ChildAges = ""; }
					$ResAdd = odbc_result($rs,"ResidenceAdd");
					$TelNo = odbc_result($rs,"TelNo");
					$EdBack = odbc_result($rs,"Education");
					$OwnRes = odbc_result($rs,"ResOwner");
					$Rental = odbc_result($rs,"Rental");
					$Depositor = odbc_result($rs,"Depositor");
					$BAccnt = odbc_result($rs,"BankAccount");
					$LBalance = number_format(odbc_result($rs,"LatestBalance"),'2','.',',');
					
					$Employer = odbc_result($rs,"Employer");
					$Position = odbc_result($rs,"Position");
					$BussAdd = odbc_result($rs,"CompanyAdd");
					$Service = odbc_result($rs,"Service").' Years';
					$EmpStatus = odbc_result($rs,"Status");
					$Salary = number_format(odbc_result($rs,"Salary"),'2','.',',');
					
					?>
					<table>
					<tr>
					<td id='UpperBody' width='270' align='left'>Name: <strong><?Php echo $Name; ?></strong></td>
					<td id='UpperBody' width='400' align='left'>Date and Place of Birth: <strong><?Php echo $BDate.' '.$BPlace; ?></strong></td>
					</tr>
					</table>
					
					<table>
					<tr>
					<td id='UpperBody' width='270'>Age: <strong><?Php echo $Age; ?></strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Marital Status: <strong><?Php echo $CStatus; ?></strong></td>
					<td id='UpperBody' width='400'>Name of Spouse: <strong><?Php echo $Spouse; ?></strong></td>
					</tr>
					</table>
					
					<table>
					<tr>
					<td id='UpperBody' width='270'>No. of Children & Ages: <strong><?Php echo $NoChildren.' '.$ChildAges; ?></strong></td>
					</tr>
					</table>
					
					<table>
					<tr>
					<td id='UpperBody' width='500'>Residence Address: <strong><?Php echo $ResAdd; ?></strong></td>
					</tr>
					</table>
					
					<table>
					<tr>
					<td id='UpperBody' width='270'>Telephone Number: <strong><?Php echo $TelNo; ?></strong></td>
					<td id='UpperBody' width='400'>Educational Background:<strong><?Php echo $EdBack; ?></strong></td>
					</tr>
					</table>
					
					<table>
					<tr>
					<td id='UpperBody' width='270'>Do you own your residence?: <strong><?Php echo $OwnRes; ?></strong></td>
					<td id='UpperBody' width='400'>If not, monthly Rental:<strong><?Php echo $Rental; ?></strong></td>
					</tr>
					</table>
					
					
					<table>
					<tr>
					<td id='UpperBody' width='270'>Are you a depositor of the bank?: <strong><?Php echo $Depositor; ?></strong></td>
					<td id='UpperBody' width='400'>If yes, Account Number:<strong><?Php echo $BAccnt; ?></strong></td>
					</tr>
					</table>
					
					<table>
					<tr>
					<td id='UpperBody' width='270'>Latest Balance: <strong><?Php echo $LBalance; ?></strong></td>
					</tr>
					</table>
					
					<table>
					<tr>
					<td id='UpperBody' width='400'>Name of Employer: <strong><?Php echo $Employer; ?></strong></td>
					<td id='UpperBody' width='100'>Position:<strong><?Php echo $Position; ?></strong></td>
					</tr>
					</table>
					
					
					<table>
					<tr>
					<td id='UpperBody' width='400'>Business Address: <strong><?Php echo $BussAdd; ?></strong></td>
					</tr>
					</table>
					
					
					<table>
					<tr>
					<td id='UpperBody' width='200'>Length of Service: <strong><?Php echo $Service; ?></strong></td>
					<td id='UpperBody' width='200'>Employment Status: <strong><?Php echo $EmpStatus; ?></strong></td>
					<td id='UpperBody' width='200'>Monthly Salary:<strong><?Php echo $Salary; ?></strong></td>
					</tr>
					</table>
					
					
					<table>
					<tr>
					<td id='UpperBody' width='600' align='left'><hr size='2' width='600' color='#666666'/></td>
					</tr>
					</table>
					
					
					<table>
					<tr>
					<td id='Queencard' width='550'>OUTSTANDING OBLIGATIONS</td>
					</tr>
					</table>
					
					
					<table width="605" id="UpperBody">
					<tr>
					<td width="153"><strong>Name of Creditor</strong></td>
					<td width="94"><strong>Amount</strong></td>
					<td width="109"><strong>Date Granted</strong></td>
					<td width="91"><strong>Date Mature</strong></td>
					<td width="134"><strong>Remarks</strong></td>
					</tr>
</table>
					<table width="605" id="UpperBody">
					<?php
					$sql = "Select  * From BorrowerDeduct where employeeno = '".$empID."' order by count";
					$rs=odbc_exec($conn,$sql) or die("Error in query");	
					while (odbc_fetch_row($rs)) {

						$OutB = odbc_result($rs,"amount") * 1;
						echo '<tr>';
						echo '<td width="153">'.odbc_result($rs,"description").'</td>';
						echo '<td width="94">'.number_format($OutB,2,'.',',').'</td>';
						echo '<td width="109">'.odbc_result($rs,"dategranted").'</td>';
						echo '<td width="91">'.odbc_result($rs,"datemature").'</td>';
						echo '<td width="134">'.odbc_result($rs,"remarks").'</td>';
						echo '</tr>';
					}
					?>
					</table>
					
					<table>
					<tr><td height='20'></td></tr>
					</table>

					<table>
					<tr>
					<td id='Queencard' width='350'>SIGNED IN THE PRESENCE OF:</td>
					<td id='Queencard' width='350'>RESPECTFULLY SUBMITTED:</td>
					<tr><td height='20'></td></tr>
					</tr>
					</table>
					
					
					<table>
					<tr><td id='bb' width='170'></td>
					<td width='165'></td>
					<td id='bb' width='170'></td></tr>
					<tr><td id='bb' width='170'></td>
					<td width='165'></td>
					<td width='170' align='center'><font size='2'>Signature of Applicant</font></td></tr>
					</table>
					
					
					
					
					<table>
					<tr><td height='20'></td></tr>
					<tr><td id='Queencard' width='350'>REPUBLIC OF THE PHILIPPINES)</td></tr>
					<tr><td id='Queencard' width='350'>ILOILO CITY &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;) S.S.</td></tr>
					<tr><td width='50'><label id='underWord'>x</label>_______________<label id='underWord'>x</label></td>
					</tr>
					</table>

					<table>
					<tr><td height='10'></td></tr>
					<tr><td id='UpperBody' width='600'><p>SUBSCRIBED AND SWORN TO before me this _____ day of ______________ at _______________ Philippines, affiant exhibiting to me his/her TIN or SSS No. _________________ issued at _______________ on _______________. </p></td></tr>
					<tr><td height='10'></td></tr>
					</table>
					
					<table>
					<tr>
					<td id='UpperBody' width='600' align='left'><hr size='2' width='600' color='#666666'/></td>
					</tr>
					</table>
					
					
					
					<table>
					<tr id='Queencard'><td id='Queencard' width='600' align='center'>ACTION ON LOAN APPLICATION</td></tr>
					<tr><td height='10'></td>
					</table>
					
					
					<table>
					<tr><td id='UpperBody' width='600'><p>I hereby apply for a &nbsp;<label id='underWord'>&nbsp;&nbsp;&nbsp;&nbsp; <strong><?Php echo $ProdName; ?> </strong> &nbsp;&nbsp;&nbsp;&nbsp;</label>&nbsp; of &nbsp;<label id='underWord'> &nbsp;&nbsp;&nbsp;&nbsp;<strong><?Php echo $AmountLoanWord.' (P'.$AmountLoan1.')'; ?></strong> &nbsp;&nbsp;&nbsp;&nbsp;</label>&nbsp; Philippine Currency, repayable in &nbsp; <label id='underWord'> &nbsp;&nbsp;&nbsp;&nbsp;<strong><?Php echo $TermsWord.' ('.$Terms.')'; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp; </label>&nbsp; equal <?Php echo $PayMode; ?> payments at the rate of &nbsp; <label id='underWord'> &nbsp;&nbsp;&nbsp;&nbsp;<strong><?Php echo $CentRateW; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp; </label>&nbsp; per centum, &nbsp; <label id='underWord'> &nbsp;&nbsp;&nbsp;&nbsp;<strong><?Php echo $IntRate; ?></strong>&nbsp;&nbsp;&nbsp;&nbsp; </label>&nbsp; per annum, subject to the conditions contained in the Promissory Note and other supporting documents, to be used as follows:</p></td></tr>
					</table>
					
					
					<table>
					<tr><td></td></tr>
					<tr><td width='350'></label></td>
					<td id='Queencard' width='200' align='center'>QUEENCARD CORPORATION <img src='images/GretchSig.jpg' style='width:130px; height: 50px;' /></td></tr>
					</table>
					
					<?Php
					
					$LoanID1  = substr($LoanID,0,4);
					$LoanID2  = substr($LoanID,5,9);
					
					if ($Officer1 != "1") { $DateApproved = ""; }
					
					?>
					<table>
					<tr><td></td></tr>
					<tr><td width='350' id='UpperBody'>Date Approved: <label id='bb'><strong><?Php if (($Officer1 == "1") && ($Officer2 == "1")) { echo $DateApproved;} ?></strong></label></td></tr>
					<tr><td width='350' id='UpperBody'><label id='bb'><strong><?Php echo strtoupper($LoanID1); ?></strong></label> Account No.<label id='bb'><strong><?Php echo strtoupper($LoanID2); ?></strong></label></td></tr>
					</table>
					
				
					
					<table>
					<tr id='Queencard'><td id='Queencard' width='600' align='center'>APPROVED BY:</td></tr>
					</table>
					
					
					<?Php
					echo '<table>';
					echo '<tr><td width="70"></td>';
					if ($Officer2 == "1") {
					echo '<td width="130"><img src="images/DAJ1.png" style="width:130px; height: 60px;" /></td>'; }
					else {
					echo '<td width="130"><img src="images/DAJ2.png" style="width:130px; height: 60px;" /></td>';
						}
					echo '<td width="180"></td>';
					if ($Officer1 == "1") {
					echo '<td width="30"><img src="images/EOJ1.png" style="width:130px; height: 60px;" /></td></tr>';
						}
					else {
					echo '<td width="130"><img src="images/EOJ2.png" style="width:130px; height: 60px;" /></td></tr>';
						}
					echo '</table>';
					
					?>
					


</body>
</html>