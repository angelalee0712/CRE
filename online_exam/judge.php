<?php 

$conn=mysql_connect("localhost","root","") or die("���Ӵ���!");
   mysql_select_db("db_cct",$conn);
   
//��ȡ���еĲ�������
$keys = array_keys($_POST);

//��������
$keynum=count($keys);
$score=0;
$x=1;
?>
<table width="100%" border="0">
<?php
for($i = 0;$i<$keynum-1;$i++)
{
	$ikeyname = $keys[$i]; //��i������������
	
	$query=mysql_query("SELECT exam.*  from exam where paperid='$ikeyname'");
	$myrow=mysql_fetch_array($query);
?>
  <tr>
    <td>���Ϊ<?php echo $x; ?>����Ŀ��</td>
  

<?php 	
	$userchose = $_POST[$ikeyname];
	if($userchose == $myrow['rightanwser'] and $userchose!=NULL)	//��ȷ
	{
		$score+=$myrow['score'];
	?>
	
	<td>���ѡ���ǣ�<?php echo $userchose; ?>����ȷ���ǣ�<?php echo $myrow['rightanwser']; ?>����ϲ������ˣ�</td>
	
	<?php 	
	}
	else	//����
	 {
	?>
		
	<td>���ѡ���ǣ�<?php echo "$userchose"; ?>����ȷ���ǣ�<?php echo $myrow['rightanwser']; ?>�������ˣ�</td>
	
		
	<?php 
	}
?>
</tr>
<?php 
   $x++;
}
echo "�����ܳɼ��ǣ�$score";
echo  "<script>alert('���ĵ�ѡ����ܳɼ���:$score');</script>";
?>

</table>