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
<?php //include "./static/header.php"?>
<div class="panel panel-primary" style="width: 30%;margin: 100px auto">
    <div class="panel-heading">用户登录</div>
    <div class="panel-body">
        <form method="post" >
            <div class="form-group">
                <label for="exampleInputEmail1">用户名</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="admin_name" placeholder="请输入用户名" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">密码</label>
                <input type="password" class="form-control" id="exampleInputPassword1"  name="admin_password" placeholder="请输入密码" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">验证码</label>
                <div>
                    <input type="text" class="form-control" id="exampleInputPassword2" name="captcha" placeholder="请输入验证码" style="width: 40%;float: left" required>
                    <img onclick="this.src=this.src+'&rand='+Math.random()" src="?s=admin/login/captcha" style="cursor: pointer;margin-left: 20px" /></a>
                </div>
            </div>
<!--            <div class="checkbox">-->
<!--                <label>-->
<!--                    <input type="checkbox"> Check me out-->
<!--                </label>-->
<!--            </div>-->
            <button type="submit" class="btn btn-default" style="margin-top: 20px">登录</button>
        </form>
    </div>
</div>
<?php //include "./static/footer.php"?>
</body>
</html>