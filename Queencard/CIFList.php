<?Php
 include 'CIFconnect.php';

$BranchCode = $_REQUEST['BranchCode'];
$BrCount = $_REQUEST['BrCount'];

$sql="SELECT * FROM Branch WHERE BranchCode = '".$BranchCode."'";
$rs=odbc_exec($conn,$sql);
$BranchName = odbc_result($rs,"BranchName");
$Cntr =0;
$Gender="";
	
	echo ('<style type="text/css">');
	

	
	echo ('table {');
	echo ('border: 1px solid black; border-collapse: collapse;}');
	
	echo ('#Header {');
	echo ('font-family:"Century Gothic";');
	echo ('font-size:14px;');
	echo ('font-weight: bold;');
	echo ('display: block;');
    echo ('overflow: auto;'); 
	echo ('margin: 2px;}');
	
	echo ('#onData {');
	echo ('font-family:"Century Gothic";');
	echo ('font-size:14px;');
	echo ('font-weight: normal;');
	echo ('border-spacing:inherit;');
	echo ('padding-left: 2px;');  
	echo ('margin: 2px;}');
	
	echo ('</style>');
	
		echo ('<table border="1">');
		echo ('<tr>');
		echo ('<td width="50" align="center" id="Header">Count</td>');
		echo ('<td width="120" align="center" id="Header">Acc. Number</td>');
		echo ('<td align="center" id="Header">Corporate Name</td>');
		echo ('<td width="160" align="center" id="Header">Lastname</td>');
		echo ('<td width="160" align="center" id="Header">Firstname</td>');
		echo ('<td width="160" align="center" id="Header">Middlename</td>');
		echo ('<td width="100" align="center" id="Header">Gender</td>');
		echo ('<td width="100" align="center" id="Header">Birthday</td>');
		echo ('</tr>');
	
	$sql1="SELECT * FROM CIF_UPLOAD where BranchCode = '".$BranchCode."' order by lastname";
	$rs1=odbc_exec($conn,$sql1);
	$cnt = 1;
	while (odbc_fetch_row($rs1))
	{
	
		$Gender = odbc_result($rs1,"gender");
		$date  = substr(odbc_result($rs1,"birthday"),0,10);
		$date=date('m/d/Y', strtotime($date));
		if ($Gender == "M") { $Gender = "MALE";}
		elseif ($Gender == "F") { $Gender = "FEMALE";}
		
		echo ('<tr>');
		echo ('<td width="50" align="center" id="onData">'.$cnt.'</td>');
		echo ('<td width="120" align="center" id="onData">'.odbc_result($rs1,"ACCOUNTCODE").'</td>');
		echo ('<td id="onData">'.odbc_result($rs1,"corporatename").'</td>');
		echo ('<td width="160" id="onData">'.odbc_result($rs1,"lastname").'</td>');
		echo ('<td width="160" id="onData">'.odbc_result($rs1,"firstname").'</td>');
		echo ('<td width="160" id="onData">'.odbc_result($rs1,"middlename").'</td>');
		echo ('<td width="100" align="center" id="onData">'.$Gender.'</td>');
		echo ('<td width="100" align="center" id="onData">'.$date.'</td>');
		echo ('</tr>');
		$cnt  =$cnt + 1;
	}			
	
	echo ('</table>');		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Branch Customer Information Files</title>
<style type="text/css">
<!--
.style2 {font-size: 12px}

.styleText {text-align:right}
-->


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
