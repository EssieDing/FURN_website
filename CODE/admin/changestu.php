<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<script src="./js/bootstrap.min.js"></script>
<script src="../js/jquery.js"></script>
<body>
</body>
</html>
<?php
include '../conn.php';
$uid = $_GET['uid'];
$type = $_GET['st'];
$sql = "update user set type = '".$type."' where id = ".$uid;
if ($conn->query($sql)) {
    echo "更新用户成功！正在跳转...";
    ?>
    <script type="text/javascript">
        //休眠5秒，跳转广告列表
        $(function() {
            sleep(500);
            location.href=" userlist.php";
        });

        function sleep(n) { //n表示的毫秒数
            var start = new Date().getTime();
            while (true) if (new Date().getTime() - start > n) break;
        }
    </script>
    <?php
}else {
    echo "更新用户失败请重试！error:update article error!";
}