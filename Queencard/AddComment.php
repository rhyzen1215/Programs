<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Comment Form</title>

</head>

<body>
		
        <?Php
		include 'connect.php';
		$LoanID = "";
		$Comment = "";
		$OffUser = "";
		
		if (isset($_REQUEST['LoanID'])) {
			$LoanID = $_REQUEST['LoanID'];
			$OffUser = $_REQUEST['OffUser'];
		}
		
		?>
        <form name="formText">
		<textarea rows="15" cols="45" name="txtComment">
        
        <?Php
			$sql="SELECT * FROM COMMENTS WHERE LOANID = '".$LoanID."' ORDER BY COMDATE";
			 	$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs))
				{	
					echo odbc_result($rs,"OFFID").": ".odbc_result($rs,"Comment")."\n\n";
				}
		?>
        
        </textarea>	
        <input type="hidden" name="LID" value="<?Php echo $LoanID; ?>" />	
        <input type="hidden" name="OID" value="<?Php echo $OffUser; ?>" />	
        <input type="submit" name="btnSave1" value="Save"/>
        
        
        
        <?Php
		
		if (isset($_REQUEST['btnSave1'])) {
			$OffDate = date_create();
			$OffDate = date_format($OffDate,"Y-m-d");
			date_default_timezone_set("Asia/Taipei");
			$Comment1 = $_REQUEST['txtComment'];		
			$OFFCODE = "";
			$LoanID1 = $_REQUEST['LID'];
			$OffUser1 = $_REQUEST['OID'];
			$OffID1 = "";
				
				$sql="SELECT * FROM OFFICERS WHERE USERNAME = '".$OffUser1."'";
					$rs=odbc_exec($conn,$sql);
					while (odbc_fetch_row($rs))
					{	
						$OffID1 = odbc_result($rs,"OfficerID");
					}
				
			if ($OffID1 == "OFF1") { $OFFCODE = "EOJ"; }
			if ($OffID1 == "OFF2") { $OFFCODE = "DAJ"; }
			if ($OffID1 == "OFF3") { $OFFCODE = "MRF"; }
			
			$sql="INSERT INTO COMMENTS (OFFCODE,OFFID,LOANID,COMMENT,COMDATE,STAT) VALUES('$OffID1','$OFFCODE','$LoanID1','$Comment1','$OffDate','0')";
			$rs=odbc_exec($conn,$sql);
			echo 'Added';
			echo  "<script type='text/javascript'>";
			echo "window.close()";
			echo "</script>";;
			}
			
			
		
		?>	
        
        </form>
</body>
</html>