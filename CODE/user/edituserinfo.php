<?php
session_start();
include '../conn.php';
$uid=$_REQUEST['uid'];

$sql = "SELECT * FROM user where id = '".$uid."'";
$result = $conn->query($sql);

if ($result->num_rows <= 0) {

echo '请先注册或登录！';
exit;
  }

?>
<!DOCTYPE>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Edit</title>
  <link rel="stylesheet" type="text/css" href="../css/general.css">
  <link rel="stylesheet" type="text/css" href="../css/index.css">
    <link rel="stylesheet" type="text/css" href="../css/table.css">
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/general.js"></script>
  <script type="text/javascript" src="../js/carousel.js"></script>
</head>
<body>
<!-- 顶部开始 -->

<!-- 头部开始 -->
<?php include '1header.php'; ?>
<!-- 头部结束 -->
<!-- 主体开始 -->
<div class="container w1100">
      <br>  <br>  <br>  <br>
      <p style="font-size:30px">
<?php

while($row = $result->fetch_assoc()) {
 ?>
 <form class="" action="doedituserinfo.php?uid=<?php echo $uid?>" method="post">
<table  width="100%">
  <tr>
    <td>username</td>
    <td><input type="text" name="username" value="<?php echo $row['uname']?>"></td>
  </tr>
  <tr>
    <td>password</td>
    <td><input type="password" name="password" value="<?php echo $row['pwd']?>"></td>
  </tr>
  <tr>
    <td>Phone：</td>
    <td><input type="text" name="tel" value="<?php echo $row['tel']?>"></td>
  </tr>
  <tr>
    <td>Sex：</td>
    <td>
      <select class="" name="sex">
        <option value="0">Woman</option>
        <option value="1">Man</option>
      </select>
    </td>
  </tr>
  <tr>
    <td>Email：</td>
    <td><input type="text" name="email" value="<?php echo $row['email']?>"></td>
  </tr>
  <tr>
    <td>Address：</td>
    <td>
    <input type="text" name="address" value="<?php echo $row['address']?>">
    </td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="" value="更新" style="background: #bf0017;color: #fff;padding:8px 30px;border: 0;border-radius: 8px;"></td>
  </tr>
</table>

</form>
<?php } ?>
 </p>

</div>
<!-- 页脚开始 -->
<div class="footer mt20">
<script type="text/javascript" src="../images/juicer.js"></script>
</body></html>
