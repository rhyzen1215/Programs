<?Php
session_start();
if(isset($_SESSION['test'])) {
$_SESSION['CurUser']= $_SESSION['CurUser'];
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="_styles_ie.css" rel="stylesheet" type="text/css"/>
</head>

<body bgcolor="#DFFCD1" oncontextmenu="return false;">

			<ol class="tree">
            		<li>
                	<label for="folder1"><strong>Loans</strong></label><input type="checkbox" id="folder1" />
                	<ol>
            			<li class="file"></li>
            			<li>
                		<label for="folder1"><strong>New Loan Application</strong></label><input type="checkbox" id="folder1" />
                   	 		<ol>	
							<?Php
							
							include 'connect.php';
							
							$prodName="";
							$prodCode = "";
							$sql1="SELECT * FROM Product";
							$rs1=odbc_exec($conn,$sql1);
								while (odbc_fetch_row($rs1))
									{
									$prodCode = odbc_result($rs1,"productcode");
									$prodName = odbc_result($rs1,"productname");
									echo '<li class="file"><a href="NewLoan.php?pcode='.$prodCode.'" target="iframe2" onclick="disableclick(e)">'.$prodName.'</a></li>';
									}
							
							?>
                     		</ol>
            			</li> 
						
						
						<li>
                		<label for="folder1"><strong>Existing Loans</strong></label><input type="checkbox" id="folder1" />
                   	 		<ol>	
						
							<li class="file"><a href="ViewLoanDetails.php" target="iframe2" onclick="disableclick(e)">Loan Details</a></li>
									
                     		</ol>
            			</li>
                        
                        <li>
                		<label for="folder1"><strong>Loan Release</strong></label><input type="checkbox" id="folder1" />
                   	 		<ol>	
						
							<li class="file"><a href="LoanRelease.php" target="iframe2" onclick="disableclick(e)">Pending Loan Release</a></li>
									
                     		</ol>
            			</li>   
						
						
                 	</ol>
                 </li>
				 
				 
                  <li>
                	<label for="folder1"><strong>Product</strong></label><input type="checkbox" id="folder1" />
                	<ol>
						<li class="file"><a href="#" target="iframe2" onclick="disableclick(e)">New Entry</a></li> 
						<li class="file"><a href="ProductEdit.php" target="iframe2" onclick="disableclick(e)">Edit Entry</a></li> 
                 	</ol>
                 </li>
                 
				 <li>
                	<label for="folder1"><strong>Borrower</strong></label><input type="checkbox" id="folder1" />
                	<ol>
						<li class="file"><a href="Borrower.php" target="iframe2" onclick="disableclick(e)">New Entry</a></li> 
						<li class="file"><a href="BorrowerEditSearch.php" target="iframe2" onclick="disableclick(e)">Edit Entry</a></li> 
                 	</ol>
                 </li>
                 
                 <li>
                	<label for="folder1"><strong>Comaker</strong></label><input type="checkbox" id="folder1" />
                	<ol>
						<li class="file"><a href="#" target="iframe2" onclick="disableclick(e)">New Entry</a></li> 
						<li class="file"><a href="#" target="iframe2" onclick="disableclick(e)">Edit Entry</a></li> 
                 	</ol>
                 </li>
                 
                 <li>
                	<label for="folder1"><strong>Company</strong></label><input type="checkbox" id="folder1" />
                	<ol>
						<li class="file"><a href="#" target="iframe2" onclick="disableclick(e)">New Entry</a></li> 
						<li class="file"><a href="#" target="iframe2" onclick="disableclick(e)">Edit Entry</a></li> 
                 	</ol>
                 </li>
                 
                 <li>
                	<label for="folder1"><strong>Loan Update</strong></label><input type="checkbox" id="folder1" />
                	<ol>
                    	<li class="file"><a href="OtherPayments.php" target="iframe2" onclick="disableclick(e)">Payment Update</a></li> 
						<li class="file"><a href="batchloanupdate.php" target="iframe2" onclick="disableclick(e)">Batch Update</a></li> 
						<li class="file"><a href="individualloanupdate.php" target="iframe2" onclick="disableclick(e)">Individual Update</a></li> 
                        <li class="file"><a href="BillingStatement.php" target="iframe2" onclick="disableclick(e)">Billing Statement</a></li> 
                 	</ol>
                 </li>
                 
                 <li>
                	<label for="folder1"><strong>Reports</strong></label><input type="checkbox" id="folder1" />
                	<ol>
                    
                    	<li>
                		<label for="folder1"><strong>Daily</strong></label><input type="checkbox" id="folder1" />
                   	 		<ol>	
							<li class="file"><a href="#" target="iframe2" onclick="disableclick(e)">Report 1</a></li> 		
                     		</ol>
            			</li>
                        
                        <li>
                		<label for="folder1"><strong>Monthly</strong></label><input type="checkbox" id="folder1" />
                   	 		<ol>	
                            <li class="file"><a href="LoanStatusView.php" target="iframe2" onclick="disableclick(e)">Loan Status</a></li> 
							<li class="file"><a href="LoanAnalysisView.php" target="iframe2" onclick="disableclick(e)">Loan Analysis</a></li> 
                            <li class="file"><a href="LoanAnalysisScheduleView.php" target="iframe2" onclick="disableclick(e)">Scheduled Loan Analysis</a></li> 	
                     		</ol>
            			</li>
                        
						
						
                 	</ol>
                 </li>
                 
                
                 
                 <li>
                	<label for="folder1"><strong>User</strong></label><input type="checkbox" id="folder1" />
                	<ol>
						<li class="file"><a href="#" target="iframe2" onclick="disableclick(e)">Activation</a></li> 
						<li class="file"><a href="#" target="iframe2" onclick="disableclick(e)">Change Password</a></li> 
                 	</ol>
                 </li>
             </ol>
             
</body>
</html>
