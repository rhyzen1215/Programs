<?php

session_start();
if (isset($_SESSION['previous'])) {
   if (basename($_SERVER['PHP_SELF']) != $_SESSION['previous']) {
        session_destroy();
	}
}
$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);

?>

<?Php
	
	include 'DBConnect.php';
	
	$EmpNo = "";
	if (isset($_REQUEST['EID'])){
		$EmpNo = $_REQUEST['EID'];
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

<style type="text/css">

th {
font-family: "Century Gothic";
font-size:12px;
}

td {
font-family: "Century Gothic";
font-size:12px;
}

#tdFont {
font-family: "Century Gothic";
font-size:14px;
font-weight: bold;
}

#tdFont1 {
font-family: "Century Gothic";
font-size:12px;
font-weight: bold;
}

#FontHead1 {
font-family: "Century Gothic";
font-size:16px;
font-weight: bold;
color:#660000;
}


input [type=date]{
	size: 10px;
}

</style>
</head>

<body>

	<?Php
	
		$DateEmpVal = "";
		$DateRegVal = "";
		$EmpName = "";
		$Earnd = "";
		$Used = "";
		$Available = "";
		$LeaveCode = "";
		
		if (isset($_REQUEST['EID'])){
		$sql = "Select * From Employee where employeeid = '".$EmpNo."'";
		$rs=odbc_exec($conn,$sql) or die("Error in query");	
		$EmpName = odbc_result($rs,"Lastname").", ".odbc_result($rs,"firstname")." ".odbc_result($rs,"Middlename");
		
		$sql1 = "Select * From EmployeeDetail where employeeid = '".$EmpNo."'";
		$rs1=odbc_exec($conn,$sql1) or die("Error in query");
		if (odbc_fetch_row($rs1)) {
		$DateEmp = odbc_result($rs1,"Date_Employed");
		$DateReg = odbc_result($rs1,"Date_Regular");
		
		$DateEmp = date_create($DateEmp);
		$DateEmpVal = date_format($DateEmp,"M d, Y");
		$DateReg = date_create($DateReg);
		$DateRegVal = date_format($DateReg,"M d, Y");
		$DateRegFrom = date_format($DateReg,"Y-m-d");
		$DateRegTo = date_create();
		$DateRegTo = date_format($DateRegTo,"Y-m-d");
		
		}
		}
		
		
		
		
		
		if (isset($_REQUEST['btnProcess'])){
	
		$EmpNo = $_REQUEST['empNumber'];
		$DateRegFrom = $_REQUEST['sFromDate'];
		$DateRegTo = $_REQUEST['sToDate'];

		$sql = "Select * From Employee where employeeid = '".$EmpNo."'";
		$rs=odbc_exec($conn,$sql) or die("Error in query");	
		$EmpName = odbc_result($rs,"Lastname").", ".odbc_result($rs,"firstname")." ".odbc_result($rs,"Middlename");
		
		$sql1 = "Select * From EmployeeDetail where employeeid = '".$EmpNo."'";
		$rs1=odbc_exec($conn,$sql1) or die("Error in query");
		if (odbc_fetch_row($rs1)) {
		$DateEmp = odbc_result($rs1,"Date_Employed");
		$DateReg = odbc_result($rs1,"Date_Regular");
		
		$DateEmp = date_create($DateEmp);
		$DateEmpVal = date_format($DateEmp,"M d, Y");
		$DateReg = date_create($DateReg);
		$DateRegStr =  date_format($DateReg,"Y-m-d");
		$DateRegVal = date_format($DateReg,"M d, Y");
		
		}
		
		$CurrDate = date_create($DateRegTo);
		$CurrYear = date_format($CurrDate,"Y");
		$CurrMonth = date_format($CurrDate,"m");

		//$RegDate = date_create($DateRegStr);
		$RegDate = date_create($DateRegFrom);
		$RegYear = date_format($RegDate,"Y");
		$RegMonth = date_format($RegDate,"m");
		
		
		
		while ($RegDate < $CurrDate){
		$RegDate1 = date_format($RegDate,"Y-m-d");
		$RegDate1 = strtotime(date("Y-m-d", strtotime($RegDate1)) . " +1 month");
		$RegDate = date("Y-m-d",$RegDate1);
		$RegDate = date_create($RegDate);
		$RegYear = date_format($RegDate,"Y");
		$RegMonth = date_format($RegDate,"m");

		$sql = "Select * From LeaveTable where YearDated = '".$RegYear."' and MonthDated = '".$RegMonth."' and leavecode = 'SL'";
		$rs=odbc_exec($conn,$sql) or die("Error in query");
		if (odbc_fetch_row($rs)) {
		
		
			if (($RegMonth == $CurrMonth) && ($RegYear == $CurrYear)){
				$lastday = date_format($RegDate,"Y-m-d");
				$lastday = date('t',strtotime($lastday));
				$Tdate = date_create();
				$Tdate = date_format($Tdate,"d");
				$DateErnd = $RegYear."-".$RegMonth."-".$lastday;
				
					if ($lastday == $Tdate){
						 $sql1 = "Update LeaveTable set earned = '1.25' where YearDated = '".$RegYear."' and MonthDated = '".$RegMonth."' and leavecode = 'SL'";
						 $rs1=odbc_exec($conn,$sql1) or die("Error in query");}
					else { $sql1 = "Update LeaveTable set earned = '0' where YearDated = '".$RegYear."' and MonthDated = '".$RegMonth."' and leavecode = 'SL'";
						 $rs1=odbc_exec($conn,$sql1) or die("Error in query");}
				
		
			}else{
			$sql1 = "Update LeaveTable set earned = '1.25' where YearDated = '".$RegYear."' and MonthDated = '".$RegMonth."' and leavecode = 'SL'";
			$rs1=odbc_exec($conn,$sql1) or die("Error in query");
			}
			
			}else{
		
			if (($RegMonth == $CurrMonth) && ($RegYear == $CurrYear)){
			$lastday = date_format($RegDate,"Y-m-d");
			$lastday = date('t',strtotime($lastday));
			$Tdate = date_create();
			$Tdate = date_format($Tdate,"d");
			$DateErnd = $RegYear."-".$RegMonth."-".$lastday;
			
				if ($lastday == $Tdate){
				$sql1 = "Insert into LeaveTable (employeeno,leavecode,yeardated,monthdated,earned,used,dateupdated,dateearned) values('600-232','SL','$RegYear','$RegMonth','1.25','0','','$DateErnd')";
				$rs1=odbc_exec($conn,$sql1) or die("Error in query");
				}else{
				$sql1 = "Insert into LeaveTable (employeeno,leavecode,yeardated,monthdated,earned,used,dateupdated,dateearned) values('600-232','SL','$RegYear','$RegMonth','0','0','','$DateErnd')";
				$rs1=odbc_exec($conn,$sql1) or die("Error in query");
				}
			}else{
			$lastday = date_format($RegDate,"Y-m-d");
			$lastday = date('t',strtotime($lastday));
			$Tdate = date_create();
			$Tdate = date_format($Tdate,"d");
			$DateErnd = $RegYear."-".$RegMonth."-".$lastday;
			$sql1 = "Insert into LeaveTable (employeeno,leavecode,yeardated,monthdated,earned,used,dateupdated,dateearned) values('600-232','SL','$RegYear','$RegMonth','1.25','0','','$DateErnd')";
			$rs1=odbc_exec($conn,$sql1) or die("Error in query");
			}
			}
	
		}
	
	
		$RegDateCom = date_create($DateRegFrom);

		$RegYearCom = date_format($RegDateCom,"Y");
		$RegMonthCom = date_format($RegDateCom,"m");
		
		$CurrDateCom = date_create($DateRegTo);

		$CurrYearCom = date_format($CurrDateCom,"Y");
		$CurrMonthCom = date_format($CurrDateCom,"m");
		
		
		$Earnd = 0;
		$Used = 0;
		$Available = 0;
		$sql = "Select * From LeaveTable where EmployeeNo = '".$EmpNo."' and leavecode = 'SL'";
		$rs=odbc_exec($conn,$sql) or die("Error in query");
		while (odbc_fetch_row($rs)) {
		
			$MonthDted = odbc_result($rs,"dateearned");
			$MonthDted = date_create($MonthDted);
			
			if (($MonthDted >= $RegDateCom) && ($MonthDted <= $CurrDateCom)) {
			$Earnd = $Earnd + odbc_result($rs,"earned");
			$Used = $Used + odbc_result($rs,"used");}
			
		}
		$Available = $Earnd - $Used;
		
		
	}
		
		
	?>
	
	<form name="formSub">
	<table width="647">
	<tr>
		<td width="103" id="FontHead1" >Leave Type:</td>
		<td width="532">
		<?Php
		$SelType = "";
		
		$sql = "Select * From Leave";
		$rs=odbc_exec($conn,$sql) or die("Error in query");
		echo '<select name="LeaveType">';
		while (odbc_fetch_row($rs)) {
		if ($LeaveCode == odbc_result($rs,"leavcode")) { $SelType = 'selected="selected"'; }
		echo '<option value="'.odbc_result($rs,"leavcode").'">'.odbc_result($rs,"leavename").'</option>';
		}
		echo '</select>';
		echo $LeaveCode;
		?>

	  </td>
	</tr>
