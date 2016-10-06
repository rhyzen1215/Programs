<?Php
		
		include 'DBCon.php';
		
		$pageTitle = $_REQUEST['pTitle'];
		$pageSubtitle = $_REQUEST['sTitle'];
		
		$User =  $_REQUEST['user'];
		$Pass = $_REQUEST['pass'];
		$sql = "Select * From Users where username = '".$User."' and password = '".$Pass."'";
		$rs = odbc_exec($conn,$sql) or die("Error in query");
		$Name = odbc_result($rs,"lastname").", ".$Name = odbc_result($rs,"firstname");
		$Name = strtoupper($Name);
		
		
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
						<a href="login.php" class="a_menu">LOG OUT</a> |
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
        			
            		 <li id="main" class="mainleft">
                     <a href="#">CASA PRODUCTS</a> 
                            <ul id="subnav">
								
								<?Php
									
									$sql="Select * FRom SubCategory where category = 'CASA PRODUCTS'";
									$rs = odbc_exec($conn,$sql) or die("Error in query");
									while (odbc_fetch_row($rs)) {
									echo '<li><a href="home.php?user=<?Php echo $User ?>&pass=<?Php echo $Pass ?>&pTitle=CASA PRODUCTS&sTitle=Savings Account">SAVINGS ACCOUNT</a></li>';
									}
								
								?>
								
                                  <li><a href="home.php?user=<?Php echo $User ?>&pass=<?Php echo $Pass ?>&pTitle=CASA PRODUCTS&sTitle=Savings Account">SAVINGS ACCOUNT</a></li>
                                  <li><a href="home.php?user=<?Php echo $User ?>&pass=<?Php echo $Pass ?>&pTitle=CASA PRODUCTS&sTitle=Current Account">CURRENT ACCOUNT</a></li>
								  <li><a href="home.php?user=<?Php echo $User ?>&pass=<?Php echo $Pass ?>&pTitle=CASA PRODUCTS&sTitle=Payroll Account">PAYROLL ACCOUNT</a></li>
                                  <li><a href="home.php?user=<?Php echo $User ?>&pass=<?Php echo $Pass ?>&pTitle=CASA PRODUCTS&sTitle=Time Deposit">TIME DEPOSIT</a></li>
								  <li><a href="home.php?user=<?Php echo $User ?>&pass=<?Php echo $Pass ?>&pTitle=CASA PRODUCTS&sTitle=Dollar Time Deposit">DOLLAR TIME DEPOSIT</a></li>
								  <li><a href="home.php?user=<?Php echo $User ?>&pass=<?Php echo $Pass ?>&pTitle=CASA PRODUCTS&sTitle=Certified Gold">CERTIFIED GOLD</a></li>
                            </ul>            
                     </li>
					 
					 <li id="mainMiddle">|</li>

                    <li id="main">
                    <a href="#">LOAN PRODUCTS</a>
                        <ul id="subnav">
                              	  <li><a href="home.php?user=<?Php echo $User ?>&pass=<?Php echo $Pass ?>&pTitle=LOAN PRODUCTS&sTitle=Salary Loan">SALARY LOAN</a></li>
                                  <li><a href="home.php?user=<?Php echo $User ?>&pass=<?Php echo $Pass ?>&pTitle=LOAN PRODUCTS&sTitle=Multi-Purpose Loan">MULTI-PURPOSE LOAN</a></li>
								  <li><a href="home.php?user=<?Php echo $User ?>&pass=<?Php echo $Pass ?>&pTitle=LOAN PRODUCTS&sTitle=Housing Loan">HOUSING LOAN</a></li>
                                  <li><a href="home.php?user=<?Php echo $User ?>&pass=<?Php echo $Pass ?>&pTitle=LOAN PRODUCTS&sTitle=Car Loan">CAR LOAN</a></li>
								  <li><a href="home.php?user=<?Php echo $User ?>&pass=<?Php echo $Pass ?>&pTitle=LOAN PRODUCTS&sTitle=Commercial Loan">COMMERCIAL LOAN</a></li>
                        </ul>            
                    </li>
        
					<li id="mainMiddle">|</li>
					
                    <li id="main">
                    <a href="#">COMMITTEE</a>
                        <ul id="subnav">
								  <li><a href="home.php?user=<?Php echo $User ?>&pass=<?Php echo $Pass ?>&pTitle=COMMITTEE&sTitle=Credit Scoring">RISK MANAGEMENT</a></li>
                        </ul>            
                    </li>
					
					<li id="mainMiddle">|</li>
					
					<li id="main">
                    <a href="#">DEPARTMENTS</a>
                        <ul id="subnav"><a href="#"></a>
          						<li><a href="#">ACCOUNTING</a></li>
								<li><a href="#">AUDIT GROUP</a></li>
								<li><a href="#">COMPLIANCE</a></li>
								<li><a href="#">ENGINEERING</a></li>
								<li><a href="#">HUMAN RESOURCE</a></li>
								<li><a href="#">IT RISK</a></li>
								<li><a href="#">PORTFOLIO ADMIN UNIT</a></li>
								<li><a href="#">SOFTWARE DEVELOPMENT</a></li>
								<li><a href="#">SYSTEMS</a></li>
								<li><a href="#">TREASURY & SUPPLY<a></li>
                        </ul>
             
                    </li>
					
					<li id="mainMiddle">|</li>
					
					<li id="main">
                    <a href="#">OTHERS</a>
                        <ul id="subnav">
                              <li><a href="#">SEMINARS/WORKSHOP</a></li>
                              <li><a href="#">TRAININGS MODULES</a></li>
                        </ul>            
                    </li>
                    
                   

       			</ul>    
    		</div>
		</div>
		
		
		
		
	
		<div id="conbody">
		
			<div id="sidebar">
			<iframe src="<?Php if ($pageTitle == "") { echo 'sidebar1.php'; } else { echo 'sidebar.php'; } ?>" width="300" height="525" name="iframe1" ></iframe>
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

