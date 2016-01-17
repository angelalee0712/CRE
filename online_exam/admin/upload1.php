<?php
header("Content-type:text/html; charset=GBK");
/******************************************************************************

参数说明:
$max_file_size  : 上传文件大小限制, 单位BYTE
$destination_folder : 上传文件路径
$watermark   : 是否附加水印(1为加水印,其他为不加水印);

使用说明:
1. 将PHP.INI文件里面的"extension=php_gd2.dll"一行前面的;号去掉,因为我们要用到GD库;
2. 将extension_dir =改为你的php_gd2.dll所在目录;
******************************************************************************/

//上传文件类型列表
$uptypes=array(
    'image/jpg',
    'image/jpeg',
    'image/png',
    'image/pjpeg',
    'image/gif',
    'image/bmp',
    'image/x-png'
);

$max_file_size=2000000;     //上传文件大小限制, 单位BYTE
$destination_folder="E:/wamp/www/upload/"; //上传文件路径
$watermark=1;      //是否附加水印(1为加水印,其他为不加水印);
$watertype=1;      //水印类型(1为文字,2为图片)
$waterposition=1;     //水印位置(1为左下角,2为右下角,3为左上角,4为右上角,5为居中);
$waterstring="http://www.xplore.cn/";  //水印字符串
$waterimg="xplore.gif";    //水印图片
$imgpreview=1;      //是否生成预览图(1为生成,其他为不生成);
$imgpreviewsize=1/2;    //缩略图比例
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>无标题文档</title>
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
  <div id="position">您所在的位置：后台》》文件上传</div>
  <div id="canshu">
  <form id="form2" name="form2" method="post" action="">
    <table width="100%" border="0">
      <tr>
        <td height="32" colspan="3">文件格式：
          <input type="radio" name="radio" id="picture" value="picture" />
        <label for="picture">图片&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; 
          <input type="radio" name="radio" id="flash" value="flash" />
        视频&nbsp; &nbsp;   &nbsp;   &nbsp;   &nbsp;  &nbsp;  &nbsp;   &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp; 
        <input type="radio" name="radio" id="file" value="file" />
        </label>
        压缩文件</td>
      </tr>
      <tr>
        <td>文件名称：
          <label for="title"></label>
        <input type="text" name="title" id="title" /></td>
        <td height="24">来源：
          <label for="resource"></label>
        <input type="text" name="resource" id="resource" /></td>
        <td height="24">关键字：
          <label for="keywords"></label>
        <input type="text" name="keywords" id="keywords" /></td>
      </tr>
      <tr>
        <td>级别：&nbsp;&nbsp; <label for="grade"></label>
        <input type="text" name="grade" id="grade" /></td>
        <td height="26">类型：
          <label for="style"></label>
        <input type="text" name="style" id="style" /></td>
        <td height="26">科目：&nbsp; <label for="subject"></label>
        <input type="text" name="subject" id="subject" /></td>
      </tr>
      <tr>
        <td height="28" colspan="3">说明：以下参数对应的文件格式为&ldquo;图片&rdquo;，其他格式不必填写</td>
      </tr>
      <tr>
        <td height="31">出版社：
          <label for="width"></label>
        <input type="text" name="width" id="width" /></td>
        <td>出版时间：
          <label for="height"></label>
        <input type="text" name="publisher" id="publisher" /></td>
        <td>友情链接：
          <label for="time"></label>
        <input type="text" name="link" id="link" /></td>
      </tr>
      <tr>
        <td height="33" colspan="3">说明：
          <label for="count">以下参数对应的文件格式为&ldquo;视频&rdquo;，其他格式不必填写</label></td>
      </tr>
      <tr>
        <td height="33" colspan="3">播放时长：
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
  上传文件：
  <input name="upfile" type="file">
  <input type="submit" value="上传"><br>
  允许上传的文件类型为：<?=implode(', ',$uptypes)?>
        </form>
  </div>
 
  <p>&nbsp;</p>
</div>



