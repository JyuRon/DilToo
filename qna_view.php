<?  
	session_start();  
	include "dbconn.php"; 
	$table="qna"; 
	$num=$_GET['num']; 
	$userid=$_SESSION['userid'];
	$sql = "SELECT * from $table where num=$num"; 
	$result = mysql_query($sql, $mydb); 
    $row = mysql_fetch_array($result);        

	$item_num     = $row['num']; 
	$item_id      = $row['id']; 
	$item_name    = $row['name']; 
    $item_nick    = $row['nick']; 
	$item_hit     = $row['hit']; 
    $item_date    = $row['regist_day']; 
	$item_subject = str_replace(" ", "&nbsp;", $row['subject']); 
	$item_content = $row['content']; 
	$is_html      = $row['is_html']; 

	if ($is_html!="y") 
	{ 
	$item_content = str_replace(" ", "&nbsp;", $item_content); 
	$item_content = str_replace("\n", "<br>", $item_content); 
	} 

	$new_hit = $item_hit + 1; 
	$sql = "UPDATE $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴 
mysql_query($sql, $mydb); 
?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
<head>  
<meta charset="utf-8"/> 
<? include "head.php" ?>
<? include "menu.php" ?>
<? include "bodyfinish.php" ?>
<script> 
    function del(href)  
    { 
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) { 
                document.location.href = href; 
        } 
    } 
</script> 
</head> 

<body> 
<div class="span9">

	<div id="col2"> 
	<div id="title"> 
	<img src="./img/title_qna.gif"> 
	</div> 

	<div id="view_comment"> &nbsp;</div> 

	<div id="view_title"> 
	<div id="view_title1"><?= $item_subject ?></div><div id="view_title2"><?= $item_nick ?> | 조회 : <?= $item_hit ?>   
	                      | <?= $item_date ?> </div> 
	</div> 

	<div id="view_content"> 
	<?= $item_content ?> 
	</div> 

	<div id="view_button"> 
	<a href="qna_list.php?table=<?=$table?>&page=<?=$page?>"><img src="./img/list.png"></a>&nbsp; 
<?  
	if($userid && ($userid==$item_id) ) 
	{ 
?> 
	<a href="qna_write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>"><img src="./img/modify.png"></a>&nbsp; 
	<a href="javascript:del('qna_delete.php?table=<?=$table?>&num=<?=$num?>')"><img src="./img/delete.png"></a>&nbsp; 
<? 
	} 
?> 
<?  
	if($userid) 
	{ 
?> 
	<a href="qna_write_form.php?table=<?=$table?>&mode=response&num=<?=$num?>&page=<?=$page?>"><img src="./img/response.png"></a>&nbsp; 
	<a href="qna_write_form.php?table=<?=$table?>"><img src="./img/write.png"></a> 
<? 
	} 
?> 
	</div> 
	<div class="clear"></div> 

	</div> <!-- end of col2 --> 
  </div> <!-- end of content --> 
</div> <!-- end of wrap --> 

</body> 
</html> 