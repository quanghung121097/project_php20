<?php  ?>
<!DOCTYPE html>
<html lang="en">

<!-- Tieu Long Lanh Kute From Baobinh.net Free CSS HTML Responsive template download-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="public/user/images/favicon.ico">
	<title>Infra Magazine</title>
	<!-- Bootstrap core CSS -->
	<link href="public/user/css/bootstrap.min.css" rel="stylesheet">
	<link href="public/user/css/font-awesome.css" rel="stylesheet">
	<link href="public/user/css/style.css" rel="stylesheet">
	<link href="public/user/css/shortcodes.css" rel="stylesheet">
	<link href="public/user/css/style-wp.css" rel="stylesheet">
	<link href="public/user/css/owl.carousel.css" rel="stylesheet">
	<!-- only for demo -->
	<link href="public/user/css/demo-settings.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="boxed active">
		<div class="top-bar">
			<div class="container">
				<!-- main menu -->
				<nav class="top-menu">
					<label for="show-top-menu" class="show-menu"><i class="fa fa-bars"></i></label>
					<input type="checkbox" id="show-top-menu">
					<ul class="menu" id="mobile-menu">
						<li>
							<a href="index.php?mod=user&act=home"><i class="fa fa-home"></i></a>
						</li>
						<?php if (isset($_SESSION['user'])==true) {
							?>
							<li>
								<a href=""><i class="fa fa-user"></i> Xin chào: <?=$_SESSION['user']['name']?> </a>
							</li>
							<li><a href="index.php?mod=blogger&act=logout"><i class="fa fa-sign-out"></i> Đăng xuất</a>
							</li>
							<?php
							
						} else {
							?>
							
							<li><a href="index.php?mod=blogger&act=login"><i class="fa fa-sign-in"></i> Đăng nhập</a></li>
							<li><a href="index.php?mod=blogger&act=register"><i class="fa fa-plus"></i> Đăng ký</a></li>
							<?php
						} ?>
						
						
					</ul>
				</nav>
				<!-- end main menu -->
				<span class="top-bar-socials">
					<a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
					<a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
					<a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
					<a href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
					<a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
				</span>
			</div>
			<!-- end container -->
		</div>
		<!-- end topbar -->
		<!-- header (logo section) -->
		<header class="header">
			<div class="container">
				<div class="logo"><a href="index.php?mod=user&act=home"><img id="logo" src="public/user/images/logo.png" alt="logo"></a></div>
				<!-- <h1>Haute Couture</h1>
					<div class="description">black is new red</div> -->
					<!-- <div class="ad-728x90"><a href="index-2.html"><img src="public/user/images/ad340x550.jpg" alt="ad728x90"></a></div> -->
				</div>
			</header>
			<!-- end header (logo section) -->
			<!-- main menu -->
			<nav class="main-menu">
				<div class="container">
					<label for="show-menu" class="show-menu"><i class="fa fa-bars"></i></label>
					<input type="checkbox" id="show-menu">
					<ul class="menu" id="main-mobile-menu">
						<li>
							<a href="index.php?mod=user&act=home"><i class="fa fa-home"></i> Trang chủ</a>
							
						</li>
						<!-- <li>
							<a href="#"><i class="fa fa-pencil-square-o"></i> Articles <b class="caret"></b></a><span class="sub_menu_toggle"></span>
							<ul class="sub-menu">
								<li><a href="post.html">Default</a></li>
								<li><a href="post-large-image.html">Large Image</a></li>
								<li><a href="post-half-image.html">Half Image</a></li>
								<li><a href="post-video.html">With Video</a></li>
								<li><a href="shortcodes.html">Shortcodes</a></li>
							</ul>
						</li> -->
						<li class="menu-item-has-children">
							<a href="#"><i class="fa fa-bars"></i> Danh mục <b class="caret"></b></a><span class="sub_menu_toggle"></span>
							<ul class="sub-menu">
								
								<?php foreach ($categories as $key) {?>
									<li>
										<a href="index.php?mod=user&act=listposts&id=<?=$key['id']?>"><?=$key['name']?> <b class="caret"></b></a><span class="sub_menu_toggle"></span>
										<ul class="sub-menu <?=$key['name']?>">
											<?php
											require_once 'models/connection.php';
											$connection=new connection();
											$query="SELECT * FROM categories WHERE delete_at is NULL AND parent_id=".$key['id'];
											$result=$connection->conn->query($query);
											$categories_con=array();
											while ($row=$result->fetch_assoc()) {
												$categories_con[]=$row;
											}
											foreach ($categories_con as $keycon) {
												if (count($categories_con)!=0) {?>
													<li><a href="index.php?mod=user&act=listposts&id=<?=$keycon['id']?>"><?=$keycon['name']?></a></li>
												<?php } else { ?>
													<li><a href="index.php?mod=user&act=listposts&id=<?=$key['id']?>">Null</a></li>
												<?php }
												
											}

											?>
											
											
										</ul>
									</li>
								<?php }
								?>
							</ul>
						</li>
						<li><a href="team.html">Team Page</a></li>
						<li><a href="about.html">Giới thiệu</a></li>
						<li><a href="contact.html">Liên hệ</a></li>
						<li class="search-menu">
							<a href="#">Trending <i class="fa fa-bolt"></i></a><span class="mega_menu_toggle"></span>
							<ul class="ot-mega-menu">
								<li>
									<div class="row">
										
										<?php foreach ($posts_by_search as $posts9) {?>
											<div class="col-md-4">
												<div class="ot-menu-widget ot-dark">
													<!-- article post -->
													<article class="widget-post">
														<div class="post-image">
															<a href="index.php?mod=user&act=post&slug=<?=$posts9['slug']?>"><img style=" height:100px;" src="public/user/images/demo/<?=$posts9['thumbnail']?>" alt=""></a>
														</div>
														<div class="post-body">
															<h2><a href="index.php?mod=user&act=post&slug=<?=$posts9['slug']?>"><?=$posts9['title']?></a></h2>
															<div class="post-meta">
																<span><i class="fa fa-clock-o"></i> <?=$posts9['created_at']?></span> <span><a href="index.php?mod=user&act=post&slug=<?=$posts9['slug']?>"><i class="fa fa-search"></i> <?=$posts9['search_count']?></a></span>
															</div>
														</div>
													</article>

												</div>
												<!-- end ot-widget -->
											</div>
										<?php } ?>


									</div>
								</li>
							</ul>
						</li>
						<li class="search-menu">
							<a href="#"><i class="fa fa-search"></i></a><span class="sub_menu_toggle"></span>
							<ul class="sub-menu">
								<li>
									<form id="search" class="navbar-form search" action="index.php?mod=user&act=search" method="post">
										<div class="input-group">
											<input type="search" class="form-control" placeholder="Type to search" name="searchposts" id="s">
											<span class="input-group-btn"><button type="submit" class="btn btn-default btn-submit"><i class="fa fa-angle-right"></i></button></span>
										</div>
									</form>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- end main menu -->
			<!-- slaider -->