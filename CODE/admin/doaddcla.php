<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <script type="text/javascript" src="../js/jquery.js"></script>
</head>
<body>
<?php
include '../conn.php';
$advsname = $_REQUEST['advsname'];
$pid = $_REQUEST['pid'];
//拼装sql
$sql = "insert into class(name,pid) values('".$advsname."','".$pid."')";
//写入数据库
if ($conn->query($sql)==TRUE) {
  echo "添加分类成功！正在跳转...";
  ?>
  <script type="text/javascript">
  //休眠5秒，跳转广告列表
  $(function() {
  sleep(500);
  location.href="classlist.php";
  });

  function sleep(n) { //n表示的毫秒数
   var start = new Date().getTime();
   while (true) if (new Date().getTime() - start > n) break;
  }
  </script>
  <?php
}else {
  echo "添加失败请重试！";
}
//返回状态

  ?>
  </body>
</html>
