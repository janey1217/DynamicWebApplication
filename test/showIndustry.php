  <?php
require_once("header.php");
?>
 <!---中间大模块---------------->
    <div id="container_bg">
    <img src="img/ab_topbg.gif" >
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
    <div class=" title_nav">您的位置： 新闻中心 >  <a href="#">行业新闻</a></div>
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
   <!-- <p>
    上海申彤投资管理有限公司（申彤集团）是一家以境内外项目投资、资本运作、商业贸易为主营业务的多元化产业集团公司。集团公司成立于2008年，注册资金5000万元，集团总部位于中国香港，集团本部位于中国上海陆家嘴金融贸易区。</p>

<p>多年来，申彤集团立足于国内外金融资本市场，通过资本运作帮助企业获得项目贷款和资本支持；积极开展银企、民企、企企间的资本交流、参与资本洽谈与合作；通过各渠道、各途径盘活市场资本，扩大资本利用率，实现资源的再生、资本价值及利润的最大化；积极参与我国各地优势项目的投融资与开发，为我国地方经济建设积极贡献力量！
    </p>-->
    </div>
    
  </div>
  </div>
  <!---中间大模块end----------------> 
   <!---底部----------------> 
  <?php
require_once("footer.php");
?>