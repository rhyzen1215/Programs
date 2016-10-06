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
}

.txtStyle {

	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;
	border-spacing:inherit;
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
	
	
	<form name="formEmployee" action="EmployeeSave.php">
	<input type="hidden" size="10" name="empIDNum" id="empIDNum" value="<?Php echo $empID; ?>"/>
	<table>
		<tr>
			<td align="right"><div class="txtStyle">Lastname:</div></td>
			<td><input type="text" size="25" name="LName" id="LName" value="<?Php echo $Lname; ?>" disabled="disabled"/></td>
			<td align="right"><div class="txtStyle">Company:</div></td>
			<td><input type="text" size="25" name="Comp" id="Comp" value="<?Php echo $Comp; ?>"  disabled="disabled"/></td>
		</tr>
		
		<tr>
			<td align="right"><div class="txtStyle">Firstname:</div></td>
			<td><input type="text" size="25" name="FName" id="FName" value="<?Php echo $Fname; ?>" disabled="disabled"/></td>
			<td align="right"<div class="txtStyle">Branch/Dept.:</div></td>
			<td><select name="BDept" id="BDept" disabled="disabled">
			<?Php 
			echo '<option value="" selected="selected" />--select--</option>';
			
			$sql1 = "SELECT * FROM SUBCOMPANY  where COMPANYCODE = '1001'";
			$rs1=odbc_exec($conn,$sql1) or die("Error in query");	
			
			while (odbc_fetch_row($rs1)) {
				if ($Branch == odbc_result($rs1,"STATION_BRANCH")) {
				echo '<option value="'.odbc_result($rs1,"STATION_BRANCH").'" selected="selected" />'.odbc_result($rs1,"STATION_BRANCH").'</option>';
				}
				else {
				echo '<option value="'.odbc_result($rs1,"STATION_BRANCH").'" />'.odbc_result($rs1,"STATION_BRANCH").'</option>';
				}
			}
				
			?>
			</select></td>
		</tr>
		
		<tr>
			<td align="right"><div class="txtStyle">Middlename:</div></td>
			<td><input type="text" size="25" name="MName" id="MName" value="<?Php echo $Mname; ?>" disabled="disabled"/></td>
			<td align="right"><div class="txtStyle">Address:</div></td>
			<td><input type="text" size="25" name="Addr" id="Addr" value="<?Php echo $Address; ?>" disabled="disabled"/></td>
		</tr>
		
		<tr height="30">
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		
		<tr>
			<td align="right"><div class="txtStyle">Schedule ID:</div></td>
			<td>
			<select name="SchedID" id="SchedID" disabled="disabled">
			<?Php 
			echo '<option value="" selected="selected" />--select--</option>';
			$sql="SELECT * FROM TIMESCHEME";
			$rs=odbc_exec($conn,$sql) or die("Error in query");	
			while (odbc_fetch_row($rs)) {
				if ($SchedID == odbc_result($rs,"SCHEMECODE")) {echo '<option value="'.odbc_result($rs,"SCHEMECODE").'" selected="selected" />'.odbc_result($rs,"SCHEMECODE").'</option>';}
				else {echo '<option value="'.odbc_result($rs,"SCHEMECODE").'" />'.odbc_result($rs,"SCHEMECODE").'</option>';}
			}
				
			?>
			</select></td>
			<td align="right"></td>
			<td></td>
		</tr>
		
		<tr>
		  <td align="right"><div class="txtStyle">Description:</div></td>
			<td><input type="text" size="25"  name="SchedDes" id="SchedDes" value="<?Php echo $SchedDes; ?>" disabled="disabled"/></td>
			<td></td>
			<td align="right"><input type="submit" name="btnSave" id="btnSave" value="Save" disabled="disabled"/>
			<input type="button" name="btnNew" id="btnNew" value="New" onclick="enableNew()" />
			<input type="button" name="btnEdit" id="btnEdit" value="Edit" onclick="enableInput()"/></td>
		</tr>
		
		<tr>
			<td align="right"></td>
			<td align="right"></td>
			<td align="right"></td>
			<td></td>
		</tr>
	</table>
	</form>
	
	<table>
	<tr height="50">
	<td width="500" align="center">
	 <?Php
		 if (isset($_REQUEST['SucSave'])){
		 $File = $_REQUEST['SucSave'];
		 echo '<font size=4 face="Century Gothic" color="blue"><strong>Employee Number '.$File.' was successfully saved!</strong></font>';
		 } 
		 ?>

	</td>
	</tr>
	</table>
</body>
</html>
