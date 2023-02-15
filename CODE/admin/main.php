<!DOCTYPE html>
<html lang="zh">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/navbar-fixed-top.css" rel="stylesheet">
  </head>
  <style type="text/css">
  </style>
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
      <div class="jumbotron">
        <h2>Welcome</h2>
      </div>
	  <div id="myCarousel" class="carousel slide">
	      <!-- 轮播（Carousel）指标 -->
	      <ol class="carousel-indicators">
	          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	          <li data-target="#myCarousel" data-slide-to="1"></li>
	          <li data-target="#myCarousel" data-slide-to="2"></li>
	      </ol>   
	      <!-- 轮播（Carousel）项目 -->
	      <div class="carousel-inner">
	         
	      </div>
	      <!-- 轮播（Carousel）导航 -->
	      <a class="carousel-control left" href="#myCarousel" 
	         data-slide="prev"> <span _ngcontent-c3="" aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span></a>	      
			  <a class="carousel-control right" href="#myCarousel"
			    data-slide="prev"> <span _ngcontent-c3="" aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span></a>
	  </div>
    </div>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
