<?
           session_start();
?>
<meta charset="utf-8"/>
<?
   $id=$_POST['id'];
   $pass=$_POST['pass'];
   if(!$id) {
     echo("
           <script>
             window.alert('아이디를 입력하세요.')
             history.go(-1)
           </script>
         exit;
         ");
   }

   if(!$pass) {
     echo("
           <script>
             window.alert('비밀번호를 입력하세요.')
             history.go(-1)
           </script>
         ");
         exit;
   }

  $mydb=mysql_connect( "localhost", "root", "1234") or  
        die( "SQL server에 접속할 수 없습니다."); 

    mysql_select_db("mydb",$mydb);

   $sql = "select * from member where id='$id'";
   $result = mysql_query($sql, $mydb);

   $num_match = mysql_num_rows($result);

   if(!$num_match) 
   {
     echo("
           <script>
             window.alert('등록되지 않은 아이디입니다.')
             history.go(-1)
           </script>
         ");
    }
    else
    {
        $row = mysql_fetch_array($result);

        $db_pass = $row['pass'];

        if($pass != $db_pass)
        {
           echo("
              <script>
                window.alert('비밀번호가 틀립니다.')
                history.go(-1)
              </script>
           ");

           exit;
        }
        else
        {
           $userid = $row['id'];
		   $username = $row['name'];
		   $usernick = $row['nick'];
		   $userlevel = $row['level'];

           $_SESSION['userid'] = $userid;
           $_SESSION['username'] = $username;
           $_SESSION['usernick'] = $usernick;
           $_SESSION['userlevel'] = $userlevel;

           echo("
              <script>
                location.href = 'boardlist.php';
              </script>
           ");
        }
   }          
?>
