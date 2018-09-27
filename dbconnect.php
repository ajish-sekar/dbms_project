<?php 
	
	$host='localhost';
	$username='root';
	$pass='Ajish123';
	$db='amaclone';

	$conn=mysqli_connect($host,$username,$pass,$db);

	if(!$conn) die("Connection refused").mysql_connect_error();
 ?>