<?php

      include 'conn.php';
      mysql_query("set names 'GBK'");
     $username=$_POST["username"];
       
    
     mysql_query("set names 'GBK'");
     $sql=mysql_query("select * from tb_user where userName='".$username."'");
     $myarr=mysql_fetch_array($sql);
     
     if(mysql_num_rows($sql)==1){
	   	echo "<script>alert('�Բ����û����Ѵ��ڣ�');history.back();</script>";
		return ;
     }
     $ip=$_SERVER["REMOTE_ADDR"];     //
     $logindate=date("Y-m-d");
     $sqltoex = "insert into tb_user(username,userpassword,userlastlogindate) values('$username','".$_POST['userpassword']."','$logindate')";
     mysql_query("SET NAMES GBK");	//
     if(mysql_query($sqltoex,$conn))
     {
    
     	$_SESSION["username"]=$username;        //
     	echo "<script>alert('ע��ɹ�');window.location.href='login.php'</script>";
     	
     }else{
     	echo "<script>alert('ע��ʧ��');history.back();</script>";
     }
        
?>