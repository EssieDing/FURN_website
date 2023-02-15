<?php
//检测表单字段是否为空

if (!isset($_REQUEST['phone'])) {
  echo "Phone not Empty";
  exit;
}
if (!issetcontent_REQUEST['content'])) {
  echo "Phone not Empty";
  exit;
}

$p1 = $_REQUEST['p1'];
$p2 = $_REQUEST['p2'];
$p3 = $_REQUEST['p3'];
$ad=$p1.$p2.$p3;
$content = $_REQUEST['content'];
$phone = $_REQUEST['phone'];
$uid = $_REQUEST['uid'];
include '../conn.php';
$sql = "insert into address(uid,city,phone,content)"
      ." values('".$uid."','".$ad."','".$phone."','".$content."')";


if($conn->query($sql)=== TRUE){

   echo "<script>location.href='address.php'</script>";die;  

}else{
  echo 'False';
}
