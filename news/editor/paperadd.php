<?php
    include('fckeditor.php');
  
    $conn=mysql_connect("localhost","root","") or die("连接错误!");
    mysql_select_db("db_cct",$conn);

    $sBasePath=$_SERVER['PHP_SELF'];
    $sBasePath=dirname($sBasePath).'/';
    $editor=new FCKeditor('con');//窗口中输入的内容 
    $editor->BasePath=$sBasePath;
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>无标题文档</title>
<link href="style1.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#container {
	margin: auto;
	padding: 10px;
	clear: both;
	width: 950px;
}
.auto{
	margin: auto;
	
	clear: both;
	width: 950px;
}
#position {
	height: 30px;
	width: 950px;
}
#main {
	margin: auto;
	clear: both;
	width: 950px;
}
#top {
	height: 90px;
	width: 950px;
}
#maincon {
	margin: auto;
	
	clear: both;
	width: 950px;
}
#news-content {
	height: 30px;
	width: 950px;
}
</style>
</head>

<body>
<div id="container">
  <div id="position">您现在的位置：后台首页&gt;&gt;新闻添加</div>
  <div id="main">
  <form id="form" name="form" method="post" action="">
  <div id="top" class="biankuang">
    <table width="100%" border="0">
      <tr>
        <td>标题：         
          <label for="01"></label>
          <input type="text" name="title" id="title" /></td>
        <td>关键字：         
          <label for="02"></label>
          <input type="text" name="keywords" id="keywords" /></td>
        <td>更新时间：         
          <label for="03"></label>
          <input type="text" name="updatetime" id="updatetime" /></td>
      </tr>
      <tr>
        <td>来源：
          <label for="04"></label>
          <input type="text" name="resource" id="resource" /></td>
        <td>级别：         
          <label for="05"></label>
          <input type="text" name="grade" id="grade" /></td>
          <td>类型：         
          <label for="06"></label>
          <input type="text" name="style" id="style" /></td>
          <td>科目：         
          <label for="07"></label>
          <input type="text" name="subject" id="subject" /></td>
      </tr>
      
    </table>
  </div>
  <div id="maincon">
    <div id="news-content" class="biankuang">详细内容</div>
    <?php
         $editor->Value='';
        $editor->Create();
    ?>
   
  </div>
  <table  width="100%" border="0">
    <tr>
      <td align="center" ><input type="submit" name="submit" id="submit" value="保存" /></td>
    </tr>
  </table>
    
  
  </div>
  <p>&nbsp;</p>
</div>
</form>
</body>
</html>
<?php 
    if($_POST[submit]){
    	mysql_query("set names gbk");
    	$title=$_POST["title"];
    	$keywords=$_POST["keywords"];
    	$resource=$_POST["resource"];
    	$updatetime=$_POST["updatetime"];
    	$grade=$_POST["grade"];
    	$style=$_POST["style"];
    	$subject=$_POST["subject"];
    	
    	$content=$_POST["con"];
    	$query1=mysql_query("insert into suminfo(title,updatetime,grade,style,subject) values('$title','$updatetime','$grade','$style','$subject')");
    	$sumid=mysql_insert_id($conn);
    	$query2=mysql_query("insert into paper(sumid,resource,keywords,content) values('$sumid','$resource','$keywords','$content')");
        if($query1 and $query2){
    		echo "<script>alert('试题添加成功!');history.go(-1);</script>";
    	}
    	else{
    		echo "<script>alert('试题添加失败!');history.go(-1);</script>";
    	}
    }
    
?>


    

