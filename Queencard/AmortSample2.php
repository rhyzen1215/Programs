<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

<script type="text/javascript" src="towords.js">
	</script>
</head>

<body>
	
	
	<script type="text/javascript">
	
	function cDigit(){
	
	var num = document.getElementById("digitS").value;
	num = parseFloat(num);
	var wNum = Math.floor(num);
	if (wNum > 0){ var dNum = num - wNum;}
	else { var dNum = num;}
	dNum = dNum * 100;
	dNum = dNum.toFixed();
	var wholewords = toWords(wNum);
	var decwords = toWords(dNum);
	var words = "";
	
	if (wNum > 1){
		if (dNum == 1){ words = wholewords + "Pesos and " + decwords + "Centavo";}
		else if (dNum > 1){ words = wholewords + "Pesos and " + decwords + "Centavos";}
		else { words = wholewords + "Pesos";}
	}
	else if (wNum == 1){
		if (dNum == 1){ words = wholewords + "Peso and " + decwords + "Centavo";}
		else if (dNum > 1){ words = wholewords + "Peso and " + decwords + "Centavos";}
		else { words = wholewords + "Peso";}
	}
	else {
		if (dNum == 1){ words = decwords + "Centavo";}
		else if (dNum > 1){ words = decwords + "Centavos";}
	}
	
	document.getElementById("inWords").value = words;
	}
	</script>

	<input type="text" id="digitS" value="" size="10"/>
	<input type="text" id="inWords" value="" size="100"/>
	<input type="button" value="Click" onclick="cDigit()" />

</body>
</html>
