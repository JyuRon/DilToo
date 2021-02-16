<?  
	session_start();  
	$usernick=$_SESSION['usernick'];
	include "dbconn.php"; 
	$num=$_GET['num'];
	$sql = "SELECT * from greet where num=$num"; 
	$result = mysql_query($sql, $mydb); 

	$row = mysql_fetch_array($result);        
	$item_subject     = $row['subject']; 
	$item_content     = $row['content']; 
?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
<head>  
<meta charset="utf-8"/> 
<?include "head.php";?>
<?include "menu.php";?>
<?include "bodyfinish.php";?>

</head> 

<body> 
	<div class="span9">
	<div id="col2">         
	<div id="title"> 
	<img src="./img/title_greet.gif"> 
	</div> 

	<div class="clear"></div> 

	<div id="write_form_title"> 
	<img src="./img/write_form_title.gif"> 
	</div> 

	<div class="clear"></div> 
	<form  name="board_form" method="post" action="write_insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>">  
	<div id="write_form"> 
	<div class="write_line"></div> 
	<div id="write_row1"> 
	<div class="col1"> 닉네임 </div> 
	<div class="col2"><?=$usernick?></div> 
	</div> 
	<div class="write_line"></div> 
	<div id="write_row2"><div class="col1"> 제목   </div> 
	                     <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></div> 
	</div> 
	<div class="write_line"></div> 
	<div id="write_row3"><div class="col1"> 내용   </div> 
	                     <div class="col2"><textarea class="span7" rows="14" cols="79" name="content"><?=$item_content?></textarea></div> 
	</div> 
	<div class="write_line"></div> 
	</div> 

	<div id="write_button"><input type="image" src="./img/ok.png">&nbsp; 
	<a href="list.php?page=<?=$page?>"><img src="./img/list.png"></a> 
	</div> 
	</form> 

	</div> <!-- end of col2 --> 
  </div> <!-- end of content --> 
</div> <!-- end of wrap --> 
</div>
</body> 
</html> 