</table>
	
	
<hr size="3" color="#666666" align="left" width="645"/>
	

	
	<table>
	<tr height="50">
		<td width="100"></td>
		<td id="tdFont"><font color="#0000FF"><?Php echo $EmpName ?></font></td>
	</tr>
	</table>
	


	<form name="formCalc">
	<table width="317">
	<tr>
		<td width="5"></td>
		<td width="151" align="right">Date of Employment: &nbsp;</td>
		<td width="145" id="tdFont"><?Php echo $DateEmpVal ?></td>
	</tr>
	
	<tr>
		<td width="5"></td>
		<td align="right">Date of Regularization:  &nbsp;</td>
		<td id="tdFont"><?Php echo $DateRegVal ?></td>
	</tr>
	
	<tr>
		<td width="5" height="20"></td>
		<td align="right"></td>
		<td align="right"></td>
	</tr>
	
	<tr>
		<td width="5"></td>
		<td align="right">From:</td>
		<td align="left"><input type="date" name="sFromDate" value="<?Php echo $DateRegFrom ?>" /></td>
		<input type="hidden" name="empNumber" value="<?Php echo $EmpNo ?>" />
	  </tr>
	
	<tr>
		<td width="5"></td>
		<td align="right">To:</td>
		<td align="left">
		<input type="date" name="sToDate" value="<?Php echo $DateRegTo ?>" /></td>
		<input type="hidden" name="RegValue" value="<?Php echo $DateRegVal ?>" />
		<input type="hidden" name="empNumber" value="<?Php echo $EmpNo ?>" />
	</tr>
	<tr>
		<td width="5"></td>
		<td align="right"></td>
		<td align="right">
		<input type="Submit" name="btnProcess" value="Process" onclick="javascript: formCalc.action='SickLeave.php'; formCalc.method='GET';"/></td>
	</tr>
	
	</table>
	</form>


	
	
	<table width="346">
		
		<tr height="20">
		<td width="165"></td>
		<td width="57"></td>
		<td width="108"></td>
		</tr>
		
		<tr>
		<td align="right">Earned Credit(s): </td>
		<td id="tdFont1" align="right"><?Php echo $Earnd ?></td>
		<td></td>
		</tr>
		
		<tr>
		<td align="right">Used Credit(s): </td>
		<td id="tdFont1" align="right"><?Php echo $Used ?></td>
		<td></td>
		</tr>
		
		<tr>
		<td align="right">Available Credit(s): </td>
		<td id="tdFont1" align="right"><?Php echo $Available ?></td>
		<td></td>
		</tr>
		
		
		<tr height="20">
		<td width="165"></td>
		<td width="57"></td>
		<td width="108"></td>
		</tr>
		
