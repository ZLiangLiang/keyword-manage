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
    <title>修改</title>

</head>
<body>
<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 修改  <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<center>
    <?php
    $con=mysql_connect("localhost","root","root");
    if(!$con){
       die('Could not connect: '.mysql_error());
     } 
    mysql_select_db("keywords",$con);
    mysql_query("set names 'utf8'"); 
    $id=$_GET['id'];
   // var_dump($id);
    $result = mysql_query("SELECT * FROM keyword WHERE id=$id");
    $key = mysql_fetch_row($result);

    if (!$key) {
        die("没有要修改的数据！");}
    ?>
    <form method="post" action="action.php?action=edit">

        <div class="mt-20">
        <table style="margin: 50px 20px 20px 20px" class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
            <thead>
                <tr class="text-c">
                    <!-- <th width="10"><input type="checkbox" name="" value=""></th> -->
                    <th style="width: 100px">关键字</th>
                    <th style="width: 480px">标题</th>
                    <th style="width: 480px">链接</th>
                    <th >操作</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-c">
                        <td ><input style="width: 80px" type="text" value="<?php echo $key[1]?>"/></td>
                        <td ><input style="width: 450px" type="text" name="response" value="<?php echo $key[3]?>" /></td>
                        <td ><input style="width: 450px" type="text" name="url" value="<?php echo $key[2]?>" /></td>
                        <td><input type="submit" value="修改"/>  
                            <input type="reset" value="重置"/>
                        </td>
                </tr>
            </tbody>
        </table>


    </form>

</center>


</script>
</body>
</html>