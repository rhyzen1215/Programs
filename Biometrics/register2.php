<?Php
	
	$Confirm = "";
	
	if (isset($_REQUEST['register'])){
		
		include 'DBConnect.php';
		
		$User =  $_REQUEST['user'];
		$Pass1 = $_REQUEST['password1'];
		$Pass2 = $_REQUEST['password2'];
		$lastname =  $_REQUEST['lastname'];
		$middlename =  $_REQUEST['middlename'];
		$firstname =  $_REQUEST['firstname'];
		$branch =  $_REQUEST['branch'];
		$User = base64_encode($User);
		
		$sql1 = "Select * From USERACCOUNT where userid = '".$User."'";
		$rs1 = odbc_exec($conn,$sql1) or die("Error in query");
		if (odbc_fetch_row($rs1)) {
			$Confirm = "Exist";
		}else {
			
			if ($Pass1 == $Pass2){
			$Pass1 = base64_encode($Pass1);
			date_default_timezone_set("Asia/Taipei");
			$LogDate = date_create();
			$lastname =  strtoupper($lastname);
			$middlename =  strtoupper($middlename);
			$firstname = strtoupper($firstname);
			$branch =  strtoupper($branch);
			$LogDate = date_format($LogDate,"Y-m-d h:i:s A");

			$sql = "Insert Into USERACCOUNT (userid,userpass,lastname,middlename,firstname,branch,dateregistered,status,userlvl) values('$User','$Pass1','$lastname','$middlename','$firstname','$branch','$LogDate','0','0')";
			$rs=odbc_exec($conn,$sql) or die("Error in query");	
			$Confirm = "Confirm";
			}
			else {
			$Confirm = "Password";
			}
		}
		

			echo '<script>';
			echo 'document.location.href="register.php?confirm='.$Confirm.'&user='.$User.'&fname='.$firstname.'&lname='.$lastname.'&mname='.$middlename.'&branch='.$branch.'";';
			echo '</script>';

		
	}


?>
