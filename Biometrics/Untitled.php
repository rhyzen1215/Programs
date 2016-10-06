<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<?php
$db = new SQLite3('FGCB.db');

//$result = $db->query('UPDATE EMPLOYEE set LASTNAME = trim(LASTNAME)');

$results = $db->query('SELECT * FROM EMPLOYEE order by lastname');
while ($row = $results->fetchArray()) {
    echo strtoupper(trim($row['LASTNAME'])).', '.trim($row['FIRSTNAME']).'<br>';
}
?>

</body>
</html>
