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
								include 'connect.php';
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

			<table cellpadding="0" cellspacing="0">
            	<tr>
				<td width="571">
				
             		<table width="500" cellpadding="0" cellspacing="0">
		     			<tr>
             			<form name="form1">
   					  	<th width="5">&nbsp;</th>
   				  		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic"><strong>Loan Number:</strong></font></div></td>
		   			  	<th width="246"><div align="left"><input name="LoanID" type="text"  size="15" value="<?php echo trim($LoanID) ?>" style="background-color:#33FFFF" />
						<input name="ProductCode" id="ProductCode" type="hidden"  size="15" value="<?php echo substr(trim($LoanID),0,4) ?>" readonly/>
		   			    <input type="Submit" value="Refresh" name="floanid" onclick="javascript: form1.action='NewLoanApp.php'; form1.method='GET';" />
						</div></th>
						<?php echo '<input name="BorrowerNo2" type="hidden"  size="10" value="'.$BID.'" />'; ?>
						<?php echo '<input name="ComNo" type="hidden"  size="10" value="'.$Comakerno.'" />'; ?>
						<?php echo '<input name="BSpouse" id="BSpouse" type="hidden"  size="30" value="'.$BSpouse.'" required />'; ?>
                    	</form>
			 		    </tr>

				  		<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"></div></td>
			    	  	<th width="246"><div align="left">		
						</div></th>
				  		</tr>
						
						
				  		<form name="form2">
						
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
						
						<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Co-Maker No. 1:</font></div></td>
			    	  	<th width="246"><div align="left"><?php echo '<input name="Comakerno" type="text"  size="21" value="'.$Comakerno.'" required />'; ?>
						<input type="Submit" value="Search" name="fcomaker" onclick="javascript: form2.action='NewLoanApp.php'; form2.method='GET';" />	
						</div></th><?php echo '<input name="BorrowerNo3" type="hidden"  size="10" value="'.$BID.'" />'; ?>
						<?php echo '<input name="BAdd1" id="BAdd1" type="hidden"  size="30" value="'.$BAdd1.'" readonly />'; ?>
						</tr>
						
				  		<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Comaker Name 1:</font></div></td>
			    	  	<th width="246"><div align="left"><?php echo '<input name="ComakerName" id="comName1" type="text"  size="30" value="'.$ComakerName.'" />'; ?>
						</div></th>
				  		</tr>
						
						
						<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Co-Maker No. 2:</font></div></td>
			    	  	<th width="246"><div align="left"><?php echo '<input name="Comakerno2" type="text"  size="21" value="'.$Comakerno2.'" />'; ?>
						<input type="Submit" value="Search" name="fcomaker2" onclick="javascript: form2.action='NewLoanApp.php'; form2.method='GET';" />	
						</div></th><?php echo '<input name="BorrowerNo3" type="hidden"  size="10" value="'.$BID.'" />'; ?>
						<?php echo '<input name="BAdd2" id="BAdd2" type="hidden"  size="30" value="'.$BAdd2.'" readonly />'; ?>
						</tr>
						
						<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Comaker Name 2:</font></div></td>
			    	  	<th width="246"><div align="left"><?php echo '<input name="ComakerName2" id="comName2" type="text"  size="30" value="'.$ComakerName2.'" />'; ?>
						</div></th>
				  		</tr>
						
						
      					</form>
						
						
						
						
						<form name= "formProceed" >
						
                 		<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Payment Frequency:</font></div></td>
			    	  	<th width="246"><div align="left">
						<select name="payFrequency" id="payFrequency" style="width:224px; margin-left:2px;">
								<?Php echo '<option value="'.$PayFreq.'">'.$PayFreq.'</option>'; ?>
  								<option value="Daily">Daily</option>
  								<option value="Weekly">Weekly</option>
								<option value="Semi-Monthly">Semi-Monthly</option>
  								<option value="Monthly">Monthly</option>
						</select>		
						</div></th>
				  		</tr>
							
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
				  		<tr>
				  		  <th>&nbsp;</th>
				  		  <td>&nbsp;</td>
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
						</form>
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
		include 'LoanApplication.php';
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
				  <td width="142"></td>
                  <th width="151"></th>
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
				  
				 
                    <input name="btnEdit" id="bEdit" type="button" onclick="EditValues()" value="Edit" />
                    <input name="btnSave" id="bSave" type="button" onclick="SaveValues()" value="Save" disabled="disabled"/>
					<input name="Prin" id="Prin" type="hidden" value="<?Php echo $PrincipalVal ?>" />
					<input name="Int" id="Int" type="hidden" value="<?Php echo $InterestVal ?>" />
					<input name="GRT" id="GRT" type="hidden" value="<?Php echo $GRTVal ?>" />
					<input name="Amortz" id="Amortz" type="hidden" value="<?Php echo ($PrincipalVal + $InterestVal + $GRTVal) ?>" />
			
				  
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

            <tr>
                  <td width="176" height="20"><div align="right" class="style13 style2"><font face="Century Gothic">Start Date:</font></div></td>
                  <td width="276"><div align="left"><input type="date" size="15" name="strDate" id="strDate" value="" /></div></td>
            </tr>
			
			<tr>
                  <td width="176" height="20"><div align="right" class="style13 style2"><font face="Century Gothic">Due Date 1:</font></div></td>
                  <td width="276"><div align="left"><input type="text" size="10" name="strDate1" id="strDate1" value="" /></div></td>
            </tr>
			
			
			<tr>
                  <td width="176" height="20"><div align="right" class="style13 style2"><font face="Century Gothic">Due Date 2:</font></div></td>
                  <td width="276"><div align="left"><input type="text" size="10" name="strDate2" id="strDate2" value="" /></div></td>
            </tr>
			
			
			<script src="Schedule_Dim.js" type="text/javascript"></script>
			<script src="PromissoryNote.js" type="text/javascript"></script>
			<script src="towords.js" type="text/javascript"></script>
			<script src="Disclosure.js" type="text/javascript"></script>
			<script src="ADA.js" type="text/javascript"></script>
			
			<tr>
			<td></td>
			<th width="151"><div align="left" class="style13 style2"><font face="Century Gothic">
			<a id="Amortization" href="#" onclick="ADA();return false;" style="text-decoration:none;">ADA</a></font> </div></th>
			</tr>
			
			
			<tr>
			<td></td>
			<th width="151"><div align="left" class="style13 style2"><font face="Century Gothic">
			<a id="Amortization" href="#" onclick="ADA();return false;" style="text-decoration:none;">Application</a></font> </div></th>
			</tr>
			
			
			<tr>
			<td></td>
			<th width="151"><div align="left" class="style13 style2"><font face="Century Gothic"> 
			<a id="Amortization" href="#" onclick="Amortization_Dim();return false;" style="text-decoration:none;">Amortization</a></div></th>
			</tr>
			
			<tr>
			<td></td>
			<th width="151"><div align="left" class="style13 style2"><font face="Century Gothic">
			<a id="Amortization" href="#" onclick="Promissory();return false;" style="text-decoration:none;">Promissory Note</a></font> </div></th>
			</tr>
			
			<tr>
			<td></td>
			<th width="151"><div align="left" class="style13 style2"><font face="Century Gothic">
			<a id="Amortization" href="#" onclick="Disclosure1();return false;" style="text-decoration:none;">Disclosure</a></font> </div></th>
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
		
		
		
		
</body>
</html>