<?php
$myfile = fopen("readtext.txt", "r") or die("Unable to open file!");
$dsn = "";
$server = "";
$database = "";
$username = "";
$password = "";
$counter = 1;
// Output one line until end-of-file
//while(!feof($myfile)) {
while($counter < 6) {

	if ($counter == 1 ){$dsn =  fgets($myfile);}
	else if ($counter == 2 ){$server =  fgets($myfile);}
	else if ($counter == 3 ){$database =  fgets($myfile);}
	else if ($counter == 4 ){$username =  fgets($myfile);}
	else if ($counter == 5 ){$password =  fgets($myfile);}
  	$counter = $counter + 1;
}
fclose($myfile);
	
	echo $dsn . "<br>";
	echo $server . "<br>";
	echo $database . "<br>";
	echo $username . "<br>";
	echo $password . "<br>";
	
?>