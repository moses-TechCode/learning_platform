<?php
$host = "0.0.0.0";
$user = "root";
$pass = "root";
$db_name = "learning_platform";

if(!$con = mysql_connect($host,$user,$pass,$db_name)){
  die("did not connecte successfully");
}
?>