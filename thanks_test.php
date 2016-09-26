<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>新規会員登録</title>
</head>

<?php

  session_start();
  
  //signin sessionがない場合はsignin pageに戻る

  if(!isset($_SESSION['join'])){
     header('Location:signin_test.php');
     exit();
  }


#get data from html


  $uname=htmlspecialchars($_SESSION['join']['uname'],ENT_QUOTES);
  $upass=htmlspecialchars($_SESSION['join']['upass'],ENT_QUOTES);
  $umail=htmlspecialchars($_SESSION['join']['umail'],ENT_QUOTES);

$link=mysql_connect('localhost','root','');
if(!$link){
   die('access failed!'.mysql_error());
}

echo '<p>access successed!</p>';

# connect to database

  $db_selected=mysql_select_db('d_kokutest',$link);
  if(!$db_selected){
     die('database select failed!'.mysql_error());
  }
  echo'<p>d_kokutest database seleted</p>';

mysql_set_charset('utf8');

# query from table

  $result=mysql_query('SELECT * FROM t_users');
  if(!$result){
     die('table select failed!'.mysql_error());
  }

# insert into table

  $result_flag=mysql_query("INSERT INTO t_users(user_name,user_pass,user_mail)VALUES('$uname','$upass','$umail')");
  if(!$result_flag){
     die('INSERT query failed!'.mysql_error());
  }

# close database

  $close_flag=mysql_close($link);

  if($close_flag){
     echo'<p> unaccess successed!</p>';
  }

  $_SESSION = array();

    if (isset($_COOKIE["PHPSESSID"])) {
        setcookie("PHPSESSID", '', time() - 1800, '/');
    }

    session_destroy();
?>


<body>
  <p>ユーザー登録が完了しました</p>
  <p><a href="../">ログインする</a></p>
</body>
</html>
