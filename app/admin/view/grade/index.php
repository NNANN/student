<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Document</title>
    <!--    <style>-->
    <!--        .list-group a{-->
    <!--            height: 60px;-->
    <!--            line-height: 40px;-->
    <!--            font-size: 20px;-->
    <!--        }-->
    <!--    </style>-->
</head>
<body>
<?php include "./static/header.php"?>
<div style="width: 60%;margin: 20px auto">
    <div class="list-group col-md-2 ">
        <a href="?s=admin/index/index" class="list-group-item ">信息</a>
        <a href="#" class="list-group-item active">班级管理</a>
        <a href="?s=admin/student/index" class="list-group-item">学生管理</a>
    </div>
    <div class="panel panel-primary col-md-10">
        <div class="panel-heading">班级管理</div>
        <div class="panel-body">
            <!-- Table -->
            <table class="table  table-hover">
                <thead>
                <tr>
                    <th>班级号</th>
                    <th>班级名</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $k=>$v){ ?>
                <tr>
                    <td style="line-height: 30px"><?php echo $v["grade_id"]?></td>
                    <td style="line-height: 30px"><?php echo $v["grade_name"]?></td>
                    <td><div class="btn-group" role="group" aria-label="...">
                            <a href="?s=admin/grade/edit&id=<?php echo $v["grade_id"]?>"  class="btn btn-primary">修改</a>
                            <a href="javascript:;" onclick="del(this,<?php echo $v["grade_id"]?>)"  class="btn btn-default">删除</a>
                        </div></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div style="text-align: right;padding:0px 50px 20px 0px"><a href="?s=admin/grade/add" class="btn btn-default" >添加班级</a></div>
    </div>
</div>
<?php //include "./static/footer.php"?>

<script>
    function del(obj,id) {
        var _this = obj;
        $.ajax({
            url:"?s=admin/grade/del",
            type:"post",
            data:{id:id},
            success:function (result) {
                $(_this).parents('tr').remove();
                if(result==1){
                    alert("删除成功");
                }
            }
        })
    }
</script>
</body>
</html>