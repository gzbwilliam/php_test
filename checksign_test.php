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
?>

<body>
  <form action="thanks_test.php" method="post">
  <dl>
    <dt>ユーザー名</dt>
    <dd>
       <?php echo htmlspecialchars($_SESSION['join']['uname'], ENT_QUOTES, 'UTF-8'); ?>
    </dd>
    <dt>メールアドレス</dt>
    <dd>
       <?php echo htmlspecialchars($_SESSION['join']['umail'], ENT_QUOTES, 'UTF-8'); ?>
    </dd>
    <dt>パスワード</dt>
    <dd>
      【表示されません】
    </dd>
  </dl>

  <!-- &laqueは”<<”,&nbspは空白 -->
  <div><a href="signin_test.php?action=rewrite">&laquo;&nbsp;書き直す</a>
  <input type="submit" value="登録する"></div>
  </form>
</body>
</html>
