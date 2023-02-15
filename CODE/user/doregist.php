<!DOCTYPE>
<html >
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
header('content-type:text/html;charset=utf-8');
include '../conn.php';
if (!isset($_POST['username'])) {
  echo "请填写用户名！";
  exit;
}
if (!isset($_POST['password'])) {
  echo "请填写密码！";
  exit;
}
if (!isset($_POST['email'])) {
  echo "请填写email！";
  exit;
}
//获取注册表单的数据
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$email = $_REQUEST['email'];


?>

<title>Register</title>
<link rel="stylesheet" type="text/css" href="../css/general.css">
<link rel="stylesheet" type="text/css" href="../css/login.css">
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/general.js"></script>

</head>
<body>
<!-- 头部开始 -->
<div class="header" style="width: 100;">
  <div class="w900 mt30 cut">
   
  </div>
</div>
<!-- 头部结束 -->
<!-- 主体开始 -->
<div class="container w900 mt20">
  <div class="wbox cut">
    <div class="login-banner fl cut"></div>

<?php
$sql = "INSERT INTO user(uname,pwd,email) VALUES('".$username."','".$password."','".$email."')";

if ($conn->query($sql) === TRUE) {
?>
Sucess Please
<a href="login.php">Login</a>！
<?php
} else {
  ?>
  False 
  <a href="regist.php">Register</a>！
  <?php
}

$conn->close();

 ?>

  </div>
</div>
<!-- 主体结束 -->
<div class="cl"></div>
<!-- 页脚开始 -->
<div class="footer mt20">
  <div class="links radius4 mt20">

      </div>

</div><!-- 页脚结束 -->
<script type="text/javascript" src="../js/md5.js"></script>


</body></html>
