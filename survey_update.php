<? 
   include "dbconn.php"; 
   $composer=$_POST['composer'];
   
   $sql = "UPDATE survey set $composer=$composer++"; 
   mysql_query($sql,$mydb); 

   mysql_close(); 

   Header("location:survey_result.php"); 
?> 