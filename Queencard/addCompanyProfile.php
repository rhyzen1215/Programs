<?php 
session_start();
include 'connect.php';	

if (isset($_SESSION['previous'])) {
   if (basename($_SERVER['PHP_SELF']) != $_SESSION['previous']) {
        session_destroy();
	}
}
 $_SESSION['previous'] = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Company Profile</title>
<style type="text/css">
	<?php include 'templatestyle.css'; ?>
</style>
<script>
function enableReq() {
	document.getElementById("reqField").required = true;
}

function disableReq() {
	document.getElementById("reqField").required = false;
}

//ibalik na lang sa dati nga span error; cannot use required coz we have edit and delete

</script>

</head>
<body>

<?php	
	$id = "";
	$companyId = $companyName = $companyRegName = $tinNumber = $sssNumber = $phicNumber = $dayFrom1 = $dayTo1 = $payDate1= $dayFrom2 = $dayTo2 = $payDate2= "";
	$comIdErr = "";
	$comNameErr = "";
	$comRegNameErr = "";
	$comTINErr = "";
	$comSSSErr = "";
	$comPHICErr = "";
	$comDayFrom1Err = "";
	$comDayTo1Err = "";
	$comDayFrom2Err = "";
	$comDayTo2Err = "";
	$comPayDate1Err = "";
	$comPayDate2Err = "";
	$color = "white";
	$message = "";

	if (isset($_POST["formSave"]))
	{		
		//retain values
	
		if (empty($_POST["companyId"])) {
			$comIdErr = "Required field.";
	  	} else {
			$companyId = SetInputData($_POST["companyId"]);
	  	}
		
		if (empty($_POST["companyName"])) {
			$comNameErr = "Required field.";
	  	} else {
			$companyName = SetInputData($_POST["companyName"]);
	  	}
		
		if (empty($_POST["companyRegName"])) {
			$comRegNameErr = "Required field.";
	  	} else {
			$companyRegName = SetInputData($_POST["companyRegName"]);
	  	}
		
		if (empty($_POST["tinNumber"])) {
			$comTINErr = "Required field.";
	  	} else {
			$tinNumber = SetInputData($_POST["tinNumber"]);
	  	}
		
		if (empty($_POST["sssNumber"])) {
			$comSSSErr = "Required field.";
	  	} else {
			$sssNumber = SetInputData($_POST["sssNumber"]);
	  	}
		
		if (empty($_POST["phicNumber"])) {
			$comPHICErr = "Required field.";
	  	} else {
			$phicNumber =  SetInputData($_POST["phicNumber"]);
	  	}
		
		if (empty($_POST["dayFrom1"])) {
			$comDayFrom1Err = "Required field.";
	  	} else {
			$dayFrom1 = SetInputData($_POST["dayFrom1"]);
	  	}
		
		if (empty($_POST["dayTo1"])) {
			$comDayTo1Err = "Required field.";
	  	} else {
			$dayTo1 = SetInputData($_POST["dayTo1"]);
	  	}
		
		if (empty($_POST["dayFrom2"])) {
			$comDayFrom2Err = "Required field.";
	  	} else {
			$dayFrom2 = SetInputData($_POST["dayFrom2"]);
	  	}
			
		if (empty($_POST["dayTo2"])) {
			$comDayTo2Err = "Required field.";
	  	} else {
			$dayTo2 = SetInputData($_POST["dayTo2"]);
	  	}
			
		if (empty($_POST["payDate1"])) {
			$comPayDate1Err = "Required field.";
	  	} else {
			$payDate1 = SetInputData($_POST["payDate1"]);
	  	}
		
		if (empty($_POST["payDate2"])) {
			$comPayDate2Err = "Required field.";
	  	} else {
			$payDate2 = SetInputData($_POST["payDate2"]);
	  	}
  
		if(!empty($_POST["companyId"]) and !empty($_POST["companyName"]) and !empty($_POST["companyRegName"]) and !empty($_POST["tinNumber"]) and !empty($_POST["tinNumber"]) and !empty($_POST["sssNumber"]) and !empty($_POST["phicNumber"]) and !empty($_POST["dayFrom1"]) and !empty($_POST["dayTo1"]) and !empty($_POST["dayFrom2"]) and !empty($_POST["dayTo2"]) and !empty($_POST["payDate1"]) and !empty($_POST["payDate2"]))
		{
			if ($_SESSION['action'] == "Edit")
			{
				$id = $_SESSION['CompanyId'];				
				$queryExist = "SELECT * from Company where companyID= '".$companyId."' and companyID != '".$id."'";
			}
			else
			{		
				$queryExist = "SELECT * from Company where companyID= '".$companyId."'";				
			}
			$resultExist=odbc_exec($conn,$queryExist) or die("Error in query");	
			
			if(odbc_num_rows($resultExist) == 0)
			{
				if ($_SESSION['action'] == "Edit")
				{
					$id = $_SESSION['CompanyId'];
					$query="UPDATE Company SET companyID = '$companyId', companyName='$companyName', companyRegName = '$companyRegName', TINNum = '$tinNumber', SSSNum = '$sssNumber', PHICNum = '$phicNumber', P1From = '$dayFrom1', P1To = '$dayTo1', P1Day = '$payDate1', P2From = '$dayFrom2', P2To = '$dayTo2', P2Day = '$payDate2' WHERE companyID = '$id'";
					$result=odbc_exec($conn,$query) or die("Error in query");
					$message = "Record Successfully Updated.";
				}
				else
				{
					//saving of company details
					$query="INSERT INTO Company(companyID, companyName, companyRegName, TINNum, SSSNum, PHICNum, P1From, P1To, P1Day, P2From, P2To, P2Day) VALUES('$companyId', '$companyName', '$companyRegName', '$tinNumber', '$sssNumber', '$phicNumber' , '$dayFrom1', '$dayTo1', '$payDate1', '$dayFrom2', '$dayTo2', '$payDate2')";	
					$result=odbc_exec($conn,$query) or die("Error in query");
					$message = "Record Successfully Added.";
				}
				//clear values
				$companyId =  "";
				$companyName = "";
				$companyRegName = "";
				$tinNumber = "";
				$sssNumber = "";
				$phicNumber = "";
				$dayFrom1 = "";
				$dayTo1 = "";
				$payDate1 = "";
				$dayFrom2 = "";
				$dayTo2 = "";
				$payDate2 = "";
		
				$color = "green";
				$_SESSION['action'] = "Add";
			}
			else
			{
				$color = "red";
				$message = "Company Id already exists.";
			}
		}
		else
		{
			$color = "white";
		}
	}
	
	if (isset($_POST["Delete"]))
	{	
		$id = $_POST["Delete"];
		
		$query="DELETE FROM Company WHERE CompanyId = '$id'";
		$result=odbc_exec($conn,$query) or die("Error in query");	

		$_SESSION['action'] = "Add";
	}
	
	if (isset($_POST["Edit"]))
	{
		$_SESSION['action'] = "Edit";	
		$id = $_POST["Edit"];
		$_SESSION['CompanyId'] = $id;
		
		$query="SELECT * FROM Company WHERE companyID = '$id'";
		$result=odbc_exec($conn,$query) or die("Error in query");
		
		while($row = odbc_fetch_array($result))
		{
			$companyId = $row['companyID'];
			$companyName = $row['companyName'];
			$companyRegName = $row['companyRegName'];
			$tinNumber = $row['TINNum'];
			$sssNumber = $row['SSSNum'];
			$phicNumber = $row['PHICNum'];
			$dayFrom1 = $row['P1From'];
			$dayTo1 = $row['P1To'];
			$payDate1= $row['P1Day'];
			$dayFrom2 = $row['P2From'];
			$dayTo2 = $row['P2To'];
			$payDate2= $row['P2Day'];	
		}	
	}
	
	function RetainData()
	{
		//retain values
		$companyId = SetInputData($_POST["companyId"]);
		$companyName = SetInputData($_POST["companyName"]);
		$companyRegName = SetInputData($_POST["companyRegName"]);
		$tinNumber = SetInputData($_POST["tinNumber"]);
		$sssNumber = SetInputData($_POST["sssNumber"]);
		$phicNumber =  SetInputData($_POST["phicNumber"]);
		$dayFrom1 = SetInputData($_POST["dayFrom1"]);
		$dayTo1 = SetInputData($_POST["dayTo1"]);
		$payDate1 = SetInputData($_POST["payDate1"]);
		$dayFrom2 = SetInputData($_POST["dayFrom2"]);
		$dayTo2 = SetInputData($_POST["dayTo2"]);
		$payDate2 = SetInputData($_POST["payDate2"]);			
	}
	
	function SetInputData($data)
	{
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   $data = str_replace("'", "''", $data);
	   return $data;
	}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table width="728" height="40">
    <tr>
        <td width="478"><div align="center"><font face="Century Gothic">COMPANY SETTINGS</font></div>
        </td>
    </tr>
