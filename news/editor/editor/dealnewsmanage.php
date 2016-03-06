<?php
    header("Content-type:text/html;charset=gbk");
    $conn=mysql_connect("localhost","root","") or die("连接错误!");
   mysql_select_db("db_cct",$conn);
    $submit=$_POST["submit"];
    $delete=$_POST["delete"];
    
   
    if($submit=="修改"){
    	mysql_query("set names gbk");
    
    $title=$_POST["title"];
  
  
   	$resource=$_POST["resource"];
   	
   	$keywords=$_POST["keywords"];
 
   	$content=$_POST["content"];
   	
   	$sumid=$_POST["id"];
   
    $id=$_POST["id2"];
    
    	$query1=mysql_query("update suminfo set title='$title' where sumid='$sumid'");
    	$query2=mysql_query("update news set resource='$resource',keywords='$keywords', content='$content' where id='$id'");
        if($query1 and $query2){
    	   echo "<script>alert('新闻修改成功!');window.location.herf='newsmanage.php';</script>";
        }else{
    	   echo "<script>alert('请您正确登录!');window.location.herf='./login.php';</script>";
        }
    }
    
    if($_POST['delete']=="删除"){
    	$query1=mysql_query("delete from suminfo where sumid=$sumid");
    	$query2=mysql_query("delete from news where id=$id");
        if($query1 and $query2 ){
    	  echo "<script>alert('新闻删除成功!');window.location.herf='newsmanage.php';</script>";
       }else{
    	  echo "<script>alert('请您正确登录!');window.location.herf='./login.php';</script>";
       }
    	
    }
    
?>
