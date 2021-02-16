
<html>
<head>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
</head>
<body>
<? include "backup.php"; ?>
	<form enctype="multipart/form-data" action="uploadcheck.php" method="post">

		<table>
			<tr>
				<td width=50>제목</td>
				<td valign=middle width=200>
					<input type=text size=70 name=title>
				</td>
			</tr>

			<tr>
				<td valign=top>내용</td>
				<td>
					<textarea cols=500 rows=10 name=content>내용 입력</textarea>
				</td>
			</tr>

			<tr>
				<td></td>
				<td>
					<input type="hidden" name="MAX_FILE_SIZE" value="3000000"/>
					이파일을 전송합니다 : 
					<input name="SelectFile" type="file"/>
					<td>
					</tr>

				</table>

				<input type=submit value='글 올리기'>
				<input type=reset value='취소'>

			</form>

		</body>
		</html>
