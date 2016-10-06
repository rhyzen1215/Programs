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
                <td width="478"><div align="center"><span class="style3">TIME SCHEME</span></div></td>
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
			$SCHCode = $_REQUEST['SchemeCode'];
			
			$sql="SELECT * FROM Company where companyID ='".$comID."'";
			$rs=odbc_exec($conn,$sql);
			$compName1=odbc_result($rs,"companyName");
			$CAddress=odbc_result($rs,"companyAdd");
			
			$sql="SELECT * FROM TimeSchemeVal where SchemeCode ='".$SCHCode."' and TimeCode = '1'";
			$rs=odbc_exec($conn,$sql);
			$selCD1 = odbc_result($rs,"DayFlag");
			
			$sql="SELECT * FROM TimeSchemeVal where SchemeCode ='".$SCHCode."' and TimeCode = '2'";
			$rs=odbc_exec($conn,$sql);
			$selCD2 = odbc_result($rs,"DayFlag");
			
			$sql="SELECT * FROM TimeSchemeVal where SchemeCode ='".$SCHCode."' and TimeCode = '3'";
			$rs=odbc_exec($conn,$sql);
			$selCD3 = odbc_result($rs,"DayFlag");
			
			$sql="SELECT * FROM TimeSchemeVal where SchemeCode ='".$SCHCode."' and TimeCode = '4'";
			$rs=odbc_exec($conn,$sql);
			$selCD4 = odbc_result($rs,"DayFlag");
			
			
			$sql4="SELECT * FROM TimeScheme where SchemeCode ='".$SCHCode."' and companycode = '".$comID."'	";
			$rs4=odbc_exec($conn,$sql4);
			$SCHName=odbc_result($rs4,"Schemename");
			$SCHBranch=odbc_result($rs4,"Branch");
			
			$AMIn=odbc_result($rs4,"InAM");
			$BAMIn=odbc_result($rs4,"InAMminus");
			$AAMIn=odbc_result($rs4,"InAMplus");
			
			$AMOut=odbc_result($rs4,"OutAM");
			$BAMOut=odbc_result($rs4,"OutAMminus");
			$AAMOut=odbc_result($rs4,"OutAMplus");
			
			$PMIn=odbc_result($rs4,"InPM");
			$BPMIn=odbc_result($rs4,"InPMminus");
			$APMIn=odbc_result($rs4,"InPMplus");
			
			$PMOut=odbc_result($rs4,"OutPM");
			$BPMOut=odbc_result($rs4,"OutPMminus");
			$APMOut=odbc_result($rs4,"OutPMplus");
			
			
			
			
			$StrL = strlen($AMIn);
			$AMIn1=substr($AMIn,$StrL-2,$StrL);
			$StrL = strlen($BAMIn);
			$BAMIn1=substr($BAMIn,$StrL-2,$StrL);
			$StrL = strlen($AAMIn);
			$AAMIn1=substr($AAMIn,$StrL-2,$StrL);
			
			
			$StrL = strlen($AMOut);
			$AMOut1=substr($AMOut,$StrL-2,$StrL);
			$StrL = strlen($BAMOut);
			$BAMOut1=substr($BAMOut,$StrL-2,$StrL);
			$StrL = strlen($AAMOut);
			$AAMOut1=substr($AAMOut,$StrL-2,$StrL);
			
			$StrL = strlen($PMIn);
			$PMIn1=substr($PMIn,$StrL-2,$StrL);
			$StrL = strlen($BPMIn);
			$BPMIn1=substr($BPMIn,$StrL-2,$StrL);
			$StrL = strlen($APMIn);
			$APMIn1=substr($APMIn,$StrL-2,$StrL);
			
			
			$StrL = strlen($PMOut);
			$PMOut1=substr($PMOut,$StrL-2,$StrL);
			$StrL = strlen($BPMOut);
			$BPMOut1=substr($BPMOut,$StrL-2,$StrL);
			$StrL = strlen($APMOut);
			$APMOut1=substr($APMOut,$StrL-2,$StrL);
			
			
			$AMIn=substr($AMIn,0,8);
			$BAMIn=substr($BAMIn,0,8);
			$AAMIn=substr($AAMIn,0,8);
			
			$AMOut=substr($AMOut,0,8);
			$BAMOut=substr($BAMOut,0,8);
			$AAMOut=substr($AAMOut,0,8);
			
			$PMIn=substr($PMIn,0,8);
			$BPMIn=substr($BPMIn,0,8);
			$APMIn=substr($APMIn,0,8);
			
			$PMOut=substr($PMOut,0,8);
			$BPMOut=substr($BPMOut,0,8);
			$APMOut=substr($APMOut,0,8);
			
			
			
			
			
			
			
			
			
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
              
				  <?php 
				  echo '<option value="'.$SCHBranch.'">'.$SCHBranch.'</option>';	 
				  $sql3="SELECT * FROM Branches where companyID ='".$comID."'";
					$rs3=odbc_exec($conn,$sql3);
					while (odbc_fetch_row($rs3))
					{
						if ($SCHBranch != odbc_result($rs3,"Name"))
						{
						echo '<option value="'.odbc_result($rs3,"Name").'">'.odbc_result($rs3,"Name").'</option>';
						}		
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
   				   <th width="529"><div align="left">
                   <input name="SchemeCode" type="text"  size="10" value="<?php echo $SCHCode; ?>" />
                   <input type="submit" value="Edit" name="Edit" onclick="javascript: form.action='TimeSchemeEdit.php'; form.method='GET';" />
                   </div></th>
			  </tr>
                <tr>
    				<th width="9">&nbsp;</th>
			      <td width="108"><div align="right" class="style13 style2"><font face="Century Gothic">Scheme Name:</font></div></td>
			      <th width="529"><div align="left">
			       <input name="SchemeName" type="text"  size="26" value="<?Php echo $SCHName; ?>" />
                  </div></th>
			  </tr>
</table>
            
                
          <table cellpadding="0" cellspacing="0">
            <tr>
            
			<td width="323">
             <table width="319" cellpadding="0" cellspacing="0">
<tr>
    				<th width="8">&nbsp;</th>
		  <td width="108"><div align="right" class="style13 style2"></div></td>
       <th width="201"><div align="left"></div></th>
			   </tr>
                 <tr>
    				<th width="8">&nbsp;</th>
   				   <td width="108"><div align="right" class="style13 style2"><font face="Century Gothic">Time In (AM):</font></div></td>
   				   <th width="201"><div align="left">
   				     <?php echo '<input name="InAM" type="text"  size="10" value="'.$AMIn.'" />'; ?>
   				     <select name="InAM2" class="select1" >
                     	<?php
                       echo '<option value="'.$AMIn1.'">'.$AMIn1.'</option>';
                       if ($AMIn1=="AM")
					   	{
                       		echo '<option value="PM">PM</option>';
					   	}
					   else
					    {
                       		echo '<option value="AM">AM</option>';
					   	}
					   
					   ?>
                     </select>
   				     <span class="style13">
   				     <label><span class="style10">
                     <?Php 
					 if ($selCD1==1)
					 	{
   				     	echo '<input type="checkbox" name="cd1" id="checkbox3" checked="checked" />';
					 	}
					 else
					 	{
						echo '<input type="checkbox" name="cd1" id="checkbox3" />';
					 	}
					  ?>
CD </span></label>
                     </span> </div></th>
			   </tr>
                 <tr>
                   <th>&nbsp;</th>
                   <td>&nbsp;</td>
                   <th>&nbsp;</th>
                 </tr>
                 <tr>
                   <th>&nbsp;</th>
                   <td><div align="right"><span class="style9">Before: </span></div></td>
                   <th><div align="left">
                   <?php echo '<input name="BInAM" type="text"  size="10" value="'.$BAMIn.'" />'; ?>
   				     <select name="BInAM2" class="select1" >
                     	<?php
                       
                      	 if ($BAMIn1=="AM")
					   		{
							echo '<option value="'.$BAMIn1.'">'.$BAMIn1.'</option>';
                       		echo '<option value="PM">PM</option>';
					   		}
					   	elseif ($BAMIn1=="PM")
					    	{
							echo '<option value="'.$BAMIn1.'">'.$BAMIn1.'</option>';
                       		echo '<option value="AM">AM</option>';
					   		}
						else
							{
						echo '<option value="AM">AM</option>';
						echo '<option value="PM">PM</option>';
							}
					   
					   ?>
                     </select>

                   </div></th>
                 </tr>
                 <tr>
                   <th>&nbsp;</th>
                   <td><div align="right"><span class="style9">After: </span></div></td>
                   <th><div align="left">
                    <?php echo '<input name="AInAM" type="text"  size="10" value="'.$AAMIn.'" />'; ?>
   				     <select name="AInAM2" class="select1" >
                     	<?php
                       
                       if ($AAMIn1=="AM")
					   	{
							echo '<option value="'.$AAMIn1.'">'.$AAMIn1.'</option>';
                       		echo '<option value="PM">PM</option>';
					   	}
					   elseif ($AAMIn1=="PM")
					    {
							echo '<option value="'.$AAMIn1.'">'.$AAMIn1.'</option>';
                       		echo '<option value="AM">AM</option>';
					   	}
					   else
						{
							echo '<option value="AM">AM</option>';
							echo '<option value="PM">PM</option>';
						}
					   
					   ?>
                     </select>
                   
                   
                   </div></th>
                 </tr>
                 <tr>
                   <th>&nbsp;</th>
                   <td>&nbsp;</td>
                   <th>&nbsp;</th>
                 </tr>
                <tr>
    				<th width="8">&nbsp;</th>
   				  <td width="108"><div align="right" class="style13 style2"><font face="Century Gothic">Time Out (AM):</font></div></td>
   				  <th width="201"><div align="left">
   				    <?php echo '<input name="OutAM" type="text"  size="10" value="'.$AMOut.'" />'; ?>
   				    <select name="OutAM2" class="select1" >
                     <?php
                       echo '<option value="'.$AMOut1.'">'.$AMOut1.'</option>';
                       if ($AMOut1=="AM")
					   	{
                       		echo '<option value="PM">PM</option>';
					   	}
					   else
					    {
                       		echo '<option value="AM">AM</option>';
					   	}
					   
					   ?>
                    </select>
   				    <span class="style13">
   				    <label><span class="style10">
   				    <?Php 
					 if ($selCD2==1)
					 	{
   				     	echo '<input type="checkbox" name="cd2" id="checkbox3" checked="checked" />';
					 	}
					 else
					 	{
						echo '<input type="checkbox" name="cd2" id="checkbox3" />';
					 	}
					  ?>
CD </span></label>
                    </span> </div></th>
			   </tr>
                 <tr>
                   <th>&nbsp;</th>
                   <td>&nbsp;</td>
                   <th>&nbsp;</th>
                 </tr>
                 <tr>
                   <th>&nbsp;</th>
                   <td><div align="right"><span class="style9">Before:</span></div></td>
                   <th><div align="left">
                    <?php echo '<input name="BOutAM" type="text"  size="10" value="'.$BAMOut.'" />'; ?>
   				    <select name="BOutAM2" class="select1" >
                     <?php
                       
                       if ($BAMOut1=="AM")
					   	{
							echo '<option value="'.$BAMOut1.'">'.$BAMOut1.'</option>';
                       		echo '<option value="PM">PM</option>';
					   	}
					   elseif ($BAMOut1=="PM")
					    {
							echo '<option value="'.$BAMOut1.'">'.$BAMOut1.'</option>';
                       		echo '<option value="AM">AM</option>';
					   	}
					   else
						{
							echo '<option value="AM">AM</option>';
							echo '<option value="PM">PM</option>';
						}
					   
					   ?>
                    </select>
                   
                   
                   </div></th>
                 </tr>
                 <tr>
                   <th>&nbsp;</th>
                   <td><div align="right"><span class="style9">After: </span></div></td>
                   <th><div align="left">
                    <?php echo '<input name="AOutAM" type="text"  size="10" value="'.$AAMOut.'" />'; ?>
   				    <select name="AOutAM2" class="select1" >
                     <?php
                      
                       if ($AAMOut1=="AM")
					   	{
							echo '<option value="'.$AAMOut1.'">'.$AAMOut1.'</option>';
                       		echo '<option value="PM">PM</option>';
					   	}
					   elseif ($AAMOut1=="PM")
					    {
							echo '<option value="'.$AAMOut1.'">'.$AAMOut1.'</option>';
                       		echo '<option value="AM">AM</option>';
					   	}
					   else
						{
							echo '<option value="AM">AM</option>';
							echo '<option value="PM">PM</option>';
						}
					   
					   ?>
                    </select>
                   
                   
                   
                   </div></th>
                 </tr>
                 <tr>
    				<th width="8">&nbsp;</th>
			       <td width="108"><div align="right"></div></td>
		           <th width="201"><div align="left"></div></th>
               </tr>
                 <tr>
                   <th>&nbsp;</th>
                   <td>&nbsp;</td>
                   <th><div align="left"><span class="style7">* CD = Change Date</span></div></th>
                 </tr>
                 <tr>
    			  <th width="8">&nbsp;</th>
   				  <td width="108">&nbsp;</td>
   				  <th width="201"><div align="left" class="style7"></div></th>
               </tr>
			</table>
			</td>
            
            
            
            
               
            <td width="389"><table width="316" cellpadding="0" cellspacing="0">
              <tr>
                <th width="11">&nbsp;</th>
                <td width="100"><div align="right" class="style13 style2"></div></td>
                <th width="203"><div align="left"></div></th>
              </tr>
              <tr>
                <th width="11">&nbsp;</th>
                <td width="100"><div align="right" class="style13 style2"><font face="Century Gothic">Time In (PM):</font></div></td>
                <th width="203"><div align="left">
                  <?php echo '<input name="InPM" type="text"  size="10" value="'.$PMIn.'" />'; ?>
                  <select name="InPM2" class="select1" >
                    <?php
                       echo '<option value="'.$PMIn1.'">'.$PMIn1.'</option>';
                       if ($PMIn1=="AM")
					   	{
                       		echo '<option value="PM">PM</option>';
					   	}
					   else
					    {
                       		echo '<option value="AM">AM</option>';
					   	}
					   
					   ?>
                  </select>
                  <span class="style13">
                  <label><span class="style10">
                  
                  <?Php 
					 if ($selCD3==1)
					 	{
   				     	echo '<input type="checkbox" name="cd3" id="checkbox3" checked="checked" />';
					 	}
					 else
					 	{
						echo '<input type="checkbox" name="cd3" id="checkbox3" />';
					 	}
				?>
                      
 CD </span></label>
                  </span> </div></th>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td>&nbsp;</td>
                <th>&nbsp;</th>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td><div align="right"><span class="style9">Before:</span></div></td>
                <th><div align="left">
                <?php echo '<input name="BInPM" type="text"  size="10" value="'.$BPMIn.'" />'; ?>
                  <select name="BInPM2" class="select1" >
                    <?php
                       
                       if ($BPMIn1=="AM")
					   	{
							echo '<option value="'.$BPMIn1.'">'.$BPMIn1.'</option>';
                       		echo '<option value="PM">PM</option>';
					   	}
					   elseif ($BPMIn1=="PM")
					    {
							echo '<option value="'.$BPMIn1.'">'.$BPMIn1.'</option>';						
                       		echo '<option value="AM">AM</option>';
					   	}
					   else
						{
							echo '<option value="AM">AM</option>';
							echo '<option value="PM">PM</option>';
						}
					   
					   ?>
                  </select>
                
                
                
                
                </div></th>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td><div align="right"><span class="style9">After: </span></div></td>
                <th><div align="left">
                <?php echo '<input name="AInPM" type="text"  size="10" value="'.$APMIn.'" />'; ?>
                  <select name="AInPM2" class="select1" >
                    <?php
                       
                       if ($APMIn1=="AM")
					   	{
							echo '<option value="'.$APMIn1.'">'.$APMIn1.'</option>';
                       		echo '<option value="PM">PM</option>';
					   	}
					   elseif ($APMIn1=="PM")
					    {
							echo '<option value="'.$APMIn1.'">'.$APMIn1.'</option>';
                       		echo '<option value="AM">AM</option>';
					   	}
					   else
						{
							echo '<option value="AM">AM</option>';
							echo '<option value="PM">PM</option>';
						}
					   
					   ?>
                  </select>
                
                
                
                </div></th>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td>&nbsp;</td>
                <th>&nbsp;</th>
              </tr>
              <tr>
                <th width="11">&nbsp;</th>
                <td width="100"><div align="right" class="style13 style2"><font face="Century Gothic">Time Out (PM):</font></div></td>
                <th width="203"><div align="left">
                  <?php echo '<input name="OutPM" type="text"  size="10" value="'.$PMOut.'" />'; ?>
                  <select name="OutPM2" class="select1" >
                    <?php
                       echo '<option value="'.$PMOut1.'">'.$PMOut1.'</option>';
                       if ($PMOut1=="AM")
					   	{
                       		echo '<option value="PM">PM</option>';
					   	}
					   else
					    {
                       		echo '<option value="AM">AM</option>';
					   	}
					   
					   ?>
                  </select>
                  <span class="style13">
                  <label><span class="style10">
                  <?Php 
					 if ($selCD4==1)
					 	{
   				     	echo '<input type="checkbox" name="cd4" id="checkbox3" checked="checked" />';
					 	}
					 else
					 	{
						echo '<input type="checkbox" name="cd4" id="checkbox3" />';
					 	}
					  ?>
CD </span></label>
                  </span> </div></th>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td>&nbsp;</td>
                <th>&nbsp;</th>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td><div align="right"><span class="style9">Before:</span></div></td>
                <th><div align="left">
                <?php echo '<input name="BOutPM" type="text"  size="10" value="'.$BPMOut.'" />'; ?>
                  <select name="BOutPM2" class="select1" >
                    <?php
                       
                       if ($BPMOut1=="AM")
					   	{
							echo '<option value="'.$BPMOut1.'">'.$BPMOut1.'</option>';
                       		echo '<option value="PM">PM</option>';
					   	}
					   elseif ($BPMOut1=="PM")
					    {
							echo '<option value="'.$BPMOut1.'">'.$BPMOut1.'</option>';
                       		echo '<option value="AM">AM</option>';
					   	}
					  else
						{
							echo '<option value="AM">AM</option>';
							echo '<option value="PM">PM</option>';
						}
					   
					   ?>
                  </select>
                
                </div></th>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td><div align="right"><span class="style9">After: </span></div></td>
                <th><div align="left">
                <?php echo '<input name="AOutPM" type="text"  size="10" value="'.$APMOut.'" />'; ?>
                  <select name="AOutPM2" class="select1" >
                    <?php
                       
                       if ($APMOut1=="AM")
					   	{
							echo '<option value="'.$APMOut1.'">'.$APMOut1.'</option>';
                       		echo '<option value="PM">PM</option>';
					   	}
					   elseif ($APMOut1=="PM")
					    {
							echo '<option value="'.$APMOut1.'">'.$APMOut1.'</option>';
                       		echo '<option value="AM">AM</option>';
					   	}
					   else
						{
							echo '<option value="AM">AM</option>';
							echo '<option value="PM">PM</option>';
						}
					   ?>
                  </select>
                
                </div></th>
              </tr>
              <tr>
                <th width="11">&nbsp;</th>
                <td width="100"><div align="right"></div></td>
                <th width="203"><div align="left"></div></th>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td>&nbsp;</td>
                <th>&nbsp;</th>
              </tr>
              <tr>
                <th width="11">&nbsp;</th>
                <td width="100">&nbsp;</td>
                <th width="203">&nbsp;</th>
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
   				       <input type="submit" name="btnSave" disabled="disabled" value="Save" onclick="javascript: form.action='TimeSchemeSave.php'; form.method='POST';"/>
           		
           		       <input type="submit" name="btnUpdate" id="button" value="Update" onclick="javascript: form.action='TimeSchemeUpdate.php'; form.method='POST';"/>
           		 
           		      
           		       <input type="submit" name="delete" id="button3" value="Delete" onclick="javascript: form.action='TimeSchemeDelete.php'; form.method='POST';"/>
           		
           		       <input type="reset" name="button2" id="button2" value="Reset" />
			         </div>
   				   </div></td>
			  </tr>
		</table>
        
        

</form>
	
</body>
</html>