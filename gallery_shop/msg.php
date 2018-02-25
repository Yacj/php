<?php
/**
 * Created by PhpStorm.
 * User: a1356
 * Date: 2018/2/25
 * Time: 15:15
 */

$type = isset($_GET['type'])&&in_array(intval($_GET['type']),array(1,2))?intval($_GET['type']):1;
$title = $type == 1 ? '操作成功':'操作失败';
$msg = isset($_GET['msg']) ? trim($_GET['msg']) : '操作成功';
$url = isset($_GET['url'])?trim($_GET['url']):'';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./static/css/common.css">
    <link rel="stylesheet" href="./static/css/done.css">
    <title><?php echo  $title ?></title>
</head>
<body>
<div class="header">
    <div class="logo f1">
        <img src="./static/image/logo.png">
    </div>
    <div class="auth fr">
        <ul>
            <li><a href="#">登录</a></li>
            <li><a href="#">注册</a></li>
        </ul>
    </div>
</div>
<div class="content">
    <div class="center">
        <div class="image_center">
            <?php if($type == 1): ?>
            <span class="smile_face">:)</span>
            <?php else: ?>
                <span class="smile_face">:(</span>
            <?php endif; ?>
        </div>
        <div class="code">
            <?php echo $msg?>
        </div>
        <div class="jump">
            页面在 <strong id="time" style="color: #009f95">3</strong> 秒 后跳转
        </div>
    </div>

</div>
<div class="footer">
    <p><span>M-GALLARY</span>©2017 POWERED BY IMOOC.INC</p>
</div>
<script src="./static/js/jquery-1.10.2.min.js"></script>
<script>
    $(function () {
        var time = 3;
        var url = "<?php echo $url?>"||null;

        setInterval(function () {
            if (time > 1) {
                time --;
                console.log(time);
                $('#time').html(time);
            }
            else {
                $('#time').html(0);
                if (url) {
                    location.href = url;
                }
                else{
                    history.go(-1);
                }

            }
        },1000);
    })
</script>
</body>
</html>


