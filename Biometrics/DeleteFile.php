
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Branch Customer Information File</title>


</head>

<body>
		 
		<?Php
		
			include 'DBConnect.php';
			$IDNum = $_REQUEST['EID'];
			$FIleN = "";
			$IDNum1 = substr($IDNum,0,7);
			$FIleN = substr($IDNum,7,strlen($IDNum) - 6);
			$sql="Delete From Documents where employeeno = '".$IDNum1."' and filename = '".$FIleN."'";
			$rs=odbc_exec($conn,$sql) or die("Error in query");
			
			unlink('Files/Docs/'.$FIleN);
			echo '<script>';
			echo 'document.location.href="UploadFiles.php?EID='.$IDNum1.'";';
			echo '</script>';
	
		?>

</body>
</html>
