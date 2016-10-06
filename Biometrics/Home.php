<?php
	session_start();
	
	if (empty($_SESSION['logged_in'])) {
		echo '<script>';
		echo 'document.location.href="index.php";';
		echo '</script>';
		exit();
	}
	
	include 'DBConnect.php';
	if ($DBCheck == false){ echo "Error";}
	$userChck = "0";
	$username = "";
	$usrlvl = "";
	
	if (isset($_REQUEST['user'])){
	$userlog =$_REQUEST['user'];
	$userpass =$_REQUEST['pass'];
	//$userlog = base64_decode($userlog);
	//$userpass = base64_decode($userpass);
	
		$sql="SELECT * FROM USERACCOUNT  where USERID = '".$userlog."' and USERPASS = '".$userpass."'";
		$rs=odbc_exec($conn,$sql) or die("Error in query");	
		while (odbc_fetch_row($rs)) {
			$username = odbc_result($rs,"LASTNAME").", ".odbc_result($rs,"FIRSTNAME")." ".odbc_result($rs,"MIDDLENAME");
			$username = strtoupper($username);
			$usrlvl = odbc_result($rs,"USERLVL");
		}
	}else{
	echo '<script>';
	echo 'document.location.href="index.php";';
	echo '</script>';
	}
	
	if ($usrlvl=="") {
	echo '<script>';
	echo 'document.location.href="index.php";';
	echo '</script>';
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="cssStyle2.css">
<link href="_styles_ie.css" rel="stylesheet" type="text/css"/>
<title>Queenbank</title>

<style type="text/css"> 
a {text-decoration:none; color:#CFFCFC; } 
</style>

</head>
<body>
	
	<div id="container">
	
		<div id="headercontainer">
			<div id="header">
				<div id="usermenu">Currently logged: <?Php echo $username; ?> |
					<?Php echo date("l F. d, Y"); ?>
				</div>
			</div>
			<div id="topmenu">
				<div id="menu1">
					<a href="http://www.queenbank.com.ph">HOME</a> |
					<a href="register.php">REGISTER</a> |
					<a href="logout.php">LOG OUT</a>
				</div>
			</div>
		</div>
	
		
		
		
		<div id="sidebar">
			<?php
				if ($usrlvl=="9"){
					echo '<iframe src="sidebar.php" height="700" scrolling="auto" name="iframe1"></iframe>';
				}else {
					echo '<iframe src="sidebarUser.php" height="700" scrolling="auto" name="iframe1"></iframe>';
				}	
		
			?>
		</div>
		
		
		<div id="main">
			<iframe src="http://www.queenbank.com.ph" width="800" height="700" scrolling="auto" name="iframe2"></iframe>
		</div>
		
		
	</div>

</body>
</html>

