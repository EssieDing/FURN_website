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
					   <div class="long-title"><span class="all-goods">All CLASS</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="../index.php">Home</a></li>
                               
						</div>
			</div>
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-info">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">Update Password</strong> / <small>Personal&nbsp;information</small></div>
						</div>
						<hr/>
	<form class="am-form am-form-horizontal" action="doedituserpass.php?uid=<?php echo $uid?>" method="post" enctype="multipart/form-data">
						<!--头像 -->
						
						<tr>

						<!--个人信息 -->
						<div class="info-main">
							

								

								<div class="am-form-group">
									<label for="user-name" class="am-form-label">Old Password</label>
									<div class="am-form-content">
										<input  id="user-name2" placeholder="name" type="password" name="opassword" value="">

									</div>
								</div>
								<div class="am-form-group">
									<label for="user-name" class="am-form-label">New Password</label>
									<div class="am-form-content">
										<input  id="user-name2" placeholder="name" type="password" name="password" value="">

									</div>
								</div>

								
								
								
								<div class="info-btn">
									<button type="submit"class="am-btn am-btn-danger">Submit</button>
								</div>

							</form>
						</div>

					</div>

				</div>
				<!--底部-->
				
					<div class="footer " style="">
						<div class="footer-hd ">
							<p style="text-align: center;">
								<a href="y1.php ">常见问题</a>
								<b>|</b>
								<a href="y2.php ">商品配送</a>
								<b>|</b>
								<a href="y3.php ">隐私条款</a>
								<b>|</b>
								<a href="y4.php ">Cookies政策</a>
							</p>
						</div>
						<div class="footer-bd ">
							<p style="text-align: center;">
								
								<em>2020-2021 @yashiyun.com 化妆品版权所有</em>
							</p>
						</div>
					</div>
			</div>

		<aside class="menu">
				<ul>
					<li class="person active">
						<a  style="font-size:20px" href="center.php">个人中心</a>
					</li>
					<li class="person">
						<p style="font-size:18px">个人资料</p>
						<ul>
							<li> <a href="information.php">个人信息</a></li>
							<li> <a href="sinformation.php">修改信息</a></li>
							<li> <a href="edps.php">修改密码</a></li>
							<li> <a href="address.php">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a style="font-size:18px">我的交易</a>
						<ul>
							<li><a href="order.php">订单管理</a></li>
							
							
						</ul>
					</li>
				

				</ul>

			</aside>
		</div>

	</body>

</html>