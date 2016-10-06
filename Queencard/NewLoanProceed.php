			<?Php
				session_start();

				include 'connect.php';
				if (isset($_SESSION['CurUser'])) {
				$Muser =$_SESSION['CurUser'];
				}
				else
				{
				echo "Not Set";
				}
				
				$sql="SELECT * FROM Users WHERE username = '".$Muser."'";
				$rs=odbc_exec($conn,$sql);
				$Check = odbc_result($rs,"status");
				if ($Check != 0)
				{
				echo '<script>';
				echo 'document.location.href="home.html";';
				echo '</script>';
				}
				$onClick = false;
			?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<script src="Schedule.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style2 {font-size: 12px}

.styleText {text-align:right}
-->

	a {
	text-decoration:none;
	font-family:"Century Gothic";
	font-weight:bolder;
	font-size:12px;
	}

input[type=date]
	{
	width: 190px;
	margin-left:2px;
	}

input[type=date],input[type=text],select
	{
	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;
	border-spacing:inherit;
	padding-left: 2px;
	margin: 2px;
	}
.style3 {
	font-size: 14px;
	font-weight: bold;
	font-family: "Century Gothic";
	}
.style7 {
	font-family: "Century Gothic";
	font-size: 12px;
	font-weight: bold;
	}
</style>


<script type="text/javascript">

	function EditValues() {
	
	document.getElementById("IntRate").readOnly = false;
	document.getElementById("ServCharge").readOnly = false;
	document.getElementById("ProcFee").readOnly = false;
	document.getElementById("MemFee").readOnly = false;
	document.getElementById("APLFee").readOnly = false;
	document.getElementById("MRI").readOnly = false;
	document.getElementById("DocStamp").readOnly = false;
	document.getElementById("NotFee").readOnly = false;
	document.getElementById("bEdit").disabled = true;
	document.getElementById("bSave").disabled = false;
	}
	
	function SaveValues() {

	document.getElementById("IntRate").readOnly = true;
	document.getElementById("ServCharge").readOnly = true;
	document.getElementById("ProcFee").readOnly = true;
	document.getElementById("MemFee").readOnly = true;
	document.getElementById("APLFee").readOnly = true;
	document.getElementById("MRI").readOnly = true;
	document.getElementById("DocStamp").readOnly = true;
	document.getElementById("NotFee").readOnly = true;
	document.getElementById("bEdit").disabled = false;
	document.getElementById("bSave").disabled = true;
	
	var SC = document.getElementById("ServCharge").value;
	var PF = document.getElementById("ProcFee").value;
	var MF = document.getElementById("MemFee").value;
	var APL = document.getElementById("APLFee").value;
	var MRI = document.getElementById("MRI").value;
	var DS = document.getElementById("DocStamp").value;
	var NF = document.getElementById("NotFee").value;
	var TL = document.getElementById("LoanAmnt").value;
	var Trms = document.getElementById("LTerms").value;
	
	
	
	
	var e = document.getElementById("DeductM");
	var strDeduct = e.options[e.selectedIndex].value;

	var TotalD = parseFloat(SC) + parseFloat(PF) + parseFloat(MF) + parseFloat(APL) + parseFloat(MRI) + parseFloat(DS) + parseFloat(NF);
	var NetP = parseFloat(TL);
	
	if (strDeduct == "Deducted"){
	NetP = parseFloat(TL) - parseFloat(TotalD);
	}
	TotalD = TotalD.toFixed(2);
	NetP = NetP.toFixed(2);
	
	
	var PrincipalVal = TL / Trms;
	PrincipalVal = PrincipalVal / 2;
	
	
	
	
	
	document.getElementById("TotalD").value = TotalD;
	document.getElementById("NetP").value = NetP;
	
	
	var LAmnt = document.getElementById("LoanAmnt").value;
	
	
	
	}
	
	
</script>

</head>

