<?Php
 session_start();
 include 'DBConnect.php';
 	
	$EmpID = "";
 	$Name = "";
	$Position = "";
	$Rank = "";
	$Branch = "";
	$LeaveID = "";
	$LeaveCount = "";
	$ConfirmApply = 0;
	
 	if (isset($_REQUEST['EmpSearch'])){
		$EmpID = $_REQUEST['employeeID'];
		$sql="SELECT * FROM EMPLOYEE where EMPLOYEEID = '".$EmpID."'";
		$rs=odbc_exec($conn,$sql);
		$Name = odbc_result($rs,"Firstname")." ".odbc_result($rs,"Middlename")." ".odbc_result($rs,"Lastname");
		$Position = odbc_result($rs,"Position");
		$Rank = odbc_result($rs,"Rank");
		$Branch = odbc_result($rs,"Station_Branch");
		$LeaveID = odbc_result($rs,"CompanyCode").$EmpID;
		
		$sql="SELECT TOP 1 * FROM LEAVEAPPLICATION where EMPLOYEENO = '".$EmpID."' ORDER BY LEAVECOUNT DESC";
		$rs=odbc_exec($conn,$sql);
		$LeaveCount = odbc_result($rs,"LeaveCount");
		$LeaveCount = $LeaveCount + 1;
		$LeaveID = $LeaveID.$LeaveCount;
	}
	
	
	if (isset($_REQUEST['btnApply'])){
		
		$LeaveCount = $_REQUEST['LeaveCount'];
		$branch = $_REQUEST['branch'];
		$LeaveID = $_REQUEST['LeaveID'];
		$EmpID = $_REQUEST['employeeID'];
		$EName = $_REQUEST['EName'];
		$Leave = $_REQUEST['LeaveType'];
		$Reason = $_REQUEST['Reason'];
		$RApproval = $_REQUEST['RApproval'];
		$Approval = $_REQUEST['Approval'];
		$DateApplied = $_REQUEST['DateApplied'];
		$DateFrom = date_create($_REQUEST['DateFrom']);
		$DateTo = date_create($_REQUEST['DateTo']);
		$TimeFrom = $_REQUEST['FromTimeH'].":".$_REQUEST['FromTimeM'].":".$_REQUEST['FromTimeS']." ".$_REQUEST['FromTime'];
		$TimeTo = $_REQUEST['ToTimeH'].":".$_REQUEST['ToTimeM'].":".$_REQUEST['ToTimeS']." ".$_REQUEST['ToTime'];
		$Reason = $_REQUEST['Reason'];

		date_default_timezone_set("Asia/Taipei");
		$diff = date_diff($DateFrom,$DateTo);
	    $diff = $diff->format("%R%a");
		$diff = $diff + 1;
		$diff = abs($diff);
	
		$DateFrom = date_format($DateFrom,"m/d/Y");
		$DateTo = date_format($DateTo,"m/d/Y");
		
		$sql="INSERT INTO LEAVEAPPLICATION(LEAVECOUNT, LEAVEID, EMPLOYEENO, EMPLOYEENAME, BRANCH, LEAVECODE, DATEFROM, DATETO, TIMEFROM, TIMETO,REASON,DATEAPPLIED,RECOMM_APPROVED,APPROVED,NOOFDAYS, APPSTATUS, USEDSTATUS) VALUES('$LeaveCount','$LeaveID','$EmpID','$EName','$branch','$Leave','$DateFrom','$DateTo','$TimeFrom','$TimeTo','$Reason','$DateApplied','$RApproval','$Approval','$diff','Applied','NO')";
		$rs=odbc_exec($conn,$sql);
		
		$ConfirmApply = 1;
		
		$LeaveID = "";
	}
	

 
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Branch Customer Information File</title>
<style type="text/css">
<!--


input [type=date] {
	font-family:"Century Gothic";
	font-size:12px;
	border-spacing:inherit;
	padding-left: 2px;
	margin: 2px;
	size: 200px;
	
}

