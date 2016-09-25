<?php
   session_start();
?>

<?php

    if(!isset($_COOKIE["PHPSESSID"])){
        echo'初回の訪問です。セッションを開始します。';
    }else{
        echo'セッションは開始しています。<br>';
        echo'セッションID'.$_COOKIE["PHPSESSID"].'です';
    }
?>

