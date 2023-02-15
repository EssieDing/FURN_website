<?php include('top.php') ?>
	<div class="clear"></div>
		</div>
			<div class="banner">
                <!--rotating -->
				<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0" >
					<ul class="am-slides" >
						<li class="banner1"><a href="static/introduction.html"><img src="images/1.jpg" /style="width: 1200px"></a></li>
						<li class="banner2"><a><img src="images/2.jpg" style="width: 1200px"/></a></li>
						
					</ul>
				</div>
	
	<div class="clear"></div>	
		</div>
			<div class="shopNav">
				<div class="slideall">
					<div class="long-title" id="dt"><span class="all-goods">All Class</span></div>
						<div class="nav-cont">
							<ul>
								<li class="index"><a href="index.php">Home</a></li>                               
								<li class="index"><a href="community.php">Community</a></li>                               
							</ul>						   
						</div>

						<!--Side navigation -->
						<div id="nav" class="navfull" >
							<div class="area clearfix">
								<div class="category-content" id="guide_2">									
									<div class="category">
										<ul class="category-list" id="js_climit_li">
						<?php
						$sql = "SELECT * FROM class where pid=0";
						$result_page = $conn->query($sql);
						if ($result_page->num_rows > 0) {   // Output each row of data
						while($row = $result_page->fetch_assoc()) {
							?>
							<li class="appliance js_toggle relative first">
							<div class="category-info">
								<h3 class="category-name b-category-name"><i></i><a class="ml-22" title="点心">
								<?php
									echo $row["name"];
								?></a></h3>
								<em>&gt;</em></div>
								<div class="menu-item menu-in top" style="height:300px">
								<div class="area-in">
								<?php $sql2 = "SELECT * FROM class where pid={$row['id']}";
						$result_page2 = $conn->query($sql2);
						if ($result_page2->num_rows > 0) {   // Output each row of data
							while($row2 = $result_page2->fetch_assoc()) {
								?> 											
								<div class="area-bg">
									<div class="menu-srot">
										<div class="sort-side">
											<dl class="dl-sort" >																		
												<dd><a href="search.php?name=<?php echo $row2['name']?>"><span><?php echo $row2['name']?></span></a></dd>																		
													</dl>
										</div>																
									</div>
								</div>													
												
							<?php }} ?>
							</div>
							</div>
								<b class="arrow"></b>	
								</li>
								<!-- Determine if users are logged in -->									
							<?php
							    }
							} else {
								echo "0 个结果";
							}
							?>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<!--rotating -->
						<script type="text/javascript">
							(function() {
								$('.am-slider').flexslider();
							});
							$(document).ready(function() {
								$("li").hover(function() {
									$(".category-content .category-list li.first .menu-in").css("display", "none");
									$(".category-content .category-list li.first").removeClass("hover");
									$(this).addClass("hover");
									$(this).children("div.menu-in").css("display", "block")
								}, function() {
									$(this).removeClass("hover")
									$(this).children("div.menu-in").css("display", "none")
								});
							})
						</script>
				</div>				
			</div>
<script type="text/javascript">
   
</script>

			<div class="shopMainbg">
				<div class="shopMain" id="shopmain">
					<div class="clear "></div>
					<div class="am-container activity ">
						<div class="shopTitle ">
							<h4>NEW</h4>
							<h3> </h3>
							<span class="more ">
                               <a href="search.php">All Goods<i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
                            </span>
						</div>					
					    <div class="am-g am-g-fixed ">
					  	<?php 
					  		$s='select * from goods limit 0,4';
					  		$result_page = $conn->query($s);
							if ($result_page->num_rows > 0) {   
							while($row = $result_page->fetch_assoc()) {
					  		?>
							<a href="goods.php?id=<?php echo $row['id']?>">
					  		<div class="am-u-sm-3 " style="margin-top:10px">
							<div class="icon-sale two "></div>	
								<h4>￥<?php echo $row['old_price']?></h4>						
							<div class="activityMain ">
								<img src="<?php echo $row['picture']?> "></img>
							</div>
							<div class="info ">
								<h3><?php echo $row['goods_name']?></h3>
							</div>														
						</div>
						</a>
					 <?php }
					}?>																		
                </div>
					
				
                 <div class="clear "></div>                 
                 </div>				
					<div class="footer " style="">
						<div class="footer-hd ">
							
						</div>

						<div class="footer-bd ">
							<p style="text-align: center;">								
								<em>2020-2022  Fun</em>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>	
		<script>
			window.jQuery || document.write('<script src="static/basic/js/jquery.min.js "><\/script>');
		</script>
		<script type="text/javascript " src="static/basic/js/quick_links.js "></script>
	</body>
</html>