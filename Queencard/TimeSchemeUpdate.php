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

.select1
{
	width: 50px;
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
.style9 {font-size: 12px; font-family: "Century Gothic"; }
</style>

<script>

function SelectBranchName()
{


}
</script>
</head>

<body>
             
		<table width="718">
            
<tr>
                <td width="98" height="10"></td>
                </tr>
                
                <tr>
                <td width="98"></td>
                <td width="478"><div align="center"><span class="style3">TIME SCHEME</span></div></td>
                <td width="126"></td>
  </tr>
                <tr>
                <td width="98" height="5"></td>
                </tr>
                
             </table>
 			
            
            
            
             <table cellpadding="0" cellspacing="0">
              <tr>
			    <td width="680">
                  <div align="center">
                    <?php
				echo '<font face="Century Gothic" style="font-weight: bold" color="Blue" size="4">Successfully Updated</font>';
				?>
                  </div></td>
		      </tr>
			</table>
            

            <table cellpadding="0" cellspacing="0">
              <tr>
			    <td width="680"><span class="style7">Company Details</span></td>
		      </tr>
              <tr>
               <td><hr width=680px size="3" color="#666666" align="left"/></td>
               </tr>
			</table>
            
			<?php
			include 'connect.php';
			$x=1;
			$selCD1= 0;
			$selCD2= 0;
			$selCD3= 0;
			$selCD4= 0;
			$comID = $_REQUEST['companyCode'];
			$SCHCode = $_REQUEST['SchemeCode'];
			$SBranch= $_REQUEST['selectBranch'];
			$SName= $_POST['SchemeName'];
			
			
			$SInAM= $_POST['InAM']." ".$_POST['InAM2'];
			$BSInAM= $_POST['BInAM']." ".$_POST['BInAM2'];
			$ASInAM= $_POST['AInAM']." ".$_POST['AInAM2'];
			
			$SOutAM= $_POST['OutAM']." ". $_POST['OutAM2'];
			$BSOutAM= $_POST['BOutAM']." ". $_POST['BOutAM2'];
			$ASOutAM= $_POST['AOutAM']." ". $_POST['AOutAM2'];
			
			$SInPM= $_POST['InPM']." ".$_POST['InPM2'];
			$BSInPM= $_POST['BInPM']." ".$_POST['BInPM2'];
			$ASInPM= $_POST['AInPM']." ".$_POST['AInPM2'];
			
			$SOutPM= $_POST['OutPM']." ".$_POST['OutPM2'];
			$BSOutPM= $_POST['BOutPM']." ".$_POST['BOutPM2'];
			$ASOutPM= $_POST['AOutPM']." ".$_POST['AOutPM2'];
			
			if (isset($_REQUEST['cd1']))
			{
			$selCD1= 1;
			}
			if (isset($_REQUEST['cd2']))
			{
			$selCD2= 1;
			}
			if (isset($_REQUEST['cd3']))
			{
			$selCD3= 1;
			}
			if (isset($_REQUEST['cd4']))
			{
			$selCD4= 1;
			}
			
			
			$sql="SELECT * FROM Company where companyID ='".$comID."'";
			$rs=odbc_exec($conn,$sql);
			$compName1=odbc_result($rs,"companyName");
			$CAddress=odbc_result($rs,"companyAdd");
		
			
			$sql2="UPDATE TimeScheme Set Schemename='".$SName."', InAM='".$SInAM."', OutAM='".$SOutAM."', InPM='".$SInPM."', OutPM='".$SOutPM."', branch='".$SBranch."', InAMminus='".$BSInAM."', InAMplus='".$ASInAM."', OutAMminus='".$BSOutAM."', OutAMplus='".$ASOutAM."', InPMminus='".$BSInPM."', InPMplus='".$ASInPM."', OutPMminus='".$BSOutPM."', OutPMplus='".$ASOutPM."' WHERE schemecode='".$SCHCode."'";
			$rs2=odbc_exec($conn,$sql2);
			
			$SInAM = date('H:i:s',strtotime($SInAM));
			$BSInAM = date('H:i:s',strtotime($BSInAM));
			$ASInAM = date('H:i:s',strtotime($ASInAM));
			
			$sql3 = "UPDATE TIMESCHEMEVAL Set TimeSched = '".$SInAM."', TimeFrom='".$BSInAM."', TimeTo='".$ASInAM."', DayFlag='".$selCD1."' WHERE SCHEMECODE='".$SCHCode."' AND TimeCode='1'";
			$rs3=odbc_exec($conn,$sql3);
			
			
			$SOutAM = date('H:i:s',strtotime($SOutAM));
			$BSOutAM = date('H:i:s',strtotime($BSOutAM));
			$ASOutAM = date('H:i:s',strtotime($ASOutAM));
			
			$sql3 = "UPDATE TIMESCHEMEVAL Set TimeSched = '".$SOutAM."', TimeFrom='".$BSOutAM."', TimeTo='".$ASOutAM."', DayFlag='".$selCD2."' WHERE SCHEMECODE='".$SCHCode."' AND TimeCode='2'";
			$rs3=odbc_exec($conn,$sql3);
			
			
			$SInPM = date('H:i:s',strtotime($SInPM));
			$BSInPM = date('H:i:s',strtotime($BSInPM));
			$ASInPM = date('H:i:s',strtotime($ASInPM));
			
			$sql3 = "UPDATE TIMESCHEMEVAL Set TimeSched = '".$SInPM."', TimeFrom='".$BSInPM."', TimeTo='".$ASInPM."', DayFlag='".$selCD3."' WHERE SCHEMECODE='".$SCHCode."' AND TimeCode='3'";
			$rs3=odbc_exec($conn,$sql3);
			
			$SOutPM = date('H:i:s',strtotime($SOutPM));
			$BSOutPM = date('H:i:s',strtotime($BSOutPM));
			$ASOutPM = date('H:i:s',strtotime($ASOutPM));
			
			$sql3 = "UPDATE TIMESCHEMEVAL Set TimeSched = '".$SOutPM."', TimeFrom='".$BSOutPM."', TimeTo='".$ASOutPM."', DayFlag='".$selCD4."' WHERE SCHEMECODE='".$SCHCode."' AND TimeCode='4'";
			$rs3=odbc_exec($conn,$sql3);
		
			
			
			
			
			
			
			
			
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
				{$x=$x+1;}
			
			}
			else {
			
			$x = "";
			}
			?>		
            
            <form name="form">
			 <table width="740" cellpadding="0" cellspacing="0">
             <tr>
			 <td width="350">
              	<table width="350" cellpadding="0" cellspacing="0">
