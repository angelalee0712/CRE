<?php
    header("Content-type:text/html; charset=GBK");
   session_start();
   $conn=mysql_connect("localhost","root","") or die("���Ӵ���!");
   mysql_select_db("db_cct",$conn);
    	mysql_query("SET NAMES GBK");
    	$username=$_POST['username'];
    	
        $pass=$_POST['pass'];
   
    	$sqltest="select * from tb_user where username='$username' and userpassword='$pass'";
    	   	
    	$testrst=mysql_query($sqltest); 
        $test=mysql_fetch_array($testrst);
    	
    	if($test){  
    		$_SESSION["id"]=$test['id'];
    	
    				$_SESSION["username"]=$test['username'];
    				
    				
    				$logindate=date("Y-m-d");
    				$logincount=$test['userlastlogincount'];
    				$logincount++;
    				$sqlstrud="update tb_user set userlastlogincount=$logincount,userlastlogindate='$logindate'
     						where id=$_SESSION[id]";
     				mysql_query($sqlstrud);
     				echo "<script>alert('��¼�ɹ���');window.location.href='release/index.php'</script>";
     			
     				return;
    			}

    	
    	else{//!$testrst->EOF
    			echo "<script>alert('�û������������');history.go(-1);</script>";
    			return;
    		}
    	
    
?>

