<?php
header("Content-type:text/html; charset=GBK");
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
$destination_folder="E:/wamp/www/upload/"; //�ϴ��ļ�·��
$watermark=1;      //�Ƿ񸽼�ˮӡ(1Ϊ��ˮӡ,����Ϊ����ˮӡ);
$watertype=1;      //ˮӡ����(1Ϊ����,2ΪͼƬ)
$waterposition=1;     //ˮӡλ��(1Ϊ���½�,2Ϊ���½�,3Ϊ���Ͻ�,4Ϊ���Ͻ�,5Ϊ����);
$waterstring="http://www.xplore.cn/";  //ˮӡ�ַ���
$waterimg="xplore.gif";    //ˮӡͼƬ
$imgpreview=1;      //�Ƿ�����Ԥ��ͼ(1Ϊ����,����Ϊ������);
$imgpreviewsize=1/2;    //����ͼ����
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>�ޱ����ĵ�</title>
<style type="text/css">
#contain {
	margin: auto;
	padding: 10px;
	clear: both;
	width: 950px;
}
#position {
	height: 30px;
	width: 950px;
}
#canshu {
	margin: auto;
	clear: both;
	width: 950px;
}
#upload1 {
	margin: auto;
	clear: both;
	width: 950px;
}
</style>
</head>

<body>
<div id="contain">
  <div id="position">�����ڵ�λ�ã���̨�����ļ��ϴ�</div>
  <div id="canshu">
  <form id="form2" name="form2" method="post" action="">
    <table width="100%" border="0">
      <tr>
        <td height="32" colspan="3">�ļ���ʽ��
          <input type="radio" name="radio" id="picture" value="picture" />
        <label for="picture">ͼƬ&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; 
          <input type="radio" name="radio" id="flash" value="flash" />
        ��Ƶ&nbsp; &nbsp;   &nbsp;   &nbsp;   &nbsp;  &nbsp;  &nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; 
        <input type="radio" name="radio" id="file" value="file" />
        </label>
        ѹ���ļ�</td>
      </tr>
      <tr>
        <td>�ļ����ƣ�
          <label for="title"></label>
        <input type="text" name="title" id="title" /></td>
        <td height="24">��Դ��
          <label for="resource"></label>
        <input type="text" name="resource" id="resource" /></td>
        <td height="24">�ؼ��֣�
          <label for="keywords"></label>
        <input type="text" name="keywords" id="keywords" /></td>
      </tr>
      <tr>
        <td>����&nbsp;&nbsp; <label for="grade"></label>
        <input type="text" name="grade" id="grade" /></td>
        <td height="26">���ͣ�
          <label for="style"></label>
        <input type="text" name="style" id="style" /></td>
        <td height="26">��Ŀ��&nbsp; <label for="subject"></label>
        <input type="text" name="subject" id="subject" /></td>
      </tr>
      <tr>
        <td height="28" colspan="3">˵�������²�����Ӧ���ļ���ʽΪ&ldquo;ͼƬ&rdquo;��������ʽ������д</td>
      </tr>
      <tr>
        <td height="31">�����磺
          <label for="width"></label>
        <input type="text" name="width" id="width" /></td>
        <td>����ʱ�䣺
          <label for="height"></label>
        <input type="text" name="publisher" id="publisher" /></td>
        <td>�������ӣ�
          <label for="time"></label>
        <input type="text" name="link" id="link" /></td>
      </tr>
      <tr>
        <td height="33" colspan="3">˵����
          <label for="count">���²�����Ӧ���ļ���ʽΪ&ldquo;��Ƶ&rdquo;��������ʽ������д</label></td>
      </tr>
      <tr>
        <td height="33" colspan="3">����ʱ����
          <label for="time2"></label>
        <input type="text" name="time" id="time2" /></td>
      </tr>
      <tr>
        <td height="33" colspan="3">&nbsp;</td>
      </tr>
    </table>
  </div>
  </form>
  <div id="upload1" align="center">
  <form enctype="multipart/form-data" method="post" name="upform">
  �ϴ��ļ���
  <input name="upfile" type="file">
  <input type="submit" value="�ϴ�"><br>
  �����ϴ����ļ�����Ϊ��<?=implode(', ',$uptypes)?>
        </form>
  </div>
 
  <p>&nbsp;</p>
</div>



