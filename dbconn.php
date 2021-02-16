<?
	$host = "localhost";
	$user = "root";
	$passwd= "1234";
	$mydb = mysql_connect($host, $user, $passwd)
	or  die ("MySQL에 연결할 수 없습니다.");

	mysql_query("set names euc-kr");

	mysql_select_db('mydb', $mydb); #db선택 

?>