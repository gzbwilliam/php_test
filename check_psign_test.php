<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>新規商品登録</title>
</head>

<?php
  session_start();

  if(!isset($_SESSION['joy'])){
           header('Location:login_test.php');
           exit();
        }


  //signin sessionがない場合はsignin pageに戻る

  if(!isset($_SESSION['p_join'])){
     header('Location:pro_signin_test.php');
     exit();
  }
?>

<body>
  <form action="pro_thanks_test.php" method="post">
  <dl>
    <dt>商品名</dt>
    <dd>
       <?php echo htmlspecialchars($_SESSION['p_join']['pname'], ENT_QUOTES, 'UTF-8'); ?>
    </dd>
    <dt>価格</dt>
    <dd>
       <?php echo htmlspecialchars($_SESSION['p_join']['price'], ENT_QUOTES, 'UTF-8'); ?>
    </dd>
    <dt>販売人</dt>
    <dd>
       <?php echo htmlspecialchars($_SESSION['joy']['user'], ENT_QUOTES, 'UTF-8'); ?>
    </dd>
  </dl>

  <!-- &laqueは”<<”,&nbspは空白 -->
  <div><a href="signin_test.php?action=rewrite">&laquo;&nbsp;書き直す</a>
  <input type="submit" value="登録する"></div>
  </form>
</body>
</html>
