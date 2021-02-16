<? include 'head.php';?>
<?include 'menu.php';?>
<? include 'bodyfinish.php';?>
<?
	$uid=$_GET['uid'];
	$host="localhost";
	$user="root";
	$password="1234";
	$mydb=mysql_connect($host,$user,$password) or die("MySQL에 연결할 수 없습니다.");
	mysql_query("set names euc-kr");
	if(!mysql_select_db('mydb',$mydb)) die("데이터베이스를 선택할 수 없습니다.");


	$sql="SELECT * FROM board2 WHERE uid=$uid";
	$result=mysql_query($sql,$mydb);
	$row_array=mysql_fetch_array($result);
	echo("
<html>
<head>
	
	<meta charset='utf-8'/>
	<title>게시판 글쓰기</title>
</head>

<body>
	


	

	<div class='span10'>
	
			<form action='boardlist_check_change_save.php' enctype='multipart/form-data' method='post'>
				<table class='table table-bordered'>
					<tr>
						<center>
						<td class='span1'>제목</td>
						<td   valign=middle width=250>
							<input  class='span9' type=text size=90 name=title value='$row_array[title]'>

						</td>
						</center>
					</tr>
					<tr>
						<td valign=top>내용</td>
						<td class>
							<textarea  class='span9'cols=50 rows=30   name=content>$row_array[content]</textarea>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type='hidden' name='MAX_FILE_SIZE' value='300000'/>
							파일첨부:<input name='SelectFile' type='file'/>

							
						</td>
					</tr>
				</table>
				<table>
				<input type=hidden name=uid value=$uid>
				<input type=submit value='수정'>
				</form>
				<form method='post' action='boardlist.php'>
				<input type=submit value='취소'>
			</form>
			</table>
		
		

		
	</div>
	</center>
		

	</body>
	</html>");
?>
