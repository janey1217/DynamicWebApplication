<?php
session_start();
//echo $_SESSION["adminName"];
if (!isset($_SESSION["adminName"]) ){
	echo("<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />");
	echo("您没有权限，请重新登陆");
	exit();
}
?>