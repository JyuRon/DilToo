<? 
   session_start(); 
   include "dbconn.php"; 
   $num=$_GET['num'];
   $table="free";
   $sql = "SELECT * from $table where num = $num"; 
   $result = mysql_query($sql, $mydb); 

   $row = mysql_fetch_array($result); 

   $copied_name[0] = $row['file_copied_0']; 
   $copied_name[1] = $row['file_copied_1']; 
   $copied_name[2] = $row['file_copied_2']; 

   for ($i=0; $i<3; $i++) 
   { 
	if ($copied_name[$i]) 
	   { 
	$image_name = "./data/".$copied_name[$i]; 
	unlink($image_name); 
	   } 
   } 

   $sql = "DELETE from $table where num = $num"; 
   mysql_query($sql, $mydb); 

   mysql_close(); 

   echo " 
	   <script> 
	    location.href = 'free_list.php?table=$table'; 
	   </script> 
	"; 
?> 