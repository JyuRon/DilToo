<meta charset="utf-8"/>
<?
   $id=$_GET['id'];
   if(!$id) 
   {
      echo("아이디를 입력하세요");
   }
   else
   {
      $connect=mysql_connect( "localhost", "root", "1234") or  
        die( "SQL server에 접속할 수 없습니다."); 

      mysql_select_db("mydb",$connect);
 
      $sql = "select * from member where id='$id' ";

      $result = mysql_query($sql, $connect);
      $num_record = mysql_num_rows($result);

      if ($num_record)
      {
         echo "아이디가 중복됩니다.<br>";
         echo "다른 아이디를 사용하세요.<br>";
      }
      else
      {
         echo "사용가능한 아이디입니다.";
      }
    
      mysql_close();
   }
?>

