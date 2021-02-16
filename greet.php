<? 
	session_start(); 
	
	$scale=5;			//한 화면에 표시되는 글의 개수
	include "dbconn.php";
	$page=$_GET['page'];
	$sql = "SELECT * from memo order by num desc"; //내림차순 정렬
	$result = mysql_query($sql, $mydb);

	$total_record = mysql_num_rows($result); //전체 글의 개수

	//전체 페이지 수($total_page)계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      //floor : 소수점 이하를 절삭하는 함수
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호가 0일떄
		$page = 1;              
 
	// 페이지번호 ($page)에 따른 시작레코드($start)계산 
	$start = ($page - 1) * $scale;      

	$number = $total_record - $start;
?>
<?
 $userid=$_SESSION['userid'];
 $username=$_SESSION['username'];
 $usernick=$_SESSION['usernick'];
 $userlevel=$_SESSION['userlevel'];
?>
<?include "head.php";?>
<?include "menu.php";?>
<?include "bodyfinish.php";?>
<html>
<head> 

<meta charset='utf-8'/>
</head>

<body>
<div class='span10'>
<img src="./img/title_memo.gif"> <br>
		

		
       	<form   method="post" action="memo_insert.php"> 
			
			<textarea class='span9' rows="6" cols="95" name="content"></textarea>
			<input type="image" src="./img/memo_button.gif">
		</form>	

<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      $row = mysql_fetch_array($result);       
	
	  $memo_id      = $row[id];
	  $memo_num     = $row[num];
      $memo_date    = $row[regist_day];
	  $memo_nick    = $row[nick];

	  $memo_content = str_replace("\n", "<br>", $row[content]);
	  $memo_content = str_replace(" ", "&nbsp;", $memo_content);
?>
	
		<table class='table table-striped'>
		<tr><code><?= $number.번 ?></code>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?= $memo_nick ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?= $memo_date ?>
		
			 <? 
					if($userid=="admin" || $userid==$memo_id)
			          echo "<a href='memo_delete.php?num=$memo_num'>[삭제]</a>"; 
			  ?>
		
				
			</td>
		</tr>
		<tr><td><?= $memo_content ?></td></tr>
		<tr>
		<td>
<?
	    $sql = "SELECT * from memo_ripple where parent='$memo_num'";
	    $ripple_result = mysql_query($sql,$mydb);

		while ($row_ripple = mysql_fetch_array($ripple_result))
		{
			$ripple_num     = $row_ripple[num];
			$ripple_id      = $row_ripple[id];
			$ripple_nick    = $row_ripple[nick];
			$ripple_content = str_replace("\n", "<br>", $row_ripple[content]);
			$ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
			$ripple_date    = $row_ripple[regist_day];
?>
				
				<ul class="inline">
				<li><abbr title="HyperText Markup Language" class="initialism">●<?= $ripple_nick ?> &nbsp;&nbsp;&nbsp; <?= $ripple_date ?></abbr></li>
				<li>
					<? 
						if($userid=="admin" || $userid==$ripple_id)
				            echo "<a href='memo_delete_ripple.php?num=$ripple_num'>삭제</a>";
					?>
				</li>
				</ul>
				</div>
				<div id="ripple_content"> <?= $ripple_content ?></div>
<?
		}
?>
		</td>
		</tr>
		<tr>
			<td>
				
				<form  name="ripple_form" method="post" action="memo_insert_ripple.php"> 
				<input type="hidden" name="num" value="<?= $memo_num ?>"> 
				
						<textarea class='span8' rows="3" cols="80" name="ripple_content"></textarea>
					
					<input type="image" src="./img/memo_ripple_button.png"></div>
				
				</form>


  		    <div class="clear"></div>
			<div class="linespace_10"></div>
<?
		$number--;
	 }
	 mysql_close();
?>
			</td>
		</tr>
		</table>
	
	 
	<center>

			 ◀이전 &nbsp;&nbsp;&nbsp;&nbsp; 
<?
   // 게시판 목록 하단에 페이지 번호 링크 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     //현재페이지 번호는 링크 표시 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='memo.php?page=$i'> $i </a>";
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp; 다음▶</div>
			</center>
</div>
</body>
</html>
