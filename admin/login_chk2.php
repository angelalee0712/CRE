<?php
    header("Content-type:text/html; charset=GBK");
   session_start();
   $conn=mysql_connect("localhost","root","") or die("���Ӵ���!");
   mysql_select_db("db_cct",$conn);
    	mysql_query("SET NAMES GBK");
    	$adminname=$_POST['name'];
    	
        $pass=$_POST['pass'];
   
    	$sqltest="select * from admin where adminname='$adminname' and adminpass='$pass'";
    	   	
    	$testrst=mysql_query($sqltest); 
        $test=mysql_fetch_array($testrst);
    	
    	if($test){  
    		
     				echo "<script>alert('��¼�ɹ���');window.location.href='index.php';</script>";
     				return;
    			}

    	
    	else{//!$testrst->EOF
    			echo "<script>alert('�û������������');history.go(-1);</script>";
    			return;
    		}
    	
    
?>

