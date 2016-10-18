<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<title>ログイン</title>
</head>
<body>
<?php

session_start();
       
   $login='';
   if(!isset($_SESSION['login'])){
       $login='no';
   }

   if($login!='no'&&$_SESSION['login']=='OK'){
        $user=htmlspecialchars($_SESSION['joy']['user'],ENT_QUOTES);
   }else{
        $user='某客';
   }
?>

<form action="index_test.php" method="POST">
検索
<br>
<input type="text" name="search" size="50">
<br>
<input type="submit" value="検索">
</form>
<br>
<?php echo $user ?>さん
<br>
<a href="./login_test.php">logout</a>
<br>
<a href="./pro_signin_test.php">商品登録</a>
<br>
<a href="./pro_list_test.php">商品一覧</a>
<br>


</body>
</html>
