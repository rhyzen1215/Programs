
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FGC Payroll System</title>
<link href="../Queencard/webcss.css" rel="stylesheet" type="text/css"/>
<link href="../Queencard/sample.css" rel="stylesheet" type="text/css"/>

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
        <input name="LogID" type="hidden" value=""/>
        </div>
        <!-- Navigation -->
       <div id="centernav">
   			<div id="dropnav">
        		<ul>
        			 <li id="main">
           			 <a href="#"></a>
            		 </li>
            		 <li id="main">
            		 <a href="../Queencard/home.html">HOME</a>
            		 </li>

            		 <li id="main">
                     <a href="#">COMPANY</a>
                            <ul id="subnav">
                                  <li><a href="http://www.queenbank.com.ph/">Company Details</a></li>
                                  <li><a href="#">Contributions</a></li>
                                  <li><a href="#">Holidays</a></li>
                            </ul>            
                     </li>

                    <li id="main">
                    <a href="#">EMPLOYEE</a>
                        <ul id="subnav">
                              <li><a href="#">Add Employee</a></li>
                              <li><a href="#">Employee Profile</a></li>
                        </ul>            
                    </li>
        
                    <li id="main">
                    <a href="#">PAYROLL</a>
                        <ul id="subnav">
                              <li><a href="../Queencard/processdtr.php">Process DTR</a></li>
                              <li><a href="#">Reverse</a></li>
                        </ul>            
                    </li>
                    
                    <li id="main">
                    <a href="../Queencard/logout.php">LOG OUT</a>        
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
