<? include 'head.php';?>
<?include 'menu.php';?>
<? include 'bodyfinish.php';?>
<?
	$uid=$_GET['uid'];
	$host="localhost";
	$user="root";
	$password="1234";
	$mydb=mysql_connect($host,$user,$password) or die("MySQL에 연결할 수 없습니다.");
	mysql_query("set names euckr");
	if(!mysql_select_db('mydb',$mydb)) die("데이터베이스를 선택할 수 없습니다.");


	$sql="DELETE FROM board2 WHERE uid=$uid";
	$result=mysql_query($sql,$mydb);
	$row_array=@mysql_fetch_array($result);

	echo("

	   <html>
<head>
<meta charset='utf-8'/>
  <title>삭제</title>
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
              게시물이 정상적으로 삭제되었습니다.
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
	mysql_close($mydb);
?>