<?php
	session_start();
	
	//mysql
	$db_user='root';
	$db_pass='';
	$db_host='localhost';
	$db_database='epengawasan';
	mysql_connect($db_host,$db_user,$db_pass) or die("Koneksi Gagal!!");
	mysql_select_db($db_database) or die("Database tidak bisa dibuka!!");
?>