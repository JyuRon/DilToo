<?
  session_start();
?>
<meta charset="utf-8"/>
<?

    $sid=$_SESSION['userid']; 
   $hp = $_POST['hp1']. "-". $_POST['hp2']. "-". $_POST['hp3'];
   $email = $_POST['email1']. "@". $_POST['email2'];

   $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
   $ip = $REMOTE_ADDR;         // 방문자의 IP 주소를 저장

   $id = $_POST['id'];
   $pass = $_POST['pass'];
   $name = $_POST['name'];
   $nick = $_POST['nick'];

    $host = "localhost";
    $user = "root";
    $passwd= "1234";
    $mydb = mysql_connect($host, $user, $passwd)
  or  die ("MySQL에 연결할 수 없습니다.");

  mysql_query("set names euckr");

  mysql_select_db('mydb', $mydb); #db선택 

   
   $sql = "select * from member where id='$id'";
   $result = mysql_query($sql, $mydb);
   $exist_id = mysql_num_rows($result);

     // 레코드 삽입 명령을 $sql에 입력
	    $sql =  "UPDATE member SET pass='$pass', nick='$nick', hp='$hp', email='$email' WHERE id='$sid'";

		mysql_query($sql, $mydb);  // $sql 에 저장된 명령 실행
  

   mysql_close();                // DB 연결 끊기
   echo "
	   <script>
	    location.href = 'boardlist.php';
	   </script>
	";
?>

   
