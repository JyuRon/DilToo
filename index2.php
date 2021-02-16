<? 
	session_start(); 
?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
<head> 
<meta charset="utf-8"/>
<meta http-equiv="Content-Type" content="text/html; "> 

</head> 

<body> 
<?include "head.php";?>
<?include "menu.php";?>
<?include "bodyfinish.php";?>
<div class="span9">
  
	<div class="span9"id="main_img"><img src="./img/main_img.jpg"></div> 

<!-- ÃÖ±Ù ±Û ºÒ·¯¿À±â ½ÃÀÛ --> 
        <? include "func.php"; ?> 

	<div id="latest"> 
	<div id="latest1"> 
	<div id="title_latest1"><img src="./img/title_latest1.gif"></div> 
	   <div class="latest_box"> 
	<? latest_article("concert", 10, 30); ?> 
	</div> 
	</div> 
	<div id="latest2"> 
	<div id="title_latest2"><img src="./img/title_latest2.gif"></div> 
	   <div class="latest_box"> 
	<? latest_article("download", 10, 30); ?> 
	</div> 
	</div>
	<table><tr></tr></table>
	<div id="latest"> 
	<div id="latest1"> 
	<div id="title_latest1"><img src="./img/title_latest1.gif"></div> 
	   <div class="latest_box"> 
	<? latest_article("free", 10, 30); ?> 
	</div> 
	</div> 
	<div id="latest2"> 
	<div id="title_latest2"><img src="./img/title_latest2.gif"></div> 
	   <div class="latest_box"> 
	<? latest_article("qna", 10, 30); ?> 
	</div> 
	</div>

	</div> 
<!-- ÃÖ±Ù ±Û ºÒ·¯¿À±â ³¡ --> 

  </div> <!-- end of content --> 
</div> <!-- end of wrap --> 

</body> 
</html> 