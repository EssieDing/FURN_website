<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Pay</title>
</head>
<?php
include '../conn.php';
date_default_timezone_set('Asia/Shanghai');
$pay=time().rand(100,500);
$uid = $_REQUEST['uid'];
$goods_id = $_REQUEST['gid'];
$count = $_REQUEST['count'];

$types = $_REQUEST['types'];

$sqlg = "select * from goods where id={$goods_id}";
$resultg = $conn->query($sqlg);
$rowg = $resultg->fetch_assoc();
$pay=time().rand(100,500);
$time=date('Y-m-d H:i',time());
if ($types == 10){
    $rowg['prices'] = $rowg['stuprice'];
}else{
    $rowg['prices'] = $rowg['price'];
}
$sql = "insert into orders(user_id,goods_id,count,pay,total,status,created,modified,image) values(".$uid.",".
$goods_id.",".$count.",'".$pay."','".($count*$rowg['prices'])."',1,'".$time."','".$time."','".$rowg['picture']."')";

if ($conn->query($sql) === TRUE) {
  ?>
  <div style="margin-left:40%;margin-top:200px">
    <h1><span>Success</span></h1>
    <h3 style="padding-left:57px ">Total：￥<?php echo ($rowg['prices']*$count)?></h3>
    <button style="margin-left: 50px;border:1px solid rgb(214,82,77);background: rgb(214,82,77);color: white"><a href="order.php?uid=<?php echo $uid?>" style="color: white">Order List</a></button>
    <button style="border:1px solid white"><a href="../index.php?uid=<?php echo $uid?>" style="color: black">Home</a></button>
    </div>
  <?php
  }else {
    echo "False";
  }
   
?>
</body>
</html>

