<?php 

$conn=mysql_connect("localhost","root","") or die("连接错误!");
   mysql_select_db("db_cct",$conn);
   
//获取所有的参数名，
$keys = array_keys($_POST);

//参数个数
$keynum=count($keys);

$x=1;
?>
<table width="100%" border="0">
<?php
for($i = 0;$i<$keynum-1;$i++)
{
	$ikeyname = $keys[$i]; //第i个参数的名字
	
	$query=mysql_query("SELECT exam.*  from exam where paperid='$_POST[id]'");
	$myrow=mysql_fetch_array($query);
?>
  <tr>
    <td>编号为<?php echo $x; ?>的题目：</td>
  


	<td>正确答案是：<?php echo $myrow['rightanwser']; ?></td>
	
	
	
	
		

</tr>
<?php 
   $x++;

}
?>

</table>