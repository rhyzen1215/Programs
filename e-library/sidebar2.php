<?Php
	$cat_id = "";
	$menu_id = "";
	include 'DBCon.php';
	$cat_id = $_REQUEST['cat'];
	$menu_id = $_REQUEST['menu'];
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="_styles_ie.css" rel="stylesheet" type="text/css"/>

</head>

<body oncontextmenu="return false;">

			<ol class="tree">
		
				<?Php	
					$sql = "Select * From ITEM where catID = '".$cat_id."' and menuID = '".$menu_id."'";
					$rs = odbc_exec($conn,$sql) or die("Error in query");	
					while (odbc_fetch_row($rs)) {
					echo '<li>';
                	echo '<label for="folder"><strong>'.odbc_result($rs,"itemname").'</strong></label><input type="checkbox" id="folder" />';
					echo '<ol>';
					$item = odbc_result($rs,"itemid");
					$sql1 = "Select * From DOCUMENT where catID = '".$cat_id."' and menuID = '".$menu_id."' and itemID = '".$item."'";
					$rs1 = odbc_exec($conn,$sql1) or die("Error in query");	
					while (odbc_fetch_row($rs1)) {
                	echo '<li class="file" id="aFile"><a href="preview.php?filename='.odbc_result($rs1,"docfile").'" target="iframe2" onclick="disableclick(e)" >'.odbc_result($rs1,"docid").'</a></li>';
					}
					echo '</ol>';
                 	echo '</li>';
					}
				?>	  
             </ol>
			 
			 
             
</body>
</html>
