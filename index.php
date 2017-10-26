<?php
include 'config.php';
if(isset($_SESSION['login'])){
	if(!$_SESSION['login']){
		?><script>location.href='login.php';</script><?php
	}else{
		?><script>location.href='main.php';</script><?php
	}
}else{
	?><script>location.href='login.php';</script><?php
}
?>