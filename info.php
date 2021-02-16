<?
  session_start();
?>
<?
	$host = "localhost";
	$user = "root";
	$passwd= "1234";
	$mydb = mysql_connect($host, $user, $passwd)
	or  die ("MySQL에 연결할 수 없습니다.");

	mysql_query("set names euc-kr");

	mysql_select_db('mydb', $mydb); 

	$id=$_SESSION['userid'];
	$sql = "SELECT * FROM member WHERE id='$id'" ;
	$result = mysql_query($sql,$mydb);
	$row_array = mysql_fetch_array($result);


?>
<html>
	<head>
		<meta charset="utf-8"/>
		<? include 'head.php' ?>
		<? include 'menu.php' ?>
		<? include 'bodyfinish.php' ?>

    <script>

  
   function check_nick()
   {
     window.open("check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=200,top=200,width=200,height=60,scrollbars=no,resizable=yes");
   }

   function check_input()
   {

      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하시오");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호 확인을 입력하시오");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하시오");    
          document.member_form.nick.focus();
          return;
      }


      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하시오");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n 다시 입력해주세요");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }
       
      document.member_form.submit();
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
    
      document.member_form.id.focus();

      return;
   }
</script>
	</head>
	<body>


        <form  name="member_form" method="post" action="info_insert.php"> 
		
<div class='span10'>
<table class="table table-hover">
  <tr>
    <td>* 아이디</td>
    <td><?=$row_array['id']?></td>
  </tr>
  <tr>
    <td>* 비밀번호</td>
    <td><input type="password" name="pass" value=<?=$row_array['pass']?>></td>
  </tr>  
  <tr>
    <td>* 비밀번호 확인</td>
    <td><input type="password" name="pass_confirm" value=<?=$row_array['pass']?>></td>
  </tr>
  <tr>
    <td>* 이름</td>
    <td><?=$row_array['name']?></td>
  </tr>
  <tr>
    <td>* 닉네임</td>
    <td><input type="text" name="nick" value=<?=$row_array['nick']?>><a href="#"><img src="./img/check_id.jpg" onclick="check_nick()"></a></td>
  </tr>
  <tr>
    <td>* 휴대폰</td>
    <td><select class="hp" name="hp1"> 
              <option value='010'>010</option>
              <option value='011'>011</option>
              <option value='016'>016</option>
              <option value='017'>017</option>
              <option value='018'>018</option>
              <option value='019'>019</option>
              </select>  - <input type="text" class="hp" name="hp2"> - <input type="text" class="hp" name="hp3"></td>
  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;이메일</td>
    <td><input type="text" id="email1" name="email1"> @ <input type="text" name="email2"></td>
  </tr>

  
		
    <tr>
    <td>
    
		<div id="button"><a style="" href="#" onclick="check_input()">수정하기</a>&nbsp;&nbsp;
		                 <a href="index.php" onclick="reset_form()">취소하기</a>
		</div>
    </center>
 
      </table>
	    </form>
       
   <!-- end of col2 -->

   <!-- end of content -->

</body>
</html>
