<?php
session_start();
header('content-type:text/html;charset=utf-8');
include '../conn.php';
if (!isset($_REQUEST['uid'])||!isset($_REQUEST['gid'])||!isset($_REQUEST['count'])) {
  echo "非法访问！";
  exit;
}
if(empty($_REQUEST['uid'])){
  echo "Please Login";
  exit;
}
$uid=$_REQUEST['uid'];
$gid = $_REQUEST['gid'];
$count = $_REQUEST['count'];
$price = $_REQUEST['price'];
$size = $_REQUEST['size'];
$sql = "SELECT * FROM user where id = ".$uid;
$result = $conn->query($sql);
$sg="select * from goods where id ={$gid}";
$rg = $conn->query($sg);
$g= $rg->fetch_assoc();
if($g['num']<=0){
  echo 'Not enough';die;
}
if ($result->num_rows <= 0) {
echo 'Please Lough';
exit;
  }
?>
<!DOCTYPE>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Order</title>
  <link rel="stylesheet" type="text/css" href="../css/general.css">
  <link rel="stylesheet" type="text/css" href="../css/index.css">
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/general.js"></script>
  <script type="text/javascript" src="../js/carousel.js"></script>
</head>
<body>

<div class="container w1100">
      <?php
      $sql = "INSERT INTO cart(user_id,goods_id,count,price,size) VALUES(".$uid.",".$gid.",".$count.",".$price.",'".$size."')"; 
      if ($conn->query($sql) === TRUE) {
          echo "Success";
          ?>
          <script type="text/javascript">
          //休眠5秒，跳转广告列表
          $(function() {
          sleep(500);
          location.href="../goods.php?id=<?php echo $gid?>&uid=<?php echo $uid ?>";
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
</div>

