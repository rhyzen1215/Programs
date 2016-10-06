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
	color: #000099;
	}
	
input[type=date]
	{
	width: 115px;
	}
	
	
.style3 {
	font-size: 14px;
	font-weight: bold;
	font-family: "Century Gothic";
	}
td {
	font-family: "Century Gothic";
	font-size: 12px;
	font-weight: bold;
	}
	
.style7 {
	font-family: "Century Gothic";
	font-size: 12px;
	font-style:italic;
	color:#990000;
	}
	
.style8 {
	font-family: "Century Gothic";
	font-size: 14px;
	font-weight:bold;
	color:#0066FF;
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
	var TL = document.getElementById("LAmount").value;
	var Trms = document.getElementById("LTerms").value;
	
	
	

	var TotalD = parseFloat(SC) + parseFloat(PF) + parseFloat(MF) + parseFloat(APL) + parseFloat(MRI) + parseFloat(DS) + parseFloat(NF);
	var NetP = parseFloat(TL);
	
	NetP = parseFloat(TL) - parseFloat(TotalD);
	
	TotalD = TotalD.toFixed(2);
	NetP = NetP.toFixed(2);
	
	
	
	var PrincipalVal = TL / Trms;
	PrincipalVal = PrincipalVal / 2;
	
	
	
	
	
	document.getElementById("TotalD").value = TotalD;
	document.getElementById("NetP").value = NetP;
	
	
	var LAmnt = document.getElementById("LAmount").value;
	
	
	
	}
	
	
</script>

</head>

<body>
            

			<!-- Employee Detail ---------------------------------------------------->
			<?Php
			
				include 'connect.php';
				$DueDate = "";
				if (isset($_REQUEST['btnProcess'])) {
					$DueDate = $_REQUEST['DueDate'];
					$DueDate = date_create($DueDate);
					$DueDate = date_format($DueDate,"Y-m-d");
				}
			?>
			
            <table>
			  <tr><td height="20"></td></tr>
			  <tr> <td><span class="style8">BATCH UPDATE</span></td></tr>
              <tr><td><hr width=654px size="3" color="#666666" align="left"/></td></tr>
			</table>
            
			<form name="frmProcess">
            
             <table>
              <tr>
			  <td><span class="style7">DUE DATE</span>
              
              <input type="date" name="DueDate" id="DueDate" value="<?Php echo $DueDate; ?>" />
			 <input type="submit" value="Process" name="btnProcess" onclick="javascript: frmProcess.action='BatchLoanUpdate.php'; frmProcess.method='GET';" /></span></td>
		      </tr>
              <tr>
              <td><hr width=654px size="3" color="#666666" align="left"/></td>
              </tr>
			  
			</table>
            
			
            <table width="702" id="UpperBody">
			  <tr>
				<td width="137"><strong>Loan Number</strong></td>
				<td width="145" align="center"><strong>Outstanding Balance</strong></td>
                <td width="100" align="center"><strong>Terms</strong></td>
                <td width="100" align="center"><strong>Mode</strong></td>
				<td width="204" align="center"><strong>Schedule Count</strong></td>
			  </tr>
			</table>

			<table width="702">
			<?Php
			
				$LoanID = "";
				
				$sql="SELECT * FROM AmortSched WHERE DueDate = '".$DueDate."'";
			 	$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs))
				{ 
					$LoanID = odbc_result($rs,"LoanID");
					$OutBal = odbc_result($rs,"Out_Bal");
					$Countr = odbc_result($rs,"Count");
					
					$SetOutBal = $OutBal * 1;
					
					$sql4="Select * From Loans WHERE loanid = '".$LoanID."' and loanstatus = 'Approved'";
			 		$rs4=odbc_exec($conn,$sql4);
					while (odbc_fetch_row($rs4))
					{
						$Trms = odbc_result($rs4,"terms");
						$ModeTrms = odbc_result($rs4,"mode");
						
						$sql1="Update Loans Set balance = '".$OutBal."' WHERE loanid = '".$LoanID."'";
						$rs1=odbc_exec($conn,$sql1);
						
						$sql1="Update BorrowerDeduct Set Amount = '".$OutBal."' WHERE loanid = '".$LoanID."'";
						$rs1=odbc_exec($conn,$sql1);
						
						$sql2="Update AmortSched Set Status = '1' WHERE loanid = '".$LoanID."' and duedate = '".$DueDate."'";
						$rs2=odbc_exec($conn,$sql2);
						
						if ($SetOutBal == "0"){
						$sql3="Update Loans Set status = 'Paid' WHERE loanid = '".$LoanID."'";
						$rs3=odbc_exec($conn,$sql3);
						}
						
						if ($ModeTrms == "2"){ $ModeTrms = "SM"; }
						else if ($ModeTrms == "3"){ $ModeTrms = "M"; }
						
							echo '<tr>';
							echo '<td width="137">'.$LoanID.'</td>';
							echo '<td width="145" align="right">'.number_format($OutBal,2,'.',',').'</td>';
							echo '<td width="100" align="center">'.$Trms.'</td>';
							echo '<td width="100" align="center">'.$ModeTrms.'</td>';
							echo '<td width="204"  align="center">'.$Countr.'</td>';
							echo '</tr>';
					}
					
					
		
				}
				
			?>
			</table>
			</form>
			
			
</body>
</html>