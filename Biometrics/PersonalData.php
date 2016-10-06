	<?Php
		
		include 'DBConnect.php';
		$empID = "";
		$FName = "";
		$MName = "";
		$LName = "";
		$BDate = "";
		$BPlace = "";
		$Sex = "";
		$Age = "";
		$CivilStatus = "";
		$Religion = "";
		$Citizenship = "";
		$Height = "";
		$Weight = "";
		$BloodType = "";
		$UpdateStat = "";
		$EmpCheck = "";
		
		if (isset($_REQUEST['btnSaveInfo'])){
		
			$empID = $_REQUEST['EID'];
			$FName = $_REQUEST['FName'];
			$MName = $_REQUEST['MName'];
			$LName = $_REQUEST['LName'];
			$Sex = $_REQUEST['Sex'];
			$Age = $_REQUEST['Age'];
			$BDate = $_REQUEST['BDate'];
			$BPlace = $_REQUEST['BPlace'];
			$CivilStatus = $_REQUEST['CivilStatus'];
			$Religion = $_REQUEST['Religion'];
			$Citizenship = $_REQUEST['Citizenship'];
			$Height = $_REQUEST['Height'];
			$Weight = $_REQUEST['Weight'];
			$BloodType = $_REQUEST['BloodType'];
			
			$sql = "Select * From Employee where employeeid = '".$empID."'";
			$rs=odbc_exec($conn,$sql) or die("Error in query");	
			while (odbc_fetch_row($rs)) {$EmpCheck = "1";}
			
			if ($EmpCheck == "1") {
		$sql1 = "Update PersonalData set Firstname = '".$FName."', Middlename = '".$MName."', Lastname = '".$LName."', Birthdate = '".$BDate."', Birthplace = '".$BPlace."', Sex = '".$Sex."', Age = '".$Age."', CivilStatus = '".$CivilStatus."', Religion = '".$Religion."', Citizenship = '".$Citizenship."', Height = '".$Height."', Weight = '".$Weight."', BloodType = '".$BloodType."' where employeeno = '".$empID."'";
		$rs1=odbc_exec($conn,$sql1) or die("Error in query");	
		$UpdateStat = "1";
			}
		
		}
		
		if (isset($_REQUEST['EID'])){
			$empID = $_REQUEST['EID'];
			$sql1 = "Select * From PersonalData where employeeno = '".$empID."'";
			$rs1=odbc_exec($conn,$sql1) or die("Error in query");	
				$FName = odbc_result($rs1,"Firstname");
				$MName = odbc_result($rs1,"Middlename");
				$LName = odbc_result($rs1,"lastname");
				$Sex = odbc_result($rs1,"Sex");
				$Age = odbc_result($rs1,"Age");
				$BDate = odbc_result($rs1,"Birthdate");
				$CivilStatus = odbc_result($rs1,"CivilStatus");
				$BPlace = odbc_result($rs1,"BIRTHPLACE");
				$Religion = odbc_result($rs1,"RELIGION");
				$Citizenship = odbc_result($rs1,"Citizenship");
				$Height = odbc_result($rs1,"Height");
				$Weight = odbc_result($rs1,"Weight");
				$BloodType = odbc_result($rs1,"BLOODTYPE");
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
	width: 136px;
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
	padding: 2px;
	margin: 2px;
	color: #000099;
}

th{

	font-family:"Century Gothic";
	font-size:14px;
	font-weight: bold;
	color:#0000FF;
}

</style>

<body>
	
	<table><tr><th>Personal Details</th></tr></table>
	
	<hr size="2" width="490" align="left" color="#666666"/>
	
	<form>
	<input type="hidden" size="20"  name="EID" value="<?Php echo $empID; ?>"/>
	<table width="500">
		<tr>
			<td width="104" align="right">Last Name:</td>
		  <td width="153"><input type="text" size="20"  name="LName" value="<?Php echo $LName; ?>"/></td>
	  	  <td width="87" align="right">Sex:</td>
		  <td width="136"><input type="text" size="10"  name="Sex" value="<?Php echo $Sex; ?>"/></td>
		</tr>
		<tr>
			<td align="right">First Name:</td>
			<td><input type="text" size="20"  name="FName"  value="<?Php echo $FName; ?>"/></td>
			<td align="right">Age:</td>
			<td><input type="text" size="10"  name="Age" value="<?Php echo $Age; ?>"/></td>
		</tr>
		<tr>
			<td align="right">Middle Name:</td>
			<td><input type="text" size="20"  name="MName" value="<?Php echo $MName; ?>"/></td>
			<td align="right">Blood Type:</td>
			<td><input type="text" size="10" name="BloodType" value="<?Php echo $BloodType; ?>"/></td>
		</tr>
		
		<tr>
			<td align="right">Birth Place:</td>
			<td><input type="text" size="20"  name="BPlace" value="<?Php echo $BPlace; ?>"/></td>
			<td align="right">Religion:</td>
			<td><input type="text" size="10" name="Religion" value="<?Php echo $Religion; ?>"/></td>
		</tr>
		
		<tr>
			<td align="right">Birth Date:</td>
			<td><input type="date" size="10"  name="BDate" value="<?Php echo $BDate; ?>"/></td>
			<td align="right">Citizenship:</td>
			<td><input type="text" size="10" name="Citizenship" value="<?Php echo $Citizenship; ?>"/></td>
		</tr>
		<tr>
			<td align="right">Height:</td>
			<td><input type="text" size="20" name="Height" value="<?Php echo $Height; ?>"/></td>
			<td align="right">Weight:</td>
			<td><input type="text" size="10" name="Weight" value="<?Php echo $Weight; ?>"/></td>
		</tr>
		<tr>
			<td align="right">Civil Status:</td>
			<td><input type="text" size="20" name="CivilStatus" value="<?Php echo $CivilStatus; ?>"/></td>
			<td align="right"></td>
			<td align="center"><input type="submit" value="Save" name="btnSaveInfo" /></td>
		</tr>
</table>
	</form>
	<hr size="1" width="490" align="left" />
	<table><tr><th width="486" align="center"><font color="#FF0000">
	<?Php if ($UpdateStat == "1"){ echo 'Successfully Updated.';  } ?>
	</font></th>
	</tr></table>
	
</body>
</html>