<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (!is_uploaded_file($_FILES["upfile"][tmp_name]))
    //�Ƿ�����ļ�
    {
         echo "ͼƬ������!";
         exit;
    }

    $file = $_FILES["upfile"];
    if($max_file_size < $file["size"])
    //����ļ���С
    {
        echo "�ļ�̫��!";
        exit;
    }

    if(!in_array($file["type"], $uptypes))
    //����ļ�����
    {
        echo "�ļ����Ͳ���!".$file["type"];
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
    $destination = $destination_folder.time().".".$ftype;
    if (file_exists($destination) && $overwrite != true)
    {
        echo "ͬ���ļ��Ѿ�������";
        exit;
    }

    if(!move_uploaded_file ($filename, $destination))
    {
        echo "�ƶ��ļ�����";
        exit;
    }

    $pinfo=pathinfo($destination);
    $fname=$pinfo[basename];
    echo " <font color=red>�Ѿ��ɹ��ϴ�</font><br>�ļ���:  <font color=blue>".$destination_folder.$fname."</font><br>";
    echo " ���:".$image_size[0];
    echo " ����:".$image_size[1];
    echo "<br> ��С:".$file["size"]." bytes";

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
            $simage1 =imagecreatefromgif("xplore.gif");
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

    if($imgpreview==1)
    {
    echo "<br>ͼƬԤ��:<br>";
    echo "<img src=\"".$destination."\" width=".($image_size[0]*$imgpreviewsize)." height=".($image_size[1]*$imgpreviewsize);
    echo " alt=\"ͼƬԤ��:\r�ļ���:".$destination."\r�ϴ�ʱ��:\">";
    }
}
?>
</body>
</html>


<?php 
    //�������ϴ���ť�ύ��Ĵ�����
    $conn=mysql_connect("localhost","root","") or die("���Ӵ���!");
   mysql_select_db("db_cct",$conn);
    mysql_query("set names gbk");
    $grade=$_POST["grade"];
   
     $style=$_POST["style"];
     $subject=$_POST["subject"];
     $title=$_POST["title"];
     $resource=$_POST["resource"];
     $keywords=$_POST["keywords"];
    if($_POST['radio']=="ͼƬ"){//����ϴ��ļ���ʽΪͼƬ
     $publisher=$_POST["publisher"];
     $publishtime=$_POST["publishtime"];
     $link=$_POST["link"];
     $query1=mysql_query("insert into suminfo(title,grade,style,subject) values('$title','$grade','$style','$subject')");
     $sumid=mysql_insert_id($conn);
     $query2=mysql_query("insert into referbook(sumid,resource,keywords,publisher,publishtime,link,path) values('$sumid','$resource','$keywords','$publisher','$publishtime','$link','$destination')");
    if($query1 and $query2){
    		echo "<script>alert('���ݿ���³ɹ�!');history.go(-1);</script>";
    	}
    	else{
    		echo "<script>alert('���ݿ����ʧ��!');history.go(-1);</script>";
    	}
     
     
    }
    else if($_POST['radio']=="��Ƶ"){
    	
    	$time=$_POST["time"];
     $query1=mysql_query("insert into suminfo(title,grade,style,subject) values('$title','$grade','$style','$subject')");
     $sumid=mysql_insert_id($conn);
     $query2=mysql_query("insert into video(sumid,resource,keywords,form,time,path) values('$sumid','$resource','$keywords','$ftype','$time','$destination')");
    if($query1 and $query2){
    		echo "<script>alert('���ݿ���³ɹ�!');history.go(-1);</script>";
    	}
    	else{
    		echo "<script>alert('���ݿ����ʧ��!');history.go(-1);</script>";
    	}
     
     
    }
    else if($_POST['radio']=="ѹ���ļ�"){
    	
    	
     $query1=mysql_query("insert into suminfo(title,grade,style,subject) values('$title','$grade','$style','$subject')");
     $sumid=mysql_insert_id($conn);
     $query2=mysql_query("insert into paper(sumid,resource,path) values('$sumid','$resource','$keywords','$destination')");
    if($query1 and $query2){
    		echo "<script>alert('���ݿ���³ɹ�!');history.go(-1);</script>";
    	}
    	else{
    		echo "<script>alert('���ݿ����ʧ��!');history.go(-1);</script>";
    	}
     
     
    }
?>

