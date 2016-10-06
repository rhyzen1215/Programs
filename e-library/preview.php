
<?Php

session_start();
if (empty($_SESSION['logged_in'])) {
	echo '<script>';
	echo 'document.location.href="index.php";';
	echo '</script>';
	exit();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<style type="text/css">
	#div1 {
	background-image:url(images/backImage.png);
	background-repeat: repeat;
	width:750px;
	height:auto;	
	}
</style>


<script type="text/javascript">
	
	document.onkeydown = function(e) {
        if (e.ctrlKey && (e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 85 || e.keyCode === 117 || e.keyCode === 42)) {//Alt+c, Alt+v will also be disabled sadly.
            alert('not allowed');
        }
        return false;
		};
	

	document.oncontextmenu = function() { /*alert(msg);*/ return false; }
	document.ondragstart   = function() { /*alert(msg);*/ return false; }
	document.onmousedown   = mouseDown;
	
	
</script>

<body oncontextmenu="return false">


<?Php
	
		$data="";
		$filename = $_REQUEST['filename'];
		$filename = "Files/Memo/".$filename;
		//$text = $_REQUEST['myText'];
		//$text =  nl2br($text);
		//$myfile = fopen("test.txt", "w") or die("Unable to open file!");
		//fwrite($myfile,$text);
		//fclose($myfile);
		
		$path = realpath($filename);
		$data = file_get_contents($path);
		//$data =  str_replace(" ","&nbsp;",$data);
		//echo '<p>';
		//echo nl2br($data);
		//echo '</p>';
	

?>

<div id="div1" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none;" 
 unselectable="on"
 onselectstart="return false;" 
 onmousedown="return false;">
	<?Php echo $data; ?>
</div>

</body>

</html>
