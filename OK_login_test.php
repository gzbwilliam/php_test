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

<?php echo $user ?>さん
<br>
ログインに成功しました
</body>
</html>
