<?php
include '../conn.php';
?>
<!DOCTYPE html>
<html lang="zh">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>编辑评论</title>
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
            <li><a href="goodslist.php">商品管理</a></li>           
            <li><a href="orderlist.php">订单管理</a></li>
            <li class="active"><a href="comment.php">评论管理</a></li>            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="/" >进入前台</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <br>
        <table class="table">
        <thead>
          <tr>
            <th colspan="2">编辑评论</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $uid = $_REQUEST['uid'];
          $sql = "select * from comment where id = ".$uid;
          $result = $conn->query($sql);
          if ($result->num_rows>0) {
            while ($row = $result->fetch_assoc()) {
           ?>
          <form class="" action="doeditcom.php?uid=<?php echo $row['id']?>" method="post" enctype="multipart/form-data">
   
     <tr>
      <td>是否显示：</td>
      <td>
        <select name="status">
          <option value="1">显示</option>
          <option value="0">隐藏</option>
        </select>
      </td>
    </tr>

    <tr>
      <td>详情：</td>
      <td>
        <input type="hidden" name="uid" value="<?php echo $row['id']?>">
        <textarea style="width: 100%;height: 200px" name="content"><?php echo $row['content']?></textarea>
      </td>
    </tr>


<?php
      }
    }
 ?>
 
<tr>
  <td colspan="2">
    <input type="submit" class="btn btn-success" value="更新">
  </td>
</tr>

</form>
    </tbody>
  </table>
    </div>
    <script src="./js/bootstrap.min.js"></script>
  </body>
</html>
