<?
session_start();
?>
<html>
<head>
	<? include "head.php";?>
	<meta charset="utf-8"/>
	<title>게시판 글쓰기</title>
</head>

<body>
	<?include "menu.php";?>


	

	<div class="span10">
	
			<form action='write_upload_to_board.php' enctype="multipart/form-data" method="post">
				<table class="table table-bordered">
					<tr>
						<center>
						<td class="span1">제목</td>
						<td   valign=middle width=250>
							<input  class="span9" type=text size=90 name=title placeholder="제목을 입력하세요">

						</td>
						</center>
					</tr>
					<tr>
						<td valign=top>내용</td>
						<td class>
							<textarea  class="span9"cols=50 rows=30   name=content></textarea>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="MAX_FILE_SIZE" value="300000"/>
							파일첨부:<input name="SelectFile" type="file"/ method="post">
							
						</td>
					</tr>
				</table>
				<table>
				<input type=submit value='글올리기'>
				</form>
				<form method='post' action='boardlist.php'>
				<input type=submit value='취소'>
			</form>
			</table>
		
		

		
	</div>
	</center>

		

	</body>
	</html>