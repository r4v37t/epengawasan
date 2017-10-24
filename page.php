<?php
if(isset($_GET['page'])){
	if($_GET['page']=='ref-bidang'){
		include $_GET['page'].'.php';
	}else if($_GET['page']=='sumberdana'){
		include $_GET['page'].'.php';
	}else{
		include 'dashboard.php';
	}
}else{
	include 'dashboard.php';
}
?>