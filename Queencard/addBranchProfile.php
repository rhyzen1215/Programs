
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
<title>Untitled Document</title>
<style type="text/css">
	<?php include 'templatestyle.css'; ?>
</style>
<script>
function enableReq() {
	document.getElementById("reqFields").required = true;
	document.getElementById("comDropdown").required = true;	
}

function disableReq() {
	document.getElementById("reqFields").required = false;
	document.getElementById("comDropdown").required = false;
}

function SaveVis() {
	document.getElementById("saveVis").type = "submit";
}

function SaveHide() {
	document.getElementById("saveVis").type = "hidden";
}
</script>	
</head>
<body>
<?php
$color = "white";
$message = "";
$companyName = $branchName = $address = "";
$holName = $holDate = $holType = "";
$branchId = "";

if(!isset($_SESSION['companyName']) || empty($_SESSION['companyName'])){
	$_SESSION['companyName'] = "";
}

if(!isset($_SESSION['holiday']) || empty($_SESSION['holiday'])){
	$_SESSION['holiday'] = array();		
}
	
if(!isset($_SESSION['submit_count']) || empty($_SESSION['submit_count'])){
	$_SESSION['submit_count'] = 0;
}

if(isset($_REQUEST['submit_count'])){
	$_SESSION['submit_count'] = $_SESSION['submit_count'] + 1;
}
	
if (isset($_POST["formSaveHoliday"]))
{
	$companyName = SetInputData($_POST["companyName"]);
	$branchName = SetInputData($_POST["branchName"]);
	$address = SetInputData($_POST["address"]);
	$holName = str_replace("'", "''", $_POST['holName'][0]);
	$holDate = $_POST['holName'][1];
	$holType = str_replace("'", "''", $_POST['holName'][2]);

	if ($_SESSION['action'] == "Add")
	{
		if ($_SESSION['holAction'] == "EditHol")
		{
			$id = $_SESSION['holId'];
			$ItemName = $_POST['holName'];			
			$_SESSION['holiday'][$id][0] = $ItemName[0];
			$_SESSION['holiday'][$id][1] = $ItemName[1];
			$_SESSION['holiday'][$id][2] = $ItemName[2];			
			$_SESSION['holiday'] = array_values($_SESSION['holiday']);
		}
		else
		{
			$ItemName = $_POST['holName'];			
			for ($i=0; $i< sizeof($ItemName); $i++){			
			$_SESSION['holiday'][$_SESSION['submit_count']][$i]= $ItemName[$i];	
			}						
		}
	}
	else if ($_SESSION['action'] == "Edit")
	{	
		if ($_SESSION['holAction'] == "AddHol")
		{	
			$ItemName = $_POST['holName'];		
			$hname = str_replace("'", "''", $ItemName[0]);
			$hdate =  $ItemName[1];
			$htype = str_replace("'", "''",  $ItemName[2]);
			$bId = $_SESSION['branchId'];
			$queryhol="INSERT INTO Holiday(HolidayName, Date, Type, BranchId) VALUES('$hname', '$hdate', '$htype', '$bId')";		
			$resulthol=odbc_exec($conn,$queryhol) or die("Error in query");		
		}
		else
		{
			$branchId = $_SESSION['branchId'];	
			$hId = $_SESSION['holId'];
			$holId = $_SESSION['holiday'][$hId][3];			
			$updQuery="UPDATE Holiday SET HolidayName = '$holName', Date='$holDate', Type = '$holType' WHERE HolidayId = '$holId'";
			$updResult=odbc_exec($conn,$updQuery) or die("Error in query");
		}
		SetHoliday();	
	}
	
	$_SESSION['holiday'] = array_values($_SESSION['holiday']);		
	
	$holName = "";
	$holDate = "";
	$_SESSION['holAction'] = "AddHol";
}

if (isset($_POST["Delete"]))
{
	$companyName = SetInputData($_POST["companyName"]);
	$branchName = SetInputData($_POST["branchName"]);
	$address = SetInputData($_POST["address"]);
	
	unset($_SESSION['holiday'][$_POST["Delete"]]);
	$_SESSION['holiday'] = array_values($_SESSION['holiday']);
	$_SESSION['holAction'] = "";	
	
	$bId = $_POST["Delete"];
	$delQuery="Delete FROM Branches where BranchId = '$bId'";
	$delResult=odbc_exec($conn,$delQuery) or die("Error in query");
	
	$_SESSION['holiday'] = array();	
	$branchName = "";
	$address = "";
	$_SESSION['action'] == "Add";
}

