<?php

		include 'connect.php';
		$uname1 = $_POST['user2'];
		$pass1 = $_POST['pass2'];
		
		if (trim($_POST['user2'])=="")
			{
	   		echo "Nothing to Add";
		   	exit;
			}
		if (trim($_POST['pass2'])=="")
			{
	   		echo "Nothing to Add";
		   	exit;
			}
		$query="INSERT INTO Account(username,password) VALUES('$uname1','$pass1')";
		$result=odbc_exec($conn,$query) or die("Error in query");
		echo "Successfully Added";

?>