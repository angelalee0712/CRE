<?php
    header("Content-type:text/html;charset=gbk");
    include("../conn.php");
    $submit=$_POST["submit"];
    $delete=$_POST["delete"];
    
   
    if($submit=="�޸�"){
    	mysql_query("set names gbk");
    
    $title=$_POST["title"];
  
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
   	$sumid=$_POST["id"];
    $paperid=$_POST["id2"];
    	$query1=mysql_query("update suminfo set title='$title',grade='$grade',style='$style',subject='$subject' where sumid='$sumid'");
    	$query2=mysql_query("update exam set score='$score',paperstyle='$paperstyle',ischoice='$ischoice',papernum='$papernum', content='$content', anwser='$anwser' ,rightanwser='$rightanwser' where paperid='$paperid'");
        if($query1 and $query2){
    	   echo "<script>alert('�����޸ĳɹ�!');history.go(-1);</script>";
        }else{
    	   echo "<script>alert('������ȷ��¼!');history.go(-1);</script>";
        }
    }
    
    if($_POST['delete']=="ɾ��"){
    	$query1=mysql_query("delete from suminfo where sumid=$sumid");
    	$query2=mysql_query("delete from exam where suminfo.`sumid`=exam.`sumid`");
        if($query1 and $query2 and $query3){
    	  echo "<script>alert('����ɾ���ɹ�!');history.go(-1);</script>";
       }else{
    	  echo "<script>alert('������ȷ��¼!');history.go(-1);</script>";
       }
    	
    }
    
?>