if (isset($_POST["DeleteHol"]))
	{
		$companyName = SetInputData($_POST["companyName"]);
		$branchName = SetInputData($_POST["branchName"]);
		$address = SetInputData($_POST["address"]);
	
		if ($_SESSION['action'] == "Add")
		{
			unset($_SESSION['holiday'][$_POST["DeleteHol"]]);
			$_SESSION['holiday'] = array_values($_SESSION['holiday']);
			$_SESSION['holAction'] = "";	
		}
		
		else if ($_SESSION['action'] == "Edit")
		{
			$bId = $_POST["DeleteHol"];
			$bIdFin = $_SESSION['holiday'][$bId][3];
			$delQuery="Delete FROM Holiday where HolidayId = '$bIdFin'";
			$delResult=odbc_exec($conn,$delQuery) or die("Error in query");	
			SetHoliday();			
		}
	}
	
if (isset($_POST["formSave"]))
{		
	//retain values
	$companyName = SetInputData($_POST["companyName"]);
	$branchName = SetInputData($_POST["branchName"]);
	$address = SetInputData($_POST["address"]);

	$query1="SELECT * FROM Company where companyName = '$companyName'";
	$result1=odbc_exec($conn,$query1) or die("Error in query");
	while($row1 = odbc_fetch_array($result1))
	{
		$cId = $row1['companyID'];
	}
	
	if ($_SESSION['action'] == "Add")
	{
		//saving of company details
		$query="INSERT INTO Branches(companyID, Name, Address) VALUES('$cId', '$branchName', '$address')";		
		$result=odbc_exec($conn,$query) or die("Error in query");
		
		$query2="SELECT * FROM Branches Where companyID = '$cId' and Name = '$branchName'";
		$result2=odbc_exec($conn,$query2) or die("Error in query");
		
		while($row2 = odbc_fetch_array($result2))
		{
			$bId = $row2['BranchId'];
		}
		
		//loop through each holiday array
		for ($j = 0; $j < count($_SESSION['holiday']); $j++) 
		{
			$hname = str_replace("'", "''", $_SESSION['holiday'][$j][0]);
			$hdate = $_SESSION['holiday'][$j][1];
			$htype = str_replace("'", "''", $_SESSION['holiday'][$j][2]);
			$queryhol="INSERT INTO Holiday(HolidayName, Date, Type, BranchId) VALUES('$hname', '$hdate', '$htype', '$bId')";		
			$resulthol=odbc_exec($conn,$queryhol) or die("Error in query");
		}
		
		$message = "Record Successfully Added.";
		$_SESSION['submit_count'] = 0;
		$_SESSION['holiday'] = array();	
		$_SESSION['action'] == "Add";
		
	}
	else if ($_SESSION['action'] == "Edit")
	{
		$branchId = $_SESSION['branchId'];		
		$updQuery="UPDATE Branches SET companyID = '$cId', Name='$branchName', Address = '$address' WHERE BranchId = '$branchId'";
		$updResult=odbc_exec($conn,$updQuery) or die("Error in query");
		$message = "Record Successfully Updated.";
		$_SESSION['action'] == "Add";
	}
	$_SESSION['holAction'] = "";	
	$_SESSION['holiday'] = array();		
	//clear values
	$companyName = "";
	$branchName = "";
	$address = "";
	$color = "green";
	$_SESSION['companyName'] = "";
}
	
function SetInputData($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   $data = str_replace("'", "''", $data);
   return $data;
}

function SetHoliday()
{
	include 'connect.php';	
	$branchId = $_SESSION['branchId'];
	$_SESSION['holiday'] = array();		
	
	//add holidays
	$query2="SELECT * FROM Holiday WHERE BranchId = '$branchId'";
	$result2=odbc_exec($conn,$query2) or die("Error in query");	
	$i =0;
		
	while($row2 = odbc_fetch_array($result2))
	{
		//array_push($_SESSION['holiday'], $row2['HolidayName'], $row2['Date'], $row2['Type']);
		$_SESSION['holiday'][$i][0] = $row2['HolidayName'];
		$_SESSION['holiday'][$i][1] = $row2['Date'];
		$_SESSION['holiday'][$i][2] = $row2['Type'];
		$_SESSION['holiday'][$i][3] = $row2['HolidayId'];
		$i++;
	}
	
	$_SESSION['holiday'] = array_values($_SESSION['holiday']);		
}

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table width="728" height="40">
    <tr>
        <td width="478"><div align="center"><font face="Century Gothic">BRANCHES</font></div>
        </td>
    </tr>
</table>

<table width="728">
<tr>
<td width="478" height="25" bgcolor=<?php echo $color ?> align="center"><font face="Century Gothic" color="white" size="-1"><?php echo $message ?></font><div align="center"></div>
</td>
</tr>
</table>

