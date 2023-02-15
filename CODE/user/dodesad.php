<?php
//检测表单字段是否为空




$id = $_REQUEST['id'];
include '../conn.php';
$sql = "delete from address where id =$id";


if($conn->query($sql)=== TRUE){

   echo "<script>location.href='address.php'</script>";die;  

}else{
  echo '删除失败！';
}
