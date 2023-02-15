<?php
include '../conn.php';
//获取商品id
$adv_id = $_REQUEST['id'];
$sql = "select * from class where id = ".$adv_id;
?>
<!DOCTYPE html>
<html lang="zh">
  <head>
    <meta charset="utf-8">
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>分类编辑</title>
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
            <li class="active"><a href="classlist.php">分类管理</a></li>
            <li><a href="goodslist.php">商品管理</a></li>           
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
            <th colspan="2">分类编辑</th>
          </tr>
        </thead>
        <tbody>
          <form class="" action="doeditclass.php?id=<?php echo $adv_id?>" method="post">
          <?php
          $result = $conn->query($sql);
          if ($result->num_rows>0) {
            //存在该商品
            while ($row=$result->fetch_assoc()) {
?>

    <tr>
      <td>名称</td>
      <td><input type="text" name="advsname" value="<?php echo $row['name']?>"></td>
    </tr>
<tr>
      <td>所属分类</td>
      <td><select name="pid" sid =<?php echo $row['pid']?>>
        <option value="0">首级分类</option>
        <?php 
        $sql='select * from class where pid =0';
        $rs=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($rs)){
        ?>
        <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
      <?php }?>
      </select></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" class="btn btn-info" name="" value="更新"></td>
    </tr>
    <?php

  }
  }else{
  echo "不存在该分类！";
  }
     ?>
  </form>
    </tbody>
  </table>
    </div>
    <script src="./js/bootstrap.min.js"></script>
    <script type="text/javascript">
      var pid=$('select[name=pid]').attr('sid')
      $('select[name=pid] option[value='+pid+']').attr('selected',true)
    </script>
  </body>
</html>
