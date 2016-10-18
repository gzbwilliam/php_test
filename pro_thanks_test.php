<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>新規商品登録</title>
</head>

<?php

  session_start();
  
  //signin sessionがない場合はsignin pageに戻る

  if(!isset($_SESSION['p_join'])){
     header('Location:prosign_test.php');
     exit();
  }


#get data from html


  $pname=htmlspecialchars($_SESSION['p_join']['pname'],ENT_QUOTES);
  $price=htmlspecialchars($_SESSION['p_join']['price'],ENT_QUOTES);
  $seller=htmlspecialchars($_SESSION['joy']['user'],ENT_QUOTES);
  
 # $upass_ha=password_hash("$upass",PASSWORD_DEFAULT);
 # password_verify()

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

  $result=mysql_query('SELECT * FROM t_products');
  if(!$result){
     die('table select failed!'.mysql_error());
  }

# insert into table

  $result_flag=mysql_query("INSERT INTO t_products(p_name,p_seller,p_price)VALUES('$pname','$seller','$price')");
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
  <p>商品登録が完了しました</p>
  <p><a href="../">商品一覧</a></p>
</body>
</html>
