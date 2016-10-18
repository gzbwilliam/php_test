<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=Shift_JIS">
<title>ログイン</title>
</head>
<body>

<?php
session_start();

# html data check
  if(!empty($_POST)){

    //エラー項目の確認
    if($_POST['user'] == ''){
      $error['name'] = 'blank';
    }

    if($_POST['pass'] == ''){
      $error['pass'] = 'blank';
    }
    if(empty($error)){
      $_SESSION['joy'] = $_POST;
      header('Location: checklogin_test.php');
      exit();
    }
  }

?>

ユーザー名とパスワードを入力してください
<br>

  <?php if(!empty($_SESSION['loginno']) && $_SESSION['loginno'] == 'Failed'): ?>
    <p><font color="red">* 一致しません</font></p>
    <?php endif; ?>
  <?php $_SESSION['loginno']=''; ?>

<form action="" method="POST">
ユーザー名：
<br>
<input type="text" name="user" size="30" maxlength="255"
    value="<?php
       if(!empty($_POST)){
               echo htmlspecialchars($_POST['user'], ENT_QUOTES, 'UTF-8');
       }
            ?>">
    <?php if(!empty($error['name']) && $error['name'] == 'blank'): ?>
    <p><font color="red">* ユーザー名を入力してください</font></p>
    <?php endif; ?>

<br>
<br>
パスワード：
<br>
<input type="password" name="pass" size="30">
<?php if(!empty($error['pass']) && $error['pass'] == 'blank'): ?>
      <p><font color="red">* パスワードを入力してください</font></p>
      <?php endif; ?>

<br>
<br>
<input type="submit" value="ログイン">
</form>
<br>
<a href="./signin_test.php">新規登録</a>
<br>
</body>
</html>
