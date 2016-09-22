<?php

$link=mysql_connect('localhost','root','');
if(!$link){
   die('access failed!'.mysql_error());
}

echo '<p>access successed!</p>';

$db_selected=mysql_select_db('d_kokutest',$link);
if(!$db_selected){
   die('database select failed!'.mysql_error());
}

echo'<p>d_kokutest database seleted</p>';

mysql_set_charset('utf8');

$result=mysql_query('SELECT * FROM t_products');
if(!$result){
   die('table select failed!'.mysql_error());
}

while($row=mysql_fetch_assoc($result)){
   echo'<p>';
   echo'id='.$row['p_id'];
   echo',name='.$row['p_name'];
   echo',seller='.$row['p_seller'];
   echo'</p>';
}

$sql="INSERT INTO t_products(p_id,p_name,p_seller,p_price)VALUES(2,'printer','sellerB',88)";
$result_flag=mysql_query($sql);

if(!$result_flag){
   die('INSERT query failed!'.mysql_error());
}

$result=mysql_query('SELECT * FROM t_products');

while($row=mysql_fetch_assoc($result)){
   echo'<p>';
   echo'id='.$row['p_id'];
   echo',name='.$row['p_name'];
   echo',seller='.$row['p_seller'];
   echo'</p>';
}


$close_flag=mysql_close($link);

if($close_flag){
   echo'<p> unaccess successed!</p>';
}
?>