</table>
	
	
	
	
	<table align="left" width="400">
	<tr height="30">
		<td><strong>Sick Leave History</strong></td>
	</tr>
	</table>
	<hr size="1" color="#666666" align="left" width="645"/>

		
<table>

	<tr><td>
	<table align="left" width="587">
	<tr>
		<td width="50"></td>
		<td width="100" align="center"><strong>Date Applied</strong></td>
		<td width="100" align="center"><strong>Date Approved</strong></td>
		<td width="100" align="center"><strong>Date From</strong></td>
		<td width="100" align="center"><strong>Date To</strong></td>
		<td width="100" align="center"><strong>No. of Days</strong></td>
	</tr>
	</table>
	<table>
	<tr>
	<td width="60"></td>
	<td>
	<hr size="1" color="#666666" align="left" width="500"/></td>
	</tr>
	</table>
	
	<table>
	<?Php
	
	
	
		$sql = "Select * From LeaveApplication where EmployeeNo = '".$EmpNo."' and leavecode = 'SL' and usedstatus='YES' order by dateapplied";
		$rs=odbc_exec($conn,$sql) or die("Error in query");
		while (odbc_fetch_row($rs)) {
			
			$noDays = odbc_result($rs,"noofdays");
			
			if ($noDays == 1 ) { $noDays = $noDays." day"; }
			else if ($noDays > 1 ) { $noDays = $noDays." days"; }
			
			echo '<tr>';
			echo '<td width="50"></td>';
			echo '<td width="100" align="center">'.date_format(date_create(odbc_result($rs,"dateapplied")),"m/d/Y").'</td>';
			echo '<td width="100" align="center">'.date_format(date_create(odbc_result($rs,"dateapproved")),"m/d/Y").'</td>';
			echo '<td width="100" align="center">'.date_format(date_create(odbc_result($rs,"datefrom")),"m/d/Y").'</td>';
			echo '<td width="100" align="center">'.date_format(date_create(odbc_result($rs,"dateto")),"m/d/Y").'</td>';
			echo '<td width="100" align="center">'.$noDays.'</td>';
			echo '</tr>';
		}
		
	
	
	?>
	</table>
	</td></tr>
	
</table>
	
	
</body>
</html>