<tr>
   			 		  <th width="4">&nbsp;</th>
   			 	  		<td width="114"><div align="right" class="style13 style2"><font face="Century Gothic">Company Code:</font></div></td>
<th width="230"><div align="left"><?php echo '<input name="companyCode" type="text"  size="10" value="'.$comID.'" required  />'; ?>
		   	 		    <input type="submit" value="Fetch" name="fetch" onclick="javascript: form.action='TimeSchemeFetch.php'; form.method='GET';" />
		   	 		  
		   	 		  </div></th>
			 	  </tr>
                  	<tr>
   					  <th width="4">&nbsp;</th>
   				   		<td width="114"><div align="right" class="style13 style2"><font face="Century Gothic">Company Name:</font></div></td>
			    	  <th width="230"><div align="left"><?php echo '<input name="CompAdd" type="text"  size="30" value="'.$compName1.'" readonly/>'; ?></div></th>
				  </tr>
			</table>
			</td>
            

            <td width="388">
<table width="370" cellpadding="0" cellspacing="0">
                 <tr>
    				<th width="10">&nbsp;</th>
   				   <td width="118"><div align="right" class="style13 style2"><font face="Century Gothic">Company Address:</font></div></td>
   				   <th width="240"><div align="left"><?php echo '<input name="CAdd" type="text"  size="30" value="'.$CAddress.'" />'; ?></div></th>
		  </tr>
                <tr>
    				<th width="10">&nbsp;</th>
			      <td width="118"><div align="right" class="style13 style2"><font face="Century Gothic">Station/Branch:</font></div></td>
			      <th width="240"><div align="left">
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


<table width="648" cellpadding="0" cellspacing="0">
                 <tr>
    				<th width="9">&nbsp;</th>
   				   <td width="108"><div align="right" class="style13 style2"><font face="Century Gothic">Scheme Code:</font></div></td>
   				   <th width="529"><div align="left"><input name="SchemeCode" type="text"  size="10" value=""  />
   				     <input type="submit" value="Edit" name="Edit" onclick="javascript: form.action='TimeSchemeEdit.php'; form.method='GET';" />
   				
   				   </div></th>
    </tr>
                <tr>
    				<th width="9">&nbsp;</th>
			      <td width="108"><div align="right" class="style13 style2"><font face="Century Gothic">Scheme Name:</font></div></td>
			      <th width="529"><div align="left">
			        <input name="SchemeName" type="text"  size="30" value=""  />
                  </div></th>
    </tr>
</table>
            
                
          <table cellpadding="0" cellspacing="0">
            <tr>
            
			<td width="310">
             <table width="298" cellpadding="0" cellspacing="0">
