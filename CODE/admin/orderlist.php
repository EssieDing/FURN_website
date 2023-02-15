<?php
include '../conn.php';
$g=isset($_GET['pay'])?$_GET['pay']:'';
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>订单管理</title>
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
  Search：<input type="text" name="pay" value="<?php echo $g?>">
  <input type="submit" class="btn btn-success" style="height: 30px">
</form>

    <table class="table table-striped">
        <thead>
        <tr>
        	<th>Img</th>
            <th>id</th>
            <th>User</th>
            <th>Goods</th>
            <th>Num</th>
            <th>Status</th>
            <th>Time</th>
         
        </tr>
        </thead>
        <tbody>
        <?php
        if(empty($_GET['pay'])){
             $sql = "SELECT o.* ,g.goods_name as gn,o.id as oid,u.uname FROM orders as o left join goods g on g.id=o.goods_id left join user u on u.id=o.user_id order by o.created desc";
         }else{
             $sql = "SELECT o.* ,g.goods_name as gn,o.id as oid,u.uname FROM orders as o left join goods g on g.id=o.goods_id left join user u on u.id=o.user_id where o.pay={$_GET['pay']} order by o.created desc";
         }       
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // 输出每行数据
            while($row = $result->fetch_assoc()) {
                ?>

                <tr>
                	 <td style="width: 10%"><img src="../<?php echo $row["image"]; ?>" style="width:50%"></td>
                    <td><?php echo $row["pay"]; ?></td>                  
                    <td><?php echo $row["uname"]; ?></td>
                    <td><?php echo $row["gn"]; ?></td>                  
                    <td><?php echo $row["count"]; ?></td>
                    <td><?php switch ($row['status']) {
                                case 0:
                                echo '未支付';
                                break;
                                case 1:
                                echo '付款成功';
                                break;
                                case '2':
                                echo '付款成功';
                                break;
                                case '3':
                                echo '付款成功';
                                break;
                                } ?></td>
                                 <td><?php echo $row["created"]; ?></td>
                    
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
