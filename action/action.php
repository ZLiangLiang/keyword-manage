<!DOCTYPE html>
<meta charset="utf-8">
<?php
//1.连接数据库

$con=mysql_connect("localhost","root","root");//选择某个数据库
if(!$con){
	die('Could not connect: '.mysql_error());
}
mysql_select_db("keywords",$con);
mysql_query("set names 'utf8'");//执行sql语句

//2.通过action的值做地应操作

switch($_GET['action']){
    case "add"://增加操作
        $keyword = $_POST['keyword'];
        $response = $_POST['response'];
        $url=$_POST['url'];
        $result = mysql_query("INSERT INTO keyword (keyword,response,url)VALUES('$keyword','$response','$url')");
        if($result){
			 echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
			 echo "<script>alert('增加成功');window.location='add.html'</script>";
        }else{
        	echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
            echo "<script>alert('增加失败');window.history.back();</script>";
        }
        break;

    case "del": //删除操作
        $id = $_GET['id'];
        $result = mysql_query("DELETE FROM keyword WHERE id='$id'");
        if($result){
			 echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
			 echo "<script>alert('删除成功');window.location='welcome.php'</script>";
        }else{
        	echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
            echo "<script>alert('删除失败');window.history.back();</script>";
        }
        break;

    case "edit":

        //1.获取表单信息
        $keyword = $_POST['keyword'];
        $response = $_POST['response'];
        $id = $_POST['id'];
        $url= $_POST['url'];
        $sql = "update keyword set keyword='$keyword',response='$response',url='$url' where id='$id'";
        $result = mysql_query($sql);
        if($result){
        	echo "<meta http-equiv='CSontent-Type'' content='text/html; charset=utf-8'>";
            echo "<script>alert('修改成功');window.location='welcome.php'</script>";
        }else{
        	echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
            echo "<script>alert('修改失败');window.history.back();</script>";
        }
        break;

  //   case "keyword":
  //   	echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
		// $keyword = $_POST['keyword'];	
  //       $result = mysql_query("SELECT * FROM keyword where keyword LIKE '%$keyword%'");
  //       $row = mysql_fetch_array($result);

		// if(!$row){
  //           echo "<script>alert('未找到关键词');window.location='search.html'</script>";
		// }
		// else{
  //           echo"<table width='800' border='1' align='center'>";
  //           echo "<tr>";
  //               echo "<th>ID</th>";
  //               echo "<th>关键字</th>";
  //               echo "<th>响应</th>";   
  //               echo "<th>链接</th>";         
  //           echo "</tr>";
  //           echo"<tr>";
  //               echo "<td>$row[0]</td>";
  //               echo "<td>$row[1]</td>";
  //               echo "<td>$row[2]</td>";
  //               echo "<td>$row[3]</td>";
  //           echo "</tr>";
  //           echo"</table>";
			
		// }

		mysql_close($con);
        break;
}
        
?>
</html>