<?php
include_once("inc/config.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>后台管理系统</TITLE><link rel="stylesheet" type="text/css" href="images/css.css">
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content=Alan name=Author><LINK href="images/private.css"
type=text/css rel=stylesheet>
<META content="MSHTML 6.00.6000.16890" name=GENERATOR></HEAD>
<body>
<?php     
$html = '';
$query11=$db->query("select * from p_class where f_id=".$_GET['id']);
$html .= '<select id=ffid name=ffid>';
while($row11=$db->fetch_array($query11))
		{
	$html .='<option value="'.$row11[id].'">'.$row11[classname].'</option>';
}
$html .= '</select>';
echo $html;
exit;
?>
</body>

