

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>�ޱ����ĵ�</title>
<style type="text/css">
.container{
	margin:auto;
	padding:10px;
	clear:both;
	width:950px;
	}
#position {
	height: 30px;
	width: 950px;
}
#choice {
	height: 60px;
	width: 950px;
}
#c1 {
	height: 80px;
	width: 950px;
}
#c2 {
	height: 80px;
	width: 950px;
}
#c3 {
	height: 100px;
	width: 950px;
}
#search{
	height:30px;
	width:950px;
	}
	#non{
	height:30px;
	width:950px;
	}
#con1{
	margin:auto;
	
	clear:both;
	width:950px;
	border: thin solid #0F0;
	}
#non1{
	height:20px;
	width:950px;
	}
</style>
</head>

<body>
<div class="container">

  <div id="position">�����ڵ�λ�ã�</div>
    
  
  <div id="choice">
   
    <table width="100%" border="0">
    <input name="ifclicksearch" type="hidden" value="yes" />
      <tr>
        <td width="80%" height="27" align="right">��ټ���&nbsp;
          <label for="grade"></label>
          <select name="grade" id="grade">
            <option>һ��</option>
            <option>����</option>
            <option>����</option>
            <option>�ļ�</option>
          </select></td>
        
        <td width="20%" align="right">������Ŀ 
          <label for="subject"></label>
          <select name="subject" id="subject">
            <option>VB</option>
            <option>VC</option>
            <option>MS Office</option>
          </select></td>
        
        <td width="5%"><input type="submit" name="search2" id="search2" value="����" /></td>
      </tr>
      </table>
    
      
       <?php 
       
        $conn=mysql_connect("localhost","root","") or die("���Ӵ���!");
   mysql_select_db("db_cct",$conn);
         
         mysql_query("set names gbk");
         if($_POST['ifclicksearch'] != 'yes')
         {
          $query=mysql_query("SELECT suminfo.title,suminfo.grade,suminfo.style,suminfo.subject,outline.* FROM suminfo,outline WHERE suminfo.`sumid`=outline.`sumid` ORDER BY updatetime DESC");
          $myarr=mysql_fetch_array($query);
        
          if($myarr == true)
		    {
   				do
   				{
           
   ?>
   <div id="non" ></div>
   <form id="form2" name="form2" method="post" action="">
  
 <div id="con1">
    <table width="100%" border="0">
      <tr>
        <td width="42%">��ٱ��� 
          <label for="title"></label>
          <input type="text" name="title" id="title" value="<?php echo $myarr['title'];?>"></input></td>
        <td width="29%"><label for="keywords">�ؼ��� </label>
          <label for="score2"></label>
          <input type="text" name="keywords" id="keywords" value="<?php echo $myarr['keywords'];?>"> </input></td>
          <td width="29%"><label for="resource">��Դ </label>
          <label for="resource"></label>
          <input type="text" name="resource" id="resource" value="<?php echo $myarr['resource'];?>"> </input></td>
        </tr>
    </table>

<div id="c1">
    <table width="100%" border="0">
      <tr>
        <td width="23%">�������</td>
        <td width="74%"><label for="content"></label>
          <textarea name="content" id="content" cols="45" rows="5" ><?php echo $myarr['content'];?></textarea></td>
        <td width="3%">&nbsp;</td>
      </tr>
    </table>
  </div>
 
  <div id="c3">
   
    <div id="non1"></div>
    <table width="100%" border="0">
       <tr>
        <td  align="center"><input type="hidden" name="id" id="id" value="<?php echo $myarr['sumid'];?>"></input><input type="hidden" name="id2" id="id2" value="<?php echo $myarr['id'];?>"></input><input type="submit" name="submit" id="submit" value="�޸�" /><input type="submit" name="delete" id="delete" value="ɾ��" /></td>
        
      </tr>
    </table>
  </div>
  <div id="non"></div>
  </div>
  </form>
<?php }while ($myarr=mysql_fetch_array($query));
		    }
         }
          ?>
      
      <?php //����������������ύ������  ?>
      <?php 
         $conn=mysql_connect("localhost","root","") or die("���Ӵ���!");
   mysql_select_db("db_cct",$conn);
         
         mysql_query("set names gbk");
          $grade=$_POST["grade"];
          
          
          $subject=$_POST["subject"];
          $keywords=$_POST["keywords"];   //���ڻ�ȡ�������ͺͱ�ţ�֮����ȥ������Ϊ���ű���id֮�仹û��Ū���ϵ������������
          $resource=$_POST["resource"];
          //$sumid=$_POST["sumid"];     //�����仰�ò���ֵ����Ϊû������
          //$paperid=$_POST["paperid"];
          if($_POST["search2"]=="����"){
       
          $query=mysql_query("SELECT suminfo.title,suminfo.grade,suminfo.style,suminfo.subject,outline.* from suminfo,exam where suminfo.`sumid`=outline.`sumid` and grade='$grade' and subject='$subject'");
          $myarr=mysql_fetch_array($query);
          
          $sumid=$myarr['sumid'];
          if($myarr == true)
		    {
   				do
   				{
   
   ?>
   <form id="form3" name="form3" method="post" action="dealoutlinemanage.php">
 <div id="con1">
 
    <table width="100%" border="0">
      <tr>
        <td width="42%">��ٱ���
          <label for="title"></label>
          <input type="text" name="title" id="title" value="<?php echo $myarr['title'];?>"></input></td>
        <td width="29%"><label for="keywords">�ؼ��� </label>
          <label for="keywords"></label>
          <input type="text" name="keywords" id="keywords value="<?php echo $myarr['keywords'];?>"> </input></td>
          <td width="29%"><label for="papernum">��Դ </label>
          <label for="resource"></label>
          <input type="text" name="resource" id="resource" value="<?php echo $myarr['resource'];?>"> </input></td>
        </tr>
    </table>
  
  
  
 
  <p>&nbsp;</p>
  <div id="c1">
    <table width="100%" border="0">
      <tr>
        <td width="23%">�������</td>
        <td width="74%"><label for="content"></label>
          <textarea name="content" id="content" cols="45" rows="5" ><?php echo $myarr['content'];?></textarea></td>
        <td width="3%">&nbsp;</td>
      </tr>
    </table>
  </div>
  
  <div id="c3">
    
    <div id="non1"></div>
    <table width="100%" border="0">
       <tr>
        <td align="center"><input type="hidden" name="id" id="id" value="<?php echo $myarr['sumid'];?>"></input><input type="hidden" name="id2" id="id2" value="<?php echo $myarr['id'];?>"></input><input type="submit" name="submit" id="submit" value="�޸�" /><input type="submit" name="delete" id="delete" value="ɾ��" /></td>
      </tr>
    </table>
    
  </div>
  <div id="non1"></div>
  <p>&nbsp;</p>
 <?php }while ($myarr=mysql_fetch_array($query));
		    }
          }
          ?>
  <p>&nbsp;</p>
  </div>
  </form>
