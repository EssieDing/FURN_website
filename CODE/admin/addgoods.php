<?php
include '../conn.php';    
?>
<!DOCTYPE html>
<html lang="zh">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>添加商品</title>
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
            <li class="active"><a href="goodslist.php">商品管理</a></li>
            <li><a href="userlist.php">用户管理</a></li>
            <li><a href="orderlist.php">订单管理</a></li
            <li><a href="comment.php">评论管理</a></li>
            <li><a href="classlist.php">分类管理</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li ><a href="../index.php">进入前台 <span class="sr-only">(current)</span></a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <br>
      <table class="table ">
        <thead>
          <tr>
            <th colspan="2">添加商品</th>
          </tr>
        </thead>
        <tbody>
<form class="" action="doaddgoods.php" method="post">
    <tr>
      <td>商品名称：</td>
      <td><input type="text" name="goodsname" value=""></td>
    </tr>
 
    <tr>
      <td>旧价格：</td>
      <td><input type="text" name="oldprice" value=""></td>
    </tr>
    <tr>
      <td>商品价格：</td>
      <td><input type="text" name="price" value=""></td>
    </tr>
    <tr>
      <td>商品描述：</td>
      <td><input type="text" name="desc" value=""></td>
    </tr>
     <tr>
      <td>商品库存：</td>
      <td><input type="text" name="num" value=""></td>
    </tr>
    <tr>
      <td>图片地址：</td>
      <td><input type="text" name="picture" value=""></td>
    </tr>
     <tr>
      <td>商品型号：</td>
      <td><input type="text" name="size" value="">每个型号用英文逗号,分割</td>
    </tr>
     <tr>
      <td>详情图：</td>
      <td><input type="text" name="image" value="">每个详情图片用英文逗号,分割</td>
    </tr>
    <tr>
      <td>状态</td>
      <td><select name="status">
        <option value="1">上架</option>
        <option value="0">下架</option>
      </select></td>
    </tr> <tr>
      <td>分类</td>
      <td><select name="cid">
        <?php 
        $sql = "SELECT *  FROM class  where pid !=0";
        $result = $conn->query($sql);
         if ($result->num_rows > 0) {
            // 输出每行数据
            while($row = $result->fetch_assoc()) {
              echo "<option value='{$row['id']}'>{$row['name']}</option>";
            }
          }
        ?>    
        
      </select></td>
    </tr>
     
    <tr colspan="2">
      <td>
        <input type="submit" class="btn btn-success" value="添加">
      </td>
    </tr>
  </form>

  </tbody>
  </table>
</div>
  <script src="../js/jquery-3.4.1.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
</body>
</html>
