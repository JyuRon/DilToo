<? session_start(); ?>
<meta charset="utf-8">

<?
 $userid=$_SESSION['userid'];
 $content=$_POST['content'];


	
	if(!$userid) {
		echo("
		<script>
	     window.alert('로그인 후 이용해 주세요.')
	     history.go(-1)
	   </script>
		");
		exit;
	}


	if(!$content) {


		echo("
	   <script>
	     window.alert('내용을 입력하세요.')
	     history.go(-1)
	   </script>
		");
	 exit;
	}

	$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

	include "dbconn.php";       

    $sql = "SELECT * FROM member WHERE id='$userid'";
    $result = mysql_query($sql, $mydb);
	$row = mysql_fetch_array($result);

	$name = $row['name'];
	$nick = $row['nick'];

	$sql = "INSERT INTO memo (id, name, nick, content, regist_day) VALUES ('$userid', '$name', '$nick', '$content', '$regist_day')";

	mysql_query($sql, $mydb);  

	mysql_close();               

	echo "
	   <script>
	    location.href = 'memo.php';
	   </script>
	";
?>

  
