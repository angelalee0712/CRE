<?php 
   include("conn.php");
   mysql_query("set names gbk");
   $name=$_POST['username'];
   $query=mysql_query("select * from tb_user where username='$name'");
   $myarr=mysql_fetch_array($query);

?>
<form id="form" name="form" method="post" action="">
<table>
  <tr>
     <td>�����ܱ����⣺<?php echo $myarr['userquestion']; ?></td>
  </tr>
  <tr>
    <td>
         <label for="username"></label>
      <input type="text" name="anwser" id="anwser" />
    </td>
    <td>
       <input type="submit" name="submit" id="submit" value="�ύ" />
    </td>
  </tr>
</table>
</form>
<?php 
include("conn.php");

   $anwser=$_POST['anwser'];
   $result=strcmp($anwser,$myarr['useranwser']);
   
   if($result==0){
   	  echo "<script>alert('����ش���ȷ��');window.location.herf='fixpasscheck.php'</script>";
   }
   else{
   	  echo "<script>alert('����ش����');history.go(-1)</script>";
   }
?>