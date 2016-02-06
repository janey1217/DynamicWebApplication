<?php
/**
 * Created by PhpStorm.
 * User: jym
 * Date: 2016/1/22
 * Time: 17:36
 */
//require ("mysql.php");
//$conndb = new mysql();
//$mydb_conn = $conndb.conn("localhost","root","");
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_sys";
error_reporting(0);
@mysql_connect($servername,$username,$password) or die("连接失败");
@mysql_select_db($dbname) or die("数据库不存在或不可用！");
//设置数据的字符集utf-8
mysql_query("SET NAMES 'utf8'");
mysql_query("SET CHARACTER_SET_CLIENT=utf8");
mysql_query("SET CHARACTER_SET_RESULTS=utf8");
date_default_timezone_set("Asia/Shanghai");
//设定用于一个脚本中所有日期时间函数的本地默认时区
//$timezone_identifier = "PRC";		//本地时区标识符
//date_default_timezone_set($timezone_identifier);
?>