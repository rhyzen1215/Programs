<?Php
 include 'CIFconnect.php';

$BranchCode = $_REQUEST['BranchCode'];
$SearchTxt = $_REQUEST['SearchText'];

$sql="SELECT * FROM Branch WHERE BranchCode = '".$BranchCode."'";
$rs=odbc_exec($conn,$sql);
$BranchName = odbc_result($rs,"BranchName");
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Branch Customer Information File</title>
<style type="text/css">
<!--

	
#editCIF {
	border: 0px solid black; border-collapse: collapse;
	font-family:'Century Gothic';
	font-size:12px;
	font-weight: bold;
	padding-left: 0px; 
	margin: 0px;}
	
#mheader {
	border: 0px solid black; border-collapse: collapse;
	font-family:'Century Gothic';
	font-size:14px;
	font-weight: bold;
	border-spacing:inherit;
	padding-left: 2px; 
	margin: 2px;}
	
#onData {
	border: 0px solid black; border-collapse: collapse;
	font-family:'Century Gothic';
	font-size:14px;
	font-weight: normal;
	border-spacing:inherit;
	padding-left: 2px;
	margin: 2px;}
		
.style2 {font-size: 12px}

.styleText {text-align:right}
-->


input[type=date]
{
	width: 220px;
	margin-left:2px;
}

