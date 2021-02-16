<? 
    session_start(); 
?>
<?
$usernick=$_SESSION['usernick'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 

<?include "head.php";?>
<?include "menu.php";?>
<?include "bodyfinish.php";?>
<meta charset="utf-8"/>

</head>

<body>
<div class='span9'>

            <img src="./img/title_greet.gif">
        
        <div class="clear"></div>

        <div id="write_form_title">
            <img src="./img/write_form_title.gif">
        </div>
        <div class="clear"></div>

        <form name="board_form" method="post" action="write_insert.php"> 
        <div id="write_form">
            <div class="write_line"></div>
            <div id="write_row1">
                <div class="col1"> 닉네임 </div>
                <div class="col2"><?=$usernick?></div>
                <div class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</div>
            </div>
            <div class="write_line"></div>
            <div id="write_row2"><div class="col1"> 제목 </div>
             <div class="col2"><input type="text" name="subject"></div>
            </div>
            <div class="write_line"></div>
            <div id="write_row3"><div class="col1"> 내용 </div>
             <div class="col2"><textarea class="span7" rows="14" cols="79" name="content"></textarea></div>
            </div>
            <div class="write_line"></div>
        </div>

        <div id="write_button"><input type="image" src="./img/ok.png"> 
                                <a href="list.php?page=<?=$page?>"><img src="../img/list.png"></a>
        </div>
        </form>

    </div> 
 </div> 
</div> 
</div>

</body>
</html>