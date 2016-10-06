<?php
	
		if (strlen($_POST['fname'])==0)
		{
		include 'AddEmployeemain.php';
		exit;
		}
		
		include 'connect.php';
		$selBranch = $_REQUEST['selectBranch'];
		$comID = $_REQUEST['companyCode'];
		$companyCode = $_POST['companyCode'];
		$station1 = $_POST['selectBranch'];
		$seqnum = $_POST['sequenceno'];
		$selEmpNo = $_REQUEST['EmpNo'];
		$lname1 = $_POST['lname'];
		$fname1 = $_POST['fname'];
		$mname1 = $_POST['mname'];
		$suffix1 = $_POST['suffix'];
		$gender1 = $_POST['gender'];
		$status1 = $_POST['status'];
		$bday1 = $_POST['bday'];
		$bplace1 = $_POST['bplace'];
		$religion1 = $_POST['religion'];
		$citizenship1 = $_POST['citizenship'];
		$height1 = $_POST['height'];
		$weight1 = $_POST['weight'];
		$homeadd1 = $_POST['homeadd'];
		$homepcode1 = $_POST['HomePCode'];
		$hometelno1 = $_POST['HomeTelNo'];
		$presentadd1 = $_POST['PresentAdd'];
		$presentpcode1 = $_POST['PresentPCode'];
		$presenttelno1 = $_POST['PresentTelNo'];
		$tin1 = $_POST['tin'];
		$sss1 = $_POST['sss'];
		$hdmf1 = $_POST['hdmf'];
		$philhealth1 = $_POST['philhealth'];
		
	
		$query="INSERT INTO Employee(sequenceno,employeeno,firstname,middlename,lastname,suffix,gender,status,birthday,birthplace,religion,citizenship,height,weight,homeadd,homePCode,hometelno,presentadd,presentpcode,presenttelno,tin,sss,hdmf,philhealth,companycode,station,timescheme) VALUES('$seqnum','$selEmpNo','$fname1','$mname1','$lname1','$suffix1','$gender1','$status1','$bday1','$bplace1','$religion1','$citizenship1','$height1','$weight1','$homeadd1','$homepcode1','$hometelno1','$presentadd1','$presentpcode1','$presenttelno1','$tin1','$sss1','$hdmf1','$philhealth1','$companyCode','$station1',' ')";
		
		$result=odbc_exec($conn,$query) or die("Error in query");
		
		$query1="INSERT INTO SequenceID(sequenceno,companycode) VALUES('$seqnum','$companyCode')";
		$result1=odbc_exec($conn,$query1) or die("Error in query");
		
		echo '<font face="Century Gothic" color="red">Successfully Added</font>';
		
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
               <td><hr width=654px size="3" color="#666666" align="left"/></td>
               </tr>
			</table>
            <form name="form">
			<?php
			
			
			$compName="";
			$compAdd="";
			$compStation="";
			$x="";
			
			$sql="SELECT * FROM Company where companyID ='".$comID."'";
			$rs=odbc_exec($conn,$sql);
			$compName=odbc_result($rs,"CompanyName");
			$compAdd1=odbc_result($rs,"companyAdd");
			
			$sql2="SELECT * FROM Branches where companyID ='".$comID."'";
			$rs2=odbc_exec($conn,$sql2);
			$compStation=odbc_result($rs2,"Name");

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
			    	  <th width="215"><div align="left"><?php echo '<input name="compname" type="text"  size="30" value="'.$compName.'" readonly />'; ?></div></th>
				  </tr>
			</table>
			</td>
            

            <td width="383">
			<table width="370" cellpadding="0" cellspacing="0">
                 <tr>
    				<th width="9">&nbsp;</th>
   				   <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Company Address:</font></div></td>
   				   <th width="247"><div align="left"><?php echo '<input name="compadd" type="text"  size="30" value="'.$compAdd1.'" readonly />'; ?></div></th>
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
				<input type="submit" value="Proceed" name="proceed" onclick="javascript: form.action='AddEmployeeMain.php'; form.method='GET';" />
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
 			 </table>
           
           
			<table cellpadding="0" cellspacing="0">
            <tr>
            
			<td width="335" height="165">
             <table width="335" cellpadding="0" cellspacing="0">
		     <tr>
    				<th width="4">&nbsp;</th>
   				  <td width="92"><div align="right" class="style13 style2"><font face="Century Gothic">Firstname:</font></div></td>
			   <th width="217"><div align="left"><input name="fname" type="text"  size="30" required /></div></th>
			   </tr>
                 <tr>
    				<th width="4">&nbsp;</th>
   				   <td width="92"><div align="right" class="style13 style2"><font face="Century Gothic">Middlename:</font></div></td>
   				   <th width="217"><div align="left"><input name="mname" type="text"  size="30" required  /></div></th>
  				</tr>
                <tr>
    				<th width="4">&nbsp;</th>
   				  <td width="92"><div align="right" class="style13 style2"><font face="Century Gothic">Lastname:</font></div></td>
   				  <th width="217"><div align="left"><input name="lname" type="text"  size="30"  /></div></th>
  				</tr>
                 <tr>
    				<th width="4">&nbsp;</th>
   				   <td width="92"><div align="right" class="style13 style2"><font face="Century Gothic">Suffix:</font></div></td>
   				   <th width="217"><div align="left"><input name="suffix" type="text"  size="30"  /></div></th>
  				</tr>
                 <tr>
    			  <th width="8">&nbsp;</th>
   				  <td width="101"><div align="right" class="style13 style2"><font face="Century Gothic">Gender:</font></div></td>
   				  <th width="197"><div align="left">
                    <select name="gender">
  						<option value="Male">Male</option>
  						<option value="Female">Female</option>
					</select>
                    </div>                    </th>
  				</tr>
                <tr>
    			  <th width="8" height="27">&nbsp;</th>
   				  <td width="101"><div align="right" class="style13 style2"><font face="Century Gothic">Civil Status:</font></div></td>
   				  <th width="197"><div align="left">
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
   				   <th width="247"><div align="left"><input name="bday" type="date" width="200"  /></div></th>
  				</tr>
                <tr>
    				<th width="9">&nbsp;</th>
   				  <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Birthplace:</font></div></td>
   				  <th width="247"><div align="left"><input name="bplace" type="text" size="30"  /></div></th>
  				</tr>
                 <tr>
    				<th width="9">&nbsp;</th>
   				   <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Religion:</font></div></td>
   				   <th width="247"><div align="left"><input name="religion" type="text"  size="30"  /></div></th>
  				</tr>
                <tr>
    				<th width="9">&nbsp;</th>
			      <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Citizenship:</font></div></td>
			      <th width="247"><div align="left"><input name="citizenship" type="text"  size="30"  /></div></th>
  				</tr>
                 <tr>
    				<th width="9">&nbsp;</th>
   				   <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Height:</font></div></td>
   				   <th width="247"><div align="left"><input name="height" type="text"  size="30"  /></div></th>
  				</tr>
                 <tr>
    				<th width="9">&nbsp;</th>
   				   <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Weight:</font></div></td>
   				   <th width="247"><div align="left"><input name="weight" type="text"  size="30"  /></div></th>
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
                  <td width="115"><div align="right" class="style13">
                    <div align="right" class="style2"><font face="Century Gothic">Home Address:</font></div>
                  </div></td>
                  <td width="591"><input name="homeadd" type="text" value="" size="87" /></td>
                </tr>
              </table>
       		  <table width="711" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="114"><div align="right" class="style13">
                  <div align="right"><font face="Century Gothic"><span class="style2">Postal Code:</span></font></div></td>
                  <td width="244"><input name="HomePCode" type="text" value="" size="30" /></td>
                  <td width="98"><div align="right" class="style13 style2"><font face="Century Gothic">Telephone No.:</font></div></td>
                  <td width="253"><input name="HomeTelNo" type="text" value="" size="30" /></td>
                </tr>
              </table>
             </td>
             </tr>
            
  </table>
           
  <table width="716" cellpadding="0" cellspacing="0">
