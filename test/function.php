<?php
require_once("connDB.php");
?>
<?php
function about($id)
{

$sql="select * from channel where id=".$id;
$query=@mysql_query($sql) or die("<script>window.location='404.php';</script>");
$num=mysql_num_rows($query);		
		  if($num<=0)
		  {
		    echo ("<script>window.location='404.php';</script>");
		    exit;
		  }
if( $row=mysql_fetch_array($query) )
		   {
			   echo $row["content"];
		   }

}
function news($id)
{

$sql="select * from news where id=".$id;
$query=@mysql_query($sql) or die("<script>window.location='404.php';</script>");
$num=mysql_num_rows($query);		
		  if($num<=0)
		  {
		    echo ("<script>window.location='404.php';</script>");
		    exit;
		  }
if( $row=mysql_fetch_array($query) )
		   {
			   echo $row["content"];
		   }

}

function title($id)
{

$sql="select * from news where id=".$id;
$query=@mysql_query($sql) or die("<script>window.location='404.php';</script>");
$num=mysql_num_rows($query);		
		  if($num<=0)
		  {
		    echo ("<script>window.location='404.php';</script>");
		    exit;
		  }
if( $row=mysql_fetch_array($query) )
		   {
			   echo $row["title"];
		   }

}

function banner($id)
{

$sql="select * from banner where id=".$id;
$query=@mysql_query($sql) or die("<script>window.location='404.php';</script>");
$num=mysql_num_rows($query);		
		  if($num<=0)
		  {
		    echo ("<script>window.location='404.php';</script>");
		    exit;
		  }
if( $row=mysql_fetch_array($query) )
		   {
			   echo $row["name"];
		   }

}


function pic($id)
{

$sql="select * from tp where id=".$id;
$query=@mysql_query($sql) or die("<script>window.location='404.php';</script>");
if( $row=mysql_fetch_array($query) )
		   {
			   echo str_replace('../','',$row["picurl"]);
		   }

}



function guanjian()
{

$sql="select * from web_config where id=1";
$query=@mysql_query($sql) or die("<script>window.location='404.php';</script>");
$num=mysql_num_rows($query);		
		  if($num<=0)
		  {
		    echo ("<script>window.location='404.php';</script>");
		    exit;
		  }
if( $row=mysql_fetch_array($query) )
		   {
			   echo "<title>".$row["web_title"]."</title>";
			   echo "<meta name='Keywords' content='".$row["web_key1"]."' />";
			   echo "<meta name='Description' content='".$row["web_key2"]."' />";

		   }

}

?>