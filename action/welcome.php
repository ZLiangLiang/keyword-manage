<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="stylesheet" type="text/css" href="../static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="../static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="../lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="../static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="../static/h-ui.admin/css/style.css" />
<script>
	function doDel(id) {
            if (confirm("确定要删除么？")) {
                window.location = 'action.php?action=del&id=' + id;
            } 
        }
</script>
<title>关键字列表</title>
</head>
<body>
<div class="page-container">
	<form method="post" action="search.php">
		<div class="text-c">	
			<input type="text" name="keyword" id="" placeholder=" 搜索" style="width:250px" class="input-text">
			<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜关键字</button>
		</div>
	</form>
	<p class="f-20 text-success">关键字列表</p>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr class="text-c">
				<th >编号</th>
				<th >关键字</th>
				<th >标题</th>
				<th >链接</th>
				<th >操作</th>
			</tr>
		</thead>
		<tbody>
		<?php
        //1.连接数据库
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=keywords;", "root", "root");
        } catch (PDOException $e) {
            die("数据库连接失败" . $e->getMessage());
        }
        //2.解决中文乱码问题
        $pdo->query("SET NAMES 'UTF8'");
        //3.执行sql语句，并实现解析和遍历
        $sql = "SELECT * FROM keyword ";
        foreach ($pdo->query($sql) as $row) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['keyword']}</td>";
            echo "<td>{$row['response']}</td>";
            echo "<td>{$row['url']}</td>";
            echo "<td>
                    <a href='javascript:doDel({$row['id']})'>删除</a>
                    <a href='edit.php?id={$row["id"]}'>修改</a>
                  </td>";
            echo "</tr>";
        }


		
        ?>
		</tbody>
	</table>
	    

	
<footer class="footer mt-20">
	<div class="container">
		<p></p>
	</div>
</footer>
<script type="text/javascript" src="../lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="../static/h-ui/js/H-ui.min.js"></script> 


</body>
</html>