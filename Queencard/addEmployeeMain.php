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
                <td width="478"><div align="center"><span class="style3">EMPLOYEE DATA (Add Profile)</span></div></td>
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
			if ((isset($_GET['fetch'])) || (isset($_GET['proceed'])))
			{
			
			$comID = $_REQUEST['companyCode'];
			$selBranch = $_REQUEST['selectBranch'];
			$seqNo = $_REQUEST['sequenceno'];
			$sql="SELECT * FROM Company where companyID ='".$comID."'";
			$rs=odbc_exec($conn,$sql);
			$compName=odbc_result($rs,"CompanyName");
			$compAdd1=odbc_result($rs,"CompanyAdd");
		
			$sql2="SELECT * FROM Branches where companyID ='".$comID."'";
			$rs2=odbc_exec($conn,$sql2);
			$compStation=odbc_result($rs2,"Name");
			
			}
			
			
			if (strlen($comID) > 0 )
			{
			$sql1="SELECT * FROM SequenceID where companyCode = '".$comID."'";
			$rs1=odbc_exec($conn,$sql1);
			$x=0;
				while (odbc_fetch_row($rs1))
				{
					if ($x < odbc_result($rs1,"sequenceno"))
						{
						$x=odbc_result($rs1,"sequenceno");
						}
				}			
			$x=$x+1;
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
		   	 		    <input type="submit" value="Fetch" name="fetch" onclick="javascript: form.action='AddEmployeeCompanyFetch.php'; form.method='GET';" />
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
				  echo '<option>'.$selBranch.'</option>';

				  $sql3="SELECT * FROM Branches where companyID ='".$comID."'";
					$rs3=odbc_exec($conn,$sql3);
					while (odbc_fetch_row($rs3))
					{
						if (odbc_result($rs3,"Name") != $selBranch)
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
	             echo '<input type="text" name="sequenceno" size="10" value="'.$x.'" readonly="readonly" required />';
				?>
				<input type="button" value="Proceed" name="proceed"/>
			    </span></td>
		      </tr>
			</table>
  
            
			<table width="726" cellpadding="0" cellspacing="0">
              <tr>
                <td></td>
              </tr>
              <tr>
			    <td width="378"><span class="style7">Personal Information</span></td>     
              </tr>
              <tr>
              <td><hr width=654px size="3" color="#666666" align="left"/></td>
              </tr>
               <tr>
              <td><span class="style7">Employee Number:
                  <input name="EmpNo" type="text"  size="8"  />
                </span></td>
              </tr>
 			 </table>
           
           
			<table cellpadding="0" cellspacing="0">
            <tr>
            
			<td width="335" height="156">
             <table width="335" cellpadding="0" cellspacing="0">
		     <tr>
    				<th width="8">&nbsp;</th>
			   <td width="106"><div align="right" class="style13 style2"><font face="Century Gothic">Firstname:</font></div></td>
			   <th width="219"><div align="left"><input class="fieldtext" name="fname" type="text"  size="30"  /></div></th>
			   </tr>
                 <tr>
    				<th width="8">&nbsp;</th>
   				   <td width="106"><div align="right" class="style13 style2"><font face="Century Gothic">Middlename:</font></div></td>
   				   <th width="219"><div align="left"><input class="fieldtext" name="mname" type="text"  size="30"   /></div></th>
			   </tr>
                <tr>
    				<th width="8">&nbsp;</th>
   				  <td width="106"><div align="right" class="style13 style2"><font face="Century Gothic">Lastname:</font></div></td>
   				  <th width="219"><div align="left"><input class="fieldtext" name="lname" type="text"  size="30"  /></div></th>
			   </tr>
                 <tr>
    				<th width="8">&nbsp;</th>
   				   <td width="106"><div align="right" class="style13 style2"><font face="Century Gothic">Suffix:</font></div></td>
   				   <th width="219"><div align="left"><input class="fieldtext" name="suffix" type="text"  size="30"  /></div></th>
			   </tr>
                 <tr>
    			  <th width="8">&nbsp;</th>
   				  <td width="106"><div align="right" class="style13 style2"><font face="Century Gothic">Gender:</font></div></td>
   				  <th width="219"><div align="left">
                    <select name="gender">
  						<option value="Male">Male</option>
  						<option value="Female">Female</option>
					</select>
                    </div>                    </th>
			   </tr>
                <tr>
    			  <th width="8" height="27">&nbsp;</th>
   				  <td width="106"><div align="right" class="style13 style2"><font face="Century Gothic">Civil Status:</font></div></td>
   				  <th width="219"><div align="left">
                    <select name="status">
  						<option value="Single">Single</option>
  						<option value="Married">Married</option>
                        <option value="Widow/Widower">Widow/Widower</option>
  						<option value="Separated">Separated</option>
                        <option value="Others">Others</option>
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
   				   <th width="247"><div align="left"><input class="birthday" name="bday" type="date"  /></div></th>
  				</tr>
                <tr>
    				<th width="9">&nbsp;</th>
   				  <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Birthplace:</font></div></td>
   				  <th width="247"><div align="left"><input class="fieldtext" name="bplace" type="text" size="30"  /></div></th>
  				</tr>
                 <tr>
    				<th width="9">&nbsp;</th>
   				   <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Religion:</font></div></td>
   				   <th width="247"><div align="left"><input class="fieldtext" name="religion" type="text"  size="30"  /></div></th>
  				</tr>
                <tr>
    				<th width="9">&nbsp;</th>
			      <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Citizenship:</font></div></td>
			      <th width="247"><div align="left"><input class="fieldtext" name="citizenship" type="text"  size="30"  /></div></th>
  				</tr>
                 <tr>
    				<th width="9">&nbsp;</th>
   				   <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Height:</font></div></td>
   				   <th width="247"><div align="left"><input class="fieldtext" name="height" type="text"  size="30"  /></div></th>
  				</tr>
                 <tr>
    				<th width="9">&nbsp;</th>
   				   <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Weight:</font></div></td>
   				   <th width="247"><div align="left"><input class="fieldtext" name="weight" type="text"  size="30"  /></div></th>
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
                  <td width="595"><input class="addresstext" name="homeadd" type="text" value=""  /></td>
                </tr>
              </table>
       		  <table width="711" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="111"><div align="right"><span class="style9">Postal Code:</span></div></td>
                  <td width="247"><input class="fieldtext" name="HomePCode" type="text" value="" size="30" /></td>
                  <td width="98"><div align="right" class="style13 style2"><font face="Century Gothic">Telephone No.:</font></div></td>
                  <td width="253"><input class="fieldtext" name="HomeTelNo" type="text" value="" size="30" /></td>
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
                  <td width="601"><input  class="addresstext" name="PresentAdd" type="text" value="" /></td>
                </tr>
              </table>
       		  <table width="716" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="111"><div align="right" class="style13 style2"><font face="Century Gothic">Postal Code:</font></div></td>
                  <td width="238"><input class="fieldtext" name="PresentPCode" type="text" value="" size="30" /></td>
                  <td width="106"><div align="right" class="style13 style2"><font face="Century Gothic">Telephone No.:</font></div></td>
                  <td width="259"><input class="fieldtext" name="PresentTelNo" type="text" value="" size="30" /></td>
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
                  <td width="238"><input class="fieldtext" name="tin" type="text" value="" size="30" /></td>
                  <td width="105"><div align="right" class="style13 style2">
                    <div align="right"><font face="Century Gothic">SSS Number:</font></div>
                  </div></td>
                  <td width="252"><input class="fieldtext" name="sss" type="text" value="" size="30" /></td>
                </tr>
                <tr>	
                  <td width="111"><div align="right" class="style13 style2">
                    <div align="right"><font face="Century Gothic">HDMF Number:</font></div>
                  </div></td>
                  <td width="238"><input class="fieldtext" name="hdmf" type="text" value="" size="30" /></td>
                  <td width="105"><div align="right" class="style13 style2">
                    <div align="right"><font face="Century Gothic">Philhealth No.:</font></div>
                  </div></td>
                  <td width="252"><input class="fieldtext" name="philhealth" type="text" value="" size="30" /></td>
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
                  <td width="235"><input name="Overtime" type="checkbox" value="1"/>
                  <span class="style9">Allow Overtime</span></td>
                  <td width="105">&nbsp;</td>
                  <td width="252"><label></label></td>
       		   </tr>
                <tr>	
                  <td width="114">&nbsp;</td>
                  <td width="235">&nbsp;</td>
                  <td width="105">&nbsp;</td>
                  <td width="252">
                 <input type="submit" value="Save" name="submit" onclick="javascript: form.action='AddEmployee.php'; form.method='POST';" />
                 <input type="reset" name="Reset" id="button" value="Reset" /></td>
               </tr>
              </table>
              </td>
              </tr>
			
  			</table>
           
     </form>
</body>
</html>