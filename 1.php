<?php 
include("conn.php");
    mysql_query("set names gbk");
         
       
          $query=mysql_query("select * from suminfo,exam where suminfo.`sumid`=exam.`sumid` order by updatetime desc limit 0,1");
          $myarr=mysql_fetch_array($query);
          $sumid=$myarr[suminfo.sumid];
?>
<form id="form2" name="form2" method="post" action="">
   <input type="hidden" name="id" id="id" value="<?php echo $sumid;?>"></input><input type="submit" name="submit" id="submit" value="�޸�" /><input type="submit" name="delete" id="delete" value="ɾ��" />
        
</form>
<?php
$submit=$_POST["submit"];
if($submit=="�޸�"){
$sumid=$_POST["id"];
print_r($sumid) ;
}
?>