
	function IRRCalc(CArray) {
  	min = 0.00000001;
  	max = 1.0;
  	do {
    	guest = (min + max) / 2;
    	NPV = 0;
    	for (var j=0; j<CArray.length; j++) {
          NPV += CArray[j]/Math.pow((1+guest),j);
    	}
    	if (NPV > 0) {
      	min = guest;
    	}
    	else {
      	max = guest;
    	}
  	} while(Math.abs(NPV) > 0.0000000001);
  	return guest;
	}
	