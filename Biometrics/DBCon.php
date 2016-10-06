<?php

   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('192.168.254.106\ServerFiles\Data\FGCB.db');
      }
   }
   
   class MyDB2 extends SQLite3
   {
      function __construct()
      {
         $this->open('192.168.254.106\ServerFiles\Data\FGCBDATA.db');
      }
   }
   $db = new MyDB();
   $db2 = new MyDB2();


if (!$db) {echo "Error in DB";}
else {echo "OK";}

if (!$db2) {echo "Error in DB2";}
else {echo "OK";}

?>