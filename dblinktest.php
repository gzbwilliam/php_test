<?php

$link=mysql_connect('localhost','GU','');
if(!$link){
   die('接続失敗です'.mysql_error());
}

echo '<p> access success! </p>';

$close_flag=mysql_close($link);

if($close_flag){
  echo '<p> unaccess success! </p>';
}

?>
