<?php 
$uploaddir = "upfiles/";//�����ļ�����Ŀ¼ ע�����/ 
$type=array("jpg","gif","bmp","jpeg","png","");//���������ϴ��ļ������� 
$patch="upload/";//��������·�� 

//��ȡ�ļ���׺������ 
function fileext($filename) 
{ 
return substr(strrchr($filename, '.'), 1); 
} 
//��������ļ������� 
function random($length) 
{ 
$hash = 'CR-'; 
$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz'; 
$max = strlen($chars) - 1; 
mt_srand((double)microtime() * 1000000); 
for($i = 0; $i < $length; $i++) 
{ 
$hash .= $chars[mt_rand(0, $max)]; 
} 
return $hash; 
} 

$a=strtolower(fileext($_FILES['file']['name'])); 
//�ж��ļ����� 
if(!in_array(strtolower(fileext($_FILES['file']['name'])),$type)) 
{ 
$text=implode(",",$type); 
echo "��ֻ���ϴ����������ļ�: ",$text,"<br>"; 
} 
//����Ŀ���ļ����ļ��� 
else{ //�ű�ѧ�� http://www.jbxue.com
$filename=explode(".",$_FILES['file']['name']); 
do 
{ 
$filename[0]=random(10); //������������� 
$name=implode(".",$filename); 
//$name1=$name.".Mcncc"; 
$uploadfile=$uploaddir.$name; 
} 

while(file_exists($uploadfile)); 

if (move_uploaded_file($_FILES['file']['tmp_name'],$uploadfile)) 
{ 
if(is_uploaded_file($_FILES['file']['tmp_name'])) 
{ 

echo "�ϴ�ʧ��!"; 
} 
else 
{//���ͼƬԤ�� 
echo "<center>�����ļ��Ѿ��ϴ���� �ϴ�ͼƬԤ��: </center><br><center><img src='$uploadfile'></center>"; 
echo "<br><center><a href='upload.htm'>�����ϴ�</a></center>"; 
} 
} 

} 
?> 