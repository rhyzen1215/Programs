<?Php
session_start();
if(isset($_SESSION['test'])) {
$_SESSION['CurUser']= $_SESSION['CurUser'];
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="_styles_ie.css" rel="stylesheet" type="text/css"/>
</head>

<body bgcolor="#DFFCD1" oncontextmenu="return false;">

			<ol class="tree">

				 <li>
                	<label for="folder1"><strong>Loan Application</strong></label><input type="checkbox" id="folder1" />
                	<ol>
						<li class="file"><a href="LoanSearchApprove.php" target="iframe2" onclick="disableclick(e)">View Loans</a></li> 
                 	</ol>
                 </li>
                 
                  <li>
                	<label for="folder1"><strong>Setting</strong></label><input type="checkbox" id="folder1" />
                	<ol>
						<li class="file"><a href="resetpass.php" target="iframe2" onclick="disableclick(e)">Change Password</a></li> 
                 	</ol>
                 </li>
                 
             </ol>
             
</body>
</html>
