<?php require_once 'header.php'; ?>
<section class="ot-section-a">
	<!-- container -->
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="ot-module">
					<!-- classic grid posts section -->
					<h6 class="section-title"><span>Có <b><?=count($searchposts)?></b> kết quả cho từ khóa: <b><?=$_POST['searchposts']?></b></span></h6>
					<div class="row">
						<div class="col-md-12">
							<!-- end list post item -->
							
							<!-- end list post item -->
							<!-- end list post item -->
							<?php foreach ($searchposts as $searchpost) {?>
								<div class="list-post">
									<div class="list-post-container">
										<a href="index.php?mod=user&act=post&slug=<?=$searchpost['slug']?>"><img src="public/user/images/demo/<?=$searchpost['thumbnail']?>" alt=""></a>
										<div class="post-cat2"><span style="background-color: #F0CE49"><?=$searchpost['name']?></span></div>
									</div>
									<div class="list-post-body">
										<h2><a href="index.php?mod=user&act=post&slug=<?=$searchpost['slug']?>"><?=$searchpost['title']?></a></h2>
										<div class="post-meta">
											<span><?=$searchpost['created_at']?></span> <span><a href="index.php?mod=user&act=post&slug=<?=$searchpost['slug']?>"><?=$searchpost['view_count']?> views</a></span>
										</div>
										<p><?=$searchpost['description']?></p>
									</div>
								</div>
							<?php } ?>
						</div>
						
					</div>
				</div>
			</div>
<?php require_once 'footer.php'; ?>