<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<style type="text/css">
	#div1 {
	width:750px;
	height:500px;	
	}
</style>

<script src="tinymce/plugins/textcolor/plugin.min.js"></script>
<script src="tinymce/plugins/preview/plugin.min.js"></script>
<script src="tinymce/tinymce.min.js"></script>

<script>
tinymce.init({
    selector: 'textarea',
	plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace code fullscreen",
        "insertdatetime media table contextmenu paste",
		"textcolor save hr"
    ],
	toolbar: "fontsizeselect fontselect preview forecolor backcolor insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",


	statusbar: true,
	force_p_newlines: false,
	forced_root_block: false,
	width : 750,
	height : 300,
	resize: false,
	font_formats: "Andale Mono=andale mono,times;"+
        "Arial=arial,helvetica,sans-serif;"+
        "Arial Black=arial black,avant garde;"+
        "Book Antiqua=book antiqua,palatino;"+
        "Comic Sans MS=comic sans ms,sans-serif;"+
        "Courier New=courier new,courier;"+
        "Georgia=georgia,palatino;"+
        "Helvetica=helvetica;"+
        "Impact=impact,chicago;"+
        "Symbol=symbol;"+
        "Tahoma=tahoma,arial,helvetica,sans-serif;"+
        "Terminal=terminal,monaco;"+
        "Times New Roman=times new roman,times;"+
        "Trebuchet MS=trebuchet ms,geneva;"+
        "Verdana=verdana,geneva;"+
        "Webdings=webdings;"+
        "Wingdings=wingdings,zapf dingbats",
		
		fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt"
	
});

</script>



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


<form name="fromText">

<textarea name="myText"></textarea>
<input type="submit" name="btnSub" onclick="javascript: formText.action='SampleCode.php'; formText.method='GET'; formText.target='iframe1'" />

</form>

<?Php
	
	$data="";
	if (isset($_REQUEST['btnSub'])) {
		$text = $_REQUEST['myText'];
		
		//$text =  nl2br($text);
		$myfile = fopen("test.txt", "w") or die("Unable to open file!");
		fwrite($myfile,$text);
		fclose($myfile);
		
		$path = realpath("test.txt");
		$data = file_get_contents($path);
		//$data =  str_replace(" ","&nbsp;",$data);
		//echo '<p>';
		//echo nl2br($data);
		//echo '</p>';
	}
	

?>

<div id="div1" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none;" 
 unselectable="on"
 onselectstart="return false;" 
 onmousedown="return false;">
	<?Php echo $data; ?>
</div>

</body>

</html>
