  <?php
require_once("header.php");
?>
 <!---中间大模块---------------->
    <div id="container_bg">
    <img src="img/banner1.gif" >
  <div id="container">
  <!---左边菜单end---> 
    <div class="left_nav">
      <h2><img src="img/news.gif" ></h2>
      <ul>
	    <?php			
					$sql = "select * from banner where p_id=4";
					$result = mysql_query($sql);
					while( $row=mysql_fetch_array($result) )
					{	
						if($row['id']==13){
		?>
		<li><a href="<?php echo $row['url']?>"  class="click"><?php echo $row['name']?></a></li>
		<?php 
			}else{
		?>
		<li><a href="<?php echo $row['url']?>"><?php echo $row['name']?></a></li>
		<?php
			}
			}
			?>
      </ul>
      <div><img src="img/news_01.gif" ></div>
    </div>
    <!---左边菜单end---> 
    <div class="right_cont">
    <div class=" title_nav">您的位置： 新闻中心 >  <a href="#">公司公告</a></div>
		<?php
				$id=$_REQUEST["id"];
				$sql="select * from news where id=".$id;
				$query=@mysql_query($sql) or die("<script>window.location='404.php';</script>");
				if( $row=mysql_fetch_array($query) )
				{
			?>
				<h2><?php echo $row['title']?></h2>
				<h4>时间:<?php echo $row['date']?></h4>
				<?php echo $row['content']?>
		<?php
		} 
		?>
    </div>
    
  </div>
  </div>
  <!---中间大模块end----------------> 
   <!---底部----------------> 
  <?php
require_once("footer.php");
?>