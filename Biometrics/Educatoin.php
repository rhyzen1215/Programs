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
	
	


	
	<table>
		<tr>
			<td height="20"></td>
		</tr>
		
		<tr>
			<th>Education</th>
		</tr>
	</table>
	
	<hr size="2" width="700" align="left" color="#666666"/>
	
	<table><tr>
	<td height="20"></td></tr>
	<tr><td><font color="#990000">Elementary</font></td>
	</tr></table>
	
	<hr size="1" width="700" align="left" />
	
	<table width="676">
		<tr>
			<td width="82" align="right">Name:</td>
          <td width="330"><input type="text" size="50"  /></td>
			<td width="99" align="right">Degree:</td>
          <td width="145"><input type="text" size="20"  /></td>
		</tr>
		<tr>
			<td width="82" align="right">Location:</td>
            <td width="330"><input type="text" size="50"  /></td>
			<td width="99" align="right">Major:</td>
            <td width="145"><input type="text" size="20"  /></td>
		</tr>	
</table>
	
	<table width="676">
		<tr>
			<td width="86" align="right"></td>
            <td width="578">Dates Attended</td>
		</tr>
	</table>
	
	<table width="676">
		<tr>
			<td width="82" align="right">Date From:</td>
          <td width="243"><input type="date"  /></td>
			<td width="186" align="right">No. of Years Completed:</td>
            <td width="145"><input type="text" size="20"  /></td>
		</tr>
		<tr>
			<td width="82" align="right">Date To:</td>
            <td width="243"><input type="date"  /></td>
			<td width="186" align="right">Scholastic Standing:</td>
            <td width="145"><input type="text" size="20"  /></td>
		</tr>
	</table>
	
	
	
	<table><tr>
	<td height="20"></td></tr>
	<tr><td><font color="#990000">Secondary</font></td></tr></table>
	<hr size="1" width="700" align="left" />
	
	<table width="676">
		<tr>
			<td width="82" align="right">Name:</td>
          <td width="330"><input type="text" size="50"  /></td>
			<td width="99" align="right">Degree:</td>
          <td width="145"><input type="text" size="20"  /></td>
		</tr>
		<tr>
			<td width="82" align="right">Location:</td>
            <td width="330"><input type="text" size="50"  /></td>
			<td width="99" align="right">Major:</td>
            <td width="145"><input type="text" size="20"  /></td>
		</tr>	
	</table>
	
	<table width="676">
		<tr>
			<td width="86" align="right"></td>
            <td width="578">Dates Attended</td>
		</tr>
	</table>
	
	<table width="676">
		<tr>
			<td width="82" align="right">Date From:</td>
            <td width="243"><input type="date"  /></td>
			<td width="186" align="right">No. of Years Completed:</td>
            <td width="145"><input type="text" size="20"  /></td>
		</tr>
		<tr>
			<td width="82" align="right">Date To:</td>
            <td width="243"><input type="date"  /></td>
			<td width="186" align="right">Scholastic Standing:</td>
            <td width="145"><input type="text" size="20"  /></td>
		</tr>
	</table>
	
	
	<table><tr><td height="20"></td></tr>
	<tr><td><font color="#990000">Tertiary</font></td></tr></table>
	<hr size="1" width="700" align="left" />
	
	<table width="676">
		<tr>
			<td width="82" align="right">Name:</td>
          <td width="330"><input type="text" size="50"  /></td>
			<td width="99" align="right">Degree:</td>
          <td width="145"><input type="text" size="20"  /></td>
		</tr>
		<tr>
			<td width="82" align="right">Location:</td>
            <td width="330"><input type="text" size="50"  /></td>
			<td width="99" align="right">Major:</td>
            <td width="145"><input type="text" size="20"  /></td>
		</tr>	
	</table>
	
	<table width="676">
		<tr>
			<td width="86" align="right"></td>
            <td width="578">Dates Attended</td>
		</tr>
	</table>
	
	<table width="676">
		<tr>
			<td width="82" align="right">Date From:</td>
            <td width="243"><input type="date"  /></td>
			<td width="186" align="right">No. of Years Completed:</td>
            <td width="145"><input type="text" size="20"  /></td>
		</tr>
		<tr>
			<td width="82" align="right">Date To:</td>
            <td width="243"><input type="date"  /></td>
			<td width="186" align="right">Scholastic Standing:</td>
            <td width="145"><input type="text" size="20"  /></td>
		</tr>
	</table>
	
	
	<table><tr><td height="20"></td></tr>
	<tr><td><font color="#990000">Graduate</font></td></tr></table>
	<hr size="1" width="700" align="left" />
	
	<table width="676">
		<tr>
			<td width="82" align="right">Name:</td>
          <td width="330"><input type="text" size="50"  /></td>
			<td width="99" align="right">Degree:</td>
          <td width="145"><input type="text" size="20"  /></td>
		</tr>
		<tr>
			<td width="82" align="right">Location:</td>
            <td width="330"><input type="text" size="50"  /></td>
			<td width="99" align="right">Major:</td>
            <td width="145"><input type="text" size="20"  /></td>
		</tr>	
	</table>
	
	<table width="676">
		<tr>
			<td width="86" align="right"></td>
            <td width="578">Dates Attended</td>
		</tr>
	</table>
	
	<table width="676">
		<tr>
			<td width="82" align="right">Date From:</td>
            <td width="243"><input type="date"  /></td>
			<td width="186" align="right">No. of Years Completed:</td>
            <td width="145"><input type="text" size="20"  /></td>
		</tr>
		<tr>
			<td width="82" align="right">Date To:</td>
            <td width="243"><input type="date"  /></td>
			<td width="186" align="right">Scholastic Standing:</td>
            <td width="145"><input type="text" size="20"  /></td>
		</tr>
	</table>
	
	
	<table><tr><td height="20"></td></tr>
	<tr><td><font color="#990000">Post Graduate</font></td></tr></table>
	<hr size="1" width="700" align="left" />
	
	<table width="676">
		<tr>
			<td width="82" align="right">Name:</td>
          <td width="330"><input type="text" size="50"  /></td>
			<td width="99" align="right">Degree:</td>
          <td width="145"><input type="text" size="20"  /></td>
		</tr>
		<tr>
			<td width="82" align="right">Location:</td>
            <td width="330"><input type="text" size="50"  /></td>
			<td width="99" align="right">Major:</td>
            <td width="145"><input type="text" size="20"  /></td>
		</tr>	
	</table>
	
	<table width="676">
		<tr>
			<td width="86" align="right"></td>
            <td width="578">Dates Attended</td>
		</tr>
	</table>
	
	<table width="676">
		<tr>
			<td width="82" align="right">Date From:</td>
            <td width="243"><input type="date"  /></td>
			<td width="186" align="right">No. of Years Completed:</td>
            <td width="145"><input type="text" size="20"  /></td>
		</tr>
		<tr>
			<td width="82" align="right">Date To:</td>
            <td width="243"><input type="date"  /></td>
			<td width="186" align="right">Scholastic Standing:</td>
            <td width="145"><input type="text" size="20"  /></td>
		</tr>
	</table>
	
	<table><tr><td height="20"></td></tr>
	<tr><td>Scholastic Honors and Extracurricular Activities</td></tr>
	<tr><td><input type="text" size="102"  /></td></tr></table>
	
	<table><tr><td>List Extra Curricular Activities with Offices held since High School</td></tr>
	<tr><td><input type="text" size="102"  /></td></tr></table>
	
	<table><tr><td>Hobbies and Outside Interest (Including Civic Activities)</td></tr>
	<tr><td><input type="text" size="102"  /></td></tr></table>
	
	<hr size="1" width="700" align="left" />
	
	
	<table><tr><td height="20"></td></tr>
	<tr><td><font color="#990000">Military</font></td></tr></table>
	<hr size="1" width="700" align="left" />
	
	<table width="679">
		<tr>
		  <td width="146" align="right">Did you take ROTC?:</td>
          <td width="104"><select><option value="YES">Yes</option><option value="NO">No</option></select></td>
		  <td width="171" align="right">Are you a Reserve Officer?:</td>
          <td width="104"><select><option value="YES">Yes</option><option value="NO">No</option></select></td>
		  <td width="130"><select><option value="Ready">Ready</option><option value="Standby">Stand By</option><option value="Inactive">Inactive</option></select></td>
		</tr>
    </table>
	
	
	<table width="679">
		<tr>
		  <td width="146" align="right">From:</td>
          <td width="146"><input type="date" /></td>
		  <td width="128" align="right">Branch of Service:</td>
          <td width="239"><input type="text" size="20"  /></td>
		</tr>
		
		<tr>
		  <td width="146" align="right">To:</td>
          <td width="146"><input type="date" /></td>
		  <td width="128" align="right">Rate or Rank:</td>
          <td width="239"><input type="text" size="20"  /></td>
		</tr>
    </table>
	
	<table><tr><td>What Kind of Duty (especially if professional in nature)</td></tr>
	<tr><td><input type="text" size="102"  /></td></tr></table>
	
	<hr size="1" width="700" align="left" />
	
	

</body>
</html>
