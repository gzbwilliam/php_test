<html>
<head>
  <meta charset="UTF-8" />
  <title>新規会員登録</title>
</head>

<?php
session_start();

# html data check
  
  if(!empty($_POST)){
    
    $price=htmlspecialchars($_POST['price'],ENT_QUOTES);
    $price=mb_convert_kana($price,'a','SJIS');//全角から半角へ

    //エラー項目の確認
    if($_POST['pname'] == ''){
      $error['name'] = 'blank';
    }
    if($_POST['price'] == ''){
      $error['price'] = 'blank';
    }else if(!is_numeric($price)){
      $error['price'] = 'nonumber';
    }

    //全部正しく入力した場合 
    if(empty($error)){
      $_SESSION['p_join'] = $_POST;
      $_SESSION['p_join']['price']=$price;
      header('Location: check_psign_test.php');
      exit();
    }
  }

?>
<body>
  <p>必要事項をご記入ください</p>

<!--#  signin begin -->

  <form action="" method="post" enctype="multipart/form-data">
  <dl>

<!--#  productname signin -->  
 
    <dt>商品名<font color="red">　必須</font></dt>
    <dd>
      <input type="text" name="pname" size="35" maxlength="255" 
          value="<?php 
               if(!empty($_POST)){
                    echo htmlspecialchars($_POST['pname'], ENT_QUOTES, 'UTF-8');
               }
                 ?>">

      <!--記入してない場合-->
      <?php if(!empty($error['name']) && $error['name'] == 'blank'): ?>
      <p><font color="red">* 商品名を入力してください</font></p>
      <?php endif; ?>
    </dd>

<!--#  price signin -->
    
    <dt>価格<font color="red">　必須</font></dt>
    <dd>
      <input type="text" name="price" size="10" maxlength="20" 
          value="<?php 
               if(!empty($_POST)){ 
                    echo htmlspecialchars($_POST['price'], ENT_QUOTES, 'UTF-8');               }
                 ?>">
      <?php if(!empty($error['price']) && $error['price'] == 'blank'): ?>
      <p><font color="red">* 価格を入力してください</font></p>
      <?php endif; ?>
       
      <!--価格は数字ではない場合-->
      <?php if(!empty($error['price']) && $error['price'] == 'nonumber'): ?>
      <p><font color="red">* 数字を入れてください</font></p>
      <?php endif; ?>  
    </dd>

  </dl>

<!--#  signin submit -->

  <div><input type="submit" value="入力内容を確認"></div>
  </form>

<!--#  signin end -->
</body>
</html>
