<?Php
	
	include 'DBConnect.php';
	
	$Date1 = "";
	$Date2 = "";
	$EmpNo = "";
	$EmpName = "";
	
if (isset($_REQUEST['ProcessDTR'])){
	$Date1 = $_REQUEST['FromDate'];
	$Date2 = $_REQUEST['ToDate'];
	$EmpNo = $_REQUEST['empNumber'];
	$sql = "Select * From Employee where employeeid = '".$EmpNo."' order by lastname";
	$rs=odbc_exec($conn,$sql) or die("Error in query");	
	$EmpName = odbc_result($rs,"Lastname").", ".odbc_result($rs,"firstname")." ".odbc_result($rs,"Middlename");
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
font-size:10px;
}

</style>
</head>

<body background="images/bg2.jpg">


<table>
	<tr>
		<form name="formSub">
		<td>Employee No.:</td>
		<td><input type="text" size="16" name="empNumber" value="<?Php echo $EmpNo ?>" /></td>
		<td></td>
		<td><strong> <?Php echo $EmpName ?> </strong></td>
		<td></td>
	</tr>
	<tr>
		<td>Select Date:</td>
		<td><input type="date" size="10" name="FromDate" value="<?Php echo $Date1 ?>"/></td>
		<td> - </td>
		<td><input type="date" size="10" name="ToDate" value="<?Php echo $Date2 ?>"/></td>
		<td><input type="Submit" name="ProcessDTR" onclick="javascript: formSub.action='CheckRecords.php'; formSub.method='GET'; "value="Process" /></form></td>
		
		<td><form name="formSub2">
		<input type="hidden" name="empNumber" value="<?Php echo $EmpNo ?>" />
		<input type="hidden" name="FromDate" value="<?Php echo $Date1 ?>" />
		<input type="hidden" name="ToDate" value="<?Php echo $Date2 ?>"  />
		<input type="Submit" name="ProDate" onclick="javascript: formSub2.action='ProcessRecords.php'; formSub2.method='GET'; target='_blank'; " value="Print" /></td>
		</form>
	</tr>
</table>

<hr size="3" color="#666666" align="left" width="690"/>

<?Php
	
