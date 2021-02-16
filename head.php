<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all"> 
<link href="../css/greet.css" rel="stylesheet" type="text/css" media="all"> 
<?
  $userid = $_SESSION['userid'];
  $usernick = $_SESSION['usernick'];
  $userlevel = $_SESSION['userlevel'];
?>
<?
    if(!$userid)
   {
?>
          <a style="padding-left:82%" href="login_form.php">로그인</a> | <a href="member_form.php">회원가입</a>
<?
   }
   else
   {
?>
      <div style="padding-left:72%">
      <table>
      <tr>
      <td><code><?=$usernick?> | (level:<?=$userlevel?>)</code></td>
      <td><a href="../login/logout.php">로그아웃</a> | <a href="../login/info.php">정보수정</a></td>
      </tr>
      </table>
      </div>
<?
   }
?>
<style>
	body{
		padding-top:2%;
	}
 	.row {
 		height:40px;
 	}
 	.do
 	{
 		padding:0;
 		margin-left: 
 	}
 	#hat{
 		color:blue;
 	}
 	.btn{
 		
			
			margin: auto;
		}

</style>