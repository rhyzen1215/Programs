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
.style10 {font-family: "Century Gothic"}
.style13 {font-size: 12px; font-weight: bold; }
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
                <td width="478"><div align="center"><span class="style3">Daily Time Record</span></div></td>
                <td width="126"></td>
  </tr>
                <tr>
                <td width="98" height="5"></td>
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
				{$x=$x+1;}
			
			}
			else {
			
			$x = "";
			}
			?>		
            
            <form name="form">
			 <table cellpadding="0" cellspacing="0">
             <tr>
			 <td width="335">
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
			    	  <th width="230"><div align="left"><?php echo '<input name="CompAdd" type="text"  size="26" value="'.$compName1.'" readonly/>'; ?></div></th>
				  </tr>
			</table>
			</td>
            

            <td width="383">
<table width="370" cellpadding="0" cellspacing="0">
                 <tr>
    				<th width="15">&nbsp;</th>
   				   <td width="118"><div align="right" class="style13 style2"><font face="Century Gothic">Company Address:</font></div></td>
   				   <th width="235"><div align="left"><?php echo '<input name="CAdd" type="text"  size="26" value="'.$CAddress.'" />'; ?></div></th>
		  </tr>
                <tr>
    				<th width="15">&nbsp;</th>
			      <td width="118"><div align="right" class="style13 style2"><font face="Century Gothic">Station/Branch:</font></div></td>
			      <th width="235"><div align="left">
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
			        <input name="SchemeName" type="text"  size="26" value=""  />
                  </div></th>
			  </tr>
</table>
            
                
          <table cellpadding="0" cellspacing="0">
            <tr>
            
			<td width="367">
             <table width="350" cellpadding="0" cellspacing="0">
				<tr>
    				<th width="11">&nbsp;</th>
		  			<td width="106"><div align="right" class="style13 style2"></div></td>
       				<th><div align="left" class="style9"></div></th>
			   </tr>
                 <tr>
    				<th width="11">&nbsp;</th>
   				   <td width="106"><div align="right" class="style13 style2"><font face="Century Gothic">Time In (AM):</font></div></td>
   				   <th><div align="left">
   				     <input class="fieldtext" name="InAM" type="text"  size="10"  />
   				     <select name="InAM2" class="select1" >
                       <option value="AM">AM</option>
                       <option value="PM">PM</option>
                     </select>
                     <span class="style13">
                     <label>
   				     <span class="style10">
   				     <input type="checkbox" name="cd1" id="checkbox" />
   				     CD   				     </span></label>
                     </span>   				   </div></th>
			   </tr>
                 <tr>
                   <th>&nbsp;</th>
                   <td>&nbsp;</td>
                   <th class="style2"><div align="left"><span class="style9">Time In Allowance</span></div></th>
                 </tr>
                 <tr>
                   <th>&nbsp;</th>
                   <td><div align="right" class="style9">Before: </div></td>
                   <th width="231" class="style2"><div align="left">
                     <input class="fieldtext" name="InAM3" type="text"  size="10"  />
                     <select name="InAM11" class="select1" >
                       <option value="AM">AM</option>
                       <option value="PM">PM</option>
                     </select>
                   </div></th>
               </tr>
                 <tr>
                   <th>&nbsp;</th>
                   <td><div align="right" class="style9">After: </div></td>
                   <th><div align="left" class="style9">
                     <input class="fieldtext" name="InAM4" type="text"  size="10"  />
                     <select name="InAM12" class="select1" >
                       <option value="AM">AM</option>
                       <option value="PM">PM</option>
                     </select>
                   </div></th>
               </tr>
                 <tr>
                   <th>&nbsp;</th>
                   <td>&nbsp;</td>
                   <th><div align="left"></div></th>
                 </tr>
                <tr>
    				<th width="11">&nbsp;</th>
   				  <td width="106"><div align="right" class="style13 style2"><font face="Century Gothic">Time Out (AM):</font></div></td>
   				  <th><div align="left">
   				    <input class="fieldtext" name="OutAM" type="text"  size="10"  />
   				    <select name="OutAM2" class="select1" >
                      <option value="AM">AM</option>
                      <option value="PM">PM</option>
                    </select>
   				    <span class="style13">
   				    <label><span class="style10">
   				    <input type="checkbox" name="cd2" id="checkbox2" />
