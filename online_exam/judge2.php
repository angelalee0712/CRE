<?php 

$conn=mysql_connect("localhost","root","") or die("���Ӵ���!");
   mysql_select_db("db_cct",$conn);
   
//��ȡ���еĲ�������
$keys = array_keys($_POST);

//��������
$keynum=count($keys);

$x=1;
?>
<table width="100%" border="0">
<?php
for($i = 0;$i<$keynum-1;$i++)
{
	$ikeyname = $keys[$i]; //��i������������
	
	$query=mysql_query("SELECT exam.*  from exam where paperid='$_POST[id]'");
	$myrow=mysql_fetch_array($query);
?>
  <tr>
    <td>���Ϊ<?php echo $x; ?>����Ŀ��</td>
  


	<td>��ȷ���ǣ�<?php echo $myrow['rightanwser']; ?></td>
	
	
	
	
		

</tr>
<?php 
   $x++;

}
?>

</table>