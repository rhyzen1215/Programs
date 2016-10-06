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
	width: 225px;
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
.style8 {font-family: "Century Gothic"}
</style>
</head>

<body>


<?php
	
		include 'connect.php';
		$selCD1= 0;
		$selCD2= 0;
		$selCD3= 0;
		$selCD4= 0;
		$selBranch = $_POST['selectBranch'];
		$selComCode= $_POST['companyCode'];
		$selSchemeCode= $_POST['SchemeCode'];
		$selSchemeName= $_POST['SchemeName'];
		
		$selInAM= $_POST['InAM']." ".$_POST['InAM2'];
		$selOutAM= $_POST['OutAM']." ". $_POST['OutAM2'];
		$selInPM= $_POST['InPM']." ".$_POST['InPM2'];
		$selOutPM= $_POST['OutPM']." ".$_POST['OutPM2'];
		
		
		$BselInAM= $_POST['InAM3']." ".$_POST['InAM11'];
		$AselInAM= $_POST['InAM4']." ".$_POST['InAM12'];
		
		$BselOutAM= $_POST['OutAM5']." ". $_POST['OutAM3'];
		$AselOutAM= $_POST['OutAM6']." ". $_POST['OutAM4'];
		
		$BselInPM= $_POST['InPM3']." ".$_POST['InPM5'];
		$AselInPM= $_POST['InPM4']." ".$_POST['InPM6'];
		
		$BselOutPM= $_POST['OutPM3']." ". $_POST['OutPM5'];
		$AselOutPM= $_POST['OutPM4']." ". $_POST['OutPM6'];
		
		$selInAM = date('H:i:s',strtotime($selInAM));
		$selOutAM = date('H:i:s',strtotime($selOutAM));
		$selInPM = date('H:i:s',strtotime($selInPM));
		$selOutPM = date('H:i:s',strtotime($selOutPM));
		
		$BselInAM = date('H:i:s',strtotime($BselInAM));
		$AselInAM = date('H:i:s',strtotime($AselInAM));
		
		$BselOutAM = date('H:i:s',strtotime($BselOutAM));
		$AselOutAM = date('H:i:s',strtotime($AselOutAM));
		
		$BselInPM = date('H:i:s',strtotime($BselInPM));
		$AselInPM = date('H:i:s',strtotime($AselInPM));
		
		$BselOutPM = date('H:i:s',strtotime($BselOutPM));
		$AselOutPM = date('H:i:s',strtotime($AselOutPM));
		
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
			
		
		if ($selBranch == "-select-")
			{
			$SucAdd = 0;
			}
		else
			{
			$SucAdd = 1;
			}

		$sql5="SELECT * FROM TimeScheme where SchemeCode ='".$selSchemeCode."'";
		$rs5=odbc_exec($conn,$sql5);

			while (odbc_fetch_row($rs5))
					{
						if ($selSchemeCode == odbc_result($rs5,"SchemeCode"))
						{
						$SucAdd =2;
						}	
					}

	    if ($SucAdd == 1)
		{
		$rsTime="INSERT INTO TimeScheme(schemecode,schemename,InAM,OutAM,InPM,OutPM,InOT,OutOT,branch,companyCode,InAMminus,InAMplus,OutAMminus,OutAMplus,InPMminus,InPMplus,OutPMminus,OutPMplus) VALUES('$selSchemeCode','$selSchemeName','$selInAM','$selOutAM','$selInPM','$selOutPM',' ',' ','$selBranch','$selComCode','$BselInAM','$AselInAM','$BselOutAM','$AselOutAM','$BselInPM','$AselInPM','$BselOutPM','$AselOutPM')";
		$result=odbc_exec($conn,$rsTime) or die("Error in query");
		
		$rsTime="INSERT INTO TIMESCHEMEVAL(schemecode,timeSched,TimeFrom,TimeTo,TimeCode,DayFlag) VALUES('$selSchemeCode','$selInAM','$BselInAM','$AselInAM','1','$selCD1')";
		$result=odbc_exec($conn,$rsTime) or die("Error in query");
		
		$rsTime="INSERT INTO TIMESCHEMEVAL(schemecode,timeSched,TimeFrom,TimeTo,TimeCode,DayFlag) VALUES('$selSchemeCode','$selOutAM','$BselOutAM','$AselOutAM','2','$selCD2')";
		$result=odbc_exec($conn,$rsTime) or die("Error in query");
		
		$rsTime="INSERT INTO TIMESCHEMEVAL(schemecode,timeSched,TimeFrom,TimeTo,TimeCode,DayFlag) VALUES('$selSchemeCode','$selInPM','$BselInPM','$AselInPM','3','$selCD3')";
		$result=odbc_exec($conn,$rsTime) or die("Error in query");
		
		$rsTime="INSERT INTO TIMESCHEMEVAL(schemecode,timeSched,TimeFrom,TimeTo,TimeCode,DayFlag) VALUES('$selSchemeCode','$selOutPM','$BselOutPM','$AselOutPM','4','$selCD4')";
		$result=odbc_exec($conn,$rsTime) or die("Error in query");
		
		
		
		}