<br/>
<table>
    <tr>
        <td><font face="Century Gothic"><b>Company</b></font></td>
    </tr>
    
    <tr>
    	<td><hr width=654px size="3" color="#666666" align="left"/></td>
    </tr>
</table>

<!--<table id="tbl" align="center">
	<tr>
        <td><input type="text" id="search" name="searchtxt"/> </td>
        <td><input type="submit" value="Search" name="Search" id="btn"/></td>
        <td><input type="submit" value="ViewAll" name="ViewAll" id="btn"/></td>        
    </tr>	
</table>	-->

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
		<?php echo('<td class="content" align="center"><button type="submit" name="View" value="'.$row['companyID'].'" " onclick="SaveHide()">View</button></td>' ); ?>
		</tr>
	<?php
	}
    ?>               
</table>

<br />

<table width="665">
<tr>
<td width="478" height="30" bgcolor="#333333" align="center"><font face="Century Gothic" color="white"><?php 
if (isset($_POST["View"]))
{
	$_SESSION['companyId'] = $_POST["View"];
	$companyId = $_SESSION['companyId'];
	$query1 = "SELECT * FROM Company where companyID = '$companyId'";
	$result1=odbc_exec($conn,$query1) or die("Error in query");
	while($row1 = odbc_fetch_array($result1))
	{
		$_SESSION['companyName'] = $row1['companyName'];
	}
	
	echo $_SESSION['companyName'];
}

?></font><div align="center"></div>
</td>
</tr>
</table>
<br/>

<table>
<tr>
    <td><font face="Century Gothic"><b>Branches</b></font></td>
</tr>

<tr>
    <td><hr width=654px size="3" color="#666666" align="left"/></td>
</tr>
</table>



<?php 
function SetBranches()
{
	include 'connect.php';	
	$companyId = $_SESSION['companyId'];
	$query = "SELECT * from Branches where companyID = '$companyId'";
	$result=odbc_exec($conn,$query) or die("Error in query");
	?>
   
    <table id="tbl">
     <th width="185px">    
        </th>	
    <th width="355" id="tblWithBorder">
    Branch Name                
    </th>	
   
   <?php
	while($row = odbc_fetch_array($result))
	{
	?> 
    <tr>
       <!-- <td id="tblNoBorder"></td>-->
         <td width="185px"></td>
        <td id="tblWithBorder"> <?php echo $row['Name'] ?></td>	
        <td id="comTbx"<?php echo('<td class="content" align="center"><button type="submit" name="Edit" value="'.$row['BranchId'].'" " onclick=SaveVis()>Edit</button></td>' ); ?></td>
        <td id="comTbx"><?php echo '<button type="submit" name="Delete"  value="'.$row['BranchId'].'" >Delete</button>';?></td>
     </tr>
     
	<?php
	}
}
?>

</table>

<br />
<br />

<?php
if (isset($_POST["View"]))
{
	$_SESSION['companyId'] = $_POST["View"];
	$_SESSION['action'] = "Add";		
	SetBranches();
	$_SESSION['submit_count'] = 0;
	$_SESSION['holiday'] = array();					
}

if (isset($_POST["EditHol"]))
{
	$companyName = SetInputData($_POST["companyName"]);
	$branchName = SetInputData($_POST["branchName"]);
	$address = SetInputData($_POST["address"]);
	
	$id = $_POST["EditHol"];
	$_SESSION['holId'] = $id;
	$holName = $_SESSION['holiday'][$id][0];	
	$holDate = date("Y-m-d", strtotime($_SESSION['holiday'][$id][1]));
	$holType = $_SESSION['holiday'][$id][2];
	$_SESSION['holAction'] = "EditHol";
	SetBranches();
}

