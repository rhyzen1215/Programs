	<?Php
		
		include 'DBConnect.php';
		
		$empID = "";
		$FName = "";
		$MName = "";
		$LName = "";
		$BDate = "";
		$BPlace = "";
		$Sex = "";
		$Age = "";
		$CivilStatus = "";
		$Religion = "";
		$Citizenship = "";
		$Height = "";
		$Weight = "";
		$BloodType = "";
		$PresentAdd = "";
		$PresentTel = "";
		$PresentPostal = "";
		$ProvAdd = "";
		$ProvTel = "";
		$ProvPostal = "";
		$SpouseName = "";
		$SpouseOccupation = "";
		$SpouseWorkplace = "";
		$SpouseTel = "";
		$DateMarried = "";
		$TIN = "";
		$SSS = "";
		$HDMF = "";
		$PhilHealth = "";
		$LanguageSpeak = "";
		$LanguageRead = "";
		$LanguageWrite = "";
		$imgPath = "";
		$EmpCheck = "";
		
		if (isset($_REQUEST['btnSave'])){
			
			$empID = $_REQUEST['empIDVal'];
			$FName = $_REQUEST['FName'];
			$MName = $_REQUEST['MName'];
			$LName = $_REQUEST['LName'];
			$Sex = $_REQUEST['Sex'];
			$Age = $_REQUEST['Age'];
			$BDate = $_REQUEST['BDate'];
			$BPlace = $_REQUEST['BPlace'];
			
			$CivilStatus = $_REQUEST['CivilStatus'];
			$Religion = $_REQUEST['Religion'];
			$Citizenship = $_REQUEST['Citizenship'];
			$Height = $_REQUEST['Height'];
			$Weight = $_REQUEST['Weight'];
			$BloodType = $_REQUEST['BloodType'];
			$PresentAdd = $_REQUEST['PresentAdd'];
			$PresentTel = $_REQUEST['PresentTel'];
			$PresentPostal = $_REQUEST['PresentPostal'];
			$ProvAdd = $_REQUEST['ProvAdd'];
			$ProvTel = $_REQUEST['ProvTel'];
			$ProvPostal = $_REQUEST['ProvPostal'];
			$SpouseName = $_REQUEST['SpouseName'];
			$SpouseOccupation = $_REQUEST['SpouseOccupation'];
			$SpouseWorkplace = $_REQUEST['SpouseWorkplace'];
			$SpouseTel = $_REQUEST['SpouseTel'];
			$DateMarried = $_REQUEST['DateMarried'];
			$TIN = $_REQUEST['TIN'];
			$SSS = $_REQUEST['SSS'];
			$HDMF = $_REQUEST['HDMF'];
			$PhilHealth = $_REQUEST['PhilHealth'];
			$LanguageSpeak = $_REQUEST['LanguageSpeak'];
			$LanguageRead = $_REQUEST['LanguageRead'];
			$LanguageWrite = $_REQUEST['LanguageWrite'];
			
			$sql = "Select * From Employee where employeeid = '".$empID."'";
			$rs=odbc_exec($conn,$sql) or die("Error in query");	
			while (odbc_fetch_row($rs)) {$EmpCheck = "1";}
			
			if ($EmpCheck == "1") {

				$sql1 = "Update PersonalData set Firstname = '".$FName."', Middlename = '".$MName."', Lastname = '".$LName."', Birthdate = '".$BDate."', Birthplace = '".$BPlace."', Sex = '".$Sex."', Age = '".$Age."', CivilStatus = '".$CivilStatus."', Religion = '".$Religion."', Citizenship = '".$Citizenship."', Height = '".$Height."', Weight = '".$Weight."', BloodType = '".$BloodType."', PresentAdd = '".$PresentAdd."', Pre_Telephone = '".$PresentTel."', Pre_Postal = '".$PresentPostal."', ProvincialAdd = '".$ProvAdd."', Pro_Telephone = '".$ProvTel."', Pro_Postal = '".$ProvPostal."', SpouseName = '".$SpouseName."', SpouseOccupation = '".$SpouseOccupation."', Spouse_Workplace = '".$SpouseWorkplace."', Spouse_Telephone = '".$SpouseTel."', DateMarried = '".$DateMarried."', TIN = '".$TIN."', SSS = '".$SSS."', HDMF = '".$HDMF."', PhilHealth = '".$PhilHealth."', Language_Speak = '".$LanguageSpeak."', Language_Read = '".$LanguageRead."', Language_Write = '".$LanguageWrite."' where employeeno = '".$empID."'";
				$rs1=odbc_exec($conn,$sql1) or die("Error in query");	
				
				
				echo '<script>'; 
				echo 'alert("Personal Data for Employee Number '.$empID.' was Successfully Saved.")'; 
				echo '</script>';  
			}
		}
		
		
		
		if ((isset($_REQUEST['btnSubmit'])) || (isset($_REQUEST['EIDPix']))){
			
			if (isset($_REQUEST['EIDPix'])){ $empID = $_REQUEST['EIDPix']; echo $_REQUEST['EIDPix'];}
			else {$empID = $_REQUEST['empIDNum'];}
			
			$sql1 = "Select * From PersonalData where employeeno = '".$empID."'";
			$rs1=odbc_exec($conn,$sql1) or die("Error in query");	
				$FName = odbc_result($rs1,"Firstname");
				$MName = odbc_result($rs1,"Middlename");
				$LName = odbc_result($rs1,"lastname");
				$Sex = odbc_result($rs1,"Sex");
				$Age = odbc_result($rs1,"Age");
				$BDate = odbc_result($rs1,"Birthdate");
				$CivilStatus = odbc_result($rs1,"CivilStatus");
				$BPlace = odbc_result($rs1,"BIRTHPLACE");
				$Religion = odbc_result($rs1,"RELIGION");
				$Citizenship = odbc_result($rs1,"Citizenship");
				$Height = odbc_result($rs1,"Height");
				$Weight = odbc_result($rs1,"Weight");
				$BloodType = odbc_result($rs1,"BLOODTYPE");
				$PresentAdd = odbc_result($rs1,"PRESENTADD");
				$PresentTel = odbc_result($rs1,"PRE_TELEPHONE");
				$PresentPostal = odbc_result($rs1,"PRE_POSTAL");
				$ProvAdd = odbc_result($rs1,"PROVINCIALADD");
				$ProvTel = odbc_result($rs1,"PRO_TELEPHONE");
				$ProvPostal = odbc_result($rs1,"PRO_POSTAL");
				$SpouseName = odbc_result($rs1,"SPOUSENAME");
				$SpouseOccupation = odbc_result($rs1,"SPOUSEOCCUPATION");
				$SpouseWorkplace = odbc_result($rs1,"SPOUSE_WORKPLACE");
				$SpouseTel = odbc_result($rs1,"SPOUSE_TELEPHONE");
				$DateMarried = odbc_result($rs1,"DATEMARRIED");
				$TIN = odbc_result($rs1,"TIN");
				$SSS = odbc_result($rs1,"SSS");
				$HDMF = odbc_result($rs1,"HDMF");
				$PhilHealth = odbc_result($rs1,"PhilHealth");
				$LanguageSpeak = odbc_result($rs1,"LANGUAGE_SPEAK");
				$LanguageRead = odbc_result($rs1,"LANGUAGE_READ");
				$LanguageWrite = odbc_result($rs1,"LANGUAGE_WRITE");
				
				
				
				$sql1 = "Select * From Images where employeeno = '".$empID."'";
				$rs1=odbc_exec($conn,$sql1) or die("Error in query");
				$imgPath = odbc_result($rs1,"filename");
				if ($imgPath == "") { $imgpath = "images/defaultphoto.png";}
				else { $imgPath = "Files/images/".$imgPath; }
				
		}
		

	?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="PersonalInfo.css">
