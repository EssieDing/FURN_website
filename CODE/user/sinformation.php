<?php include('./top.php');  ?>
<?php
include '../conn.php';
$uid=isset($_SESSION['uid'])?$_SESSION['uid']:'';
$sql = "SELECT * FROM user where id = '".$uid."'";
$result = $conn->query($sql);
if ($result->num_rows <= 0) {
echo '请先注册或登录！';
exit;
  }
  $row = $result->fetch_assoc();
?>
	<link href="../static/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
	<link href="../static/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
	<link href="../static/css/personal.css" rel="stylesheet" type="text/css">
	<link href="../static/css/infstyle.css" rel="stylesheet" type="text/css">
        <div class="nav-table">
			<div class="long-title"><span class="all-goods">全部分类</span></div>
				<div class="nav-cont">
					<ul>
						<li class="index"><a href="../index.php">首页</a></li>                              
					</div>
				</div>
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">
					<div class="user-info">
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改个人信息</strong></div>
						</div>
						<hr/>
						<form class="am-form am-form-horizontal" action="doedituserinfo.php?uid=<?php echo $uid?>" method="post" enctype="multipart/form-data">
						<div class="user-infoPic">
							<div class="filePic">
								<input type="file" class="inputPic" name="file" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
								<img class="am-circle am-img-thumbnail" src="<?php echo $row['avatar']; ?>" alt="" />
							</div>
							<p class="am-form-help">Img</p>
						</div>
						<tr>

						<div class="info-main">							
							<div class="am-form-group">
									<label for="user-name2" class="am-form-label">Username</label>
									<div class="am-form-content">
										<input type="text" id="user-name2" placeholder="nickname" name="username" value="<?php echo $row['uname']?>" >
									</div>
								</div>

								<div class="am-form-group">
									<label for="user-name" class="am-form-label">Password</label>
									<div class="am-form-content">
										<input  id="user-name2" placeholder="name" type="password" name="password" value="<?php echo $row['pwd']?>">

									</div>
								</div>
								
								<div class="am-form-group">
									<label for="user-email" class="am-form-label">Email</label>
									<div class="am-form-content">
										<input id="user-email" placeholder="Email" type="email" value="<?php echo $row['email']?>" name="email">
									</div>
								</div>
															
								<div class="info-btn">
									<button type="submit"class="am-btn am-btn-danger">Submit</button>
								</div>

							</form>
						</div>
					</div>
				</div>
				
					<div class="footer " style="">
						<div class="footer-hd ">
							<p style="text-align: center;">
								
							</p>
						</div>
						<div class="footer-bd ">
							<p style="text-align: center;">								
								<em>2020-2022 Fun</em>
							</p>
						</div>
					</div>
				</div>

				<aside class="menu">
				<ul>
					<li class="person active">
						<a  style="font-size:20px" href="center.php">My</a>
					</li>
					<li class="person">
						<p style="font-size:18px">My Page</p>
						<ul>
							<li> <a href="sinformation.php">Edit</a></li>
							
							
						</ul>
					</li>
					<li class="person">
						<a style="font-size:18px">Order </a>
						<ul>
							<li><a href="order.php">List</a></li>							
						</ul>
					</li>
				</ul>
			</aside>
		</div>
	</body>
</html>