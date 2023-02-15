<?php 
include '../conn.php';
?>
<!DOCTYPE html>
<html lang="zh">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="./css/navbar-fixed-top.css" rel="stylesheet">
  </head>
  <body>

    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
       <!-- 屏幕小到一定的尺寸时候导航栏发生的变化 -->  
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
            <li class="active"><a href="/admin/main.php">Home</a></li>
            <li><a href="userlist.php">User</a></li>
            <li><a href="classlist.php">Class</a></li>
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

<br>
        <table class="table table-striped">
        <thead>
          <tr>
            <th colspan="2">Add</th>
          </tr>
        </thead>
        <tbody>
          <form class="" action="doaddcla.php" method="post">
    <tr>
      <td>Name</td>
      <td><input type="text" name="advsname" value=""></td>
    </tr>
    <tr>
      <td>Father</td>
      <td><select name="pid">
        <option value="0">Top</option>
        <?php 
        $sql='select * from class where pid =0';
        $rs=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($rs)){
        ?>
        <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
      <?php }?>
      </select></td>
    </tr>

      <td></td>
      <td><input type="submit" class="btn btn-info" name="" value="Submit"></td>
    </tr>

  </form>
  </tbody>
  </table>
    </div>
    <script src="./js/bootstrap.min.js"></script>
  </body>
</html>
