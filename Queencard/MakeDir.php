<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>


	<?Php
	
		if (isset($_REQUEST['submitBor'])){
			if (!file_exists('C:\loan documents\Forms\SampleDir')) {
    		mkdir('C:\loan documents\Forms\SampleDir', 0777, true);
		}
		}
	
	
	?>
	
	<form>
		<input type="Submit" name="submitBor" value="Test" />
	</form>
</body>
</html>
