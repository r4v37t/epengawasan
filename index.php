<?php
include 'config.php';
if(!$_SESSION['login']){
	?><script>location.href='login.php';</script><?php
}else{
	?><script>location.href='main.php';</script><?php
}
?>