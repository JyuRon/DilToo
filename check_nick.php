<meta charset="utf-8"/>
<?
   $nick=$_GET['nick'];
   if(!$nick) 
   {
      echo("닉네임을 입력하세요.");
   }
   else
   {
      $connect=mysql_connect( "localhost", "root", "1234") or  
        die( "SQL server에 접속할 수 없습니다."); 

      mysql_select_db("mydb",$connect);
 
      $sql = "select * from member where nick='$nick' ";

      $result = mysql_query($sql, $connect);
      $num_record = mysql_num_rows($result);

      if ($num_record)
      {
         echo "닉네임이 중복됩니다.<br>";
         echo "다른 닉네임을 입력하세요.<br>";
      }
      else
      {
         echo "사용가능한 닉네임입니다.";
      }
    
      mysql_close();
   }
?>

