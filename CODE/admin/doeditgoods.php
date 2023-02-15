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

include '../conn.php';
$gid = $_REQUEST['gid'];
$goods_name = $_REQUEST['goods_name'];
$old_price = $_REQUEST['old_price'];
$price = $_REQUEST['price'];
$stuprice = $_REQUEST['stuprice'];
$desc = $_REQUEST['desc'];
$picture = $_REQUEST['picture'];
$status = $_REQUEST['status'];
$cid = $_REQUEST['cid'];
$num = $_REQUEST['num'];
$size = $_REQUEST['size'];
$img = $_REQUEST['image'];
$sql = "update goods set goods_name = ' $goods_name ',price = '$price',stuprice = '$stuprice',old_price = '$old_price',description = '$desc',picture='$picture',status='$status',cid='$cid',size='$size',image='$img',num='$num' where id =' $gid'";
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
