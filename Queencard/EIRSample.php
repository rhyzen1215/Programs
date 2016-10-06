<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<?Php

	$CashFlow = array();
	
	$CashFlow[0] = 116400;
	$CashFlow[1] = -11001.60;
	$CashFlow[2] = -11001.60;
	$CashFlow[3] = -11001.60;
	$CashFlow[4] = -11001.60;
	$CashFlow[5] = -11001.60;
	$CashFlow[6] = -11001.60;
	$CashFlow[7] = -11001.60;
	$CashFlow[8] = -11001.60;
	$CashFlow[9] = -11001.60;
	$CashFlow[10] = -11001.60;
	$CashFlow[11] = -11001.60;
	$CashFlow[12] = -11001.60;
	
	$TCashFlow = 0;
	
	$r = .02;
	$rLen = strlen(trim($r));
	$rate = 0;
	$TFlow = 0;
	$TCashFlow = 0;
	
	for ($i=1; $i<13; $i++){
		
		echo $CashFlow[$i]."<br>";
		
		$rate = 1 + $r;
		$rate= pow($rate, $i);
		$TFlow = $CashFlow[$i] / $rate;
		
		$TCashFlow = $TCashFlow + $TFlow;
		}
		
		echo "<br>";
		echo  ($CashFlow[0] + $TCashFlow);
		echo "<br>";	
		
	
	
	$IRR = 5;
	
	do{
	
	echo $IRR;
	
	$IRR = $IRR - 1;
	
	}while ($IRR != 0);
	
	
	$rVal = 0;
	
	$rLen = $rLen - 1;
	
	if ($rLen == 2) {$rVal = 0.01; }
	else if ($rLen == 3) {$rVal = 0.001; }
	else if ($rLen == 4) {$rVal = 0.0001; }
	else if ($rLen == 5) {$rVal = 0.00001; }
	else if ($rLen == 6) {$rVal = 0.000001; }
	else if ($rLen == 7) {$rVal = 0.0000001; }
	else if ($rLen == 8) {$rVal = 0.00000001; }
	
	echo "<br>".$rLen;
	echo "<br>".$r;
	echo "<br>".$rVal;

?>


</body>
</html>
