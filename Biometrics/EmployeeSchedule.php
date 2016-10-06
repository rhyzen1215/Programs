	<?Php
		
		include 'DBConnect.php';
		$empID="";
		$Fname="";
		$Mname="";
		$Lname="";
		$Comp="";
		$Branch="";
		$Address="";
		$SchedID = "";
		$SchedDes="";
		$schedID1 = 0;
		$StrDate = "";
		
		
		
		if (isset($_REQUEST['LookUp'])){
			$empID = $_REQUEST['empIDNum'];
			$sql = "SELECT * FROM EMPLOYEE  where employeeID = '".$empID."'";
			$rs=odbc_exec($conn,$sql) or die("Error in query");	
			while (odbc_fetch_row($rs)) {
    				$Lname =  strtoupper(trim(odbc_result($rs,"LASTNAME")));
					$Fname = strtoupper(trim(odbc_result($rs,"FIRSTNAME")));
					$Mname = strtoupper(trim(odbc_result($rs,"MIDDLENAME")));
					$Comp =  strtoupper(trim(odbc_result($rs,"COMPANYNAME")));
					$Branch = trim(odbc_result($rs,"COMPANYNAME2"));
					$Address = strtoupper(trim(odbc_result($rs,"LOCATION")));
					$SchedID = strtoupper(trim(odbc_result($rs,"TIME_SCHEME")));
			}
			
			$sql = "SELECT * FROM TIMESCHEME  where SCHEMECODE = '".$SchedID."'";
			$rs=odbc_exec($conn,$sql) or die("Error in query");	
			while (odbc_fetch_row($rs)) {
					$SchedDes = strtoupper(trim(odbc_result($rs,"SCHEMENAME")));
			}
			
		}
		
		
		
		
		if (isset($_REQUEST['btnEdit'])){
		$empID = $_REQUEST['empID'];
		$schedID1 = $_REQUEST['schedID'];
		}
	
	?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Employee Record</title>
</head>

<style type="text/css">

input[type=date]
{
	width: 220px;
	margin-left:2px;
}

select
{
	width: 175px;
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
	width: 128px;
}

.txtStyle {

	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;
	border-spacing:inherit;
	padding-left: 2px;
	margin: 2px;
}

#txtStyle1 {

	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;
	border-spacing:inherit;
	padding-left: 2px;
	margin: 2px;
}


#txtStyle2 {

	font-family:"Century Gothic";
	font-size:12px;
	padding-left: 2px;
	margin: 2px;
}

</style>

<script type="text/javascript">

function enableNew(){
document.getElementById('LName').disabled = false;
document.getElementById('MName').disabled = false;
document.getElementById('FName').disabled = false;
document.getElementById('Comp').disabled = false;
document.getElementById('BDept').disabled = false;
document.getElementById('Addr').disabled = false;
document.getElementById('SchedID').disabled = false;
document.getElementById('SchedDes').disabled = false;
document.getElementById('btnEdit').disabled = true;
document.getElementById('btnSave').disabled = false;

document.getElementById('LName').value = "";
document.getElementById('MName').value = "";
document.getElementById('FName').value = "";
document.getElementById('Comp').value = "";
document.getElementById('BDept').value = "";
document.getElementById('Addr').value = "";
document.getElementById('SchedID').value = "";
document.getElementById('SchedDes').value = "";
document.getElementById('empIDNum').value = "";


}

function enableInput(){
document.getElementById('LName').disabled = false;
document.getElementById('MName').disabled = false;
document.getElementById('FName').disabled = false;
document.getElementById('Comp').disabled = false;
document.getElementById('BDept').disabled = false;
document.getElementById('Addr').disabled = false;
document.getElementById('SchedID').disabled = false;
document.getElementById('SchedDes').disabled = false;

document.getElementById('btnNew').disabled = true;
document.getElementById('btnSave').disabled = false;
}
</script>

