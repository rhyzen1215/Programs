
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
		
			include 'CIFconnect.php';
			
			$AccntID = $_REQUEST['AccntID'];
			$BrCode = $_REQUEST['BCode'];
			
			
			
			$ChkPho = 1;
			$ChkImg = 1;
			
			$sql="SELECT * FROM CIF_Images WHERE AccntID = '".$AccntID."' and ImageType = 'PHO'";
			$rs=odbc_exec($conn,$sql);
			$ImgPath1 = odbc_result($rs,"ImagePath");
			$ImgFile1 = odbc_result($rs,"ImageFile");
			

			if (($ImgFile1 == "") || ($ImgFile1 ==null)) {
				$ChkPho = 0;
			}
			
			$sql2="SELECT * FROM CIF_Images WHERE AccntID = '".$AccntID."' and ImageType = 'SIG'";
			$rs2=odbc_exec($conn,$sql2);
			$ImgPath2 = odbc_result($rs2,"ImagePath");
			$ImgFile2 = odbc_result($rs2,"ImageFile");

			if (($ImgFile2 == "") || ($ImgFile2 ==null)) {
				$ChkImg = 0;
			}
		
			
			
		?>
		
		<form name='frmUpload' enctype='multipart/form-data'>
		<table>
		<tr>
			<td>Image File</td>
			<td><input name='imgFile' id='imgFile' type='file' accept='image/*' onchange='loadFileImg(event)' value='browse' /></td>
			<img id='outputImg' style=' max-width: 100px; max-height: 100px; border: medium;'/>
			<td>Signature File</td>
			<td><input name='sigFile' id='sigFile' type='file' accept='image/*' onchange='loadFileSig(event)' value='browse' /></td>
			<img id='outputSig' style=' max-width: 100px; max-height: 100px; border: medium;'/>
			
		</tr>
		
		<tr>
			<td></td>
			<td><img src='<?php echo '../Queenbank/Uploads'.$BrCode.'/'.$ImgFile1 ?>' style="max-width: 100px; max-height: 100px; border: medium;"/></td>
			<td></td>
			<td><img src='<?php echo '../Queenbank/Uploads'.$BrCode.'/'.$ImgFile2 ?>' style="max-width: 100px; max-height: 100px; border: medium;"/></td>
			
		</tr>
		
		
		<tr>
			<td><input name="btnSearch" type="submit" onclick="javascript: frmUpload.action='UploadImage.php'; frmUpload.method='POST';" value="Save" /></td>
			<input name='AccntID' id='AccntID' type='hidden'  value='<?Php echo $AccntID ?>' />
			<input name='BCode' id='BCode' type='hidden'  value='<?Php echo $BrCode ?>' />
		</tr>
		
		</table>
		</form>
		
		<?Php
		
		if (isset($_POST['btnSearch'])){
		
			$target_img= realpath($_FILES["imgFile"]["tmp_name"]);
			header("Content-Length: ".filesize($target_img));
			$imageFileImg = pathinfo($target_img,PATHINFO_EXTENSION);
			
			$target_sig= realpath($_FILES["sigFile"]["tmp_name"]);
			header("Content-Length: ".filesize($target_sig));
			$imageFileSig = pathinfo($target_sig,PATHINFO_EXTENSION);
			
			$target = getcwd().'/Uploads/'.$BrCode."/";
			
			$imgname=basename($_FILES['imgFile']['name']);
			$signame=basename($_FILES['sigFile']['name']);
			$target_img=$target.basename($_FILES['imgFile']['name']);
			$target_sig=$target.basename($_FILES['sigFile']['name']);
			
			if(move_uploaded_file($_FILES['imgFile']['tmp_name'],$target_img)) {
			if ($ChkPho == 0 ){$sql="Insert into CIF_Images (AccntID, ImageType,ImagePath, ImageFile, ImageExt, BranchCode) Values('".$AccntID."','PHO','".$target_img."','".$imgname."','".$imageFileImg."','".$BrCode."')"; $rs=odbc_exec($conn,$sql);
			echo ('Client Photo successfully saved.<br>');}
				
			else{$sql="Update CIF_Images set ImagePath='".$target_img."', ImageFile='".$imgname."', ImageExt='".$imageFileImg."' where accntID = '".$AccntID."' and ImageType='PHO'";$rs=odbc_exec($conn,$sql);}
			
			$sqlS="Update CIF_UPLOAD set w_photo = 'Y' where ID = '".$AccntID."'";
			$rsS=odbc_exec($conn,$sqlS);
			echo ('Client Photo successfully saved.<br>');
			}
			
			if(move_uploaded_file($_FILES['sigFile']['tmp_name'],$target_sig)) {
			if ($ChkImg == 0 ){$sql="Insert into CIF_Images (AccntID, ImageType,ImagePath, ImageFile, ImageExt, BranchCode) Values('".$AccntID."','SIG','".$target_sig."','".$signame."','".$imageFileSig."','".$BrCode."')"; $rs=odbc_exec($conn,$sql);
			echo ('Client Signature successfully saved.<br>');}
				
			else{$sql="Update CIF_Images set ImagePath='".$target_sig."', ImageFile='".$signame."', ImageExt='".$imageFileSig."' where accntID = '".$AccntID."' and ImageType='SIG'";$rs=odbc_exec($conn,$sql);}
			
			$sqlS="Update CIF_UPLOAD set w_sig='Y' where ID = '".$AccntID."'";
			$rsS=odbc_exec($conn,$sqlS);
			echo ('Client Signature successfully saved.<br>');
			}
        	
			
		}
		
		
	?>

</body>
</html>