</table>

<table width="728">
<tr>
<td width="478" height="25" bgcolor=<?php echo $color ?> align="center"><font face="Century Gothic" color="white" size="-1"><?php echo $message ?></font><div align="center"></div>
</td>
</tr>
</table>

<table id="tbl" align="center">
    <th width="155" id="tblWithBorder">
    Company Id
    </th>	
    <th width="300" id="tblWithBorder">
    Company Name
    </th>	
    
    <?php	
	$query="SELECT * FROM Company ";		
	$result=odbc_exec($conn,$query) or die("Error in query");
			
	while($row = odbc_fetch_array($result))
	{
	?>
		<tr>
	   <!-- <td id="tblNoBorder"></td>-->
		<td id="tblWithBorder"> <?php echo $row['companyID'] ?></td>	
		<td id="tblWithBorder"> <?php echo $row['companyName'] ?></td>	
		<?php echo('<td class="content" align="center"><button type="submit" name="Edit" value="'.$row['companyID'].'" ">Edit</button></td>' ); ?>
        <?php echo('<td class="content" align="center"><button type="submit" name="Delete" value="'.$row['companyID'].'" ">Delete</button></td>' ); ?>
		</tr>
	<?php
	}
    ?>               
</table>

<br />

<table>
	<tr>
	<table>    
    	<tr>
			<td><font face="Century Gothic"><b>Company Details</b></font></td>
        </tr>
        
        <tr>
			<td><hr width=654px size="3" color="#666666" align="left"/></td>
 		</tr>
          
        <tr>
            <td width="335" height="155">    
                <table>
                    <tr>
                        <td id="comLabel">Company Id:</td>
                        <td id="comTbx"><input type="text" size="50" name="companyId" value="<?php echo $companyId; ?>"/><span class="error">* <?php echo $comIdErr;?></span></td>	
                    </tr>
                    <tr>
                        <td id="comLabel">Company Name:</td>
                        <td id="comTbx"><input type="text" size="50" name="companyName" value="<?php echo $companyName; ?>"/><span class="error">* <?php echo $comNameErr;?></span></td>	
                    </tr>                   
                    <tr>
                        <td id="comLabel">Registered Name:</td>
                        <td id="comTbx"><input type="text" size="50" name="companyRegName" value="<?php echo $companyRegName; ?>"/><span class="error">* <?php echo $comRegNameErr;?></span></td>	

                    </tr>
                </table>
            </td>
        </tr>
	</table>
	</tr>	
