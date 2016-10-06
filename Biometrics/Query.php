<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<?php
include 'DBConnect.php';
if ($DBCheck == false){ echo "Error";}

$result = $db->query("SELECT * FROM USERACCOUNT  where USERID = '600-042'");
while ($row1 = $result->fetchArray()) {
    echo strtoupper(trim($row1['LASTNAME'])).', '.trim($row1['FIRSTNAME']).'<br>';
}

?>

</body>
</html>
