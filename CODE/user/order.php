<?php include('./top.php');  ?>
<?php
include '../conn.php';
$uid=isset($_SESSION['uid'])?$_SESSION['uid']:'';
$sql = "SELECT * FROM user where id = '".$uid."'";
$result = $conn->query($sql);
$arr=[];
if ($result->num_rows <= 0) {
echo '请先注册或登录！';
exit;
  }
  $row = $result->fetch_assoc();
?>
<link href="../static/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
<link href="../static/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
<link href="../static/css/personal.css" rel="stylesheet" type="text/css">
<link href="../static/css/orstyle.css" rel="stylesheet" type="text/css">
<div class="nav-table">
	<div class="long-title"><span class="all-goods">All Class</span></div>
		<div class="nav-cont">
		<ul>
			<li class="index"><a href="../index.php">Home</a></li>                           
		</ul>						   
	</div>
</div>
	<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">
					<div class="user-order">
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">Order</strong></div>
						</div>
						<hr/>
						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>
							<ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="#tab1">LIST</a></li>								
								<!-- <li><a href="#tab2">待发货</a></li>
								<li><a href="#tab3">待收货</a></li>
								<li><a href="#tab4">待评价</a></li> -->
							</ul>


							<div class="am-tabs-bd">
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">
									<div class="order-main">
										<div class="order-list">
											<?php 
											$sql = "SELECT o.*,o.status as os,c.id as ids,g.goods_name,g.price,g.picture FROM orders as o left join comment as c on o.pay=c.oid left join goods as g on g.id=o.goods_id  where o.user_id = {$uid}";
														$arry=[];
													  	$arrf=[];
													  	$arrs=[];
													  	$arrw=[];
													  	$arrp=[];
											$result = $conn->query($sql);
											if ($result->num_rows <= 0) {
													echo '没有订单';													
													  }else{													  	
													  	while($row = $result->fetch_assoc()) {
													  		$arr[$row['pay']][]=$row;
													  		if($row['os']==1){
													  			$arry[$row['pay']][]=$row;
													  		}elseif($row['os']==2){
													  			$arrf[$row['pay']][]=$row;
													  		}elseif($row['os']==3){
													  			$arrs[$row['pay']][]=$row;
													  		}elseif($row['os']==0){
													  			$arrw[$row['pay']][]=$row;
													  		}

													  		if(empty($row['ids']) && $row['os']==3){
													  			$arrp[$row['pay']][]=$row;
													  		}													  		
													  	}
													  }											
											 ?>
											<?php foreach($arr as $k=>$v):?>
											<div class="order-status5">
												<div class="order-title">
													<div class="dd-num">Order Num：<a href="javascript:;"><?php echo $k?></a></div>
													<span>Created：<?php echo $v[0]['created'];?></span>
													
												</div>
												<div class="order-content">
													<div class="order-left">
														<?php foreach($v as $vv):?>
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="../<?php echo $vv['picture']?>" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>&nbsp</p>
																			<p class="info-little"><?php echo $vv['goods_name']?>
																				
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<?php echo $vv['price']?>
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><?php echo $vv['count']?>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	
																</div>
															</li>
														</ul>
													<?php endforeach?>										
														
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																Total：<?php echo $vv['total']?>																
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">
																		<?php 											
																		switch ($v[0]['os']) {
																			case 0:
																				echo 'Unpaid';
																				break;
																			case 1:
																				echo 'Not shipped';
																				break;
																				case '2':
																				echo 'Shipped';
																				break;
																				case '3':
																				echo 'Received goods';
																				break;
																		}
																		 ?>																	
																</p>
																	
																</div>
															</li>
															<?php if($v[0]['os']==2):?>
															<li class="td td-change">
																<a class="am-btn am-btn-danger anniu" href="doeditorder.php?id=<?php echo $k?>">
																	确认收货</a>
															</li>
														<?php endif?>
														<!-- <?php if($v[0]['os']==3 && empty($v[0]['ids'])):?>
															<li class="td td-change">
																<a class="am-btn am-btn-danger anniu" href="comment.php?id=<?php echo $k; ?>&uid=<?php echo $uid; ?>&gid=<?php echo $v[0]['goods_id']; ?>">
																	评价</a>
															</li>
														<?php endif?> -->
														</div>
													</div>
												</div>
											</div>
											<?php endforeach?>											
										</div>
									</div>
								</div>


								<div class="am-tab-panel am-fade" id="tab2">									
									<?php foreach($arrw as $k=>$v):?>
											<div class="order-status5">
												<div class="order-title">
													<div class="dd-num">Order Num：<a href="javascript:;"><?php echo $k?></a></div>
													<span>Created：<?php echo $v[0]['created'];?></span>
													
												</div>
												<div class="order-content">
													<div class="order-left">
														<?php foreach($v as $vv):?>
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="../<?php echo $vv['picture']?>" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>&nbsp</p>
																			<p class="info-little"><?php echo $vv['goods_name']?>
																				
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	<?php echo $vv['price']?>
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span><?php echo $vv['count']?>
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	
																</div>
															</li>
														</ul>
													<?php endforeach?>														
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																TotAL：<?php echo $vv['total']?>																
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">
																		<?php 
																		
																		switch ($v[0]['os']) {
																			case 0:
																				echo 'Unpaid';
																				break;
																			case 1:
																				echo 'Not shipped';
																				break;
																				case '2':
																				echo 'Shipped';
																				break;
																				case '3':
																				echo 'Received goods';
																				break;
																		}
																		 ?>
																</p>																
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	Delete</div>
															</li>
														</div>
													</div>
												</div>
											</div>
											<?php endforeach?>
								</div>
								

								\
							</div>
						</div>
					</div>
				</div>
				

			<div class="footer " style="">
						<div class="footer-hd ">
							
						</div>
						<div class="footer-bd ">
							<p style="text-align: center;">								
								<em>2020-2022Fun</em>
							</p>
						</div>
					</div>

			</div>
				<aside class="menu">
				<ul>
					<li class="person active">
						<a  style="font-size:20px" href="center.php">My Page</a>
					</li>
					<li class="person">
						<p style="font-size:18px">My</p>
						<ul>
						
							<li> <a href="sinformation.php">Edit</a></li>
							<li> <a href="address.php">Address</a></li>
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