<?Php

	session_start();
	include 'connect.php';
	
	$usrpass = "";
	$newpss = "";	
	$oldpss = "";
	$usrid = "";
	$chk = "";
	$cnfrm = "";
		
	if (isset($_REQUEST['submitpassword'])){
	
		$usrpass = "";
		$oldpass = $_REQUEST['oldpass'];
		$newpass1 = $_REQUEST['newpass1'];
		$newpass2 = $_REQUEST['newpass2'];
		
		$sql="Select *  From Officers WHERE Password = '".$oldpass."'";
		$rs=odbc_exec($conn,$sql) or die("Error in query");	
		while (odbc_fetch_row($rs))
			{$usrpass = $oldpass;}
				
		if ($newpass1 != $newpass2) {
			$newpss = "Passwords do not match!";
			$chk = "1";
		}
		
		if (($newpass1 == "") || ($newpass2 == "")) {
			$newpss = "Passwords should not be empty!";
			$chk = "1";
		}
		
		if (($usrpass != $oldpass) || ($oldpass == "")) {
			$oldpss = "Old password do not match!";
			$chk = "1";
		}
		
		
		if  ($chk != "1") {
		
				$sql="UPDATE Officers SET PASSWORD = '".$newpass1."' WHERE PASSWORD = '".$oldpass."'";
				$rs=odbc_exec($conn,$sql) or die("Error in query");	
				$cnfrm = "Password Change. Please login again.";
		}
		
		
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<style type="text/css">

	td {
		font-family:"Century Gothic";
		font-size:12px;
		font-weight:bold;
	}

</style>

<body>

	<form name="formSbmt">
	<table width="829">
		<tr>
			<td width="114" align="right"></td>
			<td width="78"></td>
			<td width="621"></td>
		</tr>
		
		<tr>
		  <td width="114" align="right">Old Password:</td>
		  <td width="78"><input type="password" name="oldpass" size="13" /></td>
		  <td>
		  	<?Php
				if ($oldpss != "") { echo $oldpss; }
			?>
		  </td>
		</tr>
		<tr>
			<td align="right">New Password:</td>
			<td><input type="password" name="newpass1" size="13" /></td>
			<td>
		  	<?Php
				if ($newpss != "") { echo $newpss; }
			?>
		  </td>
		</tr>
		<tr>
			<td align="right">Confirm Password:</td>
			<td><input type="password" name="newpass2" size="13" /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submitpassword" size="13" value="Change" onclick="javascript:formSbmt.action='resetpass.php'; formSbmt.method='GET';"/>
			<input type="reset" size="15" value="Reset"/></td>
			<td>
		  	<?Php
				if ($cnfrm != "") { 
					echo $cnfrm;}
			?>
		  	</td>
		</tr>
	</table>
	
	</form>

	
</body>
</html>
