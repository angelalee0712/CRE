

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>无标题文档</title>
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

  <div id="position">您所在的位置：</div>
    
  
  <div id="choice">
   
    <table width="100%" border="0">
    <input name="ifclicksearch" type="hidden" value="yes" />
      <tr>
        <td width="16%" height="27">试题级别&nbsp;
          <label for="grade"></label>
          <select name="grade" id="grade">
            <option>一级</option>
            <option>二级</option>
            <option>三级</option>
            <option>四级</option>
          </select></td>
        <td width="18%">试题类型&nbsp;
          <label for="style"></label>
          <select name="style" id="style">
            <option>真题</option>
            <option>模拟题</option>
            <option>预测题</option>
            <option>经典试题</option>
          </select></td>
        <td width="19%">所属科目 
          <label for="subject"></label>
          <select name="subject" id="subject">
            <option>VB</option>
            <option>VC</option>
            <option>MS Office</option>
          </select></td>
        
        <td width="5%"><input type="submit" name="search2" id="search2" value="搜索" /></td>
      </tr>
      </table>
     
      
       <?php 
       
         $conn=mysql_connect("localhost","root","") or die("连接错误!");
   mysql_select_db("db_cct",$conn);
         
         mysql_query("set names gbk");
         if($_POST['ifclicksearch'] != 'yes')
         {
          $query=mysql_query("SELECT suminfo.title,suminfo.grade,suminfo.style,suminfo.subject,paper.* FROM suminfo,paper WHERE suminfo.`sumid`=paper.`sumid`");
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
        <td width="42%">试题名称 
          <label for="title"></label>
          <input type="text" name="title" id="title" value="<?php echo $myarr['title'];?>"></input></td>
        <td width="29%"><label for="keywords">关键字 </label>
          <label for="keywords"></label>
          <input type="text" name="keywords" id="keywords" value="<?php echo $myarr['keywords'];?>"> </input></td>
          <td width="29%"><label for="resource">来源 </label>
          <label for="resource"></label>
          <input type="text" name="resource" id="resource" value="<?php echo $myarr['resource'];?>"> </input></td>
        </tr>
    </table>

<div id="c1">
    <table width="100%" border="0">
      <tr>
        <td width="23%">试题内容</td>
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
        <td  align="center"><input type="hidden" name="id" id="id" value="<?php echo $myarr['sumid'];?>"></input><input type="hidden" name="id2" id="id2" value="<?php echo $myarr['id'];?>"></input><input type="submit" name="submit" id="submit" value="修改" /><input type="submit" name="delete" id="delete" value="删除" /></td>
        
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
      
      <?php //处理上面的搜索表单提交的数据  ?>
      <?php 
       $conn=mysql_connect("localhost","root","") or die("连接错误!");
   mysql_select_db("db_cct",$conn);
         
         mysql_query("set names gbk");
          $grade=$_POST["grade"];
          
          $style=$_POST["style"];
          $subject=$_POST["subject"];
          $paperstyle=$_POST["paperstyle"];   //用于获取试题类型和编号；之所以去掉是因为三张表格的id之间还没有弄清关系，不便于连接
          $papernum=$_POST["papernum"];
          //$sumid=$_POST["sumid"];     //这两句话得不到值，因为没有输入
          //$paperid=$_POST["paperid"];
          if($_POST["search2"]=="搜索"){
       
          $query=mysql_query("SELECT suminfo.title,suminfo.grade,suminfo.style,suminfo.subject,paper.* from suminfo,paper where suminfo.`sumid`=paper.`sumid` and grade='$grade' and style='$style' and subject='$subject'");
          $myarr=mysql_fetch_array($query);
          
          $sumid=$myarr['sumid'];
          if($myarr == true)
		    {
   				do
   				{
   
   ?>
   <form id="form3" name="form3" method="post" action="">
 <div id="con1">
 
    <table width="100%" border="0">
      <tr>
        <td width="42%">试题名称
          <label for="title"></label>
          <input type="text" name="title" id="title" value="<?php echo $myarr['title'];?>"></input></td>
        <td width="29%"><label for="keywords">关键字 </label>
          <label for="keywords"></label>
          <input type="text" name="keywords" id="keywords" value="<?php echo $myarr['keywords'];?>"> </input></td>
          <td width="29%"><label for="resource">来源 </label>
          <label for="resource"></label>
          <input type="text" name="resource" id="resource" value="<?php echo $myarr['resource'];?>"> </input></td>
        </tr>
    </table>
  
  
  
 
  <p>&nbsp;</p>
  <div id="c1">
    <table width="100%" border="0">
      <tr>
        <td width="23%">试题内容</td>
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
        <td align="center"><input type="hidden" name="id" id="id" value="<?php echo $myarr['sumid'];?>"></input><input type="hidden" name="id2" id="id2" value="<?php echo $myarr['id'];?>"></input><input type="submit" name="submit" id="submit" value="修改" /><input type="submit" name="delete" id="delete" value="删除" /></td>
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
    
    $conn=mysql_connect("localhost","root","") or die("连接错误!");
   mysql_select_db("db_cct",$conn);
    $submit=$_POST["submit"];
    $delete=$_POST["delete"];
    
   
    if($submit=="修改"){
    	mysql_query("set names gbk");
    
    $title=$_POST["title"];
  
   	$grade=$_POST["grade"];
   	$style=$_POST["style"];
   	$subject=$_POST["subject"];
   	$resource=$_POST["resource"];
   	
   	$keywords=$_POST["keywords"];
   	$ischoice=$_POST["ischoice"];
   	$papernum=$_POST["papernum"];
   	$content=$_POST["content"];
   	$anwser=$_POST["anwser"];
   	$question=$_POST["question"];
   	$rightanwser=$_POST["rightanwser"];
   	$sumid=$_POST["id"];
    $id=$_POST["id2"];
   
    	$query1=mysql_query("update suminfo set title='$title',grade='$grade',style='$style',subject='$subject' where sumid='$sumid'");
    	$query2=mysql_query("update paper set resource='$resource',keywords='$keywords',content='$content' where id='$id'");
        if($query1 and $query2){
    	   echo "<script>alert('试题修改成功!');window.location.herf='manageindex.php';</script>";
        }else{
    	   echo "<script>alert('请您正确登录!');window.location.herf='./login.php';</script>";
        }
    }
    
    if($_POST['delete']=="删除"){
    	$query1=mysql_query("delete from suminfo where sumid=$sumid");
    	$query2=mysql_query("delete from exam where suminfo.`sumid`=exam.`sumid`");
        if($query1 and $query2 and $query3){
    	  echo "<script>alert('试题删除成功!');window.location.herf='manageindex.php';</script>";
       }else{
    	  echo "<script>alert('请您正确登录!');window.location.herf='./login.php';</script>";
       }
    	
    }
    
?>



