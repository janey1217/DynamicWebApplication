<?php
/******************************************************************************

����˵��:
$max_file_size  : �ϴ��ļ���С����, ��λBYTE
$destination_folder : �ϴ��ļ�·��
$watermark   : �Ƿ񸽼�ˮӡ(1Ϊ��ˮӡ,����Ϊ����ˮӡ);

ʹ��˵��:
1. ��PHP.INI�ļ������"extension=php_gd2.dll"һ��ǰ���;��ȥ��,��Ϊ����Ҫ�õ�GD��;
2. ��extension_dir =��Ϊ���php_gd2.dll����Ŀ¼;
******************************************************************************/

//�ϴ��ļ������б�
$uptypes=array(
    'image/jpg',
    'image/jpeg',
    'image/png',
    'image/pjpeg',
    'image/gif',
    'image/bmp',
    'image/x-png'
);

$max_file_size=2000000;     //�ϴ��ļ���С����, ��λBYTE
$destination_folder="../Pic/"; //�ϴ��ļ�·��
$watermark=0;      //�Ƿ񸽼�ˮӡ(1Ϊ��ˮӡ,����Ϊ����ˮӡ);
$watertype=1;      //ˮӡ����(1Ϊ����,2ΪͼƬ)
$waterposition=1;     //ˮӡλ��(1Ϊ���½�,2Ϊ���½�,3Ϊ���Ͻ�,4Ϊ���Ͻ�,5Ϊ����);
$waterstring="http://www.vvv.cn/";  //ˮӡ�ַ���
$waterimg="logo.png";    //ˮӡͼƬ
$imgpreview=1;      //�Ƿ�����Ԥ��ͼ(1Ϊ����,����Ϊ������);
$imgpreviewsize=1/2;    //����ͼ����
?>
<html>
<head>
<title>ͼƬ�ϴ�</title>
<style type="text/css">
<!--
body
{
	margin:0px;
    font-size: 12px;
}
input
{
	BORDER-TOP-WIDTH: 1px; PADDING-RIGHT: 1px; PADDING-LEFT: 1px; BORDER-LEFT-WIDTH: 1px; BORDER-LEFT-COLOR: #cccccc; BORDER-BOTTOM-WIDTH: 1px; BORDER-BOTTOM-COLOR: #cccccc; PADDING-BOTTOM: 1px; BORDER-TOP-COLOR: #cccccc; PADDING-TOP: 1px; HEIGHT: 18px; BORDER-RIGHT-WIDTH: 1px; BORDER-RIGHT-COLOR: #cccccc;
}
-->
</style>
</head>

<body>
<form enctype="multipart/form-data" method="post" name="upform">
  <input name="upfile" type="file">
  <input type="submit" value="�ϴ�ͼƬ">
  <br>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (!is_uploaded_file($_FILES["upfile"][tmp_name]))
    //�Ƿ�����ļ�
    {
         echo "<script language='javascript'>alert('�ļ������ڣ�');history.go(-1);</script>";
         exit;
    }

    $file = $_FILES["upfile"];
    if($max_file_size < $file["size"])
    //����ļ���С
    {
        echo "<script language='javascript'>alert('�ļ�����');history.go(-1)</script>";
        exit;
    }

    if(!in_array($file["type"], $uptypes))
    //����ļ�����
    {
        echo "<script language='javascript'>alert('�ļ����ʹ���');history.go(-1)</script>";
        exit;
    }

    if(!file_exists($destination_folder))
    {
        mkdir($destination_folder);
    }

    $filename=$file["tmp_name"];
    $image_size = getimagesize($filename);
    $pinfo=pathinfo($file["name"]);
    $ftype=$pinfo['extension'];
    $destination = $destination_folder.date("Ymdhms").".".$ftype;
    if (file_exists($destination) && $overwrite != true)
    {
        echo "<script language='javascript'>alert('ͬ���ļ��Ѿ������ˣ�');history.go(-1)</script>";
        exit;
    }

    if(!move_uploaded_file ($filename, $destination))
    {
        echo "<script language='javascript'>alert('�Ƴ��ļ�����');history.go(-1)</script>";
        exit;
    }

    $pinfo=pathinfo($destination);
    $fname=$pinfo[basename];
	echo "<script>parent.document.getElementById('".$_REQUEST["inputurl"]."').value='".$destination."';</script>";//�ļ��ϴ�ʱ�����·��
    if($watermark==1)
    {
        $iinfo=getimagesize($destination,$iinfo);
        $nimage=imagecreatetruecolor($image_size[0],$image_size[1]);
        $white=imagecolorallocate($nimage,255,255,255);
        $black=imagecolorallocate($nimage,0,0,0);
        $red=imagecolorallocate($nimage,255,0,0);
        imagefill($nimage,0,0,$white);
        switch ($iinfo[2])
        {
            case 1:
            $simage =imagecreatefromgif($destination);
            break;
            case 2:
            $simage =imagecreatefromjpeg($destination);
            break;
            case 3:
            $simage =imagecreatefrompng($destination);
            break;
            case 6:
            $simage =imagecreatefromwbmp($destination);
            break;
            default:
            die("��֧�ֵ��ļ�����");
            exit;
        }

        imagecopy($nimage,$simage,0,0,0,0,$image_size[0],$image_size[1]);
        imagefilledrectangle($nimage,1,$image_size[1]-15,80,$image_size[1],$white);

        switch($watertype)
        {
            case 1:   //��ˮӡ�ַ���
            imagestring($nimage,2,3,$image_size[1]-15,$waterstring,$black);
            break;
            case 2:   //��ˮӡͼƬ
            $simage1 =imagecreatefromgif("logo.png");
            imagecopy($nimage,$simage1,0,0,0,0,85,15);
            imagedestroy($simage1);
            break;
        }

        switch ($iinfo[2])
        {
            case 1:
            //imagegif($nimage, $destination);
            imagejpeg($nimage, $destination);
            break;
            case 2:
            imagejpeg($nimage, $destination);
            break;
            case 3:
            imagepng($nimage, $destination);
            break;
            case 6:
            imagewbmp($nimage, $destination);
            //imagejpeg($nimage, $destination);
            break;
        }

        //����ԭ�ϴ��ļ�
        imagedestroy($nimage);
        imagedestroy($simage);
    }



}
?>
</body>
