<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body background="images/bg2.jpg">

<?Php
	$FilePath = "";
	$Uploaded = "";
	
	if (isset($_REQUEST['btnSearch'])){
				
			$target_img= realpath($_FILES["imgFile"]["tmp_name"]);
			header("Content-Length: ".filesize($target_img));
			$imageFileImg = pathinfo($target_img,PATHINFO_EXTENSION);

			$target = getcwd().'/Files/';
			$imgname=basename($_FILES['imgFile']['name']);
			$target_img=$target.basename($_FILES['imgFile']['name']);
			
			$FilePath =  'Files/'.$imgname;
			echo '<input type="hidden" name="FileUpload" value="'.$FilePath.'"/>';
			if(move_uploaded_file($_FILES['imgFile']['tmp_name'],$target_img)) {
				$Uploaded="File Uploaded.";
			}
		}
?>

	<form name='frmUpload' enctype='multipart/form-data'>
		<table>
		<tr>
			<td></td>
			<td><input name='imgFile' id='imgFile' type='file' accept='.file' onchange='loadFileImg(event)' value='browse' /></td>
			<td><input name="btnSearch" type="submit" onclick="javascript: frmUpload.action='ProcessDTR.php'; frmUpload.method='POST';" value="Upload" /></td>
			<td>
			<div id="ConfirmText" style="width"></div>
			</td>
		</tr>
		</table>
	</form>

	<form name="formProcDTR">
	<table>
	<tr>
	<td>
	<div id="progress" style="width:500px;border:1px solid #ccc; height:20px;"></div>
	</td>
	<td>
	<input type="submit" onclick="javascript: formProcDTR.action='ProcessDTR.php'; formProcDTR.method='GET';" value="Process" name="btnProcess" />
	</td>
	</tr>
	<input type="hidden" name="FilePath" value="<?Php echo $FilePath ?>" />
	<tr>
	<td>
	<div id="information" style="width"></div>
	</td>
	</tr>
	</table>
	</form>

	<?php
	
	
	$FilePath = "";
	
	if (isset($_REQUEST['btnProcess'])){
	$FilePath = $_REQUEST['FilePath'];
	
	echo '<script language="javascript">document.getElementById("information").innerHTML="Initializing...";</script>';
	
	$str = 'NjAwLTI0MwkxMC8xLzIwMTUJMTAvMS8yMDE1CTAJMTAvMS8yMDE1IDc6MzY6MjMgQU0JMAkxCTAwMAktCS0J';
	//echo base64_decode($str);
	$str = base64_decode($str);
	$cols = explode("\t", $str);
	
	$count = count($cols);
	for ($i = 0; $i < $count; $i++) {
    //echo ":" . $cols[$i] . "\n";
	if ($i==4){$date = $cols[$i];}
	}	
	
	
	//echo $date;
	//echo "<br>";
	//echo "10/1/2015 7:00:59 AM"."<br>";
	//echo  "\n";
	$to_time = strtotime($date);
	$from_time = strtotime("10/1/2015 7:36:00 AM");
	$myTime =  round(abs($to_time - $from_time) / 60,2);
	if ($myTime < 1) {$myTime=0;}
	//echo $myTime;

	include 'DBConnect.php';
	
	
	$sql = "DELETE FROM DAILYTIMELOG_TEMP";
	$rs=odbc_exec($conn,$sql) or die("Error in query");	
	
	
	$fileCntr = 0;
	$handle = fopen($FilePath, "r");
	if ($handle) {
    	while (($line = fgets($handle)) !== false) {
		$fileCntr = $fileCntr + 1;
		}
	}
	//echo "<br>";
	//echo $fileCntr."<br>";
	$x = 1;
	$handle = fopen($FilePath, "r");
	if ($handle) {
    	while (($line = fgets($handle)) !== false) {
		$str = $line;
		$str = base64_decode($str);
		$cols = explode("\t", $str);
		$count = count($cols);
			for ($i = 0; $i < $count; $i++) {
				if ($i==4){$date = $cols[$i];
				 //echo $i.":" . $cols[$i] . "\n";
				}
			}
			
		$diffTimeH = 0;	
		$LogSched = "";
		$LogTime = "";
		
		$sql = "SELECT * FROM EMPLOYEE WHERE EMPLOYEEID = '".$cols[0]."'";
		$rs=odbc_exec($conn,$sql) or die("Error in query");	
		$employeeID = odbc_result($rs,"EMPLOYEEID");
		$timeScheme = odbc_result($rs,"TIME_SCHEME");
		$timeCode = odbc_result($rs,"TIME_SCHEME");
		
		$sql1 = "SELECT * FROM TIMESCHEMEVAL WHERE SCHEMECODE = '".$timeScheme."' AND TIMECODE = '".$cols[6]."'";
		$rs1=odbc_exec($conn,$sql1) or die("Error in query");	
		$timeSched = odbc_result($rs1,"TIMESCHED");
		$LogSched = $cols[2];
		$LogTime = $cols[4];
		$LogCnt = $cols[6];
		
		$dateLog= $LogSched." ".$timeSched;
		
		$date1=date_create($dateLog);
		$date2=date_create($LogTime);
		
		if ($LogCnt == "4") { $diff=date_diff($date2,$date1); }
		else { $diff=date_diff($date1,$date2); }
		
		$DateC=date_create($LogSched." 00:00:00");
		$dteLog = date_format($DateC,"m/d/Y");
		
		$diffTime = $diff->format("%R%i");
		$diffTimeH = $diff->format("%R%h");
		$diffTimeH = $diffTimeH * 60;
		$diffTimeH = $diffTimeH * 1;
		$diffTime = $diffTime * 1;
		$diffTime = $diffTime + $diffTimeH;
		
		if ($diffTime < 0) {$diffTime=0;}
		
		//echo $employeeID." ".$timeScheme." : ".$dateLog." - ".$LogTime." Diff: ".$diffTime." [".$cols[6]."] <br>";

		$sql = "INSERT INTO DAILYTIMELOG_TEMP(SEQUENCENO,DATECHECK,DATELOG,TIMESCHED,TIMELOG,TIMEDIFF,LOGCOUNT,READERNUMBER,COMMENT,TIMESCHEME,UPLOAD_ID)
			   VALUES('$cols[0]','$cols[1]','$dteLog','$cols[3]','$cols[4]','$diffTime','$cols[6]','$cols[7]','$cols[8]','$cols[9]','$cols[10]')";
		$rs=odbc_exec($conn,$sql) or die("Error in query");	
		//echo "<br>";
		
    	$percent = intval($x/$fileCntr * 100)."%";
    	echo '<script language="javascript"> document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">&nbsp;</div>";
		     document.getElementById("information").innerHTML="'.$x.' files processed."; </script>';
    	echo str_repeat(' ',1024*64);
    	flush();
		$x = $x + 1;
		
		}

	}
	fclose($handle);
	$x = $x - 1;
	echo '<script language="javascript">document.getElementById("information").innerHTML="'.$x.' files process completed.";</script>';
	}
	
	
	if (isset($_REQUEST['btnSearch'])){
	echo '<script language="javascript">document.getElementById("ConfirmText").innerHTML="'.$Uploaded.'";</script>';
	}

	?>

</body>
</html>
