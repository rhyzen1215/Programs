
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Branch Customer Information File</title>


</head>

<body>
					
		<?Php
		
			include 'DBConnect.php';
			$ChkPho = 0;
			$IDNum = $_REQUEST['EID'];
			$FileName = $_REQUEST['FN'];
			$Src = "";
			
			$sql="Select * From Documents where employeeno = '".$IDNum."' and FileName = '".$FileName."'";
			$rs=odbc_exec($conn,$sql) or die("Error in query");
			$File  = odbc_result($rs,"FileName");
			$Src = "Files/Docs/".$File;
			
			header("Content-type: application/pdf");
			header("Content-Disposition: inline; filename=application.pf");
			@readfile($Src);
			echo "<iframe src='".$Src."' width=\"100%\" style=\"height:100%\"></iframe>";
		?>
		

</body>
</html>
