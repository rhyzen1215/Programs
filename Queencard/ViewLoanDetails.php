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
            
			
			<?Php
				$LoanIDnum = "";
				if (isset($_REQUEST['submitBor'])){
					$LoanIDnum = $_REQUEST['LoanIDnum'];
				}
			?>
 			<form name="form1">
            <!-- Employee Break -------------------------------------------------------->
            <table>
              <tr>
			  <td><span class="style7">LOAN NUMBER</span><input type="text" name="loanIDnumber" size="20" value="<?Php echo $LoanIDnum ?>" />
			 <input type="submit" value="Search" name="Search" onclick="javascript: form.action='LoanSearch.php'; form.method='GET';" />
			 <input type="submit" value="View" name="EditLoan" onclick="javascript: form.action='ViewLoanDetails2.php'; form.method='GET';" /></span></td>
		      </tr>
              <tr>
              <td><hr width=654px size="3" color="#666666" align="left"/></td>
              </tr>
			  
			</table>
			</form>
			<!-- Employee Detail ---------------------------------------------------->

		
		
		
</body>
</html>