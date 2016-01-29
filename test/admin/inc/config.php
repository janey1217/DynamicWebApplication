<?php
	error_reporting(0);
 	session_start();
	define(BR,"bangrui");
	include_once("../inc/mysql.class.php");
	include_once("page.class.php");
	include_once("action.php");
	/*include_once("fckeditor/fckeditor.php");
	include("FCKeditor/fckeditor.php") ;

	$oFCKeditor = new FCKeditor('FCKeditor1') ;

	$oFCKeditor->BasePath = 'FCKeditor/';
	$oFCKeditor->Height = 350;
	$oFCKeditor->Width = '95%';
	$oFCKeditor->Value = '';*/

	$db=new mysql("localhost","root","","test","gb2312");
	//$db=new mysql("61.152.96.248","sq_yiqianjia","jasdhgf","sq_yiqianjia","utf-8");
	
?>