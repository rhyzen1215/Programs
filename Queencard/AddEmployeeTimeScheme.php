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
 				
            
            <table width="720" cellpadding="0" cellspacing="0">
              <tr>
			    <td width="718"><span class="style7">Time Scheme</span></td>
		      </tr>
              <tr>
               <td><hr width=680px size="3" color="#666666" align="left"/></td>
               </tr>
</table>
			<form name="form">
			 <table width="599" cellpadding="0" cellspacing="0" height="20">
              <tr>
              	<td width="402"><span class="style7">Employee ID Number:
                	
                    <input type="text" name="SQN" size="10" required/>
                    <input type="submit" value="Proceed" name="proceed" onclick="javascript: form.action='AddEmployeeTimeSchemeFetch.php'; form.method='GET';" />
                   
                </span></td>
			    <td width="316">&nbsp;</td>
		      </tr>
              <tr>
                <td></td>
                <td>&nbsp;</td>
              </tr>
			</table>
</form>
             
<table cellpadding="0" cellspacing="0">
            <tr>
				<td width="322">
             	<table width="360" cellpadding="0" cellspacing="1">
<tr>
      
   					  <th width="3">&nbsp;</th>
		  		  <td width="142"><div align="right" class="style13 style2"><font face="Century Gothic">Employee Name:</font></div></td>
<th width="209"><div align="left"><input name="companyCode" type="text"  size="25" required  />
		   			  </div></th>
          
                    
            
				  </tr>
                 	<tr>
   					  <th width="3">&nbsp;</th>
			   		  <td width="142"><div align="right" class="style13 style2"><font face="Century Gothic">Company Name:</font></div></td>
			    	  <th width="209"><div align="left"><input name="" type="text"  size="25" readonly /></div></th>
				  </tr>
			</table>
			</td>
            

            <td width="396">
		   <table width="370" cellpadding="0" cellspacing="1">
                 <tr>
    				<th width="12">&nbsp;</th>
   				   <td width="115"><div align="right" class="style13 style2"><font face="Century Gothic">Company Address:</font></div></td>
   				   <th width="237"><div align="left"><input name="" type="text"  size="25" readonly /></div></th>
			 </tr>
                <tr>
    				<th width="12">&nbsp;</th>
			      <td width="115"><div align="right" class="style13 style2"><font face="Century Gothic">Station/Branch:</font></div></td>
			      <th width="237"><div align="left"><input name="" type="text"  size="25" readonly /></div></th>
			 </tr>
  
			</table>
			</td>
  </tr>
            <tr height="15">
            </tr>
            </table>
            
           
</body>
</html>