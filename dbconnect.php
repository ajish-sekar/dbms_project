<?php 
	
	$host='localhost';
	$username='root';
	$pass='Ajish123';
	$db='amaclone';
	$dsn='fliptruck_mysqldb';
	//$conn=mysqli_connect($host,$username,$pass,$db);
	// $conn=odbc_connect("fliptruck_mysqldb","","");
	$conn = odbc_connect(
		"DRIVER={MySQL};Server=localhost;Database=amaclone", 
		"root", "Ajish123");
	//if(!$conn) die("Connection refused").mysql_connect_error();
	if(!$conn) {
		echo "<p> This is the error: ";
		echo odbc_errormsg($conn);
		echo "</p>";
		die("Connection refused");
	}
 ?>