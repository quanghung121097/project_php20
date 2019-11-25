<?php require_once 'header.php'; ?>
<section class="ot-section-b">
	<div class="container">
		<!-- latest posts section -->
		<h4 class="section-title"><span>The large grid posts</span>Featured Posts</h4>
		<div class="row">
			<?php require_once 'limit_text.php'; foreach ($posts_views_3 as $posts3) {
				?>
				<div class="col-md-4 col-sm-4">
					<div class="grid-large">
						<div class="post-image">
							<div class="review"><span class="score"><img src="public/user/images/demo/<?=$posts3['avatar']?>" alt="" class="img-fluid"></span></div>
							<div class="post-title">
								<div class="gl-text-hover">
									<p><?=limit_text($posts3['description'],30)?></p>
									<div class="read-more"><a href="index.php?mod=user&act=post&slug=<?=$posts3['slug']?>">read more</a></div>
								</div>
								<div class="gl-title-hover">
									<div class="post-cat2"><span><?=$posts3['name']?>, <?=$posts3['view_count']?><i class="fa fa-eye"></i></span></div>
									<h2><a href="index.php?mod=user&act=post&slug=<?=$posts3['slug']?>"><?=$posts3['title']?></a></h2>
								</div>
							</div>
							<a href="post.html"><img style=" height:400px;" src="public/user/images/demo/<?=$posts3['thumbnail']?>" alt="" class="img-fluid"></a>
						</div>
					</div>
				</div>
				<?php
			} ?>


		</div>
	</div>
	<!-- container -->
</section>
<!-- main content -->
<section class="ot-section-a">
	<!-- container -->
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="theiaStickySidebar">
					<div class="ot-module">
						<!-- classic grid posts section -->
						<h4 class="section-title"><span>The grid style box</span>Latest Posts</h4>
						<div class="row">
							<?php foreach ($posts_created_at as $post_created_at) {?>
								<div class="col-md-6 col-sm-6">
									<!-- grid post -->
									<div class="grid-post grid-gutter">
										<div class="post-image">
											<div class="review"><span class="score">80</span><span class="percent">%</span></div>
											<div class="post-title">
												<div class="post-cat2"><span><?=$post_created_at['name']?></span></div>
												<h2><a href="index.php?mod=user&act=post&slug=<?=$post_created_at['slug']?>"><?=$post_created_at['title']?></a></h2>
											</div>
											<a href="index.php?mod=user&act=post&slug=<?=$post_created_at['slug']?>"><img style=" height:300px;" src="public/user/images/demo/<?=$post_created_at['thumbnail']?>" alt=""></a>
										</div>
										<div class="post-body">
											<div class="post-meta">
												<span><?=$post_created_at['created_at']?></span> <span><a href="index.php?mod=user&act=post&slug=<?=$post_created_at['slug']?>">23 comments</a></span> <span><?=$post_created_at['view_count']?> <i class="fa fa-eye"></i></span>
											</div>
											<p><?=limit_text($post_created_at['description'],15)?></p>
										</div>
										<div class="read-more"><a href="index.php?mod=user&act=post&slug=<?=$post_created_at['slug']?>">read more</a></div>
									</div>
									<!-- end grid post -->
								</div>
							<?php }
							?>
							

						</div>
						<center><div class="row mt-5">
							<?=$paginationHTML?>
						</div></center>	
					</div>
					<div class="ot-module">
						<div class="ot-advert">
							<div class="ot-advert-title">advertisement <a href="contact.html">click here for rates</a></div>
							<div class="ot-ad-728x90">
								<a href="index-2.html"><img src="public/user/images/ad728x90.png" alt="ad728x90"></a>
							</div>
						</div>
					</div>
					<!--  -->
					<!-- end ot-module -->
				</div>
				<!-- stickysidebar -->
			</div>
			<?php require_once 'footer.php'; ?>