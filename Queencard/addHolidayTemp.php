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
<title>Deductions Template</title>
<style type="text/css" >
	<?php include 'templatestyle.css'; ?>
</style>	
<script>
function enableReq() {
	document.getElementById("reqFields").required = true;
}

function disableReq() {
	document.getElementById("reqFields").required = false;
}
</script>	
</head>
<body>
    
<?php
	$color = "white";
	$message = "";
	$holidayName =  "";
	$holidayType = "";
	
	if (isset($_POST["Edit"]))
	{		
		$_SESSION['action'] = "Edit";	
		$id = $_POST["Edit"];
		$_SESSION['HolId'] = $id;
		
		$query="SELECT * FROM HolidaysRef WHERE HolidayId = '$id'";
		$result=odbc_exec($conn,$query) or die("Error in query");
		
		while($row = odbc_fetch_array($result))
		{
			$holidayName = $row['HolidayName'];
			$holidayType = $row['Type'];
		}	
	}
	
	if (isset($_POST["Delete"]))
	{
		$id = $_POST["Delete"];
		$query="DELETE FROM HolidaysRef WHERE HolidayId = '$id'";
		$result=odbc_exec($conn,$query) or die("Error in query");
	}
	
	if (isset($_POST["formSave"]))
	{		
		$holidayName = SetInputData($_POST["holidayName"]);
		$holidayType = SetInputData($_POST["holidayType"]);
		if(!isset($_SESSION['action']) || empty($_SESSION['action'])){
				$_SESSION['action'] = "";		
			}
			
			if ($_SESSION['action'] == "Edit")
			{
				$id = $_SESSION['HolId'];
				$query="UPDATE HolidaysRef SET HolidayName = '$holidayName', Type='$holidayType' WHERE HolidayId = '$id'";
				$result=odbc_exec($conn,$query) or die("Error in query");
				$message = "Record Successfully Updated.";
			}
			else
			{
				//saving of company details
				$query="INSERT INTO HolidaysRef(HolidayName, Type) VALUES('$holidayName', '$holidayType')";
				$result=odbc_exec($conn,$query) or die("Error in query");
				$message = "Record Successfully Added.";
			}
		
			//clear values
			$holidayName =  "";
			$holidayType = "";
			
			$color = "green";
			
			$_SESSION['action'] = "";
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
        <td width="478"><div align="center"><font face="Century Gothic">HOLIDAYS TEMPLATE</font></div>
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
	<tr>
        <td><input type="text" id="search" name="searchtxt"/> </td>
        <td><input type="submit" value="Search" name="Search" id="btn"/></td>
        <td><input type="submit" value="ViewAll" name="ViewAll" id="btn"/></td>        
    </tr>	
</table>	

<div>
<table id="tbl" align="center">
    <th width="190" id="tblWithBorder">
    Holiday
    </th>	
    <th width="135" id="tblWithBorder">
    Type
    </th>	
    
    <?php
	
	if (isset($_POST["Search"]))
	{
		$query="SELECT * FROM HolidaysRef where HolidayName LIKE '%" . $_POST['searchtxt'] . "%' OR Type LIKE '%" . $_POST['searchtxt'] . "%' ORDER BY HolidayId ASC";	   	
	}
	else
	{	
		$query="SELECT * FROM HolidaysRef ORDER BY HolidayId ASC";	
	}   
	$objExec= odbc_exec($conn,$query) or die("Error in query");
	$Num_Rows = 0;  
	while(odbc_fetch_row($objExec))$Num_Rows++; // Count Record  
	$Per_Page = 5;   // Per Page

	if (isset($_GET["Page"]))
	{
		$Page = $_GET["Page"];
		if(!$_GET["Page"])
		{
			$Page=1;
		}
	}
	else
	{
		$Page=1;
	}
		
	$Prev_Page = $Page-1;
	$Next_Page = $Page+1;
	
	$Page_Start = (($Per_Page*$Page)-$Per_Page)+1;
	if($Num_Rows<=$Per_Page)
	{
		$Num_Pages =1;
	}
	else if(($Num_Rows % $Per_Page)==0)
	{
		$Num_Pages =($Num_Rows/$Per_Page) ;
	}
	else
	{
		$Num_Pages =($Num_Rows/$Per_Page)+1;
		$Num_Pages = (int)$Num_Pages;
	}
	$Page_End = $Per_Page * $Page;
	if($Page_End > $Num_Rows)
	{
		$Page_End = $Num_Rows;
	}
		
	for($i=$Page_Start;$i<=$Page_End;$i++)
	{
		$row = odbc_fetch_array($objExec,$i);
	?> 
	<tr>
	   <!-- <td id="tblNoBorder"></td>-->
		<td id="tblWithBorder"> <?php echo $row['HolidayName'] ?></td>	
		<td id="tblWithBorder"> <?php echo $row['Type'] ?></td>	
		<?php echo('<td class="content" align="center"><button type="submit" name="Edit" value="'.$row['HolidayId'].'" " onclick="disableReq()">Edit</button></td>' ); ?>
		<td id="comTbx"><?php echo '<button type="submit" name="Delete"  value="'.$row['HolidayId'].'" >Delete</button>'; ?>
	</tr>
	<?php
	}
    ?>
</table>

<br>
Total Record: <?php echo $Num_Rows; ?>
<br>
Page :
<?php

if($Prev_Page)
{
	echo " <a href='$_SERVER[PHP_SELF]?Page=$Prev_Page'><< Back</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
	echo "[ <a href='$_SERVER[PHP_SELF]?Page=$i'>$i</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[PHP_SELF]?Page=$Next_Page'>Next>></a> ";
}

?>

<table>
	<tr>
	<table id="tbl">    
    	<tr>
			<td><font face="Century Gothic"><b>Holiday Details</b></font></td>
        </tr>        
        <tr>
			<td><hr width=654px size="3" color="#666666" align="left"/></td>
 		</tr>          
        <tr>
            <td width="335" height="120">    
                <table>
                    <tr>
                        <td id="comLabel">Holiday:</td>
                        <td id="comTbx"><input id="reqFields" type="text" size="50" name="holidayName" value="<?php echo $holidayName; ?>"/></td>	
                    </tr>
                    <tr>
                        <td id="comLabel">Type:</td>
                        <td id="comTbx">
                        	<select id="comDropdown" name="holidayType" >
                            	<option <?php if (isset($holidayType) && $holidayType=="Local") echo "selected";?>> Local </option>             
                                <option <?php if (isset($holidayType) && $holidayType=="Regular") echo "selected";?>> Regular </option>     
                                <option <?php if (isset($holidayType) && $holidayType=="Special") echo "selected";?>> Special </option>  
                            </select>
                        </td>	
                    </tr>
                
                </table>
            </td>
        </tr>
	</table>
	</tr>	
</table>

<table>

<tr>
    <td width="335">    
        <table>
            <tr>
                <td width="173"></td>
                <td><input type="submit" value="Save" name="formSave" onclick="enableReq()"/></td>
            </tr>              
        </table>
    </td>
	</tr>
</table>

</form>

</body>
</html>
