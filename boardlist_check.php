<?
	$uid = $_GET['uid'];
	$host="localhost";
	$user="root";
	$password="1234";
	
	$mydb=mysql_connect($host,$user,$password) or die("MySQL에 연결할 수 없습니다.");
	//mysql_query("set names euckr");
	if(!mysql_select_db('mydb',$mydb)) die("데이터베이스를 선택할 수 없습니다.");


	$sql="SELECT * FROM board2 WHERE uid=$uid";
	$result=mysql_query($sql,$mydb);
	$row_array=mysql_fetch_array($result);
	$title=$row_array['title'];
	$uid=$row_array['uid'];
	$content=$row_array['content'];
	$link=$row_array['link'];
	$count=$row_array['count'];
	$filename=$_FILES['SelectFile']['name'];

?>
		<html>
		<head>
		<style>
		</style>
		<meta charset='utf-8'/>
			<title>작성한 게시물 보기</title>
		</head>
		<?include 'head.php';?>
		<?include 'menu.php';?>
		<?include 'bodyfinish.php';?>
		<body>
			<div class='span10'>


				<table class='table table-bordered'>
					<tr>
						<center>
							<td class='span1'>제목</td>
							<td><?=$title?></td>



						</center>
					</tr>
					<tr>
						<td valign=top class=span'1'>내용</td>
						<td>
						<frameset>
								<?=$content?>
						</frameset>
						</td>
					</tr>
					<tr>
						<td class='span1'>파일</td>
						<td>

							<a href=<?=$link?>><? print "$filename"; ?></a>

						</td>
					</tr>
				</table>
				<center>
					<table>
					<div class='btn-group'>
				<a href='boardlist_check_change.php?uid=<?=$uid?>'><button class='btn'>수정</button></a> 
				<a href='boardlist_check_delete.php?uid=<?=$uid?>'><button class='btn'>삭제</button></a>
				<a href='boardlist.php'><button class='btn'>목록</button></a>
							
				</div>
       
        </table>
		</center>
		<body>
			<html>

			<?
			$count+=1;
	$sql="UPDATE board2 SET count=$count WHERE uid=$uid";
	$result2=mysql_query($sql,$mydb);
	mysql_close($mydb);
	?>

