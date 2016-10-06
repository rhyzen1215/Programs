<?Php
 session_start();
 include 'DBConnect.php';
 $Status = "ALL";
 $userID = "";
 $AVAIL = "";
if (isset($_REQUEST['btnEdit'])){
		$usrId = $_REQUEST['userID'];
		$sql1="UPDATE USERACCOUNT SET STATUS = '1' where USERID = '".$usrId."'";
		$rs1=odbc_exec($conn,$sql1);
	}
if (isset($_REQUEST['btnFilter'])){
			$Status = $_REQUEST['optFilter'];
	}
if (isset($_REQUEST['btnView'])){
			$Status = "VIEW";
			$userID = $_REQUEST['userID'];
			
			
	}

if (isset($_REQUEST['btnStatus'])){

		$DATETO = $_REQUEST['DATE_TO'];
		$LEAVEID = $_REQUEST['LEAVEID'];
		$LEAVECODE = $_REQUEST['LEAVECODE'];
		$EMPID = $_REQUEST['EMPID'];
		$NODAYS = $_REQUEST['NODAYS'];
		$APP = $_REQUEST['AppStat'];
		
		$sql1="UPDATE LEAVEAPPLICATION SET APPSTATUS = '".$APP."' where LEAVEID = '".$LEAVEID."'";
		$rs1=odbc_exec($conn,$sql1);
		
	}
	
	
	
if (isset($_REQUEST['btnAvail'])){

		$DATETO = $_REQUEST['DATE_TO'];
		$LEAVEID = $_REQUEST['LEAVEID'];
		$LEAVECODE = $_REQUEST['LEAVECODE'];
		$EMPID = $_REQUEST['EMPID'];
		$NODAYS = $_REQUEST['NODAYS'];
		$AVAIL = $_REQUEST['UsedStat'];
		
		$DATETO = date_create($DATETO);
		$YEARDATE = date_format($DATETO,"Y");
		$MONTHDATE = date_format($DATETO,"m");

		if ($AVAIL == "YES") {
		$sql1="SELECT * FROM LEAVETABLE  where EMPLOYEENO = '".$EMPID."' and LEAVECODE = '".$LEAVECODE."' and YEARDATED = '".$YEARDATE."' and MONTHDATED = '".$MONTHDATE."'";
		$rs1=odbc_exec($conn,$sql1);
		$USED = odbc_result($rs1,"USED");
		$NODAYS = $NODAYS + $USED;
		$MONTHDATE = $MONTHDATE - 1;
		
		if ($MONTHDATE == 0) { $MONTHDATE = 12; }
		if ($MONTHDATE == 12) { $YEARDATE = $YEARDATE - 1; }
		
		$sql1="UPDATE LEAVETABLE SET USED = '".$NODAYS."' where EMPLOYEENO = '".$EMPID."' and LEAVECODE = '".$LEAVECODE."' and YEARDATED = '".$YEARDATE."' and MONTHDATED = '".$MONTHDATE."'";
		$rs1=odbc_exec($conn,$sql1);
		}
		
		$sql1="UPDATE LEAVEAPPLICATION SET USEDSTATUS = '".$AVAIL."' where LEAVEID = '".$LEAVEID."'";
		$rs1=odbc_exec($conn,$sql1);
	}
	
if (isset($_REQUEST['btnSubmitApp'])){
		$AppStat = $_REQUEST['AppStat'];
		$UsedStat = $_REQUEST['UsedStat'];
		$LEAVEID = $_REQUEST['LEAVEID'];
		$sql1="UPDATE LEAVEAPPLICATION SET APPSTATUS = '".$AppStat."' and USEDSTATUS = '".$UsedStat."' where LEAVEID = '".$LEAVEID."'";
		$rs1=odbc_exec($conn,$sql1);
	}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Branch Customer Information File</title>
<style type="text/css">
<!--

	
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
	
#td1 {
	font-weight:bolder;
	}
	
td {
	font-family:"Century Gothic";
	font-size:12px;
	}	
	
th {
	font-family:"Century Gothic";
	font-size:12px;
	font-weight:bolder;
	}

#tableID1 {
	border: 1px solid black;
	}
	
