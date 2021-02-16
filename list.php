<? 
	session_start(); 
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="utf-8">
<?include "head.php";?>
<?include "menu.php";?>
<?include "bodyfinish.php";?>

</head>
<?
$search=$_POST['search'];
$page=$_GET['page'];
$mode=$_GET['mode'];
$find=$_POST['find'];
	include "dbconn.php";

	$scale=10;			
    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "SELECT * from greet where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "SELECT * from greet order by num desc";
	}

	$result = mysql_query($sql, $mydb);

	$total_record = mysql_num_rows($result); 

	
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                
		$page = 1;             
 
	
	$start = ($page - 1) * $scale;      

	$number = $total_record - $start;
?>
<body>
<div class='span10'>

	<div id="col2">
        
		<div id="title">
			<img src="../img/title_greet.gif">
		</div>

		<form  name="board_form" method="post" action="list.php?mode=search"> 
		<div id="list_search">
			<div id="list_search1">▷총 <?= $total_record ?> 개의 게시물이 있습니다..  </div>
			<div id="list_search2"><img src="./img/select_search.gif"></div>
			<div id="list_search3">
				<select name="find">
                    <option value='subject'>제목</option>
                    <option value='content'>내용</option>
                    <option value='nick'>닉네임</option>
                    <option value='name'>이름</option>
				</select></div>
			<div id="list_search4"><input type="text" name="search"></div>
			<div id="list_search5"><input type="image" src="./img/list_search_button.gif"></div>
		</div>
		</form>

		<div class="clear"></div>

		<div id="list_top_title">
			<ul>
				<li id="list_title1"><img src="./img/list_title1.gif"></li>
				<li id="list_title2"><img src="./img/list_title2.gif"></li>
				<li id="list_title3"><img src="./img/list_title3.gif"></li>
				<li id="list_title4"><img src="./img/list_title4.gif"></li>
				<li id="list_title5"><img src="./img/list_title5.gif"></li>
			</ul>		
		</div>

		<div id="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
       
      $row = mysql_fetch_array($result);       
   
	
	  $item_num     = $row['num'];
	  $item_id      = $row['id'];
	  $item_name    = $row['name'];
  	  $item_nick    = $row['nick'];
	  $item_hit     = $row['hit'];

      $item_date    = $row['regist_day'];
	  $item_date = substr($item_date, 0, 10);  

	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

?>
			<div id="list_item">
				<div id="list_item1"><?= $number ?></div>
				<div id="list_item2"><a href="write_view.php?num=<?=$item_num?>&page=<?=$page?>"><?= $item_subject ?></a></div>
				<div id="list_item3"><?= $item_nick ?></div>
				<div id="list_item4"><?= $item_date ?></div>
				<div id="list_item5"><?= $item_hit ?></div>
			</div>
<?
   	   $number--;
   }
?>
			<div id="page_button">
				<div id="page_num"> ◀이전 &nbsp;&nbsp;&nbsp;&nbsp; 
<?
   // °Ô½ÃÆÇ ¸ñ·Ï ÇÏ´Ü¿¡ ÆäÀÌÁö ¸µÅ© ¹øÈ£ Ãâ·Â
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // ÇöÀç ÆäÀÌÁö ¹øÈ£ ¸µÅ© ¾ÈÇÔ
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='list.php?page=$i'> $i </a>";
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;다음▶
				</div>
				<div id="button">
					<a href="list.php?page=<?=$page?>"><img src="../img/list.png"></a>&nbsp;
<? 
	if($userid)
	{
?>
		<a href="write_form.php"><img src="./img/write.png"></a>
<?
	}
?>
				</div>
			</div> 
		
        </div> 

		<div class="clear"></div>

	</div> 
  </div> 
</div> 
</body>
</html>
