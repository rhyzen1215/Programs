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
				echo 'document.location.href="homeApprove.html";';
				echo '</script>';
				}
				$onClick = false;
				
				
			?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Outstanding Obligations</title>

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
	color: #000099;

	}
	
input[type=date]
	{
	width: 115px;
	}
	
	
.style3 {
	font-size: 14px;
	font-weight: bold;
	font-family: "Century Gothic";
	}
td {
	font-family: "Century Gothic";
	font-size: 12px;
	font-weight: bold;
	}
	
	
.style7 {
	font-family: "Century Gothic";
	font-size: 12px;
	font-style:italic;
	color:#990000;
	}
	
</style>



</head>

<body>
            <?Php
			
				
				
				if (isset($_REQUEST['btnEditIR'])){
					
						$IntID = $_REQUEST['IntID'];
						$ProductCode = $_REQUEST['productcode'];
				}
			?>
		
 			<table>
			 <tr><td height="20"></td></tr>
			 <tr><td><span class="style7">Product</span></td>
             <td></td></tr>
             </table>
             <table>
             <tr><td><hr width=654px size="3" color="#666666" align="left"/></td></tr> 
			</table>
			

			
            <table>
		    <tr>
			<td width="126"><font color="#0000FF"><strong>Product Code</strong></font></td>
			<td width="315" align="left"><font color="#0000FF"><strong>Product Name</strong></font></td>
			<td width="98" align="center"><font color="#0000FF"><strong>----</strong></font></td>
			  </tr>
			</table>
            
		 			<table>
					<?php
					
					$ProductCode = "";
					$ProductName = "";
					$InterestType = "";
					$MaxTerm = "";
					$MinTerm = "";
					$ProductStatus = "";
					$MaxAmnt = "";
					$MinAmnt = "";
					
					$IntID = "";
					$InterestRate = "";
					$Frequency = "";
					
					$sql = "Select  * From Product";
					$rs=odbc_exec($conn,$sql) or die("Error in query");	
					while (odbc_fetch_row($rs)) {
						echo '<form name="frmOutStand">';
						echo '<tr>';
						echo '<td width="126">'.odbc_result($rs,"productcode").'</td>';
						echo '<td width="315" align="left">'.odbc_result($rs,"productname").'</td>';
						echo '<td width="98" align="center"><input type="submit" name="btnEditOS" value="Edit" onclick="javascript: frmOutStand.action=ProductEdit.php; frmOutStand.method=GET;"/></td>';
						echo '<input type="hidden" name="productcode" value="'.odbc_result($rs,"productcode").'" />';
						echo '</tr>';
						echo '</form>';
					}
					
					
					
					if (isset($_REQUEST['btnEditOS'])){
					
						$ProductCode = $_REQUEST['productcode'];
						
						$sql = "Select * From Product where productcode = '".$ProductCode."'";
						$rs=odbc_exec($conn,$sql) or die("Error in query");	
						$ProductCode = odbc_result($rs,"productcode");
						$ProductName = odbc_result($rs,"ProductName");
						$InterestType = odbc_result($rs,"DimInterest");
						$MaxTerm = odbc_result($rs,"MaxTerm");
						$ProductStatus = odbc_result($rs,"Status");
						$MinTerm = odbc_result($rs,"MinTerm");
						$MaxAmnt = odbc_result($rs,"MaxAmount");
						$MinAmnt = odbc_result($rs,"MinAmount");
						
					}
					
					
					if (isset($_REQUEST['btnSaveOS'])){
					
						$ProductCode = $_REQUEST['productcode'];

						$sql = "Select * From Product where productcode = '".$ProductCode."'";
						$rs=odbc_exec($conn,$sql) or die("Error in query");	
						$ProductCode = odbc_result($rs,"productcode");
						$ProductName = odbc_result($rs,"ProductName");
						$InterestType = odbc_result($rs,"DimInterest");
						$MaxTerm = odbc_result($rs,"MaxTerm");
						$ProductStatus = odbc_result($rs,"Status");
						$MinTerm = odbc_result($rs,"MinTerm");
						$MaxAmnt = odbc_result($rs,"MaxAmount");
						$MinAmnt = odbc_result($rs,"MinAmount");
						
					}
					
					
					if (isset($_REQUEST['btnEditIR'])){
					
						$IntID = $_REQUEST['IntID'];
						$ProductCode = $_REQUEST['productcode'];
						
			
						
						$sql = "Select * From Product where productcode = '".$ProductCode."'";
						$rs=odbc_exec($conn,$sql) or die("Error in query");	
						$ProductCode = odbc_result($rs,"productcode");
						$ProductName = odbc_result($rs,"ProductName");
						$InterestType = odbc_result($rs,"DimInterest");
						$MaxTerm = odbc_result($rs,"MaxTerm");
						$ProductStatus = odbc_result($rs,"Status");
						$MinTerm = odbc_result($rs,"MinTerm");
						$MaxAmnt = odbc_result($rs,"MaxAmount");
						$MinAmnt = odbc_result($rs,"MinAmount");
						
						$sql = "Select  * From InterestRate where productcode = '".$ProductCode."' and ID = '".$IntID."'";
						$rs=odbc_exec($conn,$sql) or die("Error in query");	
						$InterestRate = odbc_result($rs,"InterestRate");
						$Frequency = odbc_result($rs,"Frequency");
						$InterestRate = number_format($InterestRate ,4,'.','');
						
					}
					
					?>
					</table>
                    
                    
                    <!----------- Product General Details -------------------------------->
                    
                    <table>
                     <tr><td></td></tr>
                     <tr><td><hr width=654px size="3" color="#666666" align="left"/></td></tr> 
                    </table>
            		
                    <form name="frmOSSave">
           
                    <table>
                    <tr><td width="133" align="right">Product Code:</td>
                    <td width="150"><input type="text" name="Creditor" id="Creditor" size = "20" value="<?Php echo $ProductCode ?>" /></td>
                    <td width="165" align="right">Maximum Allowed Term:</td>
                    <td width="154"><input type="text" name="LoanNum" id="LoanNum"  size = "5" value="<?Php echo $MaxTerm ?>" /> Months</td></tr>
                    </table>
                    
                    <table>
                    <tr><td width="131" align="right">Product Name:</td>
                    <td width="152"><input type="text" name="OuBal" id="OuBal"  size = "20" value="<?Php echo $ProductName ?>" /></td>
                    <td width="166" align="right">Minimum Allowed Term:</td>
                    <td width="176"><input type="text" name="Granted" id="Granted"  size = "5" value="<?Php echo $MinTerm ?>" /> Months</td></tr>
                    </table>
                    
                    <table>
                    <tr><td width="132" align="right">Interest Type:</td>
                    <td width="152"><select name="InterestType" style=" width:142px;">
                    <option vlaue="1" <?Php if ($InterestType == 1 ) { echo 'selected="selected"'; } ?> >Diminishing</option>
                    <option vlaue="0" <?Php if ($InterestType == 0 ) { echo 'selected="selected"'; } ?>>Add On</option>
                    </select></td>
                    <td width="165" align="right">Maximum Loan Amount:</td>
                    <td width="176"><input type="text" name="Granted" id="Granted"  size = "15" value="<?Php echo number_format($MaxAmnt,2,'.','') ?>" />
                    </td></tr>
                    </table>
                    
                    <table>
                    <tr><td width="132" align="right">Product Status:</td>
                    <td width="152"><select name="ProductStatus" style=" width:142px;">
                    <option vlaue="1" <?Php if ($ProductStatus == 1 ) { echo 'selected="selected"'; } ?> >Active</option>
                    <option vlaue="0" <?Php if ($ProductStatus == 0 ) { echo 'selected="selected"'; } ?>>Close</option>
                    </select></td>
                    <td width="165" align="right">Minimum Loan Amount:</td>
                    <td width="176"><input type="text" name="Granted" id="Granted"  size = "15" value="<?Php echo number_format($MinAmnt,2,'.','') ?>" />
                    </td></tr>
                    </table>
                    
                    <table width="635">
                    <tr><td width="136" align="right"></td>
                    <td width="150">&nbsp;</td>
                    <td width="165" align="right"></td>
                    <td width="164"><input type="submit" name="btnSaveOS" value="Save" onclick="javascript: frmOSSave.action=OutstandingObligations.php; frmOSSave.method=GET;"/>
                      <input type="submit" name="btnDeleteOS" value="Delete" onclick="javascript: frmOSSave.action=OutstandingObligations.php; frmOSSave.method=GET;"/></td>
                    </tr>
                    </table>
       				
                    
                    <table>
                    <tr><td width="200" align="right"></td>
                    <td width="300"><?Php //echo $StatusMsg; ?></td></tr>
                    </table>
                    </form>
		
					
                    <table>
                     <tr><td></td></tr>
                     <tr><td><hr width=654px size="1" color="#666666" align="left"/></td></tr> 
                    </table>
           			
                    
                    
                    
                    <!----------- Product Interest Details -------------------------------->
                   
                   
            <table width="405">
		    <tr>
            <td width="39"></td>
			<td width="100"><font color="#0000FF"><strong>Interest Rate</strong></font></td>
			<td width="100" align="left"><font color="#0000FF"><strong>Frequency</strong></font></td>
			<td width="100" align="center"><font color="#0000FF"><strong>----</strong></font></td>
			  </tr>
			</table>
            
