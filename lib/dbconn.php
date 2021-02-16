<?
    $connect=mysql_connect( "localhost", "root", "apmsetup") or  
        die( "SQL server에 접속할 수 없ㅅ브니다."); 

    mysql_select_db("mydb",$connect);
?>
