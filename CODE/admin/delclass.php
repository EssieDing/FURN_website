<?php
include '../conn.php';
$advid = $_REQUEST['id'];
$sql = "delete from class where id = ".$advid;
if ($conn->query($sql)) {
  //删除成功
  return 1;
}else {
  //删除失败
  return 0;
}