if (isset($_REQUEST['ProcessDTR'])){
	$Date1 = $_REQUEST['FromDate'];
	$Date2 = $_REQUEST['ToDate'];
	$EmpNo = $_REQUEST['empNumber'];
	
	echo '<table>';
	echo '<tr>';
	echo '<th width="80" align="left">Date</th>';
	echo '<th width="80" align="left">In AM</th>';
	echo '<th width="80" align="left">Out AM</th>';
	echo '<th width="80" align="left">In PM</th>';
	echo '<th width="80" align="left">Out PM</th>';
	echo '<th width="60" align="center">Late (AM)</th>';
	echo '<th width="60" align="center">Late (LB)</th>';
	echo '<th width="80" align="center">UTime (PM)</th>';
	echo '<th width="60" align="center">Count</th>';
	echo '</tr>';
	echo '</table>';

	echo '<table>';
	echo '<tr>';
	echo '<td>';
	echo '<hr size="1" width="688" />';
	echo '</td>';
	echo '</tr>';
	echo '</table>';
	
	date_default_timezone_set("Asia/Taipei");
	$Date1=date_create($Date1);
	//$Date1=date_format($Date1,"d-m-Y");
	$Date2=date_create($Date2);
	//$Date2=date_format($Date2,"d-m-Y");
	
	$x = 0;
	$TotalLAM = "";
	$TotalLLB = "";
	$TotalLUT = "";
	$TotalCnt = "";
	
	
	echo '<table>';
	$sql = "Select * From Employee where employeeid = '".$EmpNo."' order by lastname";
	$rs=odbc_exec($conn,$sql) or die("Error in query");	
	while (odbc_fetch_row($rs)) {
		while ($Date1 <= $Date2){
		echo '<tr>';
			$DateName = date_format($Date1,"D");
			$DateName = strtoupper($DateName);
			$Date0 = date_format($Date1,"m/d/Y");
			$Date00 = date_format($Date1,"m/d/Y");
			echo '<td width="80" align="left">'.$Date00.'</td>';
			
			$TimeLog1 = "";
			$TimeLog2 = "";
			$TimeLog3 = "";
			$TimeLog4 = "";
			$Time2 = "";
			$Time3 = "";
			$diffTime = "";
			$AMLate = "";
			$PMUT = "";
			$LCnt = "";
			
			
			
			$sql1 = "Select * From DAILYTIMELOG_TEMP where SEQUENCENO = '".odbc_result($rs,"employeeid")."' and datelog = '".$Date00."' order by logcount";
			$rs1=odbc_exec($conn,$sql1) or die("Error in query");	
			while (odbc_fetch_row($rs1)) {
				
				if (odbc_result($rs1,"logcount") == "1") {
					$TimeLog1 = odbc_result($rs1,"timelog");
					$AMLate = odbc_result($rs1,"timediff");
					$TimeLog1 = date_create($TimeLog1);
					$TimeLog1 = date_format($TimeLog1,"g:i:s A");
					
					}
				else if (odbc_result($rs1,"logcount") == "2") {
					$TimeLog2 = odbc_result($rs1,"timelog");
					$TimeLog2 = date_create($TimeLog2);
					$Time2 = $TimeLog2;
					$TimeLog2 = date_format($TimeLog2,"g:i:s A");
					
					}
				else if (odbc_result($rs1,"logcount") == "3") {
					$TimeLog3 = odbc_result($rs1,"timelog");
					$TimeLog3 = date_create($TimeLog3);
					$Time3 = $TimeLog3;
					$TimeLog3 = date_format($TimeLog3,"g:i:s A");
					}
				else if (odbc_result($rs1,"logcount") == "4") {
					$TimeLog4 = odbc_result($rs1,"timelog");
					$TimeLog4 = date_create($TimeLog4);
					$PMUT = odbc_result($rs1,"timediff");
					$TimeLog4 = date_format($TimeLog4,"g:i:s A");
					}
				
			}
				
				
			


					if (($Time3 != "") && ($Time2 != "")) {
					$diff=date_diff($Time2,$Time3);
					$diffTime = $diff->format("%R%i");
					$diffTime = $diffTime * 1;
					$diffTime = $diffTime - 45;
					}
					
					
					if (($DateName == "SAT" ) || ($DateName == "SUN")) {
					$AMLate = "";
					$PMUT = "";
					$diffTime = "";
					}
					
					if ($diffTime < 1 ) { $diffTime = ""; }
					else if ($diffTime >= 1 ){ $LCnt = $LCnt + 1;
					   		$TotalLLB = $TotalLLB + $diffTime;}
					
					
					if ($AMLate < 1 ) { $AMLate = ""; }
					else if ($AMLate >= 1 ){ $LCnt = $LCnt + 1; 
					   	$TotalLAM = $TotalLAM + $AMLate; }
					if ($PMUT < 1 ) { $PMUT = ""; }
					else if ($PMUT >= 1 ){ $LCnt = $LCnt + 1;
					   	$TotalLUT = $TotalLUT + $PMUT;}
				
				
				$TotalCnt = $TotalCnt + $LCnt;
				echo '<td width="80" align="left">'.$TimeLog1.'</td>';
				echo '<td width="80" align="left">'.$TimeLog2.'</td>';
				echo '<td width="80" align="left">'.$TimeLog3.'</td>';
				echo '<td width="80" align="left">'.$TimeLog4.'</td>';
				echo '<td width="60" align="center">'.$AMLate.'</td>';
				echo '<td width="60" align="center">'.$diffTime.'</td>';
				echo '<td width="80" align="center">'.$PMUT.'</td>';
				echo '<td width="60" align="center">'.$LCnt.'</td>';
			

		
			echo '<tr>';
		$Date1->modify('+1 day');
		}
	$x = $x + 1;
	}
	
	echo '</table>';
	
	
	
	echo '<table>';
	echo '<tr>';
	echo '<td>';
	echo '<hr size="1" width="688" />';
	echo '</td>';
	echo '</tr>';
	echo '</table>';
	
	echo '<table>';
	echo '<td width="80" align="left"></td>';
	echo '<td width="80" align="left"></td>';
	echo '<td width="80" align="left"></td>';
	echo '<td width="80" align="left"></td>';
	echo '<td width="80" align="left">Total</td>';
	echo '<td width="60" align="center">'.$TotalLAM.'</td>';
	echo '<td width="60" align="center">'.$TotalLLB.'</td>';
	echo '<td width="80" align="center">'.$TotalLUT.'</td>';
	echo '<td width="60" align="center">'.$TotalCnt.'</td>';
	echo '</table>';
	
	
	}
	
	//$pDate = strtotime($Date1.' + 1 day');
	//echo date('d-m-Y',$Date1);
	
	//$Date1=date_format($Date1,"d-m-Y");
	//echo $Date1;
	//echo $x;
?>

</body>
</html>
