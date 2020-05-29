<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
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
    <title>搜索</title>

</head>
<body>
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 搜索  <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<center>

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
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=keywords;", "root", "root");
        } catch (PDOException $e) {
            die("数据库连接失败" . $e->getMessage());
        }
        $keyword = $_POST['keyword'];   
        $sql="SELECT * FROM keyword where keyword LIKE '%$keyword%'";

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

</center>


</script>
</body>
</html>