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
			<table width="728">
            
           	  <tr>
                <td width="98" height="10"></td>
                </tr>
                
                <tr>
                <td width="98"></td>
                <td width="478"><div align="center"><span class="style3">EMPLOYEE DATA</span></div></td>
                <td width="136"></td>
              </tr>
                <tr>
                <td width="98" height="5"></td>
                </tr>
                
             </table>
			
            
            <form action="addEmployeeMainSN.php">
            <table width="726" cellpadding="0" cellspacing="0">
              <tr>
               	<td width="1"></td>
			    <td width="390"><span class="style7">Company Details</span></td>
                <td width="333" ><span class="style8">Company No.
                </span>
                  <input name="" type="text" size="10"/>
                  <input type="submit" value="Fetch" /></td>
		      </tr>
 			 </table>
             
             </table>
            
			 <table width="729" cellpadding="0" cellspacing="0" >
		      <tr>
			    <td><hr width=654px size="3" color="#666666" align="left"/></td>
		      </tr>
  			</table>
             
            
            <table cellpadding="0" cellspacing="0">
            <tr>
				<td width="335">
             	<table width="335" cellpadding="0" cellspacing="0">
		     		<tr>
   					  <th width="4">&nbsp;</th>
   				  		<td width="114"><div align="right" class="style13 style2"><font face="Century Gothic">Company Code:</font></div></td>
		   			  <th width="215"><div align="left"><input name="" type="text"  size="30" required /></div></th>
				  </tr>
                 	<tr>
   					  <th width="4">&nbsp;</th>
   				   		<td width="114"><div align="right" class="style13 style2"><font face="Century Gothic">Company Name:</font></div></td>
			    	  <th width="215"><div align="left"><input name="" type="text"  size="30" required /></div></th>
				  </tr>
			</table>
			</td>
            

            <td width="383">
			 <table width="370" cellpadding="0" cellspacing="0">
                 <tr>
    				<th width="9">&nbsp;</th>
   				   <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Address:</font></div></td>
   				   <th width="247"><div align="left"><input name="" type="text"  size="30" required /></div></th>
  				</tr>
                <tr>
    				<th width="9">&nbsp;</th>
			      <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Station:</font></div></td>
			      <th width="247"><div align="left"><input name="" type="text"  size="30" required /></div></th>
  				</tr>
         
                
			</table>
			</td>
            </tr>
            <tr height="15">
            </tr>
            </table>
            
            
            
			<table width="726" cellpadding="0" cellspacing="0">
              <tr>
               	<td width="1"></td>
			    <td width="390"><span class="style7">Personal Information</span></td>
                <td width="332" ><span class="style8">Sequence No.
                </span>
                <?php
				include 'SequenceNumber.php';
				?>
                <input type="submit" value="Fetch" /></td>
                
               <td width="1"></td>
		      </tr>
 			 </table>
            
            <table width="729" cellpadding="0" cellspacing="0" >
		      <tr>
			    <td><hr width=654px size="3" color="#666666" align="left"/></td>
		      </tr>
  </table>