<body>

	<form name="formSubmitID">
	<table>
		<tr>
			<td height="50"></td>
			<td><div class="txtStyle">Employee ID Number:</div></td>
			<td><input type="text" size="10" name="empIDNum" id="empIDNum" value="<?Php echo $empID; ?>" required/></td>
			<td width="30" ><input type="submit" name="LookUp" value="Find" /></td>
			<td width="30" ></td>
		</tr>
	</table>
	</form>
	
	<table width="800" cellpadding="0" cellspacing="0">
         <tr>
         <td><hr width=580px size="1" color="#666666" align="left"/></td>
         </tr>
		 <tr height="30">
		 </tr>
	</table>
	
	<table>
	<tr>
		<td id="txtStyle1" width="100">Start Date</td>
		<td id="txtStyle1" width="100">End Date</td>
		<td id="txtStyle1" width="100" align="center">Time Scheme</td>
		<td id="txtStyle1" width="100" align="center">Schedule Type</td>
	</tr>
	</table>
	
	<table width="800" cellpadding="0" cellspacing="0">
         <tr>
         <td><hr width=455px size="1" color="#666666" align="left"/></td>
         </tr>
	</table>
	
	<table>
		<?php
			
		$sql="SELECT * FROM EMPLOYEESCHEDULE WHERE EMPLOYEENO ='".$empID."' AND STATUS = '1' ORDER BY STARTDATE";
		$rs=odbc_exec($conn,$sql) or die("Error in query");	
		while (odbc_fetch_row($rs)) {
			$ID = odbc_result($rs,"IDCODE");
    		$SchedType =  odbc_result($rs,"SCHEDTYPE");
			$StrDate =  odbc_result($rs,"STARTDATE");
			$EndDate =  odbc_result($rs,"ENDDATE");
			$TimeScheme =  odbc_result($rs,"TIMESCHEME");
			$StrDate = date_create($StrDate);
			$EndDate = date_create($EndDate);
			echo '<form name="frmEditSched"><tr>';
			echo '<td width="100">'.date_format($StrDate,"m/d/Y").'</td>';
			echo '<td width="100">'.date_format($EndDate,"m/d/Y").'</td>';
			echo '<td width="100" align="center">'.$TimeScheme.'</td>';
			echo '<td width="100" align="center">'.$SchedType.'</td>';
			echo '<td width="100" ><input type="Submit" name="btnEdit" value="Edit" onclick="javascript:frmEditSched.action=EmployeeSchedule.php;frmEditSched.method=GET;"/></td>';
			echo '<input type="hidden" name="empID" value="'.$empID.'" />';
			echo '<input type="hidden" name="schedID" value="'.$ID.'" />';
			echo '</td></form>';
		}
		
		
		$SchedType =  "";
		$StrDate =  "";
		$EndDate =  "";
		$TimeScheme =  "";
		
		if (isset($_REQUEST['btnEdit'])){
		$sql2="SELECT * FROM EMPLOYEESCHEDULE WHERE IDCODE = '".$schedID1."'";
		$rs2=odbc_exec($conn,$sql2) or die("Error in query");	
		while (odbc_fetch_row($rs2)) {
			$ID = odbc_result($rs2,"ID");
    		$SchedType =  odbc_result($rs2,"SCHEDTYPE");
			$StrDate =  odbc_result($rs2,"STARTDATE");
			$EndDate =  odbc_result($rs2,"ENDDATE");
			$TimeScheme =  odbc_result($rs2,"TIMESCHEME");
			$StrDate = date_create($StrDate);
			$EndDate = date_create($EndDate);
			
			if ($SchedType == "P") {$SchedType = "Permanent"; }
			else if ($SchedType == "T") {$SchedType = "Temporary"; }
		}
		}
			
		?>
	</table>
	
	
	
	
	
	
	<table width="800" cellpadding="0" cellspacing="0" height="50">
         <tr>
         <td><hr width=455px size="1" color="#666666" align="left"/></td>
         </tr>
	</table>
	
	
	
	<table>
		
		<tr>
			<td id="txtStyle2">Start Date: </td>
			<td><input type="date" value="<?Php echo date_format($StrDate,"Y-m-d") ?>" name="strDate" /></td>
			<td id="txtStyle2">Time Scheme: </td>
			<td><input type="text" value="<?Php echo $TimeScheme ?>" name="timeScheme" /> </td>
		</tr>
		
		<tr>
			<td id="txtStyle2">End Date: </td>
			<td><input type="date" value="<?Php echo date_format($EndDate,"Y-m-d") ?>" name="strDate" /></td>
			<td id="txtStyle2">Schedule Type: </td>
			<td><input type="text" value="<?Php echo $SchedType ?>" name="timeScheme" /> </td>
		</tr>
		
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td><input type="Submit" value="Save" name="timeScheme" /> <input type="Submit" value="Delete" name="timeScheme" /></td>
		</tr>
		
	
	</table>
</body>
</html>