?>

             
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
 				
            <?php
			include 'connect.php';
			$x=1;
			$selbranch = $_REQUEST['selectBranch'];
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
            
             <table cellpadding="0" cellspacing="0">
              <tr>
			    <td width="680">
                  <div align="center">
                    <?php
					if ($SucAdd == 1)
					{
					echo '<font face="Century Gothic" style="font-weight: bold" color="Blue" size="4">Successfully Added</font>';
					}
					else if ($SucAdd == 2)
					{
					echo '<font face="Century Gothic" style="font-weight: bold" color="Red" size="4">Duplicate Scheme Code</font>';
					}
					else if ($SucAdd == 0)
					{
					echo '<font face="Century Gothic" style="font-weight: bold" color="Red" size="4">Please Select Station/Branch</font>';
					}
					
					?>
                  </div></td>
		      </tr>
			</table>
            
            <table width="720" cellpadding="0" cellspacing="0">
              <tr>
			    <td width="718"><span class="style7">Company Details</span></td>
		      </tr>
              <tr>
               <td><hr width=680px size="3" color="#666666" align="left"/></td>
               </tr>
			</table>
            
			
            
            <form name="form">
			 <table cellpadding="0" cellspacing="0">
             <tr>
			 <td width="335">
              	<table width="335" cellpadding="0" cellspacing="0">
		      		<tr>
   			 		  <th width="4">&nbsp;</th>
   			 	  		<td width="115"><div align="right" class="style13 style2"><font face="Century Gothic">Company Code:</font></div></td>
		   	 		  <th width="214"><div align="left"><?php echo '<input name="companyCode" type="text"  size="10" value="'.$comID.'" required  />'; ?>
		   	 		    <input type="submit" value="Fetch" name="fetch" onclick="javascript: form.action='TimeSchemeFetch.php'; form.method='GET';" />
		   	 		  
		   	 		  </div></th>
			 	  </tr>
                  	<tr>
   					  <th width="4">&nbsp;</th>
   				   		<td width="115"><div align="right" class="style13 style2"><font face="Century Gothic">Company Name:</font></div></td>
			    	  <th width="214"><div align="left"><?php echo '<input name="" type="text"  size="30" value="'.$compName1.'" readonly/>'; ?></div></th>
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
				  <?php 
					echo '<option value="'.$selbranch.'">'.$selbranch.'</option>';		
				  $sql3="SELECT * FROM Branches where companyID ='".$comID."'";
					$rs3=odbc_exec($conn,$sql3);
					while (odbc_fetch_row($rs3))
					{
						if ($selbranch != odbc_result($rs3,"Name"))
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
   				   <td width="100"><div align="right" class="style13 style2"><font face="Century Gothic">Scheme Code:</font></div></td>
   				   <th width="537"><div align="left"><input name="SchemeCode" type="text"  size="10" value="" required/>
   				     <input type="submit" value="Edit" name="Edit" onclick="javascript: form.action='TimeSchemeEdit.php'; form.method='GET';" />
   				   </div></th>
			  </tr>
                <tr>
    				<th width="9">&nbsp;</th>
			      <td width="100"><div align="right" class="style13 style2"><font face="Century Gothic">Scheme Name:</font></div></td>
			      <th width="537"><div align="left">
			        <input name="SchemeName" type="text"  size="30" value="" required />
                  </div></th>
			  </tr>
               
</table>
            
            
            
            
            
            
            
            
            
            
            
            <table cellpadding="0" cellspacing="0">
            <tr>
            
			<td width="306">
             <table width="292" cellpadding="0" cellspacing="0">
<tr>
    				<th width="8">&nbsp;</th>
		  <td width="103"><div align="right" class="style13 style2"></div></td>
       <th width="179"><div align="left"></div></th>
			   </tr>
                 <tr>
    				<th width="8">&nbsp;</th>
   				   <td width="103"><div align="right" class="style13 style2"><font face="Century Gothic">Time In (AM):</font></div></td>
   				   <th width="179"><div align="left">
   				     <input class="fieldtext" name="InAM" type="text"  size="10"  required />
   				     <select name="InAM2" class="select1" >
                       <option value="AM">AM</option>
                       <option value="PM">PM</option>
                     </select>
   				   </div></th>
			   </tr>
                <tr>
    				<th width="8">&nbsp;</th>
   				  <td width="103"><div align="right" class="style13 style2"><font face="Century Gothic">Time Out (AM):</font></div></td>
   				  <th width="179"><div align="left">
   				    <input class="fieldtext" name="OutAM" type="text"  size="10" required />
   				    <select name="OutAM2" class="select1" >
                      <option value="AM">AM</option>
                      <option value="PM">PM</option>
                    </select>
   				  </div></th>
			   </tr>
                 <tr>
    				<th width="8">&nbsp;</th>
			       <td width="103"><div align="right"></div></td>
		           <th width="179"><div align="left"></div></th>
               </tr>
                 <tr>
    			  <th width="8">&nbsp;</th>
   				  <td width="103">&nbsp;</td>
   				  <th width="179">&nbsp;</th>
               </tr>
                <tr>
    			  <th width="8" height="27">&nbsp;</th>
   				  <td width="103">&nbsp;</td>
   				  <th width="179">&nbsp;</th>
               </tr>
			</table>
			</td>
            
            
            
            
               
            <td width="406"><table width="318" cellpadding="0" cellspacing="0">
              <tr>
                <th width="8">&nbsp;</th>
                <td width="103"><div align="right" class="style13 style2"></div></td>
                <th width="205"><div align="left"></div></th>
              </tr>
              <tr>
                <th width="8">&nbsp;</th>
                <td width="103"><div align="right" class="style13 style2"><font face="Century Gothic">Time In (PM):</font></div></td>
                <th width="205"><div align="left">
                  <input class="fieldtext" name="InPM" type="text"  size="10" required  />
                  <select name="InPM2" class="select1" >
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                    </select>
                </div></th>
              </tr>
              <tr>
                <th width="8">&nbsp;</th>
                <td width="103"><div align="right" class="style13 style2"><font face="Century Gothic">Time Out (PM):</font></div></td>
                <th width="205"><div align="left">
                  <input class="fieldtext" name="OutPM" type="text"  size="10" required />
                  <select name="OutPM2" class="select1" >
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                  </select>
                </div></th>
              </tr>
              <tr>
                <th width="8">&nbsp;</th>
                <td width="103"><div align="right"></div></td>
                <th width="205"><div align="left"></div></th>
              </tr>
              <tr>
                <th width="8">&nbsp;</th>
                <td width="103">
                  <label></label>                </td>
                <th width="205"><div align="left"></div></th>
              </tr>
              <tr>
                <th width="8" height="27">&nbsp;</th>
                <td width="103">&nbsp;</td>
                <th width="205">&nbsp;</th>
              </tr>
            </table>            </tr>
            </table>
            


		 <table width="683" border="1">
            <tr>
              <th width="97" bgcolor="#00FFFF" scope="col"><span class="style9 style8 style2">Scheme Code</span></th>
              <th width="160" bgcolor="#00FFFF" scope="col"><span class="style9 style8 style2">Scheme Name</span></th>
              <th width="99" bgcolor="#00FFFF" scope="col"><span class="style9 style8 style2">In (AM)</span></th>
              <th width="87" bgcolor="#00FFFF" scope="col"><span class="style9 style8 style2">Out (AM)</span></th>
              <th width="94" bgcolor="#00FFFF" scope="col"><span class="style9 style8 style2">In (PM)</span></th>
              <th width="106" bgcolor="#00FFFF" scope="col"><span class="style9 style8 style2">Out (PM)</span></th>
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
        
        <table width="648" cellpadding="0" cellspacing="0">
                 <tr>
    				
   				   <td width="100"><div align="right" class="style13 style2">
   				     <div align="center">
   				     
			           </div>
   				   </div></td>
			  </tr>
		</table>

</form>
	
</body>
</html>