<?php
   session_start();
   header('Content-type:text/xml');
   $dates=$_SESSION['dates'];
   $dates1=$dates+1*60;
   $dates2=mktime();
   $dates3=$dates1-$dates2;
   echo date("i:s",$dates3);
?>