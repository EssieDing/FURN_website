<?php include('top.php'); 
ini_set("error_reporting","E_ALL & ~E_NOTICE");
session_start();
//Get the id in the URL parameter
$goods_id = $_REQUEST['id'];
$uid=isset($_SESSION['uid'])?$_SESSION['uid']:'';
?>
	<link href="static/basic/css/demo.css" rel="stylesheet" type="text/css" />
	<link type="text/css" href="static/css/optstyle.css" rel="stylesheet" />
	<link type="text/css" href="static/css/style.css" rel="stylesheet" />
	<script type="text/javascript" src="basic/js/jquery-1.7.min.js"></script>		
	<script type="text/javascript" src="static/js/list.js"></script>
	<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js">
</script>
	<div class="clear"></div>
    <b class="line"></b>
	<div class="listMain">
		<div class="nav-table">
			<div class="long-title"><span class="all-goods">Class</span></div>
				<div class="nav-cont">
					<ul>
						<li class="index"><a href="index.php">Home</a></li>                            
					</div>
				</div>
				<ol class="am-breadcrumb am-breadcrumb-slash">
					<li><a >HOME</a></li>
					
					<li class="am-active">Detail</li>
				</ol>

		<?php
        session_status();
		$sql = "select * from goods where id = '".$goods_id."'";	 
		$result = $conn->query($sql);
			if ($result->num_rows > 0) {
		    	while($row = $result->fetch_assoc()) {
		 			?>
				<div class="item-inform">
					<div class="clearfixLeft" id="clearcontent">
						<div class="box">
							<div class="tb-booth tb-pic tb-s310">
								<img src="<?php echo $row['picture']?>" alt="" rel="images/01.jpg" class="jqzoom" />
							</div>
							
						</div>
						<div class="clear"></div>
					</div>


			<div class="clearfixRight">
			<form method="get" action="user/buy.php" id="">
				<div class="tb-detail-hd">
				<h1>	
				 <?php echo $row['goods_name']?>
	          	</h1>
					</div>
						<input type="hidden" name="gid" value="<?php echo $row['id']?>">
						<input type="hidden" name="uid" value="<?php echo $uid?>">
						<div class="tb-detail-list">
							<div class="tb-detail-price">
								<li class="price iteminfo_price">
                                   
                                    <dt>Sale</dt>
									<dd><em>¥</em><b class="sys_item_price"><?php echo $row['old_price']?></b>  </dd>
                                  
								</li>
								<li class="price iteminfo_mktprice">
									<dt>Price</dt>
									<dd><em>¥</em><b class="sys_item_mktprice"><?php echo ($row['old_price']*1.2)?></b></dd>									
								</li>
								<div class="clear"></div>
							</div>
							
							<div class="clear"></div>
							<div class="clear"></div>
							<dl class="iteminfo_parameter sys_item_specpara">
								<dt class="theme-login"><div class="cart-title">可选规格<span class="am-icon-angle-right"></span></div></dt>
								<dd>
									<div class="theme-popover-mask"></div>
									<div class="theme-popover">
										<div class="theme-span"></div>
										<div class="theme-poptit">
											<a href="javascript:;" title="关闭" class="close">×</a>
										</div>
										<div class="theme-popbod dform">						
											<br>
												<div class="theme-signin-left">
													<div class="theme-options">
														<div class="cart-title"></div>
														<ul>
															
															<input type="hidden" id="isz" value="<?php echo $g[0]?>">
														</ul>
													</div>
													<br>
													<script type="text/javascript">
														$('.ral').hide();
														$('.lie').click(function(){
															var sz=$(this).next().val();
															$(this).next().prop('checked','checked');
															$(this).next().siblings().removeAttr('checked');
															$('#isz').val(sz)
														})
													</script>
													<div class="theme-options">								
													</div>
													<div class="theme-options">
														<div class="cart-title number"></div>
														<dd>
															
		                									
														</dd>
														<input id="text_box" name=count type="hidden" value="1"  type="number" min="1" max="10"/ style="width:30px;font-size:15px">
													</div><input name="peices"  type="text" hidden="hidden" id="nowPri" value="<?php echo $row['price'];?>" >
													<div class="clear"></div>
												</div>
											</div>
										</div>
									</dd>
								</dl>
							<div class="clear"></div>							
						</div>

						<div class="pay">
							<li>
								<div class="clearfix tb-btn tb-btn-buy theme-login">
									 <input type="submit"  value="Buy" style="width:120px;height: 38px;  line-height: 38px;text-align: center;background-color: #ffeded;border: 1px solid #FF0036;color: #FF0036;margin-left:450px;margin-top:-90px">
								</div>
							</li>
							<li>
						<div class="clearfix tb-btn tb-btn-basket theme-login">									
		            		<button id="addcart" name="addcart" type="button" style="width:120px;height: 38px;  line-height: 38px;background-color: #ff0036;border: 1px solid #ff0036;    color: #fff;margin-top:-90px;">Add Car</button>
		            			</form>
								</div>
							</li>
						</div>
					</div>

					<div class="introduceMain">
						<div class="am-tabs" style="margin-left: 9%" data-am-tabs>
							

						
 							<?php
		       					}
		   					} else {
		       					echo "0 个结果";
		   					}
		  					?>

							<div class="am-tab-panel am-fade">								
                                <div class="actor-new">                                        
                            </div>	
                            <div class="clear"></div>
								<div class="tb-r-filter-bar">									
								</div>
								<div class="clear"></div>
									<ul class="am-comments-list am-comments-list-flip">
										

									

									</ul>
									<div class="clear"></div>									
									<div class="clear"></div>
								</div>
							</div>
						</div>
						<div class="clear"></div>						
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
			</div>
		</div>
	<script type="text/javascript">
$(function(){
  $('#addcart').click(function(){
    location.href ="user/addcart.php?uid=<?php echo $uid?>&gid=<?php echo $goods_id?>&count="+$('#text_box').val()+"&price="+$('#nowPri').val()+"&size="+$('#isz').val();
  });
});
</script>
</body>
</html>