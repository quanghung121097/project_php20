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
					<table class="table">
						<thead>
							
							<th>Name</th>
							<th>Content</th>
							<th>status</th>
							<th>Action</th>
						</thead>
						<?php  foreach ($comments as $item) { ?>
						<tr>
							<td><?=$item['name']?></td>
							
							<td><?=$item['content']?></td>
							<td><?php if ($item['status']==1) {
								echo 'Đã duyệt';
							} else {
								echo 'Chưa duyệt';
							} ?></td>
							<td>
								<?php if ($userlogin['role']==1) {
									if ($item['status']==0) {?>
										
										<a href="index.php?mod=blogger&&act=approvedcomment&id=<?=$item['id']?>" class="btn btn-success">Phê Duyệt</a>

									<?php } else {?>
										<a href="index.php?mod=blogger&&act=unapprovedcomment&id=<?=$item['id']?>" class="btn btn-primary">Ẩn</a>
									<?php }

								}else {?>
									<i class="fas fa-exclamation-triangle btn-warning"></i>
								<?php } ?>
								
							</td>
						</tr>
						<?php ; } ?>
					</table>
					
				</div>
			</section>
		</div>
	</div>
</div>
<?php require_once 'footer.php'; ?>