<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (!is_uploaded_file($_FILES["upfile"][tmp_name]))
    //是否存在文件
    {
         echo "图片不存在!";
         exit;
    }

    $file = $_FILES["upfile"];
    if($max_file_size < $file["size"])
    //检查文件大小
    {
        echo "文件太大!";
        exit;
    }

    if(!in_array($file["type"], $uptypes))
    //检查文件类型
    {
        echo "文件类型不符!".$file["type"];
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
        echo "同名文件已经存在了";
        exit;
    }

    if(!move_uploaded_file ($filename, $destination))
    {
        echo "移动文件出错";
        exit;
    }

    $pinfo=pathinfo($destination);
    $fname=$pinfo[basename];
    echo " <font color=red>已经成功上传</font><br>文件名:  <font color=blue>".$destination_folder.$fname."</font><br>";
    echo " 宽度:".$image_size[0];
    echo " 长度:".$image_size[1];
    echo "<br> 大小:".$file["size"]." bytes";

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
            die("不支持的文件类型");
            exit;
        }

        imagecopy($nimage,$simage,0,0,0,0,$image_size[0],$image_size[1]);
        imagefilledrectangle($nimage,1,$image_size[1]-15,80,$image_size[1],$white);

        switch($watertype)
        {
            case 1:   //加水印字符串
            imagestring($nimage,2,3,$image_size[1]-15,$waterstring,$black);
            break;
            case 2:   //加水印图片
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

        //覆盖原上传文件
        imagedestroy($nimage);
        imagedestroy($simage);
    }

    if($imgpreview==1)
    {
    echo "<br>图片预览:<br>";
    echo "<img src=\"".$destination."\" width=".($image_size[0]*$imgpreviewsize)." height=".($image_size[1]*$imgpreviewsize);
    echo " alt=\"图片预览:\r文件名:".$destination."\r上传时间:\">";
    }
}
?>
</body>
</html>


<?php 
    //以下是上传按钮提交后的处理工作
    $conn=mysql_connect("localhost","root","") or die("连接错误!");
   mysql_select_db("db_cct",$conn);
    mysql_query("set names gbk");
    $grade=$_POST["grade"];
   
     $style=$_POST["style"];
     $subject=$_POST["subject"];
     $title=$_POST["title"];
     $resource=$_POST["resource"];
     $keywords=$_POST["keywords"];
    if($_POST['radio']=="图片"){//如果上传文件格式为图片
     $publisher=$_POST["publisher"];
     $publishtime=$_POST["publishtime"];
     $link=$_POST["link"];
     $query1=mysql_query("insert into suminfo(title,grade,style,subject) values('$title','$grade','$style','$subject')");
     $sumid=mysql_insert_id($conn);
     $query2=mysql_query("insert into referbook(sumid,resource,keywords,publisher,publishtime,link,path) values('$sumid','$resource','$keywords','$publisher','$publishtime','$link','$destination')");
    if($query1 and $query2){
    		echo "<script>alert('数据库更新成功!');history.go(-1);</script>";
    	}
    	else{
    		echo "<script>alert('数据库更新失败!');history.go(-1);</script>";
    	}
     
     
    }
    else if($_POST['radio']=="视频"){
    	
    	$time=$_POST["time"];
     $query1=mysql_query("insert into suminfo(title,grade,style,subject) values('$title','$grade','$style','$subject')");
     $sumid=mysql_insert_id($conn);
     $query2=mysql_query("insert into video(sumid,resource,keywords,form,time,path) values('$sumid','$resource','$keywords','$ftype','$time','$destination')");
    if($query1 and $query2){
    		echo "<script>alert('数据库更新成功!');history.go(-1);</script>";
    	}
    	else{
    		echo "<script>alert('数据库更新失败!');history.go(-1);</script>";
    	}
     
     
    }
    else if($_POST['radio']=="压缩文件"){
    	
    	
     $query1=mysql_query("insert into suminfo(title,grade,style,subject) values('$title','$grade','$style','$subject')");
     $sumid=mysql_insert_id($conn);
     $query2=mysql_query("insert into paper(sumid,resource,path) values('$sumid','$resource','$keywords','$destination')");
    if($query1 and $query2){
    		echo "<script>alert('数据库更新成功!');history.go(-1);</script>";
    	}
    	else{
    		echo "<script>alert('数据库更新失败!');history.go(-1);</script>";
    	}
     
     
    }
?>

