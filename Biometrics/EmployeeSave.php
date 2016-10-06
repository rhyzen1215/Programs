	<?Php
		
		include 'DBConnect.php';
		
		
		if (isset($_REQUEST['btnSave'])){
		
			$empID=$_REQUEST['empIDNum'];
			$Fname=$_REQUEST['FName'];
			$Mname=$_REQUEST['MName'];
			$Lname=$_REQUEST['LName'];
			$Comp=$_REQUEST['Comp'];
			$Branch=$_REQUEST['BDept'];
			$Address=$_REQUEST['Addr'];
			$SchedID = $_REQUEST['SchedID'];
			
			if ($empID == "") {
				echo '<script>';
				echo 'document.location.href="EmployeeRecord.php";';
				echo '</script>';
				exit;
				}
			else {
		$sql = "UPDATE EMPLOYEE  set LASTNAME = '".$Lname."', FIRSTNAME = '".$Fname."', MIDDLENAME = '".$Mname."', STATION_BRANCH = '".$Branch."', LOCATION = '".$Address."', TIME_SCHEME = '".$SchedID."' where employeeID = '".$empID."'";
		$rs=odbc_exec($conn,$sql) or die("Error in query");	
			
			echo 'Saved. '.$SchedID;
			echo '<script>';
			echo 'document.location.href="EmployeeRecord.php?SucSave='.$empID.'";';
			echo '</script>';
			}
		}
	
	?>