<table width="405">
					<?php
					
					$sql = "Select  * From InterestRate where productcode = '".$ProductCode."'";
					$rs=odbc_exec($conn,$sql) or die("Error in query");	
					while (odbc_fetch_row($rs)) {
						echo '<form name="frmIntRate">';
						echo '<tr>';
						echo '<td width="39"></td>';
						echo '<td width="100">'.number_format(odbc_result($rs,"interestrate"),4,'.','').'</td>';
						echo '<td width="100" align="left">'.odbc_result($rs,"frequency").' Months</td>';
						echo '<td width="100" align="center"><input type="submit" name="btnEditIR" value="Edit" onclick="javascript: frmIntRate.action=ProductEdit.php; frmIntRate.method=GET;"/></td>';
						echo '<input type="hidden" name="IntID" value="'.odbc_result($rs,"ID").'" />';
						echo '<input type="hidden" name="productcode" value="'.odbc_result($rs,"productcode").'" />';
						echo '</tr>';
						echo '</form>';
					}


					?>
</table>
                    
            		 <table>
                     <tr><td></td></tr>
                     <tr><td><hr width="400px" size="1" color="#666666" align="left"/></td></tr> 
</table>
                    
                    
                    <form name="frmIRSave">
                    <input type="hidden" name="IntID" id="IntID"  size = "15" value="<?Php echo $IntID ?>" />
                     <input type="hidden" name="IntID" id="IntID"  size = "15" value="<?Php echo $IntID ?>" />
                    <table>
                    <tr><td width="133" align="right">Interest Rate:</td>
                    <td width="150"><input type="text" name="InterestRate" id="InterestRate" size = "20" value="<?Php echo $InterestRate ?>" /></td>
                    </tr>
                    </table>
                    
                    <table>
                    <tr><td width="131" align="right">Frequency:</td>
                    <td width="152"><input type="text" name="Frequency" id="Frequency"  size = "20" value="<?Php echo $Frequency ?>" /></td>
                    </tr>
                    </table>
                    
                    <table width="635">
                    <tr><td width="136" align="right"></td>
                    <td width="150">&nbsp;</td>
                    <td width="165" align="right"></td>
                    <td width="164"><input type="submit" name="btnIRSave" value="Save" onclick="javascript: frmIRSave.action=ProductEdit.php; frmOSSave.method=GET;"/>
                      <input type="submit" name="btnIRDelete" value="Delete" onclick="javascript: frmIRSave.action=ProductEdit.php; frmIRSave.method=GET;"/></td>
                    </tr>
                    </table>
       				
                    
                    <table>
                    <tr><td width="200" align="right"></td>
                    <td width="300"><?Php //echo $StatusMsg; ?></td></tr>
                    </table>
                    </form>
		
					
                    <table>
                     <tr><td></td></tr>
                     <tr><td><hr width=654px size="1" color="#666666" align="left"/></td></tr> 
                    </table>
           			
			
</body>
</html>