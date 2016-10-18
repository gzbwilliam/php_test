<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=Shift_JIS">
</head>
<body>
<?php
# connect to mysql

  $link=mysql_connect('localhost','root','');
  if(!$link){
     die('access failed!'.mysql_error());
  }

 // echo '<p>access successed!</p>';

# connect to database

  $db_selected=mysql_select_db('d_kokutest',$link);
  if(!$db_selected){
     die('database select failed!'.mysql_error());
  }
  //echo'<p>d_kokutest database seleted</p>';

mysql_set_charset('utf8');

# query from table

  $result=mysql_query('SELECT * FROM t_products');
  if(!$result){
     die('table select failed!'.mysql_error());
  }

?>

<h2>商品一覧</h2>
<table border="1">
<tr>
    <td>商品番号</td><td>商品名</td><td>販売人</td><td>価格</td>
<tr>
<?php

# get the database data as array

  while($row=mysql_fetch_assoc($result)){
     echo'<tr><td>';
     echo $row['p_id'];

     echo'</td><td>';
     echo $row['p_name'];

     echo'</td><td>';
     echo $row['p_seller'];
     
     echo'</td><td>';
     echo $row['p_price'];
     echo'</td></tr>';
  }
?>
</table>

<?php
# close database

  $close_flag=mysql_close($link);

  if($close_flag){
    // echo'<p> unaccess successed!</p>';
  }
?>

</body>
</html>

