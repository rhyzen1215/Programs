<?Php
 session_start();
 include 'DBConnect.php';
 
 	if (isset($_REQUEST['btnEdit'])){
		$usrId = $_REQUEST['userID'];
		$sql1="UPDATE USERACCOUNT SET STATUS = '1' where USERID = '".$usrId."'";
		$rs1=odbc_exec($conn,$sql1);
	}
 
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Branch Customer Information File</title>
<style type="text/css">
<!--

	
#editCIF {
	border: 0px solid black; border-collapse: collapse;
	font-family:'Century Gothic';
	font-size:12px;
	font-weight: bold;
	padding-left: 0px; 
	margin: 0px;}
	
#mheader {
	border: 0px solid black; border-collapse: collapse;
	font-family:'Century Gothic';
	font-size:14px;
	font-weight: bold;
	border-spacing:inherit;
	padding-left: 2px; 
	margin: 2px;}
	
td {
	font-family:"Century Gothic";
	font-size:12px;
	width: 200px;
	}	
	
th {
	font-family:"Century Gothic";
	font-size:12px;
	font-weight:bolder;
	width: 200px;
	}

</style>


</head>

<body>
          
	<table>
		<tr align="left">
			<th>Lastname</th>
			<th>Firstname</th>
			<th>Middlename</th>
			<th>Branch/Dept</th>
			<th>Date Registered</th>
		</tr>

      
			
		<?Php
		
		$sql1="SELECT * FROM USERACCOUNT where STATUS = '0'";
		$rs1=odbc_exec($conn,$sql1);
		while (odbc_fetch_row($rs1))
		{
			
			$userdate = odbc_result($rs1,"dateregistered");
			$userdate = date_create($userdate);
			$userdate = date_format($userdate,"m/d/Y h:i:s A");

			echo ('<form name="EditCIF">');
			echo ('<tr>');
			echo ('<td id="onData">'.odbc_result($rs1,"lastname").'</td>');
			echo ('<td id="onData">'.odbc_result($rs1,"firstname").'</td>');
			echo ('<td id="onData">'.odbc_result($rs1,"middlename").'</td>');
			echo ('<td id="onData">'.odbc_result($rs1,"branch").'</td>');
			echo ('<td id="onData">'.$userdate.'</td>');
			echo ('<td align="center" id="onData"><input name="btnEdit" type="submit" onclick="javascript: EditCIF.action=updateuser.php; EditCIF.method=GET;" value="Edit" />');
			echo ('<input name="userID" type="hidden"  size="30" value="'.odbc_result($rs1,"USERID").'" required />');
			echo ('</tr>');
			echo ('</form>');
		}			
		
	?>

	</table>
</body>
</html>