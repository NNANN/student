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
        <a href="#" class="list-group-item active">信息</a>
        <a href="?s=admin/grade/index" class="list-group-item">班级管理</a>
        <a href="?s=admin/student/index" class="list-group-item">学生管理</a>
    </div>
    <div class="panel panel-primary col-md-10">
        <div class="panel-heading">信息</div>
        <div class="panel-body">
                <!-- Table -->
                <table class="table  table-hover">
                        <thead>
                        <tr>
                            <th>信息</th>
                            <th>详情</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>系统环境</td>
                            <td>apache</td>
                        </tr>
                        <tr>
                            <td>php版本</td>
                            <td>php7.0</td>
                        </tr>
                        <tr>
                            <td>开发者</td>
                            <td>Vzo</td>
                        </tr>
                        <tr>
                            <td>联系方式</td>
                            <td>leishengabc@163.com</td>
                        </tr>
                        </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<?php //include "./static/footer.php"?>
</body>
</html>