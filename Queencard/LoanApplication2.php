<?Php

		
			
			$ServiceCharge = 0;
			$ProcessFee = 1000;
			$DocStampFee = 0;
			$NotarialFee = 0;
			$MembershipFee = 0;
			$APLFee = 0;
			$MRI = 0;
			$EIR = 0.10;
			$CRatio = 0.15;
			$PrincipalVal = 0.00;
			$InterestVal = 0.00;
			$GRTVal = 0.00;
			$DimAmort = 0.00;


					$DimAmount = $AmountLoan;
					$DimintRate = $InterestRate;
    				$DimVarE = $InterestRate;
    				$DimTerms = $Term;
    				$DimVarB = $Term;
    				$DimintRate = $DimintRate / 12;
    				$DimVar0 = $DimintRate + 1;
    				$DimVar1 = $DimVar0;
    				$DimVar2 = 0;
    				$DimVar1 = $DimVar1 / $DimVar0;
	
      				do {
        				$DimVar1 = $DimVar1 / $DimVar0;
        				$DimVar2 = $DimVar2 + $DimVar1;
        				$DimTerms = $DimTerms - 1;
      				} while ($DimTerms != 0);
	
	
    				$DimFactor = $DimVar2;
    				$DimAmort = $DimAmount / $DimFactor;
    				$DimAmort2 = $DimAmort * $DimVarB;
    				$DimAmort2 = $DimAmort2 - $DimAmount;
    				$DimAmort = $DimAmort / 2;
					
				
				
		
		$ServiceCharge = $AmountLoan / 1000;
		$ServiceCharge = $ServiceCharge * 50;
		
		If ($AmountLoan > 50000){$NotarialFee =  200;}
		else {$DocStampFee = 0;}
		
		If ($AmountLoan >= 250000){
		$TermDays = $Term * 30;
		$TermDays = $TermDays / 360;
		$TermVal = $AmountLoan / 200;
		$DocStampFee = $TermDays * $TermVal;
		}
	
		
		If ($AmountLoan > 10000){
		$Val1 = $AmountLoan / 1000;
		$APLFee = $Val1 * 7.5;
		}


		$PrincipalVal = $AmountLoan / $Term;
 		$PrincipalVal = $PrincipalVal / 2;
		
		$InterestVal = $AmountLoan * $InterestRate;
		$InterestVal = $InterestVal / 24;
		
		$GRTVal = $InterestVal * 0.05;
		
		$APLFee = 0;
		$MRI = $AmountLoan / 1000;
		$MRI = $MRI * 7.5;
		
		if ($PrdCode == "QSAL") {
		$PrincipalVal = $DimAmort - $InterestVal;
		}
		
		$TotalDeductions = $ServiceCharge + $ProcessFee + $DocStampFee + $NotarialFee + $MembershipFee + $APLFee + $MRI;
		$NetProceeds = $AmountLoan - $TotalDeductions;
		
		
		$ServiceCharge = number_format($ServiceCharge,2,'.','');
		$ProcessFee = number_format($ProcessFee,2,'.','');
		$DocStampFee = number_format($DocStampFee,2,'.','');
		
		$NotarialFee = number_format($NotarialFee,2,'.','');
		$MembershipFee = number_format($MembershipFee,2,'.','');
		$APLFee = number_format($APLFee,2,'.','');
		$MRI = number_format($MRI,2,'.','');
		
		$PrincipalVal = number_format($PrincipalVal,2,'.','');
		$NetProceeds = number_format($NetProceeds,2,'.','');
		$TotalDeductions = number_format($TotalDeductions,2,'.','');
		$AmountLoan = number_format($AmountLoan,2,'.','');
		
		$DimAmort = number_format($DimAmort,2,'.','');

		
		

?>