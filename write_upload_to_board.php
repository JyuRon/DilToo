<?
session_start();
?>
<meta charset='utf-8'/>
<?include 'head.php';?>
<?include 'menu.php';?>
<?include 'bodyfinish.php';?>
 <?
 $upload_dir='uploads/';
 $upload_file=$upload_dir.$_FILES['SelectFile']['name'];
 $title=htmlspecialchars($_POST['title']);
 $name=$_FILES['SelectFile']['name'];
 $uid=$_FILES['SelectFile']['uid'];
 $error=$_FILES['SelectFile']['size'];
 $content=htmlspecialchars($_POST['content']);
 $content=str_replace("\n", "<br>", $content);
 $nick=$usernick;


 $host="localhost";
 $user="root";
 $password="1234";
 
 $mydb=mysql_connect($host,$user,$password) or die("MySQL에 연결할 수 없습니다.");
 if(!mysql_select_db('mydb',$mydb)) die("데이터베이스를 선택할 수 없습니다.");

 mysql_query("set names euc-kr");

 
if(move_uploaded_file($_FILES['SelectFile']['tmp_name'], $upload_file) || $error==0)
 {
  $sql="INSERT INTO board2(uid,title,content,link,nick) VALUES(NULL,'$title','$content','$upload_file', '$nick')";
  mysql_query($sql,$mydb);

 echo ("

    <html>
<head>
<meta charset='utf-8'/>
  <title>작성한 게시물 보기</title>
</head>

<body>
    <div class='span10'>

      
        <table class='table table-bordered'>
          <tr>
            <center>
              <td class='span1'></td>
              <td></td>


              
            </center>
          </tr>
          <tr>
            <td valign=top class=span'1'></td>
            <td>
              게시물이 정상적으로 등록되었습니다.

            </td>
          </tr>
          <tr>
            <td class='span1'></td>
            <td>
              
              
              
            </td>
          </tr>
        </table>
        <center>
        <div class='btn-group'>
        
        <center>
          <table>
          <div class='btn-group'>
        
       <tr>
     <td><a href='boardlist.php'>목록<a></td>
    </tr>
              
        </div>
       
        </table>
    </center>

</div>
        
      </form>




    </div>
  </center>
  </body>
</html>
    ");
 
}

else
{
  print "<pre>";
  print "파일 업로드 실패";
  print_r($_FILES);
  print "</pre>";
  echo("
    <a href='boardlist.php'><button class='btn'>목록으로</button></a>");

}
 mysql_close($mydb);
?>