<body>
            
		<?php
		

			$BID = $_REQUEST['BID'];
			$EmpNo =  $_REQUEST['EID'];
			$BName =  $_REQUEST['BName'];
			$BCom =  $_REQUEST['BCom'];
			$BPos =  $_REQUEST['BPos'];
			$BStat = $_REQUEST['BStat'];
			$LoanID =  $_REQUEST['LoanID'];
			$LoanAmount = $_REQUEST['LoanAmount'];
			$Comakerno = $_REQUEST['Comakerno'];
			$ComakerName = $_REQUEST['ComakerName'];
			$Comakerno2 = $_REQUEST['Comakerno2'];
			$ComakerName2 = $_REQUEST['ComakerName2'];
			$PayFreq = $_REQUEST['payFrequency'];
			$LoanTerm = $_REQUEST['LoanTerm'];
			$prodCode= $_REQUEST['pcode'];
			$BSpouse= $_REQUEST['BSpouse'];
			$BAdd = $_REQUEST['BAdd'];
			$BAdd1 = $_REQUEST['BAdd1'];
			$BAdd2 = $_REQUEST['BAdd2'];
			$LoanIDSub = "";
			$Semi  ="";
			$LPurpose = $_REQUEST['LPurpose'];
			$Rel1 = $_REQUEST['Rel1'];
			$Rel2 = $_REQUEST['Rel2'];
			$Known1 = $_REQUEST['Known1'];
			$Known2 = $_REQUEST['Known2'];
		?>		
            
   			<table width="718">  
				<tr>
                <td width="98" height="10"></td>
                </tr>
                
                <tr>
                <td width="98"></td>
				<?Php
				$prodName = $_REQUEST['pname'];
				echo '<input name="PRDName" id="PRDName" type="hidden"  size="30" value="'.$prodName.'" />';
				?>
                <td width="478"><div align="center"><span class="style3"><?Php echo $prodName; ?> APPLICATION</span></div></td>
                <td width="126"></td>
  				</tr>
				
                <tr>
                <td width="98" height="5"></td>
                </tr>
			
			</table>
			
			
 				
            <!-- Employee Break -------------------------------------------------------->
            <table width="720" cellpadding="0" cellspacing="0">
              <tr>
			  <td width="718"><span class="style7">Employee Details</span></td>
		      </tr>
              <tr>
              <td><hr width=654px size="3" color="#666666" align="left"/></td>
              </tr>
			</table>
			
			<!-- Employee Detail ---------------------------------------------------->

			<table cellpadding="0" cellspacing="0">
            	<tr>
				<td width="571">
             		<table width="500" cellpadding="0" cellspacing="0">
		     			<tr>
             			<form name="form">
   					  	<th width="5">&nbsp;</th>
   				  		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Borrower No.:</font></div></td>
		   			  	<th width="246"><div align="left"><?php echo '<input name="BorrowerNo" type="text"  size="9" value="'.$BID.'" required />'; ?>
		   			    <input type="submit" value="Search" name="fetch" onclick="javascript: form.action='NewLoanApp.php'; form.method='GET';" /></div></th>
                    	</form>
			 		  </tr>
				  		
								<?Php
								$sqlName = "Select * From Borrower where borrowerno = '".$BID."'";
								$rsName = odbc_exec($conn,$sqlName);
								$BrName = odbc_result($rsName,"firstname")." ".odbc_result($rsName,"mi")." ".odbc_result($rsName,"lastname");
								$BrName = strtoupper($BrName);
								 echo '<input name="BrName" id="BrName" type="hidden"  size="30" value="'.$BrName.'" />';
								?>
								
				  		<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Employee No.:</font></div></td>
			    	  	<th width="246"><div align="left"><input name="EmpNo" type="text"  size="18" value="<?php echo $EmpNo ?>" required /></th>
				  		</tr>
				  
                  		<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Borrower Name:</font></div></td>
			    	  	<th width="246"><div align="left"><input name="BName" id="BName" type="text"  size="30" value="<?php echo $BName ?>" required />
			    	  	</div></th>
				  		</tr>
      
                 		<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Company Name:</font></div></td>
			    	  	<th width="246"><div align="left"><input name="BComp" id="ComName" type="text"  size="30" value="<?php echo $BCom ?>" required />			
						</div></th>
				  		</tr>
				  
				  		<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Position:</font></div></td>
			    	  	<th width="246"><div align="left"><?php echo '<input name="BPos" type="text"  size="30" value="'.$BPos.'" required />'; ?>			
						</div></th>
				  		</tr>
				  
				  		<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Status:</font></div></td>
			    	  	<th width="246"><div align="left"><?php echo '<input name="BStat" type="text"  size="30" value="'.$BStat.'" required />'; ?>
						</div></th>
				  		</tr>	  
					</table>
			
				</td>
            </tr>
         <tr height="15">
         </tr>
         </table>
			
            
              <!-- Employee Break -------------------------------------------------------->

            <table width="720" cellpadding="0" cellspacing="0">
              <tr>
			  <td width="718"><span class="style7"></span></td>
		      </tr>
              <tr>
              <td><hr width=654px size="3" color="#666666" align="left"/></td>
              </tr>
			</table>
			
			<!-- Employee Detail ---------------------------------------------------->
			<form name= "formProceed" >
			<table cellpadding="0" cellspacing="0">
            	<tr>
				<td width="571">
				
             		<table width="500" cellpadding="0" cellspacing="0">
		     			<tr>
             	
   					  	<th width="5">&nbsp;</th>
   				  		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic"><strong>Loan Number:</strong></font></div></td>
		   			  	<th width="246"><div align="left"><input name="LoanID" type="text"  size="15" value="<?php echo trim($LoanID) ?>" style="background-color:#33FFFF" />
						<input name="ProductCode" id="ProductCode" type="hidden"  size="15" value="<?php echo substr(trim($LoanID),0,4) ?>" readonly/>
		   			    <input type="Submit" value="Refresh" name="floanid" onclick="javascript: formProceed.action='NewLoanApp.php'; formProceed.method='GET';" />
						</div></th>
						<?php echo '<input name="BorrowerNo2" type="hidden"  size="10" value="'.$BID.'" />'; ?>
						<?php echo '<input name="ComNo" type="hidden"  size="10" value="'.$Comakerno.'" />'; ?>
						<?php echo '<input name="BSpouse" id="BSpouse" type="hidden"  size="30" value="'.$BSpouse.'" required />'; ?>
						<?php echo '<input name="pcode" type="hidden"  size="30" value="'.$prodCode.'" required />'; ?>
						<?php echo '<input name="pname" id="pname" type="hidden"  size="30" value="'.$prodName.'" />'; ?>
                   
			 		    </tr>

				  		<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"></div></td>
			    	  	<th width="246"><div align="left">		
						</div></th>
				  		</tr>
						
						
						
						<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2 styleText"><font face="Century Gothic">Loan Amount:</font></div></td>
			    	  	<th width="246"><div align="left"><input name="LoanAmount" id="LAmount" style="text-align:right;"  type="text"  size="21" value="<?Php echo $LoanAmount ?>" />
			    	  	</div></th>
				  		</tr>
						
						<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Loan Term:</font></div></td>
			    	  	<th width="246"><div align="left"><input name="LoanTerm" id="LTerms" style="text-align:right;" type="text"  size="21" value="<?php echo $LoanTerm ?>" />
						</div></th>
				  		</tr>
						
						<script src="Comaker.js" type="text/javascript"></script>
						<script src="Comaker2.js" type="text/javascript"></script>
						
						</table>
						
						<table width="720" cellpadding="0" cellspacing="0">
         				<tr><td><hr width=400px size="1" color="#666666" align="left"/></td></tr>
		 				</table>
						
						<table>
						<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Co-Maker No. 1:</font></div></td>
			    	  	<th width="246"><div align="left"><?php echo '<input id="comID1" type="text"  size="21" value="'.$Comakerno.'" required />'; ?>
						<input type="Submit" value="Search" name="fcomaker" onclick="javascript: formProceed.action='NewLoanApp.php?comTag=1'; formProceed.method='GET';" />	
						</div></th><?php echo '<input name="BorrowerNo3" type="hidden"  size="10" value="'.$BID.'" />'; ?>
						<?php echo '<input name="BAdd1" id="BAdd1" type="hidden"  size="30" value="'.$BAdd1.'" readonly />'; ?>
						</tr>
						
						
				  		<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Comaker Name 1:</font></div></td>
			    	  	<th width="300"><div align="left"><?php echo '<input name="ComakerName" id="comName1" type="text"  size="30" value="'.$ComakerName.'" />'; ?>
						<a id="Amortization" href="#" onclick="Comaker1();return false;" style="text-decoration:none;">View</a>
						</div></th>
				  		</tr>
						
						<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right"class="style13 style2"><font face="Century Gothic">Relation to Borrower:</font></div></td>
			    	  	<th width="246"><div align="left"><?php echo '<input name="Rel1" id="Rel1" type="text"  size="30" value="'.$Rel1.'" />'; ?>
						</div></th>
				  		</tr>
						
						
						<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Known to Borrower:</font></div></td>
			    	  	<th width="246"><div align="left"><?php echo '<input name="Known1" id="Known1" type="text"  size="30" value="'.$Known1.'" />'; ?>
						</div></th>
				  		</tr>
						
						
							<?Php
							
							
								$sqlC = "Select * From Comaker where comakerno = '".$Comakerno."'";
								$rsC = odbc_exec($conn,$sqlC);
								$BrC = odbc_result($rsC,"firstname")." ".odbc_result($rsC,"middlename")." ".odbc_result($rsC,"lastname");
								$BrC = strtoupper($BrC);
								echo '<input id="CNAME1" type="hidden"  size="30" value="'.$BrC.'" />';
								echo '<input id="CAGE1" type="hidden"  size="30" value="'.odbc_result($rsC,"age").'" />';
								echo '<input id="CSEX1" type="hidden"  size="30" value="'.odbc_result($rsC,"sex").'" />';
								echo '<input id="CSTATUS1" type="hidden"  size="30" value="'.odbc_result($rsC,"marstatus").'" />';
								echo '<input id="CADD1" type="hidden"  size="30" value="'.odbc_result($rsC,"address").'" />';
								echo '<input id="CSPOUSE1" type="hidden"  size="30" value="'.odbc_result($rsC,"spouse").'" />';
								echo '<input id="CTEL1" type="hidden"  size="30" value="'.odbc_result($rsC,"telno").'" />';
								echo '<input id="CDEP1" type="hidden"  size="30" value="'.odbc_result($rsC,"dependents").'" />';
								echo '<input id="CCOMPADD1" type="hidden"  size="30" value="'.odbc_result($rsC,"companyAdd").'" />';
								echo '<input id="COWNRES1" type="hidden"  size="30" value="'.odbc_result($rsC,"OwnRes").'" />';
								echo '<input id="CRENTAL1" type="hidden"  size="30" value="'.odbc_result($rsC,"Rental").'" />';
								echo '<input id="CCOMP1" type="hidden"  size="30" value="'.odbc_result($rsC,"company").'" />';
								echo '<input id="CSERVICE1" type="hidden"  size="30" value="'.odbc_result($rsC,"lenghtService").'" />';
								echo '<input id="CSAL1" type="hidden"  size="30" value="'.odbc_result($rsC,"salary").'" />';
								echo '<input id="CPOS1" type="hidden"  size="30" value="'.odbc_result($rsC,"position").'" />';
								echo '<input id="CCURR1" type="hidden"  size="30" value="'.odbc_result($rsC,"currentAccnt").'" />';
								echo '<input id="CSAV1" type="hidden"  size="30" value="'.odbc_result($rsC,"savingsAccnt").'" />';
								
								echo '<input id="TIN1" type="hidden"  size="30" value="'.odbc_result($rsC,"tin").'" />';
								echo '<input id="SSS1" type="hidden"  size="30" value="'.odbc_result($rsC,"sss").'" />';
								
								echo '<input id="COMREL1" type="hidden"  size="30" value="'.$Rel1.'" />';
								echo '<input id="COMKNOWN1" type="hidden"  size="30" value="'.$Known1.'" />';
	
								
								

							?>
						
						</table>
						
						<table width="720" cellpadding="0" cellspacing="0">
         				<tr><td><hr width=400px size="1" color="#666666" align="left"/></td></tr>
		 				</table>
						
						<table>
						<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Co-Maker No. 2:</font></div></td>
			    	  	<th width="246"><div align="left"><?php echo '<input id="comID2" type="text"  size="21" value="'.$Comakerno2.'" />'; ?>
						<input type="Submit" value="Search" name="fcomaker2" onclick="javascript: form2.action='NewLoanApp.php'; form2.method='GET';" />	
						</div></th><?php echo '<input name="BorrowerNo3" type="hidden"  size="10" value="'.$BID.'" />'; ?>
						<?php echo '<input name="BAdd2" id="BAdd2" type="hidden"  size="30" value="'.$BAdd2.'" readonly />'; ?>
						</tr>
						
						<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Comaker Name 2:</font></div></td>
			    	  	<th width="246"><div align="left"><?php echo '<input name="ComakerName2" id="comName2" type="text"  size="30" value="'.$ComakerName2.'" />'; ?>
						<a id="Amortization" href="#" onclick="Comaker2();return false;" style="text-decoration:none;">View</a>
						</div></th>
				  		</tr>
						
						
						<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right"class="style13 style2"><font face="Century Gothic">Relation to Borrower:</font></div></td>
			    	  	<th width="246"><div align="left"><?php echo '<input name="Rel2" id="Rel2" type="text"  size="30" value="'.$Rel2.'" />'; ?>
						</div></th>
				  		</tr>
						
						
						<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Known to Borrower:</font></div></td>
			    	  	<th width="246"><div align="left"><?php echo '<input name="Known2" id="Known2" type="text"  size="30" value="'.$Known2.'" />'; ?>
						</div></th>
				  		</tr>
						
						
						
						
						<?Php
							
							
								$sqlC = "Select * From Comaker where comakerno = '".$Comakerno2."'";
								$rsC = odbc_exec($conn,$sqlC);
								$BrC = odbc_result($rsC,"firstname")." ".odbc_result($rsC,"middlename")." ".odbc_result($rsC,"lastname");
								$BrC = strtoupper($BrC);
								echo '<input id="CNAME2" type="hidden"  size="30" value="'.$BrC.'" />';
								echo '<input id="CAGE2" type="hidden"  size="30" value="'.odbc_result($rsC,"age").'" />';
								echo '<input id="CSEX2" type="hidden"  size="30" value="'.odbc_result($rsC,"sex").'" />';
								echo '<input id="CSTATUS2" type="hidden"  size="30" value="'.odbc_result($rsC,"marstatus").'" />';
								echo '<input id="CADD2" type="hidden"  size="30" value="'.odbc_result($rsC,"address").'" />';
								echo '<input id="CSPOUSE2" type="hidden"  size="30" value="'.odbc_result($rsC,"spouse").'" />';
								echo '<input id="CTEL2" type="hidden"  size="30" value="'.odbc_result($rsC,"telno").'" />';
								echo '<input id="CDEP2" type="hidden"  size="30" value="'.odbc_result($rsC,"dependents").'" />';
								echo '<input id="CCOMPADD2" type="hidden"  size="30" value="'.odbc_result($rsC,"companyAdd").'" />';
								echo '<input id="COWNRES2" type="hidden"  size="30" value="'.odbc_result($rsC,"OwnRes").'" />';
								echo '<input id="CRENTAL21" type="hidden"  size="30" value="'.odbc_result($rsC,"Rental").'" />';
								echo '<input id="CCOMP2" type="hidden"  size="30" value="'.odbc_result($rsC,"company").'" />';
								echo '<input id="CSERVICE2" type="hidden"  size="30" value="'.odbc_result($rsC,"lenghtService").'" />';
								echo '<input id="CSAL2" type="hidden"  size="30" value="'.odbc_result($rsC,"salary").'" />';
								echo '<input id="CPOS2" type="hidden"  size="30" value="'.odbc_result($rsC,"position").'" />';
								echo '<input id="CCURR2" type="hidden"  size="30" value="'.odbc_result($rsC,"currentAccnt").'" />';
								echo '<input id="CSAV2" type="hidden"  size="30" value="'.odbc_result($rsC,"savingsAccnt").'" />';
								
								echo '<input id="TIN2" type="hidden"  size="30" value="'.odbc_result($rsC,"tin").'" />';
								echo '<input id="SSS2" type="hidden"  size="30" value="'.odbc_result($rsC,"sss").'" />';
								
								echo '<input id="COMREL2" type="hidden"  size="30" value="'.$Rel2.'" />';
								echo '<input id="COMKNOWN2" type="hidden"  size="30" value="'.$Known2.'" />';
	
								
								

							?>
						
      				
						
						</table>
						
						<table width="720" cellpadding="0" cellspacing="0">
         				<tr><td><hr width=400px size="1" color="#666666" align="left"/></td></tr>
		 				</table>
						
						<table>
						
						
				

                 		<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Payment Frequency:</font></div></td>
			    	  	<th width="246"><div align="left">
						<select name="payFrequency" id="payFrequency" style="width:206px; margin-left:2px;">
								<?Php echo '<option value="'.$PayFreq.'">'.$PayFreq.'</option>'; ?>
  								<option value="Daily">Daily</option>
  								<option value="Weekly">Weekly</option>
								<option value="Semi-Monthly">Semi-Monthly</option>
  								<option value="Monthly">Monthly</option>
						</select>		
						</div></th>
				  		</tr>
						
						  <?php echo '<input name="LoanID" type="hidden"  size="30" value="'.$LoanID.'" required />'; ?>
						  <?php echo '<input name="BID" type="hidden"  size="30" value="'.$BID.'" required />'; ?>
						  <?php echo '<input name="EID" type="hidden"  size="30" value="'.$EmpNo.'" required />'; ?>
						  <?php echo '<input name="BName" type="hidden"  size="30" value="'.$BName.'" required />'; ?>
						  <?php echo '<input name="BCom" type="hidden"  size="30" value="'.$BCom.'" required />'; ?>
						  <?php echo '<input name="BPos" type="hidden"  size="30" value="'.$BPos.'" required />'; ?>
						  <?php echo '<input name="BStat" type="hidden"  size="30" value="'.$BStat.'" required />'; ?>
						  <?php echo '<input name="BAdd" id="BAdd" type="hidden"  size="30" value="'.$BAdd.'" readonly />'; ?>	
						  <?php echo '<input name="BSpouse" id="BSpouse" type="hidden"  size="30" value="'.$BSpouse.'" required />'; ?>
						  
						  
						  <?php echo '<input name="LoanAmount" type="hidden"  size="30" value="'.$LoanAmount.'" required />'; ?>
						  <?php echo '<input name="Comakerno" type="hidden"  size="30" value="'.$Comakerno.'" required />'; ?>
						  <?php echo '<input name="ComakerName" type="hidden"  size="30" value="'.$ComakerName.'" required />'; ?>
						  <?php echo '<input name="Comakerno2" type="hidden"  size="30" value="'.$Comakerno2.'" required />'; ?>
						  <?php echo '<input name="ComakerName2" type="hidden"  size="30" value="'.$ComakerName2.'" required />'; ?>
						  <?php echo '<input name="LoanTerm" type="hidden"  size="30" value="'.$LoanTerm.'" required />'; ?>
						  <?php echo '<input name="pcode" type="hidden"  size="30" value="'.$prodCode.'" required />'; ?>
	
						  <input name="pname" id="ProdName" type="hidden"  size="30" value="<?php echo $prodName ?>" required />
						  <input name="LoanID" id="LoanNumber" type="hidden"  size="30" value=" <?php echo  $LoanID ?>" required />
						  <?php echo '<input name="BAdd1" id="BAdd1" type="hidden"  size="30" value="'.$BAdd1.'" readonly />'; ?>
						  <?php echo '<input name="BAdd2" id="BAdd2" type="hidden"  size="30" value="'.$BAdd2.'" readonly />'; ?>
	
						  <?php

						  		$sqlN = "Select * From Borrower where borrowerno = '".$BID."'";
								$rsN = odbc_exec($conn,$sqlN);
								$BrN = odbc_result($rsN,"firstname")." ".odbc_result($rsN,"mi")." ".odbc_result($rsN,"lastname");
								$BrN = strtoupper($BrN);
								
								echo '<input name="FORMATNAME" id="FORMATNAME" type="hidden"  size="30" value="'.$BrN.'" />';
								echo '<input name="BDATE" id="BDATE" type="hidden"  size="30" value="'.odbc_result($rsN,"birthdate").'" />';
								echo '<input name="BPLACE" id="BPLACE" type="hidden"  size="30" value="'.odbc_result($rsN,"birthplace").'" />';
								echo '<input name="CSTATUS" id="CSTATUS" type="hidden"  size="30" value="'.odbc_result($rsN,"civilstatus").'" />';
								echo '<input name="SPOUSE" id="SPOUSE" type="hidden"  size="30" value="'.odbc_result($rsN,"spousename").'" />';
								echo '<input name="SPOUSE" id="NOCHILDREN" type="hidden"  size="30" value="'.odbc_result($rsN,"NoChildren").'" />';	
								echo '<input name="SPOUSE" id="RADD" type="hidden"  size="30" value="'.odbc_result($rsN,"residenceadd").'" />';
								echo '<input name="SPOUSE" id="TELNO" type="hidden"  size="30" value="'.odbc_result($rsN,"TelNo").'" />';
								echo '<input name="SPOUSE" id="RESOWN" type="hidden"  size="30" value="'.odbc_result($rsN,"ResOwner").'" />';
								echo '<input name="SPOUSE" id="DEPOSITOR" type="hidden"  size="30" value="'.odbc_result($rsN,"Depositor").'" />';
								echo '<input name="SPOUSE" id="LATESTBAL" type="hidden"  size="30" value="'.odbc_result($rsN,"LatestBalance").'" />';
								echo '<input name="SPOUSE" id="EDUC" type="hidden"  size="30" value="'.odbc_result($rsN,"Education").'" />';
								echo '<input name="SPOUSE" id="BACCOUNT" type="hidden"  size="30" value="'.odbc_result($rsN,"BankAccount").'" />';
								echo '<input name="SPOUSE" id="EMPLOYER" type="hidden"  size="30" value="'.odbc_result($rsN,"Employer").'" />';
								echo '<input name="SPOUSE" id="COMPADD" type="hidden"  size="30" value="'.odbc_result($rsN,"CompanyAdd").'" />';
								echo '<input name="SPOUSE" id="SERVICE" type="hidden"  size="30" value="'.odbc_result($rsN,"Service").'" />';
								echo '<input name="SPOUSE" id="SALARY" type="hidden"  size="30" value="'.odbc_result($rsN,"Salary").'" />';
								echo '<input name="SPOUSE" id="POSITION" type="hidden"  size="30" value="'.odbc_result($rsN,"Position").'" />';			
								echo '<input name="SPOUSE" id="STATUS" type="hidden"  size="30" value="'.odbc_result($rsN,"Status").'" />';	
								echo '<input name="SPOUSE" id="RENTAL" type="hidden"  size="30" value="'.odbc_result($rsN,"rental").'" />';		
								
								echo '<input id="Officer1" type="hidden"  size="30" value="0" />';
								echo '<input id="Officer2" type="hidden"  size="30" value="0" />';		

						  ?>
				  		<tr>
				  		  <th>&nbsp;</th>
				  		  <td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Loan Purpose:</font></div></td>
						  <td><?php echo '<input name="LPurpose" id="LPurpose" type="text"  size="30" value="'.$LPurpose.'" />'; ?></td>
				  		  <th><div align="left"></div></th>
				  		</tr>						
						
				  		<tr>
				  		  <th>&nbsp;</th>
				  		  <td>&nbsp;</td>
				  		  <th>
						  <script src="EIRCompute.js" type="text/javascript"></script>
						  <script src="EIR.js" type="text/javascript"></script>
				  		    <div align="left">
				  		      <input name="ProceedLoan" type="submit" onclick="javascript: formProceed.action='NewLoanProceed.php'; formProceed.method='GET';" value="Proceed" />
		  		            </div></th>
				  		</tr>
						
				  		<tr>
				  		  <th>&nbsp;</th>
				  		  <td>&nbsp;</td>
				  		  <td>&nbsp;</td>
				  		</tr>
					</table>		
				</td>
            </tr>
         <tr height="15">
         </tr>
         </table>
			

         <table width="720" cellpadding="0" cellspacing="0">
		  <tr>
            <td width="478"><div align="center"><span class="style3">LOAN DETAILS</span></div></td>
            <td width="126"></td>
          </tr>
         <tr>
		 </tr>
         <tr>
         <td><hr width=654px size="1" color="#666666" align="left"/></td>
         </tr>
		 
		 </table>



		<!--- View Loan Details -------------------------------------------------------------------------------------->
		<?Php 
		$LoanID = trim($LoanID);
		$LoanIDSub = substr($LoanID,-9);
		echo '<input id="subCode" type="hidden"  size="30" value="'.$LoanIDSub.'" required />';			  
		$LoanIDCode = substr($LoanID,0,4);
		 $AmortSched = "";
		 
		if ($LoanIDCode == "QSAL") { $AmortSched = "Amortization_Dim();return false;"; }
		else { $AmortSched = "Amortization_AddOn();return false;"; }
		echo '<input id="LoanIDCode" type="hidden"  size="30" value="'.$LoanIDCode.'" required />';

		$sql00 = "Select * From InterestRate where productcode = '".$prodCode."'";
		$rs00 = odbc_exec($conn,$sql00);
		$InterestRate = odbc_result($rs00,"interestrate");
		$InterestRate = number_format($InterestRate,3,'.','');
		include 'LoanApplication.php';
		$AmortMonthly = $PrincipalVal + $InterestVal + $GRTVal;
		$AmortMonthly = $AmortMonthly * 2;
		?>
		
		
		
        <table cellpadding="0" cellspacing="0">

		  <tr>
          <th>&nbsp;</th>
          </tr>
					
          <tr>
            <td width="713"><table width="604" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="177" height="20"><div align="right" class="style13 style2"><font face="Century Gothic">Interest Rate:</font></div></td>
                  <th width="132"><div align="left"><input name="InterestRate" id="IntRate" style="text-align:right;" type="text"  size="12" value="<?Php echo $InterestRate ?>" readonly /></div></th>
				  <td width="142"><div align="right" class="style13 style2"><font face="Century Gothic">Service Charge:</font></div></td>
                  <th width="151"><div align="left"><input name="ServiceCharge" id="ServCharge" style="text-align:right;" type="text"  size="12" value="<?Php echo $ServiceCharge ?>" readonly /></div></th>
                </tr>
				
				<tr>
                  <td width="177"><div align="right" class="style13 style2"><font face="Century Gothic">Processing Fee:</font></div></td>
                  <th width="132"><div align="left"><input name="ProcessingFee" id="ProcFee" style="text-align:right;" type="text"  size="12" value="<?Php echo $ProcessFee ?>" readonly/></div></th>
				  <td width="142"><div align="right" class="style13 style2"><font face="Century Gothic">Documentary Stamp:</font></div></td>
                  <th width="151"><div align="left"><input name="DocumentaryStamp" id="DocStamp" style="text-align:right;" type="text"  size="12" value="<?Php echo $DocStampFee ?>" readonly/></div></th>
                </tr>
				
				<tr>
                  <td width="177"><div align="right" class="style13 style2"><font face="Century Gothic">Membership Fee:</font></div></td>
                  <th width="132"><div align="left"><input name="MembershipFee" id="MemFee" style="text-align:right;" type="text"  size="12" value="<?Php echo $MembershipFee ?>" readonly/></div></th>
				  <td width="142"><div align="right" class="style13 style2"><font face="Century Gothic">Notarial Fee:</font></div></td>
                  <th width="151"><div align="left"><input name="NotarialFee" id="NotFee" style="text-align:right;" type="text"  size="12" value="<?Php echo $NotarialFee ?>" readonly/></div></th>
                </tr>
				
				<tr>
                  <td width="177"><div align="right" class="style13 style2"><font face="Century Gothic">MRI:</font></div></td>
                  <th width="132"><div align="left"><input name="MRI" id="MRI" style="text-align:right;"  type="text"  size="12" value="<?Php echo $MRI ?>" readonly/></div></th>
				  <td width="142"><div align="right" class="style13 style2"><font face="Century Gothic">Credit Ratio:</font></div></td>
                  <th width="151"><div align="left"><input name="MEIR" id="MEIR" style="text-align:right;" type="text"  size="12" value="<?Php echo $CRatio ?>" readonly/></div></th>
                </tr>
				
				<tr>
                  <td width="177"><div align="right" class="style13 style2"><font face="Century Gothic">APL:</font></div></td>
                  <th width="132"><div align="left"><input name="APL" id="APLFee" style="text-align:right;" type="text"  size="12" value="<?Php echo $APLFee ?>" readonly/></div></th>
				  <td width="142"><div align="right" class="style13 style2"><font face="Century Gothic">EIR:</font></div></td>
                  <th width="201"><div align="left"><input name="EIRSample" id="EIRSample" style="text-align:right;" type="text"  size="12" value="" readonly/><a id="Amortization" href="#" onclick="Diminishing(); return false;" style="text-decoration:none;"> Compute</a><br /></div></th>
                </tr>
				
				<tr>
                  <td width="177"><div align="right" class="style13 style2"><font face="Century Gothic">Mode:</font></div></td>
                  <th width="132"><div align="left">
				  <select id="DeductM" name="DeductMode" style="width:99px; margin-left:2px;" >
  								<option value="Deducted" selected="selected">Deducted</option>
  								<option value="Not deducted">Not deducted</option>
				  </select>
				  </div></th>
				  <td width="142"><div align="right" class="style13 style2"><font face="Century Gothic">Monthly Amortization:</font></div></td>
                  <th width="151"><div align="left"><input style="text-align:right;" type="text"  size="12" value="<?Php echo $AmortMonthly ?>" /></div></th>
                </tr>
				
                <tr>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
				  <th>&nbsp;</th>
                  <th><div align="left"></div></th>
                </tr>
				
				<tr>
                  <th>&nbsp;</th>
                  <th><div align="left">
				  
				 	<input name="Prin" id="Prin" type="text" value="<?Php echo $PrincipalVal ?>" />
					<input name="Int" id="Int" type="text" value="<?Php echo $InterestVal ?>" />
					<input name="GRT" id="GRT" type="text" value="<?Php echo $GRTVal ?>" />
					<input name="Amortz" id="Amortz" type="text" value="<?Php echo ($AmortMonthly) ?>" />
                    <input name="btnEdit" id="bEdit" type="button" onclick="EditValues()" value="Edit" />
                    <input name="btnSave" id="bSave" type="button" onclick="SaveValues()" value="Save" disabled="disabled"/>
					<input name="LPURPOSE" id="LPURPOSE" type="hidden" value="" />
					<input name="DATEAPPROVED" id="DATEAPPROVED" type="hidden"  value="" />
					<input type="hidden" name="DATERELEASED"  id="DATERELEASED" value="" />
					<input type="hidden" name="DATEMATURE"  id="DATEMATURE" value="" />
					<input type="hidden" name="MonthlyInstall"  id="MonthlyInstall" value="" />
				  	<?Php $Semi = $PrincipalVal + $InterestVal + $GRTVal; ?>
                  </div></th>
				  <th>
				    <div align="left">
					  
			        </div></th><th>&nbsp;</th>
                </tr>
				
               
				
            </table></td>
          </tr>
          <tr height="15"> </tr>
        </table>
		
		
		
		
		<!-- Amortization-->
		
		
		<table width="720" cellpadding="0" cellspacing="0">
		  <tr>
            <td width="478"><div align="center"><span class="style7">Amortization Details</span></div></td>
            <td width="126"></td>
          </tr>
         <tr>
        	<td><hr width=654px size="1" color="#666666" align="left"/></td>
         </tr>
		</table>
		
		
		 
		<table>
		
			<?Php
			$sqlB = "Select * From Company where branchname = '".$BCom."'";
			$rsB = odbc_exec($conn,$sqlB);
			$Bdate1 = odbc_result($rsB,"date1");
			$Bdate2 = odbc_result($rsB,"date2");
			?>
			
            <tr>
                  <td width="176" height="20"><div align="right" class="style13 style2"><font face="Century Gothic">Start Date:</font></div></td>
                  <td width="276"><div align="left"><input type="date" size="15" name="strDate" id="strDate" value="" /></div> </td>
            </tr>
			
			<tr>
                  <td width="176" height="20"><div align="right" class="style13 style2"><font face="Century Gothic">Due Date 1:</font></div></td>
                  <td width="276"><div align="left"><input type="text" size="10" name="strDate1" id="strDate1" value="<?Php echo $Bdate1 ?>" /></div></td>
            </tr>
			
			
			<tr>
                  <td width="176" height="20"><div align="right" class="style13 style2"><font face="Century Gothic">Due Date 2:</font></div></td>
                  <td width="276"><div align="left"><input type="text" size="10" name="strDate2" id="strDate2" value="<?Php echo $Bdate2 ?>" /></div></td>
            </tr>
			
			
			<script src="Schedule_Dim.js" type="text/javascript"></script>
			<script src="Schedule_AddOn.js" type="text/javascript"></script>
			<script src="PromissoryNote.js" type="text/javascript"></script>
			<script src="towords.js" type="text/javascript"></script>
			<script src="Disclosure.js" type="text/javascript"></script>
			<script src="ADA.js" type="text/javascript"></script>
			<script src="Application.js" type="text/javascript"></script>

			
			<tr>
			<td></td>
			<th width="151"><div align="left" class="style13 style2"><font face="Century Gothic"> 
			<a id="Amortization" href="#" onclick="<?php echo $AmortSched ?>" style="text-decoration:none;">Amortization Schedule</a></div></th>
			</tr>

		</table>
		
		<table>
			 <tr>
        	<td><hr width=654px size="1" color="#666666" align="left"/></td>
         </tr>
			
		</table>
		
		
		
		
		
		<table cellpadding="0" cellspacing="0">
	
          <tr>
            <td width="713"><table width="454" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="176" height="20"><div align="right" class="style13 style2"><font face="Century Gothic">Loan Amount:</font></div></td>
                  <th width="276"><div align="left"><input name="LoanAmount2" id="LoanAmnt" style="text-align:right;"  type="text"  size="20" value="<?Php echo $LoanAmount ?>" readonly /></div></th>
				  <input name="pname2" type="hidden"  size="30" value="<?php echo $prodName ?>" required />
                </tr>
				
				<tr>
                  <td width="176" height="20"><div align="right" class="style13 style2"><font face="Century Gothic">Total Deductions:</font></div></td>
                  <th width="276"><div align="left"><input name="TotalDeduct" id="TotalD" style="text-align:right;" type="text"  size="20" value="<?Php echo $TotalDeductions ?>" readonly /></div></th>
                </tr>
				
				<tr>
                  <td width="176" height="20"><div align="right" class="style13 style2"><font face="Century Gothic">Net Proceeds:</font></div></td>
                  <th width="276"><div align="left"><input name="NetProceeds" id="NetP" style="text-align:right;" type="text"  size="20" value="<?Php echo $NetProceeds ?>" readonly /></div></th>
                </tr>
				
				<tr>
                  <td width="176" height="20"><div align="right" class="style13 style2"><font face="Century Gothic"></font></div></td>
				  <?Php $BIDencode = base64_encode($BID); ?>
                  <th width="276"><div align="left"><a id="Amortization" href="Evaluation.php?BorID=<?Php echo $BIDencode ?>&Amnt=<?Php echo $LoanAmount ?>&Term=<?Php echo $LoanTerm ?>&DateProc=<?Php echo date("m/d/Y"); ?>&LoanID=<?Php echo trim($LoanID) ?>&Monthly=" target="_blank" >Evaluation Sheet</a>
				  </div></th>
                </tr>
				
                <tr>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>
				
				<tr>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>

            </table></td>
          </tr>
          <tr height="15"> </tr>
        </table>
		
		
	
		<?php
			
			$LoanIDCode1 = substr($LoanID,0,4);
			$LoanIDYear = substr($LoanID,5,4);
			$LoanIDNumber = substr($LoanID,10,4);
			echo '<input type="hidden"  size="30" value="'.$LoanIDCode1.'" />';		
			echo '<input type="hidden"  size="30" value="'.$LoanIDYear.'" />';	
			echo '<input type="hidden"  size="30" value="'.$LoanIDNumber.'" />';
			
			
			if (isset($_REQUEST['btnSubmitLoan'])){
				
				$Rel1 = $_REQUEST['Rel1'];
				$Rel2 = $_REQUEST['Rel2'];
				$Known1 = $_REQUEST['Known1'];
				$Known2 = $_REQUEST['Known2'];
				
				$AmortStrDate = $_REQUEST['strDate'];
				
				$AmortStrDate = date_create($AmortStrDate);
				$AmortStrDate = date_format($AmortStrDate,"Y-m-d");
				
				$DMode = $_REQUEST['DeductMode'];
				$EIRValue = $_REQUEST['EIRSample'];
				date_default_timezone_set("Asia/Taipei");
				$Mode = "0";
				$DModeVal = "";
				
				if ($PayFreq == "Daily" ) { $Mode = "1"; }
				else if ($PayFreq == "Semi-Monthly" ) { $Mode = "2"; }
				else if ($PayFreq == "Monthly" ) { $Mode = "3"; }
				else if ($PayFreq == "Weekly" ) { $Mode = "4"; }
				
				
				if ($DMode == "Deducted") { $DModeVal = "1"; }
				else if ($DMode == "Not deducted") { $DModeVal = "2"; }
				
				$sql="INSERT INTO LOANS(productcode,company,loanid,borrowerno,employeeno,name,rate,principal,interest,grt,semi_mo,terms,amountloan,netamount,position,status,loanstatus2,processfee,membershipfee,otherfees,notarialfee,docstampfee,aplfee,MRI,EIR,comakerno1,comakerno2,balance,uncollectedcharge,uncollected_int,penalty_charge,prepay,creditratio,loanstatus,officer1,officer2,officer3,releaseStat,released,type,checknumber,loanpurpose,mode,product,deductionmode,due_date1,due_date2,relation1,relation2,timeknown1,timeknown2,StartAmortDate) VALUES('$prodCode','$BCom','$LoanID','$BID','$EmpNo','$BName','$InterestRate','$PrincipalVal','$InterestVal','$GRTVal','$Semi','$LoanTerm','$LoanAmount','$NetProceeds','$BPos','Current','1','$ProcessFee','0','$ServiceCharge','$NotarialFee','$DocStampFee','$APLFee','$MRI','$EIRValue','$Comakerno','$Comakerno2','$LoanAmount','0','0','0','0','$CRatio','Added','0','0','0','No','0','1','','$LPurpose','$Mode','$prodName','$DModeVal','$Bdate1','$Bdate2','$Rel1','$Rel2','$Known1','$Known2','$AmortStrDate')";
				$rs=odbc_exec($conn,$sql);
				
				
			$sql="UPDATE LOANS set DATE = '".date("Y/m/d h:i:s A")."', DATEAPPLIED = '".date("Y/m/d")."' where LOANID = '".$LoanID."'";
			$rs=odbc_exec($conn,$sql);
			
			
			
			$sql="INSERT INTO LOANIDNUMBER(idcode,idyear,idnumber) VALUES('$LoanIDCode1','$LoanIDYear','$LoanIDNumber')";
			$rs=odbc_exec($conn,$sql);
			
			
	
			echo '<script>';
			echo 'alert("Loan Successfully Added!");';
			echo 'document.location.href="NewLoan.php?pcode='.$prodCode.'";';
			echo '</script>';
			}
		
		?>
		
		<table width="410">
			<tr>
				<td width="173"></td>
                <td width="196"><input type="Submit" name="btnSubmitLoan" id="btnSubmitLoan" value="Save Loan" /></td>
                <td width="25">&nbsp;</td>
            <tr>
		</table>
		</form>
		
		
</body>
</html>