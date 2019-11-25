<div class="col-md-4">
	<div class="theiaStickySidebar">
		<aside class="sidebar">
			<!-- widget socials -->
			<div class="widget-container">
				<h4 class="section-title">Advertisement</h4>
				<a href="post.html"><img src="public/user/images/ad340x550.jpg" alt="" /></a>
				<hr>
				<a href="post.html"><img src="public/user/images/ad340x550.jpg" alt="" /></a>
			</div>
			<div class="widget-container">
				<h4 class="section-title"><span>Infra Magazine on</span>Socials</h4>
				<div class="ot-social-button">
					<a href="https://www.facebook.com/profile.php?id=100005263327260"><i class="fa fa-facebook"></i></a>
					<div class="ot-social-details">
						
						<div class="ot-social-type">Likes</div>
					</div>
				</div>
				<div class="ot-social-button">
					<a href="https://twitter.com/quanghung121097"><i class="fa fa-twitter"></i></a>
					<div class="ot-social-details">
						
						<div class="ot-social-type">Followers</div>
					</div>
				</div>
				<div class="ot-social-button">
					<a href="https://www.instagram.com/quanghung121097/"><i class="fa fa-instagram"></i></a>
					<div class="ot-social-details">
						
						<div class="ot-social-type">Followers</div>
					</div>
				</div>
				
				<div class="clearfix"></div>
			</div>
			<!-- end widget socials -->
			<!-- widget advertisement -->
			
			<!-- end widget advertisement -->
			<!-- widget reviews style #2 -->
			<!-- end widget reviews style #2 -->
			<!-- widget articles section -->

			<div class="widget-container">
				<h4 class="section-title"><span>Latest From All Categories</span>Latest News</h4>
				<!-- article post -->
				<?php require_once 'limit_text.php'; foreach ($posts_views_5 as $post_views_5) {?>
					<article class="widget-post">
						<div class="post-image">
							<a href="index.php?mod=user&act=post&slug=<?=$post_views_5['slug']?>"><img style=" height:100px;" src="public/user/images/demo/<?=$post_views_5['thumbnail']?>" alt=""></a>
						</div>
						<div class="post-body">
							<h2><a href="index.php?mod=user&act=post&slug=<?=$post_views_5['slug']?>"><?=limit_text($post_views_5['title'],15)?></a></h2>
							<div class="post-meta">
								<span><i class="fa fa-clock-o"></i> <?=$post_views_5['created_at']?></span> <span><a href="index.php?mod=user&act=post&slug=<?=$post_views_5['slug']?>"><i class="fa fa-eye"></i> <?=$post_views_5['view_count']?></a></span>
							</div>
						</div>
					</article>
				<?php } ?>
				
				
			</div>
			<!-- end widget articles section -->
			<!-- widget advertisement -->
			
			<!-- end widget advertisement -->
		</aside>
	</div>
	<!-- theiaStickysidebar -->
</div>
<!-- col-md-4 -->
</div>
<!-- row -->
<!-- end main content -->
</div>
<!-- container -->
</section>
<!-- end ot-section-a -->

<!-- featured articles -->

<!-- end featured articles -->
<!-- end Instagram Widget Section -->
<footer class="footer">
	<div class="footer-menu">
		<ul class="menu">
			<li><a href="about.html">About Us</a></li>
			
			<li><a href="contact.html">Contact Us</a></li>
		</ul>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4">
				<div class="ot-footer-widget">
					<h4 class="footer-title"><span>About Infra</span></h4>
					<p>Maecenas euismod magna augue, et imperdiet nisl efficitur nec. Nunc non risus a diam tempor ornare. Suspendisse molestie nisi a euismod egestas. Integer tristique mauris in laoreet iaculis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
					<p>3422 Street, Barcelona 432, Spain,<br>New Building North, 15th Floor</p>
				</div>
				
			</div>
			<div class="col-md-4 col-sm-4">
				<!-- footer widget start -->
				<!-- footer widget end -->
				<!-- footer widget start -->
				<div class="ot-footer-widget">
					<h4 class="footer-title"><span>Advertisement</span></h4>
					<div class="ot-advert">
						<div class="row">
							<div class="col-xs-6">
								<a href="post.html"><img src="public/user/images/ad340x550.jpg" alt="" /></a>
							</div>

						</div>
					</div>
				</div>
				<!-- footer widget end -->
			</div>
			<div class="col-md-4 col-sm-4">
				<!-- footer widget start -->
				<div class="ot-footer-widget ot-dark">
					<h4 class="footer-title"><span>Old Posts</span></h4>
					<!-- article post -->
					<?php require_once 'limit_text.php'; foreach ($posts_created_at_asc as $post_created_at_asc) {
						?>
						<article class="widget-post">
							<div class="post-image">
								<a href="index.php?mod=user&act=post&slug=<?=$post_created_at_asc['slug']?>"><img style=" height:100px;" src="public/user/images/demo/<?=$post_created_at_asc['thumbnail']?>" alt=""></a>
							</div>
							<div class="post-body">
								<h2><a href="index.php?mod=user&act=post&slug=<?=$post_created_at_asc['slug']?>"><?=limit_text($post_created_at_asc['title'],10)?></a></h2>
								<div class="post-meta">
									<span><i class="fa fa-clock-o"></i> <?=$post_created_at_asc['created_at']?></span> <span><a href="index.php?mod=user&act=post&slug=<?=$post_created_at_asc['slug']?>"><i class="fa fa-eye"></i> <?=$post_created_at_asc['view_count']?></a></span>
								</div>
							</div>
						</article>
						<?php
					} ?>
					
					<!-- end article item -->
					<!-- article post -->
					
					<!-- end article item -->
				</div>
				<!-- footer widget end -->
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<i class="fa fa-copyright"></i> Copyright 2019. All rights reserved.<br />
		Theme made by <a href="https://www.facebook.com/profile.php?id=100005263327260">Quang Hung</a>
	</div>
</footer>
</div>
<!-- boxed -->
		<!-- Bootstrap core and theme JavaScript
			================================================== -->
			<!-- Placed at the end of the document so the pages load faster -->
			<script type="text/javascript" src="public/user/js/jquery-latest.min.js"></script>
			<script type="text/javascript" src="public/user/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="public/user/js/demo-settings.js"></script>
			<script type="text/javascript" src="public/user/js/owl.carousel.min.js"></script>
			<script type="text/javascript" src="public/user/js/theia-sticky-sidebar.js"></script>
			<script type="text/javascript" src="public/user/js/themescripts.js"></script>
		</body>

		<!-- Tieu Long Lanh Kute From Baobinh.net Free CSS HTML Responsive template download-->
		</html>