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
  
   	$subject=$_POST["subject"];
   	$score=$_POST["score"];
   	
   	$keywords=$_POST["keywords"];
   	$resource=$_POST["resource"];
   
   	$content=$_POST["content"];
   	
   	$sumid=$_POST["id"];
    $id=$_POST["id2"];
    
    	$query1=mysql_query("update suminfo set title='$title',grade='$grade',style='$style',subject='$subject' where sumid='$sumid'");
    	$query2=mysql_query("update outline set keywords='$keywords',resource='$resource', content='$content' where id='$id'");
        if($query1 and $query2){
    	   echo "<script>alert('����޸ĳɹ�!');window.location.herf='manageindex.php';</script>";
        }else{
    	   echo "<script>alert('������ȷ��¼!');window.location.herf='./login.php';</script>";
        }
    }
    
    if($_POST['delete']=="ɾ��"){
    	$query1=mysql_query("delete from suminfo where sumid=$sumid");
    	$query2=mysql_query("delete from outline where id=$id");
        if($query1 and $query2 and $query3){
    	  echo "<script>alert('���ɾ���ɹ�!');window.location.herf='manageindex.php';</script>";
       }else{
    	  echo "<script>alert('������ȷ��¼!');window.location.herf='./login.php';</script>";
       }
    	
    }
    
?>