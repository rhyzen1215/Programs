<?php

		include 'connect.php';
	
		$query=("Select * From SequenceID");
		while ($recs=odbc_fetch_array($query))
			{
			$x=$recs['sequenceno'];  		
			}
			
		$result=odbc_exec($conn,$query) or die("Error in query");
		echo "Successfully Added";
		print $x;
?>