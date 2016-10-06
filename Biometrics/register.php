<?Php
	
	session_start(); //to ensure you are using same session
	session_destroy(); //destroy the session

	$Confirm = "";
	$Fname = "";
	$Mname = "";
	$Lname = "";
	$Branch = "";
	$User = "";
	$EmpNo = "";
	
	if (isset($_REQUEST['confirm'])){
		$EmpNo = $_REQUEST['EmpNo'];
		$Confirm = $_REQUEST['confirm'];
		$Fname = $_REQUEST['fname'];
		$Mname = $_REQUEST['mname'];
		$Lname = $_REQUEST['lname'];
		$Branch = $_REQUEST['branch'];
		$User = $_REQUEST['user'];
		$User = base64_decode($User);
		
		if ($Confirm  == "Confirm") {
			$Fname = "";
			$Mname = "";
			$Lname = "";
			$Branch = "";
			$User = "";
			$EmpNo = "";
		}
	}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="cssStyle2.css">
<link rel="stylesheet" type="text/css" href="sample.css">
<title>Queenbank</title>
</head>
	<style type="text/css">
	 a {text-decoration:none; color:#CFFCFC;
	 	font-family:"Century Gothic";
		font-size:12px;
	 }
	 #userID {
	 font-family:"Century Gothic";
	 font-size:12px;
	 font-weight:bold;
	 
	 }
	 
	 #userPos {
	 	width:100%;
	 	float:right;
	 }
</style>

	<style type="text/css">
	
	input[type="Submit"] {
	width: 70px;
	margin-left:2px;
	border-bottom-width:medium;
	border-spacing:inherit;
	padding: 3px;
	padding-left:5px;
	font-weight:bold;
	border:solid 1px #0000FF;
	}
	
	input[type="Reset"] {
	width: 49px;
	margin-left:2px;
	border-bottom-width:medium;
	border-spacing:inherit;
	padding: 3px;
	padding-left:5px;
	font-weight:bold;
	border:solid 1px #0000FF;
	}

	input[type="text"] {
	display:block;
	width: 115px;
	margin-left:2px;
	border-bottom-width:medium;
	border-spacing:inherit;
	padding: 3px;
	padding-left:5px;
	font-weight:bold;
	border:solid 1px #0000FF;
	}
	
	input[type="Submit"]:hover { background-color:#00FFFF; }
	input[type="Submit"]:focus { background-color:#00FFFF; }
	input[type="Reset"]:hover { background-color:#00FFFF; }
	input[type="Reset"]:focus { background-color:#00FFFF; }
	input[type="text"]:focus { background-color:#FFFF99; }
	input[type="password"]:focus { background-color:#FFFF99; }
	
	input[type=password]
	{
	display:block;
	width: 115px;
	margin-left:2px;
	border-bottom-width:medium;
	border-spacing:inherit;
	padding: 3px;
	padding-left:5px;
	font-weight:bold;
	border:solid 1px #0000FF;
	}
	
	#Register {
		
		font-size:14px;
		font-weight:bolder;
		font-family:"Century Gothic";
		color:#000099;
	}
	
	#subText {
		
		font-size:12px;
		font-family:"Century Gothic";
	}

	</style>
<body>
	
	<div id="container">
	
		<div id="headercontainer">
			<div id="header"></div>
			
			<div id="topmenu">
				<div id="menu1">
					<a href="http://www.queenbank.com.ph">HOME</a> |
					<a href="register.php">REGISTER</a> |
					<a href="index.php">LOG IN</a>
				</div>
			</div>
		</div>
		
		
	
		
	
		<div id="conbody">
			<form name="submitform">
			<table height="332">
				<tr height="50">
				</tr>
				
				<tr id="Register">
					<td width="50"></td>
					<td align="right">Register</td>
					<td align="center"></td>
					<td></td>
				</tr>
				
				<tr height="40">
				</tr>
				
				<hr width=200px size="2" color="#333333" align="left"/>
				
				<tr>
					<td width="50"></td>
					<td align="right" id="subText"><strong>Employee No.:</strong></td>
					<td><input type="text" value="<?Php echo $EmpNo ?>" name="EmpNo" required/></td>
				</tr>
				
				<tr>
					<td width="50"></td>
					<td align="right" id="subText"><strong>Firstname:</strong></td>
					<td><input type="text" value="<?Php echo $Fname ?>" name="firstname" required/></td>
				</tr>
				<tr>
					<td width="50"></td>
					<td align="right" id="subText"><strong>Lastname:</strong></td>
					<td><input type="text" value="<?Php echo $Lname ?>" name="lastname" required/></td>
				</tr>
				
				<tr>
					<td width="50"></td>
					<td align="right" id="subText"><strong>Middlename:</strong></td>
					<td><input type="text" value="<?Php echo $Mname ?>" name="middlename" required/></td>
				</tr>
				
				<tr>
					<td width="50"></td>
					<td align="right" id="subText"><strong>Branch/Dept.:</strong></td>
					<td><input type="text" value="<?Php echo $Branch ?>" name="branch" required/></td>
				</tr>
				
				<tr>
					<td height="20"></td>
					<td></td>
					<td></td>
				</tr>
				
				<tr>
					<td width="50"></td>
					<td align="right" id="subText"><strong>Username:</strong></td>
					<td><input type="text" value="<?Php echo $User ?>" name="user" required/></td>
					<td align="left" id="subText"><font color="#FF0000" size="2"><strong><?Php	if ($Confirm == "Exist") { echo 'User already Exist!';} ?></strong></font></td>
				</tr>
				
				<tr>
					<td width="50"></td>
					<td align="right" id="subText"><strong>Password:</strong></td>
					<td><input type="password" value="" name="password1" required/></td>
				</tr>
				
				<tr>
					<td width="50"></td>
					<td align="right" id="subText"><strong>Confirm Password:</strong></td>
					<td><input type="password" value="" name="password2" required/></td>
					<td align="left" id="subText"><font color="#FF0000" size="2"><strong><?Php	if ($Confirm == "Password") { echo 'Passwords do not match!';} ?></strong></font></td>
				</tr>
				
				<tr>
					<td height="10"></td>
					<td></td>
					<td></td>
				</tr>
				
				<tr>
					<td></td>
					<td></td>
					<td><input type="Reset" value="Reset" name="Reset" />
					<input type="Submit" value="Register" name="register" onclick="javascript: submitform.action='register2.php'; submitform.method='GET';"/></td>
				</tr>
			</table>
			</form>
			
			
			
			<table>
			<tr height="80">
				<td width="50"></td>
				<td id="subText"><strong>
				<?Php	
					if ($Confirm == "Confirm") {
						echo 'Registration Successful. Please contact the Human Resource Group for the activation of your account. Thank you!';	
					}
				?>
				</strong></td>
				</tr>
			</table>
		</div>
	</div>

</body>
</html>

