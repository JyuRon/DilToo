<? 
      include "dbconn.php"; 
      $ripple_num=$_GET['ripple_num'];
      $num=$_GET['num'];
  	  $table="free_ripple";
      $sql = "DELETE from free_ripple where num=$ripple_num"; 
      mysql_query($sql, $mydb); 
      mysql_close(); 

      echo " 
	   <script> 
	    location.href = 'free_view.php?table=$table&num=$num'; 
	   </script> 
	  "; 
?> 