<? 
   session_start(); 
   $num=$_GET['num'];
   $table="qna";
   include "dbconn.php"; 

   $sql = "DELETE from $table where num = $num"; 
   mysql_query($sql, $mydb); 

   mysql_close(); 

   echo " 
	   <script> 
	    location.href = 'qna_list.php?table=$table'; 
	   </script> 
	"; 
?> 