<tr>
            <td width="714">
       		  <table width="708" cellpadding="0" cellspacing="0">
          		<tr>	
                  <td width="115" height="27"><div align="right" class="style13 style2">
                    <div align="right"><font face="Century Gothic">Present Address:</font></div>
                  </div></td>
                  <td width="591"><input name="PresentAdd" type="text" value="" size="87" /></td>
                </tr>
              </table>
       		  <table width="707" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="115"><div align="right" class="style13 style2"><font face="Century Gothic">Postal Code:</font></div></td>
                  <td width="240"><input name="PresentPCode" type="text" value="" size="30" /></td>
                  <td width="100"><div align="right" class="style13 style2"><font face="Century Gothic">Telephone No.:</font></div></td>
                  <td width="250"><input name="PresentTelNo" type="text" value="" size="30" /></td>
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
                  <td width="114"><div align="right" class="style13 style2">
                    <div align="right"><font face="Century Gothic">TIN:</font></div>
                  </div></td>
                  <td width="235"><input name="tin" type="text" value="" size="30" /></td>
                  <td width="105"><div align="right" class="style13 style2">
                    <div align="right"><font face="Century Gothic">SSS Number:</font></div>
                  </div></td>
                  <td width="252"><input name="sss" type="text" value="" size="30" /></td>
                </tr>
                <tr>	
                  <td width="114"><div align="right" class="style13 style2">
                    <div align="right"><font face="Century Gothic">HDMF Number:</font></div>
                  </div></td>
                  <td width="235"><input name="hdmf" type="text" value="" size="30" /></td>
                  <td width="105"><div align="right" class="style13 style2">
                    <div align="right"><font face="Century Gothic">Philhealth No.:</font></div>
                  </div></td>
                  <td width="252"><input name="philhealth" type="text" value="" size="30" /></td>
                </tr>
              </table>        
             </td>
    		</tr>
            <tr>
            <td>
             <table width="708" cellpadding="0" cellspacing="0">
          		<tr>	
                  <td width="114">&nbsp;</td>
                  <td width="235">&nbsp;</td>
                  <td width="105">&nbsp;</td>
                  <td width="252"><label></label></td>
       		   </tr>
                <tr>	
                  <td width="114">&nbsp;</td>
                  <td width="235">&nbsp;</td>
                  <td width="105">&nbsp;</td>
                  <td width="252">
                 <input type="submit" value="Save" name="submit" onclick="javascript: form.action='AddEmployee.php'; form.method='POST';" />
                 <label>
                 <input type="reset" name="Reset" value="Reset" />
                 </label></td>
               </tr>
              </table>
              </td>
              </tr>
			
  			</table>
           
     </form>
 
 </body>
 </html>    