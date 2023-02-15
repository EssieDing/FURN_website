<?php
session_start();
include '../conn.php';
$uname = $_REQUEST['username'];
$syz = $_REQUEST['yz'];
$yz = isset($_SESSION['yzm'])?$_SESSION['yzm']:'';
if(empty($yz) ||$yz!=$syz){
	echo "<script>alert('验证码错误');location.href='forget.php'</script>";die;
}
$pwd = $_REQUEST['password'];
$sql = "SELECT * FROM user where uname = '".$uname."' and type = 1";
$result = $conn->query($sql);
$uid='';

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    
   $sql="update user set pwd ='{$pwd}'where id ={$row['id']}";
   $result = $conn->query($sql);
   header("Location: ./login.php");
exit;

  }


  }else {
echo '用户名电话不符！';
  }
?>
