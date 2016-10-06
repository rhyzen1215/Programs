<?Php
		
		session_start();
		$_SESSION['logged_in'] = true;
		
		include 'DBCon.php';
		$pageTitle = $_REQUEST['pTitle'];
		$pageSubtitle = $_REQUEST['sTitle'];
		
		$User =  $_REQUEST['user'];
		$Pass = $_REQUEST['pass'];
		
		$sql = "Select * From Users where username = '".$User."' and password = '".$Pass."'";
		$rs = odbc_exec($conn,$sql) or die("Error in query");
		$Name = odbc_result($rs,"lastname").", ".$Name = odbc_result($rs,"firstname");
		$Name = strtoupper($Name);
		$UserStat = odbc_result($rs,"status");
		
		if (isset($_REQUEST['cat'])) {
		$CATID1 = $_REQUEST['cat'];
		$MENUID1 = $_REQUEST['menu'];
		}
		
		if ($User === null) {
		session_start(); //to ensure you are using same session
		session_destroy(); //destroy the session
		header("location:/e-library/login.php"); //to redirect back to "index.php" after logging out
		exit();
		}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="cssStyle2.css">
<link rel="stylesheet" type="text/css" href="sample.css">
<link href="_styles_ie.css" rel="stylesheet" type="text/css"/>
<title>Queenbank</title>
</head>
<body>
	
	<div id="container">
	
		<div id="header">
			<div id="topheader">
					<div id="headeruser"><font color="#660000">Currently Logged: <?Php echo $Name ?></font></div>
					<div id="headermenu">  |
						<a href="home.php?user=<?Php echo $User ?>&pass=<?Php echo $Pass ?>&pTitle=&sTitle=" class="a_menu">HOME</a> |
						<a href="register.php" class="a_menu">REGISTER</a> |
						<font color="#999999"><strong>LOG IN</strong></font> |
						<a href="logout.php" class="a_menu">LOG OUT</a> |
					</div></div>
			<div id="midheader">
					<div id="midheaderEnd" align="right"></div>
					<div id="midheaderTitle" align="left">
						<span id="headerText1"><?Php echo $pageTitle ?></span> <?Php if ($pageSubtitle != "" ) {echo '&nbsp; | &nbsp;';} ?>
						<span id="headerText2"><?Php echo $pageSubtitle ?></span>
					</div>
			</div>
		</div>
		
		
		
		
		
		<div id="centernav">
   			<div id="dropnav" align="center">
        		<ul>
        			
            		 <li id="main" class="mainleft"><a href="#">CASA PRODUCTS</a> 
                          <ul id="subnav">
							<?Php
							$sql = "Select * From MENU where CATID = 'CASA' Order by MENUID";
							$rs = odbc_exec($conn,$sql) or die("Error in query");
							while (odbc_fetch_row($rs)) {
							$SubName = odbc_result($rs,"MENUNAME");
							$CATID = odbc_result($rs,"CATID");
							$MENUID = odbc_result($rs,"MENUID");
								echo '<li><a href="home.php?user='.$User.'&pass='.$Pass.'&pTitle=CASA PRODUCTS&sTitle='.$SubName.'&cat='.$CATID.'&menu='.$MENUID.'">'.$SubName.'</a></li>';		
							}
						    ?>
                            </ul>            
                     </li>
					 
					 <li id="mainMiddle">|</li>

                    <li id="main">
                    <a href="#">LOAN PRODUCTS</a>
                        <ul id="subnav">
                            <?Php
							$sql = "Select * From MENU where CATID = 'LOANS' Order by MENUID";
							$rs = odbc_exec($conn,$sql) or die("Error in query");
							while (odbc_fetch_row($rs)) {
							$SubName = odbc_result($rs,"MENUNAME");
							$CATID = odbc_result($rs,"CATID");
							$MENUID = odbc_result($rs,"MENUID");
								echo '<li><a href="home.php?user='.$User.'&pass='.$Pass.'&pTitle=LOANS PRODUCTS&sTitle='.$SubName.'&cat='.$CATID.'&menu='.$MENUID.'">'.$SubName.'</a></li>';		
							}
						    ?>
						</ul>
                    </li>
        
					<li id="mainMiddle">|</li>
					
                    <li id="main">
                    <a href="#">BRANCHES</a>
                        <ul id="subnav">
							<?Php
							$sql = "Select * From MENU where CATID = 'BRN' order by MENUID";
							$rs = odbc_exec($conn,$sql) or die("Error in query");
							while (odbc_fetch_row($rs)) {
							$SubName = odbc_result($rs,"MENUNAME");
							$CATID = odbc_result($rs,"CATID");
							$MENUID = odbc_result($rs,"MENUID");
								echo '<li><a href="home.php?user='.$User.'&pass='.$Pass.'&pTitle=BRANCHES&sTitle='.$SubName.'&cat='.$CATID.'&menu='.$MENUID.'">'.$SubName.'</a></li>';		
							}
						    ?>
                        </ul>            
                    </li>
					
					<li id="mainMiddle">|</li>
					
					<li id="main">
                    <a href="#">DEPARTMENTS</a>
                        <ul id="subnav"><a href="#"></a>
          					<?Php
							$sql = "Select * From MENU where CATID = 'DEPT' order by MENUID";
							$rs = odbc_exec($conn,$sql) or die("Error in query");
							while (odbc_fetch_row($rs)) {
							$SubName = odbc_result($rs,"MENUNAME");
							$CATID = odbc_result($rs,"CATID");
							$MENUID = odbc_result($rs,"MENUID");
								echo '<li><a href="home.php?user='.$User.'&pass='.$Pass.'&pTitle=DEPARTMENTS&sTitle='.$SubName.'&cat='.$CATID.'&menu='.$MENUID.'">'.$SubName.'</a></li>';		
							}
						    ?>
                        </ul>
             
                    </li>
					
					<li id="mainMiddle">|</li>
					
					<li id="main">
                    <a href="#">OTHERS</a>
                        <ul id="subnav">
                             <?Php
							$sql = "Select * From MENU where CATEGORYNAME = 'OTHERS'";
							$rs = odbc_exec($conn,$sql) or die("Error in query");
							while (odbc_fetch_row($rs)) {
							$SubName = odbc_result($rs,"MENUNAME");
							$CATID = odbc_result($rs,"CATID");
							$MENUID = odbc_result($rs,"MENUID");
								echo '<li><a href="home.php?user='.$User.'&pass='.$Pass.'&pTitle=OTHERS&sTitle='.$SubName.'&cat='.$CATID.'&menu='.$MENUID.'">'.$SubName.'</a></li>';		
							}
						    ?>
                        </ul>            
                    </li>
					
					
					
					<li id="mainMiddle">|</li>
					
					<li id="main">
                    <a href="#">MAINTENANCE</a>
                        <ul id="subnav">
                        <?Php
						if ($UserStat=="1") {
						echo '<li><a href="new.php" target="iframe2">NEW DOCUMENT</a></li>';
						echo '<li><a href="edit.php" target="iframe2">EDIT DOCUMENT</a></li>';	
						}	
						    ?>
                        </ul>            
                    </li>

       			</ul>    
    		</div>
		</div>
		
		
		
		
	
		<div id="conbody">
		
			<div id="sidebar">
			<iframe src="<?Php if ($pageTitle == "") { echo 'sidebar1.php'; } else {echo 'sidebar2.php?cat='.$CATID1.'&menu='.$MENUID1.''; } ?>" width="300" height="525" name="iframe1" ></iframe>
			</div>
			
			<div id="mainbody">
				<div id="UpperBody"></div>
				<div id="MiddleBody"><iframe src="" width="830" height="500" scrolling="auto" name="iframe2"></iframe></div>
				<div id="LowerBody"></div>
			</div>
		</div>
	</div>

</body>
</html>

<!--else {echo 'sidebar2.php?&pTitle=CASA PRODUCTS&sTitle='.$SubName.'&cat='.$CATID.'&menu='.$MENUID.''; }
