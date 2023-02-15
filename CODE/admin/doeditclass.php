<!DOCTYPE html>
<html lang="zh">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>更新</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/navbar-fixed-top.css" rel="stylesheet">
    <script src="./js/bootstrap.min.js"></script>
    <script src="../js/jquery.js"></script>
  </head>
  <?php
  include '../conn.php';
  //获取表单数据
  $adv_id =  $_REQUEST['id'];
  $adv_name = $_REQUEST['advsname'];
  $pid = $_REQUEST['pid'];
  $sql = "update class set name = '".$adv_name."',pid = '".$pid."' where id = ".$adv_id;
  ?>
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
            <li class="active"><a href="classlist.php">分类管理</a></li>
            <li><a href="goodslist.php">商品管理</a></li>            
            <li><a href="orderlist.php">订单管理</a></li>
            <li><a href="comment.php">评论管理</a></li>           
            </ul>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="../index.php">进入前台 <span class="sr-only">(current)</span></a></li>
          </ul>
        </div>
      </div>
    </nav>

<div class="container">
<br><br><br><br>
        <?php
        if ($conn->query($sql)) {
          echo "更新成功！正在跳转...";
          ?>
<script type="text/javascript">
  //休眠5秒，跳转广告列表
  $(function() {
    sleep(500);
    location.href="classlist.php";
  });

  function sleep(n) { //n表示的毫秒数
         var start = new Date().getTime();
         while (true) if (new Date().getTime() - start > n) break;
     }
</script>
          <?php
        }else {
          echo "更新失败，请返回重试！";
        }
         ?>
    </div> 

  </body>
</html>
<?php include '../db_close.php'; ?>
