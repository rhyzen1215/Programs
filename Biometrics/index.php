

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="cssStyle2.css">
<title>Queenbank</title>

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


 <script type="text/JavaScript">
    	function varCrypt(){
      	var cryptFile = document.getElementById('pswrd');
      	cryptFile = window.btoa(cryptFile);
		document.getElementById('pswrd').value = cryptFile;
 </script>
	

</head>
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
	</div>
	
	
	
		

		
		<div id="userPos">
			<table align="center">
				<tr>
				<td height="100"></td>
				<td width="1024">
				<form name="formSubmit" action="login.php">
				<table width="247">
					<tr>
					<td width="95" align="right"><div id="userID">Username:</div></td>
		  			<td width="140"><input type="text" name="username" size="20" value="" /></td>
					</tr>
		
					<tr>
					<td align="right"><div id="userID">Password:</div></td>
					<td><input type="password" name="password" id="pswrd" size="20" value=""  /></td>
					</tr>
		
					<tr>
					<td></td>
					<td><input type="Submit" name="login" id="hoverID" size="20" value="Log In"/>
						<input type="Reset" id="hoverID" size="20" value="Reset"/></td>
					</tr>
				</table>
				</form>
				</td>
			</tr>
			</table>
		
		</div>



</body>
</html>