<title>Employee Record</title>
</head>

<style type="text/css">

input[type=date]
{
	width: 120px;
	margin-left:2px;
	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;
	border-spacing:inherit;
	padding-left: 2px;
	margin: 2px;
}

a {
	font-family:"Century Gothic";
	font-size:14px;
	font-weight:bold;
	text-decoration:none;
	color:#0000FF;
	}
	
a:hover {
	font-family:"Century Gothic";
	font-size:14px;
	font-weight:bold;
	text-decoration:none;
	color: #FF0000;
	}

select
{
	width: 175px;
	margin-left:2px;
}

input[type=text],select
{
	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;
	border-spacing:inherit;
	padding-left: 2px;
	margin: 2px;
}

select
{
	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;
	border-spacing:inherit;
	padding-left: 2px;
	margin: 2px;
	width:100px;
}


td {

	font-family:"Century Gothic";
	font-size:14px;
	font-weight: bold;
}

th{

	font-family:"Century Gothic";
	font-size:14px;
	font-weight: bold;
	color:#0000FF;
}

</style>

<body background="images/bg2.jpg">
	
	<div id="container1">
		
		<div id="TopInfo">
			<table width="355">
			
			<tr>
			<td width="196" height="42" align="right">Employee ID Number:</td>
			<td width="147">
			<form name="frmSubInfo">
			<input type="text" size="7" name="empIDNum" value="<?Php echo $empID; ?>"  required/>
			<input type="Submit" value="Search" name="btnSubmit" onclick="javascript: frmSubInfo.action='PersonalInfoEdit.php';frmSubInfo.method='POST';"/></form>
			</td>
			</tr>
			
		  </table>
		</div>
		
		
		<div id="leftbody">
		
			<div id="PersonalID">
				<div id="NameID">
				<table width="210"><tr><td  align="center"><?Php echo $FName.' '.$MName.' '.$LName; ?></td></tr></table>
				</div>
				<div id="pictureID" align="center">
					<a href="UploadImage.php?IDNum=<?Php echo $empID; ?>" target="iframe3" onclick="disableclick(e)">
					<img border="0" alt="Employee Image" src="<?Php echo $imgPath; ?>" width="210" height="210"></a>
				</div>
			</div>
			
			<div id="navID">
				<div id="ID1">
				<table width="207" align="left">
				<tr><th width="27"></th>
				<th width="168" align="left"><a href="personaldata.php?EID=<?Php echo $empID; ?>" target="iframe3" onclick="disableclick(e)">Personal Details</a></th>
				</tr></table>
				</div>
				
				<div id="ID1">
				<table width="207" align="left">
				<tr><th width="27"></th>
				<th width="168" align="left"><a href="ContactDetails.php?EID=<?Php echo $empID; ?>" target="iframe3" onclick="disableclick(e)">Contact Details</a></th>
				</tr></table>
				</div>
				
				<div id="ID1">
				<table width="207" align="left">
				<tr><th width="27"></th>
				<th width="168" align="left"><a href="EducationEdit.php?EID=<?Php echo $empID; ?>" target="iframe3" onclick="disableclick(e)">Educational Details</a></th>
				</tr></table>
				</div>
				
				<div id="ID1">
				<table width="207" align="left">
				<tr><th width="27"></th>
				<th width="168" align="left"><a href="Training.php?EID=<?Php echo $empID; ?>" target="iframe3" onclick="disableclick(e)">Trainings/Seminars</a></th>
				</tr></table>
				</div>
				<div id="ID1">
				<table width="207" align="left">
				<tr><th width="27"></th>
				<th width="168" align="left"><a href="LeaveInquiryEdit.php?EID=<?Php echo $empID; ?>" target="iframe3" onclick="disableclick(e)">Leave Details</a></th>
				</tr></table>
				</div>
				<div id="ID1">
				<table width="207" align="left">
				<tr><th width="27"></th>
				<th width="168" align="left"><a href="UploadFiles.php?EID=<?Php echo $empID; ?>" target="iframe3" onclick="disableclick(e)">Documents</a></th>
				</tr></table>
				</div>
				
			</div>
			
		</div>
		
		<div id="rightbody">
			<div id="infoData">
				<iframe src="personaldata.php?EID=<?Php echo $empID; ?>" width="510" height="512" scrolling="auto" name="iframe3"></iframe>
			</div>
		</div>
		
	</div>

</body>
</html>
