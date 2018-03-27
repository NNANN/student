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
</head>
<body>
<?php include "./static/header.php"?>
<div style="width: 60%;margin: 20px auto">
    <div class="list-group col-md-2 ">
        <a href="#" class="list-group-item ">信息</a>
        <a href="#" class="list-group-item active">班级管理</a>
        <a href="#" class="list-group-item">学生管理</a>
    </div>
    <div class="panel panel-primary col-md-10">
        <div class="panel-heading">班级管理</div>
        <form method="post" class="form-horizontal">
            <div class="panel-body">
                <!-- Table -->

<!--                <div class="form-group">-->
<!--                    <label for="inputEmail3" class="col-sm-2 control-label" >班级号</label>-->
<!--                    <div class="col-sm-10">-->
<!--                        <input type="text" class="form-control" name="grade_id" id="inputEmail3" placeholder="班级号" value="--><?php //echo $data['grade_id']?><!--">-->
<!--                    </div>-->
<!--                </div>-->
                <div class="form-group">
                    <label for="inputEmail4" class="col-sm-2 control-label" >班级名称</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="grade_name" id="inputEmail4" placeholder="班级名称" value="<?php echo $data['grade_name']?>" required>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" style="margin:10px 50px 20px 200px">修改</button>
            <a href="javascript:history.back()" class="btn btn-default" style="margin:10px 50px 20px 20px">返回</a>
        </form>
    </div>
</div>
</div>
<?php //include "./static/footer.php"?>
</body>
</html>