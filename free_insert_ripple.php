<? 
   session_start(); 
?> 
<meta charset="euc-kr"> 
<?
$userid=$_SESSION['userid'];
$username=$_SESSION['username'];
$usernick=$_SESSION['usernick'];
$ripple_content=$_POST['ripple_content'];
$table="free_ripple";
$num=$_GET['num'];

   if(!$userid) { 
     echo(" 
	   <script> 
	     window.alert('로그인 후 이용하세요.') 
	     history.go(-1) 
	   </script> 
	 "); 
	 exit; 
   }    
   include "dbconn.php";       // dconn.php 파일을 불러옴 

   $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장 

   // 레코드 삽입 명령 
   $sql = "INSERT into free_ripple (parent, id, name, nick, content, regist_day) values($num, '$userid', '$username', '$usernick', '$ripple_content', '$regist_day')";     
    
   mysql_query($sql, $mydb);  // $sql 에 저장된 명령 실행 
   mysql_close();                // DB 연결 끊기 

   echo " 
	   <script> 
	    location.href = 'free_view.php?table=$table&num=$num'; 
	   </script> 
	"; 
?> 