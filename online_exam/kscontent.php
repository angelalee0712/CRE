<?php 
   include '../conn.php';
		        mysql_query("set names gbk");
		      $id=$_GET['id'];
		     $query=mysql_query("SELECT paper.*,suminfo.title,suminfo.grade,suminfo.style,suminfo.subject FROM suminfo,paper where suminfo.sumid=paper.sumid and suminfo.sumid=$id ");
		     $myrow=mysql_fetch_array($query);
		     ?>
<table width="500" border="0" align="center">
  <tr>
    <td height="40" align="center" colspan="2">���Լ�ʱ:</td>
    <td>ʣ��ʱ��</td>
  </tr>
  <tr>
    <td align="center" colspan="3">�Ծ�����:<?php echo $myrow['title'];?></td>
  </tr>
  
  <tr>
    <td height="40" align="center">�ܷ�:120</td>
    <td align="center">�����:75</td>
    <td align="center">����ʱ��:120����</td>
  </tr>
  
</table>

<table align="center" bgcolor="#00FF00" width="100">
  <tr>
      <td align="center">ѡ���ⲿ��</td>
  </tr>
</table>
<form id="form" name="form" method="post" action="judge.php">
<?php 
    include("../conn.php");
    mysql_query("set names gbk");
     $grade=$myrow['grade'];
   
     $style=$myrow['style'];
     $subject=$myrow['subject'];
     $title=$myrow['title'];
     $query=mysql_query("SELECT suminfo.title,suminfo.grade,suminfo.style,suminfo.subject,paper.*  from suminfo,paper where suminfo.sumid=paper.sumid and grade='$grade' and style='$style' and subject='$subject' and title='$title' and ischoice='��'");
     
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
  <?php 
      $array=explode("*",$myrow['answer']);
      
  ?>
  <tr>
    <td height="40" >
    <?php
    for($a=0;$a<count($array);$a++){
    
    ?>
    
    <input type="radio" name="<?php echo $myrow['testid']; ?>" value="<?php echo substr($array[$a],0,1);?>" ></input>
    
    <?php echo $array[$a];} ?>
    </td>
 
   <td width="260"></td>
  </tr>
		


</table>
<?php 
   				$x++;
?>
&nbsp;		<?php 
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




<table align="center" bgcolor="#00FF00" width="100">
  <tr>
      <td align="center">Ӧ���ⲿ��</td>
  </tr>
</table>
<form id="form" name="form" method="post" action="judge2.php">

<?php 
    include("../conn.php");
     
		        mysql_query("set names gbk");
		      $id=$_GET['id'];
		     $query=mysql_query("SELECT paper.*,suminfo.title,suminfo.grade,suminfo.style,suminfo.subject FROM suminfo,paper where suminfo.sumid=paper.sumid and suminfo.sumid=$id ");
		     $myrow=mysql_fetch_array($query);
          
        
   
     $grade=$myrow['grade'];
   
     $style=$myrow['style'];
     $subject=$myrow['subject'];
     $title=$myrow['title'];
     $query=mysql_query("SELECT suminfo.title,suminfo.grade,suminfo.style,suminfo.subject,paper.*  from suminfo,paper where suminfo.sumid=paper.sumid and grade='$grade' and style='$style' and subject='$subject' and title='$title' and ischoice='��'");
     
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









