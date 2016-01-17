<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>无标题文档</title>
<style type="text/css">
.container{
	margin:auto;
	padding:10px;
	clear:both;
	width:950px;
	}
#position {
	height: 30px;
	width: 950px;
}
#choice {
	height: 60px;
	width: 950px;
}
#c1 {
	height: 80px;
	width: 950px;
}
#c2 {
	height: 80px;
	width: 950px;
}
#c3 {
	height: 100px;
	width: 950px;
}
</style>
</head>

<body>
<div class="container">
  <div id="position">您所在的位置：</div>
  <form id="form" name="form" method="post" action="">
  <div id="choice">
    <table width="100%" border="0">
      <tr>
        <td width="17%" height="27">试题级别&nbsp;
          <label for="grade"></label>
          <select name="grade" id="grade">
            <option>一级</option>
            <option>二级</option>
            <option>三级</option>
            <option>四级</option>
          </select></td>
        <td width="20%">试题类型&nbsp;
          <label for="style"></label>
          <select name="style" id="style">
            <option>真题</option>
            <option>模拟题</option>
            <option>预测题</option>
            <option>经典试题</option>
          </select></td>
        <td width="21%">所属科目 
          <label for="subject"></label>
          <select name="subject" id="subject">
            <option>VB</option>
            <option>VC</option>
            <option>MS Office</option>
          </select></td>
        <td width="19%">试题题型 
          <label for="ischoice"></label>
          <select name="ischoice" id="ischoice">
            <option >单选题</option>
            <option >操作题</option>
          </select></td>
        <td width="23%">考试类型 
          <label for="paperstyle"></label>
          <select name="paperstyle" id="paperstyle">
            <option value="1">仿真模拟</option>
            <option value="0">每日一练</option>
          </select></td>
      </tr>
      </table>
    <table width="100%" border="0">
      <tr>
        <td>所属试卷名称 
          <label for="title"></label>
          <input type="text" name="title" id="title" /></td>
        <td>试题题号 
          <label for="papernum"></label>
          <input type="text" name="papernum" id="papernum" /></td>
        <td>试题分数 
          <label for="score"></label>
          <input type="text" name="score" id="score" /></td>
      </tr>
    </table>
  </div>
  
  
  </tr>
  <div id="c1">
    <table width="100%" border="0">
      <tr>
        <td width="23%">试题内容</td>
        <td width="74%"><label for="content"></label>
          <textarea name="content" id="content" cols="45" rows="5"></textarea></td>
        <td width="3%">&nbsp;</td>
      </tr>
    </table>
  </div>
  <div id="c2">
    <table width="100%" border="0">
      <tr>
        <td width="23%">试题答案</td>
        <td width="54%"><label for="anwser"></label>
          <textarea name="anwser" id="anwser" cols="45" rows="5"></textarea></td>
        <td width="23%">答案之间请用*分隔</td>
      </tr>
    </table>
  </div>
  <div id="c3">
    <table width="100%" border="0">
      <tr>
        <td width="23%">正确答案</td>
        <td width="74%"><label for="rightanwser"></label>
          <textarea name="rightanwser" id="rightanwser" cols="45" rows="5"></textarea></td>
        <td width="3%">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;&nbsp; &nbsp;   <input type="submit" name="submit" id="submit" value="添加试题" /></td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </div>
  <p>&nbsp;</p>
  </form>
  <p>&nbsp;</p>
</div>
</body>
</html>


<?php
   
  
   include("../conn.php");
   if($_POST['submit']=="添加试题"){
   	mysql_query("set names gbk");
   	$title=$_POST["title"];
   	echo $title;
   	$grade=$_POST["grade"];
   	$style=$_POST["style"];
   	$subject=$_POST["subject"];
   	$score=$_POST["score"];
   	
   	$paperstyle=$_POST["paperstyle"];
   	$ischoice=$_POST["ischoice"];
   	$papernum=$_POST["papernum"];
   	$content=$_POST["content"];
   	$anwser=$_POST["anwser"];
   	$question=$_POST["question"];
   	$rightanwser=$_POST["rightanwser"];
    $query1=mysql_query("INSERT INTO suminfo(title,grade,style,subject) VALUES('$title','$grade','$style','$subject')");
    
    $sumid=mysql_insert_id($conn);
    
    $query2=mysql_query("INSERT INTO exam(sumid,score,paperstyle,papernum,content,anwser,rightanwser) VALUES('$sumid','$score','$paperstyle','$papernum','$content','$anwser','$rightanwser') ");
    
   	if($query1 and $query2 ){
   		echo "<script>alert('试题添加成功!');window.location.href='addindex.php';</script>";
   	}
     else{
   	     echo "<script>alert('试题添加失败!');window.location.href='addindex.php';</script>";
     }
   }
?>
