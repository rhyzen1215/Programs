<?Php
	
	
	$LogDate="";
	
	if (isset($_REQUEST['LogIn'])){
		
		include 'DBCon.php';
		
		$User =  $_REQUEST['user'];
		$Pass = $_REQUEST['password'];
		
		if (($User == "") || ($Pass == "")){
		echo '<script>';
		echo 'document.location.href="login.php";';
		echo '</script>';
		}
		else
		{
		
		$User = base64_encode($User);
		$Pass = base64_encode($Pass);
		
		$sql = "Select * From Users where username = '".$User."' and password = '".$Pass."'";
		$rs = odbc_exec($conn,$sql) or die("Error in query");	
			if (odbc_fetch_row($rs)) {
			
			date_default_timezone_set("Asia/Taipei");
			$LogDate=date("m/d/Y h:i:s A");
			$sql2="UPDATE USERS  SET LASTLOGIN = '".$LogDate."' where USERNAME = '".$User."'";
			$rs2=odbc_exec($conn,$sql2) or die("Error in query");	
			
			echo '<script>';
			echo 'document.location.href="home.php?user='.$User.'&pass='.$Pass.'&pTitle=&sTitle=";';
			echo '</script>';
			
			}else {
			echo '<script>';
			echo 'document.location.href="login.php";';
			echo '</script>';
			}
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
	
	input[type="Submit"] {
	width: 60px;
	margin-left:2px;
	border-bottom-width:medium;
	border-spacing:inherit;
	padding: 3px;
	padding-left:5px;
	font-weight:bold;
	border:solid 1px #0000FF;
	}
	
	input[type="Reset"] {
	width: 60px;
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

	</style>
<body>
	
	<div id="container">
	
		<div id="header">
			<div id="topheader"><div id="headermenu"> |
								<a href="login.php" class="a_menu">HOME</a> |
								<a href="register.php" class="a_menu">REGISTER</a> |
								<a href="login.php" class="a_menu">LOG IN</a> |
								<font color="#999999"><strong>LOG OUT</strong></font> |
								</div></div>
			<div id="midheader">
			</div>
		</div>
		
		
		
		<div id="centernav">
   			<div id="dropnav" align="center">
        		<ul>
        			
            		 <li id="main" class="mainleft">
                     <a href="#">CASA PRODUCTS</a> 
                            <ul id="subnav">
                                 
                            </ul>            
                     </li>
					 
					 <li id="mainMiddle">|</li>

                    <li id="main">
                    <a href="#">LOAN PRODUCTS</a>
                        <ul id="subnav">
                              	 
                        </ul>            
                    </li>
        
					<li id="mainMiddle">|</li>
					
                    <li id="main">
                    <a href="#">BRANCHES</a>
                        <ul id="subnav">
								  
                        </ul>            
                    </li>
					
					<li id="mainMiddle">|</li>
					
					<li id="main">
                    <a href="#">DEPARTMENTS</a>
                        <ul id="subnav">
          	
                        </ul>            
                    </li>
					
					<li id="mainMiddle">|</li>
					
					<li id="main">
                    <a href="#">OTHERS</a>
                        <ul id="subnav">
								 
                        </ul>            
                    </li>
					
					<li id="mainMiddle">|</li>
					
					<li id="main">
                    <a href="#">MAINTENANCE</a>
                        <ul id="subnav">
                              
                        </ul>            
                    </li>
                    
                   

       			</ul>    
    		</div>
		</div>
		
	
		<div id="conbody" align="center">
			<form name="submitform">
			<table>
				<tr height="100">
				</tr>
				
				<tr>
					<td align="right"><strong>Username:</strong></td>
					<td><input type="text" value="" name="user" required/></td>
				</tr>
				<tr>
					<td align="right"><strong>Password:</strong></td>
					<td><input type="password" value="" name="password" required/></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="Reset" value="Reset" name="Reset" />
						<input type="Submit" value="Log In" name="LogIn" /></td>
				</tr>
			</table>
			</form>
		</div>
	</div>

</body>
</html>

