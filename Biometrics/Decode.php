<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

	<?php
	$str = 'NjAwLTI0MwkxMC8xLzIwMTUJMTAvMS8yMDE1CTAJMTAvMS8yMDE1IDc6MzY6MjMgQU0JMAkxCTAwMAktCS0J';
	//echo base64_decode($str);
	$str = base64_decode($str);
	$cols = explode("\t", $str);
	
	$count = count($cols);
	for ($i = 0; $i < $count; $i++) {
    echo ":" . $cols[$i] . "\n";
	if ($i==4){$date = $cols[$i];}
	}	
	
	
	echo $date;
	//echo "<br>";
	//echo "10/1/2015 7:00:59 AM"."<br>";
	echo  "\n";
	$to_time = strtotime($date);
	$from_time = strtotime("10/1/2015 7:36:00 AM");
	$myTime =  round(abs($to_time - $from_time) / 60,2);
	if ($myTime < 1) {$myTime=0;}
	echo $myTime;
	
	
	$handle = fopen("DTR10302015.file", "r");
	if ($handle) {
    	while (($line = fgets($handle)) !== false) {
		$str = $line;
		$str = base64_decode($str);
		$cols = explode("\t", $str);
		$count = count($cols);
		for ($i = 0; $i < $count; $i++) {
    	echo ":" . $cols[$i] . "\n";
		if ($i==4){$date = $cols[$i];}
		}	
   	 	
		echo "<br>";
		}
	}
	fclose($handle);
	?>

</body>
</html>
