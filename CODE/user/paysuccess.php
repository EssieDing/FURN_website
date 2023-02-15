
<?php
session_start(); 
include '../conn.php';
include 'function.php';
date_default_timezone_set('Asia/Shanghai');
$uid=$_REQUEST['uid'];
$address=isset($_REQUEST['address'])?$_REQUEST['address']:'1';
$sql = "SELECT * FROM user where id = '".$uid."'";
$result = $conn->query($sql);

if ($result->num_rows <= 0) {

echo '请先注册或登录！';
exit;
  }

?>


<?php
$pay=time().rand(100,500);
$sql = "SELECT * FROM cart where user_id = {$uid}";
$result = $conn->query($sql);
$pc=0;
if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
       $sqlg = "select * from goods where id={$row["goods_id"]}";

      $resultg = $conn->query($sqlg);
      $rowg = $resultg->fetch_assoc();
      $pc+=$row['count']*$rowg['price'];
      $time=date('Y-m-d H:i',time());
        include '../conn.php';
        $sql = "insert into orders(user_id,goods_id,count,address_id,pay,total,status,created,modified,image,size)"
        ." values('".$row["user_id"]."',".$row["goods_id"].",'".$row["count"]."','".$address."','".$pay."','".($row['count']*$rowg['price'])."',1,'".$time."','".$time."','".$rowg['picture']."','".$rowg['size']."')"; 
       $conn->query($sql);
    }

    
} else {
    echo "0 个结果";die;
}

  $sql = "delete from cart where user_id = ".$uid;
            $result = $conn->query($sql);


   
  //输出表单

$conn->close();
?>
<div style="margin-left:40%;margin-top:100px">
    <h1><span>Success</span></h1><br><br>
    <h3 style="padding-left:45px ">Total：￥<?php echo $pc?></h3><br><br>
    <button style="margin-left: 50px;border:1px solid rgb(214,82,77);background: rgb(214,82,77);color: white"><a href="order.php?uid=<?php echo $uid?>" style="color: white">Order list</a></button>
    <button style="border:1px solid white"><a href="../index.php?uid=<?php echo $uid?>" style="color: black">Home</a></button>
    </div>
<!-- <script type="text/javascript">

  alert('付款成功');
            location.href="order.php?uid=<?php echo $uid ?>";
             </script> -->
<div class="container w1100">
<br>
<br>
<br>


</div>
<!-- 页脚开始 -->
<div class="footer mt20">
<script type="text/javascript" src="../js/juicer.js"></script>
</body></html>

