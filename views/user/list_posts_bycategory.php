<?php require_once 'header.php'; ?>
<section class="ot-section-a">
	<!-- container -->
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="ot-module">
					<!-- classic grid posts section -->
					<h4 class="section-title"><span>The grid style box</span><?=$category_in_listposts['name']?></h4>
					<div class="row">
						<div class="col-md-12">
							<!-- end list post item -->
							
							<!-- end list post item -->
							<!-- end list post item -->
							<?php foreach ($listpostsbycategory as $postbycategory) {?>
								<div class="list-post">
									<div class="list-post-container">
										<a href="index.php?mod=user&act=post&slug=<?=$postbycategory['slug']?>"><img style=" height:300px;" src="public/user/images/demo/<?=$postbycategory['thumbnail']?>" alt=""></a>
										<div class="post-cat2"><span style="background-color: #F0CE49"><?=$category_in_listposts['name']?></span></div>
									</div>
									<div class="list-post-body">
										<h2><a href="index.php?mod=user&act=post&slug=<?=$postbycategory['slug']?>"><?=$postbycategory['title']?></a></h2>
										<div class="post-meta">
											<span><?=$postbycategory['created_at']?></span> <span><a href="index.php?mod=user&act=post&slug=<?=$postbycategory['slug']?>"><?=$postbycategory['view_count']?> views</a></span>
										</div>
										<p><?=$postbycategory['description']?></p>
									</div>
								</div>
							<?php } ?>
						</div>
						<center><div class="row mt-5">
							<?=$paginationHTML?>
						</div></center>	
					</div>
				</div>
			</div>
			<?php require_once 'footer.php'; ?>