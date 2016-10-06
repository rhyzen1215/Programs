	<?Php
		
		include 'DBConnect.php';
		
		$empID="";
		$EdLevel="";
		$SchoolName="";
		$Address="";
		$Degree="";
		$Major="";
		$DateFrom="";
		$DateTo = "";
		$NoofYears="";
		$Standing="";
		$EmpCheck = "";
		$UpdateStat = "";
		$Honors="";
		$ExtraActivities="";
		$Hobbies="";
		

		if (isset($_REQUEST['btnSaveEdu'])){
		
			$empID = $_REQUEST['EID'];
			$EdLevel= $_REQUEST['Level'];
			$SchoolName= $_REQUEST['SchoolName'];
			$Address= $_REQUEST['Address'];
			$Degree= $_REQUEST['Degree'];
			$Major= $_REQUEST['Major'];
			$DateFrom= date_create($_REQUEST['DateFrom']);
			$DateTo = date_create($_REQUEST['DateTo']);
			$NoofYears= $_REQUEST['NoofYears'];
			$Standing= $_REQUEST['Standing'];
			
			$DateFrom = date_format($DateFrom,"m/d/Y");
			$DateTo = date_format($DateTo,"m/d/Y");
			
			$sql = "Select * From EducationalData where employeeno = '".$empID."' and Edlevel = '".$EdLevel."'";
			$rs=odbc_exec($conn,$sql) or die("Error in query");	
			while (odbc_fetch_row($rs)) {$EmpCheck = "1";}
			
			if ($EmpCheck == "1") {
			
			$sql1 = "Update EDUCATIONALDATA set SchoolName = '".$SchoolName."', Address = '".$Address."', Degree = '".$Degree."', Major = '".$Major."', DateFrom = '".$DateFrom."', DateTo = '".$DateTo."', NoofYears = '".$NoofYears."', Standing = '".$Standing."' where employeeno = '".$empID."' and EdLevel = '".$EdLevel."'";
		$rs1=odbc_exec($conn,$sql1) or die("Error in query");	
		$UpdateStat = "1";
		
			} else {
			$sql1 = "Insert into EDUCATIONALDATA (employeeno, EdLevel,SchoolName, Address, Degree, Major, DateFrom, DateTo, NoofYears, Standing) values ('$empID','$EdLevel','$SchoolName','$Address','$Degree','$Major','$DateFrom','$DateTo','$NoofYears','$Standing')";
			$rs1=odbc_exec($conn,$sql1);
			$UpdateStat = "0";
			}
		
		}
		$sql = "Select * From PersonalData where employeeno = '".$empID."'";
			$rs=odbc_exec($conn,$sql) or die("Error in query");	
			while (odbc_fetch_row($rs)) {$EmpCheck = "1";}
			
			if ($EmpCheck == "1") {
			
			$sql1 = "Update PersonalData set Honors = '".$Honors."', ExtraActivities = '".$ExtraActivities."', Hobbies = '".$Hobbies."' where employeeno = '".$empID."'";
			$rs1=odbc_exec($conn,$sql1) or die("Error in query");	
			$UpdateStat = "2";
		
			}
		if (isset($_REQUEST['btnSave2'])){
		
			$empID = $_REQUEST['EID'];
			$Honors= $_REQUEST['Honors'];
			$ExtraActivities= $_REQUEST['ExtraActivities'];
			$Hobbies= $_REQUEST['Hobbies'];
			
			$sql = "Select * From PersonalData where employeeno = '".$empID."'";
			$rs=odbc_exec($conn,$sql) or die("Error in query");	
			while (odbc_fetch_row($rs)) {$EmpCheck = "1";}
			
			if ($EmpCheck == "1") {
			
			$sql1 = "Update PersonalData set Honors = '".$Honors."', ExtraActivities = '".$ExtraActivities."', Hobbies = '".$Hobbies."' where employeeno = '".$empID."'";
			$rs1=odbc_exec($conn,$sql1) or die("Error in query");	
			$UpdateStat = "2";
		
			}
			
			
		}
		
		if ((isset($_REQUEST['EID'])) || (isset($_REQUEST['btnView']))){
			$empID = $_REQUEST['EID'];
			if ((isset($_REQUEST['btnSaveEdu'])) || (isset($_REQUEST['btnView']))){ $EdLevel= $_REQUEST['Level']; }
			if ($EdLevel =="") {$EdLevel = "Elementary"; }
	
			$sql1 = "Select * From EducationalData where employeeno = '".$empID."' and Edlevel = '".$EdLevel."'";
			$rs1=odbc_exec($conn,$sql1) or die("Error in query");	
				$SchoolName=odbc_result($rs1,"SchoolName");
				$Address=odbc_result($rs1,"Address");
				$Degree=odbc_result($rs1,"Degree");
				$Major=odbc_result($rs1,"Major");
				$DateFrom=date_create(odbc_result($rs1,"DateFrom"));
				$DateTo = date_create(odbc_result($rs1,"DateTo"));
				$NoofYears=odbc_result($rs1,"NoofYears");
				$Standing=odbc_result($rs1,"Standing");
				$DateFrom = date_format($DateFrom,"Y-m-d");
				$DateTo = date_format($DateTo,"Y-m-d");
			
			$sql1 = "Select * From PersonalData where employeeno = '".$empID."'";
			$rs1=odbc_exec($conn,$sql1) or die("Error in query");	
				$Honors=odbc_result($rs1,"Honors");
				$ExtraActivities=odbc_result($rs1,"ExtraActivities");
				$Hobbies=odbc_result($rs1,"Hobbies");
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
	width:120px;
}


