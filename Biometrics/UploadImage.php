
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Branch Customer Information File</title>


</head>

<body>

		<style type='text/css'>
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
		
		<script>
  		var loadFileImg = function(event) {
    	var reader = new FileReader();
    	reader.onload = function(){
      	var outputImg = document.getElementById('outputImg');
      	outputImg.src = reader.result;};
    	reader.readAsDataURL(event.target.files[0]);};
					
		var loadFileSig = function(event) {
    	var reader = new FileReader();
    	reader.onload = function(){
      	var outputSig = document.getElementById('outputSig');
      	outputSig.src = reader.result;};
    	reader.readAsDataURL(event.target.files[0]);};
		
		</script>
					
		<?Php
		
			include 'DBConnect.php';
			$ChkPho = 0;
			$IDNum = $_REQUEST['IDNum'];
	
			

			
			
		?>
		
		<form name='frmUpload' enctype='multipart/form-data'>
		<table>
		<tr>
			<td>Image File</td>
			<td><input name='imgFile' id='imgFile' type='file' accept='image/*' value='browse' /></td>
			<img id='outputImg' style=' max-width: 100px; max-height: 100px; border: medium;'/>
			<td><input name="btnSearch" type="submit" onclick="javascript: frmUpload.action='UploadImage.php'; frmUpload.method='POST';" value="Save" /></td>
			<input name='IDNum' id='IDNum' type='hidden'  value='<?Php echo $IDNum; ?>' />
		</tr>
		
		</table>
		</form>
		
		<?Php
		
		if (isset($_POST['btnSearch'])){
		
			
		
			date_default_timezone_set("Asia/Taipei");
			$target_img= realpath($_FILES["imgFile"]["tmp_name"]);
			//header("Content-Length: ".filesize($target_img));
			$imageFileImg = pathinfo($target_img,PATHINFO_EXTENSION);
			$target = getcwd()."\Files\images\\";
			$imgname=basename($_FILES['imgFile']['name']);
			$target_img=$target.basename($_FILES['imgFile']['name']);
			
			$sql1 = "Select * From Images where employeeno = '".$IDNum."'";
			$rs1 = odbc_exec($conn,$sql1);
			while (odbc_fetch_row($rs1)){ $ChkPho = 1; }
			
			if(move_uploaded_file($_FILES['imgFile']['tmp_name'],$target_img)) {
			if ($ChkPho == 0 ){$sql="Insert into Images (employeeno, filename, path) Values('$IDNum','$imgname','$target_img')";
				$rs=odbc_exec($conn,$sql); echo "Image successfully Added.";}
			else{$sql="Update Images set Path='".$target_img."', filename = '".$imgname."' where employeeno = '".$IDNum."'";
				$rs=odbc_exec($conn,$sql); echo "Image successfully Updated.";}
			}


		}
		
		
	?>

</body>
</html>