</div>
</body>
</html>



<?php
    
    $conn=mysql_connect("localhost","root","") or die("���Ӵ���!");
   mysql_select_db("db_cct",$conn);
    $submit=$_POST["submit"];
    $delete=$_POST["delete"];
    
   
    if($submit=="�޸�"){
    	mysql_query("set names gbk");
    
    $title=$_POST["title"];
  
   	$grade=$_POST["grade"];
  
   	$subject=$_POST["subject"];
   	$score=$_POST["score"];
   	
   	$keywords=$_POST["keywords"];
   	$resource=$_POST["resource"];
   
   	$content=$_POST["content"];
   	
   	$sumid=$_POST["id"];
    $id=$_POST["id2"];
    
    	$query1=mysql_query("update suminfo set title='$title',grade='$grade',style='$style',subject='$subject' where sumid='$sumid'");
    	$query2=mysql_query("update outline set keywords='$keywords',resource='$resource', content='$content' where id='$id'");
        if($query1 and $query2){
    	   echo "<script>alert('����޸ĳɹ�!');window.location.herf='manageindex.php';</script>";
        }else{
    	   echo "<script>alert('������ȷ��¼!');window.location.herf='./login.php';</script>";
        }
    }
    
    if($_POST['delete']=="ɾ��"){
    	$query1=mysql_query("delete from suminfo where sumid=$sumid");
    	$query2=mysql_query("delete from outline where id=$id");
        if($query1 and $query2 and $query3){
    	  echo "<script>alert('���ɾ���ɹ�!');window.location.herf='manageindex.php';</script>";
       }else{
    	  echo "<script>alert('������ȷ��¼!');window.location.herf='./login.php';</script>";
       }
    	
    }
    
?>



