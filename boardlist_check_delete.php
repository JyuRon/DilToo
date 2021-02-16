<? include 'head.php';?>
<?include 'menu.php';?>
<? include 'bodyfinish.php';?>
<?
	$uid=$_GET['uid'];
	?>
	


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
              삭제 하시겠습니까?
            </td>
          </tr>
          <tr>
            <td class='span1'></td>
            <td>
              
              
              
            </td>
          </tr>
        </table>
   
        
        <center>
          <table>
          <div class='btn-group'>
		<tr>
        <a href='boardlist_check_delete_completed.php?uid=<?=$uid?>'><button class='btn'>삭제</button></a> 
		<a href='boardlist_check.php?uid=<?=$uid?>'><button class='btn'>취소</button></a>
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
