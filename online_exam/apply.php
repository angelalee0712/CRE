<style type="text/css">
.1 {
	border: 1px solid #0F0;
}
</style>

<table width="500" border="0" align="center">
  <tr>
    <td height="40" align="center" colspan="2">���Լ�ʱ:</td>
    <td>ʣ��ʱ��</td>
  </tr>
  <tr>
    <td align="center" colspan="3">�Ծ�����:<?php echo $_POST['title'];?></td>
  </tr>
  <?php 
  session_start();
     include("conn.php");
    mysql_query("set names gbk");
     $title=$_POST["title"];
     $query=mysql_query("SELECT *  from suminfo where title='$title'");
     
     $myrow=mysql_fetch_array($query);
  ?>
  <tr>
    <td height="40" align="center">�ܷ�:<?php echo $myrow['sumscore'];?></td>
    <td align="center">�����:<?php echo $myrow['okscore'];?></td>
    <td align="center">����ʱ��:<?php echo $myrow['time'];?></td>
  </tr>
  <tr>
    <td height="40" align="center" colspan="2">ѡ����</td>
    <td align="center">Ӧ����</td>
  </tr>
</table>

<form id="form" name="form" method="post" action="judge2.php">
<?php 
    include("conn.php");
    mysql_query("set names gbk");
     $grade=$_SESSION["grade"];
   
     $style=$_SESSION["style"];
     $subject=$_SESSION["subject"];
     $title=$_SESSION["title"];
     $query=mysql_query("SELECT suminfo.title,suminfo.grade,suminfo.style,suminfo.subject,exam.*  from suminfo,exam where suminfo.sumid=exam.sumid and grade='$grade' and style='$style' and subject='$subject' and title='$title' and ischoice='����'");
     
     $myrow=mysql_fetch_array($query);
     $x=1;
     
     if($myrow == true)
		    {
   				do
   				{
   				
   
?>
<table class="1" width="960">
<tr>
    <td height="40" width="600">
    <?php
     
    echo $x.".".$myrow['content'];
    
     ?>
    </td>
    <td width="100"><?php echo $myrow['score']."��"; ?></td>
    <td width="260"></td>
  </tr>
 
  <tr>
    <td height="40" >
  
    
     <label for="anwser"></label>
     <textarea name="anwser" id="anwser" cols="45" rows="5"></textarea>
    </td>
 
   <td width="260"></td>
  </tr>
		


</table>
<?php 
   				$x++;
?>
&nbsp;		
<?php 
		    }while ($myrow=mysql_fetch_array($query));
		    
		    }
?>
<table  border="0" width="100%">
<tr>
<td></td>
<td align="center"><input type="submit" name="button" id="button" value="�ύ" /></td>
</tr>
</table>
</form>




