<?php

      include 'conn.php';
      mysql_query("set names 'GBK'");
     $username=$_POST["username"];
       
    
     mysql_query("set names 'GBK'");
     $sql=mysql_query("select * from tb_user where userName='".$username."'");
     $myarr=mysql_fetch_array($sql);
     
     if(mysql_num_rows($sql)==1){
	   	echo "<script>alert('对不起，用户名已存在！');history.back();</script>";
		return ;
     }
     $ip=$_SERVER["REMOTE_ADDR"];     //
     $logindate=date("Y-m-d");
     $sqltoex = "insert into tb_user(username,userpassword,userlastlogindate) values('$username','".$_POST['userpassword']."','$logindate')";
     mysql_query("SET NAMES GBK");	//
     if(mysql_query($sqltoex,$conn))
     {
    
     	$_SESSION["username"]=$username;        //
     	echo "<script>alert('注册成功');window.location.href='login.php'</script>";
     	
     }else{
     	echo "<script>alert('注册失败');history.back();</script>";
     }
        
?>