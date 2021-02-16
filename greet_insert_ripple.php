<?
   session_start();
?>
<? 
   $ripple_content=$_POST['ripple_content'];
   $userid=$_SESSION['userid'];
   $num=$_POST['num'];
   ?>
<meta charset="euc-kr">
<?
   if(!$userid) {
     echo("
	   <script>
	     window.alert('로그인 후 이용해 주세요.')
	     history.go(-1)
	   </script>
	 ");
	 exit;
   }
   
   if(!$ripple_content) {
     echo("
	   <script>
	     window.alert('내용을 입력하세요.')
	     history.go(-1)
	   </script>
	 ");
	 exit;
   }
   
   include "dbconn.php";       

   $sql = "SELECT * from member where id='$userid'";
   $result = mysql_query($sql, $mydb);
   $row = mysql_fetch_array($result);

   $name = $row['name'];
   $nick = $row['nick'];

   $regist_day = date("Y-m-d (H:i)");  

   
   $sql = "INSERT into memo_ripple (parent, id, name, nick, content, regist_day) values('$num', '$userid', '$name', '$nick', '$ripple_content', '$regist_day')";    
   
   mysql_query($sql, $mydb);  
   mysql_close();                
   echo "
	   <script>
	    location.href = 'memo.php';
	   </script>
	";
?>

   
