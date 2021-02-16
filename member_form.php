<?
  session_start();
?>
<meta charset="utf-8"/>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<html>
<head> 
<? include 'head.php' ?>
<? include 'menu.php' ?>
<? include 'bodyfinish.php' ?>

<script>
   function check_id()
   {
     window.open("check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=200,top=200,width=200,height=60,scrollbars=no,resizable=yes");
   }

   function check_nick()
   {
     window.open("check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=200,top=200,width=200,height=60,scrollbars=no,resizable=yes");
   }

   function check_input()
   {
     if (!document.member_form.id.value)
      {
          alert("아이디를 입력하시오");    
          document.member_form.id.focus();
          return;
      }

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

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하시오");    
          document.member_form.name.focus();
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


        <form  name="member_form" method="post" action="insert.php"> 
		
<div class='span10'>
<table class="table table-hover">
  <tr>
    <td>* 아이디</td>
    <td><input type="text" name="id"><a href="#"><img src="./img/check_id.jpg" onclick="check_id()"></a>4~12자의 영문 소문자, 숫자와 특수기호(_)만 사용할 수 있습니다.</td>
  </tr>
  <tr>
    <td>* 비밀번호</td>
    <td><input type="password" name="pass"></td>
  </tr>  
  <tr>
    <td>* 비밀번호 확인</td>
    <td><input type="password" name="pass_confirm"></td>
  </tr>
  <tr>
    <td>* 이름</td>
    <td><input type="text" name="name"></td>
  </tr>
  <tr>
    <td>* 닉네임</td>
    <td><input type="text" name="nick"><a href="#"><img src="./img/check_id.jpg" onclick="check_nick()"></a></td>
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
    
		<div id="button"><a style="" href="#" onclick="check_input()">가입하기</a>&nbsp;&nbsp;
		</td>
    <tr>
    <a href="index.php" onclick="reset_form()">취소하기</a>
		</div>
    </td>
    </tr>
      </table>
	    </form>
       
   <!-- end of col2 -->

   <!-- end of content -->

</body>
</html>
<script src="jquery-1.11.2.js"></script>
<script src="bootstrap/js/bootstrap
.min.js"></script>