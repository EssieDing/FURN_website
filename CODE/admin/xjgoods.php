<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <link href="./css/bootstrap.min.css" rel="stylesheet">
  <link href="./css/navbar-fixed-top.css" rel="stylesheet">
  <script type="text/javascript" src="../js/jquery.js">
  </script>
</head>
<body>
<?php
//编辑商品处理逻辑
include '../conn.php';
$gid = $_REQUEST['gid'];
$status = $_REQUEST['status'];
if($status ==1){
  $s=0;
}else{
  $s=1;
}
$sql = "update goods set status='$s' where id =' $gid'";
if ($conn->query($sql)) {
  echo "更新商品成功！正在跳转...";
  ?>
  <script type="text/javascript">
    //休眠5秒，跳转广告列表
    $(function() {
      sleep(500);
      location.href="goodslist.php";
    });

    function sleep(n) { //n表示的毫秒数
           var start = new Date().getTime();
           while (true) if (new Date().getTime() - start > n) break;
       }
  </script>
  <?php
}else {
 echo "更新商品失败请重试！error:update goods_info error!";
}
 ?>
</body>
</html>
