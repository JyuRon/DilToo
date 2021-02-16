<? 
   session_start(); 

   include "dbconn.php"; 
   $num=$_GET['num'];
   $sql = "DELETE from greet where num = $num"; 
   mysql_query($sql, $mydb); 

   mysql_close(); 

   echo " 
	   <script> 
	    location.href = 'list.php'; 
	   </script> 
	"; 
?> 
