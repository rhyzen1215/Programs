<?php

  	$dsn="Conn1";
	$dsn1="Conn2";
	$server="192.168.254.106";
	$database="CIF";
	$user="sa";
	$password="P@ssw0rd";
	$conn = odbc_connect($dsn,"","");
	$conn1 = odbc_connect($dsn1,"","");

?>