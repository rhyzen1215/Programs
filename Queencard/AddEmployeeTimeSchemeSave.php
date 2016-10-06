<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style2 {font-size: 12px}
-->

.inputTime
{
width: 100px;
}
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
	padding-left: 2px;
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
.style13 {font-weight: bold}
.style16 {
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
                <td width="478"><div align="center"><span class="style3">EMPLOYEE DATA (Time Scheme)</span></div></td>
                <td width="126"></td>
  </tr>
                <tr>
                <td width="98" height="5"></td>
                </tr>
                
             </table>
 				
            <?php
			include 'connect.php';
			$CodeCheck = 0;
			$seqNo = $_REQUEST['SQN'];
			$SCode= $_REQUEST['SCC'];
			
			if ($SCode != "")
			{
			$CodeCheck = 1;
			}
			
			$sql="SELECT * FROM Employee where employeeno ='".$seqNo."'";
			$rs=odbc_exec($conn,$sql);
			$Name=odbc_result($rs,"Lastname").", ".odbc_result($rs,"Firstname")." ".odbc_result($rs,"Middlename");
			$ComID=odbc_result($rs,"CompanyCode");
			$compStation=odbc_result($rs,"Station");
			
			$sql2="SELECT * FROM Company where companyID ='".$ComID."'";
			$rs2=odbc_exec($conn,$sql2);
			$compName=odbc_result($rs2,"CompanyName");
			$compAdd=odbc_result($rs2,"CompanyAdd");
			
			$Name = strtoupper($Name);
			$compStation = strtoupper($compStation);
			$compName = strtoupper($compName);
			$compAdd = strtoupper($compAdd);
			
			if ($CodeCheck = 1)
			{
			$sql3="UPDATE  Employee SET timescheme = '".$SCode."' WHERE employeeno = '".$seqNo."'";
			$rs3=odbc_exec($conn,$sql3) or die("Error in query");
			}
			?>		
            
            
            <table width="720" cellpadding="0" cellspacing="0">
              <tr>
			    <td width="718"><div align="center"><span class="style7">
			      
		        <?php
				
				if ($CodeCheck = 1)
				{
				echo '<font face="Century Gothic" style="font-weight: bold" color="Blue" size="4">Record Successfully Updated</font>';
				}
				
				?>
			      
		        </span></div></td>
		      </tr>
              <tr>
              
               </tr>
			</table>
            
<table width="720" cellpadding="0" cellspacing="0">
              <tr>
			    <td width="718"><span class="style7">Time Scheme</span></td>
		      </tr>
              <tr>
               <td><hr width=680px size="3" color="#666666" align="left"/></td>
               </tr>
</table>
			<form name="form">
			 <table width="557" cellpadding="0" cellspacing="0" height="20">
              <tr>
              	<td width="473"><span class="style7">Employee Sequence No.
                    <input name="SQN" type="text"  size="10" value="" required />
                    <input type="submit" value="Proceed" name="proceed" onclick="javascript: form.action='AddEmployeeTimeSchemeFetch.php'; form.method='GET';" />
                <?php echo '<input name="CID" type="hidden"  size="10" value="'.$ComID.'" />'; ?>
          
              	</span></td>
			    <td width="82">&nbsp;</td>
		      </tr>
              <tr>
                <td></td>
                <td>&nbsp;</td>
              </tr>
			</table>

<table cellpadding="0" cellspacing="0">
            <tr>
				<td width="335">
             	<table width="335" cellpadding="0" cellspacing="1">
		     		<tr>
           
   					  <th width="3">&nbsp;</th>
			  		  <td width="142"><div align="right" class="style13 style2"><font face="Century Gothic">Employee Name:</font></div></td>
		   			  <th width="184"><div align="left"><?php echo '<input name="" type="text"  size="25" value="" readonly/>'; ?>
		   			  </div></th>
     
                    
            
				  </tr>
                 	<tr>
   					  <th width="3">&nbsp;</th>
			   		  <td width="142"><div align="right" class="style13 style2"><font face="Century Gothic">Company Name:</font></div></td>
			    	  <th width="184"><div align="left"><?php echo '<input name="" type="text"  size="25" value="" readonly/>'; ?></div></th>
				  </tr>
			</table>
			</td>
            

            <td width="383">
			 <table width="370" cellpadding="0" cellspacing="1">
                 <tr>
    				<th width="31">&nbsp;</th>
   				   <td width="124"><div align="right" class="style13 style2"><font face="Century Gothic">Company Address:</font></div></td>
   				   <th width="209"><div align="left"><?php echo '<input name="" type="text"  size="25" value="" readonly/>'; ?></div></th>
			   </tr>
                <tr>
    				<th width="31">&nbsp;</th>
			      <td width="124"><div align="right" class="style13 style2"><font face="Century Gothic">Station/Branch:</font></div></td>
			      <th width="209"><div align="left"><?php echo '<input name="" type="text"  size="25" value="" readonly/>'; ?></div></th>
			   </tr>
  
			</table>
			</td>
            </tr>
            <tr height="15">
            </tr>
            </table>
            
            
 
            </form>
</body>
</html>