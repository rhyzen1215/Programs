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
	width: 145px;
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
.style8 {font-size: 12px; font-family: "Century Gothic"; }
.style10 {font-size: 12px; font-weight: bold; }
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
			$seqNo = $_REQUEST['SQN'];
			$sql="SELECT * FROM Employee where employeeno ='".$seqNo."'";
			$rs=odbc_exec($conn,$sql);
			$Name=odbc_result($rs,"Lastname").", ".odbc_result($rs,"Firstname")." ".odbc_result($rs,"Middlename");
			$ComID=odbc_result($rs,"CompanyCode");
			$compStation=odbc_result($rs,"Station");
			$TSId=odbc_result($rs,"TimeScheme");
			
			$sql2="SELECT * FROM Company where companyID ='".$ComID."'";
			$rs2=odbc_exec($conn,$sql2);
			$compName=odbc_result($rs2,"CompanyName");
			$compAdd=odbc_result($rs2,"CompanyAdd");
			
			$Name = strtoupper($Name);
			$compStation = strtoupper($compStation);
			$compName = strtoupper($compName);
			$compAdd = strtoupper($compAdd);

			
			?>		
            
<form name="form">            
<table width="720" cellpadding="0" cellspacing="0">
              <tr>
			    <td width="718"><span class="style7">Time Scheme</span></td>
		      </tr>
              <tr>
               <td><hr width=680px size="3" color="#666666" align="left"/></td>
               </tr>
</table>
		
			 <table width="557" cellpadding="0" cellspacing="0" height="20">
              <tr>
              	<td width="473"><span class="style7">Employee ID Number:
                    <input name="SQN" type="text"  size="10" value="<?php echo $seqNo; ?>" />
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
			  		  <td width="143"><div align="right" class="style13 style2"><font face="Century Gothic">Employee Name:</font></div></td>
		   			  <th width="183"><div align="left"><?php echo '<input name="" type="text"  size="25" value="'.$Name.'" readonly/>'; ?>
		   			  </div></th>
     
                    
            
				  </tr>
                 	<tr>
   					  <th width="3">&nbsp;</th>
			   		  <td width="143"><div align="right" class="style13 style2"><font face="Century Gothic">Company Name:</font></div></td>
			    	  <th width="183"><div align="left"><?php echo '<input name="" type="text"  size="25" value="'.$compName.'" readonly/>'; ?></div></th>
				  </tr>
			</table>
			</td>
            

            <td width="383">
			 <table width="346" cellpadding="0" cellspacing="1">
      <tr>
    				<th width="36">&nbsp;</th>
		    <td width="116"><div align="right" class="style13 style2"><font face="Century Gothic">Company Address:</font></div></td>
		    <th width="188"><div align="left"><?php echo '<input name="" type="text"  size="25" value="'.$compAdd.'" readonly/>'; ?></div></th>
			   </tr>
                <tr>
    				<th width="36">&nbsp;</th>
			      <td width="116"><div align="right" class="style13 style2"><font face="Century Gothic">Station/Branch:</font></div></td>
			      <th width="188"><div align="left"><?php echo '<input name="" type="text"  size="25" value="'.$compStation.'" readonly/>'; ?></div></th>
			   </tr>
  
			</table>
			</td>
            </tr>
            <tr height="15">
            </tr>
            </table>
            
            <table width="699">
  <tr>
    <th width="136" scope="col">&nbsp;</th>
    <th width="551" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th scope="col"><div align="right"><span class="style2"><font face="Century Gothic">Scheme Code:</font></span></div></th>
    <th scope="col"><div align="left">
        		<select name="SCC" size="1">
				  <?php 
				  
				  echo '<option value="'.$TSId.'">'.$TSId.'</option>';	
				  $sql3="SELECT * FROM TimeScheme where companycode ='".$ComID."'";
					$rs3=odbc_exec($conn,$sql3);
					while (odbc_fetch_row($rs3))
					{
						if ($TSId != odbc_result($rs3,"SchemeCode"))
						{
						echo '<option value="'.odbc_result($rs3,"SchemeCode").'">'.odbc_result($rs3,"SchemeCode").'</option>';		
						}
					}
				  ?>
                 </select>
      
                  <input type="submit" name="SchemeFind" id="button" value="Find" onclick="javascript: form.action='AddEmployeeTimeSchemeFind.php'; form.method='GET';" />
     
                </div></th>
  </tr>
  
  
  				<?Php
				
					$sql6="SELECT * FROM TimeScheme where schemecode ='".$TSId."'";
					$rs6=odbc_exec($conn,$sql6);
					$SCN=odbc_result($rs6,"SchemeName");
					
					$SCAMIN=odbc_result($rs6,"InAM");
					$SCAMOUT=odbc_result($rs6,"OutAM");
					$SCPMIN=odbc_result($rs6,"InPM");
					$SCPMOUT=odbc_result($rs6,"OutPM");

				?>
                
  <tr>
     <th scope="col"><div align="right"><span class="style2"><font face="Century Gothic">Scheme Name:</font></span></div></th>
    <th scope="col"><div align="left">
        <?php echo '<input name="" type="text"  size="25" value="'.$SCN.'" readonly/>'; ?>
      </div></th>
  </tr>
</table>

				
                
<table width="580">
  <tr>
    <th width="143" scope="col">&nbsp;</th>
    <th width="89" scope="col">&nbsp;</th>
    <th width="93" scope="col">&nbsp;</th>
    <th width="235" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td><div align="right" class="style8"><span class="style16">Tim In (AM)</span></div></td>
    <td><label>
       <?php echo '<input name="" type="text"  size="10" value="'.$SCAMIN.'" readonly/>'; ?>
    </label></td>
    <td><div align="right" class="style8"><span class="style16">Time In (PM)</span></div></td>
    <td><?php echo '<input name="" type="text"  size="10" value="'.$SCPMIN.'" readonly/>'; ?></td>
  </tr>
  <tr>
    <td><div align="right" class="style8"><span class="style16">Time Out (AM)</span></div></td>
    <td><?php echo '<input name="" type="text"  size="10" value="'.$SCAMOUT.'" readonly/>'; ?></td>
    <td><div align="right" class="style8"><span class="style16">Time Out(PM)</span></div></td>
    <td><?php echo '<input name="" type="text"  size="10" value="'.$SCPMOUT.'" readonly/>'; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<table width="701" border="0">
  <tr>
    <th scope="col"><hr width=680px size="3" color="#666666" align="left"/></th>
  </tr>
  <tr>
    <td><span class="style10"><font face="Century Gothic">Branches:</font></span></td>
  </tr>
  <tr>
    <td>
    <table width="200" border="1">
      <tr>      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><select name="selectBranch" size="1">
                  	<option>-select-</option>
				  <?php 
				  $comID = substr($seqNo,0,4);
				  $sql3="SELECT * FROM Branches where companyID ='".$comID."'";
					$rs3=odbc_exec($conn,$sql3);
					while (odbc_fetch_row($rs3))
					{
						echo '<option value="'.odbc_result($rs3,"Name").'">'.odbc_result($rs3,"Name").'</option>';		
			
					}
				  ?>
                  </select></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>



</form>
</body>
</html>