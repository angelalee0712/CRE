<?php 

$conn=mysql_connect("localhost","root","") or die("连接错误!");
   mysql_select_db("db_cct",$conn);
   
//获取所有的参数名，
$keys = array_keys($_POST);

//参数个数
$keynum=count($keys);
$score=0;
$x=1;
?>
<table width="100%" border="0">
<?php
for($i = 0;$i<$keynum-1;$i++)
{
	$ikeyname = $keys[$i]; //第i个参数的名字
	
	$query=mysql_query("SELECT exam.*  from exam where paperid='$ikeyname'");
	$myrow=mysql_fetch_array($query);
?>
  <tr>
    <td>编号为<?php echo $x; ?>的题目：</td>
  

<?php 	
	$userchose = $_POST[$ikeyname];
	if($userchose == $myrow['rightanwser'] and $userchose!=NULL)	//正确
	{
		$score+=$myrow['score'];
	?>
	
	<td>你的选择是：<?php echo $userchose; ?>！正确答案是：<?php echo $myrow['rightanwser']; ?>！恭喜您答对了！</td>
	
	<?php 	
	}
	else	//错误
	 {
	?>
		
	<td>你的选择是：<?php echo "$userchose"; ?>！正确答案是：<?php echo $myrow['rightanwser']; ?>！你答错了！</td>
	
		
	<?php 
	}
?>
</tr>
<?php 
   $x++;
}
echo "您的总成绩是：$score";
echo  "<script>alert('您的单选题的总成绩是:$score');</script>";
?>

</table>