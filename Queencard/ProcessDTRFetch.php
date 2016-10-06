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
                <td width="478"><div align="center"><span class="style3">PROCESS DTR</span></div></td>
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
            
            <form name="form" enctype="multipart/form-data">
            
			 <table cellpadding="0" cellspacing="0">
             <tr>
			 <td width="335">
              	<table width="350" cellpadding="0" cellspacing="0">
   		    <tr>
   			 		  <th width="4">&nbsp;</th>
   			 	  		<td width="114"><div align="right" class="style13 style2"><font face="Century Gothic">Company Code:</font></div></td>
		   	 		  <th width="230"><div align="left"><?php echo '<input name="companyCode" type="text"  size="10" value="'.$comID.'" required  />'; ?>
		   	 		    <input type="submit" value="Fetch" name="fetch" onclick="javascript: form.action='processDTRFetch.php'; form.method='GET';" />
		   	 		  
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


             
             <table width="570" border="0">
               <tr>
                 <th width="112"> </th>
                 <th width="442"> <div align="left">
                   <input type="file" name="File1" value="File1" size="50" />                 
                   <input type="submit" value="Upload" name="Upload" onclick="javascript: form.action='processDTRUpload.php'; form.method='POST';" />                 
                 </div></th>
               </tr>
             </table>
             <p>&nbsp; </p>
             <p>&nbsp;</p>
</form>
	
</body>
</html>