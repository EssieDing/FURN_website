<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>DEL</title>
    <script src="../js/jquery.js"></script>
</head>
<body>

<?php
include '../conn.php';

$uid = $_REQUEST['uid'];
$gid = $_REQUEST['gid'];
$sql = "delete from cart where user_id = '$uid'and goods_id = '$gid'";
if ($conn->query($sql)) {
    echo "Success";
    ?>
    <script type="text/javascript">
        //休眠5秒，跳转广告列表
        $(function() {
            sleep(500);
            location.href="cart.php?uid=<?php echo $uid ?>";
        });

        function sleep(n) { //n表示的毫秒数
            var start = new Date().getTime();
            while (true) if (new Date().getTime() - start > n) break;
        }
    </script>
    <?php
}else {
    echo "false";
}

?>
</body>
</html>
