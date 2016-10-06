<?Php
session_start();
if (empty($_SESSION['logged_in'])) {
	echo '<script>';
	echo 'document.location.href="index.php";';
	echo '</script>';
	exit();
}

include 'DBCon.php';
$Cat1 = "--select--";
$data="";
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
	
	td {
	font-family:"Century Gothic";
	font-size:14px;
	font-weight:bold;
	}
	select {
	font-family:"Century Gothic";
	font-size:12px;
	font-weight:bold;
	width: 200px;
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
		
		fontsize_formats: "8pt 10pt 12pt 14pt 16pt 18pt 20pt 22pt 24pt 28pt 30pt 34pt 36pt 40pt 46pt 52pt 64pt 72pt"
	
});

</script>



<body>

<table>
	<tr><td>NEW DOCUMENT</td>
	</tr>
</table>

<table>
	<tr><td height="5"></td></tr>
	<td>
	<td><hr size="1" color="#333333" width="740"  /></td>
	</tr>
</table>

<?Php
	$Cat1="";
	$Catname="";
	$Menuname="";
	if (isset($_REQUEST['btnCat1'])) {
		$Cat1 = $_REQUEST['categ'];
		$sql = "Select * From Category where catID = '".$Cat1."'";
		$rs = odbc_exec($conn,$sql) or die("Error in query");	
		while (odbc_fetch_row($rs)) {
		$Catname = odbc_result($rs,"categoryName");
		}
	}
	
	if (isset($_REQUEST['btnMenu'])) {
		$Cat1 = $_REQUEST['categ'];
		$Menu = $_REQUEST['menu'];
		$sql = "Select * From Category where catID = '".$Cat1."'";
		$rs = odbc_exec($conn,$sql) or die("Error in query");	
		while (odbc_fetch_row($rs)) {
		$Catname = odbc_result($rs,"categoryName");
		}
		$sql = "Select * From Menu where catID = '".$Cat1."' and menuID = '".$Menu."'";
		$rs = odbc_exec($conn,$sql) or die("Error in query");	
		while (odbc_fetch_row($rs)) {
		$Menuname = odbc_result($rs,"MenuName");
		}
	}
?>


<?Php
	
	
	if (isset($_REQUEST['btnCreate'])) {
		$folderN = $_REQUEST['foldername'];
		mkdir($folderN);
		echo "Folder Created.";
	}
	
?>



	<form name="frmCat">
	<table>
	<tr>
		<td width="66" align="right">Category:</td>
		<td width="386">
		<select name="categ" id="category">
			<option value="<?Php echo $Cat1 ?>" selected="selected"><?Php echo $Catname ?></option>
			<?Php
				$sql = "Select * From Category";
				$rs = odbc_exec($conn,$sql) or die("Error in query");	
				while (odbc_fetch_row($rs)) {
					echo '<option value="'.odbc_result($rs,"catID").'">'.odbc_result($rs,"categoryName").'</option>';
				}
			?>
		</select>
		<input type="submit" name="btnCat1" value="select" onclick="javascript: fmText.action='edit.php'; fmText.method='GET';"/>
	  </td>
	</tr>
	</table>
	</form>
	
	
	<form name="frmMenu">
	<table>
	<tr>
		<td width="67" align="right">Menu:</td>
		<td width="380">
		<select name="menu">
			<option value="">--select--</option>
			<option value="<?Php echo $Menu ?>" selected="selected"><?Php echo $Menuname ?></option>
			<?Php
				if (isset($_REQUEST['btnCat1'])) {
					$Categ = $_REQUEST['categ'];
					$sql = "Select * From Menu where catID = '".$Categ."'";
					$rs = odbc_exec($conn,$sql) or die("Error in query");	
					while (odbc_fetch_row($rs)) {
					echo '<option value="'.odbc_result($rs,"menuID").'">'.odbc_result($rs,"menuname").'</option>';
					}
				}
			?>
		</select>
		<input type="submit" name="btnMenu" value="select" onclick="javascript: formText.action='edit.php'; formText.method='GET';"/>
		<input type="hidden" name="categ" value="<?Php echo $Cat1 ?>"  />
	  </td>
	</tr>
	</table>
	</form>
	


<form name="frmSubtext">
<table>
	<tr>
		<td width="66" align="right">Item:</td>
		<td width="300">
		<select name="item">
			<option value="">--select--</option>
			<?Php
				if (isset($_REQUEST['btnMenu'])) {
				$Categ = $_REQUEST['categ'];
				$Menu = $_REQUEST['menu'];
				$sql = "Select * From Item where catID = '".$Categ."' and  menuID = '".$Menu."'";
				$rs = odbc_exec($conn,$sql) or die("Error in query");	
				while (odbc_fetch_row($rs)) {
					echo '<option value="'.odbc_result($rs,"itemID").'">'.odbc_result($rs,"itemname").'</option>';
				}
				}
			?>
		</select>
		<input type="hidden" name="menu" value="<?Php echo $Menu ?>"  />
	  </td>
	</tr>
</table>


<input type="hidden" name="docCat" value="<?Php echo $Cat1 ?>"  />
<input type="hidden" name="docMenu" value="<?Php echo $Menu ?>"  />
<table>
	<tr><td height="5"></td></tr>
	<td>
	<td><hr size="2" color="#333333" width="740"  /></td>
	</tr>
</table>


<table>
	<tr>
		<td width="125" align="right"> Document Name: </td>
	  <td width="225"><input type="text" name="docName" size="31" /></td>
		<td width="111" align="right"> Document Title: </td>
	  <td width="289"><input type="text" name="docTitle" size="31" /></td>
	</tr>
</table>

<table><tr><td height="5"></td></tr></table>

<textarea name="myText"></textarea>

<table>
	<tr>
	 <td width="750" align="right">
	 <input type="submit" name="btnSub" value="Save" onclick="javascript: frmSubtext.action='docSave.php'; frmSubtext.method='POST';" />
	 </td>
	</tr>
</table>

</form>

</body>

</html>
