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
$file = $_FILES['file'];
    $name = $file['name'];
    $type = strtolower(substr($name,strrpos($name,'.')+1)); 
    $allow_type = array('jpg','jpeg','gif','png'); 
    if(!in_array($type, $allow_type)){
        return ;
    }
    if(!is_uploaded_file($file['tmp_name'])){
        return ;
    }
   if ($file['name']){
    $name = $file['name'];
    $type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
    $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
    $upload_path = "upload/"; //上传文件的存放路径
//开始移动文件到相应的文件夹
    $imgname = $upload_path.md5($file['name']).'.'.$type;
    move_uploaded_file($file['tmp_name'],$imgname);
}else{
    $imgname = '';
}
}


$sql = "update user set stuimg = '/user/{$imgname}' where id = ".$uid;
if ($result = $conn->query($sql)) {

  ?>
  <script type="text/javascript">
  $(function() {
    location.href="center.php?stuimg=<?php echo $uid?>";
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
