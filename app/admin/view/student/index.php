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
        <a href="?s=admin/grade/index" class="list-group-item ">班级管理</a>
        <a href="?s=admin/student/index" class="list-group-item active">学生管理</a>
    </div>
    <div class="panel panel-primary col-md-10">
        <div class="panel-heading">学生管理</div>
        <div class="panel-body">
            <!-- Table -->
            <table class="table  table-hover">
                <thead>
                <tr>
                    <th>序号</th>
                    <th>学生姓名</th>
                    <th>性别</th>
                    <th>年龄</th>
                    <th>班级名</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $k=>$v){ ?>
                    <tr>
                        <td style="line-height: 30px"><?php echo $v["student_id"]?></td>
                        <td style="line-height: 30px"><?php echo $v["student_name"]?></td>
                        <td style="line-height: 30px"><?php echo $v["student_sex"]?></td>
                        <td style="line-height: 30px"><?php echo $v["student_age"]?></td>
                        <td style="line-height: 30px"><?php foreach ($grade as $key=>$value){if($v['grade_id']==$value['grade_id']){echo $value['grade_name'];}}?></td>
                        <td><div class="btn-group" role="group" aria-label="...">
                                <a href="?s=admin/student/edit&id=<?php echo $v["student_id"]?>"  class="btn btn-primary">修改</a>
                                <a href="javascript:;" onclick="warning(<?php echo $v["student_id"];?>)"  class="btn btn-default" id="<?php echo $v["student_id"];?>">删除</a>
                            </div></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div style="text-align: right;padding:0px 50px 20px 0px"><a href="?s=admin/student/add" class="btn btn-default" >添加学生</a></div>
    </div>
</div>
<?php //include "./static/footer.php"?>

<script>
    function warning(student_id) {
        $("#warning").find(".comfirm").attr('student_id',student_id);
        $("#warning").modal('show');
    }
    function del(obj) {
        // var _this = obj;
        // alert();
        $("#warning").modal('hide');
        var id = $(".comfirm").attr("student_id");
        // alert(id);return;
        $.ajax({
            url:"?s=admin/student/del",
            type:"post",
            data:{id:id},
            success:function (result) {
                $('#'+id).parents('tr').remove();
                return;
            }
        })
    }
</script>

<div class="modal fade" tabindex="-1" role="dialog" id="warning">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">提示：</h4>
            </div>
            <div class="modal-body">
                <p>确认删除？</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary comfirm" onclick="del(this)">确定</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
</html>