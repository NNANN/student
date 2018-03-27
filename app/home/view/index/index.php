<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/3.0.0/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-inverse" style="width: 60%;margin: 0 auto">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">学生信息查看</a>
        </div>
</nav>
<!-- Nav tabs -->
<ul  id="myTabs" class="nav nav-tabs" role="tablist" style="width: 60%;margin: 20px auto">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">查询</a>
    </li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">班级信息</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">学生信息</a></li>
</ul>


<!-- Tab panes -->
<div class="tab-content" style="width: 60%;margin: 0 auto">
    <div role="tabpanel" class="tab-pane active serach" id="home" style="width: 50%;margin: 0 auto;">
        <div class="panel panel-success">
            <div class="panel-heading">搜索</div>
            <form action="" method="post" onsubmit="return serach(this)">
            <div class="row" style="width: 80%;margin: 0 auto">
                <div class="col-lg-12" style="margin: 50px 0px 0px 0px;">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="输入姓名搜索" name="student_name">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">搜索</button>
                        </span>
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-12" style="margin: 50px 0px;">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">班级 <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#" class="selectGrade">不选择</a></li>
                                <?php foreach ($grade as $v){?>
                                <li><a href="#" class="selectGrade" id="<?php echo $v['grade_id']?>"><?php echo $v['grade_name']?></a></li>
                                <?php }?>
                            </ul>
                        </div><!-- /btn-group -->
                        <input type="text" class="form-control" aria-label="..." placeholder="选择班级搜索"  id="grade"  readonly>
                        <input type="text" class="form-control" aria-label="..." placeholder="选择班级搜索" name="grade_id" id="grade_id" style="display: none">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">搜索</button>
                        </span>
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            </form>
        </div>
        <table class="table table-striped table-bordered table-hover" id="ajax"></table>
    </div>
    <div role="tabpanel" class="tab-pane " id="profile" style="width: 90%;margin: 0 auto;">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>班级号</th>
                <th>班级名</th>
            </tr>
            </thead>
            <?php foreach ($grade as $v){?>
                <tr>
                    <td><?php echo $v["grade_id"]?></td>
                    <td><?php echo $v["grade_name"]?></td>
                </tr>
            <?php }?>
        </table>
    </div>
    <div role="tabpanel" class="tab-pane" id="messages" style="width: 90%;margin: 0 auto;">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>学生号</th>
                <th>姓名</th>
                <th>性别</th>
                <th>年龄</th>
                <th>班级</th>
            </tr>
            </thead>
            <?php foreach ($student as $v){?>
                <tr>
                    <td><?php echo $v["student_id"]?></td>
                    <td><?php echo $v["student_name"]?></td>
                    <td><?php echo $v["student_sex"]?></td>
                    <td><?php echo $v["student_age"]?></td>
                    <td><?php foreach ($grade as $value){if($v['grade_id']==$value['grade_id']){echo $value['grade_name'];}}?></td>
                </tr>
            <?php }?>
        </table>
    </div>
</div>


<script>
    $(function () {
        $(".selectGrade").click(function () {
            var value = $(this).html();
            $("#grade").val(value);
            var id = $(this).attr("id");
            // alert(id);
            $("#grade_id").val(id);
        })
    })
    function serach(obj) {
        var data = $(obj).serialize();
        // alert(data);return;
        $.ajax({
            url:"?s=home/index/serach",
            type:"post",
            data:data,
            dataType:'json',
            success:function (res) {
                $(".serach").find("table").html("");
                var html = "        \n" +
                    "            <thead>\n" +
                    "            <tr>\n" +
                    "                <th>学生号</th>\n" +
                    "                <th>姓名</th>\n" +
                    "                <th>性别</th>\n" +
                    "                <th>年龄</th>\n" +
                    "                <th>班级</th>\n" +
                    "            </tr>\n" +
                    "            </thead>";
                $("#ajax").html(html);
                for (var i=0;i<res.length;i++){
                    var html1 = "                <tr>\n"+
"                    <td>"+res[i].student_id+"</td>\n"+
"                    <td>"+res[i].student_name+"</td>\n"+
"                    <td>"+res[i].student_sex+"</td>\n"+
"                    <td>"+res[i].student_age+"</td>\n"+
"                    <td>"+res[i].grade_id+"</td>\n"+
"                </tr>";
                    $("#ajax").find("thead").append(html1);
                }
            }
        });
        return false;
    }
</script>
</body>
</html>







