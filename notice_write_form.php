<?  
	session_start();  
	include "dbconn.php"; 
	$mode=$_GET['mode'];
	$num=$_GET['num'];
	$table="concert";
	$usernick=$_SESSION['usernick'];
	$userid=$_SESSION['userid'];
	if ($mode=="modify") 
	{ 
	$sql = "SELECT * from $table where num=$num"; 
	$result = mysql_query($sql, $mydb); 

	$row = mysql_fetch_array($result);        

	$item_subject     = $row['subject']; 
	$item_content     = $row['content']; 

	$item_file_0 = $row['file_name_0']; 
	$item_file_1 = $row['file_name_1']; 
	$item_file_2 = $row['file_name_2']; 

	$copied_file_0 = $row['file_copied_0']; 
	$copied_file_1 = $row['file_copied_1']; 
	$copied_file_2 = $row['file_copied_2']; 
	} 
?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
<head> 

<meta charset="utf-8"/> 
<?include "head.php";?>
<?include "menu.php";?>
<?include "bodyfinish.php";?>
<script> 
  function check_input() 
   { 
      if (!document.board_form.subject.value) 
      { 
          alert("제목을 입력하세요!");     
          document.board_form.subject.focus(); 
          return; 
      } 

      if (!document.board_form.content.value) 
      { 
          alert("내용을 입력하세요!");     
          document.board_form.content.focus(); 
          return; 
      } 
      document.board_form.submit(); 
   } 
</script> 
</head> 

<body> 
<div class='span9'>

	<div id="col2"> 
         
	<div id="title"> 
	<img src="./img/title_concert.gif"> 
	</div> 

	<div class="clear"></div> 

	<div id="write_form_title"> 
	<img src="./img/write_form_title.gif"> 
	</div> 

	<div class="clear"></div> 

<? 
	if($mode=="modify") 
	{ 

?> 
	<form  name="board_form" method="post" action="concert_insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data">  
<? 
	} 
	else 
	{ 
?> 
	<form  name="board_form" method="post" action="concert_insert.php?table=<?=$table?>" enctype="multipart/form-data">  
<? 
	} 
?> 
	<div id="write_form"> 
	<div class="write_line"></div> 
	<div id="write_row1"><div class="col1"> 별명 </div><div class="col2"><?=$usernick?></div> 
<? 
	if( $userid && ($mode != "modify") ) 
	{ 
?> 
	<div class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</div> 
<? 
	} 
?> 
	</div> 
	<div class="write_line"></div> 
	<div id="write_row2"><div class="col1"> 제목   </div> 
	                     <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></div> 
	</div> 
	<div class="write_line"></div> 
	<div id="write_row3"><div class="col1"> 내용   </div> 
	                     <div class="col2"><textarea class="span7" rows="14" cols="79" name="content"><?=$item_content?></textarea></div> 
	</div> 
	<table><tr>&nbsp; </tr></table>
	<div class="write_line" ></div> 
	<div id="write_row4"><div class="col1"> 이미지파일1   </div> 
	                     <div class="col2"><input type="file" name="upfile[]"></div> 
	</div> 
	<div class="clear"></div> 
<?  if ($mode=="modify" && $item_file_0) 
	{ 
?> 
	<div class="delete_ok"><?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="0"> 삭제</div> 
	<div class="clear"></div> 
<? 
	} 
?> 
	<div class="write_line"></div> 
	<div id="write_row5"><div class="col1"> 이미지파일2  </div> 
	                     <div class="col2"><input type="file" name="upfile[]"></div> 
	</div> 
<?  if ($mode=="modify" && $item_file_1) 
	{ 
?> 
	<div class="delete_ok"><?=$item_file_1?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="1"> 삭제</div> 
	<div class="clear"></div> 
<? 
	} 
?> 
	<div class="write_line"></div> 
	<div class="clear"></div> 
	<div id="write_row6"><div class="col1"> 이미지파일3   </div> 
	                     <div class="col2"><input type="file" name="upfile[]"></div> 
	</div> 
<?  if ($mode=="modify" && $item_file_2) 
	{ 
?> 
	<div class="delete_ok"><?=$item_file_2?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="2"> 삭제</div> 
	<div class="clear"></div> 
<? 
	} 
?> 
	<div class="write_line"></div> 

	<div class="clear"></div> 
	</div> 

	<div id="write_button"><a href="#"><img src="./img/ok.png" onclick="check_input()"></a>&nbsp; 
	<a href="concert_list.php?table=<?=$table?>&page=<?=$page?>"><img src="./img/list.png"></a> 
	</div> 

	</form> 

	</div> <!-- end of col2 --> 
  </div> <!-- end of content --> 
</div> <!-- end of wrap --> 
</div>

</body> 
</html> 