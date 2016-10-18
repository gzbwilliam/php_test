<?php

session_start();

  //signin sessionがない場合はsignin pageに戻る

  if(!isset($_SESSION['joy'])){
     header('Location:login_test.php');
     exit();
  }


$user=htmlspecialchars($_SESSION['joy']['user'],ENT_QUOTES);
$pass=htmlspecialchars($_SESSION['joy']['pass'],ENT_QUOTES);

//$pass_ha=password_hash("$pass",PASSWORD_DEFAULT);

# connect to mysql

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

 // $result=mysql_query("SELECT user_name FROM t_users
                  //    WHERE user_name='$user' AND user_pass='$pass_ha'");
    $result=mysql_query("SELECT * FROM t_users
                      WHERE user_name='$user'");

   if(!$result){
     die('SELECT query failed!'.mysql_error());
  }

    $d_pass=mysql_fetch_assoc($result);
    $pass_ha=$d_pass['user_pass'];
 
   $result_pa=password_verify($pass,$pass_ha);





   if(mysql_num_rows($result)==1&&$result_pa){
       $login='OK';
       //データの取り出し
       $row=mysql_fetch_assoc($result);

       //ユーザー名をsession変数に保存
       $_SESSION['name']=$row['user_name'];
   }else{
       $login='Error';
       $_SESSION['loginno']='Failed';
   }
   
   //log in状態をsession変数に記録
   $_SESSION['login']=$login;
   
   echo '$login='.$login;
  // echo '$_SESSION name ='.$_SESSION['name']

   //ページ移動
   if($login=='OK'){
       header('Location:index_test.php');
   }else{
       header('Location:login_test.php');
   }

?>
