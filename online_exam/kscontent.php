
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<title>无标题文档</title>
<style type="text/css">
.auto{
	margin:auto;
	padding:10px;
	clear:both;
	width:950px;
	}
.auto1{
	margin:auto;
	
	clear:both;
	width:950px;
	}
.auto2{
	margin:auto;
	float:left;
	clear:both;
	width:750px;
	}

#position {
	height: 30px;
	width: 950px;
}
#time {
	height: 30px;
	width: 950px;
}
#title {
	height: 30px;
	width: 950px;
}
#info {
	height: 30px;
	width: 950px;
}
#choice {
	height: 30px;
	width: 950px;
}
#non1 {
	height: 30px;
	width: 320px;
	float:left;
}
#choice1 {
	height: 30px;
	width: 310px;
}
#choice1 {
	float: right;
	height: 30px;
	width: 630px;
}
#xuanze {
	height: 30px;
	width: 950px;
}
#rightanwser {
	float: right;
	height: 40px;
	width: 200px;
}
</style>
</head>

<body>
<div class="auto" id="container">
  <div id="position">您所在的位置：</div>
 
  <div id="title" align="center">试卷名称</div>
  <div id="info">
    <table width="100%" border="0">
      <tr>
        <td height="25">总分</td>
        <td>及格分</td>
        <td>答题时间</td>
      </tr>
    </table>
  </div>
  <div id="choice">
    <div id="non1"></div>
    <div id="choice1">
      <table width="300" border="0">
        <tr>
          <td height="28">选择题</td>
          <td>程序改错题</td>
          <td>简单应用题</td>
          <td>综合应用题</td>
        </tr>
      </table>
    </div>
  </div>
  <div class="auto1" id="content">
    <div id="xuanze">一、选择题（每题_分，共_分）</div>
    <?php 
    include("conn.php");
    mysql_query("set names gbk");
     $grade=$_POST["grade"];
   
     $style=$_POST["style"];
     $subject=$_POST["subject"];
     $title=$_POST["title"];
     $query=mysql_query("select * from suminfo,exam where suminfo.sumid=exam.sumid and grade='$grade' and style='$style' and subject='$subject' and title='$title'");
     
     $myrow=mysql_fetch_array($query);
    
     $score=0;
    if($myrow == true)
		    {
   				do
   				{
   
   ?>
    <div class="auto1" id="c1">
      <div class="auto1" id="con1">
        <?php echo $myrow['papernum'].".".$myrow['content'];?>
      </div>  
       
        <?php
              $array=explode("*",$myrow['anwser']);
              //以下指的是单选按钮提交的答案
          if($_POST['submit']!=""){       
              for($a=0;$a<count($array);$a++){
                 if($array[$a]!=''){
                 	if($array[$a]==$_POST['$myrow[suminfo.sumid]']){
                 		$str=$_POST['$myrow[suminfo.sumid]'];
                 	}
                                       
                  	
                 }
                  
              }
          }
          for($a=0;$a<count($array);$a++){
                 if($array[$a]!=''){
      ?>
      <div class="auto1" id="daan1">
        <div class="auto2" id="daan12">
          <input type="radio" name="<?php echo $myrow['suminfo.sumid'];?>" value="<?php echo $array[$a];?>" ></input>
          <table width="100%" border="0">
          <tr>
              <?php
              if($_POST[submit]=="交卷"){
               if($_POST['$myrow[suminfo.sumid]']==true){//用户提交了答案
              	  if($a==0){
              	  	if($myrow["anwser"]==str){
              	  		echo "√";
              	  	   $score+=$myrow["score"];
              	  	}else{
              	  	    echo "×";
              	  	    ?>
              		    
              <td><?php echo "正确答案:".substr($myrow['rightanwser'],0,1); ?></td>
              </tr>
              </table>
              <?php 
              	  	}
              	  }
               }
              }
                 }
          }
              	?>  
            
               <?php }while ($myrow=mysql_fetch_array($query));
		    }
          ?>
            
              
          
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      </div>
    </div>
    <div id="xuanze1">
       <div id="non3"></div>
       <div id="xuaze2">
         <table width="300" border="0">
           <tr>
             <td height="25">选择题</td>
             <td>程序改错题</td>
             <td>简单应用题</td>
             <td>综合应用题</td>
           </tr>
         </table>
       </div>
     </div>
     <div id="submit">
       <div id="non4"></div>
       <div id="submit1">
         <form id="form1" name="form1" method="post" action="">
           <input type="submit" name="submit" id="submit2" value="交卷" />
         </form>
       </div>
     </div>
     
     
     
     //我自己加的代码,还没有完成
     <?php 
          echo  "<script>alert('您的单选题的总成绩是:$score');</script>";
          
     ?>
     <?php 
         
         	$date=date("Y-m-d H:i:s");
         	$query="update ";
         	
         
     ?>
     
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
</body>
</html>



<script type="text/javascript" src="js/xmlHttpRequest.js"></script>
<script type="text/javascript">
timer=window.setInterval("ShowTime()",1000);
function ShowTime(){
	xmlHttp.open("post","showtime.php",true);
	xmlHttp.onreadystatechange=function(){
           if(xmlHttp.readyState==4){
                 tet=xmlHttp.reponseText;
                 document.getElementById("show_time").innerHTML=tet;
               }
		}
xmlHttl.send(null);
}
</script>
<script type="text/javascript">
time=window.setInterval("sparetime",1000);
function sparetime(){
	xmlHttp.open("post","sparetime.php",true);
	xmlHttp.onreadystatechange=function(){
        if(xmlHttp.readyState==4){
              tet=xmlHttp.reponseText;
              document.getElementById("sparetime").innerHTML=tet;
              if(tet=="00:00"){
                  formal.submit();
                  }
            }
		}
	xmlHttl.send(null);
}

</script>

