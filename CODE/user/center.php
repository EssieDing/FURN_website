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
<link href="../static/css/systyle.css" rel="stylesheet" type="text/css">
    <div class="nav-table">
		<div class="long-title"><span class="all-goods">All Class</span></div>
			<div class="nav-cont">
				<ul>
					<li class="index"><a href="../index.php">Home</a></li>                              
				</ul>						    
			</div>
		</div>
		<b class="line"></b>
		<div class="center" >
			<div class="col-main" >
				<div class="main-wrap">
					<div class="wrap-left">
						<div class="wrap-list">
							<div class="m-user">
								<div class="m-bg"></div>
								<div style="width:1100px">
								<div class="m-userinfo">
									<div class="m-baseinfo">
										<a href="information.php">
											<img src="<?php echo $row['avatar']?>">
										</a>
										<br>
										<div class="s-prestige am-btn am-round">
											Hello：<?php echo $row['uname']?></div>
									</div>
									<div class="m-right">
										<div class="m-new">
											
										</div>
										
									</div>
								</div>
								</div>

															
							</div>
							<div class="box-container-bottom"></div>
							<div class="you-like" style="width:1020px">
								<div class="s-bar">Recommend								
								</div>
								<div class="s-content">
										<?php $sqlgs="select * from goods  limit 8";
						     	 $resultgs = $conn->query($sqlgs);		 
		   						if ($resultgs->num_rows > 0) {
		       					// 输出每行数据
		       					while($rowgs = $resultgs->fetch_assoc()) {
		 						?>
									<div class="s-item-wrap">
										<div class="s-item">

											<div class="s-pic">
												<a href="../goods.php?id=<?php echo $rowgs['id']?>" class="s-pic-link">
													<img src="../<?php echo $rowgs['picture']?>"  class="s-pic-img s-guess-item-img">
												</a>
											</div>
											<div class="s-price-box">
												<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value"><?php echo ($rowgs['old_price']*1.2)?></em></span>
												<span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value"><?php echo $rowgs['old_price']?></em></span>
											</div>											
										</div>
									</div>
								<?php }}?>
									
								</div>
								<a href="../search.php"><div class="s-more-btn i-load-more-item" data-screen="0"><i class="am-icon-refresh am-icon-fw"></i>More</div></a>
							</div>
						</div>
					</div>					
				</div>
				
					<div class="footer " style="">
						<div class="footer-hd ">
							
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
						<a  style="font-size:20px" href="center.php">Center</a>
					</li>
					<li class="person">
						<p style="font-size:18px">MY</p>
						<ul>
							<li> <a href="sinformation.php">Edit</a></li>
							
							
						</ul>
					</li>
					<li class="person">
						<a style="font-size:18px">Order</a>
						<ul>
							<li><a href="order.php">List</a></li>							
						</ul>
					</li>
				</ul>
			</aside>
		</div>		
	</body>
</html>