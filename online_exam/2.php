<?php 
   $conn=mysql_connect("localhost","root","") or die("���Ӵ���!");
		       mysql_select_db("db_cct",$conn);
		        mysql_query("set names gbk");
		      $id=$_GET['id'];
		     $query=mysql_query("SELECT exam.*,suminfo.title,suminfo.grade,suminfo.style,suminfo.subject,suminfo.sumscore,suminfo.okscore,suminfo.time FROM suminfo,exam where suminfo.sumid=exam.sumid and suminfo.sumid=$id ");
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
    <td height="40" align="center">�ܷ�:<?php echo $myrow['sumscore'];?></td>
    <td align="center">�����:<?php echo $myrow['okscore'];?></td>
    <td align="center">����ʱ��:<?php echo $myrow['time'];?></td>
  </tr>
  
</table>

<table align="center" bgcolor="#00FF00" width="100">
  <tr>
      <td align="center">ѡ���ⲿ��</td>
  </tr>
</table>
<form id="form" name="form" method="post" action="judge.php">
<?php 
    include("conn.php");
    mysql_query("set names gbk");
     $grade=$myrow['grade'];
   
     $style=$myrow['style'];
     $subject=$myrow['subject'];
     $title=$myrow['title'];
     $query=mysql_query("SELECT suminfo.title,suminfo.grade,suminfo.style,suminfo.subject,exam.*  from suminfo,exam where suminfo.sumid=exam.sumid and grade='$grade' and style='$style' and subject='$subject' and title='$title' and ischoice='��'");
     
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
      $array=explode("*",$myrow['anwser']);
      
  ?>
  <tr>
    <td height="40" >
    <?php
    for($a=0;$a<count($array);$a++){
    
    ?>
    
    <input type="radio" name="<?php echo $myrow['paperid']; ?>" value="<?php echo substr($array[$a],0,1);?>" ></input>
    
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
    include("conn.php");
     $conn=mysql_connect("localhost","root","") or die("���Ӵ���!");
		       mysql_select_db("db_cct",$conn);
		        mysql_query("set names gbk");
		      $id=$_GET['id'];
		     $query=mysql_query("SELECT exam.*,suminfo.title,suminfo.grade,suminfo.style,suminfo.subject,suminfo.sumscore,suminfo.okscore,suminfo.time FROM suminfo,exam where suminfo.sumid=exam.sumid and suminfo.sumid=$id ");
		     $myrow=mysql_fetch_array($query);
          
        
   
     $grade=$myrow['grade'];
   
     $style=$myrow['style'];
     $subject=$myrow['subject'];
     $title=$myrow['title'];
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









