<?php

$mysql_host='localhost';
$mysql_user='root';
$mysql_pass='';
$mysql_db='techfest';
$link=mysqli_connect('localhost','root','','techfest') or die('could not connect');
@mysqli_select_db($link,$mysql_db);
//echo "<b>connected</b> <br>";
?>