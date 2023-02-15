<?php
include '../conn.php';
$g=isset($_GET['uname'])?$_GET['uname']:'';
?>
<!DOCTYPE html>
<html lang="zh">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>评论管理</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/navbar-fixed-top.css" rel="stylesheet">
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
            <li ><a href="classlist.php">分类管理</a></li> 
            <li><a href="goodslist.php">商品管理</a></li>          
            <li><a href="orderlist.php">订单管理</a></li>
            <li class="active"><a href="comment.php">评论管理</a></li>                
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../index.php">进入前台 <span class="sr-only">(current)</span></a></li>
          </ul>
        </div>
      </div>
    </nav>

<div class="container">
<form style="margin-left:75%" method="get">
  搜索：<input type="text" name="uname" value="<?php echo $g?>">
  <input type="submit" class="btn btn-success" style="height: 30px">
</form>

      <table class="table table-striped">
        <thead>
          <tr>
            <th style="width:20%">id</th>
            <th style="width:20%">商品名</th>
            <th style="width:20%">评价等级</th>
            <th style="width:20%">详情</th>
            <th style="width:20%">是否显示</th>          
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
      <?php
       if(empty($_GET['uname'])){
          $sql = "SELECT c.*,g.goods_name as gn FROM comment as c left join goods g on g.id= c.gid";
        }else{
          $un=$_GET['uname'];
          $sql = "SELECT c.*,g.goods_name as gn FROM comment as c left join goods g on g.id= c.gid where content like '%{$un}%'";    
        }    
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // 输出每行数据
        while($row = $result->fetch_assoc()) {
          ?>

    <tr>
      <td><?php echo $row["id"]; ?></td>     
      <td><?php echo $row["gn"]; ?></td>
      <td><?php 
      if($row["type"]==1){
        echo '好评'; 
       }else{
        echo '差评';
       }    

      ?></td>
      <td><?php echo $row["content"]; ?></td>
       <td><?php 
      if($row["status"]==1){
         echo '是'; 
       }else{
        echo '否';
       }
      ?></td>
      
      <td>
        <a href="editcom.php?uid=<?php echo $row['id']?>" class="btn btn-primary">审核</a>
      </td>
    </tr>

          <?php

        }
      } else {
        echo "0 个结果";
      }
      $conn->close();
      ?>
    </tbody>
  </table>
</body>
</html>