CD </span></label>
                    </span> </div></th>
			   </tr>
                 <tr>
                   <th>&nbsp;</th>
                   <td>&nbsp;</td>
                   <th><div align="left"><span class="style9">Time Out Allowance</span></div></th>
                 </tr>
                 <tr>
                   <th>&nbsp;</th>
                   <td><div align="right"><span class="style9">Before:</span></div></td>
                   <th><div align="left">
                     <input class="fieldtext" name="OutAM5" type="text"  size="10"  />
                     <select name="OutAM3" class="select1" >
                       <option value="AM">AM</option>
                       <option value="PM">PM</option>
                     </select>
                   </div></th>
                 </tr>
                 <tr>
    				<th width="11">&nbsp;</th>
			       <td width="106"><div align="right"><span class="style9">After:</span></div></td>
		           <th><div align="left">
		             <input class="fieldtext" name="OutAM6" type="text"  size="10"  />
		             <select name="OutAM4" class="select1" >
                       <option value="AM">AM</option>
                       <option value="PM">PM</option>
                     </select>
		           </div></th>
               </tr>
                 <tr>
                   <th>&nbsp;</th>
                   <td>&nbsp;</td>
                   <th>&nbsp;</th>
                 </tr>
                 <tr>
                   <th>&nbsp;</th>
                   <td>&nbsp;</td>
                   <th><div align="left"><span class="style7">* CD = Change Date</span></div></th>
                 </tr>
                 <tr>
    			  <th width="11">&nbsp;</th>
   				  <td width="106">&nbsp;</td>
   				  <th>&nbsp;</th>
               </tr>
			</table>
			</td>
            
            
            
            
               
            <td width="369">
            <table width="369" cellpadding="0" cellspacing="0">
              <tr>
                <th width="8">&nbsp;</th>
                <td width="111"><div align="right" class="style13 style2"></div></td>
                <th width="248"><div align="left"></div></th>
              </tr>
              <tr>
                <th width="8">&nbsp;</th>
                <td width="111"><div align="right" class="style13 style2"><font face="Century Gothic">Time In (PM):</font></div></td>
                <th width="248"><div align="left">
                  <input class="fieldtext" name="InPM" type="text"  size="10"   />
                  <select name="InPM2" class="select1" >
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                  </select>
                  <span class="style13">
                  <label><span class="style10">
                  <input type="checkbox" name="cd3" id="checkbox3" />
CD </span></label>
                  </span> </div></th>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td>&nbsp;</td>
                <th><div align="left"><span class="style9">Time In Allowance</span></div></th>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td><div align="right"><span class="style9">Before:</span></div></td>
                <th><div align="left" class="style9">
                  <input class="fieldtext" name="InPM3" type="text"  size="10"   />
                  <select name="InPM5" class="select1" >
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                  </select>
                </div></th>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td><div align="right"><span class="style9">After:</span></div></td>
                <th><div align="left" class="style9">
                  <input class="fieldtext" name="InPM4" type="text"  size="10"   />
                  <select name="InPM6" class="select1" >
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                  </select>
                </div></th>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td><div align="right"></div></td>
                <th>&nbsp;</th>
              </tr>
              <tr>
                <th width="8">&nbsp;</th>
                <td width="111"><div align="right" class="style13 style2"><font face="Century Gothic">Time Out (PM):</font></div></td>
                <th width="248"><div align="left">
                  <input class="fieldtext" name="OutPM" type="text"  size="10"  />
                  <select name="OutPM2" class="select1" >
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                  </select>
                  <span class="style13">
                  <label><span class="style10">
                  <input type="checkbox" name="cd4" id="checkbox4" />
CD </span></label>
                  </span> </div></th>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td>&nbsp;</td>
                <th><div align="left"><span class="style9">Time Out Allowance</span></div></th>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td><div align="right"><span class="style9">Before:</span></div></td>
                <th><div align="left">
                  <input class="fieldtext" name="OutPM3" type="text"  size="10"  />
                  <select name="OutPM5" class="select1" >
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                  </select>
                </div></th>
              </tr>
              <tr>
                <th width="8">&nbsp;</th>
                <td width="111"><div align="right"><span class="style9">After:</span></div></td>
                <th width="248"><div align="left">
                  <input class="fieldtext" name="OutPM4" type="text"  size="10"  />
                  <select name="OutPM6" class="select1" >
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                  </select>
                </div></th>
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
                <th width="8">&nbsp;</th>
                <td width="111">&nbsp;</td>
                <th width="248">&nbsp;</th>
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
                   <td>&nbsp;</td>
                 </tr>
                 <tr>
                   <td>&nbsp;</td>
                 </tr>
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