<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>更新结果</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/navbar-fixed-top.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery.js">
    </script>
  </head>
  <body>

<?php
include '../conn.php';
//获取内容
$uid = $_REQUEST['uid'];
$status = $_REQUEST['status'];
$content = $_REQUEST['content'];
$sql = "update comment set status = '".$status."',content = '".$content."' where id = ".$uid;
//写入数据库
if ($conn->query($sql)) {
  echo "更新评价成功！正在跳转...";
  ?>
  <script type="text/javascript">
    //休眠5秒，跳转用户列表
    $(function() {
      sleep(500);
      location.href="comment.php";
    });

    function sleep(n) { //n表示的毫秒数
           var start = new Date().getTime();
           while (true) if (new Date().getTime() - start > n) break;
       }
  </script>
  <?php
}else {
 echo "更新评价失败请重试！error:update goods_info error!";
}?>

  </body>
</html>
