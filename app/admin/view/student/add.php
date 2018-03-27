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
        <a href="?s=admin/index/index" class="list-group-item ">信息</a>
        <a href="?s=admin/grade/index" class="list-group-item ">班级管理</a>
        <a href="?s=admin/student/index" class="list-group-item active">学生管理</a>
    </div>
    <div class="panel panel-primary col-md-10">
        <div class="panel-heading">班级管理</div>
        <div class="panel-body">
            <!-- Table -->
            <form method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">学生姓名</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="学生姓名" name="student_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">学生年龄</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="学生年龄" name="student_age">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">学生性别</label>
                    <div class=" col-sm-10">
                        <label class="radio-inline">
                            <input type="radio" name="student_sex" id="inlineRadio1" value="男"> 男
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="student_sex" id="inlineRadio2" value="女"> 女
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">学生班级</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="grade_name">
                            <?php foreach ($data as $k=>$v){ ?>
                            <option value="<?php echo $v['grade_name']?>"><?php echo $v['grade_name']?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" style="margin:10px 50px 20px 20px">提交</button>
                        <a href="javascript:history.back()" class="btn btn-default" style="margin:10px 50px 20px 20px">返回</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php //include "./static/footer.php"?>
</body>
</html>