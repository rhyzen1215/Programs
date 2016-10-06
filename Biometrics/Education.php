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
	
	


	
	<table><tr><th>Educational Details</th></tr></table>
	
	<hr size="2" width="460" align="left" color="#666666"/>
	
	<table><tr>
	<td height="20"></td></tr>
	<tr><td><font color="#990000">Level:</font>
	<select name="EducationLevel">
		<option value="Elementary">Elementary</option>
		<option value="Secondary">Secondary</option>
		<option value="Undergraduate">Undergraduate</option>
		<option value="Graduate">Graduate</option>
		<option value="Post Graduate">Post Grgaduate</option>
	</select>
	</td>
	<td><input type="Submit" value="View" /></td>
	</tr></table>
	
	<hr size="1" width="460" align="left" />
	
	<table width="466">
		<tr>
		  <td width="67" align="right">Name:</td>
          <td width="387"><input type="text" size="60"  /></td>
		</tr>
		<tr>
			<td width="67" align="right">Location:</td>
          <td width="387"><input type="text" size="60"  /></td>
		</tr>
</table>


<table width="466">
		<tr>
			<td width="67" align="right">Degree:</td>
          <td width="146"><input type="text" size="20"  /></td>
			<td width="93" align="right">Major:</td>
          <td width="140"><input type="text" size="20"  /></td>
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
          <td width="150"><input type="date"  /></td>
		  <td width="90" align="right">Date To:</td>
          <td width="143"><input type="date"  /></td>
		</tr>
</table>

<table width="469">
		<tr>
			<td width="158" align="right">No. of Years Completed:</td>
          <td width="72"><input type="text" size="10"  /></td>
			<td width="119" align="right">Scholastic Standing:</td>
          <td width="100"><input type="text" size="10"  /></td>
		</tr>
		<tr>
			<td width="158" align="right"></td>
          <td width="72"></td>
			<td width="119" align="right"></td>
          <td width="100" align="right"><input type="Submit" value="Save" /></td>
		</tr>
</table>

	<hr size="1" width="460" align="left" />
	<table><tr><td width="461" height="20"></td>
	</tr>
	<tr><td>Scholastic Honors and Extracurricular Activities</td></tr>
	<tr><td><input type="text" size="70"  /></td></tr></table>
	
	<table><tr><td width="459">List Extra Curricular Activities with Offices held since High School</td>
	</tr>
	<tr><td><input type="text" size="70"  /></td></tr></table>
	
	<table><tr><td width="322">Hobbies and Outside Interest (Including Civic Activities)</td>
	</tr>
	<tr><td><input type="text" size="70"  /></td></tr>
	<tr><td width="130" align="right"><input type="Submit" value="Save" /></td></tr></table>
	
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
	
	<table width="470">
		<tr>
		  <td width="51" align="right">From:</td>
          <td width="128"><input type="date" /></td>
		  <td width="113" align="right">Branch of Service:</td>
          <td width="158"><input type="text" size="20"  /></td>
		</tr>
		
		<tr>
		  <td width="51" align="right">To:</td>
          <td width="128"><input type="date" /></td>
		  <td width="113" align="right">Rate or Rank:</td>
          <td width="158"><input type="text" size="20"  /></td>
		</tr>
</table>	
	
	<table><tr><td width="458">What Kind of Duty (especially if professional in nature)</td>
	</tr>
	<tr><td><input type="text" size="68"  /></td></tr>
	<tr><td align="right"><input type="Submit" value="Save" /></td></tr>

</table>
	
	<hr size="1" width="460" align="left" />
	
	

</body>
</html>