</form>
<form method="post" action="AddEmployee.php">
			<table cellpadding="0" cellspacing="0">
            <tr>
            
            
			<td width="335" height="165">
             <table width="335" cellpadding="0" cellspacing="0">
		     <tr>
    				<th width="4">&nbsp;</th>
   				  <td width="92"><div align="right" class="style13 style2"><font face="Century Gothic">Firstname:</font></div></td>
			   <th width="217"><div align="left"><input name="" type="text"  size="30" required /></div></th>
  				</tr>
                 <tr>
    				<th width="4">&nbsp;</th>
   				   <td width="92"><div align="right" class="style13 style2"><font face="Century Gothic">Middlename:</font></div></td>
   				   <th width="217"><div align="left"><input name="" type="text"  size="30" required /></div></th>
  				</tr>
                <tr>
    				<th width="4">&nbsp;</th>
   				  <td width="92"><div align="right" class="style13 style2"><font face="Century Gothic">Lastname:</font></div></td>
   				  <th width="217"><div align="left"><input name="" type="text"  size="30" required /></div></th>
  				</tr>
                 <tr>
    				<th width="4">&nbsp;</th>
   				   <td width="92"><div align="right" class="style13 style2"><font face="Century Gothic">Suffix:</font></div></td>
   				   <th width="217"><div align="left"><input name="" type="text"  size="30" required /></div></th>
  				</tr>
                 <tr>
    			  <th width="8">&nbsp;</th>
   				  <td width="101"><div align="right" class="style13 style2"><font face="Century Gothic">Gender:</font></div></td>
   				  <th width="197"><div align="left">
                    <select>
  						<option value="male">Male</option>
  						<option value="female">Female</option>
					</select>
                    </div>                    </th>
  				</tr>
                <tr>
    			  <th width="8" height="27">&nbsp;</th>
   				  <td width="101"><div align="right" class="style13 style2"><font face="Century Gothic">Civil Status:</font></div></td>
   				  <th width="197"><div align="left">
                    <select>
  						<option value="male">Single</option>
  						<option value="female">Married</option>
                        <option value="male">Widow/Widower</option>
  						<option value="female">Separated</option>
                        <option value="male">Others</option>
					</select>
                    </div>                    </th>
  				</tr>
			</table>
			</td>
            
            
            
               
            <td width="383">
			 <table width="370" cellpadding="0" cellspacing="0">
                 <tr>
    				<th width="9">&nbsp;</th>
   				   <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Birthday:</font></div></td>
   				   <th width="247"><div align="left"><input name="" type="date" width="200" required /></div></th>
  				</tr>
                <tr>
    				<th width="9">&nbsp;</th>
   				  <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Birthplace:</font></div></td>
   				  <th width="247"><div align="left"><input name="" type="text" size="30" required /></div></th>
  				</tr>
                 <tr>
    				<th width="9">&nbsp;</th>
   				   <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Religion:</font></div></td>
   				   <th width="247"><div align="left"><input name="" type="text"  size="30" required /></div></th>
  				</tr>
                <tr>
    				<th width="9">&nbsp;</th>
			      <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Citizenship:</font></div></td>
			      <th width="247"><div align="left"><input name="" type="text"  size="30" required /></div></th>
  				</tr>
                 <tr>
    				<th width="9">&nbsp;</th>
   				   <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Height:</font></div></td>
   				   <th width="247"><div align="left"><input name="" type="text"  size="30" required /></div></th>
  				</tr>
                 <tr>
    				<th width="9">&nbsp;</th>
   				   <td width="112"><div align="right" class="style13 style2"><font face="Century Gothic">Weight:</font></div></td>
   				   <th width="247"><div align="left"><input name="" type="text"  size="30" required /></div></th>
  				</tr>
			</table>
			</td>
            </tr>
            </table>
            
			<table width="724" cellpadding="0" cellspacing="0">
            <tr>
            <td width="722" height="66">
       		  <table width="708" cellpadding="0" cellspacing="0">
          		<tr>	
                  <td width="115"><div align="right" class="style13">
                    <div align="right" class="style2"><font face="Century Gothic">Home Address:</font></div>
                  </div></td>
                  <td width="591"><input name="" type="text" value="" size="87" /></td>
                </tr>
              </table>
       		  <table width="711" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="114"><div align="right" class="style13"><font face="Century Gothic"><span class="style2">Postal Code</span>:</font></div></td>
                  <td width="244"><input name="" type="text" value="" size="30" /></td>
                  <td width="98"><div align="right" class="style13 style2"><font face="Century Gothic">Telephone No.:</font></div></td>
                  <td width="253"><input name="" type="text" value="" size="30" /></td>
                </tr>
              </table>
             </td>
             </tr>
            
  </table>
           
  <table width="727" cellpadding="0" cellspacing="0">
            <tr>
            <td width="725">
       		  <table width="708" cellpadding="0" cellspacing="0">
          		<tr>	
                  <td width="115" height="27"><div align="right" class="style13 style2">
                    <div align="right"><font face="Century Gothic">Present Address:</font></div>
                  </div></td>
                  <td width="591"><input name="" type="text" value="" size="87" /></td>
                </tr>
              </table>
       		  <table width="707" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="115"><div align="right" class="style13 style2"><font face="Century Gothic">Postal Code:</font></div></td>
                  <td width="240"><input name="" type="text" value="" size="30" /></td>
                  <td width="100"><div align="right" class="style13 style2"><font face="Century Gothic">Telephone No.:</font></div></td>
                  <td width="250"><input name="" type="text" value="" size="30" /></td>
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
                  <td width="235"><input name="" type="text" value="" size="30" /></td>
                  <td width="105"><div align="right" class="style13 style2">
                    <div align="right"><font face="Century Gothic">SS Number:</font></div>
                  </div></td>
                  <td width="252"><input name="" type="text" value="" size="30" /></td>
                </tr>
                <tr>	
                  <td width="114"><div align="right" class="style13 style2">
                    <div align="right"><font face="Century Gothic">HDMF Number:</font></div>
                  </div></td>
                  <td width="235"><input name="" type="text" value="" size="30" /></td>
                  <td width="105"><div align="right" class="style13 style2">
                    <div align="right"><font face="Century Gothic">Philhealth No.:</font></div>
                  </div></td>
                  <td width="252"><input name="" type="text" value="" size="30" /></td>
                </tr>
              </table>
             </td>
    </tr>
  </table>
            
            
            </form>
</body>
</html>
