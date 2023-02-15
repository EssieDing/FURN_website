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
if (!empty($_FILES['file']['name'])) {
 $file = $_FILES['file'];//得到传输的数据
      //得到文件名称
      $name = $file['name'];
      $type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
      $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
      //判断文件类型是否被允许上传
      if(!in_array($type, $allow_type)){
        //如果不被允许，则直接停止程序运行
        return ;
      }
      //判断是否是通过HTTP POST上传的
      if(!is_uploaded_file($file['tmp_name'])){
        //如果不是通过HTTP POST上传的
        return ;
      }
      $upload_path = "./touxiang/"; //上传文件的存放路径
      //开始移动文件到相应的文件夹
      if(move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
        updateAvatar($conn,$uid,$name);      
      }else{
        echo "头像上传失败!";
      }
}

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$email    = $_REQUEST['email'];
$sql = "update user set uname = '".$username."',pwd = '".$password."',email = '".$email."' where id = ".$uid;
//写入数据库

//返回状态
if ($result = $conn->query($sql)) {
  // echo "";
  ?>
  <script type="text/javascript">
  $(function() {

    location.href="center.php?uid=<?php echo $uid?>";
  });

  function sleep(n) { //n表示的毫秒数
         var start = new Date().getTime();
         while (true) if (new Date().getTime() - start > n) break;
     }
  </script>
  <?php
}else {
  echo "更新失败！";
}
?>

</body>
</html>
