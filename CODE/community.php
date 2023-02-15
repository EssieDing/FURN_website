<?php include('top.php') ?>
    <link href="./static/css/seastyle.css" rel="stylesheet" type="text/css" />
		<div class="clear"></div>
		<b class="line"></b>
        <div class="search">
			<div class="search-list">
				<div class="nav-table">
					<div class="long-title"><span class="all-goods">All Class</span></div>
						<div class="nav-cont">
							<ul>
								<li class="index"><a href="./static/#">Home</a></li>                              
						</div>
					</div>						
					<div class="am-g am-g-fixed">
						<div class="am-u-sm-12 am-u-md-12">
	            <br>

							<div class="clear"></div>
                        </div>
							<div class="search-content">
								
								<div class="clear"></div>

								<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
                  <?php 
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$name=isset($_GET['name'])?$_GET['name']:'';
$num_rec_per_page=12;
$start_from = ($page-1) * $num_rec_per_page;
if(empty($name)){
  $sql="select * from goods where  status = 1 LIMIT {$start_from}, {$num_rec_per_page}";
}else{
  $sql="select * from goods where goods_name like '%{$name}%' and  status = 1 LIMIT {$start_from}, {$num_rec_per_page}";
}
$sql_all = "SELECT * FROM goods";
$result = $conn->query($sql_all);
$result_page = $conn->query($sql);
$total_records = $result->num_rows;  // Count the total number of records
$total_pages = ceil($total_records / $num_rec_per_page);  // Calculate the total number of pages
$flag=0;
        if ($result_page->num_rows > 0) {// Output each row of data
          while($row = $result_page->fetch_assoc()) {        	
            ?>
            <li>
            	<a href="detail.php?id=<?php echo $row['id']?>">
                <div class="i-pic limit">
                      <img src="<?php echo $row['picture']?>" />                      
                      <p class="title fl"><?php echo $row['goods_name']?></p>
                     
                      <p class="number fl">                    
                      </p>
                    </div>
                	</a>
                  </li>
                  
                  <?php
              }
          } else {
            echo "0 个结果";
          }
                   ?>	
								</ul>
							</div>
							<div class="search-side">

								

						
	

							</div>
							<div class="clear"></div>
              <?php
      echo "<ul class='am-pagination am-pagination-right'>";
      for ($i=1; $i<=$total_pages; $i++) {
        echo "<li><a href='search.php?page=".$i."'>".$i."</a></li> ";
      };
      echo "</ul>";
      ?>							

				</div>				
					<div class="footer " style="">
						<div class="footer-hd ">
							<p style="text-align: center;">
								
							</p>
						</div>
						<div class="footer-bd ">
							<p style="text-align: center;">								
								<em>2020-2022 @fun</em>
							</p>
						</div>
					</div>
				</div>
			</div>	
	
		<script>
			window.jQuery || document.write('<script src="./static/basic/js/jquery-1.9.min.js"><\/script>');
		</script>
		<script type="text/javascript" src="./static/basic/js/quick_links.js"></script>

<div class="theme-popover-mask"></div>

	</body>
</html>