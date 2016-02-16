<?php
/**
 * Created by PhpStorm.
 * User: jym
 * Date: 2016/2/16
 * Time: 9:45
 */
require_once ('myPageClass.php');
$currentPage = $_POST['num'];
$pageCount = $_POST['pageCount'];
$obj = new myPageClass();
echo $obj->mypage($currentPage, $pageCount);

