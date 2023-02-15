<?php
//检测表单字段是否为空
if (!isset($_REQUEST['id'])) {
  echo "False";
  exit;
}
if (!isset($_REQUEST['uid'])) {
  echo "False";
  exit;
}
if (!isset($_REQUEST['type'])) {
  echo "False";
  exit;
}
if (!isset($_REQUEST['content'])) {
  echo "False";
  exit;
}

$oid = $_REQUEST['id'];
$uid = $_REQUEST['uid'];
$gid = $_REQUEST['gid'];
$type = $_REQUEST['type'];
$content = $_REQUEST['content'];

$date=date('Y-m-d H:i',time());
include '../conn.php';
$sql = "insert into comment(oid,uid,gid,type,content,created)"
      ." values('".$oid."','".$uid."','".$gid."','".$type."','".$content."','"
      .$date."')";


if($conn->query($sql)=== TRUE){

   echo "<script>location.href='order.php?uid={$uid}'</script>";die;  

}else{
  echo 'False';
}