#tableID2 {
	border-bottom: 1px solid black;
	}
	

</style>


</head>

<body background="images/bg2.jpg">
    
	<table>
		<tr>
			<td>Status:</td>
			<td>
			<form>
			<select name="optFilter">
			<?Php if (isset($_REQUEST['btnFilter'])){ echo '<option value="'.$Status.'">'.$Status.'</option>'; }?>
				<option value="ALL">ALL</option>
				<option value="APPLIED">APPLIED</option>
				<option value="APPROVED">APPROVED</option>
				<option value="CANCELLED">CANCELLED</option>
				<option value="REJECTED">REJECTED</option>
			</select>
			<input name="btnFilter" type="submit"  value="Filter" /></td>
			</form>
		</tr>
	</table>
	

	<hr width="auto" size="2" />
	
	
	
	<table>
  
		<tr align="left">
			<th width="200">EMPLOYEE ID</th>
			<th width="300">EMPLOYEE NAME</th>
			<th width="150">BRANCH/DEPT</th>
			<th width="300">LEAVE CODE</th>
			<th width="200">DATE FROM</th>
			<th width="100">DATE TO</th>
			<th width="150">DATE APPLIED</th>
			<th width="100">STATUS</th>
			<th width="100"></th>
		</tr>
		<?Php

			if ($Status == "VIEW" ) { $sql1="SELECT * FROM LEAVEAPPLICATION WHERE LEAVEID = '".$userID."'";}
			else if ($Status == "APPLIED" ) { $sql1="SELECT * FROM LEAVEAPPLICATION WHERE APPSTATUS = 'Applied'";}
			else if ($Status == "APPROVED" ) { $sql1="SELECT * FROM LEAVEAPPLICATION WHERE APPSTATUS = 'Approved'";}
			else if ($Status == "CANCELLED" ) { $sql1="SELECT * FROM LEAVEAPPLICATION WHERE APPSTATUS = 'Cancelled'";}
			else if ($Status == "REJECTED" ) { $sql1="SELECT * FROM LEAVEAPPLICATION WHERE APPSTATUS = 'Rejected'";}
			else { $sql1="SELECT * FROM LEAVEAPPLICATION"; }

		$rs1=odbc_exec($conn,$sql1);
		while (odbc_fetch_row($rs1))
		{
			$datefrom = odbc_result($rs1,"datefrom");
			$datefrom = date_create($datefrom);
			$datefrom = date_format($datefrom,"m/d/Y");
			
			$dateto = odbc_result($rs1,"dateto");
			$dateto = date_create($dateto);
			$dateto = date_format($dateto,"m/d/Y");
			
			$dateapplied = odbc_result($rs1,"dateapplied");
			$dateapplied = date_create($dateapplied);
			$dateapplied = date_format($dateapplied,"m/d/Y");
			echo ('<tr align="left">');
			echo ('<form>');
			echo ('<td width="200">'.odbc_result($rs1,"employeeno").'</td>');
			echo ('<td width="300">'.odbc_result($rs1,"employeename").'</td>');
			echo ('<td width="150">'.odbc_result($rs1,"branch").'</td>');
			echo ('<td width="300">'.odbc_result($rs1,"leavecode").'</td>');
			echo ('<td width="200">'.$datefrom.'</td>');
			echo ('<td width="100">'.$dateto.'</td>');
			echo ('<td width="150">'.$dateapplied.'</td>');
			echo ('<td width="100">'.odbc_result($rs1,"appstatus").'</td>');
			echo ('<td width="100"><input name="btnView" type="submit" value="View" />');
			echo ('<input name="userID" type="hidden"  size="10" value="'.odbc_result($rs1,"leaveid").'" required /></td>');
			echo ('</form>');
			echo ('</tr>');
		}			
	?>

	</table>
	
	
	
	<hr width="auto" size="2" />
	
	<table><tr><td height="20"></td></tr>
	</table>
	
	<?Php
	if (isset($_REQUEST['btnSubmitApp'])){
		echo '<table>';
		echo '<tr>';
		echo '<td width="100" align="right">Leave ID:</td>';
		echo '<td><font size="2" color="#660000"><strong>'.$LEAVEID.'</strong></font></td>';
		echo '<td width="300" align="right"><font color="blue" size="2"><strong>Application Approved Successfully!</strong></font></td>';
		echo '</tr>';
		echo '</table>';
	}
	

	
	if (isset($_REQUEST['btnAvail'])){
		echo '<table>';
		echo '<tr>';
		echo '<td width="100" align="right">Leave ID:</td>';
		echo '<td><font size="2" color="#660000"><strong>'.$LEAVEID.'</strong></font></td>';
		echo '<td width="300" align="right"><font color="blue" size="2"><strong>Application Updated Successfully!</strong></font></td>';
		echo '</tr>';
		echo '</table>';
	}
	
	?>
	
	<?Php
	
		$EmpID = "";
		$EmpName = "";
		$Branch = "";
		$NoDays = "";	
		$DateFrom = "";
		$DateTo = "";
		$TimeFrom = "";
		$TimeTo = "";
		$DateApplied = "";
		$Reason = "";
		$AppStatus = "";
		$Avail = "";
		$RApproved = "";
		$Approved = "";
		$LeaveName = "";
		
		
	if (isset($_REQUEST['btnView'])){
		$sql1="SELECT * FROM LEAVEAPPLICATION WHERE LEAVEID='".$userID."'";
		$rs1=odbc_exec($conn,$sql1);
		while (odbc_fetch_row($rs1)) {
		$EmpID = odbc_result($rs1,"employeeno");
		$EmpName = odbc_result($rs1,"employeename");
		$Branch = odbc_result($rs1,"branch");
		$LCode = odbc_result($rs1,"leavecode");
		$NoDays = odbc_result($rs1,"NoOfDays");
		
			$sql2="SELECT * FROM LEAVE WHERE LEAVECODE='".$LCode."'";
			$rs2=odbc_exec($conn,$sql2);
			$LeaveName = odbc_result($rs2,"Leavename");
			
		$DateFrom = odbc_result($rs1,"Datefrom");
		$DateFrom = date_create($DateFrom);
		$DateFrom = date_format($DateFrom,"m/d/Y");
		
		$DateTo = odbc_result($rs1,"DateTo");
		$DateTo = date_create($DateTo);
		$DateTo = date_format($DateTo,"m/d/Y");
		
		$TimeFrom = odbc_result($rs1,"TimeFrom");
		$TimeFrom = date_create($TimeFrom);
		$TimeFrom = date_format($TimeFrom,"h:i:s A");
		
		$TimeTo = odbc_result($rs1,"TimeTo");
		$TimeTo = date_create($TimeTo);
		$TimeTo = date_format($TimeTo,"h:i:s A");
		
		$DateApplied = odbc_result($rs1,"DateApplied");
		$DateApplied = date_create($DateApplied);
		$DateApplied = date_format($DateApplied,"m/d/Y");
		
		$Reason = odbc_result($rs1,"Reason");
		$AppStatus = odbc_result($rs1,"AppStatus");
		$Avail = odbc_result($rs1,"UsedStatus");
		$RApproved = odbc_result($rs1,"Recomm_Approved");
		$Approved = odbc_result($rs1,"Approved");
		
			if ($Approved == "DAJ" ) { $Approved = "Dante A. Javellana"; }
			else if ($Approved == "EOJ" ) { $Approved = "Enrico O Jacomille"; }
			else if ($Approved == "MRCF" ) { $Approved = "Margaret Ruth C. Florete"; }
		

		}
		
		}
		?>
		
		<form name="subApp">
		
		<table>
		<tr>
		<td width="111" align="right">Leave ID:</td>
		<td width="136"><font size="2" color="#660000"><strong><?Php echo $userID ?></strong></font></td>
		<input type="hidden" name="EMPID" value="<?Php echo $EmpID ?>" >
		<input type="hidden" name="LEAVEID" value="<?Php echo $userID ?>" >
		<input type="hidden" name="DATE_TO" value="<?Php echo $DateTo ?>" >
		<input type="hidden" name="LEAVECODE" value="<?Php echo $LCode ?>" >
		<input type="hidden" name="NODAYS" value="<?Php echo $NoDays ?>" >
		<input type="hidden" name="AVAIL" value="<?Php echo $Avail ?>" >
		</tr>
		</table>
		
		<table width="793">
		<tr>
		<td width="120" height="30" align="right">Employee ID:</td>
		<td width="146"><font size="2" color="blue"><strong><?Php echo $EmpID ?></strong></font></td>
		<td width="97" align="right">Date Applied:</td>
		<td><font size="2" color="blue"><strong><?Php echo $DateApplied ?></strong></font></td>
		<td width="165" height="30" align="right">Leave Applied For:</td>
		<td width="154"><font size="2" color="blue"><strong><?Php echo $LeaveName ?></strong></font></td>
		</tr>
		<tr>
		<td width="120" height="27" align="right">Employee Name:</td>
		<td><font size="2" color="blue"><strong><?Php echo $EmpName ?></strong></font></td>
		<td width="97" align="right">Date From:</td>
		<td width="157"><font size="2" color="blue"><strong><?Php echo $DateFrom ?></strong></font></td>
		<td width="165" align="right">Time From:</td>
		<td><font size="2" color="blue"><strong><?Php echo $TimeFrom ?></strong></font></td>
		</tr>
		<tr>
		<td width="120" height="27" align="right">Branch/Unit:</td>
		<td><font size="2" color="blue"><strong><?Php echo $Branch ?></strong></font></td>
		<td width="97" align="right">Date To:</td>
		<td><font size="2" color="blue"><strong><?Php echo $DateTo ?></strong></font></td>
		<td width="165" align="right">Time To:</td>
		<td><font size="2" color="blue"><strong><?Php echo $TimeTo ?></strong></font></td>
		</tr>
		</table>
		
		
		<table width="792">
		<tr>
		<td width="114" align="right">Reason:</td>
		<td width="666"><font size="2" color="blue"><strong><?Php echo $Reason ?></strong></font></td>
		</tr>
		</table>
		
		<hr width="auto" size="1" />
		<table width="788">
		<tr>
		<td width="140" align="right">Application Status:</td>
		<td width="170"><font size="2" color="blue"><strong>
		<select name="AppStat">
		<option value="APPLIED" <?Php if ($AppStatus=="APPLIED" ) { echo 'selected="selected"'; } ?>>APPLIED</option>
		<option value="APPROVED" <?Php if ($AppStatus=="APPROVED" ) { echo 'selected="selected"'; } ?>>APPROVED</option>
		<option value="CANCELLED" <?Php if ($AppStatus=="CANCELLED" ) { echo 'selected="selected"'; } ?>>CANCELLED</option>
		<option value="REJECTED" <?Php if ($AppStatus=="REJECTED" ) { echo 'selected="selected"'; } ?>>REJECTED</option>
		</select>
		<input type="Submit" name="btnStatus" value="Save" onclick="javascript:subApp.action='leaveapplicationupdate.php'; subApp.method='POST';">
		</strong></font></td>
		<td width="112" align="right">Availment:</td>
		<td width="113"><font size="2" color="blue"><strong>
		<select name="UsedStat">
		<option value="NO" <?Php if ($Avail=="NO" ) { echo 'selected="selected"'; } ?>>NO</option>
		<option value="YES" <?Php if ($Avail=="YES" ) { echo 'selected="selected"'; } ?>>YES</option>
		</select></strong></font><input type="Submit" name="btnAvail" value="Save" onclick="javascript:subApp.action='leaveapplicationupdate.php'; subApp.method='POST';" <?Php if ($AppStatus != "APPROVED" ) { echo 'disabled="disabled"'; } ?> ></td>
		<td width="229"></td>
		</tr>
		</table>
		
		
		
	
		
		<hr width="auto" size="1" />
		
		
		<table>
		<tr>
		<td width="219" height="21" align="right">Recommending Approval:</td>
		<td width="286"><font size="2" color="blue"><strong><?Php echo $RApproved ?></strong></font></td>
		</tr>
		<tr>
		<td width="219" height="23" align="right">Approved by:</td>
		<td width="286"><font size="2" color="blue"><strong><?Php echo $Approved ?></strong></font></td>
		</tr>
		</table>
		

		</form>

	
</body>
</html>