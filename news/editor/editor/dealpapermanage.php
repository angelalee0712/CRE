<?php
    header("Content-type:text/html;charset=gbk");
    $conn=mysql_connect("localhost","root","") or die("���Ӵ���!");
   mysql_select_db("db_cct",$conn);
    $submit=$_POST["submit"];
    $delete=$_POST["delete"];
    
   
    if($submit=="�޸�"){
    	mysql_query("set names gbk");
    
    $title=$_POST["title"];
  
   	$grade=$_POST["grade"];
   	$style=$_POST["style"];
   	$subject=$_POST["subject"];
   	$resource=$_POST["resource"];
   	
   	$keywords=$_POST["keywords"];
   	$ischoice=$_POST["ischoice"];
   	$papernum=$_POST["papernum"];
   	$content=$_POST["content"];
   	$anwser=$_POST["anwser"];
   	$question=$_POST["question"];
   	$rightanwser=$_POST["rightanwser"];
   	$sumid=$_POST["id"];
    $id=$_POST["id2"];
   
    	$query1=mysql_query("update suminfo set title='$title',grade='$grade',style='$style',subject='$subject' where sumid='$sumid'");
    	$query2=mysql_query("update paper set resource='$resource',keywords='$keywords',content='$content' where id='$id'");
        if($query1 and $query2){
    	   echo "<script>alert('�����޸ĳɹ�!');window.location.herf='manageindex.php';</script>";
        }else{
    	   echo "<script>alert('������ȷ��¼!');window.location.herf='./login.php';</script>";
        }
    }
    
    if($_POST['delete']=="ɾ��"){
    	$query1=mysql_query("delete from suminfo where sumid=$sumid");
    	$query2=mysql_query("delete from exam where suminfo.`sumid`=exam.`sumid`");
        if($query1 and $query2 and $query3){
    	  echo "<script>alert('����ɾ���ɹ�!');window.location.herf='manageindex.php';</script>";
       }else{
    	  echo "<script>alert('������ȷ��¼!');window.location.herf='./login.php';</script>";
       }
    	
    }
    
?>