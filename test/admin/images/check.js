function CheckAll(form){
 	for (var i=0;i<form.elements.length;i++)
    {
    var e = form.elements[i];
    if (e.Name != "chkAll"&&e.disabled==false)
       e.checked = form.chkAll.checked;
    }
}
function subdel(SoftID)
{
	  var a = document.getElementsByName(SoftID);
	  var n = 0;i=0;
	  for (i=0;i<a.length;i++)
	  {
		  if (a[i].checked==true) n++;
	   }
	  if (n==0){
		  alert("��ѡ��Ҫɾ������!");
		  return false;
	  }
	  if (!confirm("ȷ��Ҫ����"+n+"�������������?"))return false;
	
}


var xmlHttp;
function createXmlHttp()
{
    if(window.XMLHttpRequest)
    {
        xmlHttp=new XMLHttpRequest();
    }
    else if(window.ActiveXObject)
    {
        try
        {
            xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch(e)
        {}
        try
        {
            xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch(e)
        {}
        if(!xmlHttp)
        {
            alert("����XMLHttpRequest����ʧ�ܣ�");
            return false;
        }
    }
}