td {

	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;
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
	
	

	<form name="frmEdu">
	<input type="hidden" size="20"  name="EID" value="<?Php echo $empID; ?>"/>
	
	<table><tr><th>Educational Details</th></tr></table>
	
	<hr size="2" width="460" align="left" color="#666666"/>
	
	<table><tr>
	<td height="20"></td></tr>
	<tr><td><font color="#990000">Level:</font>
	<select name="Level">
		<option value="Elementary" <?Php if ($EdLevel == "Elementary" ) { echo 'selected="selected"'; }?> >Elementary</option>
		<option value="Secondary" <?Php if ($EdLevel == "Secondary" ) { echo 'selected="selected"'; }?>>Secondary</option>
		<option value="Undergraduate" <?Php if ($EdLevel == "Undergraduate" ) { echo 'selected="selected"'; }?>>Undergraduate</option>
		<option value="Graduate" <?Php if ($EdLevel == "Graduate" ) { echo 'selected="selected"'; }?>>Graduate</option>
		<option value="Post Graduate" <?Php if ($EdLevel == "Post Graduate" ) { echo 'selected="selected"'; } ?>>Post Grgaduate</option>
	</select>
	</td>
	<td><input type="Submit" value="View" name="btnView"/></td>
	</tr></table>
	
	<hr size="1" width="460" align="left" />
	
	<table width="466">
		<tr>
		  <td width="67" align="right">Name:</td>
          <td width="387"><input type="text" size="60" name="SchoolName" value="<?Php echo $SchoolName ?>"/></td>
		</tr>
		<tr>
			<td width="67" align="right">Location:</td>
          <td width="387"><input type="text" size="60"  name="Address" value="<?Php echo $Address ?>"/></td>
		</tr>
</table>


<table width="466">
		<tr>
			<td width="67" align="right">Degree:</td>
          <td width="146"><input type="text" size="20" name="Degree" value="<?Php echo $Degree ?>"/></td>
			<td width="93" align="right">Major:</td>
          <td width="140"><input type="text" size="20" name="Major" value="<?Php echo $Major ?>"/></td>
		</tr>
</table>
	
	<table width="468">
		<tr>
			<td width="86" align="right"></td>
            <td width="370">Dates Attended</td>
		</tr>
</table>
	
<table width="469">
		<tr>
			<td width="66" align="right">Date From:</td>
          <td width="150"><input type="date"  name="DateFrom" value="<?Php echo $DateFrom ?>"/></td>
		  <td width="101" align="right">Date To:</td>
          <td width="132"><input type="date"  name="DateTo" value="<?Php echo $DateTo ?>"/></td>
		</tr>
</table>

<table width="469">
		<tr>
			<td width="158" align="right">No. of Years Completed:</td>
          <td width="72"><input type="text" size="10"  name="NoofYears" value="<?Php echo $NoofYears ?>"/></td>
			<td width="131" align="right">Scholastic Standing:</td>
          <td width="88"><input type="text" size="10"  name="Standing" value="<?Php echo $Standing ?>"/></td>
		</tr>
	</table>
	
	<table width="448">
		<tr>
		<td width="359" align="right">
		<font color="#FF0000"><?Php if ($UpdateStat == "1"){ echo 'Successfully Updated.';  } 
									else if ($UpdateStat == "0"){ echo 'Successfully Added.';  } ?></font></td>
        <td width="87" align="right"><input type="Submit" value="Save" name="btnSaveEdu" onclick="javascript: frmEdu.action='EducationEdit.php'; frmEdu.method='GET';"/></td>
		</tr>
</table>
	</form>
	<hr size="1" width="460" align="left" />
	
	<form name="frmEdu2">
	<input type="hidden" size="20"  name="EID" value="<?Php echo $empID; ?>"/>
	<table><tr><td width="461" height="20"></td>
	</tr>
	<tr><td>Scholastic Honors and Extracurricular Activities</td></tr>
	<tr><td><input type="text" size="70"  name="Honors" value="<?Php echo $Honors ?>"/></td></tr></table>
	
	<table><tr><td width="459">List Extra Curricular Activities with Offices held since High School</td>
	</tr>
	<tr><td><input type="text" size="70"  name="ExtraActivities" value="<?Php echo $ExtraActivities ?>"/></td></tr></table>
	
	<table><tr><td width="322">Hobbies and Outside Interest (Including Civic Activities)</td>
	</tr>
	<tr><td><input type="text" size="70"  name="Hobbies" value="<?Php echo $Hobbies ?>"/></td></tr>
	</table>
	
	<table width="428">
	<tr>
	  <td width="318" align="right"><font color="#FF0000"><?Php if ($UpdateStat == "2"){ echo 'Successfully Updated.';  } 
									else if ($UpdateStat == "0"){ echo 'Successfully Added.';  } ?></font></td>
	  <td width="98" align="right"><input type="Submit" value="Save" name="btnSave2" onclick="javascript: frmEdu2.action='EducationEdit.php'; frmEdu2.method='GET';"/></td>
	</tr></table>
	</form>
	<hr size="1" width="460" align="left" />
	
	
	<table><tr><td height="20"></td></tr>
	<tr><td><font color="#990000">Military</font></td></tr></table>
	<hr size="1" width="460" align="left" />
	
	<table width="469">
		<tr>
		  <td width="168" align="right">Did you take ROTC?:</td>
          <td width="130"><select><option value="YES">Yes</option><option value="NO">No</option></select></td>
		</tr>
		<tr>
		  <td width="168" align="right">Are you a Reserve Officer?:</td>
          <td width="130"><select><option value="YES">Yes</option><option value="NO">No</option></select></td>
		  <td width="155"><select><option value="Ready">Ready</option><option value="Standby">Stand By</option><option value="Inactive">Inactive</option></select></td>
		</tr>
	</table>
	
	<table width="454">
		<tr>
		  <td width="51" align="right">From:</td>
          <td width="128"><input type="date" /></td>
		  <td width="113" align="right">Branch of Service:</td>
          <td width="142"><input type="text" size="20"  /></td>
		</tr>
		
		<tr>
		  <td width="51" align="right">To:</td>
          <td width="128"><input type="date" /></td>
		  <td width="113" align="right">Rate or Rank:</td>
          <td width="142"><input type="text" size="20"  /></td>
		</tr>
</table>	
	
	<table width="422">
	  <tr><td width="440">What Kind of Duty (especially if professional in nature)</td>
	</tr>
	<tr><td><input type="text" size="70"  /></td></tr>
</table>
	
	<table width="419">
	<tr><td width="423" align="right"><input type="Submit" value="Save" /></td></tr>

</table>
	
	<hr size="1" width="460" align="left" />
	
	

</body>
</html>
