<style type="text/css">
.1 {
	border: 1px solid #0F0;
}
</style>

<table width="500" border="0" align="center">
  <tr>
    <td height="40" align="center" colspan="2">考试计时:</td>
    <td>剩余时间</td>
  </tr>
  <tr>
    <td align="center" colspan="3">试卷名称:<?php echo $_POST['title'];?></td>
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
    <td height="40" align="center">总分:<?php echo $myrow['sumscore'];?></td>
    <td align="center">及格分:<?php echo $myrow['okscore'];?></td>
    <td align="center">答题时间:<?php echo $myrow['time'];?></td>
  </tr>
  <tr>
    <td height="40" align="center" colspan="2">选择题</td>
    <td align="center">应用题</td>
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
     $query=mysql_query("SELECT suminfo.title,suminfo.grade,suminfo.style,suminfo.subject,exam.*  from suminfo,exam where suminfo.sumid=exam.sumid and grade='$grade' and style='$style' and subject='$subject' and title='$title' and ischoice='不是'");
     
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
    <td width="100"><?php echo $myrow['score']."分"; ?></td>
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
<td align="center"><input type="submit" name="button" id="button" value="提交" /></td>
</tr>
</table>
</form>




