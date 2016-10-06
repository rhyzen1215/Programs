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
	width: 199px;
	margin-left:2px;
	text-align:center
}



input[type=date]
{
	width: 193px;
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


.fieldtext
{
width: 195px;
}

.addresstext
{
width: 540px;

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
.style9 {
	font-family: "Century Gothic";
	font-size: 12px;
}
</style>
</head>

<body>

<?php
include 'connect.php';	
?>

                
<table width="728">
            
           	  <tr>
                <td width="98" height="10"></td>
                </tr>
                
                <tr>
                <td width="98"></td>
                <td width="478"><div align="center"><span class="style3">EMPLOYEE DATA (Edit Profile)</span></div></td>
                <td width="136"></td>
              </tr>
                <tr>
                <td width="98" height="2"></td>
  </tr>
                
             </table>
 			
            
             <table width="720" cellpadding="0" cellspacing="0">
              <tr>
			    <td width="718"><span class="style7">Company Details</span></td>
		      </tr>
              <tr>
               <td height="3"><hr width=654px size="3" color="#666666" align="left"/></td>
               </tr>
			</table>
            <form name="form">
			<?php
			$comID="";
			$compName="";
			$compAdd1="";
			$compStation="";
			$x="";
					$EN="";
					$FName="";
					$LName="";
					$MName="";
					$Sfx="";
					$Gender="";
					$Stat="";
					$Bday="";
					$Bday ="";
					$Bday ="";
					$Bplace="";
					$Rel="";
					$Cit="";
					$Height="";
					$Weight="";
					$HAdd="";
					$HPCode="";
					$HTNum="";
					$PAdd="";
					$PPCode="";
					$PTNum="";
					$Tin="";
					$SSS="";
					$PhilHealth="";
					$HDMF="";
					$Over=0;
					
			if ((isset($_GET['fetch'])) || (isset($_GET['proceed'])))
			{
			
			$comID = $_REQUEST['companyCode'];
			$selBranch = $_REQUEST['selectBranch'];
			$seqNo = $_REQUEST['sequenceno'];
			$sql="SELECT * FROM Company where companyID ='".$comID."'";
			$rs=odbc_exec($conn,$sql);
			$compName=odbc_result($rs,"CompanyName");
			$compAdd1=odbc_result($rs,"CompanyAdd");
		
			$sql2="SELECT * FROM Employee where employeeno ='".$seqNo."' and companycode = '".$comID."'";
			$rs2=odbc_exec($conn,$sql2);
			$CIDCheck=odbc_result($rs2,"companycode");
			if ($CIDCheck == $comID)
					{
					$EN=odbc_result($rs2,"sequenceno");
					$FName=odbc_result($rs2,"Firstname");
					$LName=odbc_result($rs2,"Lastname");
					$MName=odbc_result($rs2,"MiddleName");
					$Sfx=odbc_result($rs2,"Suffix");
					$Gender=odbc_result($rs2,"Gender");
					$Stat=odbc_result($rs2,"Status");
					$Bday=odbc_result($rs2,"Birthday");
					$Bday = date_create($Bday);
					$Bday = date_format($Bday,"m/d/Y");
					$Bplace=odbc_result($rs2,"BirthPlace");
					$Rel=odbc_result($rs2,"Religion");
					$Cit=odbc_result($rs2,"Citizenship");
					$Height=odbc_result($rs2,"Height");
					$Weight=odbc_result($rs2,"Weight");
					$HAdd=odbc_result($rs2,"HomeAdd");
					$HPCode=odbc_result($rs2,"HomePCode");
					$HTNum=odbc_result($rs2,"HomeTelNo");
					$PAdd=odbc_result($rs2,"PresentAdd");
					$PPCode=odbc_result($rs2,"PresentPCode");
					$PTNum=odbc_result($rs2,"PresentTelNo");
					$Tin=odbc_result($rs2,"Tin");
					$SSS=odbc_result($rs2,"SSS");
					$PhilHealth=odbc_result($rs2,"PhilHealth");
					$HDMF=odbc_result($rs2,"HDMF");
					$Over=odbc_result($rs2,"Overtime");
					
					$BName=odbc_result($rs2,"station");
					}
			else
					{
					$seqNo="";
					$BName="-select-";
					}
			
			}

			?>		
            
            
			 <table cellpadding="0" cellspacing="0">
             <tr>
			 <td width="335">
              	<table width="335" cellpadding="0" cellspacing="0">
		      		<tr>
   			 		  <th width="4">&nbsp;</th>
   			 	  		<td width="114"><div align="right" class="style13 style2"><font face="Century Gothic">Company Code:</font></div></td>
		   	 		  <th width="215"><div align="left"><?php echo '<input name="companyCode" type="text"  size="10" value="'.$comID.'" required />'; ?>
		   	 		    <input type="submit" value="Fetch" name="fetch" onclick="javascript: form.action='EmployeeCompanyFetch.php'; form.method='GET';" />
		   	 		  </div></th>
			 	  </tr>
                  	<tr>
   					  <th width="4">&nbsp;</th>
   				   		<td width="114"><div align="right" class="style13 style2"><font face="Century Gothic">Company Name:</font></div></td>
			    	  <th width="215"><div align="left"><?php echo '<input class="fieldtext" name="compname" type="text"  size="30" value="'.$compName.'" readonly />'; ?></div></th>
				  </tr>
			</table>
			</td>
            

            <td width="383">
			<table width="370" cellpadding="0" cellspacing="0">
                 <tr>
    				<th width="9">&nbsp;</th>
   				   <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Company Address:</font></div></td>
   				   <th width="247"><div align="left"><?php echo '<input class="fieldtext" name="compadd" type="text"  size="30" value="'.$compAdd1.'" readonly />'; ?></div></th>
  				</tr>
                <tr>
    				<th width="9">&nbsp;</th>
			      <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Station/Branch:</font></div></td>
			      <th width="247"><div align="left">
				   <select name="selectBranch" size="1">
                  <?php 
				  echo '<option>'.$BName.'</option>';

				  $sql3="SELECT * FROM Branches where companyID ='".$comID."'";
					$rs3=odbc_exec($conn,$sql3);
					while (odbc_fetch_row($rs3))
					{
						if (odbc_result($rs3,"Name") != $BName)
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
			    <td width="411"><span class="style7">Employee ID Number:
                <?php
	             echo '<input type="text" name="sequenceno" size="10" value="'.$seqNo.'"  />';
				?>
				<input type="submit" value="Proceed" name="proceed" onclick="javascript: form.action='EmployeeEdit.php'; form.method='GET';" />
                
                
                
			    </span></td>
		      </tr>
			</table>
  
            
			<table width="726" cellpadding="0" cellspacing="0">
              <tr>
			    <td width="378"><span class="style7">Personal Information</span></td>     
              </tr>
              <tr>
              <td><hr width=654px size="3" color="#666666" align="left"/></td>
              </tr>
               <tr>
              <td><span class="style7">Sequence Number:
                  <?php
	             echo '<input type="text" name="EmpNo" size="8" value="'.$EN.'" readonly />';
				?>
                </span></td>
              </tr>
 			 </table>
           
           
			<table cellpadding="0" cellspacing="0">
            <tr>
            
			<td width="335" height="156">
             <table width="335" cellpadding="0" cellspacing="0">
		     <tr>
    				<th width="8">&nbsp;</th>
			   <td width="108"><div align="right" class="style13 style2"><font face="Century Gothic">Firstname:</font></div></td>
			   <th width="217"><div align="left"><?php echo '<input class="fieldtext" name="fname" type="text"  size="30" value="'.$FName.'"  />'; ?></div></th>
			   </tr>
                 <tr>
    				<th width="8">&nbsp;</th>
   				   <td width="108"><div align="right" class="style13 style2"><font face="Century Gothic">Middlename:</font></div></td>
   				   <th width="217"><div align="left"><?php echo '<input class="fieldtext" name="mname" type="text"  size="30" value="'.$MName.'"  />'; ?></div></th>
  				</tr>
                <tr>
    				<th width="8">&nbsp;</th>
   				  <td width="108"><div align="right" class="style13 style2"><font face="Century Gothic">Lastname:</font></div></td>
   				  <th width="217"><div align="left"><?php echo '<input class="fieldtext" name="lname" type="text"  size="30" value="'.$LName.'"  />'; ?></div></th>
  				</tr>
                 <tr>
    				<th width="8">&nbsp;</th>
   				   <td width="108"><div align="right" class="style13 style2"><font face="Century Gothic">Suffix:</font></div></td>
   				   <th width="217"><div align="left"><?php echo '<input class="fieldtext" name="Suffix" type="text"  size="30" value="'.$Sfx.'"  />'; ?></div></th>
  				</tr>
                 <tr>
    			  <th width="8">&nbsp;</th>
   				  <td width="108"><div align="right" class="style13 style2"><font face="Century Gothic">Gender:</font></div></td>
   				  <th width="217"><div align="left">
                    <select name="gender">
                    <?Php
  					echo '<option value="'.$Gender.'">'.$Gender.'</option>';
						if ($Gender=="Male")
						{
  						echo '<option value="Female">Female</option>';
						}
						else
						{
  						echo '<option value="Male">Male</option>';
						}
					?>
					</select>
                    </div>                    </th>
			   </tr>
                <tr>
    			  <th width="8" height="27">&nbsp;</th>
   				  <td width="108"><div align="right" class="style13 style2"><font face="Century Gothic">Civil Status:</font></div></td>
   				  <th width="217"><div align="left">
                    <select name="status">
                    
                    <?Php
  					echo '<option value="'.$Stat.'">'.$Stat.'</option>';
						if ($Stat=="Single")
						{
  						echo '<option value="Married">Married</option>';
                        echo '<option value="Widow/Widower">Widow/Widower</option>';
  						echo '<option value="Separated">Separated</option>';
                        echo '<option value="Others">Others</option>';
						}
						else if ($Stat=="Married")
						{
  						echo '<option value="Single">Single</option>';
                        echo '<option value="Widow/Widower">Widow/Widower</option>';
  						echo '<option value="Separated">Separated</option>';
                        echo '<option value="Others">Others</option>';
						}
						else if ($Stat=="Widow/Widower")
						{
  						echo '<option value="Single">Single</option>';
  						echo '<option value="Married">Married</option>';
  						echo '<option value="Separated">Separated</option>';
                        echo '<option value="Others">Others</option>';
						}
						else if ($Stat=="Separated")
						{
  						echo '<option value="Single">Single</option>';
  						echo '<option value="Married">Married</option>';
                        echo '<option value="Widow/Widower">Widow/Widower</option>';
                        echo '<option value="Others">Others</option>';
						}
						else if ($Stat=="Others")
						{
  						echo '<option value="Single">Single</option>';
  						echo '<option value="Married">Married</option>';
                        echo '<option value="Widow/Widower">Widow/Widower</option>';
  						echo '<option value="Separated">Separated</option>';
						}
						
					?>
  						
					</select>
                    </div> </th>
			   </tr>
			</table>
			</td>
            
            
            
               
            <td width="377">
			 <table width="370" cellpadding="0" cellspacing="0">
                 <tr>
    				<th width="9">&nbsp;</th>
   				   <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Birthday:</font></div></td>
   				   <th width="247"><div align="left"><?php echo '<input name="bday" type="text"  class="fieldtext" value="'.$Bday.'"  />'; ?></div></th>
  				</tr>
                <tr>
    				<th width="9">&nbsp;</th>
   				  <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Birthplace:</font></div></td>
   				  <th width="247"><div align="left"><?php echo '<input class="fieldtext" name="Bplace" type="text"  size="30" value="'.$Bplace.'"  />'; ?></div></th>
  				</tr>
                 <tr>
    				<th width="9">&nbsp;</th>
   				   <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Religion:</font></div></td>
   				   <th width="247"><div align="left"><?php echo '<input class="fieldtext" name="Rel" type="text"  size="30" value="'.$Rel.'"  />'; ?></div></th>
  				</tr>
                <tr>
    				<th width="9">&nbsp;</th>
			      <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Citizenship:</font></div></td>
			      <th width="247"><div align="left"><?php echo '<input class="fieldtext" name="Cit" type="text"  size="30" value="'.$Cit.'"  />'; ?></div></th>
  				</tr>
                 <tr>
    				<th width="9">&nbsp;</th>
   				   <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Height:</font></div></td>
   				   <th width="247"><div align="left"><?php echo '<input class="fieldtext" name="Height" type="text"  size="30" value="'.$Height.'"  />'; ?></div></th>
  				</tr>
                 <tr>
    				<th width="9">&nbsp;</th>
   				   <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Weight:</font></div></td>
   				   <th width="247"><div align="left"><?php echo '<input class="fieldtext" name="Weight" type="text"  size="30" value="'.$Weight.'"  />'; ?></div></th>
  				</tr>
			</table>
			</td>
            </tr>
            </table>
            
			<table width="717" cellpadding="0" cellspacing="0">
            <tr>
            <td width="715" height="66">
       		  <table width="708" cellpadding="0" cellspacing="0">
          		<tr>	
                  <td width="111"><div align="right" class="style13">
                    <div align="right" class="style2"><font face="Century Gothic">Home Address:</font></div>
                  </div></td>
                  <td width="595"><?php echo '<input class="addresstext" name="HAdd" type="text"  size="30" value="'.$HAdd.'"  />'; ?></td>
                </tr>
              </table>
       		  <table width="711" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="111"><div align="right"><span class="style9">Postal Code:</span></div></td>
                  <td width="247"><?php echo '<input class="fieldtext" name="HPCode" type="text"  size="30" value="'.$HPCode.'"  />'; ?></td>
                  <td width="98"><div align="right" class="style13 style2"><font face="Century Gothic">Telephone No.:</font></div></td>
                  <td width="253"><?php echo '<input class="fieldtext" name="HTNum" type="text"  size="30" value="'.$HTNum.'"  />'; ?></td>
                </tr>
              </table>
             </td>
             </tr>
            
  </table>
           
  		<table width="716" cellpadding="0" cellspacing="0">
			<tr>
            <td width="714">
       		  <table width="715" cellpadding="0" cellspacing="0">
          		<tr>	
                  <td width="112" height="27"><div align="right" class="style13 style2">
                    <div align="right"><font face="Century Gothic">Present Address:</font></div>
                  </div></td>
                  <td width="601"><?php echo '<input class="addresstext" name="PAdd" type="text"  size="30" value="'.$PAdd.'"  />'; ?></td>
                </tr>
              </table>
       		  <table width="716" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="111"><div align="right" class="style13 style2"><font face="Century Gothic">Postal Code:</font></div></td>
                  <td width="238"><?php echo '<input class="fieldtext" name="PPCode" type="text"  size="30" value="'.$PPCode.'"  />'; ?></td>
                  <td width="106"><div align="right" class="style13 style2"><font face="Century Gothic">Telephone No.:</font></div></td>
                  <td width="259"><?php echo '<input class="fieldtext" name="PTNum" type="text"  size="30" value="'.$PTNum.'"  />'; ?></td>
                </tr>
              </table>
             </td>
    </tr>
  </table>
            
            
<table width="700" cellpadding="0" cellspacing="0">
            <tr>
            <td width="727">
       		  <table width="708" cellpadding="0" cellspacing="0">
          		<tr>	
                  <td width="111"><div align="right" class="style13 style2">
                    <div align="right"><font face="Century Gothic">TIN:</font></div>
                  </div></td>
                  <td width="238"><?php echo '<input class="fieldtext" name="Tin" type="text"  size="30" value="'.$Tin.'"  />'; ?></td>
                  <td width="105"><div align="right" class="style13 style2">
                    <div align="right"><font face="Century Gothic">SSS Number:</font></div>
                  </div></td>
                  <td width="252"><?php echo '<input class="fieldtext" name="SSS" type="text"  size="30" value="'.$SSS.'"  />'; ?></td>
                </tr>
                <tr>	
                  <td width="111"><div align="right" class="style13 style2">
                    <div align="right"><font face="Century Gothic">HDMF Number:</font></div>
                  </div></td>
                  <td width="238"><?php echo '<input class="fieldtext" name="HDMF" type="text"  size="30" value="'.$HDMF.'"  />'; ?></td>
                  <td width="105"><div align="right" class="style13 style2">
                    <div align="right"><font face="Century Gothic">Philhealth No.:</font></div>
                  </div></td>
                  <td width="252"><?php echo '<input class="fieldtext" name="PhilHealth" type="text"  size="30" value="'.$PhilHealth.'"  />'; ?></td>
                </tr>
              </table>        
             </td>
    		</tr>
            <tr>
            <td>
             <table width="708" cellpadding="0" cellspacing="0">
          		<tr>
          		  <td>&nbsp;</td>
          		  <td>&nbsp;</td>
          		  <td>&nbsp;</td>
          		  <td>&nbsp;</td>
       		   </tr>
          		<tr>	
                  <td width="114">&nbsp;</td>
                  <td width="235"><?Php
				  						if ($Over==1)
											{
												echo '<input name="Overtime" type="checkbox" value="1" checked="checked"/>';
											}
										else
											{
												echo '<input name="Overtime" type="checkbox" value="1"/>';
											}
								  ?>
                    <span class="style9">Allow overtime</span></td>
                  <td width="105">&nbsp;</td>
                  <td width="252"><label></label></td>
       		   </tr>
                <tr>	
                  <td width="114">&nbsp;</td>
                  <td width="235">&nbsp;</td>
                  <td width="105">&nbsp;</td>
                  <td width="252">
                 <input type="submit" value="Update" name="Update" onclick="javascript: form.action='EmployeeUpdate.php'; form.method='POST';" />
                 <input type="reset" name="Reset" id="button" value="Reset" /></td>
               </tr>
              </table>
              </td>
              </tr>
			
  			</table>
           
     </form>
     
</body>
</html>