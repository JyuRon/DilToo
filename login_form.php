<? 
  session_start(); 
?>
<?include "head.php";?>
<?include "menu.php";?>
<?include "bodyfinish.php";?>

<html>
<head> 
	<meta charset="utf-8"/>

</head>

<body>
	<div class='span1'></div>
	<div class='span1'>
	<center><input type="image" src="./img/login_key.gif"></center>
		
	</div>
	<div class='span6'>

		<form class="form-horizontal" name="member_form" method="post" action="login.php">
  <div class="control-group">
    <label class="control-label" for="inputEmail">아이디</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="ID" name="id">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">페스워드</label>
    <div class="controls">
      <input type="password" id="inputPassword" placeholder="Password" name="pass">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <label class="checkbox">
        <input type="checkbox"> 아이디를 저장하시겠습니까?
      </label>
      <button type="submit" class="btn">로그인</button>
    </div>
  </div>
</form>


</div> 




</body>
</html>