<tr>
    				<th width="8">&nbsp;</th>
		  <td width="108"><div align="right" class="style13 style2"></div></td>
       <th width="180"><div align="left"></div></th>
			   </tr>
                 <tr>
    				<th width="8">&nbsp;</th>
   				   <td width="108"><div align="right" class="style13 style2"><font face="Century Gothic">Time In (AM):</font></div></td>
   				   <th width="180"><div align="left">
   				     <input class="fieldtext" name="InAM" type="text"  size="10"  />
   				     <select name="InAM2" class="select1" >
                       <option value="AM">AM</option>
                       <option value="PM">PM</option>
                     </select>
   				   </div></th>
			   </tr>
                <tr>
    				<th width="8">&nbsp;</th>
   				  <td width="108"><div align="right" class="style13 style2"><font face="Century Gothic">Time Out (AM):</font></div></td>
   				  <th width="180"><div align="left">
   				    <input class="fieldtext" name="OutAM" type="text"  size="10"  />
   				    <select name="OutAM2" class="select1" >
                      <option value="AM">AM</option>
                      <option value="PM">PM</option>
                    </select>
   				  </div></th>
			   </tr>
                 <tr>
    				<th width="8">&nbsp;</th>
			       <td width="108"><div align="right"></div></td>
		           <th width="180"><div align="left"></div></th>
               </tr>
                 <tr>
    			  <th width="8">&nbsp;</th>
   				  <td width="108">&nbsp;</td>
   				  <th width="180">&nbsp;</th>
               </tr>
               
			</table>
			</td>
            
            
            
            
               
            <td width="402"><table width="316" cellpadding="0" cellspacing="0">
              <tr>
                <th width="7">&nbsp;</th>
                <td width="103"><div align="right" class="style13 style2"></div></td>
                <th width="204"><div align="left"></div></th>
              </tr>
              <tr>
                <th width="7">&nbsp;</th>
                <td width="103"><div align="right" class="style13 style2"><font face="Century Gothic">Time In (PM):</font></div></td>
                <th width="204"><div align="left">
                  <input class="fieldtext" name="InPM" type="text"  size="10"   />
                  <select name="InPM2" class="select1" >
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                  </select>
                </div></th>
              </tr>
              <tr>
                <th width="7">&nbsp;</th>
                <td width="103"><div align="right" class="style13 style2"><font face="Century Gothic">Time Out (PM):</font></div></td>
                <th width="204"><div align="left">
                  <input class="fieldtext" name="OutPM" type="text"  size="10"  />
                  <select name="OutPM2" class="select1" >
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                  </select>
                </div></th>
              </tr>
              <tr>
                <th width="7">&nbsp;</th>
                <td width="103"><div align="right"></div></td>
                <th width="204"><div align="left"></div></th>
              </tr>
              <tr>
                <th width="7">&nbsp;</th>
                <td width="103">&nbsp;</td>
                <th width="204">&nbsp;</th>
              </tr>
             
            </table> 
            </tr>
            </table>

		  <table width="683" border="1">
            <tr>
              <th width="97" bgcolor="#00FFFF" scope="col"><span class="style9">Scheme Code</span></th>
              <th width="160" bgcolor="#00FFFF" scope="col"><span class="style9">Scheme Name</span></th>
              <th width="99" bgcolor="#00FFFF" scope="col"><span class="style9">In (AM)</span></th>
              <th width="87" bgcolor="#00FFFF" scope="col"><span class="style9">Out (AM)</span></th>
              <th width="94" bgcolor="#00FFFF" scope="col"><span class="style9">In (PM)</span></th>
              <th width="106" bgcolor="#00FFFF" scope="col"><span class="style9">Out (PM)</span></th>
            </tr>
            	 <?php 
				  
				  $sql4="SELECT * FROM TimeScheme where companyCode ='".$comID."'";
					$rs4=odbc_exec($conn,$sql4);
					while (odbc_fetch_row($rs4))
					{
						echo '<tr>';
						echo '<th width="97" scope="col"><span class="style9"><font color="blue">'.odbc_result($rs4,"SchemeCode").'</font></span></th>';
						echo '<th width="160" scope="col"><span class="style9"><font color="blue">'.odbc_result($rs4,"SchemeName").'</font></span></th>';
						echo '<th width="99" scope="col"><span class="style9"><font color="blue">'.odbc_result($rs4,"InAM").'</font></span></th>';
						echo '<th width="87" scope="col"><span class="style9"><font color="blue">'.odbc_result($rs4,"OutAM").'</font></span></th>';
						echo '<th width="94" scope="col"><span class="style9"><font color="blue">'.odbc_result($rs4,"InPM").'</font></span></th>';
						echo '<th width="106" scope="col"><span class="style9"><font color="blue">'.odbc_result($rs4,"OutPM").'</font></span></th>';
						echo '</tr>';	
					}
				  ?>
            
          </table>
          
          
          
          
          
  <table width="712" cellpadding="0" cellspacing="0">
        		<tr>
                </tr>	
          <tr>
   			<td><hr width=680px size="3" color="#666666" align="left"/></td>
			  </tr>
		</table>
        
        
          
<table width="648" cellpadding="0" cellspacing="0">
                 <tr>
    				
   				   <td width="100"><div align="right" class="style13 style2">
   				     <div align="center">
   				       <input type="submit" name="btnSave" value="Save" onclick="javascript: form.action='TimeSchemeSave.php'; form.method='POST';"/>
           		     <input type="reset" name="button2" id="button2" value="Reset" />
			         </div>
   				   </div></td>
			  </tr>
		</table>
        
        

   </form>
	
</body>
</html>