


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<style type="text/css">
myStyle1 {
	font-size: 14px;
	font-weight: bold;
	font-family: "Century Gothic";
	text-align:center;
}
.style1 {
	font-family: "Century Gothic";
	color: #0000CC;
}
</style>

</head>

<body>

<?php
	
		if (strlen($_POST['sequenceno'])==0)
		{
		include 'EmployeeCompanyFetch.php';
		exit;
		}
		
		include 'connect.php';
		$EN = $_REQUEST['EmpNo'];
		$selBranch = $_REQUEST['selectBranch'];
		$comID = $_REQUEST['companyCode'];
		$companyCode = $_REQUEST['companyCode'];
		$station1 = $_REQUEST['selectBranch'];
		$seqnum = $_REQUEST['sequenceno'];
		$lname1 = $_REQUEST['lname'];
		$fname1 = $_REQUEST['fname'];
		$mname1 = $_REQUEST['mname'];
		$suffix1 = $_REQUEST['Suffix'];
		$gender1 = $_REQUEST['gender'];
		$status1 = $_REQUEST['status'];
		$bday1 = $_REQUEST['bday'];
		$bplace1 = $_REQUEST['Bplace'];
		$religion1 = $_REQUEST['Rel'];
		$citizenship1 = $_REQUEST['Cit'];
		$height1 = $_REQUEST['Height'];
		$weight1 = $_REQUEST['Weight'];
		$homeadd1 = $_REQUEST['HAdd'];
		$homepcode1 = $_REQUEST['HPCode'];
		$hometelno1 = $_REQUEST['HTNum'];
		$presentadd1 = $_REQUEST['PAdd'];
		$presentpcode1 = $_REQUEST['PPCode'];
		$presenttelno1 = $_REQUEST['PTNum'];
		$tin1 = $_REQUEST['Tin'];
		$sss1 = $_REQUEST['SSS'];
		$hdmf1 = $_REQUEST['HDMF'];
		$philhealth1 = $_REQUEST['PhilHealth'];
	
		if (isset($_REQUEST['Overtime']))
			{
			$Over = 1;
			}
		else
			{
			$Over = 0;
			}
		
	
		$query="UPDATE Employee Set employeeno='$seqnum', firstname = '$fname1', middlename='$mname1', lastname='$lname1', suffix='$suffix1', gender='$gender1', status='$status1', birthday='$bday1', birthplace='$bplace1', religion='$religion1', citizenship='$citizenship1', height='$height1', weight='$weight1', homeadd='$homeadd1', homePCode='$homepcode1', homeTelno='$hometelno1', presentAdd='$presentadd1', presentPCode='$presentpcode1', presentTelno='$presenttelno1', tin='$tin1', sss='$sss1', hdmf='$hdmf1', philhealth='$philhealth1', station='$station1' , Overtime='$Over' where sequenceno = '$EN'";
		$result=odbc_exec($conn,$query) or die("Error in query");
		
?>
<table width="693" border="0">
  <tr>
    <th width="687" scope="col"><span class="style1">Record Successfully Updated</span></th>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>

<?Php
include 'EmployeeCompanyFetch.php';
?>
<label></label>


</body>
</html>

