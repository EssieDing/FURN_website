<?php
include '../conn.php';
$g=isset($_GET['goods_name'])?$_GET['goods_name']:'';
?>
<!DOCTYPE html>
<html lang="zh">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>商品列表</title>
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
           <a class="navbar-brand" href="#">Admin</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li ><a href="/admin/main.php">Home</a></li>
            <li><a href="userlist.php">User</a></li>
            <li ><a href="classlist.php">Class</a></li>
            <li class="active"><a href="goodslist.php">Goods</a></li>     
            <li><a href="orderlist.php">Order</a></li>
                             
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../index.php">Home <span class="sr-only">(current)</span></a></li>
          </ul>
        </div>
      </div>
    </nav>

<div class="container">
<form style="margin-left:75%" method="get">
  搜索：<input type="text" name="goods_name" value="<?php echo $g?>">
  <input type="submit" class="btn btn-success" style="height: 30px" >
</form>

      <table class="table table-striped">
        <a href="addgoods.php" class="btn btn-success">增加商品</a>
        <thead>
          <tr>
            <th>id</th>
            <th>Img</th>
            <th>Name</th>          
            <th>Price</th>
          
            <th>Status</th>
            <th>content</th>
            <th>Num</th>          
           
            
            <th>Option</th>
          </tr>
        </thead>
        <tbody>
      <?php
      if(empty($_GET['goods_name'])){
 $sql = "SELECT * FROM goods";
      }else{
         $sql = "SELECT * FROM goods where goods_name like '%{$_GET['goods_name']}%'";
      }    
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // 输出每行数据
        while($row = $result->fetch_assoc()) {
          ?>

    <tr>
      <td><?php echo $row["id"]; ?></td>
      <td style="width:10%"><img src="../<?php echo $row["picture"]; ?>" style="width:50%"></td>
      <td><?php echo $row["goods_name"]; ?></td>    
      <td><?php echo $row["price"]; ?></td>
     
      <td><?php if($row['status']==1){
        echo 'Up';
      }else{
        echo 'Down';
      } ?></td>
      <td style="width:10%"><?php echo $row['description'] ?></td>
      <td style="width:10%"><?php echo $row['num'] ?></td>
     
      <td>

        <a href="editgoods.php?gid=<?php echo $row['id']?>" class="btn btn-primary">Edit</a>
        <?php if($row['status']==1):?>
        <a href="xjgoods.php?gid=<?php echo $row['id']?>&status=<?php echo $row['status']?>" class="btn btn-primary" style="background:orange">Down</a>
        <?php else:?>
          <a href="xjgoods.php?gid=<?php echo $row['id']?>&status=<?php echo $row['status']?>" class="btn btn-primary" style="background:orange">Up</a>
        <?php endif?>

        <!-- 按钮触发模态框 -->
        <button  class="btn btn-danger" data-toggle="modal" onclick="delgoods(<?php echo $row['id']?>)" data-target="#myModal">Delete</button>

        </div>
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

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">提示</h4>
              </div>
              <div class="modal-body">确认是否要删除？</div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                  <button type="button" id="del" class="btn btn-danger" >删除</button>
                  <script type="text/javascript">

                      function delgoods(goodsid) {
                          $.post("delgoods.php",{
                            gid:goodsid,
                          },function(data,status){
                              alert('删除成功！');
                            //休眠3秒
                            sleep(300);
                            //跳转商品列表
                            location.href="goodslist.php";
                          });
                      }
                      
                      function sleep(n) { //n表示的毫秒数
                             var start = new Date().getTime();
                             while (true) if (new Date().getTime() - start > n) break;
                         }
                  </script>
              </div>
          </div>
      </div>
    </div>
  </body>
</html>
