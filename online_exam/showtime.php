<?php
    session_start();
    header('Content-type:text/xml');
    $dates=$_SESSION['dates'];
    $dates2=mktime();
    $dates3=$dates2-$dates;
    echo date("i:s",$dates3);

?>