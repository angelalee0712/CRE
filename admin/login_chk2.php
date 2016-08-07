<?php
    header("Content-type:text/html; charset=GBK");
   session_start();
   $conn=mysql_connect("localhost","root","") or die("连接错误!");
   mysql_select_db("db_cct",$conn);
    	mysql_query("SET NAMES GBK");
    	$adminname=$_POST['name'];
    	
        $pass=$_POST['pass'];
   
    	$sqltest="select * from admin where adminname='$adminname' and adminpass='$pass'";
    	   	
    	$testrst=mysql_query($sqltest); 
        $test=mysql_fetch_array($testrst);
    	
    	if($test){  
    		
     				echo "<script>alert('登录成功！');window.location.href='index.php';</script>";
     				return;
    			}

    	
    	else{//!$testrst->EOF
    			echo "<script>alert('用户名或密码错误');history.go(-1);</script>";
    			return;
    		}
    	
    
?>

