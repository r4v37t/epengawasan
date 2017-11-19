<?php
	session_start();
	
	//mysql
	$db_user='root';
	$db_pass='';
	$db_host='localhost';
	$db_database='epengawasan';
	mysql_connect($db_host,$db_user,$db_pass) or die("Koneksi Gagal!!");
	mysql_select_db($db_database) or die("Database tidak bisa dibuka!!");
	
	function bulanindo($bln){
		if($bln==1) return 'Januari';
		else if($bln==2) return 'Februari';
		else if($bln==3) return 'Maret';
		else if($bln==4) return 'April';
		else if($bln==5) return 'Mei';
		else if($bln==6) return 'Juni';
		else if($bln==7) return 'Juli';
		else if($bln==8) return 'Agustus';
		else if($bln==9) return 'September';
		else if($bln==10) return 'Oktober';
		else if($bln==11) return 'Nopember';
		else if($bln==12) return 'Desember';
		else return 'Error';
	}
?>