<html>
<head>
  <meta charset="UTF-8" />
  <title>新規会員登録</title>
</head>

<?php
session_start();

# html data check

  if(!empty($_POST)){
    //エラー項目の確認
    if($_POST['uname'] == ''){
      $error['name'] = 'blank';
    }
    if($_POST['umail'] == ''){
      $error['mail'] = 'blank';
    }
    if(strlen($_POST['upass']) < 4){
      $error['pass'] = 'length';
    }
    if($_POST['upass'] == ''){
      $error['pass'] = 'blank';
    }
 
    if(empty($error)){
      $_SESSION['join'] = $_POST;
      header('Location: checksign_test.php');
      exit();
    }
  }

?>
<body>
  <p>必要事項をご記入ください</p>
  <form action="" method="post" enctype="multipart/form-data">
  <dl>
    
    <dt>ユーザー名<font color="red">　必須</font></dt>
    <dd>
      <input type="text" name="uname" size="35" maxlength="255" 
          value="<?php 
               if(!empty($_POST)){
                    echo htmlspecialchars($_POST['uname'], ENT_QUOTES, 'UTF-8');
               }
                 ?>">
      <?php if(!empty($error['name']) && $error['name'] == 'blank'): ?>
      <p><font color="red">* ユーザー名を入力してください</font></p>
      <?php endif; ?>
    </dd>
    

    <dt>パスワード<font color="red">　必須</font></dt>
    <dd>
      <input type="password" name="upass" size="10" maxlength="20" 
          value="<?php 
               if(!empty($_POST)){ 
                    echo htmlspecialchars($_POST['upass'], ENT_QUOTES, 'UTF-8');               }
                 ?>">
      <?php if(!empty($error['pass']) && $error['pass'] == 'blank'): ?>
      <p><font color="red">* パスワードを入力してください</font></p>
      <?php endif; ?>
      <?php if(!empty($error['pass']) && $error['pass'] == 'length'): ?>
      <p><font color="red">* パスワードは４文字以上で入力してください</font></p>
      <?php endif; ?>
    </dd>


    <dt>メールアドレス<font color="red">　必須</font></dt>
    <dd>
      <input type="text" name="umail" size="35" maxlength="255" 
      value="<?php
               if(!empty($_POST)){
                    echo htmlspecialchars($_POST['umail'], ENT_QUOTES, 'UTF-8');               }
                 ?>">
      <?php if(!empty($error['mail']) && $error['mail'] == 'blank'): ?>
      <p><font color="red">* メールアドレスを入力してください</font></p>
      <?php endif; ?>
      <?php if(!empty($error['mail']) && $error['mail'] == 'duplicate'): ?>
      <p><font color="red">* 指定されたメールアドレスは既に登録されています</font></p><?php endif; ?>
    </dd>

  </dl>
  <div><input type="submit" value="入力内容を確認"></div>
  </form>
</body>
</html>
