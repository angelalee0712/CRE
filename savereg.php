



<?php

$conn = mysql_connect("localhost", "root", "") or die("���Ӵ���!");

$db_selected = mysql_select_db("db_cct",$conn);
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
     $sqltoex = "insert into tb_user(userName,userPassword,userLastLoginDate) values('$username','".$_POST['userpassword']."','".$_POST["userlastlogindate"]."')";
     mysql_query("SET NAMES GBK");	//
     if(mysql_query($sqltoex,$conn))
     {
    
     	$_SESSION["unc"]=$username;        //
     	echo "<script>alert('ע��ɹ�');window.location.href='login.php'</script>";
     	
     }else{
     	echo "<script>alert('ע��ʧ��');history.back();</script>";
     }
    
     
?>