#editCIF {
	border: 0px solid black; border-collapse: collapse;
	font-family:'Century Gothic';
	font-size:12px;
	font-weight: bold;
	padding-left: 0px; 
	margin: 0px;}
	
#mheader {
	border: 0px solid black; border-collapse: collapse;
	font-family:'Century Gothic';
	font-size:14px;
	font-weight: bold;
	border-spacing:inherit;
	padding-left: 2px; 
	margin: 2px;}

#tdID1 {
	font-family:"Century Gothic";
	font-size:14px;
	font-weight:bolder;
	}
	
#tdID2 {
	font-family:"Century Gothic";
	font-size:12px;
	font-weight:bolder;
	}
	
th {
	font-family:"Century Gothic";
	font-size:16px;
	font-weight:bolder;
	}

</style>


</head>

<body background="images/bg2.jpg">
         
	
	<table width="750">
		<tr align="center">
			<td height="10"></td>
		</tr>
	</table>
	
	
	<table width="750">
		<tr align="center">
			<td id="tdID1">REQUEST FOR LEAVE / ABSENCES / UNDERTIME / & OTHERS</td>
		</tr>
	</table>
	

	<table width="750"><tr><td height="30"></td></tr></table>
	<table width="750">
		<tr align="center">
			<td id="tdID1"><font color="#000066"><?Php if ($ConfirmApply == 1 ) { echo "Application Submitted"; } ?></font></td>
		</tr>
	</table>
	
	<form name="frmEmpSearch">
	<input type="hidden" size="50" name="LeaveCount" value="<?php echo $LeaveCount ?>"/>
	<input type="hidden" size="50" name="LeaveID" value="<?php echo $LeaveID ?>"/>
	<table>
		<tr>
		  <td width="110" id="tdID2" align="right">Leave ID:</td>
		  <td width="110" id="tdID2"><font color="#660000" size="3" face="Century Gothic"><?Php   if ($EmpID != "") { echo $LeaveID; } ?></font></td>
		</tr>
	</table>
	
	<table>
		<tr>
		  <td width="110" id="tdID2" align="right">Employee Name:</td>
		  <td width="250"><input name="EName" type="text" size="30" value="<?Php echo $Name ?>" readonly="readonly"/></td>
		  <td width="100" id="tdID2" align="right">Employee ID: </td>
		  <td width="200"><input type="text" size="8" name="employeeID" value="<?Php echo $EmpID ?>"/>  <input type="Submit" value="  Search  " name="EmpSearch"/></td>
		</tr>
	</table>
	
	<table>
		<tr>
		  <td width="110" id="tdID2" align="right">Position:</td>
		  <td width="250"><input type="text" size="30" value="<?Php echo $Position ?>" readonly="readonly"/></td>
		  <td width="100" id="tdID2" align="right">Date:</td>
		  <td ><input type="date" name="DateApplied" value="<?Php echo date("Y-m-d"); ?>"/></td>
		</tr>
	</table>
	
	<table>
		<tr>
		  <td width="110" id="tdID2" align="right">Rank:</td>
		  <td width="250"><input name="rank" type="text" size="30" value="<?Php echo $Rank ?>" readonly="readonly"/></td>
		  <td width="100" id="tdID2" align="right">Branch/Unit:</td>
		  <td width="150"><input name="branch" type="text" size="20" value="<?Php echo $Branch ?>" readonly="readonly" /></td>
		</tr>
	</table>

	
	<table><tr><td><hr size="1" width="700" /></td></tr></table>
	<table><tr><td id="tdID2">Nature of Request: (Select 1 Only)</td></tr></table>
	<table width="750"><tr><td height="10"></td></tr></table>
	
	<table>
		<tr><td width="69"></td><td width="370" id="tdID2"><input name="LeaveType" type="checkbox"  value="SL"> Sick Leave</td>
			<td width="53"></td>
			<td width="228" id="tdID2"><input name="LeaveType" type="checkbox"  value="ML"> Maternity Leave</td></tr>
		<tr><td width="69"></td>
		<td id="tdID2"><input name="LeaveType" type="checkbox"  value="PL"> Paternity Leave</td>
			<td width="53"></td>
			<td id="tdID2"><input name="LeaveType" type="checkbox"  value="VL"> Scheduled Vacation Leave</td></tr>
		<tr><td width="69"></td>
		<td id="tdID2"><input name="LeaveType" type="checkbox"  value="LP"> Leave Without Pay</td>
			<td width="53"></td>
			<td id="tdID2"><input name="LeaveType" type="checkbox"  value="UT"> Undertime</td></tr>
		<tr><td width="69"></td>
		<td id="tdID2"><input name="LeaveType" type="checkbox"  value="CB">
		Credit Back of Cancelled Leave/s for Official Reason/s</td>
		<td width="53"></td>
		<td id="tdID2"><input name="LeaveType" type="checkbox"  value="OT"> Others</td></tr>
	</table>
	
	<table width="750"><tr><td height="10"></td></tr></table>
	
	
	<table>
		<tr>
		  <td id="tdID2" width="350" align="center">Effective Date(s):</td>
		  <td id="tdID2" width="350" align="center">Effective Hour(s):</td>
		</tr>
	</table>
	
	<table>
		<tr>
		  <td width="110" id="tdID2" align="right">From:</td>
		  <td width="250"><input type="date" name="DateFrom" /></td>
		  <td width="100" id="tdID2" align="right">From:</td>
		  <td ><input type="text" size="1" value="HH" name="FromTimeH"/>:
		       <input type="text" size="1" value="MM" name="FromTimeM"/>:
			   <input type="text" size="1" value="SS" name="FromTimeS"/>
			   <select name="FromTime">
				<option value="AM">AM</option>
				<option value="PM">PM</option>
			   </select></td>
		</tr>
		<tr>
		  <td width="110" id="tdID2" align="right">To:</td>
		  <td width="250"><input type="date" name="DateTo"/></td>
		  <td width="100" id="tdID2" align="right">To:</td>
		  <td ><input type="text" size="1" value="HH" name="ToTimeH"/>:
		  	   <input type="text" size="1" value="MM" name="ToTimeM"/>:
		       <input type="text" size="1" value="SS" name="ToTimeS"/>
		       <select name="ToTime">
				<option value="AM">AM</option>
				<option value="PM">PM</option>
			   </select></td>
		</tr>
	</table>
	
	<table width="750"><tr><td height="10"></td></tr></table>
	
	<table>
		<tr><td id="tdID2">Reason(s): <input type="text" size="50" name="Reason" value=""/></td></tr>
	</table>
	
	
	<table><tr><td><hr size="1" width="700" /></td></tr></table>
	
	
	<table>
		<tr>
		  <td width="110" id="tdID2" align="right"></td>
		  <td width="200"></td>
		  <td width="160" id="tdID2" align="right">Recommending Approval:</td>
		  <td width="100"><input type="text" size="21" name="RApproval" /></td>
		</tr>
		
		<tr>
		  <td width="110" id="tdID2" align="right"></td>
		  <td width="250"></td>
		  <td width="160" id="tdID2" align="right">Approved by:</td>
		  <td width="100"><select name="Approval">
		  					<option value="DAJ">Dante A. Javellana</option>
							<option value="EOJ">Enrico O. Jacomille</option>
							<option value="MRCF">Margaret Ruth C. Florete</option></td>
		</tr>
		
		<tr>
		  <td width="110" id="tdID2" align="right"></td>
		  <td width="250"></td>
		  <td width="160" id="tdID2" align="right"></td>
		  <td width="100" align="right"><input type="submit" value="  Apply  " name="btnApply" />
		  <input type="Reset" value="  Reset  " /></td>
		</tr>
		
	</table>
	
	</form>
	
	

</body>
</html>