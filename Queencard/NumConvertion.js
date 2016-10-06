
function DigitConvert(DigitAmnt){
	
					var num = parseFloat(DigitAmnt);
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
	
			return words;
		}
		
		
function NumberConvert(DigitAmnt){
	

				var num = parseFloat(DigitAmnt);
				var wNum = Math.floor(num);
				if (wNum > 0){ var dNum = num - wNum;}
				else { var dNum = num;}
				dNum = dNum * 100;
				dNum = dNum.toFixed();
				var wholewords = toWords(wNum);
				var decwords = toWords(dNum);
				var words = "";
	
				if (wNum > 1){
						if (dNum == 1){ words = wholewords + " point " + decwords;}
						else if (dNum > 1){ words = wholewords + " point " + decwords;}
						else { words = wholewords;}
				}
				else if (wNum == 1){
						if (dNum == 1){ words = wholewords + " point " + decwords;}
						else if (dNum > 1){ words = wholewords + " point " + decwords;}
						else { words = wholewords;}
				}
				else {
						if (dNum == 1){ words = decwords;}
						else if (dNum > 1){ words = decwords;}
				}
				return words;
		}