if (isset($_POST["Edit"]))
{
	$_SESSION['action'] = "Edit";
	$_SESSION['holAction'] = "AddHol";
	$_SESSION['submit_count'] = 0;
	$_SESSION['holiday'] = array();		
	$branchId = $_POST["Edit"];
	$_SESSION['branchId'] = $branchId;
	
	$companyId = $_SESSION['companyId'];
	$query="SELECT * FROM Branches WHERE BranchId = '$branchId'";
	$result=odbc_exec($conn,$query) or die("Error in query");	
		
	while($row = odbc_fetch_array($result))
	{
		$companyId = $row['companyID'];
		$query1 = "SELECT * FROM Company where companyID = $companyId";
		$result1=odbc_exec($conn,$query1) or die("Error in query");
		while($row1 = odbc_fetch_array($result1))
		{
			$companyName = $row1['companyName'];
		}
		$branchName = $row['Name'];			
		$address = $row['Address'];
	}	
	
	SetBranches();
	$_SESSION['submit_count'] = 0;
	$_SESSION['holiday'] = array();	
		
	SetHoliday();
	
}
?>               
<table>	
	<tr>
	<table>         
        <tr>
            <td id="comLabel">Company:</td>
            <td id="comTbx">
            <select id="comDropdown" name="companyName">
            <?php
                $query = "SELECT * FROM Company";
                $result=odbc_exec($conn,$query) or die("Error in query");
                while($row = odbc_fetch_array($result))
                {
                ?>
                <option <?php if (isset($companyName) && $companyName==$row['companyName']) echo "selected";?>> <?php echo $row['companyName']?> </option>    
                <?php
                }
            ?>
            </select>
            <input type="hidden" name="branchId" value="<?php $branchId ?>"/>
           </td>	
        </tr>
        <tr>
            <td id="comLabel">Branch:</td>
            <td id="comTbx"><input type="text" size="50" name="branchName" value="<?php echo $branchName; ?>"/></td>	
        </tr>
        <tr>
            <td id="comLabel">Address:</td>
            <td id="comTbx"><input type="text" size="50" name="address" value="<?php echo $address; ?>"/></td>	
            <td></td>
        </tr> 

		</table>
	</tr>	
</table>


<table>	
	 <tr>
		<td height="30"> </td>
     </tr>
	 <tr>
		<td><font face="Century Gothic"><b>Holidays</b></font></td>
     </tr>
        
     <tr>
		<td><hr width=654px size="3" color="#666666" align="left"/></td>
 	 </tr>
        <tr>
        
        
        <table>
        <th width="185px">    
        </th>	
        <th width="145" id="tblWithBorder">
        Holiday
        </th>	
        <th width="100" id="tblWithBorder">
        Date
        </th>	
        <th width="100" id="tblWithBorder">
        Type
        </th>
    	
        <?php		
			for ($j = 0; $j < count($_SESSION['holiday']); $j++) 
			{
				?>
				<tr>
                <td iwidth="185px"> </td>
                <td id="tblWithBorder"> <?php echo $_SESSION['holiday'][$j][0] ?></td>	
                <td id="tblWithBorder"> <?php echo date("M d, Y", strtotime($_SESSION['holiday'][$j][1])) ?></td>	
                <td id="tblWithBorder"> <?php echo $_SESSION['holiday'][$j][2] ?></td>	
                <?php echo('<td class="content" align="center"><button type="submit" value="'.$j.'" name="EditHol" onclick="disableReq()">Edit</button></td>' ); ?>
                <td id="comTbx"><?php echo '<button type="submit" value="'.$j.'" name="DeleteHol">Delete</button>'; ?>
                <td><input type="hidden" size="50" name="holArr" value=" <?php $j ?>"/></td>
        		</tr>	
            <?php
			}
		?>        
		</table>	
        
        <br />
        <br />
            <td width="335">               
            	<table>
                	<tr>
                        <td id="comLabel">Name of Holiday:</td>
                       	<td> 
                        <select name="holName[]" id="comDropdown">
                       
						<?php
							$query = "SELECT * FROM HolidaysRef";
							$result=odbc_exec($conn,$query) or die("Error in query");							
							while($row = odbc_fetch_array($result))
							{
							?>
                            <option <?php if (isset($holName) && $holName==$row['HolidayName']) echo "selected";?>> <?php echo $row['HolidayName']?> </option>    
                            <?php
							
							}
						?>
                        	
                        </select>
                        <td><input name="submit_count" type="hidden" value="submitted" /> </td>                        
               		</tr>
                     
                    <tr>
                        <td id="comLabel">Date:</td>
                        <td><input type="date" id="reqFields" name="holName[]" value="<?php echo $holDate; ?>" /></td>
                    </tr>
                     <tr>
                        <td id="comLabel">Type:</td>
                        <td>
                        	<select id="comDropdown" name="holName[]">
                            	
                            	<option <?php if (isset($holType) && $holType=="Local") echo "selected";?>> Local </option>             
                                <option <?php if (isset($holType) && $holType=="Regular") echo "selected";?>> Regular </option>     
                                <option <?php if (isset($holType) && $holType=="Special") echo "selected";?>> Special </option>  
                            </select>
                        
                        </td>	
                    </tr>
                    <tr>
                    	<td id="comLabel"></td>
                    	<td>	
                            <input type="submit" value="Save" name="formSaveHoliday" onclick="enableReq()"/>	                 
                      </td>
                 	 </tr>	              
                </table>
                 
            </td>
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
    
</body>
</html>
