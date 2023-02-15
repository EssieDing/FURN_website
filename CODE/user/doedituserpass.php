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
include 'function.php';
$uid = $_REQUEST['uid'];



$password = $_REQUEST['password'];
$opassword = $_REQUEST['opassword'];
$s="select * from user where id={$uid}";
$result_page = $conn->query($s);    
$row = $result_page->fetch_assoc();
if($row['pwd']!=$opassword){
   echo "<script>alert('原密码不对');location.href='edps.php'</script>";die;
}

$sql = "update user set pwd = '".$password."' where id = ".$uid;
//写入数据库

//返回状态
if ($result = $conn->query($sql)) {
  // echo "";
  ?>
  <script type="text/javascript">
  $(function() {
alert('Success');
    location.href="center.php?uid=<?php echo $uid?>";
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
