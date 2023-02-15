<?php
//检测表单字段是否为空
if (!isset($_REQUEST['goodsname'])) {
  echo "请输入商品名称！";
  exit;
}

if (!isset($_REQUEST['oldprice'])) {
  echo "请输入商品旧价格";
  exit;
}
if (!isset($_REQUEST['price'])) {
  echo "请输入商品价格！";
  exit;
}
if (!isset($_REQUEST['desc'])) {
  echo "请输入商品描述!";
  exit;
}
if (!isset($_REQUEST['picture'])) {
  echo "请输入商品图片地址！";
  exit;
}
$goods_name = $_REQUEST['goodsname'];
$old_price = $_REQUEST['oldprice'];
$description = $_REQUEST['desc'];
$price = $_REQUEST['price'];
$picture = $_REQUEST['picture'];
$status=$_REQUEST['status'];
$cid=$_REQUEST['cid'];
$size=$_REQUEST['size'];
$num=$_REQUEST['num'];
$img=$_REQUEST['image'];
$time=date('Y-m-d h:i',time());
include '../conn.php';
$sql = "insert into goods(goods_name,price,description,old_price,picture,status,cid,size,image,author,created,num)"
      ." values('".$goods_name."',".$price.",'".$description."',"
      .$old_price.",'".$picture."','".$status."','".$cid."','".$size."','".$img."','admin','".$time."','".$num."')";
      
if($conn->query($sql)=== TRUE){
    header("Location: goodslist.php");
}else{
  echo '添加商品失败！';
}
