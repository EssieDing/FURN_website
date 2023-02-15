<?php include 'top.php'; ?>
<?php
include '../conn.php';
include 'function.php';
header("Content-type: text/html; charset=utf-8");
$uid=isset($_SESSION['uid'])?$_SESSION['uid']:'';
$sql = "SELECT * FROM user where id = '".$uid."'";
$result = $conn->query($sql);
$arr=[];
if ($result->num_rows <= 0) {
echo '请先注册或登录！';
exit;
  }
$sqla="select * from address where uid ={$uid}";
$results = $conn->query($sqla);
if ($results->num_rows <= 0) {
										
	}else{													  
while($rows = $results->fetch_assoc()) {
$arr[]=$rows;
}
}

$sp="select * from t_area where level =1";
$sp2="select * from t_area where level =2";
$sp3="select * from t_area where level =3";
$result1 = $conn->query($sp);
$result2 = $conn->query($sp2);
$result3 = $conn->query($sp3);
while($row1 = $result1->fetch_assoc()) {
$arr1[]=$row1;
}
while($row2 = $result2->fetch_assoc()) {
$arr2[]=$row2;
}
while($row3 = $result3->fetch_assoc()) {
$arr3[]=$row3;
}

?>
<link href="../static/css/personal.css" rel="stylesheet" type="text/css">
<link href="../static/css/addstyle.css" rel="stylesheet" type="text/css">
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
					<div class="user-address">
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">Address</strong></div>
						</div>
						<hr/>
						<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
							<?php foreach($arr as $v):?>
							<li class="user-addresslist defaultAddr">
								<span class="new-option-r"><i class="am-icon-check-circle"></i></span>
								<p class="new-tit new-p-re">						
									<span class="new-txt-rd2"><?php echo $v['phone']?></span>
								</p>
								<div class="new-mu_l2a new-p-re">
									<p class="new-mu_l2cw">
										<span class="title">Address：</span>
										<span class="province"><?php echo $v['city']?></span>
										<span class="street"><?php echo $v['content']?></span></p>
								</div>
								<div class="new-addr-btn">					
									<a href="dodesad.php?id=<?php echo $v['id']?>" ><i class="am-icon-trash"></i>Delete</a>
								</div>
							</li>
						<?php endforeach?>							
						</ul>

						<div class="clear"></div>
						<div class="am-modal am-modal-no-btn" id="doc-modal-1">
							<div class="add-dress">
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">New</strong></div>
								</div>
								<hr/>
								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
									<form class="am-form am-form-horizontal" method="post" action="doads.php">
										<div class="am-form-group">
											<label for="user-phone" class="am-form-label">Phone</label>
											<div class="am-form-content">
												<input id="user-phone" placeholder="Address" name="phone" type="text">
												<input type="hidden" name="uid" value="<?php echo $uid?>">
											</div>
										</div>
										<div class="am-form-group">
											<label for="user-address" class="am-form-label">City</label>
											<div class="am-form-content address">
												<select id="p1" name="p1">
													<?php foreach($arr1 as $v1):?>
														<option value="<?php echo $v1['areaName']?>" sid="<?php echo $v1['id']?>"><?php echo $v1['areaName']?></option>
													<?php endforeach?>
												</select>
												<select id="p2" name="p2">
													<option></option>
													<?php foreach($arr2 as $v2):?>
														<option value="<?php echo $v2['areaName']?>" sid="<?php echo $v2['id']?>" pid="<?php echo $v2['pid']?>"><?php echo $v2['areaName']?></option>
													<?php endforeach?>
												</select>
												<select id="p3" name="p3">
													<option></option>
													<?php foreach($arr3 as $v3):?>
														<option value="<?php echo $v3['areaName']?>" sid="<?php echo $v3['id']?>" pid="<?php echo $v3['pid']?>"><?php echo $v3['areaName']?></option>
													<?php endforeach?>
												</select>
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-intro" class="am-form-label">Conternt</label>
											<div class="am-form-content">
												<textarea class="" rows="3" id="user-intro" placeholder="Conternt" name="content"></textarea>
											</div>
										</div>

										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												<button class="am-btn am-btn-danger" type="submit">Sumbit</button>
												<a href="javascript: void(0)" class="am-close am-btn am-btn-danger" data-am-modal-close>取消</a>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					<script type="text/javascript">
						$(document).ready(function() {							
							$(".new-option-r").click(function() {
								$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
							});
							
							var $ww = $(window).width();
							if($ww>640) {
								$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
							}
							
						})
							$('#p1').change(function(){
								var sid=$('#p1 option:selected').attr('sid');
								$('#p2 option[pid='+sid+']').siblings().hide();
								$('#p2 option[pid='+sid+']').show();
						})
							$('#p2').change(function(){
								var sid=$('#p2 option:selected').attr('sid');
								$('#p3 option[pid='+sid+']').siblings().hide();
								$('#p3 option[pid='+sid+']').show();
						})
					</script>
					<div class="clear"></div>
				</div>


				<div class="footer " style="">
						<div class="footer-hd ">
							<p style="text-align: center;">
								
							</p>
						</div>
						<div class="footer-bd ">
							<p style="text-align: center;">
								
								<em>2022 Furn</em>
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