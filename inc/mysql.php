<?php

/**
 * Created by PhpStorm.
 * User: jym
 * Date: 2016/1/27
 * Time: 17:52
 */
class mysql
{
    private $db_host;
    private $db_user;
    private $db_pwd;
    private $db_database;
    private $gbk;
    private $conn;
    function _construct($db_host, $db_user, $db_pwd, $db_database, $gbk)
    {
        $this ->db_host =$db_host;
        $this ->db_user = $db_user;
        $this ->db_pwd = $db_pwd;
        $this ->db_database = $db_database;
        $this ->gbk = $gbk;
        $this ->conn();
    }
    function conn()
    {
        $this ->conn=@mysql_connect($this->db_host, $this->db_user, $this->db_pwd) or die("数据库无法连接或找不到");
        mysql_select_db($this->db_database, $this->conn);
        mysql_query("set names $this->gbk");
    }
    public function _destruct()
    {
        mysql_close($this->conn);
    }
    function show_error()
    {
        return mysql_error();
    }
    function query($sql)
    {
        if($sql!="")
        {
            return mysql_query($sql);
        }
        else
        {
            echo "错误信息：".$this->show_error();
        }
    }
    function fetch_array($query)
    {
        if($query!="")
        {
            return mysqli_fetch_array($query);
        }
        else
        {
            echo "错误信息".$this->show_error();
        }
    }
    function num_rows($result)
    {
        if($result!="")
        {
            return mysql_num_rows($result);
        }
        else
        {
            echo "错误信息".$this->show_error();
        }
    }

}