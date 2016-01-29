  <?php
require_once("header.php");
?>
 <!---轮播---------------->
  <div id="banner">
    <div class="hot-event">
		  <div class="event-item" style="display:block;">
			  <a href="javascript:;#">
			  <img src="img/banner1.gif" class="photo" width="1000" height="329"   />
			  </a>
		  </div>
		  <div class="event-item">
			  <a href="javascript:;#">
			  <img src="img/banner2.gif" class="photo" width="1000" height="329"   />
			  </a>
		  </div>
		  <div class="event-item">
			  <a href="javascript:;#">
			  <img src="img/banner3.gif" class="photo" width="1000" height="329"   />
			  </a>
		  </div>
		  <div class="switch-tab"> 
			  <a href="javascript:;javascript:void(0);" onClick="return false;" class="current">1</a> 
			  <a href="javascript:;javascript:void(0);" onClick="return false;">2</a>
			  <a href="javascript:;javascript:void(0);" onClick="return false;">3</a>
		  </div>
    </div>
    <script type="text/javascript">
	$(document).ready(function(){
		$('.hot-event').nav({
			t:2000,	//轮播时间
			a:100  //过渡时间
		});
	});
    </script> 
  </div>
  <div id="shadowhp"></div>
  <!---轮播end----------------> 
  
  <!---中间大模块---------------->
  <div id="wrapper"> 
    
    <!-----左边列表------>
    <div class="left left_menu">
     <h1>
		<a href="javascript:;">行业新闻</a>
		<span class="right mor">
			<a href="javascript:;">更多新闻 >></a>
		</span>
     </h1>
     <dl>
	  <?php
				$sql = "select * from news where f_id=5 order by date desc limit 0,5";
				$result = mysql_query($sql);
				while( $row=mysql_fetch_array($result) )
				{
					//echo $row['title'];
			?>
		<dd>
		<a href="showIndustry.php?id=<?php echo $row['id']  ?>" target="_blank">
		<?php echo $row["title"] ?>
		</a>
		</dd>
		<!--<dd>
		<a href="javascript:;">
		让党建在申彤集团生根开花——上海申彤投资集团有限公司荣获上海“两新”组织党建工作先进单位第一名				</a>
		</dd>
		<dd>
		<a href="javascript:;">
		静安区领导莅临“金领驿站”指导工作				</a>
		</dd>
		<dd>
		<a href="javascript:;">
		关于发放“2014年三季度绩效奖金”的通知				</a>
		</dd>
		<dd>
		<a href="javascript:;">
		关于集团管理中心办公场所搬迁的通知				</a>
		</dd>-->
		<?php 
		}
		?>
	</dl>
    
    </div>
    <!-----左边列表end------> 
    <!-----中间内容------>
    <div class="left centre">
      <h1>公司新闻<span class="right mor">
				<a href="javascript:;">更多新闻 >></a>
		   </span>
      </h1>
      <dl>
	  <?php
				$sql = "select * from news where f_id=4 order by date desc limit 0,5";
				$result = mysql_query($sql);
				while( $row=mysql_fetch_array($result) )
				{
			?>
		<dd>
		<a href="showNews.php?id=<?php echo $row['id'] ?>" target="_blank">
		<?php echo $row["title"] ?>
		</a>
		</dd>
		<!--<dd>
		<a href="javascript:;">
		让党建在申彤集团生根开花——上海申彤投资集团有限公司荣获上海“两新”组织党建工作先进单位第一名				</a>
		</dd>
		<dd>
		<a href="javascript:;">
		静安区领导莅临“金领驿站”指导工作				</a>
		</dd>
		<dd>
		<a href="javascript:;">
		关于发放“2014年三季度绩效奖金”的通知				</a>
		</dd>
		<dd>
		<a href="javascript:;">
		关于集团管理中心办公场所搬迁的通知				</a>
		</dd>-->
		<?php 
		}
		?>
	</dl>
		   
    </div>
    <!-----中间内容end------> 
    <!-----右边列表------>
    <div class="right right_list">
     
	  <h1>公司动态</h1>
      <dl>
	   <?php
				$sql = "select * from news where f_id=3 order by date desc limit 0,5";
				$result = mysql_query($sql);
				while( $row=mysql_fetch_array($result) )
				{
			?>
		<dd>
		<a href="showgsgg.php?id=<?php echo $row['id'] ?>" target="_blank">
		<?php echo $row["title"] ?>
		</a>
		</dd>
		<!--<dd>
		<a href="javascript:;">
		关于举办“岗位技能培训（行政岗）”活动的通知				</a>
		</dd>
		<dd>
		<a href="javascript:;">
		关于表彰“集团三季度先进集体及先进个人”的通知			</a>
		</dd>
		<dd><a href="javascript:;">
		关于发放“2014年三季度绩效奖金”的通知			</a>
		</dd>-->
		<?php 
		}
		?>
	</dl>
    </div>
    <!-----右边列表end------>
  </div>
    <?php
		require_once("footer.php");
	?>
</body>
</html>