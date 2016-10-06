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

<script src="Schedule.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style2 {font-size: 12px}

.styleText {text-align:right}
-->

	a {
	text-decoration:none;
	font-family:"Century Gothic";
	font-weight:bolder;
	font-size:12px;
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
	font-family: "Century Gothic";
	}
.style7 {
	font-family: "Century Gothic";
	font-size: 12px;
	font-weight: bold;
	}
</style>


<script type="text/javascript">

	function EditValues() {
	
	document.getElementById("IntRate").readOnly = false;
	document.getElementById("ServCharge").readOnly = false;
	document.getElementById("ProcFee").readOnly = false;
	document.getElementById("MemFee").readOnly = false;
	document.getElementById("APLFee").readOnly = false;
	document.getElementById("MRI").readOnly = false;
	document.getElementById("DocStamp").readOnly = false;
	document.getElementById("NotFee").readOnly = false;
	document.getElementById("bEdit").disabled = true;
	document.getElementById("bSave").disabled = false;
	}
	
	function SaveValues() {

	document.getElementById("IntRate").readOnly = true;
	document.getElementById("ServCharge").readOnly = true;
	document.getElementById("ProcFee").readOnly = true;
	document.getElementById("MemFee").readOnly = true;
	document.getElementById("APLFee").readOnly = true;
	document.getElementById("MRI").readOnly = true;
	document.getElementById("DocStamp").readOnly = true;
	document.getElementById("NotFee").readOnly = true;
	document.getElementById("bEdit").disabled = false;
	document.getElementById("bSave").disabled = true;
	
	var SC = document.getElementById("ServCharge").value;
	var PF = document.getElementById("ProcFee").value;
	var MF = document.getElementById("MemFee").value;
	var APL = document.getElementById("APLFee").value;
	var MRI = document.getElementById("MRI").value;
	var DS = document.getElementById("DocStamp").value;
	var NF = document.getElementById("NotFee").value;
	var TL = document.getElementById("LoanAmnt").value;
	var Trms = document.getElementById("LTerms").value;
	
	
	
	
	var e = document.getElementById("DeductM");
	var strDeduct = e.options[e.selectedIndex].value;

	var TotalD = parseFloat(SC) + parseFloat(PF) + parseFloat(MF) + parseFloat(APL) + parseFloat(MRI) + parseFloat(DS) + parseFloat(NF);
	var NetP = parseFloat(TL);
	
	if (strDeduct == "Deducted"){
	NetP = parseFloat(TL) - parseFloat(TotalD);
	}
	TotalD = TotalD.toFixed(2);
	NetP = NetP.toFixed(2);
	
	
	var PrincipalVal = TL / Trms;
	PrincipalVal = PrincipalVal / 2;
	
	
	
	
	
	document.getElementById("TotalD").value = TotalD;
	document.getElementById("NetP").value = NetP;
	
	
	var LAmnt = document.getElementById("LoanAmnt").value;
	
	
	
	}
	
	
</script>

</head>

<body>
            
		<?php
		

			$BID = $_REQUEST['BID'];
			$EmpNo =  $_REQUEST['EID'];
			$BName =  $_REQUEST['BName'];
			$BCom =  $_REQUEST['BCom'];
			$BPos =  $_REQUEST['BPos'];
			$BStat = $_REQUEST['BStat'];
			$LoanID =  $_REQUEST['LoanID'];
			$LoanAmount = $_REQUEST['LoanAmount'];
			$Comakerno = $_REQUEST['Comakerno'];
			$ComakerName = $_REQUEST['ComakerName'];
			$Comakerno2 = $_REQUEST['Comakerno2'];
			$ComakerName2 = $_REQUEST['ComakerName2'];
			$PayFreq = $_REQUEST['payFrequency'];
			$LoanTerm = $_REQUEST['LoanTerm'];
			$prodCode= $_REQUEST['pcode'];
			$BSpouse= $_REQUEST['BSpouse'];
			$BAdd = $_REQUEST['BAdd'];
			$BAdd1 = $_REQUEST['BAdd1'];
			$BAdd2 = $_REQUEST['BAdd2'];
			$LoanIDSub = "";
			$Semi  ="";
			$LPurpose = $_REQUEST['LPurpose'];
			$Rel1 = $_REQUEST['Rel1'];
			$Rel2 = $_REQUEST['Rel2'];
			$Known1 = $_REQUEST['Known1'];
			$Known2 = $_REQUEST['Known2'];
	
			if (isset($_REQUEST['btnSubmitLoan'])){


				$DMode = $_REQUEST['DeductMode'];
				$EIRValue = $_REQUEST['EIRSample'];
				date_default_timezone_set("Asia/Taipei");
				$Mode = "0";
				$DModeVal = "";
				
				if ($PayFreq == "Daily" ) { $Mode = "1"; }
				else if ($PayFreq == "Semi-Monthly" ) { $Mode = "2"; }
				else if ($PayFreq == "Monthly" ) { $Mode = "3"; }
				else if ($PayFreq == "Weekly" ) { $Mode = "4"; }
				
				
				if ($DMode == "Deducted") { $DModeVal = "1"; }
				else if ($DMode == "Not deducted") { $DModeVal = "2"; }
				
				$sql="INSERT INTO LOANS(productcode,company,loanid,borrowerno,employeeno,name,rate,principal,interest,grt,semi_mo,terms,amountloan,netamount,position,status,loanstatus2,processfee,membershipfee,otherfees,notarialfee,docstampfee,aplfee,MRI,EIR,comakerno1,comakerno2,balance,uncollectedcharge,uncollected_int,penalty_charge,prepay,creditratio,loanstatus,officer1,officer2,officer3,releaseStat,released,type,checknumber,loanpurpose,mode,product,deductionmode,due_date1,due_date2,relation1,relation2,timeknown1,timeknown2) VALUES('$prodCode','$BCom','$LoanID','$BID','$EmpNo','$BName','$InterestRate','$PrincipalVal','$InterestVal','$GRTVal','$Semi','$LoanTerm','$LoanAmount','$NetProceeds','$BPos','Current','1','$ProcessFee','0','$ServiceCharge','$NotarialFee','$DocStampFee','$APLFee','$MRI','$EIRValue','$Comakerno','$Comakerno2','$LoanAmount','0','0','0','0','$CRatio','Added','0','0','0','No','0','1','','$LPurpose','$Mode','$prodName','$DModeVal','$Bdate1','$Bdate2','$Rel1','$Rel2','$Known1','$Known2')";
				$rs=odbc_exec($conn,$sql);
				
				
			$sql="UPDATE LOANS set DATE = '".date("Y/m/d h:i:s A")."', DATEAPPLIED = '".date("Y/m/d h:i:s A")."' where LOANID = '".$LoanID."'";
			$rs=odbc_exec($conn,$sql);
			
			
			echo 'Loan Successfully Added.';
			}
		
		?>
	
		
</body>
</html>