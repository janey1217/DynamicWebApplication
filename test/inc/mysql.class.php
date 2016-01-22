<?php 
	class mysql
	{
		private $db_host;
		private $db_user;
		private $db_pwd;
		private $db_database;
		private $gbk;
		private $conn;
		function __construct($db_host,$db_user,$db_pwd,$db_database,$gbk)
		{
			$this->db_host=$db_host;
			$this->db_user=$db_user;
			$this->db_pwd=$db_pwd;
			$this->db_database=$db_database;
			$this->gbk=$gbk;
			$this->conn();
		}
		function conn()
		{
			$this->conn=@mysql_connect($this->db_host,$this->db_user,$this->db_pwd) or die("数据库连接失败!");
			mysql_select_db($this->db_database,$this->conn);
			mysql_query("set names $this->gbk");
		}
		public function __destruct()
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
			}else
			{
				echo "错误：".$this->show_error();
			}
		}	
		function fetch_array($query)
		{
			if($query!="")
			{
				return mysql_fetch_array($query);
			}else
			{
				echo "错误：".$this->show_error();
			}
		}
		function num_rows($result)
		{
			if($result!="")
			{
				return mysql_num_rows($result);
			}else
			{
				echo "错误：".$this->show_error();
			}
		}
		
		function replace($str)
		{
			return rtrim(str_replace("'"," ",$str));
		}
			
		/** 
		* 截取中文部分字符串 
		* 截取指定字符串指定长度的函数,该函数可自动判定中英文,不会出现乱码 
		* @param string    $str    要处理的字符串 
		* @param int       $strlen 要截取的长度默认为10 
		* @param string    $other  是否要加上省略号,默认会加上 
		*/ 
		function subst($str,$strlen=10,$other=true)
		{ 
			for($i=0;$i<$strlen;$i++) 
			if(ord(substr($str,$i,1))>0xa0) $j++; 
			if($j%2!=0) $strlen++; 
			$rstr=substr($str,0,$strlen); 
			if (strlen($str)>$strlen && $other) {$rstr.='...';} 
			return $rstr; 
		}

			
		function channel($zd,$id,$num='')
		{
			$query=$this->query("select $zd from `channel` where id=$id limit 1");
			$row=$this->fetch_array($query);
			$str=$row[$zd];
			if($num=='')
			{
				echo $str;
			}else{
				echo $this->subst($str,$num);
			}
			
		}
		function webconfig($zd)
		{
			$query=$this->query("select $zd from `web_config` where id=1 limit 1");
			$row=$this->fetch_array($query);
			return $row[$zd];		
		}
		
	}
	
?>