<?php

   class MyDB extends SQLite3{
 	function __construct(){
        $this->open('FGCB.db');}
   }
   
   class MyDB2 extends SQLite3{
 	function __construct(){
        $this->open('FGCBDATA.db');}
   }
   
 
   $db = new MyDB();
   $db2 = new MyDB2();
   $DBCheck = true;
   
   if(!$db){
      $DBCheck = false;
   }
   
   
  	 $dsn="myDB";
	$server="192.168.254.106";
	$database="CIF";
	$user="sa";
	$password="P@ssw0rd";
	$conn = odbc_connect($dsn,"","");
   
?>
