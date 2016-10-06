
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Branch Customer Information File</title>


</head>

<body>

		<style type='text/css'>
		a { text-decoration:none; font-weight:bold; }
		#td1 {
			font-family:"Century Gothic";
			font-size:12px;
			font-weight:bold;
			color:#990000;
			}
		#td2 {
			font-family:"Century Gothic";
			font-size:12px;
			color: #000066;
			}
		td {
			font-family:"Century Gothic";
			font-size:12px;
			}
		#tablemain {
			border: 0px solid black; border-collapse: collapse;
			font-family:'Century Gothic'; font-size:8px; font-weight: normal; border-spacing:inherit;
			Spadding-left: 2px; padding-right: 2px; margin:2px; text-align: right; padding-top: 0px; padding-bottom: 0px;
			}
		#tableTotal {
			border: 0px; font-family:'Century Gothic'; font-size:10px; font-weight: bold; border-spacing:inherit;
			Spadding-left: 2px; padding-right: 2px; margin: 2px; text-align: right; padding-top: 0px; padding-bottom: 0px;
			}
		</style>
		
		 <table width="495">
		 <tr>
		  <td width="269" id="td1">Document Name</td>
		  <td width="99" id="td1" align="center">Type</td>
		  <td width="52"></td>
		  <td width="55"></td>
		 </tr>
</table>	
		 <hr size="1" width="500" color="#333333" />
		 <script src="DeleteFile.js" type="text/javascript"></script>
		 <table width="495">
		 
		<?Php
		
			include 'DBConnect.php';
			$ChkPho = 0;
			$DocName = "";
			$DocType = "";
			$IDNum = $_REQUEST['EID'];
			
			$sql="Select * From Documents where employeeno = '".$IDNum."'";
			$rs=odbc_exec($conn,$sql) or die("Error in query");
			while (odbc_fetch_row($rs)) {
			  echo '<form>';
			  echo '<tr>';
			  echo '<td width="269" id="td2">'.odbc_result($rs,"docname").'</td>';
			  echo '<td width="99" id="td2" align="center">'.odbc_result($rs,"filetype").'</td>';
			  echo '<input type="hidden" id="EID" value="'.$IDNum.'" />';
			  echo '<input type="hidden" id="DocFile" value="'.odbc_result($rs,"filename").'" />';
			  echo '<td width="52"><a href="#" onclick="FileDelete();return false;" >Delete</a></td>';
			  echo '<td width="55"><a href="ViewFile.php?EID='.$IDNum.'&FN='.odbc_result($rs,"filename").'" target="_blank" >View</a></td>';
			  echo '</tr>';
			  echo '</form>';
			}	
	
		
		?>
		</table>
		<hr size="1" width="500" color="#333333" />
		
		<form name='frmUpload' enctype='multipart/form-data'>
		<input name='EID' id='EID' type='hidden'  value='<?Php echo $IDNum; ?>' />
		
		<table width="506">
		<tr>
		  <td width="118" height="24" align="right">Document Name:</td>
	      <td width="144"><input type="text"  value="" name="DocName"/></td>
		  <td width="109" align="right">Document Type:</td>
		  <td width="115">
		  <select name="docType">
		  <option value="pdf">Pdf</option>
		  <option value="doc">Doc</option>
		  <option value="image">Image</option>
		  </select></td>
		 </tr>
		</table>
		
		<hr size="1" width="500"/>
		
		<table>
		 <tr>
		 <td align="right"><input name='imgFile' type='file' />
		 <input name="btnSearch"type="submit"onclick="javascript:frmUpload.action='UploadFiles.php';frmUpload.method='POST';" value="Upload" /></td>
		</tr>
		</table>
		</form>
		
		<?Php
		
		if (isset($_POST['btnSearch'])){
			$IDNum = $_REQUEST['EID'];
			$DocName = $_REQUEST['DocName'];
			$DocType = $_REQUEST['docType'];
			
			date_default_timezone_set("Asia/Taipei");
			$target_img= realpath($_FILES["imgFile"]["tmp_name"]);
			//header("Content-Length: ".filesize($target_img));
			$imageFileImg = pathinfo($target_img,PATHINFO_EXTENSION);
			$target = getcwd()."\Files\Docs\\";
			$imgname=basename($_FILES['imgFile']['name']);
			$target_img=$target.basename($_FILES['imgFile']['name']);
			
			$sql1 = "Select * From Documents where employeeno = '".$IDNum."' and filename = '".$imgname."'";
			$rs1 = odbc_exec($conn,$sql1);
			while (odbc_fetch_row($rs1)){ $ChkPho = 1; }
			
			if(move_uploaded_file($_FILES['imgFile']['tmp_name'],$target_img)) {
			if ($ChkPho == 0 ){$sql="Insert into Documents (employeeno, docname, filename, filetype) Values('$IDNum','$DocName','$imgname','$DocType')";
				$rs=odbc_exec($conn,$sql); echo "Image successfully Added.";}
			else{$sql="Update Documents set docname='".$DocName."', filename = '".$imgname."', filetype = '".$DocType."' where employeeno = '".$IDNum."' and filename = '".$imgname."'";
				$rs=odbc_exec($conn,$sql); echo "Image successfully Updated.";}
			}
		}
		
		
	?>
	
	

</body>
</html>
