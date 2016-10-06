<?Php
session_start();
if (empty($_SESSION['logged_in'])) {
	echo '<script>';
	echo 'document.location.href="index.php";';
	echo '</script>';
	exit();
}
include 'DBCon.php';
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
	
	select {
		width: 200px;
		}
	td {
		font-family:"Century Gothic";
		font-size:12px;
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



<body>


<?Php
	$Cat="";
	$subCat = "";
	$Menu = "";
	$catSel = "";
	$subcatSel = "";
	$menuSel = "";
	
	if ((isset($_REQUEST['btnCatSel'])) || (isset($_REQUEST['btnsubCatSel'])) || (isset($_REQUEST['btnMenu']))) {
		$catSel = $_REQUEST['catSel'];
		$subcatSel = $_REQUEST['subcatSel'];
		$menuSel = $_REQUEST['menuSel'];
	}
?>

<form name="fmText">
<table>
	<tr align="right">
		<td width="15"></td>
		<td>Category:</td>
		<td>
		<select name="catSel">
			<?Php
				echo '<option value="'.$catSel.'">'.$catSel.'</option>';
				$sql="SELECT * FROM CATEGORY";
				$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs)) {
					echo '<option value="'.odbc_result($rs,"categoryName").'">'.odbc_result($rs,"categoryName").'</option>';
				}
			?>
		</select>
		<input type="submit" name="btnCatSel" value="Select" onclick="javascript: fmText.action='parameter.php'; fmText.method='GET';"/>
		<input type="text" name="catText" size="20" value="<?Php echo $catSel ?>"/>
		<input type="submit" name="btnCat" value="Add" onclick="javascript: fmText.action='parameter.php'; fmText.method='GET';"/>
		
		<?Php
			if (isset($_REQUEST['btnCat'])) {
				$Cat = $_REQUEST['catText'];
				$sql="INSERT INTO CATEGORY (CATEGORYname) VALUES('$Cat')";
				$rs=odbc_exec($conn,$sql);
			}
		?>
		</td>
	</tr>
	
	<tr align="right">
		<td width="15"></td>
		<td>Sub Category:</td>
		<td>
		<select name="subcatSel">
			<?Php
				echo '<option value="'.$subcatSel.'">'.$subcatSel.'</option>';
				$sql="SELECT * FROM SUBCATEGORY WHERE CATEGORYNAME= '".$catSel."'";
				$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs)) {
					echo '<option value="'.odbc_result($rs,"SubCategory").'">'.odbc_result($rs,"SubCategory").'</option>';
				}
			?>
			
		</select>
		<input type="submit" name="btnsubCatSel" value="Select" onclick="javascript: fmText.action='parameter.php'; fmText.method='GET';"/>
		<input type="text" name="subcatText" size="20" value="<?Php echo $subCat ?>"/>
		<input type="submit" name="btnsubCat" value="Add" onclick="javascript: fmText.action='parameter.php'; fmText.method='GET';"/>
		<?Php
			if (isset($_REQUEST['btnsubCat'])) {
				$Cat = $_REQUEST['catSel'];
				$subCat = $_REQUEST['subcatText'];
				$sql="INSERT INTO SUBCATEGORY (CATEGORYname,SubCategory) VALUES('$Cat','$subCat')";
				$rs=odbc_exec($conn,$sql);
			}
		?>
		</td>
	</tr>
	
	<tr align="right">
		<td width="15"></td>
		<td>Menu:</td>
		<td>
		<select name="menuSel">
			<?Php
				echo '<option value="'.$menuSel.'">'.$menuSel.'</option>';
				$sql="SELECT * FROM MENU WHERE CATEGORY = '".$catSel."' AND SUBCATEGORY = '".$subcatSel."'";
				$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs)) {
					echo '<option value="'.odbc_result($rs,"MENUNAME").'">'.odbc_result($rs,"MENUNAME").'</option>';
				}
			?>
		</select>
		<input type="submit" name="btnmenuSel" value="Select" onclick="javascript: fmText.action='parameter.php'; fmText.method='GET';"/>
		<input type="text" name="menuText" size="20" value="<?Php echo $Menu ?>"/>
		<input type="submit" name="btnMenu" value="Add" onclick="javascript: fmText.action='parameter.php'; fmText.method='GET';"/>
		<?Php
			if (isset($_REQUEST['btnMenu'])) {
				$Cat = $_REQUEST['catSel'];
				$subCat = $_REQUEST['subcatSel'];
				$Menu = $_REQUEST['menuText'];
				$sql="INSERT INTO MENU (CATEGORY,SubCategory,MenuName) VALUES('$Cat','$subCat','$Menu')";
				$rs=odbc_exec($conn,$sql);
			}
		?>
		</td>
	</tr>
	
</table>
</form>


</body>

</html>
