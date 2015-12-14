<?php

require 'core.php';
require 'connect.php';
if(isset($_SESSION['email'])&&!empty($_SESSION['email']))
{
echo 'You are logged in!!.<a href="logout.php">LOG OUT</a>';
}
else{
include 'loginform.php';
}
echo $current_file;

?>