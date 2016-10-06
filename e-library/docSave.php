<?Php
session_start();
if (empty($_SESSION['logged_in'])) {
	echo '<script>';
	echo 'document.location.href="index.php";';
	echo '</script>';
	exit();
}
	include 'DBCon.php';
	if (isset($_REQUEST['btnSub'])) {
	
		$text = $_REQUEST['myText'];
		$docCategory = $_REQUEST['docCat'];
		$docMenu = $_REQUEST['docMenu'];
		$docItem = $_REQUEST['item'];
		$docTitle = $_REQUEST['docTitle'];
		$docName = $_REQUEST['docName'];
		$docFile = $_REQUEST['docName'].".txt";
		
		$myfile = fopen("Files/Memo/".$docFile, "w") or die("Unable to open file!");
		fwrite($myfile,$text);
		fclose($myfile);
		$path = realpath("Files/Memo/".$docFile);
		$data = file_get_contents($path);
		
		$sql = "INSERT INTO DOCUMENT (CATID,MENUID,ITEMID,DOCID,DOCNAME,DOCFILE) VALUES('$docCategory','$docMenu','$docItem','$docTitle','$docName','$docFile')";
		$rs = odbc_exec($conn,$sql) or die("Error in query");	
		
		echo '<script>';
		echo 'document.location.href="edit.php";';
		echo '</script>';
		
	}

?>

