<?
session_start();
?>
<html>
<head>
<meta charset="utf-8">
</head>
<?include "head.php";?>
<?include "menu.php";?>
<?include "bodyfinish.php";?>
<body>


	<?
	$host = "localhost";
	$user = "root";
	$passwd= "1234";
	$mydb = mysql_connect($host, $user, $passwd)
	or  die ("MySQL에 연결할 수 없습니다.");

	mysql_query("set names euc-kr");

	mysql_select_db('mydb', $mydb); #db선택 


	$sql = "SELECT * FROM board2 order by uid desc";
	$result = mysql_query($sql, $mydb);


	echo("
		
		<div class='span10'>
		<table class='table table-bordered'>

		<tr>
		<form method='post' action='write.php'>
		<input type='submit' value='글 올리기'>
		</form>
		</tr>
	<tr> 

   <td class='span1'><center>번호</center></td> 

   <td class='span6'><center>제목</center></td> 

   <td class='span2'><center>작성자</center></td>

   <td class='span1'><center>조회수</center></td>

 	</tr> 



 
	</table>
</div>
	");
	echo("
		<div class='span10'>
		<table class='table table-bordered'>
		 ");

$i=mysql_num_rows($result);
	while($row_array = mysql_fetch_array($result))
	{
	echo("
		<tr>
		

   <td class='span1'><center>$i</center></td>

   <td class='span6'> <a href='boardlist_check.php?uid=$row_array[uid]'>$row_array[title]</a></td>

   <td class='span2'><center>$row_array[nick]</center></td>
	
   <td class='span1'><center>$row_array[count]</center></td>
   </tr>

  
		 ");
	$i--;
}
mysql_close($mydb);

	?>

</body>
</html>