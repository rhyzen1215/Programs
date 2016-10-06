<?php
	
	include 'DBConnect.php';
	if ($DBCheck == false){ echo "Error";}
	$userChck = "0";
	
	if (isset($_REQUEST['user'])){
	$userlog =$_REQUEST['user'];
	$userpass =$_REQUEST['pass'];
	$userlog = base64_decode($userlog);
	$userpass = base64_decode($userpass);
	}else{
	echo '<script>';
	echo 'document.location.href="login.html";';
	echo '</script>';
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="cssStyle.css">
<link href="_styles_ie.css" rel="stylesheet" type="text/css"/>
<title>Queenbank</title>
</head>
<style type="text/css">

a:link {
    text-decoration: none;
}

input [type=text] {
	font-family: "Century Gothic";
	font-size: 12px;
	}
	
.fontID1 {
	font-family: "Century Gothic";
	font-size: 12px;
	font-weight: bold;
	}
	
.fontID2 {
	font-family: "Century Gothic";
	font-size: 16px;
	font-weight: bold;
	}
	
</style>
<body>
	
	<div id="header" class="fontID2">
	<table width="100%" cellpadding="0" cellspacing="0">
        <tr>
			<td width="400"><div class="fontID2"><font color="#000099">Queen City Development Bank</font></div></td>
			<td width="100" align="right"><div class="fontID1">Currently logged: <font color="#0000FF"><?Php echo $userlog; ?></font></div></td>
			<td width="150" align="right"><div class="fontID1"><?Php echo date("l F. d, Y"); ?> </div></td>
			<td align="right" width="50"><div class="fontID1"><a href="login.html">Log Out</a></div></td>
		</tr>
	</table>
	</div>
	
	<div id="left-sidebar">
		<iframe src="sidebar.php" width="253" height="700" scrolling="auto" name="iframe1"></iframe>
	</div>
		
		<div>
		
	
		<table>
		
		<tr>
			<td width="30" height="30"></td>
			<td></div></td>
		</tr>
		
		<tr>
			<td width="30"></td>
			<td><div class="fontID1"><a href="EmployeeList.php" target="iframe" onclick="disableclick(e)">Employee List</a></div></td>
		</tr>
		
		<tr>
			<td width="30"></td>
			<td><div class="fontID1"><a href="EmployeeRecord.php" target="iframe" onclick="disableclick(e)">Employee Record</a></div></td>
		</tr>
		
		<tr>
			<td width="30"></td>
			<td><div class="fontID1"><a href="ProcessDTR.php" target="iframe" onclick="disableclick(e)">Daily Time Record</a></div></td>
		</tr>
		
		<tr>
			<td width="30"></td>
			<td><div class="fontID1"><a href="CheckRecords.php" target="iframe" onclick="disableclick(e)">DTR View</a></div></td>
		</tr>
		
		<tr>
			<td width="30"></td>
			<td><div class="fontID1"><a href="EmployeeSchedule.php" target="iframe" onclick="disableclick(e)">Schedules</a></div></td>
		</tr>
		
		</table> 
	</div>

	<div id="main_body">
		<iframe src="http://www.queenbank.com.ph" width="800" height="700" scrolling="auto" name="iframe">
	</div>

</body>
</html>

