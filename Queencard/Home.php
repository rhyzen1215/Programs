
			<?Php
				session_start();
				include 'connect.php';
				$Muser = $_REQUEST['user'];
				$MPassword = $_REQUEST['password'];
				$Check = 0;
				
				setcookie("LogInUser","",time(),"/Queencard");
				
				$sql0="SELECT * FROM Users WHERE username = '".$Muser."' and password = '".$MPassword."'";
				$rs0=odbc_exec($conn,$sql0);
				$rowcnt = odbc_num_rows($rs0);
				$LogInName = odbc_result($rs0,"name");
				
				if ($rowcnt >= 1) {
				
						$sql2="Update Users Set status = '0' WHERE username = '".$Muser."'";
						$rs2=odbc_exec($conn,$sql2);
						$_SESSION['CurUser'] = $Muser;
						
						
					
				}
				else {
						session_start(); //to ensure you are using same session
						session_destroy(); //destroy the session
						header("location:/queencard/home.html"); //to redirect back to "index.php" after logging out
						exit();
						
				}
					
			?>
            


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Queencard Corporation</title>
<link href="webcss.css" rel="stylesheet" type="text/css"/>
<link href="sample.css" rel="stylesheet" type="text/css"/>

<style type="text/css">
<!--
.style10 {
	font-size: 18px;
	font-family: "Century Gothic";
	font-weight: bold;
}
.style13 {font-size: 12px}
-->
</style>
</head>

<body>
	<div id="container">
    	<div id="header">
        </div>
        <!-- Navigation -->
       <div id="centernav">
   			<div id="dropnav">
        		<ul>
                    
                    <li id="main">
                    <a href="logout.php">LOG OUT</a>        
                    </li>
                    
                    <li id="main">
                    <?Php echo $LogInName; ?>     
                    </li>
                    
                    
       			</ul>    
    		</div>
		</div>

         <div id="main_body">
      		
        	<div id="right_body">
            <iframe src="http://www.queenbank.com.ph" width="760" height="700" scrolling="auto" name="iframe2">
           </iframe>
            
         
		 
        	</div>
   	 	 	<div id="left-sidebar">
            
           	 <?Php

			if ($Check == 0)
				{
				echo '<iframe src="sidebar.php" width="253" height="700" scrolling="auto" name="iframe1"></iframe>';
				}
			else 
				{
				echo '<script>';
				echo 'document.location.href="home.html";';
				echo '</script>';
				}
				
			?>
        	</div>
      </div>
        
    </div>
</body>
</html>
