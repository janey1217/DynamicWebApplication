<?php

/**
 * Created by PhpStorm.
 * User: jym
 * Date: 2016/2/16
 * Time: 10:02
 */
class myPageClass
{
    public function  mypage($currentPage, $pageCount )
    {
        include ('/inc/conn.php');
        $startNum =($currentPage-1)*$pageCount;
        //echo $endNum;
        $sql = "select * from car_info ORDER BY insert_date DESC limit $startNum,$pageCount";
       // echo $sql;
        $result = mysql_query($sql);
        $results = array();
        while ($row =mysql_fetch_assoc($result)){
            $results[] = $row;
        }
       return json_encode($results);
    }

}