<?php
include '../conn.php';
//获取商品id
$goods_id = $_REQUEST['gid'];
$sql = "select * from goods where id = ".$goods_id;
$sqlg = "SELECT *  FROM class where pid !=0";
$resultg = $conn->query($sqlg);
?>
<!DOCTYPE html>
<html lang="zh">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>商品编辑</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/navbar-fixed-top.css" rel="stylesheet">
  </head>
  <body>

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">后台管理</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="main.php">首页</a></li>
            <li><a href="userlist.php">用户管理</a></li>
            <li><a href="classlist.php">分类管理</a></li>
            <li class="active"><a href="goodslist.php">商品管理</a></li>           
            <li><a href="orderlist.php">订单管理</a></li>
            <li><a href="comment.php">评论管理</a></li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="../index.php">进入前台 <span class="sr-only">(current)</span></a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">

<br>
        <table class="table table-striped">
        <thead>
          <tr>
            <th colspan="2">商品编辑</th>
          </tr>
        </thead>
        <tbody>
          <form class="" action="doeditgoods.php?gid=<?php echo $goods_id?>" method="post">
          <?php
          $result = $conn->query($sql);
          if ($result->num_rows>0) {
            //存在该商品
            while ($row=$result->fetch_assoc()) {
        ?>
    <tr>
      <td>商品名称</td>
      <td><input type="text" name="goods_name" value="<?php echo $row['goods_name']?>"></td>
    </tr>
    <tr>
      <td>旧价格</td>
      <td><input type="text" name="old_price" value="<?php echo $row['old_price']?>"></td>
    </tr>

    <tr>
      <td>当前价格</td>
      <td><input type="text" name="price" value="<?php echo $row['price']?>"></td>
    </tr>

    <tr>
        <td>学生价格</td>
        <td><input type="text" name="stuprice" value="<?php echo $row['stuprice']?>"></td>
     </tr>

    <tr>
      <td>商品描述</td>
      <td><input type="text" name="desc" value="<?php echo $row['description']?>"></td>
    </tr>
     <tr>
      <td>商品库存</td>
      <td><input type="text" name="num" value="<?php echo $row['num']?>"></td>
    </tr>

    <tr>
      <td>商品图片地址</td>
      <td><input type="text" name="picture" value="<?php echo $row['picture']?>"></td>
    </tr>
     <tr>
      <td>商品型号：</td>
      <td><input type="text" name="size" value="<?php echo $row['size']?>">每个型号用英文逗号,分割</td>
    </tr>
     <tr>
      <td>详情图：</td>
      <td><input type="text" name="image" value="<?php echo $row['image']?>">每个详情图片用英文逗号,分割</td>
    </tr>
    <tr>
      <td>状态</td>
      <td><select name="status">
        <option value="1">上架</option>
        <option value="0">下架</option>
      </select></td>
    </tr>
 <tr>
      <td>分类</td>
      <td><select name="cid">
        <?php 
         if ($resultg->num_rows > 0) {
            // 输出每行数据
            while($rowg = $resultg->fetch_assoc()) {
              echo "<option value='{$rowg['id']}'>{$rowg['name']}</option>";
            }
          }
        ?>     
        
      </select></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" class="btn btn-info" name="" value="更新"></td>
    </tr>
    <?php


  }
  }else{
  echo "不存在该商品！";
  }
     ?>
  </form>
    </tbody>
  </table>
    </div>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
