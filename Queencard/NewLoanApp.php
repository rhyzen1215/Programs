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

			?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style2 {font-size: 12px}

.styleText {text-align:right}
-->
select
{
	width: 224px;
	margin-left:2px;
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

<script>

	function validateForm() {
	
    var Brw = document.forms["form"]["BorrowerNo"].value;
	var LoanNum = document.forms["form1"]["LoanID"].value;
	var CmkrNo = document.forms["form2"]["ComNo"].value;
	var Freq = document.forms["formProceed"]["payFrequency"].value;
	var Amnt = document.forms["form2"]["LoanAmount"].value;
	var Trm = document.forms["form2"]["LoanTerm"].value;
	
    if (Brw == null || Brw == "") {alert("Borrower ID must be filled out"); return false;}
	if (LoanNum == null || LoanNum == "") {alert("Loan Number must be filled out"); return false;}
	if (Amnt == null || Amnt == "") {alert("Loan amount must be filled out"); return false;}
	if (CmkrNo == null || CmkrNo == "") {alert("Comaker ID must be filled out"); return false;}
	if (Trm == null || Trm == "") {alert("Loan Term must be filled out"); return false;}
	if (Freq == null || Freq == "" || Freq == "--select--") {alert("Payment Frequency must be filled out"); return false;}
	
	
}

</script>
</head>

<body>
            
		<?php
		
			$BID = "";
			$EmpNo = "";
			$BName = "";
			$BCom = "";
			$BPos = "";
			$BStat = "";
			$BAdd = "";
			$LoanID = "";
			$LoanAmount = "";
			$Comakerno = "";
			$ComakerName = "";
			$Comakerno2 = "";
			$ComakerName2 = "";
			$LoanTerm = 0;
			$BAdd = "";
			$BAdd1 = "";
			$BAdd2 = "";
			$LPurpose = "";
			$Rel1 = "";
			$Rel2 = "";
			$Known1 = "";
			$Known2 = "";
			

			
			if (isset($_GET['fetchData'])){
			
			$prodCode = $_REQUEST['pcode'];
			$BID = $_REQUEST['BorrowerNo'];
			
			
			$sql1="SELECT TOP 1 * FROM LoanIDNumber where idcode ='".$prodCode."' order by idyear DESC, idnumber DESC";
			$rs1=odbc_exec($conn,$sql1);
			$IDCode = odbc_result($rs1,"idnumber");
			$IDCode = $IDCode + 1;
			$CodeLen = strlen($IDCode);
			if ($CodeLen == 1 ) { $IDCode = "000".$IDCode; }
			else if ($CodeLen == 2 ) { $IDCode = "00".$IDCode; }
			else if ($CodeLen == 3 ) { $IDCode = "0".$IDCode; }
			else if ($CodeLen == 4 ) { $IDCode = $IDCode; }
			$LoanID = odbc_result($rs1,"idcode") . "-" . odbc_result($rs1,"idyear") . "-" . $IDCode;
			$LoanID = strtoupper($LoanID);
			
			$BID = $_REQUEST['BorrowerNo'];
			$sql="SELECT * FROM Borrower where Borrowerno ='".$BID."'";
			$rs=odbc_exec($conn,$sql);
			$EmpNo = odbc_result($rs,"employeeno");
			$BName = odbc_result($rs,"lastname") . ", " . odbc_result($rs,"firstname") . " " . substr(odbc_result($rs,"MI"),0,1) . ".";
			$BCom = odbc_result($rs,"company");
			$BPos = odbc_result($rs,"position");
			$BStat = odbc_result($rs,"status");
			$BSpouse = odbc_result($rs,"spousename");
			$BAdd = odbc_result($rs,"ResidenceAdd");
			$BAdd = strtoupper($BAdd);
			$BSpouse = strtoupper($BSpouse);
			$BName = strtoupper($BName);
			$BCom = strtoupper($BCom);
			$BPos = strtoupper($BPos);
			$BStat = strtoupper($BStat);
			
			}
			
			if (isset($_GET['floanid'])){
			
			$prodCode = $_REQUEST['pcode'];
			
			$sql1="SELECT TOP 1 * FROM LoanIDNumber where idcode ='".$prodCode."' order by idyear DESC, idnumber DESC";
			$rs1=odbc_exec($conn,$sql1);
			$IDCode = odbc_result($rs1,"idnumber");
			$IDCode = $IDCode + 1;
			$CodeLen = strlen($IDCode);
			if ($CodeLen == 1 ) { $IDCode = "000".$IDCode; }
			else if ($CodeLen == 2 ) { $IDCode = "00".$IDCode; }
			else if ($CodeLen == 3 ) { $IDCode = "0".$IDCode; }
			else if ($CodeLen == 4 ) { $IDCode = $IDCode; }
			$LoanID = odbc_result($rs1,"idcode") . "-" . odbc_result($rs1,"idyear") . "-" . $IDCode;
			$LoanID = strtoupper($LoanID);
			
			
			$BID = $_REQUEST['BorrowerNo2'];
			$sql="SELECT * FROM Borrower where Borrowerno ='".$BID."'";
			$rs=odbc_exec($conn,$sql);
			$EmpNo = odbc_result($rs,"employeeno");
			$BName = odbc_result($rs,"lastname") . ", " . odbc_result($rs,"firstname") . " " . substr(odbc_result($rs,"MI"),0,1) . ".";
			$BCom = odbc_result($rs,"company");
			$BPos = odbc_result($rs,"position");
			$BStat = odbc_result($rs,"status");
			$BSpouse = odbc_result($rs,"spousename");
			$BAdd = odbc_result($rs,"ResidenceAdd");
			$BAdd = strtoupper($BAdd);
			$BSpouse = strtoupper($BSpouse);
			$BName = strtoupper($BName);
			$BCom = strtoupper($BCom);
			$BPos = strtoupper($BPos);
			$BStat = strtoupper($BStat);
			}
			
			
			if (isset($_REQUEST['comaker'])){
			
			$prodName = $_REQUEST['pname'];
			$prodCode = $_REQUEST['pcode'];
			$LoanTerm = $_REQUEST['LoanTerm'];
			$LoanAmount = $_REQUEST['LoanAmount'];
			$BID = $_REQUEST['BorrowerNo3'];
			$comTag = $_REQUEST['comTag'];
			$LoanID = $_REQUEST['LoanID'];
			$Rel1 = $_REQUEST['Rel1'];
			$Rel2 = $_REQUEST['Rel2'];
			$Known1 = $_REQUEST['Known1'];
			$Known2 = $_REQUEST['Known2'];
			
			$sql1="SELECT TOP 1 * FROM LoanIDNumber where idcode ='".$prodCode."' order by idyear DESC, idnumber DESC";
			$rs1=odbc_exec($conn,$sql1);
			$IDCode = odbc_result($rs1,"idnumber");
			$IDCode = $IDCode + 1;
			$CodeLen = strlen($IDCode);
			if ($CodeLen == 1 ) { $IDCode = "000".$IDCode; }
			else if ($CodeLen == 2 ) { $IDCode = "00".$IDCode; }
			else if ($CodeLen == 3 ) { $IDCode = "0".$IDCode; }
			else if ($CodeLen == 4 ) { $IDCode = $IDCode; }
			$LoanID = odbc_result($rs1,"idcode") . "-" . odbc_result($rs1,"idyear") . "-" . $IDCode;
			$LoanID = strtoupper($LoanID);

			$sql="SELECT * FROM Borrower where Borrowerno ='".$BID."'";
			$rs=odbc_exec($conn,$sql);
			$EmpNo = odbc_result($rs,"employeeno");
			$BName = odbc_result($rs,"lastname") . ", " . odbc_result($rs,"firstname") . " " . substr(odbc_result($rs,"MI"),0,1) . ".";
			$BCom = odbc_result($rs,"company");
			$BPos = odbc_result($rs,"position");
			$BStat = odbc_result($rs,"status");
			$BSpouse = odbc_result($rs,"spousename");
			$BAdd = odbc_result($rs,"ResidenceAdd");
			$BAdd = strtoupper($BAdd);
			$BSpouse = strtoupper($BSpouse);
			$BName = strtoupper($BName);
			$BCom = strtoupper($BCom);
			$BPos = strtoupper($BPos);
			$BStat = strtoupper($BStat);
			
			$Comakerno = $_REQUEST['ComNo'];
			$sql2="SELECT TOP 1 * FROM Comaker where comakerno ='".$Comakerno."'";
			$rs2=odbc_exec($conn,$sql2);
			$ComakerName = odbc_result($rs2,"lastname") . ", " . odbc_result($rs2,"firstname") . " " . substr(odbc_result($rs2,"middlename"),0,1) . ".";
			$BAdd1 = odbc_result($rs2,"address");
			$BAdd1 = strtoupper($BAdd1);
			$ComakerName = strtoupper($ComakerName);
		
			$Comakerno2 = $_REQUEST['ComNo2'];
			$sql2="SELECT TOP 1 * FROM Comaker where comakerno ='".$Comakerno2."'";
			$rs2=odbc_exec($conn,$sql2);
			if (odbc_result($rs2,"lastname") <> null){
			$ComakerName2 = odbc_result($rs2,"lastname") . ", " . odbc_result($rs2,"firstname") . " " . substr(odbc_result($rs2,"middlename"),0,1) . ".";
			$BAdd2 = odbc_result($rs2,"address");
			$BAdd2 = strtoupper($BAdd2);
			$ComakerName2 = strtoupper($ComakerName2);
			
			}
			}

			?>		
            			  
		<table width="718">  
				<tr>
                <td width="98" height="10"></td>
                </tr>
                
                <tr>
                <td width="98"></td>
				<?Php
				$prodName = $_REQUEST['pname'];
				$prodCode = $_REQUEST['pcode'];
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
		   			  	<th width="246"><div align="left"><input name="BorrowerNo" type="text"  size="10" value="<?Php echo $BID ?>" />
						<input type="submit" value="Search" name="Search" onclick="javascript: form.action='BorrowerSearch.php'; form.method='GET';" />
		   			    <input type="submit" value="Fetch" name="fetchData" onclick="javascript: form.action='NewLoanApp.php'; form.method='GET';" /></div></th>
						<?php echo '<input name="pname" type="hidden"  size="30" value="'.$prodName.'" required />'; ?>
						<?php echo '<input name="pcode" type="hidden"  size="30" value="'.$prodCode.'" required />'; ?>
						<?php echo '<input name="srch" type="hidden"  size="30" value="<search>" required />'; ?>
                 
				 		 </tr>
				  
				  		<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Employee No.:</font></div></td>
			    	  	<th width="246"><div align="left"><?php echo '<input name="EmpNo" type="text"  size="18" value="'.$EmpNo.'" readonly />'; ?></th>
				  		</tr>
				  
                  		<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Borrower Name:</font></div></td>
			    	  	<th width="246"><div align="left"><?php echo '<input name="BName" type="text"  size="30" value="'.$BName.'" readonly />'; ?>
						<?php echo '<input name="BAdd" type="hidden"  size="30" value="'.$BAdd.'" readonly />'; ?>	
			    	  	</div></th>
				  		</tr>
      
                 		<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Company Name:</font></div></td>
			    	  	<th width="246"><div align="left"><?php echo '<input name="BorrCom" type="text"  size="30" value="'.$BCom.'" readonly />'; ?>			
						</div></th>
				  		</tr>
				  
				  		<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Position:</font></div></td>
			    	  	<th width="246"><div align="left"><?php echo '<input name="BorrPos" type="text"  size="30" value="'.$BPos.'" readonly />'; ?>			
						</div></th>
				  		</tr>
				  
				  		<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Status:</font></div></td>
			    	  	<th width="246"><div align="left"><?php echo '<input name="BStat" type="text"  size="30" value="'.$BStat.'" readonly />'; ?>
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
		   			  	<th width="246"><div align="left"><?php echo '<input name="LoanID" type="text"  size="15" value="'.$LoanID.'" style="background-color:#33FFFF"/>'; ?>
						<input name="ProductCode" id="ProductCode" type="hidden"  size="15" value="<?php echo substr($LoanID,0,4) ?>" readonly/>
		   			    <input type="Submit" value="Refresh" name="floanid" onclick="javascript: form1.action='NewLoanApp.php'; form1.method='GET';" />
						</div></th>
						<?php echo '<input name="BorrowerNo2" type="hidden"  size="10" value="'.$BID.'" />'; ?>
						<?php echo '<input name="ComNo" type="hidden"  size="10" value="'.$Comakerno.'" />'; ?>
						<?php echo '<input name="pname" type="hidden"  size="30" value="'.$prodName.'" required />'; ?>
						<?php echo '<input name="pcode" type="hidden"  size="30" value="'.$prodCode.'" required />'; ?>
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
			    	  	<th width="246"><div align="left"><input name="LoanAmount" type="text"  size="21" value="<?php echo $LoanAmount ?>" />
			    	  	</div></th>
				  		</tr>
						
						<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Loan Term:</font></div></td>
			    	  	<th width="246"><div align="left"><input name="LoanTerm" type="text"  size="21" value="<?php echo $LoanTerm ?>" />
						</div></th>
				  		</tr>
						
						</table>
						
						<table width="720" cellpadding="0" cellspacing="0">
         				<tr><td><hr width=400px size="1" color="#666666" align="left"/></td></tr>
		 				</table>
						
						<table>
						
						
						<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Co-Maker No. 1:</font></div></td>
			    	  	<th width="246"><div align="left"><?php echo '<input name="ComNo" type="text"  size="21" value="'.$Comakerno.'" />'; ?>
						
						<input type="Submit" value="Search" name="fcomaker" onclick="javascript: form2.action='ComakerSearch.php'; form2.method='GET';" />	
						</div></th><?php echo '<input name="BorrowerNo3" type="hidden"  size="10" value="'.$BID.'" />'; ?>				  		</tr>						
						<?php echo '<input name="SearchCom" type="hidden"  size="30" value="<search>" required />'; ?>
				  		<?php echo '<input name="pname" type="hidden"  size="30" value="'.$prodName.'" required />'; ?>
						<?php echo '<input name="pcode" type="hidden"  size="30" value="'.$prodCode.'" required />'; ?>
						<?php echo '<input name="BAdd1" id="BAdd1" type="hidden"  size="30" value="'.$BAdd1.'" readonly />'; ?>
						<?php echo '<input name="pname" type="hidden"  size="30" value="'.$prodName.'" required />'; ?>
						<?php echo '<input name="comTag" type="hidden"  size="30" value="1" required />'; ?>
						<?php echo '<input name="LoanID" type="hidden"  size="15" value="'.$LoanID.'" />'; ?> 
						
						<?php echo '<input name="Rel1" type="hidden"  size="15" value="'.$Rel1.'" />'; ?> 
						<?php echo '<input name="Known1" type="hidden"  size="15" value="'.$Known1.'" />'; ?> 
						
				  		<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Comaker Name 1:</font></div></td>
			    	  	<th width="246"><div align="left"><?php echo '<input name="ComName" type="text"  size="30" value="'.$ComakerName.'" readonly/>'; ?>
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
						
						</table>
						
						<table width="720" cellpadding="0" cellspacing="0">
         				<tr><td><hr width=400px size="1" color="#666666" align="left"/></td></tr>
		 				</table>
						
						<table>
						
						<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Co-Maker No. 2:</font></div></td>
			    	  	<th width="246"><div align="left"><?php echo '<input name="ComNo2" type="text"  size="21" value="'.$Comakerno2.'" />'; ?>
						<input type="Submit" value="Search" name="fcomaker2" onclick="javascript: form2.action='ComakerSearch.php'; form2.method='GET';" />	
						</div></th><?php echo '<input name="BorrowerNo3" type="hidden"  size="10" value="'.$BID.'" />'; ?>				  		</tr>
				  		<?php echo '<input name="pname" type="hidden"  size="30" value="'.$prodName.'" required />'; ?>
						<?php echo '<input name="pcode" type="hidden"  size="30" value="'.$prodCode.'" required />'; ?>
						<?php echo '<input name="BAdd2" id="BAdd2" type="hidden"  size="30" value="'.$BAdd2.'" readonly />'; ?>
						<?php echo '<input name="Rel2" type="hidden"  size="15" value="'.$Rel2.'" />'; ?> 
						<?php echo '<input name="Known2" type="hidden"  size="15" value="'.$Known2.'" />'; ?> 
						
				  		<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Comaker Name 2:</font></div></td>
			    	  	<th width="246"><div align="left"><?php echo '<input name="ComName2" type="text"  size="30" value="'.$ComakerName2.'" readonly/>'; ?>
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
						
      					</form>
						
						</table>
						
						<table width="720" cellpadding="0" cellspacing="0">
         				<tr><td><hr width=400px size="1" color="#666666" align="left"/></td></tr>
		 				</table>
						
						<table>
						
						
						<form name= "formProceed" onsubmit="return validateForm()" >
						
                 		<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Payment Frequency:</font></div></td>
			    	  	<th width="246"><div align="left">
						<select name="payFrequency">
  								<option >--select--</option>
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
						  <?php echo '<input name="BAdd" type="hidden"  size="30" value="'.$BAdd.'" readonly />'; ?>	
						  <?php echo '<input name="LoanID" type="hidden"  size="30" value="'.$LoanID.'" required />'; ?>
						  <?php echo '<input name="LoanAmount" type="hidden"  size="30" value="'.$LoanAmount.'" required />'; ?>
						  <?php echo '<input name="Comakerno" type="hidden"  size="30" value="'.$Comakerno.'" required />'; ?>
						  <?php echo '<input name="ComakerName" type="hidden"  size="30" value="'.$ComakerName.'" required />'; ?>
						  <?php echo '<input name="Comakerno2" type="hidden"  size="30" value="'.$Comakerno2.'" required />'; ?>
						  <?php echo '<input name="ComakerName2" type="hidden"  size="30" value="'.$ComakerName2.'" required />'; ?>
						  <?php echo '<input name="LoanTerm" type="hidden"  size="30" value="'.$LoanTerm.'" />'; ?>
						  <?php echo '<input name="pcode" type="hidden"  size="30" value="'.$prodCode.'" required />'; ?>
						  <?php echo '<input name="pname" type="hidden"  size="30" value="'.$prodName.'" required />'; ?>
						  <?php echo '<input name="BSpouse" type="hidden"  size="30" value="'.$BSpouse.'" required />'; ?>
						  <?php echo '<input name="BAdd1" id="BAdd2" type="hidden"  size="30" value="'.$BAdd1.'" readonly />'; ?>
						  <?php echo '<input name="BAdd2" id="BAdd2" type="hidden"  size="30" value="'.$BAdd2.'" readonly />'; ?>
						  
						  <?php echo '<input name="Rel1" type="hidden"  size="15" value="'.$Rel1.'" />'; ?> 
						  <?php echo '<input name="Rel2" type="hidden"  size="15" value="'.$Rel2.'" />'; ?> 
						  <?php echo '<input name="Known1" type="hidden"  size="15" value="'.$Known1.'" />'; ?> 
						  <?php echo '<input name="Known2" type="hidden"  size="15" value="'.$Known2.'" />'; ?> 
						  
				  		<tr>
				  		  <th>&nbsp;</th>
				  		  <td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Loan Purpose:</font></div></td>
						  <td><?php echo '<input name="LPurpose" id="LPurpose" type="text"  size="30" value="'.$LPurpose.'" />'; ?></td>
				  		  <th><div align="left"></div></th>
				  		</tr>		
						
						<tr>
				  		  <th>&nbsp;</th>
				  		  <td>&nbsp;</td>
				  		  <th>&nbsp;</th>
				  		</tr>
						
						
				  		<tr>
				  		  <th>&nbsp;</th>
				  		  <td>&nbsp;</td>
				  		  <th>&nbsp;</th>
				  		</tr>
						
						
				  		<tr>
				  		  <th>&nbsp;</th>
				  		  <td>&nbsp;</td>
				  		  <td><input name="ProceedLoan" type="submit" onclick="javascript: formProceed.action='NewLoanProceed.php'; formProceed.method='GET';" value="Proceed" /></td>
			  		    </tr>
						</form>
					</table>		
				</td>
            </tr>
         <tr height="15">
         </tr>
         </table>
			


</body>
</html>