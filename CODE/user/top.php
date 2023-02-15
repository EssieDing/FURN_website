<?php
session_start();
include '../conn.php';
$uid=isset($_SESSION['uid'])?$_SESSION['uid']:'';
$flag=0;

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>MyPage</title>

		<link href="../static/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="../static/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

		<link href="../static/basic/css/demo.css" rel="stylesheet" type="text/css" />

		<link href="../static/css/hmstyle.css" rel="stylesheet" type="text/css" />
		<script src="../static/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="../static/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

	</head>

	<body>
		<div class="hmtop">
			<!--顶部导航条 -->
			<div class="am-container header" style="background: rgb(230,230,230);max-width:2000px;height:35px">
				<ul class="message-l">
					<div class="topMessage">
						<?php if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){?>
							<div class="menu-hd">
							<a  target="_top" class="h">Welcome &nbsp<?php echo $_SESSION['un']?></a> | 
							<a  href="./user/logout.php?uid=<?php echo  $_SESSION['uid']?>" target="_top" class="h">Logout</a>
							
						</div>
						<?php }else{?>
						<div class="menu-hd">
							<a href="user/login.php" target="_top" class="h">Please Login</a>
							<a href="user/regist.php" target="_top">Register</a>
						</div>
					<?php }?>
					</div>
				</ul>
				<ul class="message-r" >
					<ul class="message-r">
					<div class="topMessage home">
						<div class="menu-hd"><a href="../index.php" target="_top" class="h">Home&nbsp&nbsp&nbsp|</a></div>
					</div>
					<div class="topMessage my-shangcheng">
						<div class="menu-hd MyShangcheng"><a href="center.php?uid=<?php echo $uid?>" target="_top" style="color: black"><i class="am-icon-user am-icon-fw"></i>MY&nbsp&nbsp&nbsp|</a></div>
					</div>
					<div class="topMessage mini-cart">
						<div class="menu-hd"><a id="mc-menu-hd" href="cart.php?uid=<?php echo $uid?>" target="_top" style="color: black"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>Shop Car</span><strong id="J_MiniCartNum" class="h"></strong></a></div>
					</div>
					<div class="topMessage favorite">
						
				</ul>
				</div>
				</div>
				<div class="nav white">
					<div class="logo"><img src="../static/images/logo.png" /></div>
					<div class="logoBig">
						<li><img src="../static/images/logobig.png" /></li>
					</div>

					<div class="search-bar pr">
						<a name="index_none_header_sysc" href="../static/#"></a>
						<form method="get" action="search.php">
							<input id="searchInput" name="name" type="text" placeholder="Title" autocomplete="off">
							<input id="ai-topsearch" class="submit am-btn" value="Search" index="1" type="submit">
						</form>
					</div>
				</div>