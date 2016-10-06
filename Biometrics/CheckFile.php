<?php

include 'DBCon2.php';
$EmpID = "";
$TimeLOG = "";
$DateLOG = "";
	
	if (isset($_REQUEST['btnSub'])){
		$EmpID = $_REQUEST['EmpNo'];
	}

	if (isset($_REQUEST['btnEdit'])){
	$EmpID = $_REQUEST['EmpNo'];
	}
	
	if (isset($_REQUEST['btnSave'])){
	$EmpID = $_REQUEST['EmpNo'];
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
	
	<form name="frmFind">
	<table>
		<tr>
			<td>ID Number:</td>
			<td><input type="text" name="EmpNo" value="<?Php echo $EmpID ?>" size="10"/></td>
			<td><input type="Submit" name="btnSub" value="Find" onclick="javascript: frmFind.action='CheckFile.php'; frmFind.method='GET';"/></td>
		</tr>
	</table>
	</form>
	
	
	<table >
		<tr>
			<td width="100" align="center">ID </td>
			<td width="100" align="center">Date Log </td>
			<td width="250" align="center">Time Log </td>
			<td width="100" align="center">Log Count </td>
			<td width="100" align="center"></td>
		</tr>
		
	<?Php
		
		
		$sql = "Select * From Employee where employeeid = '".$EmpID."'";
		$rs = odbc_exec($conn,$sql) or die("Error in query");	
		while (odbc_fetch_row($rs)) {
				echo '<br>'.strtoupper(odbc_result($rs,"Lastname"));
		}
		echo '<hr width=580px size="1" color="#666666" align="left"/>';
		$sql1 = "Select * From DailyTimeLog where sequenceno = '".$EmpID."' order by datelog,logcount";
		$rs1 = odbc_exec($conn1,$sql1) or die("Error in query");	
		while (odbc_fetch_row($rs1)) {
				$TimeLOG = strtoupper(odbc_result($rs1,"timelog"));
				$DateLOG = strtoupper(odbc_result($rs1,"datelog"));
				echo '<form name="frmEdit">';
				echo '<tr>';
				echo '<td align="center">'.strtoupper(odbc_result($rs1,"sequenceno")).'</td>';
				echo '<td align="center">'.strtoupper(odbc_result($rs1,"datelog")).'</td>';
				echo '<td align="center">'.$TimeLOG.'</td>';
				echo '<td align="center">'.strtoupper(odbc_result($rs1,"logcount")).'</td>';
				echo '<td align="center"><input type="Submit" name="btnEdit" value="Edit" onclick="javascript: frmEdit.action=CheckFile.php; frmEdit.method=GET;"/></td>';
				echo '<input type="hidden" name="EmpNo" value="'.$EmpID.'" size="10"/>';
				echo '<input type="hidden" name="timeLog1" value="'.$TimeLOG.'" size="10"/>';
				echo '</tr>';
				
				echo '</form>';
			}
			
			if (isset($_REQUEST['btnEdit'])){
			$TimeLOG = $_REQUEST['timeLog1'];
			}
			
			
			if (isset($_REQUEST['btnSave'])){
			$EmpID = $_REQUEST['EmpNo'];
			$TimeLOG = $_REQUEST['timeLog1'];
			$TimeLOG2 = $_REQUEST['timeLog'];
			
			$sql1 = "Update DailyTimeLog Set timelog = '".$TimeLOG2."' where sequenceno = '".$EmpID."' and timelog = '".$TimeLOG."'";
			$rs1 = odbc_exec($conn1,$sql1) or die("Error in query");	
			}

	?>
	</table>

	<hr width=580px size="1" color="#666666" align="left"/>
	
	<form name="frmSave">
	<input type="hidden" name="EmpNo" value="<?Php echo $EmpID ?>" size="10"/>
	<table>
		<tr>
			<td>Time Log:</td>
			<td>
			<input type="hidden" name="timeLog1" value="<?Php echo $TimeLOG ?>" size="10"/>
			<input type="text" value="<?Php echo $TimeLOG ?>" name="timeLog" /></td>
			<td><input type="Submit" value="Save" name="btnSave" onclick="javascript: frmSave.action='CheckFile.php'; frmSave.method='GET';"/></td>
		</tr>
	</table>
	</form>
	
	
	
</body>
</html>
