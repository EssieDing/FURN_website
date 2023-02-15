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
    <title>Class</title>
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
            <li class="active"><a href="classlist.php">Class</a></li>
            <li><a href="goodslist.php">Goods</a></li>     
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
  Search：<input type="text" name="uname" value="<?php echo $g?>">
  <input type="submit" class="btn btn-success" style="height: 30px">
</form>
    <a href="addclass.php" class="btn btn-success">Add</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>id</th>
            <th>Class</th>
            <th>Father</th>
            <th>Option</th>
        </tr>
        </thead>

        <tbody>
        <?php      
        if(empty($_GET['uname'])){
           $sql = "SELECT *  FROM class  ";  
        }else{
            $un=$_GET['uname'];
            $sql = "SELECT *  FROM class where name like '%{$un}%' ";  
        }       
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // 输出每行数据
            while($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td style="width: 40%"><?php echo $row["id"]; ?></td>
                    <td style="width: 45%"><?php echo $row["name"]; ?></td>
                    <?php if($row["pid"]==0){?>
                    <td style="width: 45%">Top</td>                  
                    <?php }else{
                            $sql2 = "SELECT *  FROM class where id={$row['pid']}"; 
                            $result2 = $conn->query($sql2); 
                            $row2 = $result2->fetch_assoc();
                        ?>
                        <td style="width: 45%"><?php echo $row2["name"]; ?></td>
                    <?php }?>
                    <td >
                        <a href="editclass.php?id=<?php echo $row['id']?>" class="btn btn-primary">Edit</a>
                        <button  class="btn btn-danger" data-toggle="modal" onclick="delclass(<?php echo $row['id']?>);" data-target="#myModal">Delete</button>
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

                        function delclass(id) {
                            $.post("delclass.php",{
                                id:id,
                            },function(data,status){
                                sleep(300);
                                alert('删除成功！');
                                //休眠3秒
                                sleep(300);
                                //跳转商品列表
                                location.href="classlist.php";
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
