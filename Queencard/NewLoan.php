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
				
				$SearchBor = "";
				if (isset($_REQUEST['submitBor'])){$SearchBor = $_REQUEST['searchBorrower'];
				$Pcode = $_REQUEST['pcode'];}
				
				
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

-->
select
{
	width: 195px;
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
</head>

<body>
        <?Php
		$prodCode= $_REQUEST['pcode'];
		
		$sql="SELECT * FROM Product WHERE productcode = '".$prodCode."'";
		$rs=odbc_exec($conn,$sql);
		$prodName = odbc_result($rs,"productname");
		$prodName = strtoupper($prodName);
		?>
		<table width="718">  
				<tr>
                <td width="98" height="10"></td>
                </tr>
                
                <tr>
                <td width="98"></td>
                <td width="478"><div align="center"><span class="style3"><?Php echo $prodName; ?>  APPLICATION</span></div></td>
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
		   			  	<th width="246"><div align="left"><input name="BorrowerNo" type="text"  size="10" value="<?Php echo $SearchBor ?>" />
						<input type="submit" value="Search" name="Search" onclick="javascript: form.action='BorrowerSearch.php'; form.method='GET';" />
		   			    <input type="submit" value="Fetch" name="fetchData" onclick="javascript: form.action='NewLoanApp.php'; form.method='GET';" /></div></th>
						<?php echo '<input name="pname" type="hidden"  size="30" value="'.$prodName.'" required />'; ?>
						<?php echo '<input name="pcode" type="hidden"  size="30" value="'.$prodCode.'" required />'; ?>
						<?php echo '<input name="srch" type="hidden"  size="30" value="<search>" required />'; ?>
                    	</form>
				 		 </tr>
				  
				  		<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Employee No.:</font></div></td>
			    	  	<th width="246"><div align="left">
			    	    <input name="Input" type="text"  size="18" disabled="disabled" readonly /></div></th>
				  		</tr>
				  
                  		<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Borrower Name:</font></div></td>
			    	  	<th width="246"><div align="left">
			    	    <input name="Input" type="text"  size="40" disabled="disabled" on readonly />
			    	  	</div></th>
				  		</tr>
      
                 		<tr>
   					 	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Company Name:</font></div></td>
			    	  	<th width="246"><div align="left"><input name="" type="text"  size="40" disabled="disabled" readonly /></div></th>
				  		</tr>
				  
				  		<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Position:</font></div></td>
			    	  	<th width="246"><div align="left"><input name="" type="text"  size="40" disabled="disabled" readonly /></div></th>
				  		</tr>
				  
				  		<tr>
   					  	<th width="5">&nbsp;</th>
   				   		<td width="140"><div align="right" class="style13 style2"><font face="Century Gothic">Status:</font></div></td>
			    	  	<th width="246"><div align="left"><input name="" type="text"  size="40" disabled="disabled" readonly /></div></th>
				  		</tr>	  
					</table>
			
				</td>
            </tr>
            <tr height="15">
            </tr>
            </table>

</body>
</html>