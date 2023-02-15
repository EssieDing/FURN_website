<?php

include '../conn.php';
include 'function.php';

$ar=$_REQUEST['arr'];
foreach ($ar as $k => $v) {
  $sql="update cart set count={$v['count']} where id=$k";
  $result = $conn->query($sql);
}
$uid=$_REQUEST['uid'];

$sql = "SELECT * FROM user where id = '".$uid."'";
$result = $conn->query($sql);

if ($result->num_rows <= 0) {

echo '请先注册或登录！';
exit;
  }
$j=0;
?>
<!DOCTYPE>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Pay</title>
  <link rel="stylesheet" type="text/css" href="../css/general.css">
  <link rel="stylesheet" type="text/css" href="../css/index.css">
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/general.js"></script>
  <script type="text/javascript" src="../js/carousel.js"></script>
   <link rel="stylesheet" href="../admin/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/general.css">
  <link rel="stylesheet" type="text/css" href="../css/index.css">
    <link rel="stylesheet" type="text/css" href="../css/list.css">
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/general.js"></script>
  <script type="text/javascript" src="../js/carousel.js"></script>
</head>
<body>
<!-- 顶部开始 -->

<!-- 头部开始 -->
<?php include 'top.php'; ?>
<!-- 头部结束 -->
<!-- 主体开始 -->
<style type="text/css">
  * {
                margin: 0;
                padding: 0;
                border: 0;
                outline: 0
            }
            
            ul,
            li {
                list-style: none;
            }
            
            a {
                text-decoration: none;
            }
            
            a:hover {
                cursor: pointer;
                text-decoration: none;
            }
            
            a:link {
                text-decoration: none;
            }
            
            img {
                vertical-align: middle;
            }
            
            .btn-numbox {
                overflow: hidden;
                margin-top: 20px;
            }
            
            .btn-numbox li {
                float: left;
            }
            
            .btn-numbox li .number,
            .kucun {
                display: inline-block;
                font-size: 12px;
                color: #808080;
                vertical-align: sub;
            }
            
            .btn-numbox .count {
                overflow: hidden;
                margin: 0 16px 0 -20px;
            }
            
            .btn-numbox .count .num-jian,
            .input-num,
            .num-jia {
                display: inline-block;
                width: 28px;
                height: 28px;
                line-height: 28px;
                text-align: center;
                font-size: 18px;
                color: #999;
                cursor: pointer;
                border: 1px solid #e6e6e6;
            }
            .btn-numbox .count .input-num {
                width: 58px;
                height: 26px;
                color: #333;
                border-left: 0;
                border-right: 0;
            }

</style>
<div class="w1100">
    <div class="col-md-15 col-lg-15">
              <?php
              $a=0;
      $sql = "SELECT * FROM cart where user_id = ".$uid;
      $result = $conn->query($sql);
              echo"<table class='table table-bordered'  >";
              echo"<tr>";
              echo"<td colspan='7' style='text-align:center;font-size:25px' >Class</td>";
              echo"<tr>";
              echo"<tr>";
              echo"<th >Img</th><th >Name</th><th >Goods</th><th >Num</th><th >Price</th>";
              echo"<tr>";
      if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          $name=getUserNameById($conn,$row['user_id']);
          $goods_name=getGoodsNameById($conn,$row['goods_id']);
          $img=getGoodsImgById($conn,$row['goods_id']);
          $pc=getGoodspcById($conn,$row['goods_id']);
        $zongjia = $row['price']*$row['count'];
        $a+=$zongjia;
        $j+=$row['count'];
        $heji = $zongjia;
              echo"<tr>";
              echo "<td style='width:10%'> <img src='../{$img}' style='width:50%'></td>";
              echo "<td>{$name}</td>";
              
              echo "<td>{$goods_name}</td>";
               echo "<td>{$row['count']}</td>";
             ?>
           
             <?php
              echo "<td class='pce' gid={$row['id']}>{$zongjia}</td>";
             
              
              echo"</tr>";
       ?>
      <hr>
      <input type="hidden" id="pcc" value="<?php echo $pc?>">
       <?php
      }
       echo"</table>";
      }
       ?> </p>
       <input type="hidden" name="uid" value="<?php echo $uid?>">
      
      
    </div>
  </div>
<div class="container w1100" style="margin-left: 70%;margin-top:-80px;width:24%;padding-left:7%;padding-top:20px;padding-bottom: 20px">
  
      <br>  <br>  <br>  <br>
      <p >
类型：<select class="" name="pay_method">


        <?php
$sql = "SELECT * FROM pay ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
?>
<option value="<?php echo $row['id']?>"><?php
  echo $row['pay_method'];
 ?></option>


 <?php
}
}
 ?> </select></p><br>
 <form method="get" action="paysuccess.php">
      Total： <span style="color: red;font-weight: 600">￥<?php echo $a?></span><br><br><br>
      Num： <span style="color: red;font-weight: 600"><?php echo $j?></span><br><br><br>

               <span>Address</span> <select style="margin-left:70px;margin-top:-20px" name="address">
     <?php
       
      $sql = "SELECT * FROM address where uid = '".$uid."'";
      $result = $conn->query($sql);
            
      if ($result->num_rows > 0) {
      while($rows = $result->fetch_assoc()) {   
             ?>  
        <option value="<?php echo ($rows['id']); ?>"><?php echo ($rows['city'].'-'.$rows['content'])?></option>
       <?php 
      }
      }
     ?>
      </select>
       <input type="hidden" name="uid" value="<?php echo $uid?>">
      
      <p style='font-size:30px;margin-top: -30px'>
        <br><br>
        <button type="submit"  class="btn btn-success"; style="margin-left: 20px;">
          Pay</button></p>
      </form>



</div>
<!-- 页脚开始 -->
<div class="footer mt20">
<script type="text/javascript" src="../js/juicer.js"></script>
</body></html>
