<?php
   header("Content-type:text/html;charset=gbk");
   session_start();
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