</table>

<table>	
	<tr>
	<table>
        <tr>
			<td><font face="Century Gothic"><b>Payroll Details</b></font></td>
        </tr>
        
        <tr>
		<td><hr width=654px size="3" color="#666666" align="left"/></td>
 		</tr>
          
        <tr>
            <td width="335">    
                <table>
                   <tr>
                        <td id="comLabel">TIN Number:</td>
                        <td id="comTbx"><input type="text" size="50" name="tinNumber" value="<?php echo $tinNumber; ?>"/><span class="error">* <?php echo $comTINErr;?></td>	
                    </tr>
                    <tr>
                        <td id="comLabel">SSS Number:</td>
                        <td id="comTbx"><input type="text" size="50" name="sssNumber" value="<?php echo $sssNumber; ?>"/><span class="error">* <?php echo $comSSSErr;?></td>	
                    </tr>
                    <tr>
                        <td id="comLabel">Philhealth Number:</td>
                        <td id="comTbx"><input type="text" size="50" name="phicNumber" value="<?php echo $phicNumber; ?>"/><span class="error">* <?php echo $comPHICErr;?></td>	
                        <td></td>
                    </tr>   
                    <tr> 
                         <table>
                            <tr>
                                <td id="comLabel">Payroll Date Range (From):</td>
                                <td>
                                    <select name="dayFrom1" id="comTbx" required>
                                        <?php 
                                        for($day = 1; $day <= 31; $day++)
                                        {
                                        ?>
                                        	<option <?php if (isset($dayFrom1) && $dayFrom1==$day) echo "selected";?>> <?php echo $day; ?></option>
                                        <?php } ?>                                       
                                    </select>	
                                </td>    
                                
                                <td width="85" align="right"><font face="Century Gothic" size="-1">(To):</font></td>
                                <td>
                                    <select name="dayTo1" required>
                                        <?php 
                                        for($day = 1; $day <= 31; $day++)
                                        {
                                        ?>
                                            <option <?php if (isset($dayTo1) && $dayTo1==$day) echo "selected";?>> <?php echo $day; ?></option>
                                        <?php } ?>
                                    </select>   
                                </td>  	
                                
                                <td width="105" align="right"><font face="Century Gothic" size="-1">Pay Date:</font></td>
                                <td width="10">
                                    <select name="payDate1" required>
                                        <?php 
                                        for($day = 1; $day <= 31; $day++)
                                        {
                                        ?>
                                           <option <?php if (isset($payDate1) && $payDate1==$day) echo "selected";?>> <?php echo $day; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>  
                        	</tr>
                       	 </table>     
                    </tr>      
                   <tr> 
                         <table>
                            <tr>
                                <td id="comLabel">Payroll Date Range (From):</td>
                                <td>
                                    <select name="dayFrom2" id="comTbx" required>
                                        <?php 
                                        for($day = 1; $day <= 31; $day++)
                                        {
                                        ?>
                                            <option <?php if (isset($dayFrom2) && $dayFrom2==$day) echo "selected";?>> <?php echo $day; ?></option>
                                        <?php } ?>
                                    </select>	
                                </td>    
                                
                                <td width="85" align="right"><font face="Century Gothic" size="-1">(To):</font></td>
                                <td>
                                    <select name="dayTo2" required>
                                        <?php 
                                        for($day = 1; $day <= 31; $day++)
                                        {
                                        ?>
                                            <option <?php if (isset($dayTo2) && $dayTo2 ==$day) echo "selected";?>> <?php echo $day; ?></option>
                                        <?php } ?>
                                    </select>	
                                </td>  	
                                
                                <td width="105" align="right"><font face="Century Gothic" size="-1">Pay Date:</font></td>
                                <td width="10">
                                    <select name="payDate2" required>
                                        <?php 
                                        for($day = 1; $day <= 31; $day++)
                                        {
                                        ?>
                                            <option <?php if (isset($payDate2) && $payDate2==$day) echo "selected";?>> <?php echo $day; ?></option>
                                        <?php } ?>
                                    </select>	
                                </td>  
                        	</tr>
                       	 </table>     
                    </tr>                        
                </table>
            </td>
         </tr>
		</table>
	</tr>	
</table>

<table>	
     <tr>
		<td><hr width=654px size="3" color="#666666" align="left"/></td>
 	 </tr>
     
	<tr>
        <td width="335">    
            <table>
                <tr>
                    <td width="173"></td>
                    <td><input type="submit" value="Save" name="formSave"/></td>
                </tr>              
            </table>
     	</td>
    </tr>
</table>

</p>
<p>&nbsp;</p>
<p>&nbsp;
</p>
</form>
</body>
</html>

