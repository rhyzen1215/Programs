<?php
		include 'connect.php';

		$DelTC = $_REQUEST['SchemeCode'];
		
		$query1="Select * FROM TimeScheme WHERE SchemeCode = '".$DelTC."'";
		$result1=odbc_exec($conn,$query1) or die("Error in query");
		$Exist = odbc_result($result1,"SchemeName");
		
			
			if (strlen($Exist) != 0)
			{
			echo '<font face="Century Gothic" color="red">Successfully Deleted</font>';
			}
			else
			{echo '<font face="Century Gothic" color="red">Nothing to Deleted</font>';
			}
			
		$query2="DELETE FROM TimeScheme WHERE SchemeCode = '".$DelTC."'";
		$result2=odbc_exec($conn,$query2) or die("Error in query");
		
		
		include 'TimeSchemeFetch.php';
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style2 {font-size: 12px}
-->
select
{
	width: 195px;
	margin-left:2px;
}

input[type=date]
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
.style3 {
	font-size: 14px;
	font-weight: bold;
	font-family: "Century Gothic";
}
.style7 {
	font-family: "Century Gothic";
	font-size: 12px;
	font-weight: bold;
}
</style>
</head>

<body>

 </body>
 </html>    