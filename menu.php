<?php
if(isset($_SESSION['akses'])){
	$akses=$_SESSION['akses'];
	if($akses=='admin'){
		include 'menu-admin.php';
	}else if($akses=='kpa'){
		include 'menu-kpa.php';
	}else if($akses=='rekanan'){
		include 'menu-rekanan.php';
	}else if($akses=='pptk'||$akses=='pengawas'){
		include 'menu-pptkpengawas.php';
	}else{
		include 'menu-kosong.php';
	}
}else{
	include 'menu-kosong.php';
}
?>