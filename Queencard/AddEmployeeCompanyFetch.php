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
				
				$sql="SELECT * FROM UserAccount WHERE username = '".$Muser."'";
				$rs=odbc_exec($conn,$sql);
				$Check = odbc_result($rs,"status");
				if ($Check != 1)
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
.style8 {
	font-family: "Century Gothic";
	font-size: 12px;
}
</style>
</head>

<body>
             
		<table width="718">
            
<tr>
                <td width="98" height="10"></td>
                </tr>
                
                <tr>
                <td width="98"></td>
                <td width="478"><div align="center"><span class="style3">EMPLOYEE DATA (Add Profile)</span></div></td>
                <td width="126"></td>
  </tr>
                <tr>
                <td width="98" height="5"></td>
                </tr>
                
             </table>
 				
            
            <table width="720" cellpadding="0" cellspacing="0">
              <tr>
			    <td width="718"><span class="style7">Company Details</span></td>
		      </tr>
              <tr>
               <td><hr width=654px size="3" color="#666666" align="left"/></td>
               </tr>
			</table>
            
			<?php
			include 'connect.php';
			$x=1;
			$comID = $_REQUEST['companyCode'];
			$sql="SELECT * FROM Company where companyID ='".$comID."'";
			$rs=odbc_exec($conn,$sql);
			$compName1=odbc_result($rs,"companyName");
			$CAddress=odbc_result($rs,"companyAdd");
		
			
			if (strlen($comID) > 0 )
			{
			$sql1="SELECT * FROM SequenceID where companyCode = '".$comID."'";
			$rs1=odbc_exec($conn,$sql1);
			
				while (odbc_fetch_row($rs1))
				{
					if ($x < odbc_result($rs1,"sequenceno"))
						{
						$x=odbc_result($rs1,"sequenceno");
						}
				}			
			
				if ($x==1)
				{$x = $comID.$x;}
				else
				{$x=$x+1;
				$x=substr($x,4,strlen($x));
				 $x=$comID.$x;}
			
			}
			else {
			
			$x = "";
			}
			?>		
            
            <form name="form">
			 <table cellpadding="0" cellspacing="0">
             <tr>
			 <td width="335">
              	<table width="335" cellpadding="0" cellspacing="0">
		      		<tr>
   			 		  <th width="4">&nbsp;</th>
   			 	  		<td width="114"><div align="right" class="style13 style2"><font face="Century Gothic">Company Code:</font></div></td>
		   	 		  <th width="215"><div align="left"><?php echo '<input name="companyCode" type="text"  size="10" value="'.$comID.'" required  />'; ?>
		   	 		    <input type="submit" value="Fetch" name="fetch" onclick="javascript: form.action='AddEmployeeCompanyFetch.php'; form.method='GET';" />
		   	 		  
		   	 		  </div></th>
			 	  </tr>
                  	<tr>
   					  <th width="4">&nbsp;</th>
   				   		<td width="114"><div align="right" class="style13 style2"><font face="Century Gothic">Company Name:</font></div></td>
			    	  <th width="215"><div align="left"><?php echo '<input name="" type="text"  size="30" value="'.$compName1.'" readonly/>'; ?></div></th>
				  </tr>
			</table>
			</td>
            

            <td width="383">
			<table width="370" cellpadding="0" cellspacing="0">
                 <tr>
    				<th width="9">&nbsp;</th>
   				   <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Company Address:</font></div></td>
   				   <th width="247"><div align="left"><?php echo '<input name="CAdd" type="text"  size="30" value="'.$CAddress.'" />'; ?></div></th>
  				</tr>
                <tr>
    				<th width="9">&nbsp;</th>
			      <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Station/Branch:</font></div></td>
			      <th width="247"><div align="left">
				  <select name="selectBranch" size="1">
                  	<option>-select-</option>
				  <?php 

				  $sql3="SELECT * FROM Branches where companyID ='".$comID."'";
					$rs3=odbc_exec($conn,$sql3);
					while (odbc_fetch_row($rs3))
					{
						echo '<option value="'.odbc_result($rs3,"Name").'">'.odbc_result($rs3,"Name").'</option>';		
			
					}
				  ?>
                  </select>
                  </div></th>
  				</tr>
  
			</table>
			</td>
            </tr>
            <tr height="15">
            </tr>
            </table>
				
			<table width="720" cellpadding="0" cellspacing="0" height="20">
              <tr>
              	<td width="307"></td>
			    <td width="411"><span class="style7">Employee Sequence No.
                <?php
	             echo '<input type="text" name="sequenceno" size="10" value="'.$x.'" readonly="readonly" />';
				?>
				<input type="submit" value="Proceed" name="proceed" onclick="javascript: form.action='AddEmployeeMain.php'; form.method='GET';" />
			    </span></td>
		      </tr>
			</table>
			</form>
	
</body>
</html>