select
{
	width: 225px;
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
           

         <table width="800" cellpadding="0" cellspacing="0">
		  <tr>
            <td width="478"><div align="center"><span class="style3">Customer Information File</span></div></td>
            <td width="126"></td>
          </tr>
         <tr>
		 </tr>
         <tr>
         <td><hr width=750px size="1" color="#666666" align="left"/></td>
         </tr>
		 </table>


        <table cellpadding="0" >

          <tr>
            	<td width="713">
				
				<form name="SubForm">
				<table width="673" cellpadding="0">
					<tr><th width="240" height="20" ><div align="center" class="style3"><font face="Century Gothic"></font></div></th></tr>
               		<tr>
                  		<th width="240"><div align="center" class="style13 style2"><font face="Century Gothic">
						
						<input name="BranchCode" id="BranchCode" type="hidden"  size="30" value="<?php echo  $BranchCode ?>" required />
						<input name="BrCount" id="BrCount" type="hidden"  size="30" value="<?php echo  $Cntr ?>" required />
				  		<?Php echo $BranchCode. " " .$BranchName ?> BRANCH 
						</font></div></th>
                	</tr>
					
					<tr><th width="240" height="20" ><div align="center" class="style13 style2"><font face="Century Gothic"></font></div></th>
					</tr>
					
					<tr>
                  		<th width="240"><div align="center" class="style13 style2"><font face="Century Gothic">
						<input name="ProceedLoan" type="submit" onclick="javascript: SubForm.action='CIFList.php'; SubForm.method='GET'; SubForm.target='_blank';" value="View CIF" />
						</font></div></th>
                	</tr>
					<tr><th width="240" height="20" ><div align="center" class="style13 style2"><font face="Century Gothic"></font></div></th></tr>
				</table>
				</form>
				
				
				<form name="formSearch">
				<table width="673" cellpadding="0" cellspacing="0">
					<tr><td width="240" height="20" ><div align="center" class="style13 style2"><font face="Century Gothic"></font></div></td></tr>
               		<tr>
                  		<td width="240"><div align="center" class="style13 style2"><font face="Century Gothic">
						<input name="BranchCode" id="BranchCode" type="hidden"  size="30" value="<?php echo  $BranchCode ?>" required />
						<input name="SearchText" size = "50" type="text" value="<?Php echo $SearchTxt ?>" />
						<input name="btnSearch" type="submit" onclick="javascript: formSearch.action='UpdateCIF.php'; formSearch.method='GET';" value="Search" />
						</font></div></td>
                	</tr>
					<tr><td width="240" height="20" ><div align="center" class="style13 style2"><font face="Century Gothic"></font></div></td></tr>
				</table>
				</form>
		
		<?Php
		
		if (isset($_GET['btnSearch'])){
		if ($_GET['SearchText'] != ""){
		
			echo ('<table width="800" cellpadding="0" cellspacing="0"><tr>');
			echo ('<tr><td><hr width=750px size="1" color="#666666" align="left"/></td></tr>');
            echo ('</table>');
			
		$BranchCode = $_REQUEST['BranchCode'];
		$SearchTxt = $_REQUEST['SearchText'];
		$sql1="SELECT * FROM CIF_UPLOAD where BranchCode = '".$BranchCode."' and Lastname like '%".$SearchTxt."%' or Firstname like '%".$SearchTxt."%' or Middlename like '%".$SearchTxt."%' or Corporatename like '%".$SearchTxt."%' order by Lastname";
		$rs1=odbc_exec($conn,$sql1);
		if (odbc_num_rows($rs1) > 0 )
		{
		$cnt = 1;
		echo ('<table>');
		echo ('<tr>');
		echo ('<td align="center" id="mheader">Count</td>');
		echo ('<td align="center" id="mheader">Acc. Number</td>');
		echo ('<td align="center" id="mheader">Corporate Name</td>');
		echo ('<td align="left" id="mheader">Lastname</td>');
		echo ('<td align="left" id="mheader">Firstname</td>');
		echo ('<td align="left" id="mheader">Middlename</td>');
		echo ('<td align="center" id="mheader">Gender</td>');
		echo ('<td align="center" id="mheader">Birthday</td>');
		echo ('<td align="center" id="mheader"></td>');
		echo ('</tr>');
		while (odbc_fetch_row($rs1))
		{
	
			$Gender = odbc_result($rs1,"gender");
			$date  = substr(odbc_result($rs1,"birthday"),0,10);
			$date  = odbc_result($rs1,"birthday");
			$date=date('m/d/Y', strtotime($date));
			if ($Gender == "M") { $Gender = "MALE";}
			elseif ($Gender == "F") { $Gender = "FEMALE";}
		
			echo ('<form name="EditCIF">');
			echo ('<tr>');
			echo ('<td align="center" id="onData">'.$cnt.'</td>');
			echo ('<td align="center" id="onData">'.odbc_result($rs1,"ACCOUNTCODE").'</td>');
			echo ('<td id="onData">'.odbc_result($rs1,"corporatename").'</td>');
			echo ('<td id="onData">'.odbc_result($rs1,"lastname").'</td>');
			echo ('<td id="onData">'.odbc_result($rs1,"firstname").'</td>');
			echo ('<td id="onData">'.odbc_result($rs1,"middlename").'</td>');
			echo ('<td align="center" id="onData">'.$Gender.'</td>');
			echo ('<td align="center" id="onData">'.$date.'</td>');
			echo ('<td align="center" id="onData"><input name="btnEditCIF" type="submit" onclick="javascript: EditCIF.action=UpdateCIF.php; EditCIF.method=GET;" value="Edit" />');
			echo ('<input name="BranchCode" id="BranchCode" type="hidden"  size="30" value="'.$BranchCode.'" required />');
			echo ('<input name="SearchText" size = "50" type="hidden" value="'.$SearchTxt.'" />');
			echo ('<input name="AccCode" size = "50" type="hidden" value="'.odbc_result($rs1,"accountcode").'" />');
			echo ('<input name="CorpName" size = "50" type="hidden" value="'.odbc_result($rs1,"corporatename").'" />');
			echo ('<input name="Lname" size = "50" type="hidden" value="'.odbc_result($rs1,"lastname").'" />');
			echo ('<input name="Fname" size = "50" type="hidden" value="'.odbc_result($rs1,"firstname").'" />');
			echo ('<input name="Mname" size = "50" type="hidden" value="'.odbc_result($rs1,"middlename").'" />');
			echo ('<input name="Gender" size = "50" type="hidden" value="'.$Gender.'" />');
			echo ('<input name="Bday" size = "50" type="hidden" value="'.$date.'" />');
			echo ('<input name="CIFcat" size = "50" type="hidden" value="'.odbc_result($rs1,"customer_category").'" />');
			echo ('<input name="CIFtype" size = "50" type="hidden" value="'.odbc_result($rs1,"customer_type").'" />');
			$cnt = $cnt + 1;
			echo ('</tr>');
			echo ('</form>');
		}			
	
		echo ('</table>');	
		}
		}
		}
		
		
		
		if (isset($_GET['btnEditCIF'])){
		
			echo ('<table width="800" cellpadding="0" cellspacing="0"><tr>');
            echo ('<tr><td width="478"><div align="left" id="mheader"><font color="#0000FF">Client Information</font></div></tr></td>');
			echo ('<tr><td><hr width=750px size="1" color="#666666" align="left"/></td></tr>');
            echo ('</table>');
			
		$AccCode = $_REQUEST['AccCode'];
		$CorpName = $_REQUEST['CorpName'];
		$Lname = $_REQUEST['Lname'];
		$Fname = $_REQUEST['Fname'];
		$Mname = $_REQUEST['Mname'];
		$Gender = $_REQUEST['Gender'];
		$Bday = $_REQUEST['Bday'];
		$CIFtype = $_REQUEST['CIFtype'];
		$CIFcat = $_REQUEST['CIFcat'];
		$Gender = substr($Gender,0,1);
		$CIFtype = strtoupper($CIFtype);
		
		echo ('<form name="formSubmitSave">');
		
		echo ('<input name="AccCode_old" type="hidden" value="'.$AccCode.'" />');
		echo ('<input name="CorpName_old" type="hidden" value="'.$CorpName.'" />');
		echo ('<input name="Lname_old" type="hidden" value="'.$Lname.'" />');
		echo ('<input name="Fname_old" type="hidden" value="'.$Fname.'" />');
		echo ('<input name="Mname_old" type="hidden" value="'.$Mname.'" />');
		echo ('<input name="Gender_old" type="hidden" value="'.$Gender.'" />');
		echo ('<input name="Bday_old" type="hidden" value="'.$Bday.'" />');
		echo ('<input name="CIFtype_old" type="hidden" value="'.$CIFtype.'" />');
		echo ('<input name="Gender_old" type="hidden" value="'.$Gender.'" />');
		echo ('<input name="BranchCode" id="BranchCode" type="hidden"  size="30" value="'.$BranchCode.'" required />');
		echo ('<input name="SearchText" size = "50" type="hidden" value="'.$SearchTxt.'" />');
		
		echo ('<table width="750">');
		
		echo ('<tr>');
		echo ('<td width = "120" align="right" id="editCIF">Corporate Name:</td>');
			if ($CIFtype == "I") { echo ('<td align="left" id="onData"><input name="CorpName" size = "30" type="text" value="'.$CorpName.'" readonly/></td>');}
			else {echo ('<td align="left" id="onData"><input name="CorpName" size = "30" type="text" value="'.$CorpName.'" /></td>');}
		echo ('<td width = "100" align="right" id="editCIF">Address Line 1:</td>');
		echo ('<td align="left" id="editCIF"><input name="Mname" size = "30" type="text" value="'.$Mname.'" /></td>');
		echo ('</tr>');
		
		echo ('<tr>');
		echo ('<td width = "120" align="right" id="editCIF">Lastname:</td>');
		echo ('<td align="left" id="onData"><input name="Lname" size = "30" type="text" value="'.$Lname.'" /></td>');
		echo ('<td width = "80" align="right" id="editCIF">Address Line 2:</td>');
		echo ('<td align="left" id="editCIF"><input name="Mname" size = "30" type="text" value="'.$Mname.'" /></td>');
		echo ('</tr>');
		
		echo ('<tr>');
		echo ('<td width = "120" align="right" id="editCIF">Firstname:</td>');
		echo ('<td align="left" id="onData"><input name="Fname" size = "30" type="text" value="'.$Fname.'" /></td>');
		echo ('<td width = "80" align="right" id="editCIF">Address Line 3:</td>');
		echo ('<td align="left" id="editCIF"><input name="Mname" size = "30" type="text" value="'.$Mname.'" /></td>');
		echo ('</tr>');
		
		echo ('<tr>');
		echo ('<td width = "120" align="right" id="editCIF">Middlename:</td>');
		echo ('<td align="left" id="editCIF"><input name="Mname" size = "30" type="text" value="'.$Mname.'" /></td>');
		echo ('<td width = "80" align="right" id="editCIF">Address Line 4:</td>');
		echo ('<td align="left" id="editCIF"><input name="Mname" size = "30" type="text" value="'.$Mname.'" /></td>');
		echo ('</tr>');
		
		echo ('<tr>');
		echo ('<td align="right" id="editCIF">Gender:</td>');
		echo ('<td align="left" id="editCIF">');
		echo ('<select name="GenderSave">');
			if ($Gender == "M"){echo ('<option value="M" selected="selected">Male</option><option value="F">Female</option>');}
			else if ($Gender == "F") {echo ('<option value="F" selected="selected">Female</option><option value="M">Male</option>');}
			else {echo ('<option value="" selected="selected"><option value="M">Male</option><option value="F">Female</option>');}
		echo ('</select>');
		echo ('</td>');
		echo ('</tr>');
		
		echo ('<tr>');
		echo ('<td align="right" id="editCIF">Birthday:</td>');
		echo ('<td align="left" id="editCIF"><input name="Bday" size = "30" type="date" value="'.date('Y-m-d', strtotime($Bday)).'" /></td>');
		echo ('</tr>');
		
		echo ('<tr>');
		echo ('<td align="right" id="editCIF">Category:</td>');
		echo ('<td align="left" id="editCIF">');
		
		if ($CIFtype == "I"){ 
			echo ('<input type="radio" name="CIFtype" value="Individual" checked>Individual');
			echo ('<input type="radio" name="CIFtype" value="Corporate" >Corporate');}
		else  {
			echo ('<input type="radio" name="CIFtype" value="Individual" >Individual');
			echo ('<input type="radio" name="CIFtype" value="Corporate" checked>Corporate');
				echo ('<select name="CIFtype">');
					if ($CIFcat == "UB KB NGOV"){echo ('<option value="UB KB NGOV" selected="selected">UB KB NGOV</option><option value="F">UB KB GOV</option>');}
					else if ($CIFcat == "UB KB GOV") {echo ('<option value="UB KB GOV" selected="selected">UB KB GOV</option><option value="UB KB NGOV">UB KB NGOV</option>');}
				echo ('</select>');
			}
		echo ('</td>');
		echo ('</tr>');
		
		echo ('<tr height="20"><td align="right" id="editCIF"></td><td align="left" id="onData"></td></tr>');
		
		echo ('</table>');
		
		//Account Information
		echo ('<table width="800" cellpadding="0" cellspacing="0"><tr>');
        echo ('<tr><td width="478"><div align="left" id="mheader"><font color="#0000FF">Account Information</font></div></tr></td>');
		echo ('<tr><td><hr width=750px size="1" color="#666666" align="left"/></td></tr>');
        echo ('</table>');
		
		echo ('<table>');
		echo ('<tr>');
		echo ('<td width = "120" align="right" id="editCIF">Account Number:</td>');
		echo ('<td align="left" id="onData"><input name="AccCode" size = "12" type="text" value="'.$AccCode.'" /></td>');
		echo ('</tr>');
		
		echo ('<tr>');
		echo ('<td width = "120" align="right" id="editCIF">Account Name:</td>');
		echo ('<td align="left" id="onData"><input name="AccCode" size = "30" type="text" value="'.$AccCode.'" /></td>');
		echo ('</tr>');
			
		echo ('<tr height="20">');
		echo ('<td align="right" id="editCIF"></td>');
		echo ('<td align="left" id="onData"></td>');
		echo ('</tr>');
		
		echo ('<tr>');
		echo ('<td align="right" id="editCIF"></td>');
		echo ('<td align="left" id="onData"><input name="btnSaveCIF" type="submit" onclick="javascript: formSubmitSave.action=UpdateCIF.php; formSubmitSave.method=GET;" value="Save" /></td>');
		echo ('</tr>');
		echo ('</table>');
		echo ('</form>');
		}
		
		
		
		if (isset($_GET['btnSaveCIF'])){
		$AccCode = $_REQUEST['AccCode'];
		$CorpName = $_REQUEST['CorpName'];
		$Lname = $_REQUEST['Lname'];
		$Fname = $_REQUEST['Fname'];
		$Mname = $_REQUEST['Mname'];
		$Gender = $_REQUEST['GenderSave'];
		$Bday = $_REQUEST['Bday'];
		$CIFtype = $_REQUEST['CIFtype'];
	
		$AccCode1 = $_REQUEST['AccCode_old'];
		$CorpName1 = $_REQUEST['CorpName_old'];
		$Lname1 = $_REQUEST['Lname_old'];
		$Fname1 = $_REQUEST['Fname_old'];
		$Mname1 = $_REQUEST['Mname_old'];
		$Gender1 = $_REQUEST['Gender_old'];
		$Bday1 = $_REQUEST['Bday_old'];
		$CIFtype1 = $_REQUEST['CIFtype_old'];
		$Gender1 = substr($Gender1,0,1);
		$CIFtype = strtoupper($CIFtype);
		
		$sqlSave="UPDATE  CIF_UPLOAD SET accountcode = '".$AccCode."', corporatename = '".$CorpName."', lastname = '".$Lname."', firstname = '".$Fname."', middlename = '".$Mname."', Gender = '".$Gender."', birthday = '".$Bday."' WHERE accountcode = '".$AccCode1."' and corporatename = '".$CorpName1."' and lastname = '".$Lname1."' and firstname = '".$Fname1."' and middlename = '".$Mname1."' and Gender = '".$Gender1."' and birthday = '".$Bday1."'";
		$rs3=odbc_exec($conn,$sqlSave) or die("Error in query");
		
		echo ('<table>');
		echo ('<tr>');
		echo ('<td align="left" id="onData"><td align="left" id="onData"><strong>CIF Updated.</strong></td>');
		echo ('</tr>');
		echo ('</table>');
		
		}
	?>

	
</body>
</html>