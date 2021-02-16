<?
     $num=$_GET['num'];
   include "dbconn.php";
 

   $sql = "DELETE from memo where num = $num";
   mysql_query($sql, $mydb);

   mysql_close();

   echo "
	   <script>
	    location.href = 'memo.php';
	   </script>
	";
?>

