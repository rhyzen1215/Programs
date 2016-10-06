	<?Php
		
		include 'DBConnect.php';
		$SearchTxt="";
		
			if (isset($_REQUEST['LookUp'])){
			$SearchTxt = $_REQUEST['txtSearch'];}
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
	width: 190px;
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

<body>
	

	<form name="formSubmitID">
	<table width="950">
		<tr>
			<td height="20"></td>
			<td align="left"></td>
			<td align="left" width="131"></td>
			<td align="left" width="409" ></td>
		</tr>
		<tr>
		  <td align="right" width="80"><div class="txtStyle_head">Search:</div></td>
			<td align="left" width="310"><div class="txtStyle_head"><input type="text" size="50" name="txtSearch" id="txtSearch" value="<?Php echo $SearchTxt; ?>" /></div></td>
		  <td align="left" width="131" ><div class="txtStyle_head"><input type="submit" name="LookUp" value="Find"/>
		  <input type="submit" name="LookUp" value="Print" onclick="javascript: window.print();"/></div></td>
		</tr>
	</table>
	</form>
	
	<table width="950" cellpadding="0" cellspacing="0">
         <tr>
         <td height="50"><div class="txtStyle_head"><hr width=950px size="2" color="#666666" align="left"/></div></td>
         </tr>
		 <tr height="30"></tr>
	</table>


	<form name="formEmployee">
	<table width="950">
		<tr>
		  <td align="center" width="100"><div class="txtStyle"><font color="#990000">Employee No.</font></div></td>
		  <td width="100" align="left"><div class="txtStyle"><font color="#990000">Branch/Dep.</font></div></td>
		  <td width="120" align="left"><div class="txtStyle"><font color="#990000">Lastname</font></div></td>
		  <td width="120" align="left"><div class="txtStyle"><font color="#990000">Firstname</font></div></td>
		  <td width="80" align="left"><div class="txtStyle"><font color="#990000">Middlename</font></div></td>
		  <td width="100" align="left"><div class="txtStyle"><font color="#990000">Schedule</font></div></td>
		</tr>
		
			<?Php 
			$SearctTxt="";
		
			if (isset($_REQUEST['LookUp'])){
			$SearchTxt = $_REQUEST['txtSearch'];

			$sql = "SELECT * FROM EMPLOYEE  where COMPANYNAME2 LIKE '%".$SearchTxt."%' OR LASTNAME LIKE '%".$SearchTxt."%' OR FIRSTNAME LIKE '%".$SearchTxt."%' ORDER BY LASTNAME";
			$rs=odbc_exec($conn,$sql) or die("Error in query");	
			while (odbc_fetch_row($rs)) {
				echo '<tr>';
				echo '<td align="center" width="80"><div class="txtStyle">'.strtoupper(odbc_result($rs,"EMPLOYEEID")).'</div></td>';
		  		echo '<td width="100" align="left"><div class="txtStyle">'.odbc_result($rs,"COMPANYNAME2").'</div></td>';
		  		echo '<td width="120" align="left"><div class="txtStyle">'.strtoupper(odbc_result($rs,"LASTNAME")).'</div></td>';
		  		echo '<td width="120" align="left"><div class="txtStyle">'.strtoupper(odbc_result($rs,"FIRSTNAME")).'</div></td>';
		  		echo '<td width="80" align="left"><div class="txtStyle">'.strtoupper(odbc_result($rs,"MIDDLENAME")).'</div></td>';
		  		echo '<td width="100" align="left"><div class="txtStyle">'.strtoupper(odbc_result($rs,"TIME_SCHEME")).'</div></td>';
				echo '</tr>';
			}
			}
				
			?>
	
		
	</table>
	</form>

	
</body>
</html>
