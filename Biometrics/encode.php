<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
	<?Php
		
		$str1 = "";
		$str = "";
		$Cstr = "";
		$Cstr1 = "";
		
		if (isset($_REQUEST['btnSub'])){
		$str = $_REQUEST['inputText'];
		$str1 = base64_encode($str);
		}
		
		if (isset($_REQUEST['btnSubC'])){
		$Cstr = $_REQUEST['inputTextC'];
		$Cstr1 = base64_decode($Cstr);
		}
	
	
	?>
	
	<form name="formCon">
	<table>
		<tr>
			<td></td>
			<td><input type="text" name="inputText" value="<?Php echo $str ?>" size="100"/></td>
			<td><input type="submit" name="btnSub" value="Convert" onclick="javascript: formCon.action='encode.php'; formCon.method='GET';"/></td>
		</tr>
		
		<tr>
			<td></td>
			<td><input type="text" name="outputText" value="<?Php echo $str1 ?>" size="100" /></td>
			<td></td>
		</tr>
	
	</table>
	</form>

	<form name="formCon">
	<table>
		<tr>
			<td></td>
			<td><input type="text" name="inputTextC" value="<?Php echo $Cstr ?>" size="100"/></td>
			<td><input type="submit" name="btnSubC" value="Convert" onclick="javascript: formCon.action='encode.php'; formCon.method='GET';"/></td>
		</tr>

	
	</table>
	</form>
	
	<?Php echo $Cstr1 ?>
</body>
</html>
