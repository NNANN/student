<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="jumbotron" style="text-align: center">
    <h1><?php echo $this->msg;?></h1>
    <p></p>
    <p><a class="btn btn-primary btn-lg" href="<?php echo $this->url;?>" role="button"><span>2</span>秒后返回上一页</a></p>
</div>
<!--<h1>--><?php //echo $this->msg;?><!--</h1>-->
<!--<a href="--><?php //echo $this->url;?><!--"><span>2</span>秒后返回上一页</a>-->
<script>
    var second = document.getElementsByTagName("span")[0];
    var sec = second.innerHTML;
    setInterval(function () {
        sec--;
        second.innerHTML=sec;
        if(sec==0){
            location.href="<?php echo $this->url;?>"
        }
    },1000)
</script>
</body>
</html>