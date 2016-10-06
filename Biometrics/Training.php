	<?Php
		
		include 'DBConnect.php';
		$empID="";
		$Course="";
		$Conductedby="";
		$DateAttended="";
		$UpdateStat = "";
		$cntr = "";
		$EmpCheck = "";
		
		if (isset($_REQUEST['btnView'])){
			$empID = $_REQUEST['EID'];
			$Course= $_REQUEST['Course'];
			$cntr = $_REQUEST['CID'];
			$sql = "Select * From Trainings where employeeno = '".$empID."' and CID  = '".$cntr."'";
			$rs=odbc_exec($conn,$sql) or die("Error in query");	
			while (odbc_fetch_row($rs)) {
				$Course=odbc_result($rs,"course");
				$Conductedby=odbc_result($rs,"Conductedby");
				$DateAttended=date_create(odbc_result($rs,"DateAttended"));
				$DateAttended = date_format($DateAttended,"Y-m-d");
			}
	
		} 
		
		if (isset($_REQUEST['EID'])){
			$empID = $_REQUEST['EID'];
		}
		
		if (isset($_REQUEST['btnAdd'])){
			$cntr = $_REQUEST['CID'];
			$empID = $_REQUEST['EID'];
			$Course= $_REQUEST['Course'];
			$Conductedby= $_REQUEST['Conductedby'];
			$DateAttended= $_REQUEST['DateAttended'];
			
			$sql = "Select * From Trainings where employeeno = '".$empID."' and CID = '".$cntr."'";
			$rs=odbc_exec($conn,$sql) or die("Error in query");	
			while (odbc_fetch_row($rs)) {$EmpCheck = "1";}
			
			if ($EmpCheck == "1") {
			$sql1 = "Update Trainings set Course = '".$Course."', Conductedby = '".$Conductedby."', DateAttended = '".$DateAttended."' where employeeno = '".$empID."' and CID = '".$cntr."'";
			$rs1=odbc_exec($conn,$sql1) or die("Error in query");	
			$UpdateStat = "2";
			} else {
			
			$sql = "Select count(employeeno) as cntr From Trainings where employeeno = '".$empID."'";
			$rs=odbc_exec($conn,$sql) or die("Error in query");	
			$cntr=odbc_result($rs,"cntr");
			$cntr = $cntr + 1;
				
			$sql1 = "Insert into Trainings (cid, employeeno, Course, Conductedby, DateAttended) values ('$cntr','$empID','$Course','$Conductedby','$DateAttended')";
			$rs1=odbc_exec($conn,$sql1);
			$UpdateStat = "0";
			}
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
	width: 120px;
	margin-left:2px;
	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;
	border-spacing:inherit;
	padding-left: 2px;
	margin: 2px;
}

select
{
	width: 175px;
	margin-left:2px;
}

input[type=text],select
{
	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;
	border-spacing:inherit;
	padding-left: 2px;
	margin: 2px;
}

select
{
	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;
	border-spacing:inherit;
	padding-left: 2px;
	margin: 2px;
	width:100px;
}


td {

	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;
}

th{

	font-family:"Century Gothic";
	font-size:14px;
	font-weight: bold;
	color:#0000FF;
}

</style>

<body>
	
	


	
	<table><tr><th>Training/Seminars</th></tr></table>
	
	<hr size="2" width="500" align="left" color="#666666"/>
	<table width="499">
	  <tr>
	    <td width="377"><font color="#990000">Course/Title</font></td>
	    <td width="110"><font color="#990000"></font></td>
      </tr>
	</table>
	<hr size="1" width="500" align="left"/>
	<table>
	<?Php
		
	
	$sql = "Select * From Trainings where employeeno = '".$empID."'";
	$rs=odbc_exec($conn,$sql) or die("Error in query");	
	while (odbc_fetch_row($rs)) {
		echo '<form name="frmCourse">';
		echo '<tr>';
	    echo '<td width="377">'.odbc_result($rs,"course").'</td>';
	    echo '<td width="110"><input type="Submit" value="View" name="btnView" onclick="javascript: frmCourse.action=Training.php; frmCourse.method=GET;"/></td>';
		echo '<input type="hidden" size="20"  name="EID" value="'.$empID.'"/>';
		echo '<input type="hidden" size="20"  name="CID" value="'.odbc_result($rs,"CID").'"/>';
		echo '<input type="hidden" size="20"  name="Course" value="'.odbc_result($rs,"Course").'"/>';
      	echo '</tr>';
		echo '</form>';
	
	
	}
	
	?>
	</table>
	
	<hr size="2" width="500" align="left" color="#666666"/>
	<form>
	<input type="hidden" size="20"  name="EID" value="<?Php echo $empID; ?>"/>
	<input type="hidden" size="20"  name="CID" value="<?Php echo $cntr; ?>"/>
	<table width="492">
		<tr>
			<td width="118" align="right">Course/Title:</td>
          <td width="362"><input type="text" size="50" name="Course" value="<?Php echo $Course; ?>"/></td>
		  <tr>
			<td width="120" align="right">Conducted By:</td>
          <td width="362"><input type="text" size="50" name="Conductedby" value="<?Php echo $Conductedby; ?>"/></td>
		</tr>
		</tr>
</table>
	
<table width="494">
		<tr>
		  <td width="120" align="right">Date Attended:</td>
          <td width="362"><input type="date" name="DateAttended" value="<?Php echo $DateAttended; ?>" /></td>
		</tr>
		
</table>
	
	<table width="463">
		<tr>
			<td width="362" align="right"></td>
            <td width="118" align="right"><input type="Submit" value="  Save  "  name="btnAdd"/></td>
		</tr>
</table>
	
	</form>
	
	
	

</body>
</html>
