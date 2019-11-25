<?php require_once 'header.php'; ?>
<div class="content container">
	<h2 class="page-title">Tables - <span class="fw-semi-bold">Static</span></h2>
	<div class="row">
		<div class="col-md-12">
			<section class="widget">
				<header>
					<h4>
						Table <span class="fw-semi-bold">Styles</span>
					</h4>
					<div class="widget-controls">
						<a href="#"><i class="glyphicon glyphicon-cog"></i></a>
						<a data-widgster="close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
					</div>
				</header>
				<div class="body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th class="hidden-xs">id</th>
								<th>Thumbnail</th>
								<th>Description</th>
								<th class="hidden-xs">Title</th>
								<th class="hidden-xs">Status</th>
								<th class="hidden-xs">Action</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							
							<?php 
							foreach ($posts as $item) {?>
								<tr>
									<td class="hidden-xs"><?=$item['id']?></td>
									<td>
										<img class="img-rounded" src="public/user/images/demo/<?=$item['thumbnail']?>" alt="" height="50">
									</td>
									<td>
										<?=$item['description']?>
									</td>
									<td class="hidden-xs">
									<!-- <p class="no-margin">
										<small>
											<span class="fw-semi-bold">Type:</span>
											<span class="text-muted">&nbsp; JPEG</span>
										</small>
									</p>
									<p>
										<small>
											<span class="fw-semi-bold">Dimensions:</span>
											<span class="text-muted">&nbsp; 200x150</span>
										</small>
									</p> -->
									<?=$item['title']?>
								</td>
								<td class="hidden-xs text-muted">
									<?php if ($item['approved']==0) {?>
										<div>Chưa duyệt</div>
									<?php }else {?>
										<div>Đã duyệt</div>
									<?php } ?>
								</td>
								<td class="hidden-xs text-muted">
									<a href="index.php?mod=blogger&act=detail_post&id=<?=$item['id']?>" class="btn btn-success">Xem</a>
									<a href="index.php?mod=blogger&act=edit_post&slug=<?=$item['slug']?>" class="btn btn-success">Edit</a>
									<a href="index.php?mod=blogger&act=delete&id=<?=$item['id']?>" class="btn btn-danger">Delete</a>
								</td>
								
							</tr>
						<?php }
						?>
					</tbody>

				</table>
				
			</div>
		</section>
	</div>
</div>
</div>
<?php require_once 'footer.php'; ?>