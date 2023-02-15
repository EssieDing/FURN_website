<?php
session_start();
header('content-type:text/html;charset=utf-8');
include '../conn.php';

$uname = $_REQUEST['username'];
$pwd = $_REQUEST['password'];
$sql = "SELECT * FROM user where uname = '".$uname."' and pwd = '".$pwd."'";

$result = $conn->query($sql);
$uid='';

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  	
    // 存储 session 数据
    $uid = $row['id'];
    $_SESSION['uid'.$uid]=$uid;
    $_SESSION['uid']=$uid;
    $_SESSION['un']=$row['uname'];
    $_SESSION['type']=$row['type'];

  }

header("Location: ../index.php?uid=".$uid);
exit;

  }else {
echo 'False';
  }
?>
