<?php

		include 'connect.php';
		$uname1 = $_POST['user2'];
		$pass1 = $_POST['pass2'];
		
		$x=0;
		$query="SELECT * FROM Account Where username = '$uname1'";
		$result=odbc_exec($conn,$query) or die("Error in query");
		
		while ($recs=odbc_fetch_array($result))
			{
				if ($pass1==trim($recs['password']))
					{
	   				$x=1;
					}
			}
	
		if ($x==1)
			{
			include 'index.html';
			print "Welcome";
			}
		else
			{
			include 'login.html';
			print "Error Log in";
			}
		
?>