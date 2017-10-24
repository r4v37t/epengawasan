<?php
if(isset($_SESSION['akses'])){
	$akses=$_SESSION['akses'];
	if($akses=='admin'){
		include 'menu-admin.php';
	}else if($akses=='kontraktor'){
		include 'menu-kontraktor.php';
	}else{
		include 'menu-kosong.php';
	}
}else{
	include 'menu-kosong.php';
}
?>