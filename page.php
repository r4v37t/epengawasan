<?php
if(isset($_GET['page'])){
	if($_GET['page']=='ref-bidang'){
		include $_GET['page'].'.php';
	}else if($_GET['page']=='ref-desa'){
		include $_GET['page'].'.php';
	}else if($_GET['page']=='ref-rekanan'){
		include $_GET['page'].'.php';
	}else if($_GET['page']=='ref-paket'){
		include $_GET['page'].'.php';
	}else if($_GET['page']=='pengguna'){
		include $_GET['page'].'.php';
	}else{
		include 'dashboard.php';
	}
}else{
	include 'dashboard.php';
}
?>