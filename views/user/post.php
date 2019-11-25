<?php require_once 'header.php'; ?>
<section class="ot-section-a">
	<!-- container -->
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="theiaStickySidebar">
					<div class="content ot-article">
						<div class="article-image">
							<img src="public/user/images/demo/<?=$getpost['thumbnail']?>" alt="">
						</div>
						<h2><?=$getpost['title']?></h2>
						<div class="post-meta">
							<span><?=$getpost['created_at']?></span> <span><a href="post.html">1 comments</a></span> <span><?=$getpost['view_count']?> views</span>
						</div>
						
						<blockquote>
							<p><?=$getpost['description']?></p>
						</blockquote>
						
						<p>
							<div><?=$getpost['content']?></div>
						</p>
					</div>
					
					
					<div class="ot-author">
						<div class="author-image">
							<img src="public/user/images/demo/<?=$getpost['avatar']?>" alt="">
						</div>
						<div class="author-text-body">
							<h3><a href="index-list.html"><?=$getpost['name']?></a> <span><?=$getpost['email']?></span></h3>
							<p><?=$getpost['quote']?></p>
							<div class="author-social">
								
                                <?=$getpost['sdt']?>
							</div>
						</div>
					</div>
					<!-- related articles -->
					
					<!-- end: related articles -->
					<div class="ot-module">
						<h4>Comments</h4>
						<!-- <div class="no_comments">
							<i class="fa fa-comments-o"></i>
							<div>
								<h4>No Comments Yet!</h4>
								<p>
									You can be first to 
									<a href="#respond">
										comment this post!
									</a>
								</p>
							</div>
						</div> -->
						<!--== Comments ==-->
						<div class="comments">
							<ul class="comment-list">
								<?php  foreach ($comments as $cmt) {?>
									<li>
										<div class="comment">
											<div class="comment-author">
												<img src="public/user/images/demo/<?=$cmt['avatar']?>" alt="Author">
												<a href="#" rel="external nofollow" class="comment-author-name"><?=$cmt['name']?></a>
												
												<span class="comment-meta"><?=$cmt['created_at']?></span>
											</div>
											<div class="comment-body">
												<p><?=$cmt['content']?></p>

											</div>
										</div>
									</li>
								<?php } ?>
								
							</ul>
						</div>
						<!--== Post Reply ==-->
						<?php if (isset($_SESSION['user'])) {?>
							<h4 class="main-heading"><span>Add a comment</span></h4>
							<div class="comment-form-body">
								<div class="row">
									<form class="comment-form" method="post" action="index.php?mod=user&act=addcomment">
										<div class="col-md-12">
											<label for="comment">Comment</label>
											<textarea name="content" id="content" cols="35" rows="5"></textarea>
										</div>
										<div class="col-md-12">
											<p class="form-submit">
												<input name="submit" type="submit" id="submit" class="submit submit-button" value="Post Comment" />
												<input type='hidden' name='slug_post' value='<?=$getpost['slug']?>' id='slug_post' />
												<input type='hidden' name='comment_parent' id='comment_parent' value='0' />
											</p>
										</div>
									</form>
								</div>
							</div>
						<?php } else {?>
							<h5><center>Đăng nhập để bình luận</center></h5>
						<?php } ?>
						
					</div>
					<!-- end comments module -->
				</div>
				<!-- end theiaStickySidebar -->
			</div>
			<?php require_once 'footer.php'; ?>