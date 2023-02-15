<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <script src="../js/jquery.js"></script>
</head>
<body>

<?php
include '../conn.php';
//接收变量
$uid = $_REQUEST['uid'];
$gid = $_REQUEST['gid'];
$count = $_REQUEST['count'];

$sql = "update cart set count = '".$count."' where user_id = '".$uid."'and goods_id = '".$gid."' ";
//写入数据库

//返回状态
if ($result = $conn->query($sql)) {
    // echo "";
    ?>
    <script type="text/javascript">
        $(function() {
            alert("Success");
            sleep(300);
            location.href="cart.php?uid=<?php echo $uid?>";
        });

        function sleep(n) { //n表示的毫秒数
            var start = new Date().getTime();
            while (true) if (new Date().getTime() - start > n) break;
        }
    </script>
    <?php
}else {
    echo "False";
}
?>

</body>
</html>