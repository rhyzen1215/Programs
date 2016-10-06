<?php
	
	session_start();
	
	include 'DBConnect.php';
	$_SESSION['logged_in'] = true;
	
	if ($DBCheck == false){ echo "Error";}
	$userChck = 0;
	
		if (isset($_REQUEST['login'])){
		$userlog = $_REQUEST['username'];
		$userpass = $_REQUEST['password'];
		
		$_SESSION['userid'] = $userlog;
		$_SESSION['userpass'] =$userpass;
		
		$userlog = base64_encode($userlog);
		$userpass = base64_encode($userpass);
		
		$sql="SELECT * FROM USERACCOUNT  where USERID = '".$userlog."' and USERPASS = '".$userpass."'";
		$rs=odbc_exec($conn,$sql) or die("Error in query");	
		while (odbc_fetch_row($rs)) {
			$userChck = 1;
			date_default_timezone_set("Asia/Taipei");
			$LogDate=date("m/d/Y h:i:s A");
			$sql1="UPDATE USERACCOUNT  SET LASTLOGIN = '".$LogDate."' where USERID = '".$userlog."' and USERPASS = '".$userpass."'";
			$rs1=odbc_exec($conn,$sql1) or die("Error in query");	
			$userstat = odbc_result($rs,"STATUS");
		
		}
		}
		
		
		
		if ($userChck == 0){
			echo '<script>';
			echo 'document.location.href="index.php";';
			echo '</script>';
		}
		
		if ($userChck == 1){
			
			if ($userstat=="0") {
			echo '<script>';
			echo 'document.location.href="index.php";';
			echo '</script>';
			}
			else {
			echo '<script>';
			echo 'document.location.href="home.php?user='.$userlog.'&pass='.$userpass.'";';
			echo '</script>';
			}
		}
		
?>
